<?php get_header(); ?>
<section id="our-mission">
    <div class="container">
        <div class="col-md-12">
            <div class="heading">
                <h2><?php the_title(); ?></h2>
                <div class="head-underline"></div>
            </div>
        </div>
        <div class="details-section">
            <div class="row">

                <div class="col-md-12">
                    <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post();
                            the_content();
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?PHP get_footer(); ?>