<?php

/*******************************
    Adding scripts and Css
 ********************************/
add_action('wp_enqueue_scripts', function () {
    if (!is_admin()) {
        wp_enqueue_style('styles', get_template_directory_uri() . '/dist/css/styles.css', array(), '1.0.0');

        wp_enqueue_script('scripts', get_template_directory_uri() . "/dist/js/scripts.min.js", array('jquery'), null, true);
    }
});

/*******************************
    Adding logo
 ********************************/

 function theme_custom_logo_setup()
 {
     add_theme_support('custom-logo', array(
         'height'      => 100,
         'width'       => 300,
         'flex-height' => true,
         'flex-width'  => true,
     ));
 }
 add_action('after_setup_theme', 'theme_custom_logo_setup');


/*******************************
    Adding Thumbnail
 ********************************/

function my_theme_setup()
{
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_theme_setup');

/*******************************
    Get ID by Slug
 ********************************/

function get_page_id_by_slug($slug)
{
    $page = get_page_by_path($slug, OBJECT, 'page');
    if ($page) {
        return $page->ID;
    }
    return 0;
}

/*******************************
    Creating Informações Page
 ********************************/

/*******************************
    Disabling Guttenber Editor
 ********************************/

add_filter('use_block_editor_for_post_type', 'disable_guttemberg_editor');
function disable_guttemberg_editor()
{
    return false;
}

/*******************************
    Adding the Options Page in Admin Menu
 *Create a page called "General Information", then change the ID and at get_page_by_path() of this page at the line below
 ********************************/

add_action('admin_menu', 'linked_url');
function linked_url()
{
    add_menu_page('linked_url', 'Informações Gerais', 'read', 'post.php?post=5&action=edit', '', 'dashicons-admin-generic',  90);
}

/*******************************
    Hiding the Options Page
 ********************************/

add_filter('parse_query', 'exclude_pages_from_admin');
function exclude_pages_from_admin($query)
{
    global $pagenow, $post_type;
    if (is_admin() && $pagenow == 'edit.php' && $post_type == 'page') {
        $settings_page = get_page_by_path('informacoes-gerais', NULL, 'page')->ID;
        $query->query_vars['post__not_in'] = array($settings_page);
    }
}

/*******************************
    Carregar font de forma assincrona - Google Fonts
    Deve trocar o nome da font, se necessário
 ********************************/
function carregar_fontes_assincronas() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Rubik:wght@400;900&display=swap', array(), '1.0' );
   }
   add_action( 'wp_enqueue_scripts', 'carregar_fontes_assincronas' );
