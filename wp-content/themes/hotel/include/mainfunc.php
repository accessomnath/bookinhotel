<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 24-03-2017
 * Time: AM 10:48
 */





/*add action for customer registration.............start..............*/
add_action('wp_ajax_create_customer', 'it_create_customer');
add_action('wp_ajax_nopriv_create_customer', 'it_create_customer');
function it_create_customer($user_id)
{
    global $wpdb;

    // Handle request then generate response using WP_Ajax_Response
    $name_user = $_POST['login_name1'];
    $address_user = $_POST['login_address1'];
    $email_user = $_POST['login_email1'];
    $city_user = $_POST['login_city1'];
    $zip_user = $_POST['login_zip1'];
    $phone_user = $_POST['login_phone1'];
    $password_user = $_POST['login_password1'];

    //Add a zero at begining of phone number
    if (email_exists($email_user)) {
        $save_value = 'email_exists';
    } else {

        $user_id = wp_create_user($name_user, $password_user, $email_user);
        //        Create the user object


        $user = new WP_User($user_id);
        //Then set the role

        $user->set_role('Customer');

        update_user_meta($user_id, 'cust_name', $name_user);
        update_user_meta($user_id, 'cust_address', $address_user);
        update_user_meta($user_id, 'cust_email', $email_user);
        update_user_meta($user_id, 'cust_city', $city_user);
        update_user_meta($user_id, 'cust_zip', $zip_user);
        update_user_meta($user_id, 'cust_phone', $phone_user);
        update_user_meta($user_id, 'cust_password', $password_user);


        $save_value = "User Registered";
    }


    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    wp_redirect(home_url());

    echo $save_value;
    //echo "success==============".$user_id;
    die;

}

/*add action for customer registration.............end..............*/

/*add action for member registration.............start..............*/
add_action('wp_ajax_create_user', 'it_create_user');
add_action('wp_ajax_nopriv_create_user', 'it_create_user');
function it_create_user($user_id)
{
    global $wpdb;

    // Handle request then generate response using WP_Ajax_Response
    $name = $_POST['name1'];
    $address = $_POST['address1'];
    $email = $_POST['email1'];
    $city = $_POST['city1'];
    $zip = $_POST['zip1'];
    $contact = $_POST['contact1'];
    $phone = $_POST['phone1'];
    $password = $_POST['password1'];

    //Add a zero at begining of phone number
    if (email_exists($email)) {
        $save_value = 'email_exists';
    } else {

        $user_id = wp_create_user($name, $password, $email);


        $user = new WP_User($user_id);
        //Then set the role

        $user->set_role('Vendor');

        update_user_meta($user_id, 'name', $name);
        update_user_meta($user_id, 'Hotel_address', $address);
        update_user_meta($user_id, 'email', $email);
        update_user_meta($user_id, 'city', $city);
        update_user_meta($user_id, 'zip', $zip);
        update_user_meta($user_id, 'contact', $contact);
        update_user_meta($user_id, 'phone', $phone);
        update_user_meta($user_id, 'password', $password);


        $save_value = "Registration Successful";


    }
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    wp_redirect(home_url());
    echo $save_value;
    exit;
    //echo "success==============".$user_id;
//    die;

}

//function auto_login_new_user($user_id)
//{
//    wp_set_current_user($user_id);
//    wp_set_auth_cookie($user_id);
//    wp_redirect(home_url());
//    exit;
//}
//
//add_action('user_register', 'auto_login_new_user');

/*Ajax Login*/

function ajax_login_init()
{

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js', array('jquery'));
    wp_enqueue_script('ajax-login-script');

    wp_localize_script('ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action('wp_ajax_nopriv_ajaxlogin', 'ajax_login');
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

//---------------------------search---------------------------------------------

add_action('wp_ajax_nopriv_hotel_search_customer', 'ht_hotel_search_customer'); // for not logged in users
add_action('wp_ajax_hotel_search_customer', 'ht_hotel_search_customer');
function ht_hotel_search_customer()
{
    $hotel_name = $_POST['hotel_name'];
    global $post;
    global $wpdb;
//    $myrows = $wpdb->get_results("Select * from wxxp_posts where post_type 'hotel' and post_name LIKE '%$hotel_name%'))", ARRAY_N);

//    $five_sdrafts = $wpdb->get_results("SELECT * FROM wxxp_posts WHERE post_type = 'hotel' AND post_title LIKE '%$hotel_name%' OR (SELECT * FROM wxxp_postmeta WHERE meta_key LIKE '%$hotel_name%') ", ARRAY_N);

    $events_query = new WP_Query(array('post_type' => 'hotel', 'meta_query' => array(array('key' => 'address', 'value' => $hotel_name))));
    echo $events_query->found_posts;
    while ($events_query->have_posts()) :
        $events_query->the_post();
//        var_dump(get_the_title());
    endwhile;


//    var_dump($five_sdrafts);
}
