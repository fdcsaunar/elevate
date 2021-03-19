<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<?php
$category = get_queried_object();
if (is_shop() && !is_product_category()) :
    $images = get_field('shop_hero_slider', 24);
else :
    $images = get_field('hero_slider', $category);
endif;
if ($images) : ?>

    <div class="container">
        <div class="autoplay-slider">
            <?php foreach ($images as $image) : ?>
                <div class="slider">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<div class="container supplier-details">
	
</div>
<div class="content">
	<div class="container">

<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php if( have_rows('supplier_contact_details', $category) && !is_shop() && is_product_category() ): ?>
<?php while( have_rows('supplier_contact_details', $category) ): the_row();?>
<div class="row supplier-details">
	<div class="col-md-6">
		<?php if( get_sub_field('supplier_name') != '' ): ?>
		<p>Supplier Name: <?php the_sub_field('supplier_name'); ?></p>
		<?php endif; ?>
		<?php if( get_sub_field('supplier_email') != '' ): ?>
		<p>Supplier Email: <a href="mailto:<?php the_sub_field('supplier_email'); ?>"><?php the_sub_field('supplier_email'); ?></a></p>
		<?php endif; ?>
		<?php if( get_sub_field('supplier_phone') != '' ): ?>
		<p>Supplier Ph: <a href="tel:<?php the_sub_field('supplier_phone'); ?>"><?php the_sub_field('supplier_phone'); ?><a></p>
		<?php endif; ?>
	</div> 
	<div class="col-md-6">
	<?php if( get_sub_field('ais_category_manager') != '' ): ?>
		<p>AIS Category Manager: <?php the_sub_field('ais_category_manager'); ?></p>
		<?php endif; ?>
		<?php if( get_sub_field('ais_category_email') != '' ): ?>
		<p>AIS Category Email: <a href="mailto:<?php the_sub_field('ais_category_email'); ?>"><?php the_sub_field('ais_category_email'); ?></a></p>
		<?php endif; ?>
		<?php if( get_sub_field('ais_category_manager_Phone') != '' ): ?>
		<p>AIS Category Manager Ph: <a href="tel:<?php the_sub_field('ais_category_manager_Phone'); ?>"><?php the_sub_field('ais_category_manager_Phone'); ?></a></p>
		<?php endif; ?>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
?>

</div>
</div>

<?php if (!is_shop() && is_product_category()) : ?>
        <div class="content">
            <div class="container">
                <div class="supplier-pdfs">
					

					<?php if( have_rows('supplier_pdfs', $category) ): ?>
                        <h1>Product PDFs</h1>

                    <div class="row">
                    
						<?php while( have_rows('supplier_pdfs', $category) ): the_row(); ?>
							<div class="col-md-3 col-lg-3" style="display: flex;">
								<?php $file = get_sub_field('pdf'); ?>
								<h4><a href="<?php echo $file['url']; ?>" target="_blank"><?php echo  str_replace('_', ' ',str_replace('-', ' ', explode('.', $file['filename'])[0])); ?></a></h4>
							</div>
						<?php endwhile; ?>
						</div>
                        </div>
					<?php endif; ?>


                <h1 class="supplier">Supplier Videos</h1>
                <div class="supplier-videos">
					
					<?php if( have_rows('supplier_videos', $category) ): ?>
                        
						<?php while( have_rows('supplier_videos', $category) ): the_row(); ?>
						<div class="video">

								<?php if( get_sub_field('is_the_video_hosted_online') === true ): ?>
									<?php the_sub_field('video_link'); ?>
									<?php else: ?>
									<?php $file = get_sub_field('upload_video'); ?>
									<video style="width:100%;height:auto;" controls>
										<source src="<?php echo $file['url']; ?>" type="video/mp4">
									</video>
								<?php endif; ?>

						</div>
						<?php endwhile; ?>
                    <?php endif; ?>

        		</div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php get_footer( 'shop' );
