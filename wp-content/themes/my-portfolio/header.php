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
</head>

<body>
  <div class="container main-content">
    <header class="scroll-effect">
      <div class="header-top">
        <div class="branding">
          <?php
          if (function_exists('the_custom_logo')) {
            the_custom_logo();
          }
          ?>
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
        <?php
        $args = array(
          'name' => 'informacoes-gerais',
          'post_type' => 'post',
        );

        $query = new WP_Query($args);
        while ($query->have_posts()) :
          $query->the_post();
          $doc = get_field('doc');
        ?>
          <a
            href="<?php echo $doc['url']; ?>"
            class="button scroll-effect download"
            target="_blank">Download CV</a>
        <?php endwhile; ?>
      </div>
    </header>
    <main>