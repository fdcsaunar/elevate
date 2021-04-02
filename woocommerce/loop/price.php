<?php

/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php if ($price_html = $product->get_price_html()) : ?>
	<span class="price"><?php echo $price_html; ?></span>
<?php endif; ?>
<?php
$bulkbylabel1 = get_post_meta(get_the_ID(), 'bulkbuy1_qty');
$bulkbylabel2 = get_post_meta(get_the_ID(), 'bulkbuy2_qty');

if (!empty($bulkbylabel1) && $bulkbylabel1[0] != '') :
	echo '<span class="bulkbylabel">Bulk Buy ' . $bulkbylabel1[0] . '</span>';
endif;

if (!empty($bulkbylabel2) && $bulkbylabel2[0] != '') :
	echo '<span class="bulkbylabel">Bulk Buy ' . $bulkbylabel2[0] . '</span>';
endif;

$title = $product->get_meta('min_quantity');
// var_dump($product);
if ($title) {
	// Only display our field if we've got a value for the field title
	echo '<div class="product_meta min_quantity" data-quantity="' . $title . '"></div>';
}

?>