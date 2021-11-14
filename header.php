<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nutricareplus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
 <!-- header start -->
 <header>
        <div class="mobile-fix-option"></div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                        <?php if(have_rows('theme_options',75)):while(have_rows('theme_options',75)):the_row();
                                     $phone = get_sub_field('phone_link');
                                     $email = get_sub_field('email');
								?>
                            <ul>
                                <li>Welcome to NutriCare Plus</li>
                                <li><a href="tel:<?php echo $phone ?>"><i class="fa fa-phone" aria-hidden="true"></i>Call Us </a></li>
                                <li><a href="mailto:<?php echo $email ?>"><i class="fa fa-envelope" aria-hidden="true"></i> Email the Founder</a></li>
                            </ul>
                        <?php endwhile; ?> 
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
					<?php
										wp_nav_menu(
											array(
												'theme_location' => 'menu-2',
												'menu_id'        => 'top-menu',
                                                'menu_class'     => 'header-dropdown',
                                                'walker'  => new Child_Wrap()
											)
										);
									?>
                        <!--<ul class="header-dropdown">
                              <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Email the Founder</a></li>
                              <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i> My Account
                                <ul class="onhover-show-div">
                                    <li><a href="#" data-lng="en">Login</a></li>
                                    <li><a href="#" data-lng="es">Register</a></li>
                                </ul>
                              </li>
                            <li><a href="tel:+1-850-733-8907" class="btn btn-solid free-holistic-btn">Free Holistic Catalog</a></li>
                        </ul>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                            <!--<?php //the_custom_logo('custom-logo',array('class' =>'img-fluid blur-up lazyload','width'=>110 )); ?>-->
                                <a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nutricare-logo.jpg" width="110" class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav id="main-nav">
									<div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
									<?php
										wp_nav_menu(
											array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'main-menu',
												'menu_class'     => 'sm pixelstrap sm-horizontal'
											)
										);
									?>
                                    <!--<ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                        </li>
                                        <li class="active"><a href="#">Home</a></li>
                                        <li><a href="#">Our Story</a></li>
                                        <li>
                                            <a href="#">Products</a>
                                            <ul>
                                                <li><a href="#">Toiletry Buddies</a></li>
                                                <li><a href="#">Food trip buddies</a></li>
                                                <li><a href="#">Lifestyle Buddies</a></li>
                                                <li><a href="#">Eco-friendly Bundled Set</a></li>
                                                <li><a href="#">Balay Qubo Partner Products</a></li>
                                                <li><a href="#">Best Sellers</a></li>
                                                <li><a href="#">Not so perfect Bargain Sale</a></li>
                                                <li><a href="#">Business Solutions</a></li>
                                                <li><a href="#">RealFriends</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Wholesale Orders</a></li>
                                        <li><a href="#">Contact us</a></li>
                                        <li><a href="#">Track your order!</a></li>
                                        <li><a href="#">FAQ</a></li>
                                    </ul>-->
                                </nav>
                            </div>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                            <div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" onclick="openSearch()" class="img-fluid blur-up lazyload" alt=""> <i class="ti-search" onclick="openSearch()"></i></div>
                                            <div id="search-overlay" class="search-overlay">
                                                <div> <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                                                    <div class="overlay-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <form role="search" method="get" class="woocommerce-product-search inline-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                                                                        <div class="form-group">
                                                                        <input type="search" id="exampleInputPassword1" class="form-control" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
                                                                        <!--<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Search a Product">-->
                                                                        </div>
                                                                        <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"  class="btn btn-primary"><i class="fa fa-search"></i></button>
	                                                                    <input type="hidden" name="post_type" value="product" />
                                                                        <!--<button type="submit" class="btn btn-primary"><i
                                                                         class="fa fa-search"></i></button>-->
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div><img src="assets/images/cart.png" class="img-fluid blur-up lazyloaded" alt="">
                                             <i class="ti-shopping-cart"></i></div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cart.png" class="img-fluid blur-up lazyload" alt="">
                                           <i class="fa fa-shopping-cart" aria-hidden="true"></i>   
                                            <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                                            <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
                                            <?php //echo WC()->cart->get_cart_total(); ?>
                                            
</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    <div class="top-brand-logo">
        <ul>
            <li>
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nutricare-logo.jpg" alt="">
                    <span>Nutricare Plus</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-tree-circle.png" alt="">
                    <span>No Tree Was Harmed</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/burnicare-organics-logo.png" alt="">
                    <span>Burnicare Organics</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/balance-of-nature.png" alt="">
                    <span>Balance of Nature</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tattoo-you-organics-logo.png" alt="">
                    <span>Tattoo You Organics</span>
                </a>
            </li>
            <li>
                <a href="http://besttolive.org/index.html" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/best-to-live-logo.png" alt="">
                    <span>The Green Postal Store</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <img src="assets/images/non-profit-my-profile.jpg" alt="">
                    <span>Non Profit My Profile</span>
                </a>
            </li> -->
        </ul>
    </div>
    <!-- Top Brand-->