<?php
//Template Name: Home Page Template
get_header();
global $post;
$pid = $post->ID;
?>
<section id="thepowernetgroup-middle">
	<div class="container">
    	<div class="col-md-9">
        	<div class="slider-area-full">
    <!-- Indicators -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

           <?php
        //custom post for slider section
            $args = array( 'post_type' => 'slider','order' =>'ASC', 'posts_per_page' => -1);
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
            $img= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'sing-post-thumbnail');
            ?>
            <div class="item">
                <img src="<?php echo $img[0];?>"  alt="Chania">
                <div class="carousel-caption">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
            </div>

        <?php endwhile;?>
        </div>
        <!-- Left and right controls -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
    </div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="area-content1">
            	<h2><?php echo get_field('heading', $pid); ?></h2>
               <div class="head-underline"></div>

             <?php echo get_field('front_page_content', $pid); ?>
            </div>
            

        </div>
        
        <div class="col-md-3">
        	<div class="form-area-full">
            	<div class="information-area">
          <?php echo get_field('contact_details', $pid); ?>

                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/images/shadow.png" class="img-responsive"/>





  <div class="login-box">
      <?php if (is_user_logged_in()) { ?>
          <a class="login_button" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
      <?php } else { ?>


    <form id="login" action="login" method="post">
		<div class="panel panel-default">
			<div class="panel-heading"><b>Sign in</b> <span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"></span></div>
			<div class="panel-body">
				<div class="form-group has-primary has-feedback">
					<label class="control-label" for="login">Login <span class="regForm text-danger">*</span></label>
					<input type="text" class="form-control" name="username" id="username" aria-describedby="login" required>
					<span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
				</div>
				<div class="form-group has-primary has-feedback">
					<label class="control-label" for="password">Password <span class="regForm text-danger">*</span></label>
					<input type="password" class="form-control" name="password" id="password" aria-describedby="password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback" aria-hidden="true"></span>
				</div>
			</div>

			<div class="panel-footer">
				<input type="submit" class="btn btn-success" id="goToChat" name="submit" id="submit" value="Sign in" />
                <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
			</div>

		</div>
	</form>
      <?php } ?>

</div>
                
                
            </div>
        </div>

        
        
    </div>
</section>

<div class="clearfix"></div>


<section id="section-tab">
  <div class="container">
    <div class="row">
      <h2>Headline</h2>
      <div class="head-underline"></div>
      <div class="col-sm-3">
        <div class="card-process">
          <header class="first"><span class="pe-7s-helm"></span></header>
          <div class="card-block">
            <h5><?php echo get_field('headline1', $pid); ?></h5>
            <?php echo get_field('content1', $pid); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card-process">
          <header><span class="pe-7s-display2"></span></header>
          <div class="card-block">
            <h5><?php echo get_field('headline2', $pid); ?></h5>
              <?php echo get_field('content2', $pid); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card-process">
          <header><span class="pe-7s-display2"></span></header>
          <div class="card-block">
            <h5><?php echo get_field('headline3', $pid); ?></h5>
              <?php echo get_field('content3', $pid); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card-process">
          <header class="last"><span class="pe-7s-helm"></span></header>
          <div class="card-block">
            <h5><?php echo get_field('headline4', $pid); ?></h5>
              <?php echo get_field('content4', $pid); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>