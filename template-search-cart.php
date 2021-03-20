<?php

/**
 * Template Name: Elevate Search Product
 */
get_header();
global $wpdb;
$input = preg_quote('asl_r_pagepost_', '~'); // don't forget to quote input string!
$prodClass = explode(' ',$_GET['post_class']);

$result = preg_grep('~' . $input . '~', $prodClass);
$product_id = str_replace('asl_r_pagepost_', '', $result[2]);
WC()->cart->add_to_cart($product_id);
wp_redirect('/cart/');

get_footer();