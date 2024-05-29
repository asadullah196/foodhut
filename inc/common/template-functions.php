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

// Foodhut primary menu
function foodhut_primary_left_menus(){
    wp_nav_menu( 
        array( 
            'theme_location'  => 'primary-menu',
			'container_class' => 'collapse navbar-collapse', // div class, make it false to avoid div generation
			'container_id'    => 'navbar-collapse', // div id
            'menu_class'      => 'nav navbar-nav mr-auto', // Ul class
            'menu_id'         => '', // ul id
            'fallback_cb'     => 'Foodhut_Walker_Nav_Menu::fallback',
            'walker'     	  => new Foodhut_Walker_Nav_Menu,
			'depth'           => 4,
        ) 
    ); 
}