<?php
/**
 * Created by PhpStorm.
 * User: kumarvikram
 * Date: १२/०४/२०१७
 * Time: ०१:१२
 * Template Name: Home Page
 */
get_header();
global $post;
$page = $post->ID;
?>
<style>
    #banner-area{

    }
</style>
    <!--  Banner area starts  -->
    <section id="banner-area" style="background: url(<?php echo get_field('front_image', $page); ?>)">
        <div class="container">
            <div class="banner-area-inner">
                <div class="banner-area-inner-content">
                    <div class="banner-area-inner-content-details">
                        <h2><?php echo get_field('banner_heading', $page); ?></h2>
                        <p><?php echo get_field('description', $page); ?></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>000-000-000000</a></li>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>learn more</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  Banner area ends  -->

    <!--  video area starts  -->

    <section id="video-area">
        <div class="container">
            <div class="video-area-inner">
                <div class="video-area-inner-video">
                    <div class="col-md-4">
                        <div class="video-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/video.jpg" alt="">
                            <a class="demo" href="https://www.youtube.com/watch?v=mZb_gat5YCY"><i class="fa fa-play"
                                                                                                  aria-hidden="true"></i></a>
                        </div>
                        <div class="video-details text-center">
                            <h4>following video title</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="video-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/video.jpg" alt="">
                            <a class="demo" href="https://www.youtube.com/watch?v=mZb_gat5YCY"><i class="fa fa-play"
                                                                                                  aria-hidden="true"></i></a>
                        </div>
                        <div class="video-details text-center">
                            <h4>following video title</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="video-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/video.jpg" alt="">
                            <a class="demo" href="https://www.youtube.com/watch?v=mZb_gat5YCY"><i class="fa fa-play"
                                                                                                  aria-hidden="true"></i></a>
                        </div>
                        <div class="video-details text-center">
                            <h4>following video title</h4>
                        </div>
                    </div>
                </div>
                <div class="video-area-inner-video-content">
                    <div class="col-md-6">
                        <div class="video-content-details">
                            <h3>heading here</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet aspernatur atque
                                cupiditate deserunt dolore dolorem ducimus error explicabo, illo in inventore, molestias
                                nesciunt optio recusandae sint, totam ut voluptas.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab labore magni non qui quis quod
                                repellendus, tempore ullam vero. Blanditiis consequatur cumque dignissimos dolor dolore
                                eius, est fugiat illo impedit ipsam ipsum, iure nam nulla odit perferendis placeat
                                praesentium quam quis voluptate voluptates. Amet, cumque delectus dolorum error itaque iusto
                                minus odio perspiciatis quaerat repellendus. Animi ipsam ipsum maxime rem.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aspernatur aut culpa dolore
                                dolores error id impedit odio quisquam recusandae reiciendis sit, temporibus, voluptatibus!
                                A accusantium aliquam aliquid atque aut beatae consequuntur cum cumque dignissimos ea enim
                                eos esse ex explicabo illo, iusto laboriosam minima modi, optio possimus provident, quae
                                quam qui quis rerum ullam ut velit veniam voluptate voluptatibus! A ab aliquid beatae
                                consequuntur cumque debitis eligendi.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="video-content-details-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/video-details.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="video-products">
                    <div class="col-md-4">
                        <div class="video-products-details text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img-5.jpg" alt="">
                            <h4>title goes here</h4>
                            <a href="#">learn more</a>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="video-products-details text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img-6.jpg" alt="">
                            <h4>title goes here</h4>
                            <a href="#">learn more</a>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="video-products-details text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img-7.jpg" alt="">
                            <h4>title goes here</h4>
                            <a href="#">learn more</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <!--  video area ends  -->

    <!--  testimonials area starts  -->

    <section id="testimonial-area">
        <div class="container">
            <div class="col-md-5">
                <div class="testimonial-area-left">
                    <div id="testimonial-carousel">
                        <div class="item text-center">
                            <div class="item-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team.jpg" alt="">
                            </div>
                            <div class="item-content">
                                <h4>person name</h4>
                                <h5>person designation</h5>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="item-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team.jpg" alt="">
                            </div>
                            <div class="item-content">
                                <h4>person name</h4>
                                <h5>person designation</h5>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="item-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team.jpg" alt="">
                            </div>
                            <div class="item-content">
                                <h4>person name</h4>
                                <h5>person designation</h5>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="item-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team.jpg" alt="">
                            </div>
                            <div class="item-content">
                                <h4>person name</h4>
                                <h5>person designation</h5>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="item-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team.jpg" alt="">
                            </div>
                            <div class="item-content">
                                <h4>person name</h4>
                                <h5>person designation</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="testimonial-area-right">
                    <h3>the following section heading goes here</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi aperiam, dicta magni neque quas.
                        Amet aperiam at autem beatae cum dicta dignissimos, distinctio dolore esse eveniet excepturi fugit
                        in incidunt inventore ipsa iste labore minus molestias natus numquam obcaecati odio optio
                        perferendis quam quibusdam quis quisquam recusandae reiciendis saepe sequi sint soluta, tempore
                        ullam velit vitae voluptatibus voluptatum. Architecto consequuntur debitis ea, eos esse ex fugiat
                        libero nesciunt, non, perspiciatis quae quaerat quasi quod ratione saepe sint veritatis vitae.</p>
                    <a href="#">learn more</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-5">
                <div class="testimonial-area-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/glasses.jpg" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="testimonial-area-right">
                    <h3>following section heading goes here</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi cupiditate repellendus soluta. Amet
                        cum cupiditate debitis dolor ducimus eius, eligendi enim ex exercitationem expedita fuga hic illum
                        ipsa itaque libero mollitia nisi odio quam quasi quia quo quod, rerum saepe sit tempora, tempore
                        unde voluptatem.</p>
                    <a href="#">call us at 000-000-000000</a>
                </div>
            </div>
        </div>
    </section>

    <!--  testimonials area ends  -->

    <!--  safe area starts  -->

    <section id="safe-area">
        <div class="container">
            <div class="safe-area-inner">
                <h3>following section heading goes here</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dolore exercitationem modi nihil
                    rerum soluta. Amet beatae blanditiis dicta distinctio dolore ea earum fuga iste laborum maiores mollitia
                    numquam, odio omnis quaerat quas quidem rem repellendus reprehenderit, sed tenetur ullam vero,
                    voluptates? Ad consequuntur dicta eos et id, minus numquam perspiciatis qui sit voluptate! Accusamus
                    consequatur ea est id numquam!</p>
                <a href="#">learn more</a>
            </div>
        </div>
    </section>

    <!--  safe area ends  -->

    <!--  people area starts  -->

    <section id="people-area">
        <div class="container">
            <div class="page-header">
                <h3>the following title goes here</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-badge"><img src="<?php echo get_template_directory_uri(); ?>/images/place.jpg" alt=""></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">person name <span>ca</span></h4>
                        </div>
                        <div class="timeline-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consectetur consequatur
                                dignissimos dolor, error est, et eveniet exercitationem facere fugit impedit incidunt iure
                                nisi numquam pariatur perferendis quos ratione repellat rerum sint ullam veniam vero.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge warning"><img src="<?php echo get_template_directory_uri(); ?>/images/place.jpg" alt=""></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">person name <span>ca</span></h4>
                        </div>
                        <div class="timeline-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consectetur consequatur
                                dignissimos dolor, error est, et eveniet exercitationem facere fugit impedit incidunt iure
                                nisi numquam pariatur perferendis quos ratione repellat rerum sint ullam veniam vero.</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="timeline-badge info">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/place.jpg" alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">person name <span>ca</span></h4>
                        </div>
                        <div class="timeline-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consectetur consequatur
                                dignissimos dolor, error est, et eveniet exercitationem facere fugit impedit incidunt iure
                                nisi numquam pariatur perferendis quos ratione repellat rerum sint ullam veniam vero.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge success">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/place.jpg" alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">person name <span>ca</span></h4>
                        </div>
                        <div class="timeline-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consectetur consequatur
                                dignissimos dolor, error est, et eveniet exercitationem facere fugit impedit incidunt iure
                                nisi numquam pariatur perferendis quos ratione repellat rerum sint ullam veniam vero.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!--  people area ends  -->

    <!--  blog area starts  -->

    <section id="blog-area">
        <div class="container">
            <div class="col-md-5">
                <div class="blog-area-left">
                    <h3>hari care blog</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis facilis officiis ratione sequi
                        sunt. Accusantium asperiores aut autem commodi doloremque eaque, eius ex exercitationem expedita in
                        inventore ipsum magnam minus modi numquam odio optio, provident quae qui quibusdam repellendus sint
                        unde voluptatibus. Atque, pariatur tenetur.</p>
                    <a href="#">more articles</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="blog-area-right">
                    <div class="col-md-6">
                        <div class="blog-details">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog-photo.jpg" alt="">
                            <h4>following section heading goes here</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolor itaque labore odit
                                possimus ratione repellendus ullam voluptatum.</p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-details">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog-photo.jpg" alt="">
                            <h4>following section heading goes here</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolor itaque labore odit
                                possimus ratione repellendus ullam voluptatum.</p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  blog area ends  -->

    <!--  schedule area starts  -->

    <section id="schedule">
        <div class="container">
            <div class="col-md-5">
                <div class="schedule-left">
                    <h3>following section heading goes here</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, at beatae consequuntur dolorem
                        doloribus ex impedit in iste molestias mollitia nesciunt nobis numquam pariatur quo repellendus
                        similique sunt temporibus vitae!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur corporis enim in itaque laborum
                        Call us
                        <a href="#">000-000-000000</a></p>
                </div>
            </div>
            <div class="col-md-7">
                <div class="schedule-right">
                    <form action="">
                        <div class="form-group">
                            <select>
                                <option value="">I Need Care For....</option>
                                <option value="">I Need Care For....</option>
                                <option value="">I Need Care For....</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email Address">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="submit-btn">contact me</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--  schedule area ends  -->
<?php get_footer(); ?>