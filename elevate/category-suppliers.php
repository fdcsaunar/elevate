<?php
/*
Template Name: Suppliers
*/
?>

<?php get_header();?>

<section id="#slideshow">
<div class="slick">
                <div>1</div>
                <div>2</div>
                <div>3</div>
            </div>
</section>

<section id="supplierhero">

    <div class="container">
        <div class="slider">
            
        </div>

        <div class="supplier-grid">
            <div class="wrapper d-flex">
                <?php get_template_part('includes/section', 'archive'); ?>
            </div>
        </div>

    </div>

</section>

<?php get_footer();?>
