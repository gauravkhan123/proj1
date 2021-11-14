<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );?>
 <!-- breadcrumb start -->
 <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
            <div class="col-sm-6">
                    <div class="page-title">
                        <h2><?php wp_title(); ?></h2>
                    </div>
                </div>
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
          </div>
        </div>
</div>
    <!-- breadcrumb end -->
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', false ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                <div class="col-sm-3 collection-filter">
                <div class="collection-filter-block">
<?php 
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );
?>
</div>
    </div>
<div class="collection-content col">
<div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if(have_rows('product_overview',75)):while(have_rows('product_overview',75)):the_row();
                                    $p_image= get_sub_field('image');
                                    $p_title= get_sub_field('title');
                                    $p_content= get_sub_field('content');
                                    ?>
                                <div class="top-banner-wrapper">
                                        <a href="#"><img src="<?php echo $p_image['url']; ?>" class="img-fluid blur-up lazyloaded" alt=""></a>
                                        <div class="top-banner-content small-section">
                                            <h4><?php echo $p_title; ?></h4>
                                            <p><?php echo $p_content; ?></p>
                                            
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
<?php endif; ?>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                        <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>
<?php 
/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
    do_action( 'woocommerce_after_shop_loop' );
?>
</div>
</div>
</div>
</section>
 <!-- section start -->
 <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back">
                                <span class="filter-back"><i class="fa fa-angle-left"  aria-hidden="true"></i> back</span>
                            </div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">Category</h3>
                                <ul>
                                    <li><a href="#">Face</a></li>
                                    <li><a href="#">Body</a></li>
                                    <li><a href="#">Hair</a></li>
                                    <li><a href="#">Nails</a></li>
                                    <li><a href="#">Mens SkinCare</a></li>
                                    <li><a href="#">Spa</a></li>
                                    <li><a href="#">Pure Emu Oil</a></li>
                                    <li><a href="#">Aftercare</a></li>
                                </ul>
                            </div>
                            <!-- price filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">Price</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="wrapper mt-3">
                                        <div class="range-slider">
                                            <img src="assets/images/price-img.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- silde-bar colleps block end here -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/cate-banner.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                        <div class="top-banner-content small-section">
                                            <h4>The standard Lorem Ipsum</h4>
                                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                                                it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>Showing Products 1-24 of 10 Result</h5>
                                                        </div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-page-per-view">
                                                            <select>
                                                                <option value="High to low">24 Products Par Page
                                                                </option>
                                                                <option value="Low to High">50 Products Par Page
                                                                </option>
                                                                <option value="Low to High">100 Products Par Page
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <select>
                                                                <option value="High to low">Sorting items</option>
                                                                <option value="Low to High">50 Products</option>
                                                                <option value="Low to High">100 Products</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable3">new</span>
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 3,054.68 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 3,716.37 INR</span>
                                                                <strong class="sale-percent">-17.8%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img02.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img02-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 2,124.59 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 2,257.46 INR</span>
                                                                <strong class="sale-percent">-5.9%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable3">new</span>
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img03.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 2,124.59 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 2,521.87 INR</span>
                                                                <strong class="sale-percent">-15.8%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img05.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img05-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 663.02 INR</strong></h4>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable3">new</span>
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 3,054.68 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 3,716.37 INR</span>
                                                                <strong class="sale-percent">-17.8%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable3">new</span>
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 3,054.68 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 3,716.37 INR</span>
                                                                <strong class="sale-percent">-17.8%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img02.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img02-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 2,124.59 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 2,257.46 INR</span>
                                                                <strong class="sale-percent">-5.9%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable3">new</span>
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img03.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 2,124.59 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 2,521.87 INR</span>
                                                                <strong class="sale-percent">-15.8%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img05.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img05-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 663.02 INR</strong></h4>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable3">new</span>
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 3,054.68 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 3,716.37 INR</span>
                                                                <strong class="sale-percent">-17.8%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable3">new</span>
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 3,054.68 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 3,716.37 INR</span>
                                                                <strong class="sale-percent">-17.8%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img02.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img02-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 2,124.59 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 2,257.46 INR</span>
                                                                <strong class="sale-percent">-5.9%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable3">new</span>
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img03.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 2,124.59 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 2,521.87 INR</span>
                                                                <strong class="sale-percent">-15.8%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img05.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img05-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 663.02 INR</strong></h4>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="lable-block">
                                                                <span class="lable3">new</span>
                                                                <span class="lable4">on sale</span>
                                                            </div>
                                                            <div class="front">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/product-img01-back.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
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
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4>From <strong>Rs 3,054.68 INR</strong></h4>
                                                            <div class="discount-price">
                                                                <span class="main-price">Rs 3,716.37 INR</span>
                                                                <strong class="sale-percent">-17.8%</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product Box -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                                <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span
                                                                            aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Previous</span></a></li>
                                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i
                                                                                class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Next</span></a></li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom">
                                                            <h5>Showing Products 1-24 of 10 Result</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->
<?php get_footer( 'shop' );

