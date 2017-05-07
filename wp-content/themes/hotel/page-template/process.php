<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 30-03-2017
 * Time: PM 12:56
 * Template Name: Process
 */
global $post;
global $wpdb;
$id_post = $_POST['id'];
$uname = $_POST['uname'];
$uemail = $_POST['uemail'];
$review_title = $_POST['review_title'];
$review_description = $_POST['review_description'];
$rate = $_POST['rate'];
$current_user = wp_get_current_user();
$username = $current_user->display_name;
$user_id = $current_user->ID;
$user_email = $current_user->user_email;
$on_postbe = $_POST['title'];
//var_dump($onpostbe);
$post = array(
    'post_title' => $uname,
    'post_status' => 'publish',
    'post_type' => 'user_rate',
);
// insert the post into the database
$post_id = wp_insert_post($post);


//var_dump($id_post);

update_field('email_address', $uemail, $post_id);
update_field('id_post', $id_post, $post_id);
update_field('title_post', $on_postbe, $post_id);
update_field('review_title', $review_title, $post_id);
update_field('user_review', $review_description, $post_id);


$rating = update_field('user_rate', $rate, $post_id);

if ($rating == 1) {
    echo "<p id='success1'>You have Succefully Reviewed For Hotel</p>";
} else {
    echo "<p id='error1'>Something Went Wrong!</p>";
}
?>


