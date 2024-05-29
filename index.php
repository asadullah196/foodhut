<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Foodhut
 * @since 1.0.0
 */

    // Exit if accessed directly.
    defined( 'ABSPATH' ) || exit;

    
    $blog_archive_heading = get_theme_mod('foodhut_blog_archive_page_heading', 'Events At The Food Hut');

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
                            <?php echo get_template_part( 'inc/template-parts/content' , get_post_format() ); ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php echo get_template_part( 'inc/template-parts/content-none' ); ?>
                    <?php endif; ?>
                    
                </div>
                <br/>
                <!-- Blog pagination starts -->
                <?php foodhut_navigation(); ?>
                <!-- Blog pagination ends -->
            </div>
        </div>
    </div>
<?php get_footer(); ?>