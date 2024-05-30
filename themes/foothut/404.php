<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * This is the template that displays a 404 error page when a page or resource is not found.
 *
 * @package constra
 */

    $error_page_bg_image_status = get_theme_mod('foodhut_error_page_bg_switch', true);
    $error_page_bg_image_url = get_theme_mod('foodhut_error_page_bg', get_template_directory_uri().'/assets/imgs/main.jpg');
    $error_page_heading = get_theme_mod('foodhut_error_page_heading','404');
    $error_page_sub_heading = get_theme_mod('foodhut_error_page_sub_heading','Ops! PAGE NOT FOUND...');
    $error_page_btn_text = get_theme_mod('foodhut_error_page_btn_text','Back to Home');
    $error_page_btn_url = get_theme_mod('foodhut_error_page_btn_url', '#');

    if($error_page_bg_image_status == false){
        $error_page_bg_image_url = '#';
    }
?>

<?php get_header(); ?>

<!-- Header starts -->
<header id="home" class="header" style="background-image: url('<?php echo esc_url($error_page_bg_image_url); ?>'); background-color: #1f1f1f;">
    <div class="overlay text-white text-center">
        <h1 class="display-2 font-weight-bold my-3"><?php echo esc_html__($error_page_heading,'foodhut'); ?></h1>
        <h2 class="display-4 mb-5"><?php echo esc_html__($error_page_sub_heading,'foodhut'); ?></h2>
        <a class="btn btn-lg btn-primary" href="<?php echo esc_url($error_page_btn_url); ?>"><?php echo esc_html__($error_page_btn_text,'foodhut'); ?></a>
    </div>
</header>
<!-- Header ends -->

<?php get_footer(); ?>