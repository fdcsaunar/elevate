<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevate 2021 • <?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head();?>
</head>
<body <?php body_class('');?>>

<header class="navbar navbar-expand fixed-top" id="header">

  <div class="container justify-content-between">

    <a href="/" class="navbar-brand">
      <img src="<?= get_template_directory_uri(); ?>/src/assets/images/ais-white.svg">
    </a>

    <div class="nav-primary">
          <?php
              wp_nav_menu(
                  array(
                      'theme_location' => 'top-menu'
                  )
              );
          ?>
      </div>

  </div>

</header>

