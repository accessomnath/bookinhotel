<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 24-03-2017
 * Time: AM 10:46
 */

add_action('init', 'codex_hotel_init');
function codex_hotel_init()
{
    $labels = array(
        'name' => _x('Hotel', 'post type general name', 'your-plugin-textdomain'),
        'singular_name' => _x('Hotel', 'post type singular name', 'your-plugin-textdomain'),
        'menu_name' => _x('Hotel', 'admin menu', 'your-plugin-textdomain'),
        'name_admin_bar' => _x('Hotel', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new' => _x('Add New', 'Hotel', 'your-plugin-textdomain'),
        'add_new_item' => __('Add New Hotel', 'your-plugin-textdomain'),
        'new_item' => __('New Hotel', 'your-plugin-textdomain'),
        'edit_item' => __('Edit Hotel', 'your-plugin-textdomain'),
        'view_item' => __('View Hotel', 'your-plugin-textdomain'),
        'all_items' => __('All Hotels', 'your-plugin-textdomain'),
        'search_items' => __('Search Hotels', 'your-plugin-textdomain'),
        'parent_item_colon' => __('Parent Hotels:', 'your-plugin-textdomain'),
        'not_found' => __('No Hotel found.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No Hotel found in Trash.', 'your-plugin-textdomain')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'your-plugin-textdomain'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'hotel'),
        'menu_icon' => 'dashicons-admin-multisite',
//        'capability_type' => 'post',
        'capabilities' => [
            'edit_post' => 'edit_Hotel',
            'read_post' => 'read_Hotel',
            'delete_post' => 'delete_Hotel',
            'edit_posts' => 'edit_Hotel',
            'edit_others_posts' => 'edit_others_Hotel',
            'publish_posts' => 'publish_Hotel',
            'read_private_posts' => 'read_private_Hotel',
        ],

        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail', 'editor', 'custom-fields', 'comments', 'author')
    );

    register_post_type('hotel', $args);
}

//=========================================
add_action('init', 'create_star_taxonomy2');
function create_star_taxonomy2()
{
    register_taxonomy(
        'hotel_star',
        'hotel',
        array(
            'label' => 'Stars',
            'hierarchical' => true,

        )
    );
}

add_action('init', 'create_amenities_taxonomy2');
function create_amenities_taxonomy2()
{
    register_taxonomy(
        'amenities',
        'hotel',
        array(
            'label' => 'Amenities',
            'hierarchical' => true,

        )
    );
}

add_action('init', 'create_facility_taxonomy2');
function create_facility_taxonomy2()
{
    register_taxonomy(
        'facility',
        'hotel',
        array(
            'label' => 'Facility',
            'hierarchical' => true,


        )
    );
}


//================================================

// Add Role
add_role('Vendor', 'Vendor', array('read' => true));
add_role('Customer', 'Customer', array('read' => true));


function add_theme_caps()
{
    // Super Admin
    $administrator = get_role('administrator');
    $administrator->add_cap('edit_Hotel');
    $administrator->add_cap('read_Hotel');
    $administrator->add_cap('delete_Hotel');
    $administrator->add_cap('edit_Hotel');
    $administrator->add_cap('edit_others_Hotel');
    $administrator->add_cap('publish_Hotel');
    $administrator->add_cap('read_private_Hotel');
    $administrator->add_cap('hotel_create');
    // Vendor
    $vendor = get_role('Vendor');
    $vendor->add_cap('edit_Hotel');
    $vendor->add_cap('read_Hotel');
    $vendor->add_cap('publish_Hotel');
    $vendor->add_cap('delete_Hotel');
    $vendor->add_cap('upload_files');

}

add_action('admin_init', 'add_theme_caps');


// Adjest Cap
function adjust_cap($query)
{
    global $pagenow;
    if ('edit.php' != $pagenow || !$query->is_admin)
        return $query;
    if (!current_user_can('edit_others_job')) {
        global $user_ID;
        $query->set('author', $user_ID);
    }
    return $query;
}

add_filter('pre_get_posts', 'adjust_cap');

add_action('init', 'codex_user_rate_init');
function codex_user_rate_init()
{
    $labels = array(
        'name' => _x('Rating', 'post type general name', 'your-plugin-textdomain'),
        'singular_name' => _x('Rating', 'post type singular name', 'your-plugin-textdomain'),
        'menu_name' => _x('Rating', 'admin menu', 'your-plugin-textdomain'),
        'name_admin_bar' => _x('Rating', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new' => _x('Add New', 'Rating', 'your-plugin-textdomain'),
        'add_new_item' => __('Add New Rating', 'your-plugin-textdomain'),
        'new_item' => __('New Rating', 'your-plugin-textdomain'),
        'edit_item' => __('Edit Rating', 'your-plugin-textdomain'),
        'view_item' => __('View Rating', 'your-plugin-textdomain'),
        'all_items' => __('All Rating', 'your-plugin-textdomain'),
        'search_items' => __('Search Rating', 'your-plugin-textdomain'),
        'parent_item_colon' => __('Parent Rating:', 'your-plugin-textdomain'),
        'not_found' => __('No Rating found.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No Rating found in Trash.', 'your-plugin-textdomain')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'your-plugin-textdomain'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'user_rate'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'map_meta_cap' => true,
        'menu_position' => null,
        'supports' => array('title', 'author')
    );

    register_post_type('user_rate', $args);
}

function post_filter_function()
{
    $search = $_COOKIE['keyword'];
    if ($search != null) {
        global $wpdb;
        $myrows = $wpdb->get_results("SELECT * FROM wxxp_posts WHERE post_type = 'hotel' AND post_title LIKE '%$search%' ", ARRAY_N);
        $mydata = $wpdb->get_results("SELECT post_id from wxxp_postmeta WHERE meta_key = 'address' AND meta_value LIKE '%$search%' ", ARRAY_N);


    }


    $pricee = $_POST['categoryfilter'];
    $minn_old = $pricee[0];
    $minn = intval(str_replace(" ", "", $minn_old));
    $maxm_old = $pricee[1];
    $maxm = intval(str_replace(" ", "", $maxm_old));
//    var_dump($maxm);
//    var_dump($minn);


    if (isset($_POST['categoryfilter']))
        $args = array(
            'post_type' => 'hotel',
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'hotel_star',
                    'field' => 'term_id',
                    'terms' => $_POST['categoryfilter'],
                ),
                array(
                    'taxonomy' => 'amenities',
                    'field' => 'term_id',
                    'terms' => $_POST['categoryfilter'],
                ),
                array(
                    'taxonomy' => 'facility',
                    'field' => 'term_id',
                    'terms' => $_POST['categoryfilter'],
                ),
            ),
        );
    $query = new WP_Query($args);
    if (isset($_POST['categoryfilter'])) {
        if ($query->have_posts()) :
            while ($query->have_posts()): $query->the_post();
                $url = wp_get_attachment_url(get_post_thumbnail_id($query->post->ID));
                $main_price = intval(get_field('price'));
//                var_dump($main_price);
                $search_data_one = get_the_title();
                $search_data_two = get_field('address');
                if (preg_match('/' . $search . '/i', $search_data_one) || preg_match('/' . $search . '/i', $search_data_two)) {
                    if ($main_price >= $minn && $main_price <= $maxm) {
                        ?>
                        <li>
                            <div class="booking-item" href="<?php the_permalink(); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="booking-item-img-wrap">
                                                    <!--Hotel Gallery-->
                                                    <div>
                                                        <img src="<?php echo $url; ?>"
                                                             alt="img"
                                                             title="Hotel Short Description"
                                                             style="width: 196px; height: 145px"/></div>
                                                    <!--Hotel Gallery End-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <a href="<?php the_permalink(); ?>"><h5
                                                            class="booking-item-title"><?PHP the_title(); ?></h5></a>
                                                <div class="booking-item-rating">
                                                    <ul class="icon-group booking-item-rating-stars">
                                                        <?php
                                                        $custom_taxonomy = get_the_terms($query->post->ID, 'hotel_star');
                                                        if ($custom_taxonomy != null) {
                                                            foreach ($custom_taxonomy as $star) {
                                                                $starr = $star->slug;
//                                                                var_dump($starr);
                                                                switch ($starr) {
                                                                    case '5': ?>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <?php
                                                                        break;
                                                                    case '4': ?>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <?php
                                                                        break;
                                                                    case '3': ?>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <?php
                                                                        break;
                                                                    case '2': ?>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <?php
                                                                        break;
                                                                    case '1': ?>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <?php
                                                                        break;

                                                                    default: ?>
                                                                        <p></p>

                                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                                <p class="booking-item-address"><i
                                                            class="fa fa-map-marker"></i> <?php echo get_field('address'); ?>
                                                </p>
                                                <div class="clearfix"></div>
                                                <div class="clearfix"></div>
                                                <small class="booking-item-last-booked">Latest booking: 6 hours ago
                                                </small>
                                                <ul class="facility-icons">
                                                    <?php
                                                    $facilities = get_field('facilities');
                                                    //                                                var_dump($facilities);
                                                    foreach ($facilities as $faciliti => $v) {
//                                                    var_dump($v);
                                                        switch ($v) {
                                                            case 'Swimming Pool': ?>
                                                                <li style="padding-left: -1px !important;">
                                                                    <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/swimming-icon.png"
                                                                            alt="img"></i> <?php echo $v; ?>
                                                                </li>
                                                                <?php
                                                                break;
                                                            case 'Whirlpool': ?>
                                                                <li>
                                                                    <i><img src="
                                                            <?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/whirlpool-icon.png"
                                                                            alt="img"></i><?php echo $v; ?>
                                                                </li>
                                                                <?php
                                                                break;
                                                            case 'WiFi': ?>
                                                                <li>
                                                                    <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/wifi-icon.png"
                                                                            alt="img"></i> <?php echo $v; ?>
                                                                </li>
                                                                <?php
                                                                break;
                                                            case 'Parking': ?>
                                                                <li>
                                                                    <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/parking-icon.png"
                                                                            alt="img"></i> <?php echo $v; ?>
                                                                </li>
                                                                <?php
                                                                break;
                                                            case 'Refridgerator': ?>
                                                                <li>
                                                                    <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/refrigerator-icon.png"
                                                                            alt="img"></i> <?php echo $v; ?>
                                                                </li>
                                                                <?php
                                                                break;
                                                            case 'Microwave Oven': ?>
                                                                <li>
                                                                    <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/microwave-icon.png"
                                                                            alt="img"></i> <?php echo $v; ?>
                                                                </li>
                                                                <?php
                                                                break;
                                                            default: ?>
                                                                <li>
                                                                    <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/swimming-icon.png"
                                                                            alt="img"></i> <?php echo $v; ?>
                                                                </li>
                                                                <?php
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="booking-item-rating">

                                                    <?php
                                                    /**
                                                     * Custom Slug Name user_rate
                                                     */
                                                    $args1 = array(
                                                        'post_type' => 'user_rate',
                                                        'post_status' => 'publish',
                                                        'meta_key' => 'id_post',
                                                        'meta_value' => $query->post->ID
                                                    );
                                                    $query1 = new WP_Query($args1);
                                                    $posts = $query1->posts;
                                                    $counts_5 = 0;
                                                    $counts_4 = 0;
                                                    $counts_3 = 0;
                                                    $counts_2 = 0;
                                                    $counts_1 = 0;

                                                    $user_rate_count = $query->found_posts;


                                                    //                                                                                var_dump($the_query);
                                                    foreach ($posts as $posttt) {
                                                        // Do your stuff, e.g.
                                                        $id = $posttt->ID;
                                                        $posttype = $posttt->post_type;
                                                        $user_rate = get_post_meta($id, 'user_rate', true);
                                                        $count = intval($user_rate);
//                                                         var_dump($posttype);


                                                        if ($count == 5) {
                                                            $counts_5 = $counts_5 + 1;
                                                        }
                                                        if ($count == 4) {
                                                            $counts_4 = $counts_4 + 1;
                                                        }
                                                        if ($count == 3) {
                                                            $counts_3 = $counts_3 + 1;
                                                        }
                                                        if ($count == 2) {
                                                            $counts_2 = $counts_2 + 1;
                                                        }
                                                        if ($count == 1) {
                                                            $counts_1 = $counts_1 + 1;
                                                        }

                                                    }
                                                    $tot_stars = $counts_5 + $counts_4 + $counts_3 + $counts_2 + $counts_1;


                                                    if ($tot_stars == 0) {
                                                        ?>
                                                        <span
                                                                class="booking-item-rating-number">Review score 0</span>
                                                        <br/>
                                                        <small>(0 reviews)</small>
                                                    <?php } else {
                                                        $avg = ($counts_1 + $counts_2 * 2 + $counts_3 * 3 + $counts_4 * 4 + $counts_5 * 5) / $tot_stars;
                                                        ?>
                                                        <span
                                                                class="booking-item-rating-number">Review score <?php echo round($avg, 1, PHP_ROUND_HALF_UP); ?></span>
                                                        <br/>
                                                        <small>(<?php echo $user_rate_count; ?> reviews)</small>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div class="hotel-price"><span
                                                    class="booking-item-price ">$<?php echo $main_price; ?></span><span>/night</span>
                                            <?php $breakfast = get_field('breakfast', $id);
                                            if ($breakfast != null) {
                                                foreach ($breakfast as $break => $b) {
                                                    switch ($b) {
                                                        case 'Breakfast Included': ?>
                                                            <p><?php echo $b; ?></p>
                                                            <?php
                                                            break;
                                                        case 'Breakfast not Included': ?>
                                                            <p><?php echo $b; ?></p>
                                                            <?php
                                                            break;

                                                        default: ?>
                                                            <p></p>

                                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pull-right"><a href="<?php the_permalink($query->post->ID); ?>"
                                                                        class="page-btn">Available Rooms</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <div class="clearfix"></div>
                        <?php
                    }
                }
            endwhile;
//            wp_reset_postdata();
        else :
//            echo 'No posts found';
        endif;
    } else {
        global $post;
        $args = array(
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'hotel',
            'post_status' => 'publish'
        );
        $the_query = new WP_Query($args);
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            $id = $post->ID;
            $main_price = intval(get_field('price'));
            if ($main_price >= $minn && $main_price <= $maxm) {
                ?>
                <li>
                    <div class="booking-item" href="<?php the_permalink(); ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="booking-item-img-wrap">
                                            <!--Hotel Gallery-->
                                            <div>
                                                <img src="<?php echo $url; ?>"
                                                     alt="img"
                                                     title="Hotel Short Description"
                                                     style="width: 196px; height: 145px"/></div>
                                            <!--Hotel Gallery End-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-8">
                                        <a href="<?php the_permalink(); ?>"><h5
                                                    class="booking-item-title"><?PHP the_title(); ?></h5></a>
                                        <div class="booking-item-rating">
                                            <ul class="icon-group booking-item-rating-stars">
                                                <?php
                                                $custom_taxonomy = get_the_terms($post->ID, 'hotel_star');
                                                if ($custom_taxonomy != null) {
                                                    foreach ($custom_taxonomy as $star) {
                                                        $starr = $star->slug;
//                                                                var_dump($starr);
                                                        switch ($starr) {
                                                            case '5': ?>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <?php
                                                                break;
                                                            case '4': ?>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <?php
                                                                break;
                                                            case '3': ?>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <?php
                                                                break;
                                                            case '2': ?>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <?php
                                                                break;
                                                            case '1': ?>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <?php
                                                                break;

                                                            default: ?>
                                                                <p></p>

                                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class="booking-item-address"><i
                                                    class="fa fa-map-marker"></i> <?php echo get_field('address'); ?>
                                        </p>
                                        <div class="clearfix"></div>
                                        <div class="clearfix"></div>
                                        <small class="booking-item-last-booked">Latest booking: 6 hours ago
                                        </small>
                                        <ul class="facility-icons">
                                            <?php
                                            $facilities = get_field('facilities');
                                            //                                                var_dump($facilities);
                                            foreach ($facilities as $faciliti => $v) {
//                                                    var_dump($v);
                                                switch ($v) {
                                                    case 'Swimming Pool': ?>
                                                        <li style="padding-left: -1px !important;">
                                                            <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/swimming-icon.png"
                                                                    alt="img"></i> <?php echo $v; ?>
                                                        </li>
                                                        <?php
                                                        break;
                                                    case 'Whirlpool': ?>
                                                        <li>
                                                            <i><img src="
                                                            <?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/whirlpool-icon.png"
                                                                    alt="img"></i><?php echo $v; ?>
                                                        </li>
                                                        <?php
                                                        break;
                                                    case 'WiFi': ?>
                                                        <li>
                                                            <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/wifi-icon.png"
                                                                    alt="img"></i> <?php echo $v; ?>
                                                        </li>
                                                        <?php
                                                        break;
                                                    case 'Parking': ?>
                                                        <li>
                                                            <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/parking-icon.png"
                                                                    alt="img"></i> <?php echo $v; ?>
                                                        </li>
                                                        <?php
                                                        break;
                                                    case 'Refridgerator': ?>
                                                        <li>
                                                            <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/refrigerator-icon.png"
                                                                    alt="img"></i> <?php echo $v; ?>
                                                        </li>
                                                        <?php
                                                        break;
                                                    case 'Microwave Oven': ?>
                                                        <li>
                                                            <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/microwave-icon.png"
                                                                    alt="img"></i> <?php echo $v; ?>
                                                        </li>
                                                        <?php
                                                        break;
                                                    default: ?>
                                                        <li>
                                                            <i><img src="<?php bloginfo('template_url'); ?>/images/hotel-facilitys-icons/swimming-icon.png"
                                                                    alt="img"></i> <?php echo $v; ?>
                                                        </li>
                                                        <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="booking-item-rating">

                                            <?php
                                            /**
                                             * Custom Slug Name user_rate
                                             */
                                            $args = array(
                                                'post_type' => 'user_rate',
                                                'post_status' => 'publish',
                                                'meta_key' => 'id_post',
                                                'meta_value' => $post->ID
                                            );
                                            $query = new WP_Query($args);
                                            $posts = $query->posts;
                                            $counts_5 = 0;
                                            $counts_4 = 0;
                                            $counts_3 = 0;
                                            $counts_2 = 0;
                                            $counts_1 = 0;

                                            $user_rate_count = $query->found_posts;


                                            //                                                                                var_dump($the_query);
                                            foreach ($posts as $posttt) {
                                                // Do your stuff, e.g.
                                                $id = $posttt->ID;
//                                            $posttype = $posttt->post_type;
                                                $user_rate = get_post_meta($id, 'user_rate', true);
                                                $count = intval($user_rate);
//                                                         var_dump($posttype);


                                                if ($count == 5) {
                                                    $counts_5 = $counts_5 + 1;
                                                }
                                                if ($count == 4) {
                                                    $counts_4 = $counts_4 + 1;
                                                }
                                                if ($count == 3) {
                                                    $counts_3 = $counts_3 + 1;
                                                }
                                                if ($count == 2) {
                                                    $counts_2 = $counts_2 + 1;
                                                }
                                                if ($count == 1) {
                                                    $counts_1 = $counts_1 + 1;
                                                }

                                            }
                                            $tot_stars = $counts_5 + $counts_4 + $counts_3 + $counts_2 + $counts_1;
                                            if ($tot_stars == 0) {
                                                ?>
                                                <span
                                                        class="booking-item-rating-number">Review score 0</span>
                                                <br/>
                                                <small>(0 reviews)</small>
                                            <?php } else {
                                                $avg = ($counts_1 + $counts_2 * 2 + $counts_3 * 3 + $counts_4 * 4 + $counts_5 * 5) / $tot_stars;
                                                ?>
                                                <span
                                                        class="booking-item-rating-number">Review score <?php echo round($avg, 1, PHP_ROUND_HALF_UP); ?></span>
                                                <br/>
                                                <small>(<?php echo $user_rate_count; ?> reviews)</small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="hotel-price"><span
                                            class="booking-item-price ">$<?php echo get_field('price'); ?></span><span>/night</span>
                                    <?php $breakfast = get_field('breakfast', $id);
                                    if ($breakfast != null) {
                                        foreach ($breakfast as $break => $b) {
                                            switch ($b) {
                                                case 'Breakfast Included': ?>
                                                    <p><?php echo $b; ?></p>
                                                    <?php
                                                    break;
                                                case 'Breakfast not Included': ?>
                                                    <p><?php echo $b; ?></p>
                                                    <?php
                                                    break;

                                                default: ?>
                                                    <p></p>

                                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6 pull-right"><a href="<?php the_permalink($post->ID); ?>"
                                                                class="page-btn">Available Rooms</a>
                            </div>
                        </div>
                    </div>
                </li>
                <div class="clearfix"></div>
                <?php
            } else {
                echo "No post found";
            }
        endwhile;
    }
    die();
}

add_action('wp_ajax_myfilter', 'post_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'post_filter_function');