<?php
/**
 * Created by PhpStorm.
 * User: SOMNATH
 * Date: 20-03-2017
 * Time: PM 12:46
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>:- Hotel Search Directory -:</title>
    <!--Required styles-->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/bootsnav.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/reset.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/animate.css" rel="stylesheet">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/owl-carousel/owl.theme.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/font-awesome/css/font-awesome.min.css">
    <link href="<?php bloginfo('template_url'); ?>/line-icons/css/helper.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/line-icons/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,700italic|Roboto+Mono:400,500,700|Material+Icons'
          rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
    <![endif]-->
    <style>/* Absolute Center Spinner */
        .loader,
        .loader:after {
            border-radius: 50%;
            width: 10em;
            height: 10em;
        }

        .loader {
            margin: 60px auto;
            font-size: 10px;
            position: relative;
            text-indent: -9999em;
            border-top: 1.1em solid rgba(255, 255, 255, 0.2);
            border-right: 1.1em solid rgba(255, 255, 255, 0.2);
            border-bottom: 1.1em solid rgba(255, 255, 255, 0.2);
            border-left: 1.1em solid #ffffff;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation: load8 1.1s infinite linear;
            animation: load8 1.1s infinite linear;
        }

        @-webkit-keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
    <?php wp_head(); ?>
</head>
<body>


<!--<!-- Top bar area 1 Starts -->
<!--<section id="top-bar-area-1">-->
<!--    <div class="container-fluid">-->
<!--        <div class="top-bar-area-1-right">-->
<!--            <ul>-->
<!--                --><?php //if (is_user_logged_in()) {
//                    global $current_user;
//                    $current_user->user_login;
//                    echo '<li class="sign-registration-form-btn"><a href="#">Hi !&nbsp;' . $current_user->user_login . '</a></li>';
//                } else { ?>
<!--                    <li>-->
<!---->
<!--                        <a href="#" data-toggle="modal" data-target="#registration_user">User Registration</i></a>-->
<!---->
<!--                    </li>-->
<!--                --><?php //} ?>
<!---->
<!--                --><?php //if (is_user_logged_in()) { ?>
<!--                    <li class="sign-registration-form-btn"><a-->
<!--                                href="--><?php //echo wp_logout_url(home_url()) ?><!--">logout</i></a></li>-->
<!--                --><?php //} else { ?>
<!--                    <li>-->
<!--                        <a href="#" data-toggle="modal" data-target="#login_user">Login</i></a>-->
<!--                    </li>-->
<!--                --><?php //} ?>
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Top bar area 1 ends -->

<!--Top Bar Start-->
<section id="top-bar-area">
    <div class="container-fluid">
        <!--Navbar Menu Right Start-->
        <nav class="navbar navbar-default bootsnav">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i
                            class="fa fa-bars"></i></button>
                <a class="navbar-brand" href="<?php echo home_url(); ?>"><img
                            src="<?php bloginfo('template_url'); ?>/images/logo.png"
                            class="logo" alt=""></a></div>
            <!-- End Header Navigation -->

            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    $my_menu = array(
                        'menu' => 'primary',
                        'container' => '',
                        'items_wrap' => '%3$s'
                    );

                    wp_nav_menu($my_menu);
                    ?>
                    <?php if (is_user_logged_in()) {
                        global $current_user;
                        $current_user->user_login;
                        echo '<li class="sign-registration-form-btn"><a href="#">Hi !&nbsp;' . $current_user->user_login . '</a></li>';
                    } else { ?>
                        <li class="sign-registration-form-btn dropdown">
                            <a class="sign-registration-form-btn dropdown-toggle" data-toggle="dropdown" href="#">Registration
                            </a>
                            <ul class="dropdown-menu mobxx" style="width: 100px;">
                                <li class="sign-registration-form-btn mobxx"><a href="#" data-toggle="modal"
                                                                                data-target="#registration">Hotel
                                        Registration</a></li>
                                <li class="sign-registration-form-btn mobxx"><a href="#" data-toggle="modal"
                                                                                data-target="#registration_user">User
                                        Registration</i></a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (is_user_logged_in()) { ?>
                        <li class="sign-registration-form-btn"><a
                                    href="<?php echo wp_logout_url(home_url()) ?>">logout</i></a></li>
                    <?php } else { ?>
                        <li class="sign-registration-form-btn"><a href="#" data-toggle="modal"
                                                                  data-target="#login">Login</a></li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
        <!--Navbar Menu Right End-->

    </div>
</section>

