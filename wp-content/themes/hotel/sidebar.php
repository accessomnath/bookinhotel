<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 20-03-2017
 * Time: PM 12:46
 */
?>
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

