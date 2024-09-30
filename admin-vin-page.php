<?php

// Function to call the ClearVIN API
function call_vin_api($vin)
{
    $api_url = "https://www.clearvin.com/rest/vendor/report?vin=" . urlencode($vin) . "&format=pdf&reportTemplate=2021";
    
    // Use a secure method to retrieve the authorization token
//     $authorization_token = get_option('clearvin_api_token'); // Fetch token from DB or an env file
    
//     if (!$authorization_token) {
//         return new WP_Error('missing_token', 'Authorization token is missing.');
//     }
    
    $args = array(
        'headers' => array(
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbnZpcm9ubWVudCI6InRlc3QiLCJ1c2VyIjp7ImlkIjoyMjY4MzIsImVtYWlsIjoiYWNjb3VudHNAYXV0b2luc3BlY3QzNjAuY29tIn0sInZlbmRvciI6eyJpZCI6MzE1LCJzdGF0dXMiOiJhY3RpdmUiLCJpcCI6WyI1NC44Ni41MC4xMzkiLCIxNTQuMTkyLjEzNC42MyIsIjExNi43MS4xODMuMTk3IiwiMTU0LjE5Mi4wLjAiLCIxNTQuMTkyLjI1NS4yNTUiLCIxMTYuNzEuMC4wIiwiMTE2LjcxLjI1NS4yNTUiLCIxNTQuMTkyLjEzNS43IiwiMmEwMTo0Zjk6MzA4MDozZmMzOjoyIl19LCJpYXQiOjE3Mjc2OTc0NTYsImV4cCI6MTczMDI4OTQ1Nn0.gp2hTLFqG_z0O8JJiQ0ZpuqeYm0txGkimmDCcMB3g6o',
        )
    );

    $response = wp_remote_get($api_url, $args);
	 $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    $response_headers = wp_remote_retrieve_headers($response);
  // Display the response for debugging purposes
// Assuming $response_body contains the JSON response as a string
// echo "<pre>";
// $response_array = json_decode($response_body, true); // Decoding JSON string to an associative array
// echo "</pre>";

// // Check if decoding was successful and if 'html_report' exists
// if (isset($response_array['result']['html_report'])) {
//     // Print the 'html_report' content
//     echo $response_array['result']['html_report'];
// 	 error_log(print_r($response_array['result']['html_report'], true));
// } else {
//     echo "HTML report not found.";
// 	 error_log('HTML report not found.', true);
// }
// 	return;
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

// VIN Input Form
?>
<div class="container mx-auto px-4 py-8 max-w-2xl !important">
    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800 !important">Enter VIN Number</h2>
    <form method="POST" class="mb-12 bg-white shadow-md rounded px-8 pt-6 pb-8">
        <div class="mb-6">
            <label for="vin" class="block text-gray-700 text-sm font-bold mb-2">Enter VIN Number</label>
            <input type="text" id="vin" name="vin" required
                class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-300">
        </div>
        <div class="flex items-center justify-center">
            <button type="submit" name="submit_vin"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline transition duration-300 transform hover:scale-105">Submit</button>
        </div>
    </form>

    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Previous VIN Requests</h2>
    <?php
    global $wpdb;
    $requests = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}vin_requests ORDER BY date DESC");

    if ($requests) {
      echo '<div class="overflow-x-auto bg-white shadow-md rounded">';
        echo '<table class="w-full table-auto">';
        echo '<thead><tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">';
        echo '<th class="py-3 px-6 text-left">VIN</th>';
        echo '<th class="py-3 px-6 text-left">Report</th>';
        echo '<th class="py-3 px-6 text-left">Copy URL</th>';
        echo '<th class="py-3 px-6 text-left">Date</th>';
        echo '</tr></thead>';
        echo '<tbody>';
         foreach ($requests as $request) {
            echo '<tr class="border-b border-gray-200 hover:bg-gray-100">';
            echo '<td class="py-3 px-6 text-left">' . esc_html($request->vin) . '</td>';
            echo '<td class="py-3 px-6 text-left"><a href="' . esc_url($request->pdf_url) . '" class="text-blue-500 hover:text-blue-700 transition duration-300">View Report</a></td>';
            echo '<td class="py-3 px-6 text-left"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="copyToClipboard(\'' . esc_url($request->pdf_url) . '\')">Copy URL</button></td>';
            echo '<td class="py-3 px-6 text-left">' . esc_html($request->date) . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p class="text-gray-600 text-center">No requests found.</p>';
    }
    ?>
	
	<script>
// Function to copy the URL to the clipboard
function copyToClipboard(url) {
    navigator.clipboard.writeText(url).then(function() {
        alert("Copied the URL: " + url);
    }, function(err) {
        alert("Failed to copy the URL: ", err);
    });
}
</script>
</div>
