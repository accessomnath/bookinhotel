<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 20-03-2017
 * Time: PM 12:46
 */

include('include/mainfunc.php');
include('include/cpt.php');

add_action('init', 'register_my_menu');
function register_my_menu()
{
    register_nav_menu('header-menu', __('Primary Menu'));

}

//<-------------- custom logo----------------->
add_action('customize_register', 'themeslug_theme_customizer');
function themeslug_theme_customizer($wp_customize)
{
    $wp_customize->add_section('themeslug_logo_section', array(
        'title' => __('Logo', 'themeslug'),
        'priority' => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
    ));
    $wp_customize->add_setting('themeslug_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'themeslug_logo', array(
        'label' => __('Logo', 'themeslug'),
        'section' => 'themeslug_logo_section',
        'settings' => 'themeslug_logo',
    )));
}

//<-------------- custom logo----------------->
add_theme_support('post-thumbnails');

//---------------------------home page slider-----------------
add_action('init', 'codex_slider_init');
function codex_slider_init()
{
    $labels = array(
        'name' => _x('Slider', 'post type general name', 'your-plugin-textdomain'),
        'singular_name' => _x('Slider', 'post type singular name', 'your-plugin-textdomain'),
        'menu_name' => _x('Slider', 'admin menu', 'your-plugin-textdomain'),
        'name_admin_bar' => _x('Slider', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new' => _x('Add New', 'Slider', 'your-plugin-textdomain'),
        'add_new_item' => __('Add New Slider', 'your-plugin-textdomain'),
        'new_item' => __('New Slider', 'your-plugin-textdomain'),
        'edit_item' => __('Edit Slider', 'your-plugin-textdomain'),
        'view_item' => __('View Slider', 'your-plugin-textdomain'),
        'all_items' => __('All Slider', 'your-plugin-textdomain'),
        'search_items' => __('Search Slider', 'your-plugin-textdomain'),
        'parent_item_colon' => __('Parent Slider:', 'your-plugin-textdomain'),
        'not_found' => __('No Slider found.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No Slider found in Trash.', 'your-plugin-textdomain')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'your-plugin-textdomain'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'slider'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'map_meta_cap' => true,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail', 'editor')
    );

    register_post_type('slider', $args);
}
//nav menus
function wp_nav_menu_no_ul()
{
    $options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'primary',
        'fallback_cb'=> 'fall_back_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);

}

function fall_back_menu(){
    return;
}