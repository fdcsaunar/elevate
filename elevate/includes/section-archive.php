<?php if( have_posts() ): while( have_posts() ): the_post();?>

	<div class="supplier-box">

		<div>
            <?php if(has_post_thumbnail()):?>
                <a href="<?php the_permalink();?>">
                <img src="<?php the_post_thumbnail_url('');?>" alt="<?php the_title();?>" class="img-fluid">
            </a>
			<?php endif;?>
		</div>

	</div>

<?php endwhile; else: endif;?>