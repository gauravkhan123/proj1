<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nutricareplus
 */

?>
<div class="container mt-5">
	<div class="row">
		<div class="col-sm-12">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="row blog-media">
                        <div class="col-xl-6">
                            <div class="blog-left">
                                <a href="#"><?php the_post_thumbnail('blog-image',array('class' => 'img-fluid blur-up lazyloaded')); ?></a>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="blog-right">
                                <div>
                                    <?php the_date( 'd-M-Y', '<h6>', '</h6>' );?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title('<h4>', '</h4>');?>
                                    </a>
                                    <ul class="post-social">
                                        <li> Posted By : <?php the_author();?></li>
                                        <li><i class="fa fa-comments"></i> <?php echo get_comments_number(); ?></li>
                                    </ul>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
</article><!-- #post-<?php the_ID(); ?> -->
		</div>
		</div>
		</div>