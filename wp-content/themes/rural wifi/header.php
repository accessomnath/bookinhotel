<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>:- RURAL WIFI -:</title>
<!--Required styles-->
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/bootsnav.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/reset.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel="stylesheet">

<link href="<?php echo get_template_directory_uri(); ?>/contact-form/src/foxholder-styles.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/contact-form/static/css/prism.css" />
<!-- Custom Fonts -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/font-awesome/css/font-awesome.min.css">
<link href="<?php echo get_template_directory_uri(); ?>/line-icons/css/helper.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/line-icons/css/pe-icon-7-stroke.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
<style>
ul#demo-1{float: right !important;}
</style>
  <?php wp_head(); ?>
</head>

<body>
<!-- Header Start-->

<section id="thepowernetgroup-01-second">
<div class="header-01">
  <div class="container">
  
  
  <div class="row">
  
  <div class="col-md-8">


          <?php if (get_theme_mod('themeslug_logo')) : ?>
            <div class="logo-area">
              <a href='<?php echo esc_url(home_url('/')); ?>'
                 title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'><img
                    src='<?php echo esc_url(get_theme_mod('themeslug_logo')); ?>' class="img-responsive"
                    alt='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'></a>
            </div>
          <?php else : ?>
         <div class="logo-area">
              <h3 class='site-title'>
                <a href='<?php echo esc_url(home_url('/')); ?>'
                                        title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'
                                        rel='home'><?php bloginfo('name'); ?></a></h3>
<!--              <h4 class='site-description'>--><?php //bloginfo('description'); ?><!--</h4>-->
         </div>
          <?php endif; ?>

  </div>

<!--          <a href="--><?php //echo home_url(); ?><!--"><img src="--><?php //echo get_template_directory_uri(); ?><!--/images/logo-white.png" alt="img" class="img-responsive"></div>-->
<!--    </a>-->

  <div class="col-md-4">
  	<div class="search-area-right">
    	 <div class="search">
<input type="text" class="form-control input-sm" maxlength="64" placeholder="Search" />
 <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button>
</div>
    </div>
  </div>
  
  
  
  
</div>
    </div>
  </div>
</div>
</section>

<div class="clearfix"></div>


<section id="thepowernetgroup-01-first">
  <div class="custom-main-menu-section">
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-center">
        <div class="navbar-collapse collapse">
            <?php

            global $wpdb;
            wp_nav_menu(array(
                    'menu' => 'primary',
                    'theme_location' => 'primary',
                    'depth' => 10,
                    'container' => '',
                    'menu_class' => 'nav navbar-nav ',
                    'menu_id' => 'demo-1',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
            );
            ?>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>