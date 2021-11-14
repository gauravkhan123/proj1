<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nutricareplus
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row blog-media">
      <div class="col-xl-6">
       <div class="blog-left">
    <a class="bg-size blur-up lazyloaded" href="#"><?php the_post_thumbnail('blog-image',array('class' => 'img-fluid blur-up lazyloaded')); ?></a>
        </div>
        </div>
        <div class="col-xl-6">
        <div class="blog-right">
	<div class="entry-content">
        <?php
        if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
        if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				//nutricareplus_posted_on();
				//nutricareplus_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif;
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nutricareplus' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nutricareplus' ),
				'after'  => '</div>',
			)
        );
        
		?>
    </div><!-- .entry-content -->
    </div>
    </div>
    </div>
	<footer class="entry-footer">
		<?php nutricareplus_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
