<?php
    // Getting value from ACF
    $blog_pricing = function_exists('get_field') ? get_field('blog_price') : null;
?>

<div class="col-12 col-sm-4 col-md-3 col-xl-3"></div>
<div class="col-12 col-sm-4 col-md-6 col-xl-6 foodhut-page-post">
    <?php
        the_content();
        wp_link_pages( [
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'foodhut' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'foodhut' ) . ' </span>%',
            'separator'   => '<span class="screen-reader-text"> </span>',
        ] );

        if ( comments_open() || get_comments_number() ):
            comments_template();
        endif;
    ?>
</div>
<div class="col-12 col-sm-4 col-md-3 col-xl-3"></div>