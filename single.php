<?php get_header();?>

    

    <div class="container">

        <img src="<?php the_post_thumbnail_url('post_image'); ?>" class="img-fluid mb-5">

        <h1><?php the_title(); ?></h1>

        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; else: endif; ?>

    </div>

<?php get_footer();?>
