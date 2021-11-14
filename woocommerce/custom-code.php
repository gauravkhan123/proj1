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
<div class="col-xl-4 col-6 col-grid-box" <?php wc_product_class( '', $product ); ?>>

<div class="product-box">
        <div class="img-wrapper">
		<?php $args = array( 'post_type' => 'product', 'posts_per_page' => 4, 'orderby' => 'asc' );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); global $product;
		 $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($loop->post->ID));
	    if($featured_image) { ?>
		<div class="front">
<a href="#"><img src="<?php echo $featured_image[0]; ?>" class="img-fluid blur-up lazyload bg-img" alt=""></a>
</div>
<div class="back">
<a href="#"><img src="<?php echo $featured_image[0]; ?>" class="img-fluid blur-up lazyload bg-img" alt=""></a>
</div>
<?php } ?>
<div class="cart-info cart-wrap">
<a href="#" class="btn btn-solid">
    <i class="ti-shopping-cart"></i> View options
</a>
</div>
		
<?php endwhile; ?>
<!--how to get woocommerce product image-->

		
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	?>
	</div>
	<div class="product-detail">
	<?php

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
	</div>
</div>
</div>
<?php
$args = array( 'post_type' => 'product', 'posts_per_page' => 4, 'orderby' => 'rand' );

$loop = new WP_Query( $args );
//echo "<pre>";
//print_r($loop);
//echo "</pre>";
while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
    <div class="dvThumb col-xs-4 col-sm-3 col-md-3 profiler-select profiler<?php echo the_title(); ?>" data-profile="<?php echo $loop->post->ID; ?>">
        <?php $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($loop->post->ID)); ?>
        <?php if($featured_image) { ?>
        <a href="<?php echo get_permalink() ?>"><img src="<?php echo $featured_image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>"></a>
        <?php } ?>
        <a href="<?php echo get_permalink();?>"<p><?php the_title(); ?></p></a>
        <span class="price"><?php echo $product->get_price_html(); ?></span>
        
    </div>
<?php endwhile; ?>
<?php wp_reset_query();?>
<?php  echo do_shortcode('[add_to_cart id="'.$post->ID.'"]'); ?>
<?php
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
add_action('woocommerce_before_shop_loop_item_title','add_product_thumbnail_html');
function add_product_thumbnail_html()
{
 global $product;
$args = array( 'post_type' => 'product', 'posts_per_page' =>1, 'orderby' => 'rand' );

$loop = new WP_Query( $args );
//echo "<pre>";
//print_r($loop);
//echo "</pre>";
while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($loop->post->ID));
	    if($featured_image) {
echo '<div class="front">
<a href="#"><img src="<?php echo $featured_image[0]; ?>" class="img-fluid blur-up lazyload bg-img" alt=""></a>
</div>
<div class="back">
<a href="#"><img src="<?php echo $featured_image[0]; ?>" class="img-fluid blur-up lazyload bg-img" alt=""></a>
</div>
';
        }
 endwhile;
wp_reset_query();
// echo do_shortcode('[add_to_cart id="'.$post->ID.'"]');

$product_id               = get_the_ID();
$product                  = wc_get_products($product_id);
$product_thumbnail_url    = get_the_post_thumbnail_url($product_id, 'medium');
$product_title            = get_the_title();
$product_link             = get_the_permalink();
$sale_price               = $product ->get_sale_price();
$regular_price            = $product ->get_regular_price();
$is_product_on_sale       = $product ->is_on_sale();
$is_product_in_stock      = $product ->is_in_stock();
$product_price            = $product ->get_price_html();
$discount_percent         = !empty($sale_price)?floatval(($regular_price-$sale_price)/100):0;

wc_terms_and_conditions_checkbox_enabled();
}



