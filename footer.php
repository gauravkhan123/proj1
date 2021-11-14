<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nutricareplus
 */

?>
   <!-- footer -->
   <footer class="footer-light">
        <section class="section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                <?php if(have_rows('theme_options',75)):while(have_rows('theme_options',75)):the_row();
									 $footer_image = get_sub_field('footer_logo');
									 $footer_content = get_sub_field('footer_content');
								?>
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-title footer-mobile-title">
                            <h4>about</h4>
                        </div>
                        <div class="footer-contant">
                            <div class="footer-logo"><img src="<?php echo $footer_image['url'] ?>" alt="<?php echo $footer_image['alt'] ?>" width="100"></div>
                            <p><?php echo $footer_content; ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                 <?php endif; ?>
                    <div class="col offset-xl-1">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Main Menu</h4>
                            </div>
                            <div class="footer-contant">
							<?php
										wp_nav_menu(
											array(
												'theme_location' => 'menu-3',
											)
										);
									?>
                                <!--<ul>
                                    <li><a href="#">Contact us</a></li>
                                    <li><a href="#">Media Features</a></li>
                                    <li><a href="#">Store Address</a></li>
                                    <li><a href="#">Our Story</a></li>
                                    <li><a href="#">Our Eco-friendly Articles</a></li>
                                    <li><a href="#">Invest to us!</a></li>
                                    <li><a href="#">Track your order!</a></li>
                                </ul>-->
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>store information</h4>
                            </div>
                            <div class="footer-contant">
								<?php if(have_rows('theme_options',75)):while(have_rows('theme_options',75)):the_row();
									 $address = get_sub_field('address');
									 $phone = get_sub_field('phone_no');
									 $email = get_sub_field('email');
								?>
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i><?php echo $address ?>
                                    </li>
                                    <li><i class="fa fa-phone"></i><?php echo $phone ?></li>
                                    <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
								</ul>
									<?php endwhile; ?>
									<?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Follow us</h4>
                            </div>
                            <div class="footer-social">
							    <?php if(have_rows('social_links',75)):while(have_rows('social_links',75)):the_row();
									 $facebook = get_sub_field('facebook');
									 $gplus = get_sub_field('g_plus');
									 $twitter = get_sub_field('twitter');
									 $instagram = get_sub_field('instagram');
									 $rssfeed = get_sub_field('rss_feeds');
								?>
                                <ul>
                                    <li><a href="<?php echo $facebook ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $gplus ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $twitter ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $instagram ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $rssfeed ?>"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
								</ul>
								<?php endwhile; ?>
								<?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="footer-end">
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> Copyright © <a href="#">NutriCare plus</a> 2020. All Right Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="payment-card-bottom">
                            <ul>
                                <li>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/visa.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mastercard.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/paypal.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/american-express.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/discover.png" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <!--modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true" displayed="false">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <div class="offer-content">
                                        <h2>Free Holistic Catalog</h2>
                                        <p class="text-center">Sign up for our Newsletter and receive our 55 page 2021 NutriCare Plus Holistic Catalog</p>
                                        <form action="" class="auth-form needs-validation" method="post" name="">
                                            <div class="form-group mx-sm-3">
                                                <input type="email" class="form-control" name="email" placeholder="Enter your email" required="required">
                                                <button type="submit" class="btn btn-solid">subscribe</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--modal popup end-->
    <script>
        // $(window).on('load', function() {
        //     setTimeout(function() {
        //         $('#exampleModal').modal('show');
        //     }, 2500);
        // });
        $(window).scroll(function() {
            if ($(document).scrollTop() > 800 && $("#exampleModal").attr("displayed") === "false") {
                $('#exampleModal').modal('show');
                $("#exampleModal").attr("displayed", "true");
            }
        });

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
	<!-- tap to top end -->
<?php wp_footer(); ?>

</body>
</html>
