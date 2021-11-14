<?php
/**
 * Template Name: Contact
 */

get_header();
?>
<!-- breadcrumb start -->
<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2><?php the_title();?></h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
						<?php get_breadcrumb(); ?>
						</ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
 <!--section start-->
 <section class="contact-page section-b-space">
        <div class="container">
            <div class="row section-b-space">
            <?php if(have_rows('theme_options',75)):while(have_rows('theme_options',75)):the_row();
									 $address = get_sub_field('address');
									 $phone = get_sub_field('phone_no');
                                     $email = get_sub_field('email');
                                     $gmaps = get_sub_field('gmaps');
								?>
                <div class="col-lg-7 map">
                    <iframe src="<?php echo $gmaps; ?>" allowfullscreen></iframe>
                </div>
                <div class="col-lg-5">
                    <div class="contact-right">
                    
                        <ul>
                            <li>
                                <div class="contact-icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <h6>Contact Us</h6>
                                </div>
                                <div class="media-body">
                                    <p><?php echo $phone ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h6>Address</h6>
                                </div>
                                <div class="media-body">
                                    <p><?php echo $address ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-envelope-o"></i>
                                    <h6>Email</h6>
                                </div>
                                <div class="media-body">
                                    <p><?php echo $email ?> </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php endwhile;?>
                    <?php endif;?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form">
                        <?php echo do_shortcode( '[contact-form-7 id="77" title="Contact form 1"]')?>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
<?php
//get_sidebar();
get_footer();