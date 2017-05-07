<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 29-03-2017
 * Time: PM 12:24
 */


    ?>
    <li>
        <div class="booking-item" href="#">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="booking-item-img-wrap">
                                <!--Hotel Gallery-->
                                <div>
                                    <img src="<?php echo $url; ?>"
                                         alt="img"
                                         title="Hotel Short Description"/></div>
                                <!--Hotel Gallery End-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="booking-item-title"><?PHP the_title() ?></h5>
                            <div class="booking-item-rating">
                                <ul class="icon-group booking-item-rating-stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
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
                            <div class="booking-item-rating"><span
                                        class="booking-item-rating-number">Review score 6.8</span><br/>
                                <small>(308 reviews)</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <div class="hotel-price"><span
                                class="booking-item-price ">$<?php echo get_field('price'); ?></span><span>/night</span>
                        <p>Breakfast Included</p>
                    </div>
                </div>
                <div class="col-md-6 pull-right"><a href="#" class="page-btn">Available Rooms</a>
                </div>
            </div>
        </div>
    </li>
    <div class="clearfix"></div>
