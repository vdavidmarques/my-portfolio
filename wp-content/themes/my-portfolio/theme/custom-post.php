<?php
    
    // Registrar Custom Post Type Portfolio
    function registrar_portfolio_custom_post() {
        $labels = array(
            'name'               => 'Portfolio',
            'singular_name'      => 'Portfolio',
            'menu_name'          => 'Portfolio',
            'name_admin_bar'     => 'Portfolio',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo Portfolio',
            'new_item'           => 'Novo Portfolio',
            'edit_item'          => 'Editar Portfolio',
            'view_item'          => 'Ver Portfolio',
            'all_items'          => 'Todos os Portfolio',
            'search_items'       => 'Pesquisar Portfolio',
            'parent_item_colon'  => 'Portfolio Pai:',
            'not_found'          => 'Nenhum Portfolio encontrado.',
            'not_found_in_trash' => 'Nenhum Portfolio encontrado na lixeira.'
        );
        
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'thumbnail', 'custom-fields'),
            'menu_icon'          => 'dashicons-portfolio' //Portfolio
        );
        
        register_post_type( 'portfolio', $args );

         // Registrar Taxonomia para Portfolio
         $labels_taxonomy = array(
            'name'              => 'Categorias de Portfolio',
            'singular_name'     => 'Categoria de Portfolio',
            'search_items'      => 'Pesquisar Categorias',
            'all_items'         => 'Todas as Categorias',
            'parent_item'       => 'Categoria Pai',
            'parent_item_colon' => 'Categoria Pai:',
            'edit_item'         => 'Editar Categoria',
            'update_item'       => 'Atualizar Categoria',
            'add_new_item'      => 'Adicionar Nova Categoria',
            'new_item_name'     => 'Novo Nome de Categoria',
            'menu_name'         => 'Categorias de Portfolio',
        );
        
        $args_taxonomy = array(
            'hierarchical'      => true,
            'labels'            => $labels_taxonomy,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'portfolio' ),
        );
        
        register_taxonomy( 'categoria_portfolio', 'portfolio', $args_taxonomy );
    }
    add_action( 'init', 'registrar_portfolio_custom_post' );