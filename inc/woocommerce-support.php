<?php
/**
 * Show cart contents / total Ajax
 */
//add_filter( 'woocommerce_enqueue_styles', '__return_false' );
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>  <?php //echo //$woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}
//remove_filter( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_filter( 'woocommerce_shop_loop_item_title.', 'woocommerce_template_loop_product_title', 10 );

/*shorten woocommere product title*/
add_filter( 'the_title', 'shorten_woo_product_title', 10, 2 );
function shorten_woo_product_title( $title, $id ) {
    if ( ! is_singular( array( 'product' ) ) && get_post_type( $id ) === 'product' ) {
        return wp_trim_words( $title, 4, '...' ); // change last number to the number of words you want
    } else {
        return $title;
    }
}
//wrapper of content
//function add_img_wrapper_start() {
//    echo '<div class="item-media">';
//}
//add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_start', 5, 2 );

// Close the div that we just added
//function add_img_wrapper_close() {
//    echo '</div>';
//}
//add_action( 'woocommerce_after_shop_loop_item_title', 'add_img_wrapper_close', 12, 2 );

// Remove the sorting dropdown from Woocommerce
//remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
// Remove the result count from WooCommerce
//remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
// Remove the result count from WooCommerce
//remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
//remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);

//add_filter('woocommerce_before_shop_loop', 'woocommerce_breadcrumb', 20);
//remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
// Remove Sidebar From Single Product Page
add_action( 'wp', 'remove_sidebar_single_product' );
function remove_sidebar_single_product() {
if ( is_product() ) {
	remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
     }
}

/**
 * Modifies WooCommerce product rating to force a defined value
 * 
 * @return string Modified rating html
 */
//function wpse_get_modified_rating_html(){
    /** @var float Rating being shown */
 //   $rating = 5;
    /** @var int Total number of ratings */
 //   $count = 1;

//    $html  = '<div class="star-rating">';
//    $html .= wc_get_star_rating_html( $rating, $count );
//    $html .= '</div>';

//    return $html;
//}
//add_filter( 'woocommerce_product_get_rating_html', 'wc_get_rating_html' );
////remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );    
//add_action( 'after_setup_theme', function(){
  //  add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 9 );
//});
//wrapper of content
//function add_img_wrapper_start() {
  //  echo '<div class="img-wrapper">';
//}
//add_action( 'woocommerce_before_shop_loop_item', 'add_img_wrapper_start', 10 );

// Close the div that we just added
//function add_img_wrapper_close() {
//    echo '</div>';
//}
//add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_close', 10 );

//function add_product_detail_start()
//{
  //  echo '<div class="product-detail">';
//}
//add_action('woocommerce_before_shop_loop_item_title','add_product_detail_start',10);

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Add to Cart', 'woocommerce' ); 
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'View Options', 'woocommerce' );
}
//showing product count after navigation
add_action( 'after_setup_theme', function(){
      add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 10 );
});
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',55);

