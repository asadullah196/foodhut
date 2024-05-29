<?php

// All Foodhut template parts calling function

// Header template calling
function foodhut_header(){
    get_template_part( 'inc/template-parts/header/nav-menu' );
    get_template_part( 'inc/template-parts/header/header-1' );
}

// Header template calling
function foodhut_footer(){
    get_template_part( 'inc/template-parts/footer/footer-1' );
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

// Foodhut primary left menu
function foodhut_primary_left_menus(){
    wp_nav_menu( 
        array( 
            'theme_location'  => 'primary-left-menu',
			'container' => false, // div class, make it false to avoid div generation
            'menu_class'      => 'navbar-nav', // Ul class
            'menu_id'         => '', // ul id
            'fallback_cb'     => 'Foodhut_Walker_Nav_Menu::fallback',
            'walker'     	  => new Foodhut_Walker_Nav_Menu,
			'depth'           => 3,
        ) 
    ); 
}

// Foodhut primary menu
function foodhut_primary_right_menus(){
    wp_nav_menu( 
        array( 
            'theme_location'  => 'primary-right-menu',
			'container' => false, // div class, make it false to avoid div generation
            'menu_class'      => 'navbar-nav', // Ul class
            'menu_id'         => '', // ul id
            'fallback_cb'     => 'Foodhut_Walker_Nav_Menu::fallback',
            'walker'     	  => new Foodhut_Walker_Nav_Menu,
			'depth'           => 3,
        ) 
    ); 
}

// Foodhut copyright
function foodhut_copyright(){
    $copyright_text = get_theme_mod('foodhut_footer_copyright_text','© Copyright 2024 Made with  By DevCRUD');

    if( !empty($copyright_text) ) : ?>
        <div class="bg-dark text-light text-center border-top wow fadeIn">
            <p class="mb-0 py-3 text-muted small"><?php echo wp_kses_post($copyright_text); ?></p>
        </div>
	<?php else : ?>
        <div class="bg-dark text-light text-center border-top wow fadeIn">
            <p class="mb-0 py-3 text-muted small">&copy; Copyright 2024 Made with <i class="ti-heart text-danger"></i> By <a href="#">DevCRUD</a></p>
        </div>
	<?php endif;	
}