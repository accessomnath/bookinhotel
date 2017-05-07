<?php
/**
 * Created by PhpStorm.
 * User: Bicky
 * Date: 03-02-2017
 * Time: PM 04:49
 * Template Name: Our Mission
 */
get_header();
global $post;
$pid = $post->ID;
?>

<section id="our-mission">
    <div class="container">
        <div class="col-md-12">
            <div class="heading">
                <h2><?php echo get_field('heading10', $pid) ?></h2>
                <div class="head-underline"></div>
                <p><?php echo get_field('description', $pid) ?></p>

            </div>

        </div>


        <div class="details-section">
            <!--small cards-->
            <div class="row">
                <?php
                //custom post for slider section
                $args = array( 'post_type' => 'our_mission','order' =>'ASC', 'posts_per_page' => -1);
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                $img= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'sing-post-thumbnail');
                ?>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header-blue">
                                <h1 class="card-heading"><?php the_title(); ?></h1>
                            </div>
                            <div class="card-body">
                                <p class="card-p">
                                <?php the_content(); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endwhile;?>

            </div>
        </div>



    </div>
</section>

<?php get_footer(); ?>
