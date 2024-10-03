<?php

// Constants for API settings
define('API_BASE_URL', 'https://www.clearvin.com/rest/vendor/report');
define('API_FORMAT', 'pdf');
define('API_REPORT_TEMPLATE', '2021');
define('API_AUTH_TOKEN', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbnZpcm9ubWVudCI6InRlc3QiLCJ1c2VyIjp7ImlkIjoyMjY4MzIsImVtYWlsIjoiYWNjb3VudHNAYXV0b2luc3BlY3QzNjAuY29tIn0sInZlbmRvciI6eyJpZCI6MzE1LCJzdGF0dXMiOiJhY3RpdmUiLCJpcCI6WyI1NC44Ni41MC4xMzkiLCIxNTQuMTkyLjEzNC42MyIsIjExNi43MS4xODMuMTk3IiwiMTU0LjE5Mi4wLjAiLCIxNTQuMTkyLjI1NS4yNTUiLCIxMTYuNzEuMC4wIiwiMTE2LjcxLjI1NS4yNTUiLCIxNTQuMTkyLjEzNS43IiwiMmEwMTo0Zjk6MzA4MDozZmMzOjoyIl19LCJpYXQiOjE3Mjc2OTc0NTYsImV4cCI6MTczMDI4OTQ1Nn0.gp2hTLFqG_z0O8JJiQ0ZpuqeYm0txGkimmDCcMB3g6o');

function call_vin_api($vin) {
    $api_url = API_BASE_URL . "?vin=" . urlencode($vin) . "&format=" . API_FORMAT . "&reportTemplate=" . API_REPORT_TEMPLATE;
    $args = [
        'headers' => [
            'Authorization' => API_AUTH_TOKEN
        ]
    ];

    $response = wp_remote_get($api_url, $args);
    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    $response_headers = wp_remote_retrieve_headers($response);

    if (is_wp_error($response)) {
        error_log(print_r($response, true));
        return new WP_Error('api_error', 'Something went wrong: ' . $response->get_error_message());
    }

    if ($response_code !== 200) {
        error_log("Error response code: $response_code");
        error_log("Response body: " . print_r($response_body, true));
        return new WP_Error('api_request_failed', "Request failed with status code: $response_code " . $response_body);
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
            return $file_url;
        } else {
            return new WP_Error('pdf_save_failed', 'Failed to save PDF.');
        }
    } else {
        return new WP_Error('invalid_content_type', 'Failed to retrieve PDF, or incorrect content type.');
    }
}

// Handle VIN form submission
if (isset($_POST['submit_vin'])) {
    $vin = sanitize_text_field($_POST['vin']);
    $result = call_vin_api($vin);

    if (is_wp_error($result)) {
        echo '<div class="alert alert-danger">' . esc_html($result->get_error_message()) . '</div>';
    } elseif (filter_var($result, FILTER_VALIDATE_URL)) {
        save_vin_request($vin, $result);
        echo '<div class="alert alert-success">VIN report successfully retrieved and saved.</div>';
    } else {
        echo '<div class="alert alert-danger">An unknown error occurred.</div>';
    }
}

?>
<div class="container mx-auto px-4 py-12 max-w-4xl">
    <h1 class="text-4xl font-bold mb-8 text-center">VIN Report Generator</h1>
    
    <div class="card">
        <h2 class="card-header">Enter VIN Number</h2>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="vin">VIN Number</label>
                    <input type="text" id="vin" name="vin" required class="form-control" placeholder="Enter 17-digit VIN">
                </div>
                <button type="submit" name="submit_vin" class="btn btn-primary">Generate Report</button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <h2 class="card-header">Previous VIN Requests</h2>
        <div class="card-body">
            <form method="GET" action="admin.php">
                <input type="hidden" name="page" value="vin-request-page">
                <div class="input-group mb-3">
                    <input type="text" name="search_vin" class="form-control" placeholder="Search by VIN">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <?php
            global $wpdb;
            $search_vin = isset($_GET['search_vin']) ? sanitize_text_field($_GET['search_vin']) : '';
            $requests = !empty($search_vin) ? $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}vin_requests WHERE vin LIKE %s ORDER BY date DESC", '%' . $wpdb->esc_like($search_vin) . '%')) : $wpdb->get_results("SELECT * FROM {$wpdb->prefix}vin_requests ORDER BY date DESC");

            if ($requests) {
                echo '<table class="table">';
                echo '<thead><tr><th>VIN</th><th>Report</th><th>Actions</th><th>Date</th></tr></thead>';
                echo '<tbody>';
                foreach ($requests as $request) {
                    echo '<tr>';
                    echo '<td>' . esc_html($request->vin) . '</td>';
                    echo '<td><a href="' . esc_url($request->pdf_url) . '" class="btn btn-link">View Report</a></td>';
                    echo '<td><button class="btn btn-secondary" onclick="copyToClipboard(\'' . esc_url($request->pdf_url) . '\')">Copy URL</button></td>';
                    echo '<td>' . esc_html($request->date) . '</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo '<p class="text-center">No previous requests found.</p>';
            }
            ?>
        </div>
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