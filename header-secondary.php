<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIS Trade Show 2020</title>
    <?php wp_head();?>
</head>

<header id="header-secondary">
    <div class="container d-flex align-items-center justify-content-between">

        <img src="<?php bloginfo('template_directory');?>/images/ATS-Footer-Blue.png" class="img-fluid logo">

        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'top-menu',
                'menu_class' => 'top-menu'
            )
        );?>

    </div>
</header>

<body <?php body_class('test');?>>

