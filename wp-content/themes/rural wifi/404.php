<?php 
/**
 * The template for displaying 404 pages (Not Found)
 * @package WordPress
 * @subpackage Twenty_Thirteen
 */
get_header('inner'); ?>
<style>
.not-found {
    text-align: center;
    padding: 50px 0;
}

.not-found .error{
    font-size: 150px;
    line-height: 1.6;
    font-weight: bold;
    text-decoration: none;
    display: block;
}
</style>
<body>
<section>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="not-found"> <a class="error" href="<?php echo WP_HOME; ?>">404</a>
          <h3 style="font-size:25px;margin-top: 20px;margin-bottom: 10px;color:#ff0000">Page Not Found</h3>
          <p>We are sorry but the page you were looking for could not be found.</p>
            <p>Please Click Here <a href="<?php echo home_url(''); ?>">Home</a></p>
        </div>
        <!-- end .not-found --> 
        
      </div>
      <!-- end .col-md-12 --> 
    </div>
    <!-- end .row --> 
  </div>
</section>
<?php get_footer(); ?>