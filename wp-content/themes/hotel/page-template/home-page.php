<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 20-03-2017
 * Time: PM 12:45
 * Template name: Home
 */
get_header()
?>
    <!--Top Bar End-->

    <section class="search-slider-area">
        <!--Banner Area Start-->
        <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">
                    <?php
                    /**
                     * Custom Slug Name slider
                     */
                    global $post;
                    $args = array(
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_type' => 'slider',
                        'post_status' => 'publish'
                    );
                    $the_query = new WP_Query($args);
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                        ?>

                        <div class="item"><img src="<?php echo $url; ?>"
                                               alt="img">
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <!--Main Search Area Start-->

            <div class="col-md-6 slider-content">
                <div class="slider-search-area">
                    <?php get_template_part('searchTemplate'); ?>
                </div>
            </div>

            <!--Main Search Area Start-->
        </div>
        <!--Banner Area End-->
    </section>
    <section id="inner-page-area">
        <div class="container-fluid">
            <div class="col-md-2"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-1.jpg" alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-2.jpg" alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-6.jpg" alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-4.jpg" alt="ad">
            </div>
            <div class="col-md-2">
                <?php get_sidebar('sidebar') ?>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 padding-five"><img
                            src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-12.jpg" alt="ad"></div>
                <div class="clearfix"></div>
                <div class="loader" id="loader" style="display: none;">Loading...</div>
                <ul class="booking-list">
                    <p id="response"></p>
                    <?php
                    /**
                     * Custom Slug Name slider
                     */
                    global $post;
                    $args = array(
                        'posts_per_page' => 10,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_type' => 'hotel',
                        'post_status' => 'publish'
                    );
                    $the_query = new WP_Query($args);
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                        ?>
                        <li>
                            <div class="booking-item" id="xxx" href="<?php the_permalink(); ?>">
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
                    <?php endwhile; ?>
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
            <div class="col-md-2"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-5.jpg" alt="ad">
                <img
                        src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-3.jpg" alt="ad"> <img
                        src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-4.jpg" alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-6.jpg" alt="ad"></div>
        </div>
    </section>
<?php get_footer(); ?>