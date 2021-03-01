<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevate 2021 • AIS Trade Show</title>
    <?php wp_head();?>
</head>
<body <?php body_class('');?>>

<header class="nav">

  <div class="container">

    <div class="navbar sticky-top justify-content-between">

      <a href="/" class="nav-brand"><img src="<?= get_template_directory_uri(); ?>/src/assets/images/ais-white.svg"></a>

    <nav class="nav-primary">

        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'top-menu'
                )
            );
        ?>

    </nav>

    </div>

  </div>

</header>

