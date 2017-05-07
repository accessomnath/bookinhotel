<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 28-03-2017
 * Time: AM 10:44
 */
get_header();

//var_dump(get_field('facilities'));

?>
    <section id="inner-page-area">
        <div class="container-fluid">
            <div class="col-md-2"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-1.jpg" alt="ad"> <img
                        src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-2.jpg" alt="ad"> <img src="images/ad-image/ad-img-6.jpg" alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-4.jpg" alt="ad"></div>
            <div class="col-md-2">
                <?php get_sidebar('sidebar') ?>
            </div>


            <div class="col-md-6">
                <div class="col-md-12 padding-five"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-12.jpg" alt="ad"></div>
                <div class="clearfix"></div>

                <ul class="booking-list">
                    <?php
                    global $post;
                    while (have_posts()) :
                        the_post();
                        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                        ?>
                        <li>
                            <div class="booking-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="booking-item-img-wrap">
                                                    <!--Hotel Gallery-->
                                                    <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs"
                                                         data-width="100%"><img src="<?php echo $url; ?>"
                                                                                alt="img"
                                                                                title="Hotel Short Description"/>
                                                        <img src="<?php echo get_field('gallery_image'); ?>" alt="img"
                                                             title="Hotel Short Description"/> <img
                                                                src="<?php echo get_field('gallery_image1'); ?>"
                                                                alt="img"
                                                                title="Hotel Short Description"/> <img
                                                                src="<?php echo get_field('gallery_image2'); ?>"
                                                                alt="img"
                                                                title="Hotel Short Description"/> <img
                                                                src="<?php echo get_field('gallery_image3'); ?>"
                                                                alt="img"
                                                                title="Hotel Short Description"/> <img
                                                                src="<?php echo get_field('gallery_image4'); ?>"
                                                                alt="img"
                                                                title="Hotel Short Description"/> <img
                                                                src="<?php echo get_field('gallery_image5'); ?>"
                                                                alt="img"
                                                                title="Hotel Short Description"/></div>
                                                    <!--Hotel Gallery End-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="hotel-details-text-section">
                                        <div class="col-md-8">
                                            <h1><?php the_title(); ?></h1>
                                            <p class="booking-item-address"><i
                                                        class="fa fa-map-marker"></i><?php echo get_field('address'); ?>
                                            </p>
                                            <div class="clearfix"></div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="tabbable booking-details-tabbable">
                                                        <ul class="nav nav-tabs" id="myTab">
                                                            <li class="active"><a href="#tab-1" data-toggle="tab"><i
                                                                            class="fa fa-signal"></i>Rating</a></li>
                                                            <li><a href="#tab-2" data-toggle="tab"><i
                                                                            class="fa fa-star"></i>Reviews</a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab-1">
                                                                <div class="mt20">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <ul class="list booking-item-raiting-list">
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
                                                                                $tot_stars = $counts_5 + $counts_4 + $counts_3 + $counts_2 + $counts_1;


                                                                                foreach ($posts as $posttt) {
                                                                                    // Do your stuff, e.g.
                                                                                    $id = $posttt->ID;
                                                                                    $user_rate = get_post_meta($id, 'user_rate', true);
                                                                                    $count = intval($user_rate);

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


                                                                                if ($tot_stars == null) { ?>

                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Exellent
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:0%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            0
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Very Good
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:0%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            0
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Average
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:0%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            0
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Poor
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:0%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            0
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Terrible
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:0%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            0
                                                                                        </div>
                                                                                    </li>
                                                                                <?php } else {
                                                                                    $avg5 = (($counts_5 * 5) * 10) / $tot_stars;
                                                                                    $avg4 = (($counts_4 * 4) * 10) / $tot_stars;
                                                                                    $avg3 = (($counts_3 * 3) * 10) / $tot_stars;
                                                                                    $avg2 = (($counts_2 * 2) * 10) / $tot_stars;
                                                                                    $avg1 = (($counts_1 * 1) * 10) / $tot_stars;
                                                                                    ?>
                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Exellent
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:<?php echo $avg5; ?>%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            <?php echo $counts_5; ?>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Very Good
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:<?php echo $avg4 ?>%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            <?php echo $counts_4; ?>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Average
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:<?php echo $avg3 ?>%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            <?php echo $counts_3; ?>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Poor
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:<?php echo $avg2 ?>%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            <?php echo $counts_2; ?>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="booking-item-raiting-list-title">
                                                                                            Terrible
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-bar">
                                                                                            <div style="width:<?php echo $avg1 ?>%;"></div>
                                                                                        </div>
                                                                                        <div class="booking-item-raiting-list-number">
                                                                                            <?php echo $counts_1; ?>
                                                                                        </div>
                                                                                    </li>
                                                                                <?php } ?>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="tab-2">
                                                                <div class="rev-section">
                                                                    <div class="row row-wrap">
                                                                        <div class="col-md-12">
                                                                            <ul class="booking-item-reviews list">
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
                                                                                //                                                                                var_dump($the_query);
                                                                                foreach ($posts as $posttt) {
                                                                                    // Do your stuff, e.g.
                                                                                    $re_name = $posttt->post_name;
                                                                                    $id = $posttt->ID;
                                                                                    $title = get_post_meta($id, 'review_title', true);
                                                                                    $user_review = get_post_meta($id, 'user_review', true);
                                                                                    $user_rate = get_post_meta($id, 'user_rate', true);
                                                                                    $user_email = get_post_meta($id, 'email_address', true);
                                                                                    ?>
                                                                                    <li>
                                                                                        <div class="row">
                                                                                            <div class="col-md-3">
                                                                                                <div class="booking-item-review-person">
                                                                                                    <a class="booking-item-review-person-avatar round"
                                                                                                       href="#">
                                                                                                        <?php
                                                                                                        ?>
                                                                                                        <img src="<?php echo get_avatar_url($user_email); ?> "
                                                                                                             class="avatar"
                                                                                                             alt="author"/>
                                                                                                    </a>
                                                                                                    <p class="booking-item-review-person-name">
                                                                                                        <a href="#">
                                                                                                            <?php echo $re_name; ?>  </a>
                                                                                                    </p>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <div class="booking-item-review-content">
                                                                                                    <h5><?php echo $title; ?></h5>
                                                                                                    <ul class="icon-group booking-item-rating-stars">
                                                                                                        <?php
                                                                                                        $rateee = intval($user_rate);
                                                                                                        ?>
                                                                                                        <?php if ($rateee == 1) { ?>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <?php
                                                                                                        } elseif ($rateee == 2) { ?>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                        <?php } elseif ($rateee == 3) { ?>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                        <?php } elseif ($rateee == 4) { ?>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                        <?php } elseif ($rateee == 5) { ?>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </li>
                                                                                                        <?php } ?>
                                                                                                    </ul>
                                                                                                    <p><?php echo $user_review; ?> </span > </p>
                                                                                                    <!--                                                                                                    <div class="booking-item-review-more-content">-->
                                                                                                    <!---->
                                                                                                    <!---->
                                                                                                    <!--                                                                                                    </div>-->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                <?php }
                                                                                ?>

                                                                            </ul>

                                                                            <div class="box bg-gray">
                                                                                <h3> Write a Review </h3>
                                                                                <form class="form-horizontal">
                                                                                    <fieldset>
                                                                                        <!-- Text input-->
                                                                                        <div class="form-group">
                                                                                            <label class="col-md-4 control-label required"
                                                                                                   for="name">Your Name
                                                                                                *</label>
                                                                                            <div class="col-md-8">
                                                                                                <input id="uname"
                                                                                                       name="uname"
                                                                                                       type="text"
                                                                                                       placeholder=""
                                                                                                       class="form-control input-md"
                                                                                                       required="">

                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Text input-->
                                                                                        <div class="form-group">
                                                                                            <label class="col-md-4 control-label required"
                                                                                                   for="email">Your
                                                                                                Email *</label>
                                                                                            <div class="col-md-8">
                                                                                                <input id="uemail"
                                                                                                       name="uemail"
                                                                                                       type="email"
                                                                                                       placeholder=""
                                                                                                       class="form-control input-md"
                                                                                                       required="">

                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Text input-->
                                                                                        <div class="form-group">
                                                                                            <label class="col-md-4 control-label required"
                                                                                                   for="review-title">Review
                                                                                                title *</label>
                                                                                            <div class="col-md-8">
                                                                                                <input id="review_title"
                                                                                                       name="review_title"
                                                                                                       type="text"
                                                                                                       placeholder=""
                                                                                                       class="form-control input-md"
                                                                                                       required="">

                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Textarea -->
                                                                                        <div class="form-group">
                                                                                            <label class="col-md-4 control-label required"
                                                                                                   for="review-description">Review
                                                                                                *</label>
                                                                                            <div class="col-md-8">
                                                                                                <textarea
                                                                                                        class="form-control"
                                                                                                        id="review_description"
                                                                                                        name="review_description"></textarea>
                                                                                            </div>
                                                                                        </div>


                                                                                        <!-- starts -->
                                                                                        <div class="form-group">

                                                                                            <div class="col-md-4">
                                                                                                <p class="star-rating-text">
                                                                                                    Your Star
                                                                                                    Rating*</p>
                                                                                            </div>

                                                                                            <div class="col-md-8">
                                                                                                <ul class="star-ratings">
                                                                                                    <input type="hidden"
                                                                                                           id="rates"
                                                                                                           value="5">
                                                                                                    <p class="star">
                                                                                                        <i class="fa fa-star fa-2x fa-color"
                                                                                                           aria-hidden="false"
                                                                                                           id="1"
                                                                                                           onclick="rate(1);"></i>
                                                                                                        <i class="fa fa-star fa-2x fa-color"
                                                                                                           aria-hidden="false"
                                                                                                           id="2"
                                                                                                           onclick="rate(2);"></i>
                                                                                                        <i class="fa fa-star fa-2x fa-color"
                                                                                                           aria-hidden="false"
                                                                                                           id="3"
                                                                                                           onclick="rate(3);"></i>
                                                                                                        <i class="fa fa-star fa-2x fa-color"
                                                                                                           aria-hidden="false"
                                                                                                           id="4"
                                                                                                           onclick="rate(4);"></i>
                                                                                                        <i class="fa fa-star fa-2x fa-color"
                                                                                                           aria-hidden="false"
                                                                                                           id="5"
                                                                                                           onclick="rate(5);"></i>
                                                                                                    </p>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Button -->
                                                                                        <div class="form-group">
                                                                                            <?php $idpost = $post->ID;
                                                                                            $idtitle = $post->post_title;
                                                                                            ?>
                                                                                            <!--<label class="col-md-4 control-label" for="singlebutton">Single Button</label>-->
                                                                                            <input type="hidden"
                                                                                                   name="ids" id="ids"
                                                                                                   value="<?php echo $idpost; ?>">
                                                                                            <input type="hidden"
                                                                                                   name="title_post"
                                                                                                   id="title_post"
                                                                                                   value="<?php echo $idtitle; ?>">
                                                                                            <div class="col-md-8 col-md-offset-4">
                                                                                                <?php
                                                                                                if (is_user_logged_in()) { ?>
                                                                                                <button id="singlebutton"
                                                                                                        name="singlebutton"
                                                                                                        class="btn-light">
                                                                                                    submit
                                                                                                    <?php } else {
                                                                                                        echo '<h4>Only logged in user can review.</h4>';

                                                                                                    } ?>                                                                             </button>
                                                                                            </div>
                                                                                        </div>

                                                                                    </fieldset>
                                                                                    <div id="msg"></div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <?php the_content(); ?>
                                            <h4>Most Popular Facilities</h4>
                                            <ul class="facility-icons">
                                                <?php
                                                $facilities = get_field('facilities');
                                                //                                                var_dump($facilities);
                                                foreach ($facilities as $faciliti => $v) {
//                                                    var_dump($v);
                                                    switch ($v) {
                                                        case 'Swimming Pool': ?>
                                                            <li>
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
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="why-guest-love-hotel-area">
                                                <h4>Guests Love It Because... </h4>
                                                <b>Special breakfast options:</b>
                                                <p><?php echo get_field('breakfast_facilities'); ?></p>
                                                <ul class="special-highlight-area">

                                                    <?php
                                                    $facilities = get_field('facilities');
                                                    //                                                var_dump($facilities);
                                                    foreach ($facilities as $faciliti => $v) {
//                                                    var_dump($v);
                                                        switch ($v) {
                                                            case 'Swimming Pool': ?>
                                                                <li>
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
                                                <b>Loyal Customers</b>
                                                <blockquote>There are more repeat guests here than most other
                                                    properties.
                                                </blockquote>
                                                <a href="#" class="btn-light">Reserve</a></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="dialog" style="text-align: center" title="Available Rooms">
                                                <p style="text-align: center"><?php echo get_field('available_rooms') ?>
                                                    Rooms available on Hotel <?php the_title(); ?> </p>
                                            </div>
                                            <div class="booking-item-dates-change">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-icon-left form-group-filled">
                                                                        <label>Check in</label>
                                                                        <input class="form-control" id="incheck"
                                                                               name="start"
                                                                               type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-icon-left form-group-filled">
                                                                        <label>Check out</label>
                                                                        <input class="form-control" id="outchk"
                                                                               name="end"
                                                                               type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group form-group-select-plus">
                                                                <label>Adults</label>
                                                                <select class="form-control">
                                                                    <option value="1" selected="selected">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group form-group-select-plus">
                                                                <label>Childrens</label>
                                                                <select class="form-control">
                                                                    <option value="1" selected="selected">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group form-group-select-plus">
                                                                <label>Rooms</label>
                                                                <select class="form-control" name="">
                                                                    <option value="1" selected="selected">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <p id="OpenDialog"><input
                                                                        value="Availability" class="btn-light"
                                                                        type="button"></p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <div class="clearfix"></div>
                    <?php endwhile; ?>
                </ul>


                <div class="clearfix"></div>
                <div class="col-md-4 padding-five"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-7.jpg" alt="ad"></div>
                <div class="col-md-4 padding-five"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-8.jpg" alt="ad"></div>
                <div class="col-md-4 padding-five"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-9.jpg" alt="ad"></div>
                <div class="col-md-12 padding-five" style="margin-top:4px;"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-11.jpg"
                                                                                 alt="ad"></div>
                <div class="col-md-12 padding-five" style="margin-top:4px;"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-10.jpg"
                                                                                 alt="ad"></div>
            </div>


            <div class="col-md-2"><img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-5.jpg" alt="ad"> <img
                        src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-3.jpg" alt="ad"> <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-4.jpg" alt="ad">
                <img src="<?php bloginfo('template_url'); ?>/images/ad-image/ad-img-6.jpg" alt="ad"></div>
        </div>
    </section>
<?php get_footer(); ?>