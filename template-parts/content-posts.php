 <!-- section start -->
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
                <!--<div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="blog-sidebar">
                        <div class="theme-card">
                            <h4>Recent Blog</h4>
                            <ul class="recent-blog">
                                <li>
                                    <div class="media"> <img class="img-fluid blur-up lazyload" src="assets/images/blog-img04.jpg" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h6>26 Nov 2020</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"> <img class="img-fluid blur-up lazyload" src="assets/images/blog-img01.jpg" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h6>26 Nov 2020</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"> <img class="img-fluid blur-up lazyload" src="assets/images/blog-img03.jpg" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h6>26 Nov 2020</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"> <img class="img-fluid blur-up lazyload" src="assets/images/blog-img02.jpg" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h6>26 Nov 2020</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"> <img class="img-fluid blur-up lazyload" src="assets/images/blog-img02.jpg" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h6>26 Nov 2020</h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="theme-card">
                            <h4>Popular Blog</h4>
                            <ul class="popular-blog">
                                <li>
                                    <div class="media">
                                        <div class="blog-date"><span>25 </span><span>Nov</span></div>
                                        <div class="media-body align-self-center">
                                            <h6>Lorem Ipsum is simply dummy</h6>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="blog-date"><span>25 </span><span>Nov</span></div>
                                        <div class="media-body align-self-center">
                                            <h6>Lorem Ipsum is simply dummy</h6>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="blog-date"><span>25 </span><span>Nov</span></div>
                                        <div class="media-body align-self-center">
                                            <h6>Lorem Ipsum is simply dummy</h6>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="blog-date"><span>25 </span><span>Nov</span></div>
                                        <div class="media-body align-self-center">
                                            <h6>Lorem Ipsum is simply dummy</h6>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            
    <!-- Section ends -->
</article><!-- #post-<?php the_ID(); ?> -->