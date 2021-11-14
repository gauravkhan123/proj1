<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php
$col=wc_get_loop_prop( 'columns' );
echo $col;
?>
<?php //echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>

<div <?php wc_product_class( 'col-xl-'.$col. ' col-grid-box', $product ); ?>>
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
