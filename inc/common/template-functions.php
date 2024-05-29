<?php

// All Foodhut template parts calling function

// Header template calling
function foodhut_header(){
    get_template_part( 'inc/template-parts/header/header-1' );
}

// Foodhut header section logo
function foodhut_header_logo(){
    
    $header_section_logo = get_theme_mod('foodhut_header_logo', get_template_directory_uri() . '/assets/imgs/logo.svg');

	if( !empty($header_section_logo) ) : ?>
        <a class="navbar-brand m-auto" href=""<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($header_section_logo); ?>" class="brand-img" alt="">
            <span class="brand-txt">Food Hut</span>
        </a>
	<?php else : ?>
        <a class="navbar-brand m-auto" href=""<?php echo esc_url(home_url('/')); ?>">
            <p><?php bloginfo('name'); ?></p>
        </a>
	<?php endif;	
}