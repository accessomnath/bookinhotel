<?php
/**
 * Created by PhpStorm.
 * User: Bicky
 * Date: 02-02-2017
 * Time: PM 05:00
 * Template Name: Contact Us
 */
get_header();
global $post;
$pid = $post->ID;
?>

<section id="contact-us">
    <div class="container">
        <div class="contact-full">
            <div class="row">


                <div class="col-md-6">
                    <div class="con-form">
                        <h1>Contact Us</h1>
                        <div class="form-container-2 form-container" id="example-2">

                            <?php echo do_shortcode('[contact-form-7 id="34" title="Contact form 1"]'); ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="image-area2">
                        <img src="<?php echo get_field('contact_image', $pid) ?>" class="img-responsive">
                    </div>
                </div>

            </div>


            <div class="ROW">
                <div class="map-area">
                    <?php echo get_field('map', $pid) ?>
                </div>
            </div>



        </div>
    </div>
</section>

<div class="clearfix"></div>

<?php get_footer(); ?>
