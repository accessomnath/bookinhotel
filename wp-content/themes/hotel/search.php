<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 29-03-2017
 * Time: AM 10:46
 * Template Name: search
 */

$keyword = $_POST['keyword'];
$longi = $_POST['longit'];
$lati = $_POST['latitude'];
//setcookie('keyword', $keyword, time() + (10000));
setcookie('keyword', $_POST['keyword'], time() + 180);
get_header();
//$checkin = $_POST['search'];
//$chkout = $_POST['search'];
//$searchQuery = $_POST['search'];

if ($keyword != null) {
    global $wpdb;
    $myrows = $wpdb->get_results("SELECT * FROM wxxp_posts WHERE post_type = 'hotel' AND post_title LIKE '%$keyword%' ", ARRAY_N);
    $mydata = $wpdb->get_results("SELECT post_id from wxxp_postmeta WHERE meta_key = 'address' AND meta_value LIKE '%$keyword%' ", ARRAY_N);
    ?>
    <section id="inner-page-area">
        <div class="container-fluid">
            <div class="col-md-2"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-1.jpg"
                                       alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-2.jpg" alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-6.jpg" alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-4.jpg" alt="ad">
            </div>
            <div class="col-md-2">

                <aside class="booking-filters booking-filters-white">
                    <h5 style="padding-left:15px;">Simplify Your Search :</h5>
                    <!--Map Image-->
                    <p class="map-image">
                        <iframe width="181" height="107" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?q=<?php echo $lati; ?>,<?php echo $longi; ?>&hl=es;z=14&amp;output=embed"></iframe>
                    </p>
                    <!--Map Image End-->
                    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                        <ul class="list booking-filters-list">

                            <li>
                                <h5 class="booking-filters-title">Price</h5>
                                <div id="price-slider"></div>
                                <input type="hidden" id="frommm" value="" name="categoryfilter[]">
                                <input type="hidden" id="toooo" value="" name="categoryfilter[]">
                                <input type="hidden" id="keyword" value="" name="categoryfilter[]">
                            </li>

                            <li>
                                <h5 class="booking-filters-title">Star Rating</h5>
                                <?php

                                if ($terms = get_terms('hotel_star', 'orderby=name')) : // to make it simple I use default categories
                                    foreach ($terms as $term) :?>
                                        <div class="checkbox">
                                            <?php echo '<label><input class="checkbox" name="categoryfilter[]" value="' . $term->term_id . '" type="checkbox"/>' . $term->name . '&nbsp;(' . $term->count . ')' . '</label>'; ?>
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </li>
                            <li>
                                <h5 class="booking-filters-title">Facility</h5>
                                <?php
                                if ($terms = get_terms('facility', 'orderby=name')) : // to make it simple I use default categories
                                    foreach ($terms as $term) :?>

                                        <div class="checkbox">
                                            <?php echo '<label><input class="checkbox" name="categoryfilter[]" value="' . $term->term_id . '" type="checkbox"/>' . $term->name . '&nbsp;(' . $term->count . ')' . '</label>'; ?>
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </li>
                            <li>
                                <h5 class="booking-filters-title">Hotel Amenities</h5>
                                <?php
                                if ($terms = get_terms('amenities', 'orderby=name')) : // to make it simple I use default categories
                                    foreach ($terms as $term) :?>
                                        <div class="checkbox">
                                            <?php echo '<label><input class="checkbox" name="categoryfilter[]" value="' . $term->term_id . '" type="checkbox"/>' . $term->name . '&nbsp;(' . $term->count . ')' . '</label>'; ?>
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                                <input type="hidden" name="posttype" value="hotel"/>
                                <button name="applied" style="display:none;">Apply filter</button>
                                <input type="hidden" name="action" value="myfilter">
                            </li>
                        </ul>
                    </form>
                </aside>


            </div>
            <div class="col-md-6">
                <div class="col-md-12 padding-five"><img
                            src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-12.jpg" alt="ad"></div>
                <div class="clearfix"></div>
                <div class="loader" id="loader" style="display: none;">Loading...</div>
                <ul class="booking-list">
                    <div id="response"></div>
                    <li id="old_search_old">
                        <?php if ($myrows != null) {
                            foreach ($myrows as $rows) {
                                $id = intval($rows[0]);
                                $datas = get_post($id);
                                $title = $datas->post_title;
                                $image = wp_get_attachment_url(get_post_thumbnail_id($id));
                                ?>
                                <div class="booking-item" id="booking" href="<?php the_permalink(); ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="booking-item-img-wrap">
                                                        <!--Hotel Gallery-->
                                                        <div>
                                                            <img src="<?php echo $image; ?>"
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
                                                                class="booking-item-title"><?PHP echo $title; ?></h5>
                                                    </a>
                                                    <div class="booking-item-rating">
                                                        <ul class="icon-group booking-item-rating-stars">
                                                            <?php
                                                            $custom_taxonomy = get_the_terms($id, 'hotel_star');
                                                            if ($custom_taxonomy != null) {
                                                                foreach ($custom_taxonomy as $star) {
                                                                    $starr = $star->slug;
                                                                    var_dump($starr);
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
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>

                                                                            <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p class="booking-item-address"><i
                                                                class="fa fa-map-marker"></i> <?php echo get_field('address', $id); ?>
                                                    </p>
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                    <small class="booking-item-last-booked">Latest booking: 6 hours
                                                        ago
                                                    </small>
                                                    <ul class="facility-icons">
                                                        <?php
                                                        $facilities = get_field('facilities', $id);
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
                                                    <?php
                                                    /**
                                                     * Custom Slug Name user_rate
                                                     */
                                                    $args = array(
                                                        'post_type' => 'user_rate',
                                                        'post_status' => 'publish',
                                                        'meta_key' => 'id_post',
                                                        'meta_value' => $id
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
                                                        $idd = $posttt->ID;
                                                        $posttype = $posttt->post_type;
                                                        $user_rate = get_post_meta($idd, 'user_rate', true);
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
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                            <div class="hotel-price"><span
                                                        class="booking-item-price ">$<?php echo get_field('price', $id); ?></span><span>/night</span>
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
                                        <div class="col-md-6 pull-right"><a href="<?php the_permalink($id); ?>"
                                                                            class="page-btn">Available Rooms</a>
                                        </div>
                                    </div>
                                </div>

                                <!--                            <div class="clearfix"></div>-->
                            <?php } ?>
                        <?php } else {
                            foreach ($mydata as $data) {
                                $id = intval($data[0]);
                                $datas = get_post($id);
                                $title = $datas->post_title;
                                $image = wp_get_attachment_url(get_post_thumbnail_id($id));
                                ?>

                                <div class="booking-item" href="<?php the_permalink(); ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="booking-item-img-wrap">
                                                        <!--Hotel Gallery-->
                                                        <div>
                                                            <img src="<?php echo $image; ?>"
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
                                                                class="booking-item-title"><?PHP echo $title; ?></h5>
                                                    </a>
                                                    <div class="booking-item-rating">
                                                        <ul class="icon-group booking-item-rating-stars">
                                                            <?php
                                                            $custom_taxonomy = get_the_terms($id, 'hotel_star');
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
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p class="booking-item-address"><i
                                                                class="fa fa-map-marker"></i> <?php echo get_field('address', $id); ?>
                                                    </p>
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                    <small class="booking-item-last-booked">Latest booking: 6 hours
                                                        ago
                                                    </small>
                                                    <ul class="facility-icons">
                                                        <?php
                                                        $facilities = get_field('facilities', $id);
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
                                                    <?php
                                                    /**
                                                     * Custom Slug Name user_rate
                                                     */
                                                    $args = array(
                                                        'post_type' => 'user_rate',
                                                        'post_status' => 'publish',
                                                        'meta_key' => 'id_post',
                                                        'meta_value' => $id
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
                                                        $idd = $posttt->ID;
                                                        $posttype = $posttt->post_type;
                                                        $user_rate = get_post_meta($idd, 'user_rate', true);
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
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                            <div class="hotel-price"><span
                                                        class="booking-item-price ">$<?php echo get_field('price', $id); ?></span><span>/night</span>
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
                                        <div class="col-md-6 pull-right"><a href="<?php the_permalink($id); ?>"
                                                                            class="page-btn">Available Rooms</a>
                                        </div>
                                    </div>
                                </div>

                                <!--                            <div class="clearfix"></div>-->
                            <?php } ?>
                        <?php } ?>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <div class="col-md-4 padding-five"><img
                            src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-7.jpg" alt="ad"></div>
                <div class="col-md-4 padding-five"><img
                            src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-8.jpg" alt="ad"></div>
                <div class="col-md-4 padding-five"><img
                            src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-9.jpg" alt="ad"></div>
                <div class="col-md-12 padding-five" style="margin-top:4px;"><img
                            src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-11.jpg"
                            alt="ad"></div>
                <div class="col-md-12 padding-five" style="margin-top:4px;"><img
                            src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-10.jpg"
                            alt="ad"></div>
            </div>
            <div class="col-md-2"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-5.jpg"
                                       alt="ad">
                <img
                        src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-3.jpg" alt="ad"> <img
                        src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-4.jpg" alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-6.jpg" alt="ad"></div>
        </div>
    </section>
    <?php get_footer(); ?>

<?php } else {
    echo "<script type='text/javascript'>window.location='" . home_url() . "'</script>";
    exit;

} ?>