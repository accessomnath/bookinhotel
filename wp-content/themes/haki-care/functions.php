<?php
add_filter('show_admin_bar', '__return_false');
add_action('init', 'register_my_menu');
require_once('wp_bootstrap_navwalker.php');
function register_my_menu()
{
    register_nav_menu('header-menu', __('Primary Menu'));
    register_nav_menu('footer-menu', __('Footer Menu'));
}

function remove_menus(){

    //remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'jetpack' );                    //Jetpack*
    remove_menu_page( 'edit.php' );                   //Posts
    //remove_menu_page( 'upload.php' );                 //Media
    // remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    //remove_menu_page( 'themes.php' );                 //Appearance
    //remove_menu_page( 'plugins.php' );                //Plugins
    //remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    //remove_menu_page( 'options-general.php' );        //Settings

}
add_action( 'admin_menu', 'remove_menus' );


/*add action for customer registration.............start..............*/
add_action('wp_ajax_create_user', 'it_create_user');
add_action('wp_ajax_nopriv_create_user', 'it_create_user');
function it_create_user()
{
    global $wpdb;

    // Handle request then generate response using WP_Ajax_Response
    $first_name = $_POST['name_first'];
    $last_name = $_POST['name_last'];
    $email = $_POST['emaill'];
    $phonenumber = $_POST['phoneee'];
    $password = $_POST['passwordd'];
    $choose = $_POST['choosee'];
    $name_main = $first_name ." ".$last_name;
    var_dump($name_main);
    //Add a zero at begining of phone number
    if (email_exists($email)) {
        $save_value = 'email_exists';
    } else {

        $user_id = wp_create_user($first_name, $password, $email);
        //        Create the user object


        $user = new WP_User($user_id);
        //Then set the role

        $user->set_role('Client');

        update_user_meta($user_id, 'client_name', $name_main);
        update_user_meta($user_id, 'client_phone', $phonenumber);
        update_user_meta($user_id, 'client_email', $email);
        update_user_meta($user_id, 'client_choose', $choose);

//        update_user_meta($user_id, 'client_password', $password_user);


        $save_value = "User Registered";
    }
    echo $save_value;
    //echo "success==============".$user_id;
    die;

}