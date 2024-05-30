<?php
/**
* The template for displaying all single posts.
*
* This is the template that displays all single posts by default.
* You can also create specific templates for different post types.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package constra
* @since 1.0.0
*/
?>

<?php get_header(); ?>

    <!-- BLOG Section  -->
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <?php if(!empty($blog_archive_heading)) : ?>
            <h2 class="section-title py-5"><?php echo esc_html__($blog_archive_heading,'constra'); ?></h2>
        <?php endif; ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <?php if ( have_posts() ) : ?>
                        <?php while( have_posts()  ) : the_post(); ?>
                            <?php echo get_template_part( 'inc/template-parts/content' , get_post_format() );
                            
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();

                            ?>

                        <?php endwhile; ?>
                    <?php endif; ?>
                    
                </div>
                <div class="relates-post">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                            <?php if(!empty($prev_post)) : ?>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <a href="<?php echo get_the_permalink( $prev_post ); ?>">
                                        <p class="card-text text-white"><?php echo esc_html__('Previous blog','constra'); ?></p>
                                        <h5 class="card-title text-white"><i class="fas fa-angle-double-left"></i> <?php echo get_the_title($prev_post); ?></h5>
                                    </a>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                            <?php if(!empty($next_post)) : ?>
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <a href="<?php echo get_the_permalink( $next_post ); ?>">
                                        <p class="card-text text-white"><?php echo esc_html__('Next blog','constra'); ?></p>
                                        <h5 class="card-title text-white"><?php echo get_the_title($next_post); ?> <i class="fas fa-angle-double-right"></i> </h5>
                                    </a>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>