<?php

// Function to call the ClearVIN API
function call_vin_api($vin)
{
    $api_url = "https://www.clearvin.com/rest/vendor/report?vin=" . urlencode($vin) . "&format=pdf&reportTemplate=2021";

    $args = array(
        'headers' => array(
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbnZpcm9ubWVudCI6InRlc3QiLCJ1c2VyIjp7ImlkIjoyMjY4MzIsImVtYWlsIjoiYWNjb3VudHNAYXV0b2luc3BlY3QzNjAuY29tIn0sInZlbmRvciI6eyJpZCI6MzE1LCJzdGF0dXMiOiJhY3RpdmUiLCJpcCI6WyI1NC44Ni41MC4xMzkiLCIxNTQuMTkyLjEzNC42MyIsIjExNi43MS4xODMuMTk3IiwiMTU0LjE5Mi4wLjAiLCIxNTQuMTkyLjI1NS4yNTUiLCIxMTYuNzEuMC4wIiwiMTE2LjcxLjI1NS4yNTUiLCIxNTQuMTkyLjEzNS43IiwiMmEwMTo0Zjk6MzA4MDozZmMzOjoyIl19LCJpYXQiOjE3Mjc2OTc0NTYsImV4cCI6MTczMDI4OTQ1Nn0.gp2hTLFqG_z0O8JJiQ0ZpuqeYm0txGkimmDCcMB3g6o',
        )
    );

    $response = wp_remote_get($api_url, $args);
    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    $response_headers = wp_remote_retrieve_headers($response);

    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        error_log(print_r($response, true));  // Log full error for debugging
        return "Something went wrong: $error_message";  
    }

    if ($response_code !== 200) {
        $error_message = "Request failed with status code: $response_code";
        error_log("Error response code: $response_code");
        error_log("Response body: " . print_r($response_body, true));
        return $error_message . " " . $response_body;  
    }

    if (isset($response_headers['content-type']) && $response_headers['content-type'] === 'application/pdf') {
        $file_name = 'vin_report_' . $vin . '.pdf';
        if (isset($response_headers['content-disposition'])) {
            preg_match('/filename="(.+)"/', $response_headers['content-disposition'], $matches);
            $file_name = $matches[1] ?? $file_name;
        }

        $upload_dir = wp_upload_dir();
        $file_path = $upload_dir['path'] . '/' . $file_name;
        $file_url = $upload_dir['url'] . '/' . $file_name;

        if (file_put_contents($file_path, $response_body)) {
            return $file_url;  // Return the URL of the saved PDF
        } else {
            return new WP_Error('pdf_save_failed', 'Failed to save PDF.');
        }
    } else {
        return new WP_Error('request_failed', 'Failed to retrieve PDF, or incorrect content type.');
    }
}

// Handle VIN form submission
if (isset($_POST['submit_vin'])) {
    $vin = sanitize_text_field($_POST['vin']);

    // Call the API to get the report
    $result = call_vin_api($vin);

    if (is_wp_error($result)) {
        $error_message = $result->get_error_message();
        echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">' . esc_html($error_message) . '</div>';
    } elseif (filter_var($result, FILTER_VALIDATE_URL)) {
        save_vin_request($vin, $result);
        echo '<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">VIN report successfully retrieved and saved.</div>';
    } else {
        echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">An unknown error occurred.</div>';
    }
}

// Updated UI
?>
<div class="container mx-auto px-4 py-12 max-w-4xl">
    <h1 class="text-4xl font-bold mb-8 text-center text-gray-800">VIN Report Generator</h1>
    
    <!-- VIN Input Form -->
    <div class="bg-white shadow-lg rounded-lg p-8 mb-12">
        <h2 class="text-2xl font-semibold mb-6 text-gray-700">Enter VIN Number</h2>
        <form method="POST" class="space-y-6">
            <div>
                <label for="vin" class="block text-sm font-medium text-gray-700 mb-2">VIN Number</label>
                <input type="text" id="vin" name="vin" required
                    class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                    placeholder="Enter 17-digit VIN">
            </div>
            <div>
                <button type="submit" name="submit_vin"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 transform hover:-translate-y-1">
                    Generate Report
                </button>
            </div>
        </form>
    </div>

    <!-- Previous VIN Requests -->
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-semibold mb-6 text-gray-700">Previous VIN Requests</h2>
        <form method="GET" action="admin.php" class="mb-8">
            <input type="hidden" name="page" value="vin-request-page" />
            <div class="flex space-x-4">
                <input type="text" name="search_vin" placeholder="Search by VIN" 
                    class="flex-grow px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                    Search
                </button>
            </div>
        </form>

        <?php
        global $wpdb;
        
        // Handle search query
        $search_vin = isset($_GET['search_vin']) ? sanitize_text_field($_GET['search_vin']) : '';

        // Modify the query to filter by the search term, if provided
        if (!empty($search_vin)) {
            $requests = $wpdb->get_results(
                $wpdb->prepare("SELECT * FROM {$wpdb->prefix}vin_requests WHERE vin LIKE %s ORDER BY date DESC", '%' . $wpdb->esc_like($search_vin) . '%')
            );
        } else {
            $requests = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}vin_requests ORDER BY date DESC");
        }

        if ($requests) {
            echo '<div class="overflow-x-auto bg-white rounded-lg">';
            echo '<table class="min-w-full divide-y divide-gray-200">';
            echo '<thead class="bg-gray-50"><tr>';
            echo '<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">VIN</th>';
            echo '<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report</th>';
            echo '<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>';
            echo '<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>';
            echo '</tr></thead>';
            echo '<tbody class="bg-white divide-y divide-gray-200">';
            foreach ($requests as $request) {
                echo '<tr>';
                echo '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . esc_html($request->vin) . '</td>';
                echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><a href="' . esc_url($request->pdf_url) . '" class="text-blue-600 hover:text-blue-800 transition duration-300">View Report</a></td>';
                echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><button class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 rounded-md transition duration-300" onclick="copyToClipboard(\'' . esc_url($request->pdf_url) . '\')">Copy URL</button></td>';
                echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . esc_html($request->date) . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p class="text-gray-600 text-center py-4">No previous requests found.</p>';
        }
        ?>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('URL copied to clipboard');
            }, function(err) {
                console.error('Failed to copy: ', err);
                alert('Failed to copy URL. Please try again.');
            });
        }
    </script>
</div>