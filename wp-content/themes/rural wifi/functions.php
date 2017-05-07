<?php
add_theme_support('post-thumbnails');
add_action('init', 'register_my_menu');
function register_my_menu()
{
    register_nav_menu('header-menu', __('Primary Menu'));

}
require_once('wp_bootstrap_navwalker.php');

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

//<-------------- custom logo end----------------->

/*Ajax Login*/
function ajax_login_init(){

    wp_register_script('ajax-login-script', get_template_directory_uri() . 'js/ajax-login-script.js', array('jquery') );
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}

function ajax_login()
{

    // First check the nonce, if it fails the function will break
    check_ajax_referer('ajax-login-nonce', 'security');

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon($info, false);
    if (is_wp_error($user_signon)) {
        echo json_encode(array('loggedin' => false, 'message' => __('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin' => true, 'message' => __('Login successful, redirecting...')));
    }

    die();
}

//custom post type for main slider-section
function codex_slider_init() {
    $labels = array(
        'name'               => 'slider',
        'singular_name'      => 'slider',
        'menu_name'          => 'Slider',
        'name_admin_bar'     => 'slider',
        'add_new'            => 'Add New slider',
        'add_new_item'       =>' Add New slider',
        'new_item'           => 'New slider',
        'edit_item'          =>'Edit slider',
        'all_items'          => 'All slider',
        'not_found_in_trash' => 'No slider found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor','thumbnail')
    );

    register_post_type( 'slider', $args );
}
add_action( 'init', 'codex_slider_init' );

//custom post type for main slider-section
function codex_our_mission_init() {
    $labels = array(
        'name'               => 'Our Mission',
        'singular_name'      => 'Our Mission',
        'menu_name'          => 'Our Mission',
        'name_admin_bar'     => 'Our Mission',
        'add_new'            => 'Add New Mission',
        'add_new_item'       =>' Add New Mission',
        'new_item'           => 'New Mission',
        'edit_item'          =>'Edit Mission',
        'all_items'          => 'All Our Mission',
        'not_found_in_trash' => 'No Mission found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'our_mission' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor','thumbnail')
    );

    register_post_type( 'our_mission', $args );
}
add_action( 'init', 'codex_our_mission_init' );

function themeslug_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'themeslug_filter_front_page_template' );
