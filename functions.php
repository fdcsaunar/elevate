<?php

// Load Stylesheets
function load_stylesheets()
{
    wp_register_style('stylesheet', get_stylesheet_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');

    wp_register_style('custom', get_template_directory_uri() . '/app.css', '', 1, 'all');
    wp_enqueue_style('custom');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');




// Add support
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Add image sizes
add_image_size('post_image', 1100, 500, false);


// Register
register_nav_menus(
    array(
        'top-menu' => 'Top Menu',
    )
);


// // Load Google Fonts
// function wpb_add_google_fonts()
// {
//     wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false);
// }
// add_action('wp_enqueue_scripts', 'wpb_add_google_fonts');

// function wpb_add_google_fonts2()
// {
//     wp_enqueue_style('wpb-google-fonts2', 'https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap', false);
// }
// add_action('wp_enqueue_scripts', 'wpb_add_google_fonts2');


// Add Woocommerce
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

//add_filter( 'woocommerce_enqueue_styles', '__return_false' );


function cfwc_create_custom_field()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $val = $product->get_meta('barcode');
    $args = array(
        'id' => 'barcode',
        'label' => __('Barcode', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Barcode', 'ctwc'),
        'value' => $val
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_field');

function cfwc_save_custom_field($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['barcode']) ? $_POST['barcode'] : '';
    $product->update_meta_data('barcode', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field');

// function cfwc_display_custom_field()
// {
//     global $post;
//     // Check for the custom field value
//     $product = wc_get_product($post->ID);
//     $title = $product->get_meta('barcode');
//     if ($title) {
//         // Only display our field if we've got a value for the field title
//         printf(
//             '<div class="product_meta">
//                     <span class="cfwc-custom-field-wrapper">
//                     <span class="cfwc-title-field">%s</span>
//                     </span>
//                     </div>',
//             esc_html($title)
//         );
//     }
// }
// add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field');

// PRODUCT CATEGORY

function cfwc_create_custom_field2()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $val = $product->get_meta('prodcat');
    $args = array(
        'id' => 'prodcat',
        'label' => __('Product Category', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Product Category', 'ctwc'),
        'value' => $val
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_field2');

function cfwc_save_custom_field2($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['prodcat']) ? $_POST['prodcat'] : '';
    $product->update_meta_data('prodcat', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field2');

// function cfwc_display_custom_field2()
// {
//     global $post;
//     // Check for the custom field value
//     $product = wc_get_product($post->ID);
//     $title = $product->get_meta('prodcat');
//     if ($title) {
//         // Only display our field if we've got a value for the field title
//         printf(
//             '<div class="product_meta">
//                     <span class="cfwc-custom-field-wrapper">
//                     Category: <span class="cfwc-title-field">%s</span>
//                     </span>
//                     </div>',
//             esc_html($title)
//         );
//     }
// }
// add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field2');

// PRODUCT BRAND

function cfwc_create_custom_field3()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $val = $product->get_meta('prodbrand');
    $args = array(
        'id' => 'prodbrand',
        'label' => __('Product Brand', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Product Brand', 'ctwc'),
        'value' => $val
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_field3');

function cfwc_save_custom_field3($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['prodbrand']) ? $_POST['prodbrand'] : '';
    $product->update_meta_data('prodbrand', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field3');

// function cfwc_display_custom_field3()
// {
//     global $post;
//     // Check for the custom field value
//     $product = wc_get_product($post->ID);
//     $title = $product->get_meta('brand');
//     if ($title) {
//         // Only display our field if we've got a value for the field title
//         printf(
//             '<div class="product_meta">
//                     <span class="cfwc-custom-field-wrapper">
//                     Brand: <span class="cfwc-title-field">%s</span>
//                     </span>
//                     </div>',
//             esc_html($title)
//         );
//     }
// }
// add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field3');


// MINIMUM ORDER QUANTITY

function cfwc_create_custom_field4()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $val = $product->get_meta('moqty');
    $args = array(
        'id' => 'moqty',
        'label' => __('Minimum Order Quantity', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Minimum Order Quantity', 'ctwc'),
        'value' => $val
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_field4');

function cfwc_save_custom_field4($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['moqty']) ? $_POST['moqty'] : '';
    $product->update_meta_data('moqty', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field4');

function cfwc_display_custom_field4()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $title = $product->get_meta('min_quantity');
    // var_dump($product);
    if ($title) {
        // Only display our field if we've got a value for the field title
        echo '<div class="product_meta min_quantity"><h3>Min Order Qty: <span class="min_quantity">'.$title.'</span></h3></div>';
    }
}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field4');


// BONUS PRODUCTS

// function cfwc_create_custom_field5()
// {
//     $args = array(
//         'id' => 'bonusprod',
//         'label' => __('Bonus Products', 'cfwc'),
//         'class' => 'cfwc-custom-field',
//         'desc_tip' => true,
//         'description' => __('Bonus Products', 'ctwc'),
//     );
//     woocommerce_wp_text_input($args);
// }
// add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_field5');

// function cfwc_save_custom_field5($post_id)
// {
//     $product = wc_get_product($post_id);
//     $title = isset($_POST['bonusprod']) ? $_POST['bonusprod'] : '';
//     $product->update_meta_data('bonusprod', sanitize_text_field($title));
//     $product->save();
// }
// add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field5');

// function cfwc_display_custom_field5()
// {
//     $bonusprod = get_post_meta(get_the_ID(), 'bonusprod');
//     if (!empty($bonusprod) && $bonusprod[0] != '') :
//         $prod = get_page_by_path($bonusprod[0], OBJECT, 'product');
//         // echo $prod->ID;
//         echo '<div class="bonus-item-meta">';
//         echo '<img src="' . get_the_post_thumbnail_url($prod->ID) . '">';
//         echo '<a href="' . get_permalink($prod->ID) . '" class="cfwc-custom-field-wrapper">Bonus Product/s: ' . $bonusprod[0] . '</a>';
//         echo '</div>';
//     endif;
// }
// add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field5');


// BULK BuY Quantity

function cfwc_create_custom_field6()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $val = $product->get_meta('bulkbuy1_qty');
    $args = array(
        'id' => 'bulkbuy1_qty',
        'label' => __('Bulk Buy Quantity 1', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Bulk Buy Quantity 1', 'ctwc'),
        'value' => $val
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_field6');

function cfwc_save_custom_field6($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['bulkbuy1_qty']) ? $_POST['bulkbuy1_qty'] : '';
    $product->update_meta_data('bulkbuy1_qty', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field6');

function cfwc_display_custom_field6()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $title = $product->get_meta('bulkbuy1_qty');
    if ($title) {
        // Only display our field if we've got a value for the field title
        printf(
            '<div class="product_meta">
                    <span class="cfwc-custom-field-wrapper">Bulk Buy
                    <span class="cfwc-title-field">%s</span>
                    </span>
                    </div>',
            esc_html($title)
        );
    }
}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field6');

// functions
add_action('wp_enqueue_scripts', 'themeprefix_slick_enqueue_scripts_styles');

// Enqueue Slick scripts and styles
function themeprefix_slick_enqueue_scripts_styles()
{

    wp_enqueue_script('slickjs', get_stylesheet_directory_uri() . '/js/slick.min.js', array('jquery'), '1.6.0', true);
    wp_enqueue_script('slickjs-init', get_stylesheet_directory_uri() . '/js/slick-init.js', array('slickjs'), '1.6.0', true);

    wp_enqueue_style('slickcss', get_stylesheet_directory_uri() . '/css/slick.css', '1.6.0', 'all');
    wp_enqueue_style('slickcsstheme', get_stylesheet_directory_uri() . '/css/slick-theme.css', '1.6.0', 'all');
}


// Load JavaScript
function load_javascript()
{
    wp_register_script('custom', get_template_directory_uri() . '/app.js', 'jquery', time(), true);
    wp_enqueue_script('custom');
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', 'jquery', time(), true);
    wp_localize_script('custom-js', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'load_javascript');

add_shortcode('wc_reg_form_bbloomer', 'bbloomer_separate_registration_form');

function bbloomer_separate_registration_form()
{
    if (is_admin()) {
        header("Location: /my-account");
        die;
    }
    if (is_user_logged_in()) {
        header("Location: /my-account");
        die;
    }
    ob_start();

    // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
    // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY

    do_action('woocommerce_before_customer_login_form');

?>
    <div class="woocommerce container registration">
        <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

            <?php do_action('woocommerce_register_form_start'); ?>

            <div class="email-password">

                <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide half_width newr">
                        <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?> <span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                        ?>
                    </p>

                <?php endif; ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?> <span class="required">*</span></label>
                    <input placeholder="Email" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                            ?>
                </p>

                <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide half_width newr">
                        <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?> <span class="required">*</span></label>
                        <input placeholder="Password" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                    </p>

                <?php else : ?>

                    <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

                <?php endif; ?>

                <?php do_action('woocommerce_register_form'); ?>

            </div>

            <p class="woocommerce-FormRow form-row button-wrap">
                <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
            </p>

            <p class="woocommerce-LostPassword lost_password">
                Already have an account? <a href="/my-account/">Log In</a> here.
            </p>

            <?php do_action('woocommerce_register_form_end'); ?>

        </form>
    </div>

<?php

    return ob_get_clean();
}

// Add a second password field to the checkout page in WC 3.x.
add_filter('woocommerce_checkout_fields', 'wc_add_confirm_password_checkout', 10, 1);
function wc_add_confirm_password_checkout($checkout_fields)
{
    if (get_option('woocommerce_registration_generate_password') == 'no') {
        $checkout_fields['account']['account_password2'] = array(
            'type'              => 'password',
            'label'             => __('Confirm password', 'woocommerce'),
            'required'          => true,
            'placeholder'       => _x('Confirm Password', 'placeholder', 'woocommerce')
        );
    }

    return $checkout_fields;
}

// Check the password and confirm password fields match before allow checkout to proceed.
add_action('woocommerce_after_checkout_validation', 'wc_check_confirm_password_matches_checkout', 10, 2);
function wc_check_confirm_password_matches_checkout($posted)
{
    $checkout = WC()->checkout;
    if (!is_user_logged_in() && ($checkout->must_create_account || !empty($posted['createaccount']))) {
        if (strcmp($posted['account_password'], $posted['account_password2']) !== 0) {
            wc_add_notice(__('Passwords do not match.', 'woocommerce'), 'error');
        }
    }
}
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

// function custom_redirect() {        
//     if( is_shop() && ! is_user_logged_in() ) {
//         wp_redirect( home_url() ); 
//         exit();
//     }   
// }

// add_action("template_redirect","custom_redirect");


// function wpse_131562_redirect() {
//     if (!is_user_logged_in() && (is_woocommerce() || is_cart() || is_checkout()) ) {
//         // feel free to customize the following line to suit your needs
//         wp_redirect( site_url('my-account') );
//         exit; 
//     }
// }
// add_action('template_redirect', 'wpse_131562_redirect');  

function redirectemall()
{

    if (!is_user_logged_in()) {
        if (is_woocommerce() || is_shop() || is_cart() || is_checkout()) {
            wp_redirect(site_url("my-account"));
            exit;
        }
    }
}

add_action('template_redirect', 'redirectemall');




add_action('woocommerce_single_product_summary', 'bbloomer_product_sold_count', 11);

function bbloomer_product_sold_count()
{
    global $product;
    $units_sold = $product->get_total_sales();
    if ($units_sold) echo '<p>' . sprintf(__('Units Sold: %s', 'woocommerce'), $units_sold) . '</p>';
}

add_action('woocommerce_after_add_to_cart_button', 'customSingleDisclaimer', 11);

function customSingleDisclaimer()
{
    echo '<p class="disclaimer">Images are for reference purposes only – images may vary from actual product.</p>';
}

show_admin_bar(true);

add_action('parse_request', 'elevate_cstm_checkout');
function elevate_cstm_checkout()
{
    $url = strtok($_SERVER["REQUEST_URI"], '?');
    if ($url == '/custom-checkout' && wp_verify_nonce( $_REQUEST['nonce'], "elevate_cstm_checkout_nonce")) {
        $usr = wp_get_current_user();
        $cart_fragments = [];

        update_option('elevate_cstm_cart_'.$usr->ID, []);

        // $_SESSION['elevate_cstm_cart'] = [];
        $products = explode(',', $_GET['products']);
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
            if (!in_array($product_id, $products)) {
                $cart_fragments[]['product_id'] = $product_id;
                if ($cart_item_key) WC()->cart->remove_cart_item($cart_item_key);
            }
        }
        update_option('elevate_cstm_cart_'.$usr->ID, $cart_fragments);
        wp_redirect('/checkout/');
        exit;
    } else {
        wp_redirect('/checkout/');
    }
}

function vs_wc_add_my_account_orders_column( $columns ) {

	$new_columns = array();

	foreach ( $columns as $key => $name ) {

		$new_columns[ $key ] = $name;

		// add ship-to after order status column
		if ( 'order-status' === $key ) {
			$new_columns['order-supplier-name'] = __( 'Supplier', 'elevate' );
		}
	}

	return $new_columns;
}
add_filter( 'woocommerce_my_account_my_orders_columns', 'vs_wc_add_my_account_orders_column' );

/**
 * Adds data to the custom "ship to" column in "My Account > Orders".
 *
 * @param \WC_Order $order the order object for the row
 */
function vs_wc_my_orders_supplier_name( $order ) {
    $items = $order->get_items();
    foreach ( $items as $item ) {
        $product_id = $item->get_product_id();
    }
    $term_list = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));
    $term = get_term_by( 'id', $term_list[0], 'product_cat', 'ARRAY_A' );

	// $formatted_shipping = $order->get_formatted_shipping_address();

	echo $term['name'];
}
add_action( 'woocommerce_my_account_my_orders_column_order-supplier-name', 'vs_wc_my_orders_supplier_name' );
function vs_wc_add_my_account_store_order_number( $columns ) {

	$new_columns = array();

	foreach ( $columns as $key => $name ) {

		$new_columns[ $key ] = $name;

		// add ship-to after order status column
		if ( 'order-supplier-name' === $key ) {
			$new_columns['order-store-number'] = __( 'Store Order No.', 'elevate' );
		}
	}

	return $new_columns;
}
add_filter( 'woocommerce_my_account_my_orders_columns', 'vs_wc_add_my_account_store_order_number' );

/**
 * Adds data to the custom "ship to" column in "My Account > Orders".
 *
 * @param \WC_Order $order the order object for the row
 */
function vs_wc_my_orders_store_number( $order ) {
    $items = $order->get_items();
    foreach ( $items as $item ) {
        $product_id = $item->get_product_id();
    }
    $order_number = get_post_meta( $order->get_id(), '_billing_cstm_wp_order_number', true );

// displaying the array of values (just to test and to see output)
echo $order_number;
}
add_action( 'woocommerce_my_account_my_orders_column_order-store-number', 'vs_wc_my_orders_store_number' );

// add_action('wp_ajax_search_woocommerce_ajax_add_to_cart',  'search_woocommerce_ajax_add_to_cart');
// add_action('wp_ajax_nopriv_search_woocommerce_ajax_add_to_cart',  'search_woocommerce_ajax_add_to_cart');
// function search_woocommerce_ajax_add_to_cart()
// {
//     $title = $_REQUEST['post_title'];
//     $prod = get_page_by_title( $title, OBJECT, 'product' );
//     WC()->cart->add_to_cart($prod->ID);
//     echo 'Success';
//     die();

// }

// add_action('parse_request', 'elevate_search_add_to_cart');
// function elevate_search_add_to_cart()
// {
//     // echo $_SERVER["REQUEST_URI"];
//     // $url = strtok($_SERVER["REQUEST_URI"], '?');
//     // $arr = explode('-', $url);
//     // print_r($arr);
//     // var_dump(strpos( $url, 'elevate-search' ));
//     if( $_SERVER["REQUEST_URI"] == '/elevatesearch-add-to-cart' ){
//         $title = urldecode( $_REQUEST['post_title'] );
//         $prod = get_page_by_title( $title, OBJECT, 'product' );
//         WC()->cart->add_to_cart($prod->ID);
//         wp_redirect('/cart/');
//     }
// }

// BULK BuY Quantity

function cfwc_create_custom_field7()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $val = $product->get_meta('bulkbuy2_qty');
    $args = array(
        'id' => 'bulkbuy2_qty',
        'label' => __('Bulk Buy Quantity 2', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Bulk Buy Quantity 2', 'ctwc'),
        'value' => $val
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_field7');

function cfwc_save_custom_field7($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['bulkbuy2_qty']) ? $_POST['bulkbuy2_qty'] : '';
    $product->update_meta_data('bulkbuy2_qty', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field7');

function cfwc_display_custom_field7()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $title = $product->get_meta('bulkbuy2_qty');
    if ($title) {
        // Only display our field if we've got a value for the field title
        printf(
            '<div class="product_meta">
                    <span class="cfwc-custom-field-wrapper">Bulk Buy
                    <span class="cfwc-title-field">%s</span>
                    </span>
                    </div>',
            esc_html($title)
        );
    }
}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field7');

add_action( 'woocommerce_single_product_summary', 'custom_field_display_above_title', 2 );
function custom_field_display_above_title(){
    global $product;

    // Get the custom field value
    $prodbrand = '<span class="brand">'.get_post_meta( $product->get_id(), 'prodbrand', true ).'</span>';
    $prodcat = '<span class="cat">'.get_post_meta( $product->get_id(), 'prodcat', true ).'</span>';
    $barcode = '<span class="barcode">'.get_post_meta( $product->get_id(), 'barcode', true ).'</span>';
    $sku = '<span class="sku">'.$product->get_sku().'</span>';

    $cats = get_the_terms( $product->get_id(), 'product_cat' );
    $cat_html = "<span class='category'><a href='/product-category/".$cats[0]->slug."'>".$cats[0]->name."</a></span>";

    // Display
    echo "<p class='product_meta'>$cat_html > $prodbrand > $prodcat</p>";
    echo "<p class='product_meta'>Barcode: $barcode | SKU: $sku</p>";
}

add_action( 'woocommerce_before_add_to_cart_form', 'custom_field_display_after_desc', 2 );
function custom_field_display_after_desc(){
    global $product;

    // Get the custom field value
    $note = '<span class="note"><i>'.get_post_meta( $product->get_id(), 'prodnote', true ).'<i></span>';
    $desc = get_the_content( $product->get_id() );

    // Display
    echo "<p class='product_meta note' style='display:none;'>$note</p>";
    //echo "<div class='product_meta description'><p>$desc</p></div>";
}

add_filter( 'woocommerce_email_recipient_new_order', 'vs_conditional_email_recipient', 10, 2 );

function vs_conditional_email_recipient( $recipient, $order ) {

	// Bail on WC settings pages since the order object isn't yet set yet
	// Not sure why this is even a thing, but shikata ga nai
	$page = $_GET['page'] = isset( $_GET['page'] ) ? $_GET['page'] : '';
	if ( 'wc-settings' === $page ) {
		return $recipient; 
	}
	
	// just in case
	if ( ! $order instanceof WC_Order ) {
		return $recipient; 
	}

	$items = $order->get_items();
	
	// check if a shipped product is in the order	
	foreach ( $items as $item ) {
		$product = $order->get_product_from_item( $item );
		
		// add our extra recipient if there's a shipped product - commas needed!
		// we can bail if we've found one, no need to add the recipient more than once
        $cats = get_the_terms( $product->get_id(), 'product_cat' );
    $contact_details = get_field('supplier_contact_details', 'product_cat_'.$cats[0]->term_id);
    $supplier_1 = ( isset($contact_details['supplier_contact_email']) ) ? ', '.$contact_details['supplier_contact_email'] : '';
    // $supplier_2 = ( isset($contact_details['additional_supplier_email']) ) ? ', '.$contact_details['additional_supplier_email'] : '';

		// if ( $product && $product->needs_shipping() ) {
			$recipient .= $supplier_1;
			return $recipient;
		// }
	}
	
	return $recipient;
}

function cfwc_create_custom_bonus_code()
{
    global $post;
    $product = wc_get_product($post->ID);
    $args = array(
        'id' => 'bonusprod_code',
        'label' => __('Bonus Product Code', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Bonus Product Code', 'ctwc'),
        'value' =>  $product->get_meta('bonusprod_code')
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_bonus_code');

function cfwc_save_custom_field_bonus_code($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['bonusprod_code']) ? $_POST['bonusprod_code'] : '';
    $product->update_meta_data('bonusprod_code', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field_bonus_code');

function cfwc_display_custom_bonus_code()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $title = $product->get_meta('bonusprod_code');
    if ($title) {
        // Only display our field if we've got a value for the field title
        printf(
            '<div class="product_meta">
                    <span class="cfwc-custom-field-wrapper">Bonus Product Code: 
                    <span class="cfwc-title-field">%s</span>
                    </span>
                    </div>',
            esc_html($title)
        );
    }
}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_bonus_code');

function cfwc_create_custom_bonus_description()
{
    global $post;
    $product = wc_get_product($post->ID);

    $args = array(
        'id' => 'bonusprod_desc',
        'label' => __('Bonus Product Description', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Bonus Product Description', 'ctwc'),
        'value' => $product->get_meta('bonusprod_desc')
    );
    woocommerce_wp_textarea_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_bonus_description');

function cfwc_save_custom_field_bonus_description($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['bonusprod_desc']) ? $_POST['bonusprod_desc'] : '';
    $product->update_meta_data('bonusprod_desc', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field_bonus_description');

function cfwc_display_custom_bonus_description()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $title = $product->get_meta('bonusprod_desc');
    if ($title) {
        // Only display our field if we've got a value for the field title
        printf(
            '<div class="product_meta">
                    <span class="cfwc-custom-field-wrapper">Bonus Product Description: 
                    <span class="cfwc-title-field">%s</span>
                    </span>
                    </div>',
            esc_html($title)
        );
    }
}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_bonus_description');

function get_attachment_url_by_slug( $slug ) {
    $slug = implode('.', explode('.', $slug, -1) );
    $args = array(
      'post_type' => 'attachment',
      'name' => sanitize_title($slug),
      'posts_per_page' => 1,
      'post_status' => 'inherit',
    );
    $_header = get_posts( $args );
    $header = $_header ? array_pop($_header) : null;
    return $header ? wp_get_attachment_url($header->ID) : '';
  }

  function cfwc_create_custom_bonus_image()
{
    global $post;
    $product = wc_get_product($post->ID);
    $args = array(
        'id' => 'bonusprod_images',
        'label' => __('Bonus Product Image name', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Bonus Product Image name', 'ctwc'),
        'value' => $product->get_meta('bonusprod_images')
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_custom_bonus_image');

function cfwc_save_custom_field_bonus_image($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['bonusprod_images']) ? $_POST['bonusprod_images'] : '';
    $product->update_meta_data('bonusprod_images', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field_bonus_image');

function cfwc_display_custom_bonus_image()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $image = '<img src="'. get_attachment_url_by_slug( $product->get_meta('bonusprod_images') ).'" width="200">';
    if ($product->get_meta('bonusprod_images')) {
        // Only display our field if we've got a value for the field title
        echo '<div class="product_meta">
                    <span class="cfwc-custom-field-wrapper">Bonus Product : 
                    '.$image.'
                    </span>
                    </div>';
    }
}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_bonus_image');

add_filter('woocommerce_email_subject_new_order', 'change_admin_email_subject', 1, 2);

function change_admin_email_subject( $subject, $order ) {
	global $woocommerce;

	$store_order_no = get_post_meta( $order->get_id(), '_billing_cstm_wp_order_number', true );

    $items = $order->get_items();
    foreach( $items as $it ){
        $supplier = get_the_terms ( $it->get_product_id(), 'product_cat' )[0]->name;
    }


	$subject = 'New Elevate Order (# '.$order->get_id().'), Store order number: '.$store_order_no.' for Supplier: '.$supplier;

	return $subject;
}

function cfwc_display_custom_field_min_quant()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $title = $product->get_meta('moqty');
    // var_dump($product);
    if ($title) {
        // Only display our field if we've got a value for the field title
        echo '<div class="product_meta min_quantity" data-quantity="'.$title.'"><h3 class="moq-single">Min Order Qty: <span class="min_quantity">'.$title.'</span></h3></div>';
    }
}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field_min_quant');

function cfwc_display_custom_field_variations()
{
    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $title = $product->get_meta('variations');
    // var_dump($product);
    if ($title) {
        // Only display our field if we've got a value for the field title
        echo '<p class="product_meta variations" style="display:none;">'.$title.'</p>';
    }
}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_field_variations');

//

function cfwc_create_additional_product()
{
    $args = array(
        'id' => 'customproduct',
        'label' => __('Additional Product', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Additional Product', 'ctwc'),
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_additional_product');


function cfwc_save_custom_additional_product($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['customproduct']) ? $_POST['customproduct'] : '';
    $product->update_meta_data('customproduct', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field_additional_product');

function cfwc_display_custom_additional_product()
{

    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $title = $product->get_meta('customproduct');
    // var_dump($product);
    if ($title) {
        // Only display our field if we've got a value for the field title
        echo '<div class="product_meta custom_note"><p class="custom-ins">Kindly specify below in the notes field the product you would like to buy that is not included in the website. If you would like to add more products, simply:<br><br>1. ADD TO CART THE FIRST NON-PLATFORM PRODUCT<br>2. CHANGE PRODUCT DESCRIPTION AND PRODUCT CODE<br>3. CHANGE UNITS REQUIRED AND PRICE<br>4. ADD TO CART AGAIN<br>5. REPEAT PROCESS FOR MORE NON-PLATFORM PRODUCTS</span></p></div>';
    }


}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_additional_product');

//


function cfwc_create_product_video()
{
    $args = array(
        'id' => 'productvideo',
        'label' => __('Product Video URL', 'cfwc'),
        'class' => 'cfwc-custom-field',
        'desc_tip' => true,
        'description' => __('Product Video URL', 'ctwc'),
    );
    woocommerce_wp_text_input($args);
}
add_action('woocommerce_product_options_general_product_data', 'cfwc_create_product_video');


function cfwc_save_custom_product_video($post_id)
{
    $product = wc_get_product($post_id);
    $title = isset($_POST['productvideo']) ? $_POST['productvideo'] : '';
    $product->update_meta_data('productvideo', sanitize_text_field($title));
    $product->save();
}
add_action('woocommerce_process_product_meta', 'cfwc_save_custom_field_product_video');

function cfwc_display_custom_product_video()
{

    global $post;
    // Check for the custom field value
    $product = wc_get_product($post->ID);
    $title = $product->get_meta('productvideo');
    // var_dump($product);
    if ($title) {
        // Only display our field if we've got a value for the field title
        echo '<p class="product_meta product-video" data-video="'.$title.'" style="display:none;"></p>';
    }


}
add_action('woocommerce_before_add_to_cart_button', 'cfwc_display_custom_product_video');

// add_action('pdf_template_order_number_text', 'custom_pdf_template_vat_number_text');
// add_filter( 'pdf_template_invoice_number_text', 'custom_pdf_template_vat_number_text' );
// function custom_pdf_template_vat_number_text() {
//     return 'Test Invoice: 123';
// }

// add_filter( 'wpo_wcpdf_filename', 'wpo_wcpdf_custom_filename', 10, 4 );
function wpo_wcpdf_custom_filename( $filename, $template_type, $order_ids, $context ) {
	$count = count($order_ids);
 
	if ( $count == 1 && $template_type == 'invoice') {
		$order = wc_get_order($order_ids[0]);
        $items = $order->get_order_items();
        foreach( $items as $item_id => $item ){
            $terms = get_the_terms ( $item['product_id'], 'product_cat' );
            $supplier_name = sanitize_title( $terms[0]->name);
        }
		# change the filename
		$filename = $supplier_name.'-'.$order->get_order_number().'.pdf';

	}

	return $filename;
}