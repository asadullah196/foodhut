<?php
/**
 * Template Name: Custom Page Template
 *
 * The template for displaying pages.
 *
 * This is a custom page template that can be used to display content
 * for a specific page. To use this template, assign it to a page
 * through the WordPress page editor.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Foodhut
 * @since 1.0.0
 */

    // Getting value from kirki
    $blog_archive_heading = get_theme_mod('foodhut_blog_archive_page_heading', 'Events At The Food Hut');

?>

<?php get_header(); ?>

    <!-- Single page section  -->
    <div id="blog" class="container-fluid bg-dark text-light text-center wow fadeIn">
        <h2 class="section-title py-5"><?php the_title(); ?></h2>
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="page-thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>
        <br/>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?> 
                            <?php echo get_template_part( 'inc/template-parts/content','page' ); ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php echo get_template_part( 'inc/template-parts/content-none' ); ?>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>