<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>

  <title itemprop="name">
    <?php
    if (is_home()) {
      echo "";
    } elseif (is_tax()) {
      echo single_cat_title() . ' |';
    } elseif (is_archive()) {
      echo get_the_archive_title() . ' |';
    } elseif (is_singular()) {
      echo single_post_title() . ' |';
    } else {
      echo get_the_title();
    }
    ?>
    Portfólio - Vinícius Marques
  </title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

</head>

<body>
  <div class="container main-content">
    <header class="scroll-effect">
      <div class="header-top">
        <div class="branding">
          <a href="/" class="title scroll-effect">
            <h1>Vinícius Marques</h1>
          </a>
        </div>
        <div class="icons">
          
          <div class="top">
            <div class="menu-items">
              <nav class="navbar" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                <?php
                wp_nav_menu(array(
                  'theme_location' => 'custom_header_menu',
                  'menu'           => 'Menu do Header',
                  'menu_id'        => 'custom-header-menu',
                  'menu_class'     => 'list scroll-effect',
                  'fallback_cb'    => '__return_false',
                ));
                ?>

                <a href="/" class="scroll-effect language">
                  PT
                </a>
              </nav>
            
            </div>
          </div>
        </div>
      </div>
      <div class="download">
        <a
          href="library/docs/curiculo-vdavidmarques-sao-paulo.pdf"
          class="button scroll-effect download"
          target="_blank">Download CV</a>
      </div>
    </header>
    <main>