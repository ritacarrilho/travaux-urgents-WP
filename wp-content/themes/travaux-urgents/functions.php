<?php

if(!function_exists('travaux_urgents_assets')) {
    // add style and script files
    function travaux_urgents_assets() 
    { 
        wp_register_style( 'splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css' );
        wp_enqueue_style('splide-css'); 
        
        // wp_register_style('main_style', get_template_directory_uri() . '/style.scss', [], true); // style css link
        wp_register_style('main_style', get_template_directory_uri() . '/style.scss', array(), '1.1', 'all',); // style css link
        wp_enqueue_style('main_style'); 


        wp_register_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' );
        wp_enqueue_style('font-awesome'); 

        wp_register_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js' ); //  script SplideJS link 
        wp_enqueue_script('splide'); 

        wp_register_script('script', get_template_directory_uri() . '/js/script.js', ['jquery'], true, true); //  script javascript link 
        wp_enqueue_script('script'); 
    }
}

add_action('wp_enqueue_scripts', 'travaux_urgents_assets');

add_filter('show_admin_bar', '__return_false'); // remove admin bar

/* ----- Menus ----- */
register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );


// add_filter( 'walker_nav_menu_start_el', 'paulc_add_subcategories_under_parent_category', 10, 4 );

// function paulc_add_subcategories_under_parent_category( $item_output, $item, $depth, $args ) {
    

//     if( $args->theme_location == 'primary' && $item->object === 'prestations' && $item->type === 'post_type' ) {
//         $args_prestations = array(
//             'post_type' => 'prestations',
//         );
    
//         $sub_cats = new WP_Query( $args_prestations );
//         var_dump( $sub_cats );

//         if( ! empty( $sub_cats ) ) {
//             $class = "menu-item menu-item-object-{$item->object} menu-item-type-{$item->type}";
//             $sub_cats = preg_replace( '#<ul\sclass=([^>]*)>#', '<ul class="sub-menu">', $sub_cats );
//             $sub_cats = preg_replace( '#<li\sclass="([^>]*)">#', '<li class="' . $class . ' $1">', $sub_cats );
//             $item_output .= '<ul class="sub-menu">' . "\n";
//             $item_output .= $sub_cats;
//             $item_output .= '</ul>' . "\n";
//         }
//     }

//     return $item_output;
// }

// remove default text editor
function remove_pages_editor(){
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'post', 'editor' );
}

add_action( 'init', 'remove_pages_editor' );

/* ----- Prestations Custom post type ----- */
function register_post_types() {
        // CPT Prestations
    $labels_prestations = array(
        'name' => 'Prestations',
        'all_items' => 'Tous les projets',  // affiché dans le sous menu
        'singular_name' => 'Prestation',
        'add_new_item' => 'Ajouter prestation',
        'edit_item' => 'Modifier prestation',
        'menu_name' => 'Prestations'
    );

    $args_prestations = array(
        'labels' => $labels_prestations,
        'public' => true,
        // 'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title','thumbnail'),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-admin-customizer',
    );

    register_post_type( 'prestations', $args_prestations );
}

add_action('init', 'register_post_types', 'remove_pages_editor');

/* ----- Infosrmations Générales ----- */
if( function_exists( 'acf_add_options_page' )) {
    acf_add_options_page( array(
        'page_title' => 'Infos Générales',
        'menu_title' => 'Info Générales',  // affiché dans le sous menu
        'menu-slug' => 'theme-general-settings',
        'redirect' => false,
    ));
}

add_action('pre_get_posts', 'search_by_cat');
function search_by_cat()
{
    global $wp_query;
    if (is_search()) {
        $cat = intval($_GET['cat']);
        $cat = ($cat > 0) ? $cat : '';
        $wp_query->query_vars['cat'] = $cat;
    }
}