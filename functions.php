<?php


function enqueue_tailwind_styles()
{
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/tailwind/tailwind.min.css', array(), '2.2.20');
}
add_action('wp_enqueue_scripts', 'enqueue_tailwind_styles');
add_action('admin_enqueue_scripts', 'enqueue_tailwind_styles');

// Add WooCommerce support and make sure styles are loaded
function mytheme_woocommerce_setup()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_woocommerce_setup');

// Enqueue WooCommerce styles
function mytheme_enqueue_woocommerce_styles()
{
    wp_enqueue_style('woocommerce-general');
    wp_enqueue_style('woocommerce-layout');
    wp_enqueue_style('woocommerce-smallscreen');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_woocommerce_styles');

// Pre-fill VIN field on checkout if query parameter exists
add_filter('woocommerce_checkout_fields', 'pre_fill_vin_field');

function pre_fill_vin_field($fields)
{
    if (isset($_GET['vin'])) {
        $vin_number = sanitize_text_field($_GET['vin']);
        $fields['billing']['billing_vin']['default'] = $vin_number;
    }
    return $fields;
}

add_action('template_redirect', 'auto_add_package_to_cart');

function auto_add_package_to_cart()
{
    // Only add the product to the cart if it's not already in the cart
    if (is_checkout() && !is_wc_endpoint_url('order-received')) {
        // Define the product ID or variation ID of the package you want to add
        $product_id = 14; // Replace with your product/package ID

        // Check if the product is already in the cart
        $found = false;
        foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
            $_product = $values['data'];
            if ($_product->get_id() == $product_id) {
                $found = true;
            }
        }

        // If the product is not in the cart, add it
        if (!$found) {
            WC()->cart->add_to_cart($product_id);
        }
    }
}

function enqueue_tailwind_css()
{
    wp_enqueue_style('tailwind-css', get_template_directory_uri() . '/tailwind/tailwind.min.css', array(), '2.2.20');
}
add_action('wp_enqueue_scripts', 'enqueue_tailwind_css');

function register_my_menus()
{
    register_nav_menus(
        array(
            'primary' => __('Primary Menu'),
            'footer' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_my_menus');

// Add Admin Page for VIN Requests
function register_vin_request_page()
{
    add_menu_page(
        'VIN Requests',
        'VIN Requests',
        'manage_options',
        'vin-request-page',
        'vin_request_page_html'
    );
}
add_action('admin_menu', 'register_vin_request_page');

function vin_request_page_html()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    // Include the form and request table here

    include_once 'admin-vin-page.php'; // Include separate file for form and table
}

// Add this new function to handle the AJAX request
function process_vin_api_response()
{
    if (!isset($_POST['vin']) || !isset($_POST['api_response'])) {
        wp_send_json_error('Invalid request');
    }

    $vin = sanitize_text_field($_POST['vin']);
    $api_response = $_POST['api_response'];

    // Save the HTML content to a file and get the URL
    $upload_dir = wp_upload_dir();
    $file_name = 'vin_report_' . $vin . '.html';
    $file_path = $upload_dir['path'] . '/' . $file_name;
    $file_url = $upload_dir['url'] . '/' . $file_name;

    if (file_put_contents($file_path, $api_response)) {
        // Save the VIN request to the database
        save_vin_request($vin, $file_url);
        wp_send_json_success('VIN report successfully retrieved and saved.');
    } else {
        wp_send_json_error('Unable to save the VIN report.');
    }
}
add_action('wp_ajax_process_vin_api_response', 'process_vin_api_response');
add_action('wp_ajax_nopriv_process_vin_api_response', 'process_vin_api_response');



// Keep the save_vin_request function as it is
function save_vin_request($vin, $pdf_url)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'vin_requests';
    $wpdb->insert($table_name, [
        'vin' => $vin,
        'pdf_url' => $pdf_url,
        'date' => current_time('mysql')
    ]);
}

// Create the table on plugin activation
function create_vin_requests_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'vin_requests';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        vin varchar(255) NOT NULL,
        pdf_url varchar(255) NOT NULL,
        date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'create_vin_requests_table');

function extract_report_url($api_response)
{
    // Extract the report URL from the API response
    // Modify this function based on the actual structure of your API response
    if (isset($api_response['report_url'])) {
        return $api_response['report_url'];
    }
    return false;
}

