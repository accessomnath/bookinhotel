<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 29-03-2017
 * Time: AM 10:40
 */
?>
<form action="<?php echo site_url(); ?>/search" method="post" role="search" id="main_search_form">
    <div class="form-fields">
        <div class="col-md-12">
            <h2><i class="material-icons">search</i> Book Direct With Hotel</h2>
        </div>
        <div class="col-md-12">
            <label>Going to...</label>
            <input class="form-control" id="map" name="keyword"
                   placeholder="Destination, hotel name or address..." type="text">

            <input type="hidden" name="longit" id="long">
            <input type="hidden" name="latitude" id="lat">
<!--            --><?php //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); ?>
        </div>
        <div class="col-md-6">
            <label>Check in</label>
            <div>
                <input class="form-control" type="text" name="checkin" id="checkinn" value="Select Date">
                <div class="monthly" id="checkin-date"></div>
            </div>
        </div>
        <div class="col-md-6">
            <label>Check out</label>
            <div>

                <input class="form-control" type="text" id="checkout" name="checkoutt" Select Date">
                <div class="monthly" id="checkout-date"></div>
            </div>
        </div>
        <div class="col-md-4">
            <label>Rooms</label>
            <select id="room" name="room[]" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9+</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>Adults (18+)</label>
            <select id="adult" name="name=" adult[]"" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>Children (0-17)</label>
            <select id="child" name="[]" class="form-control">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <input value="Search" type="submit" id="main_search" class="btn-light">
    </div>
</form>

