<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 20-03-2017
 * Time: PM 12:46
 */
//$err = $_GET['err'];
?>

<!--Footer Area Start-->
<section id="footer-area">
    <p>&copy; 2017 hoteldirectory.com / Developed by <a href="http://gowebbi.com" target="_blank">gowebbi.com</a></p>
</section>
<!--Footer Area End-->

<!-- Login Modal Start -->
<div class="modal fade-scale banner-modal-area" id="login" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="login1" action="login" method="post">
                <p class="status" style="margin-left: 195px; color: red;"></p>
                <div class="col-md-12">
                    <div class="form-fields">
                        <h4>User Login</h4>
                        <input class="form-control" id="username" name="username" placeholder="Email"
                               type="text">
                        <input class="form-control" id="password" name="password" placeholder="Password"
                               type="password">
                    </div>
                </div>
                <div class="col-md-2 tab-button">
                    <input value="Submit" type="submit" id="login_submit" class="btn-light">
                </div>
                <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
            </form>

            <div>
                <label for="chk" style="color:red">
                    <p style="float:right;margin-right:10px;"><input type="checkbox" id="chk1"
                                                                     style="height:12px;margin-top:10px;width:20px;"><span
                                style="margin-left:5px;">Forgot Password?</span></p>


                    <div class="col-md-12" id="listt" style="padding: 0px;">
                        <form name="lostpasswordform" id="lostpasswordform"
                              action="<?php echo wp_lostpassword_url(); ?>"
                              method="post">
                            <p>
                                <label class="control-label" for="name" style="color:#888;">Username or E-mail:<br>
                                </label>
                                <input type="text" name="user_login" id="user_login" class="form-control" value=""
                                       placeholder="Username or E-mail" required>
                            </p>
                            <input type="hidden" name="redirect_to" value="<?php echo $redirect ?>">

                            <input type="submit" name="wp-submit" id="wp-submit" class="btn btn btn-danger"
                                   value="Get New Password"
                                   style="float:right;margin-bottom: 10px;background-color:red;border-color:#ee8323;border-radius:1px;">
                        </form>
                    </div>
            </div>


        </div>
    </div>
</div>
<!-- Login Modal End-->

<!-- Registration Modal Start -->
<div class="modal fade-scale banner-modal-area" id="registration" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="#" id="signup-form">
                <div class="col-md-12">
                    <div class="form-fields">
                        <h4>Hotel vendor Registration</h4>
                        <input class="form-control" id="User_name" placeholder="Hotel Name *" type="text">
                        <input class="form-control" id="User_address" placeholder="Hotel Address *" type="text">
                        <input class="form-control" id="User_city" placeholder="City *" type="text">
                        <input class="form-control" id="User_zip" placeholder="Zip Code/Post Code *" type="text">
                        <input class="form-control" id="User_Con_name" placeholder="Contact Name *" type="text">
                        <input class="form-control" id="User_phone" placeholder="Phone *" type="text">
                        <input class="form-control" id="User_email" placeholder="Email *" type="text">
                        <input class="form-control" id="User_password" placeholder="Password *" type="password">
                    </div>
                </div>
                <div class="col-md-2 tab-button">
                    <input value="Submit" type="button" id="btn_h_reg" class="btn-light">
                </div>
                <div class="col-md-4">
                    <p style="margin-left: 35px; margin-top: 24px; color: red;">* Mandatory Fields </p>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Registration Modal End-->


<!-- Registration Modal Start -->
<div class="modal fade-scale banner-modal-area" id="registration_user" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="#" id="signup_form_user">
                <div class="col-md-12">
                    <div class="form-fields">
                        <h4>User Registration</h4>
                        <input class="form-control" id="login_User_name" placeholder="Name *" type="text">
                        <input class="form-control" id="login_User_address" placeholder="Address" type="text">
                        <input class="form-control" id="login_User_city" placeholder="City *" type="text">
                        <input class="form-control" id="login_User_zip" placeholder="Zip Code/Post Code" type="text">
                        <input class="form-control" id="login_User_phone" placeholder="Phone" type="text">
                        <input class="form-control" id="login_User_email" placeholder="Email *" type="text">
                        <input class="form-control" id="login_User_password" placeholder="Password *" type="password">
                    </div>
                </div>
                <div class="col-md-2 tab-button">
                    <input value="Submit" type="button" id="btn_u_reg" class="btn-light">
                </div>
                <div class="col-md-4">
                    <p style="margin-left: 35px; margin-top: 24px; color: red;">* Mandatory Fields </p>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Registration Modal end user-->
<!--Required js -->

<!--<script src="--><?php //bloginfo('template_url'); ?><!--/js/jquery-1.11.3.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap-dropdown-on-hover.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootsnav.js"></script>
<script>


    $('.checkbox').on('change', function () {
        var filter = $('#filter');
        console.log(filter);
        $('#loader').show();
        $('div#xxx').hide();
        $.ajax({
            url: filter.attr('action'),
            data: filter.serialize(), // form data
            type: filter.attr('method'), // POST
            beforeSend: function (xhr) {
                filter.find('button').text('Processing...'); // changing the button label
            },
            success: function (data) {
//                    filter.find('button').text('Apply filter'); // changing the button label back
                $('#loader').hide();
                $('#response').empty().html(data); // insert data
                $('#old_search_old').hide();

            }
        });
        return false;
    });
</script>


<!-- Date Picker -->
<script src="<?php bloginfo('template_url'); ?>/date-picker/monthly.js"></script>
<link href="<?php bloginfo('template_url'); ?>/date-picker/monthly.css" rel="stylesheet">
<script src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
<!-- Owl Carousel -->
<script src="<?php bloginfo('template_url'); ?>/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/slimmenu.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/bootstrap-datepicker.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/bootstrap-timepicker.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/nicescroll.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/dropit.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/ionrangeslider.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/icheck.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/fotorama.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/typeahead.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/card-payment.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/magnific.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/fitvids.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/countdown.js"></script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/gridrotator.js"></script>
<link href="<?php bloginfo('template_url'); ?>/hotel-details/styles.css" rel="stylesheet">


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
<!--hotel registration-->


<script type="text/javascript">
    $(function () {
        $('#btn_h_reg').click(function () {
            var name = $('#User_name').val();
            var address = $('#User_address').val();
            var email = $('#User_email').val();
            var city = $('#User_city').val();
            var zip = $('#User_zip').val();
            var contact = $('#User_Con_name').val();
            var phone = $('#User_phone').val();
            var password = $('#User_password').val();

//            var emailReg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;


            function validateEmail(email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test(email);
            }

            if (validateEmail(email) == false) {
                alert('Please Enter Valid Email');
                return false;
            }


            if (name == "" || address == "" || email == "" || city == "" || zip == "" || contact == "" || phone == "" || password == "") {
                alert("All Fields are required !!");
                return false;
            }


            var data = {
                'action': 'create_user',
                'name1': name,
                'address1': address,
                'email1': email,
                'city1': city,
                'zip1': zip,
                'contact1': contact,
                'phone1': phone,
                'password1': password
            };

            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: data,
                success: function (response) {
                    alert("Registration Successful");
                    $("#signup-form")[0].reset();
                    window.location.href = "<?php echo home_url(); ?>";
                },
                error: function (response) {
                    alert(response);
                    $("#signup-form")[0].reset();
                }
            });
        });
    });
</script>
<!--hotel registration end-->
<!--user registration-->
<script type="text/javascript">
    $(function () {
        $('#btn_u_reg').click(function () {
            var login_name = $('#login_User_name').val();
            var login_address = $('#login_User_address').val();
            var login_email = $('#login_User_email').val();
            var login_city = $('#login_User_city').val();
            var login_zip = $('#login_User_zip').val();
            var login_phone = $('#login_User_phone').val();
            var login_password = $('#login_User_password').val();

            function validateEmail(login_email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test(login_email);
            }

            if (validateEmail(login_email) == false) {
                alert('Please Enter Valid Email');
                return false;
            }


            if (login_name == "" || login_address == "" || login_email == "" || login_city == "" || login_zip == "" || login_phone == "" || login_password == "") {
                alert("All Fields are required !!");
                return false;
            }
            var data = {
                'action': 'create_customer',
                'login_name1': login_name,
                'login_address1': login_address,
                'login_email1': login_email,
                'login_city1': login_city,
                'login_zip1': login_zip,
                'login_phone1': login_phone,
                'login_password1': login_password
            };

            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: data,
                success: function (response) {
                    alert("Registration Successful");
                    $("#signup_form_user")[0].reset();
//                    $("#signup_form_user").hide();
                    window.location.href = "<?php echo home_url(); ?>";
                },
                error: function (response) {
                    alert(response);
                    $("#signup_form_user")[0].reset();
                }
            });
        });
    });
</script>
<!--user registration end-->

<!--Script for rating-->
<script type="text/javascript">
    function rate(value) {
        document.getElementById('rates').value = value;
        for (var i = value + 1; i <= 5; i++) {
            document.getElementById(i).style.color = '#f7f7ce';
        }
        for (var i = 1; i <= value; i++) {
            document.getElementById(i).style.color = '#ffc000';
        }
    }

    $(document).ready(function () {
        $("#singlebutton").click(function () {
            var uname = $("#uname").val();
            var uemail = $("#uemail").val();
            var review_title = $("#review_title").val();
            var review_description = $("#review_description").val();
            var rate = $("#rates").val();
            var id = $("#ids").val();
            var title = $("#title_post").val();

            // Returns successful data submission message when the entered information is stored in database.
            var dataString = 'uname=' + uname + '&uemail=' + uemail + '&review_title=' + review_title + '&review_description=' + review_description +
                '&rate=' + rate + '&id=' + id + '&title=' + title;
            if (uname == '' || uemail == '' || review_title == '' || review_description == '' || rate == '') {
                alert("Please Fill The All Required Field");
            }
            else {
                // AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>/process",
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        $('#msg').html(result);

                    }
                });
            }
            return false;
        });
    });
</script>
<!--Script for rating end-->


<link href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxdi7qWdq-SDq8mPDp9wzZk8rWEn-40i4&libraries=places"></script>
<script>
    var autocomplete = new google.maps.places.Autocomplete($("#map")[0], {});
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
//        console.log(place.address_components);
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
        document.getElementById('lat').value = latitude;
        document.getElementById('long').value = longitude;
//        console.log(latitude);
//        console.log(longitude);
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#checkinn").datepicker({
            dateFormat: "dd-mm-yy",
            numberOfMonths: 1,
            onClose: function (selectedDate) {
                var myDate = $(this).datepicker('getDate');
                myDate.setDate(myDate.getDate() + 1);
                $('#checkout').datepicker('setDate', myDate);
            }
        });
        $("#checkout").datepicker({
            dateFormat: "dd-mm-yy",
            numberOfMonths: 1
        });
        $("#checkinn").datepicker("setDate", "0");
        $("#checkout").datepicker("setDate", "1");
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#incheck").datepicker({
            dateFormat: "dd-mm-yy",
            numberOfMonths: 1,
            onClose: function (selectedDate) {
                var myDate = $(this).datepicker('getDate');
                myDate.setDate(myDate.getDate() + 1);
                $('#outchk').datepicker('setDate', myDate);
            }
        });
        $("#outchk").datepicker({
            dateFormat: "dd-mm-yy",
            numberOfMonths: 1
        });
        $("#incheck").datepicker("setDate", "0");
        $("#outchk").datepicker("setDate", "1");
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#OpenDialog").click(function () {
            $("#dialog").dialog({modal: true, height: 100, width: 100});
        });
    });
</script>

<?php
$post_price = $wpdb->get_results("SELECT meta_value FROM $wpdb->postmeta WHERE (meta_key = 'price')");
$result = array_column($post_price, 'meta_value');
$pmin = intval(min($result));
$pmax = intval(max($result));
?>
<script type="text/javascript">
    $("#price-slider").ionRangeSlider({
        type: "double",
        min: 0,
        max: 10000,
        from: 0,
        to: 10000
    });
    var i = 1;
    $('.irs').click(function () {
        i++;
        from = $('.irs-from').text();
        to = $('.irs-to').text();
        //console.log(from);
        if (i % 2 == 0) {
            console.log(to);
            console.log(from);
            document.getElementById('toooo').value = to;
            document.getElementById('frommm').value = from;
        }
    })
</script>
<script src="<?php bloginfo('template_url'); ?>/hotel-details/js/custom.js"></script>
<?php wp_footer(); ?>
</body>
</html>

