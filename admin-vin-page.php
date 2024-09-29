<?php

// Function to call the ClearVIN API
function call_vin_api($vin)
{
    $api_url = "https://www.clearvin.com/rest/vendor/report?vin=" . urlencode($vin) . "&format=html&reportTemplate=2021";
    $args = array(
        'headers' => array(
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbnZpcm9ubWVudCI6InRlc3QiLCJ1c2VyIjp7ImlkIjoyMjY4MzIsImVtYWlsIjoiYWNjb3VudHNAYXV0b2luc3BlY3QzNjAuY29tIn0sInZlbmRvciI6eyJpZCI6MzE1LCJzdGF0dXMiOiJhY3RpdmUiLCJpcCI6WyI1NC44Ni41MC4xMzkiLCIxNTQuMTkyLjEzNC42MyIsIjExNi43MS4xODMuMTk3IiwiMTU0LjE5Mi4wLjAiLCIxNTQuMTkyLjI1NS4yNTUiLCIxMTYuNzEuMC4wIiwiMTE2LjcxLjI1NS4yNTUiLCIxNTQuMTkyLjEzNS43Il19LCJpYXQiOjE3MjY3NTQwMTEsImV4cCI6MTcyOTM0NjAxMX0.AGISkKeWGmLRtNkFfo--Ovt574hRl3PS2oT83-a1sjs'
        )
    );

    $response = wp_remote_get($api_url, $args);


    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        echo "Something went wrong: $error_message";
        error_log(print_r($response, true));
        return "Something went wrong: $error_message";  // Return error message to handle in form

    }


    // Get the response code
    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);


    // Handle all responses except 200 OK
    if ($response_code !== 200) {
        $error_message = "Request failed with status code: $response_code";
        error_log("Error response code: $response_code");
        error_log("Response body: " . print_r($response_body, true));
        return $error_message . " " . $response_body;  // Return error message to handle in form
    }

    // If successful (status code 200)
    if ($response_code === 200) {
        // Save the HTML content to a file and return the URL
        $upload_dir = wp_upload_dir();
        $file_name = 'vin_report_' . $vin . '.html';
        $file_path = $upload_dir['path'] . '/' . $file_name;
        $file_url = $upload_dir['url'] . '/' . $file_name;

        if (file_put_contents($file_path, $response_body)) {
            return $file_url;  // Return the file URL on success
        }
    }

    return "Unknown error occurred while fetching the VIN report.";  // Return default error message
}

// Handle VIN form submission
if (isset($_POST['submit_vin'])) {
    $vin = sanitize_text_field($_POST['vin']);

    // Call the API to get the HTML report
    $result = call_vin_api($vin);

    // Check if $result is a URL (success case) or an error message
    if (filter_var($result, FILTER_VALIDATE_URL)) {
        // Save the VIN request to the database
        save_vin_request($vin, $result);
        echo '<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">VIN report successfully retrieved and saved.</div>';
    } else {
        // Display error message inside the styled error block
        echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">' . esc_html($result) . '</div>';
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
    // Display previous requests
    global $wpdb;
    $requests = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}vin_requests ORDER BY date DESC");

    if ($requests) {
        echo '<div class="overflow-x-auto bg-white shadow-md rounded">';
        echo '<table class="w-full table-auto">';
        echo '<thead><tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal"><th class="py-3 px-6 text-left">VIN</th><th class="py-3 px-6 text-left">Report</th><th class="py-3 px-6 text-left">Date</th></tr></thead>';
        echo '<tbody>';
        foreach ($requests as $request) {
            echo '<tr class="border-b border-gray-200 hover:bg-gray-100">';
            echo '<td class="py-3 px-6 text-left">' . esc_html($request->vin) . '</td>';
            echo '<td class="py-3 px-6 text-left"><a href="' . esc_url($request->pdf_url) . '" class="text-blue-500 hover:text-blue-700 transition duration-300">View Report</a></td>';
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
</div>