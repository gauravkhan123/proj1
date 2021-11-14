<?php
/**
 * Template Name: FrontPage
 */

get_header();
?>
 <!-- Home slider -->
 <section class="p-0">
        <div class="slide-1 home-slider">
                <?php 
                    $query = new WP_Query( array(
                    'post_type'     =>  'slider',
                    'posts_per_page'=>  -1,
                    'order'      =>   'ASC'
                    ));
                ?>
                <?php 
                    if( have_posts( )) : 
                    while ($query->have_posts()) : $query->the_post(); 
                    $image = wp_get_attachment_url( get_post_thumbnail_id() );
                    $id = get_the_ID();
                ?>
            <div>
                <div class="home  text-center">
                    <?php the_post_thumbnail('slider-image', array('class' => 'bg-img blur-up lazyload'));?>
                    <!--<img src="<?php //echo get_template_directory_uri()?>/assets/images/banner01.jpg" alt="" class="bg-img blur-up lazyload">-->
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="slider-contain">
                                    <div>
                                        <!-- <h4>welcome to Nutricare</h4> -->
                                        <!-- <h2>Nutricare Plus Organic Rosehip Oil</h2> -->
                                        <h2><?php the_title();?></h2>
                                        <p><?php  the_content();?></p>
                                        <a href="#" class="btn btn-solid"><?php echo get_field('button_text'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    endwhile;
                    wp_reset_query( );
                    endif;
            ?>
        </div>
    </section>
    <!-- Home slider end -->


    <!-- collection banner -->
    <div class="top-cate">
        <div class="left-cate">
            <div class="top-cate-content">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/top-cate-banner01.jpg" class="img-fluid blur-up lazyload" alt="">
                    <p>Personalize on demand</p>
                </a>
            </div>
        </div>
        <div class="mid-cate">
            <div class="top-cate-content mid-bnr-1">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/top-cate-banner02.jpg" class="img-fluid blur-up lazyload" alt="">
                    <p>Purchase with a social impact</p>
                </a>
            </div>
            <div class="top-cate-content mid-bnr-2">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/top-cate-banner03.jpg" class="img-fluid blur-up lazyload" alt="">
                    <p>Corporate gifts with a cause</p>
                </a>
            </div>
        </div>
        <div class="right-cate">
            <div class="top-cate-content">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/top-cate-banner04.jpg" class="img-fluid blur-up lazyload" alt="">
                    <p>Product with a purpose</p>
                </a>
            </div>
        </div>
    </div>
    <!-- collection banner end -->


    <!-- Paragraph-->
    <div class="title1 section-t-space">
        <!-- <h4>special offer</h4> -->
        <h2 class="title-inner1">Trending products</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="product-para">
                    <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Paragraph end -->


    <!-- Product slider -->
    <section class="section-b-space p-t-0 ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!--<div class="product-4 product-m no-arrow">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="lable-block">
                                    <span class="lable3">new</span>
                                    <span class="lable4">on sale</span>
                                </div>
                                <div class="front">
                                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/product-img01.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="back">
                                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/product-img01-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <a href="#" class="btn btn-solid">
                                        <i class="ti-shopping-cart"></i> View options
                                    </a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="#">
                                    <h6>Lakbawayan Eating Adventure Set [Tumbler + Lunchbox + Cutlery Set]</h6>
                                </a>
                                <h4>From <strong>Rs 3,054.68 INR</strong></h4>
                                <div class="discount-price">
                                    <span class="main-price">Rs 3,716.37 INR</span>
                                    <strong class="sale-percent">-17.8%</strong>
                                </div>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="lable-block">
                                    <span class="lable4">on sale</span>
                                </div>
                                <div class="front">
                                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/product-img02.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="back">
                                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/product-img02-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <a href="#" class="btn btn-solid">
                                        <i class="ti-shopping-cart"></i> View options
                                    </a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="#">
                                    <h6>Lakbawayan Tumbler 2.0 (532mL) [Water Bottle / Thermos ]</h6>
                                </a>
                                <h4>From <strong>Rs 2,124.59 INR</strong></h4>
                                <div class="discount-price">
                                    <span class="main-price">Rs 2,257.46 INR</span>
                                    <strong class="sale-percent">-5.9%</strong>
                                </div>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="lable-block">
                                    <span class="lable3">new</span>
                                    <span class="lable4">on sale</span>
                                </div>
                                <div class="front">
                                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/product-img03.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <a href="#" class="btn btn-solid">
                                        <i class="ti-shopping-cart"></i> View options
                                    </a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="#">
                                    <h6>Eco-friendly Snacking Buddy Set</h6>
                                </a>
                                <h4>From <strong>Rs 2,124.59 INR</strong></h4>
                                <div class="discount-price">
                                    <span class="main-price">Rs 2,521.87 INR</span>
                                    <strong class="sale-percent">-15.8%</strong>
                                </div>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/product-img04.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <a href="#" class="btn btn-solid">
                                        <i class="ti-shopping-cart"></i> View options
                                    </a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="#">
                                    <h6>Breakfast Buddy Set [Mug + Coffee Tumbler]</h6>
                                </a>
                                <h4>From <strong>Rs 2,257.46 INR</strong></h4>
                                <div class="discount-price">
                                    <span class="main-price">Rs 2,721.18 INR</span>
                                    <strong class="sale-percent">-17%</strong>
                                </div>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="lable-block">
                                    <span class="lable4">on sale</span>
                                </div>
                                <div class="front">
                                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/product-img05.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="back">
                                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/product-img05-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <a href="#" class="btn btn-solid">
                                        <i class="ti-shopping-cart"></i> View options
                                    </a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="#">
                                    <h6>Lakbawayan™ Bambootensils [Cutlery Set]</h6>
                                </a>
                                <h4>From <strong>Rs 663.02 INR</strong></h4>
                            </div>
                        </div>
                    </div>-->
                    <?php echo do_shortcode('[products_slider]');?>
                    <div class="view-more-row">
                        <a href="#" class="btn btn-solid">View more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product slider end -->


    <!-- Parallax banner -->
    <section class="p-0">
        <div class="full-banner parallax text-center p-left parallax-bg custom_bg">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/4-Mailer.jpg" alt="" class="bg-img blur-up lazyload">
            <!-- <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="banner-contain">
                            <h2>2020</h2>
                            <h3>special offer</h3>
                            <h4>Lorem ipsum dolor sit amet</h4>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Parallax banner end -->

    <!-- blog section -->
    <section class="blog p-t-0 ratio2_3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title1 section-t-space">
                        <h4>Feedbacks</h4>
                        <h2 class="title-inner1">Our eco-friendly buddies!</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="slide-3">
                    <?php 
                    $query  = new WP_Query( array(
                    'post_type'     =>  'testimonial',
                    'posts_per_page'=>  -1,
                    'order'      =>   'ASC'
                    ));
                    //echo "<pre>";
                    //print_r($query);
                    //echo "</pre>";
                ?>
                <?php 
                    if( have_posts( )) : 
                    while ($query->have_posts()) : $query->the_post(); 
                    $image = wp_get_attachment_url( get_post_thumbnail_id() );
                    $id = get_the_ID();
                 ?>
                        <div class="col-md-12">
                            <div class="customer-feedback-col">
                                <div class="customer-img">
                                    <?php echo the_post_thumbnail();?>
                                </div>
                                <div class="blog-details">
                                    <h4><?php echo the_date(); ?></h4>
                                    <p>
                                        <?php echo the_excerpt();?>
                                    </p>
                                    <br>
                                    <h6><?php echo get_field('designation');?></h6>
                                    <a href="<?php echo the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_query( );
                    endif;
                ?>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- blog section end -->
    <!-- instagram section -->
    <section class="instagram ratio_square">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-0">
                    <h2 class="title-borderless"># instagram</h2>
                    <div class="slide-7 no-arrow slick-instagram">
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img01.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img02.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img03.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img04.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img05.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img06.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img07.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img08.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img09.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img10.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img11.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="instagram-box"> <img src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img12.jpg" class="bg-img" alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- instagram section end -->

    <!--  logo section -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slide-6 no-arrow">
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand-logo01.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand-logo02.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand-logo03.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand-logo04.png" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand-logo05.jpg" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand-logo06.jpg" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <div class="logo-block">
                                <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand-logo07.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  logo section end-->
    <?php
//get_sidebar();
get_footer();