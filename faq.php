<?php
/**
 * Template Name: Faq
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
 <section class="contact-page section-b-space"> <!--section start-->
    <section class="faq-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <?php 
                    $query = new WP_Query( array(
                    'post_type'     =>  'faq',
                    'posts_per_page'=>  -1,
                    'order'      =>   'ASC'
                    ));
                ?>
                <?php 
                    if( have_posts( )) : 
                    while ($query->have_posts()) : $query->the_post(); 
                    $image = wp_get_attachment_url( get_post_thumbnail_id() );
                    $id = get_the_ID();
                ?>
                    <div class="accordion theme-accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php the_title(); ?></button></h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_query( );
                    endif;
                ?>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
    <!--Section ends-->
<?php
//get_sidebar();
get_footer();