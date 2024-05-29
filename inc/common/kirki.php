<?php 

// Foodhut theme options
new \Kirki\Panel(
    'foodhut_theme_options',
    [
        'priority'      => 10,
        'title'         => esc_html__( 'Theme Options', 'foodhut' ),
        'description'   => esc_html__( 'Foodhut Options Panel', 'foodhut' ),
    ]
);

// Foodhut top menu section
function foodhut_menu_info() {
    new \Kirki\Section(
        'foodhut_menu_info',
        [
            'title'       => esc_html__( 'Top Menu', 'foodhut' ),
            'description' => esc_html__( 'Menu update options', 'foodhut' ),
            'panel'       => 'foodhut_theme_options',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings' 		=> 'foodhut_header_logo',
            'label'    		=> esc_html__( 'Header Logo', 'foodhut' ),
			'description' 	=> esc_html__( 'The saved photo will be your logo', 'foodhut' ),
            'section'  		=> 'foodhut_menu_info',
            'default'  		=> get_template_directory_uri() . '/assets/imgs/logo.svg',
			'priority'    	=> 10,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'foodhut_menu_cta_switch',
            'label'       => esc_html__( 'Others', 'foodhut' ),
            'section'     => 'foodhut_menu_info',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Show', 'foodhut' ),
                'off' => esc_html__( 'Hide', 'foodhut' ),
            ],
        ]
    );
    
    new \Kirki\Field\Text(
        [
            'settings' => 'foodhut_menu_cta_text',
            'label'    => esc_html__( 'CTA Button Text', 'foodhut' ),
            'section'  => 'foodhut_menu_info',
            'default'  => esc_html__( 'Components', 'foodhut' ),
            'priority' => 10,
        ]
    );

	new \Kirki\Field\URL(
		[
			'settings' => 'foodhut_menu_cta_url',
			'label'    => esc_html__( 'CTA Button URL', 'foodhut' ),
			'section'  => 'foodhut_menu_info',
			'default'  => '#',
			'priority' => 10,
		]
	);
}
foodhut_menu_info();

// Foodhut footer section
function foodhut_footer_section() {
    new \Kirki\Section(
        'foodhut_footer_section',
        [
            'title'       => esc_html__( 'Footer Section', 'foodhut' ),
            'description' => esc_html__( 'Menu update options', 'foodhut' ),
            'panel'       => 'foodhut_theme_options',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'foodhut_footer_email_heading',
            'label'    => esc_html__( 'Email Heading', 'foodhut' ),
            'section'  => 'foodhut_footer_section',
            'default'  => esc_html__( 'Email Us', 'foodhut' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'foodhut_footer_email_address',
            'label'    => esc_html__( 'Email Address', 'foodhut' ),
            'section'  => 'foodhut_footer_section',
            'default'  => esc_html__( 'info@website.com', 'foodhut' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'foodhut_footer_phone_heading',
            'label'    => esc_html__( 'Call Heading', 'foodhut' ),
            'section'  => 'foodhut_footer_section',
            'default'  => esc_html__( 'Components', 'foodhut' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'foodhut_footer_phone_number',
            'label'    => esc_html__( 'Call Number', 'foodhut' ),
            'section'  => 'foodhut_footer_section',
            'default'  => esc_html__( '(123) 456-7890', 'foodhut' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'foodhut_footer_address_heading',
            'label'    => esc_html__( 'Address Heading', 'foodhut' ),
            'section'  => 'foodhut_footer_section',
            'default'  => esc_html__( 'Find Us', 'foodhut' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'foodhut_footer_address_text',
            'label'    => esc_html__( 'Address Text', 'foodhut' ),
            'section'  => 'foodhut_footer_section',
            'default'  => esc_html__( '12345 Fake ST NoWhere AB Country', 'foodhut' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'foodhut_footer_copyright_text',
            'label'    => esc_html__( 'Footer Copyright Text', 'foodhut' ),
            'section'  => 'foodhut_footer_section',
            'default'  => esc_html__( '© Copyright 2024 Made with  By DevCRUD', 'foodhut' ),
            'priority' => 10,
        ]
    );

}
foodhut_footer_section();