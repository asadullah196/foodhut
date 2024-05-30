<?php
    // Getting value from kirki
    $display_blog_description = get_theme_mod('foodhut_blog_single_description_words', 25 );

    // Getting value from ACF
    $blog_pricing = function_exists('get_field') ? get_field('blog_price') : null;
?>

<?php if(is_single()) :  ?>
    <!-- Single post starts -->
    <div class="col-12 col-sm-4 col-md-3 col-xl-3"></div>
    <div class="col-12 col-sm-4 col-md-6 col-xl-6">
        
            <?php if(has_post_thumbnail()) : ?>
                <img src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="Blog Thumbnail" class="rounded-0 card-img-top mg-responsive">
            <?php endif; ?>
            <div class="card-body"><br/>
            <?php if($blog_pricing != null) : ?>
                <h1 class="text-center mb-4 text-danger">$<?php echo esc_html($blog_pricing); ?></h1>
            <?php endif; ?>
                <h4 class="pt20 pb20 text-white"><br/><?php the_title(); ?></h4><br/>
                <p class="text-white">
                    <?php the_content( ); ?>
                </p>
            </div>
    </div>
    <div class="col-12 col-sm-4 col-md-3 col-xl-3"></div>
    <!-- Single post ends -->
<?php else : ?>
    <!-- archive post starts -->
    <div class="col-md-4 my-3 my-md-0">
        <a href="#"class="card bg-transparent border">
            <?php if(has_post_thumbnail()) : ?>
                <img src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="Blog Thumbnail" class="rounded-0 card-img-top mg-responsive">
            <?php endif; ?>
            <div class="card-body">
            <?php if($blog_pricing != null) : ?>
                <h1 class="text-center mb-4"><a href="<?php the_permalink( ); ?>" class="badge badge-primary">$<?php echo esc_html($blog_pricing); ?></a></h1>
            <?php endif; ?>
                <h4 class="pt20 pb20"><a class="text-white" href="<?php the_permalink( ); ?>"><br/><?php the_title(); ?></a></h4><br/>
                <p class="text-white">
                    <?php 
                        $post_content = get_the_content();
                        $word_limit = !empty($display_blog_description) ? $display_blog_description : 40;
                        $trimmed_content = wp_trim_words($post_content, $word_limit);
                        echo $trimmed_content;
                    ?>
                </p>
            </div>
        </a>
    </div>
    <!-- archive post ends -->
<?php endif; ?>