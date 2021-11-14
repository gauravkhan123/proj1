<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nutricareplus
 */

get_header();
?>

<!--section start-->
<section class="blog-detail-page section-b-space ratio2_3">
	<section class="blog-detail-page section-b-space ratio2_3">
        <div class="container">
            <div class="row">
		<?php
		while ( have_posts() ) :
			the_post();?>
			<div class="col-sm-12 blog-detail">
				<?php the_post_thumbnail('single-image',array('class' => 'img-fluid blur-up lazyloaded')); ?>
			
                    <h3><?php the_title();?></h3>
                    <ul class="post-social">
                        <li><?php the_date();?></li>
                        <li>Posted By : <?php the_author(); ?></li>
                        <li><i class="fa fa-comments"></i> <?php echo get_comments_number(); ?></li>
                    </ul>
                    <p><?php the_content();?></p>
				</div>
				<?php 
			//get_template_part( 'template-parts/content', 'get_post_type()' );?>
<!--<div class="container">
	<div class="row">
		<?php
			//the_post_navigation(
			//	array(
			//		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'nutricareplus' ) . '</span> <span class="nav-title">%title</span>',
			//		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'nutricareplus' ) . '</span> <span class="nav-title">%title</span>',
			//	)
			//);
		?>
			</div>
		</div>-->

     <?php		endwhile; // End of the loop.
	 ?>

	</div>
	<div class="row blog-contact">
                <div class="col-sm-12">
					<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
				//comment_form();
			endif;
			 ?>
			 </div>
		</div>
	</div>
	</section>
<?php
//get_sidebar();
get_footer();
