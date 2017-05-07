<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>:: HAKI CARE ::</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel="stylesheet">
    <!-- Bootsnav -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootsnav.css" rel="stylesheet">
    <!-- Color -->
    <link href="<?php echo get_template_directory_uri(); ?>/skins/color.css" rel="stylesheet">
    <!-- Reset style -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/reset.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/YouTubePopUp.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.css" rel="stylesheet">
    <!-- Font Style -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400" rel="stylesheet">
    <!-- Custom style -->
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
</head>

<body>

<!--  Top bar area Starts  -->

<section id="top-bar-area">
    <div class="container">
        <div class="top-bar-area-left">
            <ul>
                <li>
                    <a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span>000-000-0000</span></a>
                </li>
            </ul>
        </div>
        <div class="top-bar-area-right">
            <ul>
                <li>
                    <a href="#">signin</a>
                </li>
                <li>
                    <a href="<?php echo site_url(); ?>/staff-registration">get started now</a>
                </li>
            </ul>
        </div>
    </div>

</section>

<!--  Top bar area ends  -->

<!--  Menu area Starts  -->

<section id="menu-area">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-sticky bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <?php
                global $wpdb;
                wp_nav_menu(array(
                        'menu' => 'primary',
                        'theme_location' => 'primary',
                        'depth' => 10,
                        'container' => '',
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'menu_id' => 'demo-1',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                );

                ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- End Navigation -->


</section>

<!--  Menu area ends  -->