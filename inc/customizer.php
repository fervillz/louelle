<?php
/**
 * louelle Theme Customizer
 *
 * @package louelle
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function louelle_customize_register( $wp_customize ) {
	$wp_customize->remove_control( 'header_image' );
	$wp_customize->remove_control( 'header_textcolor' );
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_section( 'title_tagline' )->panel  = 'header_panel';
	$wp_customize->get_section( 'title_tagline' )->priority  = 2;
	$wp_customize->get_section( 'colors' )->panel = 'body_panel';	
	$wp_customize->get_section( 'background_image' )->panel = 'body_panel';
	

	$wp_customize->add_panel( 
		'header_panel',
		array(
			'priority'       => 1,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Header',
			'description'    => 'Customize header elements',
	) );

	$wp_customize->add_panel( 
		'body_panel',
		array(
			'priority'       => 2,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Body',
			'description'    => 'Customize header elements',
	) );

		/* header_fontcolor_section */
	$wp_customize->add_section(
		'need_help',
		array(
			'title' => __('Contact "fervillz" for a beer', 'louelle'),
			'description' => __('Thank you for trying out my theme, but as you can see its far from making it a complete customizable theme as there are functionalities I do not have time to implement. So for the meantime kindly contact me through email <b>[fervillz@gmail.com]</b> or add me in skype <b>[fervnando.kobusoft]</b>.', 'louelle' ),
			'priority' => 1,
		)
	);

	$wp_customize->add_setting (
		'need_help_setting',
		array(
			'default' => '#292f36',
			'sanitize_callback' => 'esc_url_raw',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'need_help_setting',
		array(
			'label' => esc_attr('', 'louelle' ),
			'section' => 'need_help',
		)
	);


	/* header_fontcolor_section */
	$wp_customize->add_section(
		'header_fontcolor_section',
		array(
			'title' => esc_attr('Font Colors', 'louelle'),
			'description' => esc_attr('Change header font colors', 'louelle' ),
			'priority' => 4,			
			'panel'  => 'header_panel',
		)
	);

	$wp_customize->add_setting (
		'header_fontcolor',
		array(
			'default' => '#292f36',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'header_fontcolor', 
		array(
			'label' => esc_attr('Branding Color', 'louelle' ),
			'description' => esc_attr('Site title and description', 'louelle' ),
			'section' => 'header_fontcolor_section',
			'settings' => 'header_fontcolor'
			)
		)
	);

	/* header_bgcolor_section */
	$wp_customize->add_section(
		'header_bgcolor_section',
		array(
			'title' => esc_attr('Background Colors', 'louelle'),
			'description' => esc_attr('Change header background color', 'louelle' ),
			'priority' => 3,
			'panel'  => 'header_panel',
		)
	);

	$wp_customize->add_setting (
		'header_bgcolor',
		array(
			'default' => '#292f36',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'header_bgcolor', 
		array(
			'label' => esc_attr('Background Color', 'louelle' ),
			'section' => 'header_bgcolor_section',
			'settings' => 'header_bgcolor'
			)
		)
	);

	//header nav color
	$wp_customize->add_setting (
		'header_navcolor',
		array(
			'default' => '#292f36',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'header_navcolor', 
		array(
			'label' => esc_attr('Navigation Color', 'louelle' ),
			'description' => esc_attr('Navigation normal color', 'louelle' ),
			'section' => 'header_fontcolor_section',
			'settings' => 'header_navcolor'
			)
		)
	);

	//header nav hover color
	$wp_customize->add_setting (
		'header_navhovercolor',
		array(
			'default' => '#f700b5',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'header_navhovercolor', 
		array(
			'label' => esc_attr('Header Navigation Hover Color', 'louelle' ),
			'description' => esc_attr('Navigation hover color', 'louelle' ),
			'section' => 'header_fontcolor_section',
			'settings' => 'header_navhovercolor'
			)
		)
	);

	$wp_customize->add_section( 'louelle_logo_section' , 
		array(
			'title'       => esc_attr( 'Logo', 'louelle' ),
			'priority'    => 1,
			'description' => esc_attr('Upload a logo to replace the default site name and description in the more', 'louelle' ),
			'panel'  => 'header_panel',
			)
		);
	
	$wp_customize->add_setting( 'louelle_logo',		
		array(
			'sanitize_callback' => 'esc_url_raw',
			)
		);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'louelle_logo', 
		array(
			'label'    => esc_attr( 'Logo', 'louelle' ),
			'section'  => 'louelle_logo_section',
			'settings' => 'louelle_logo',
			'sanitize_callback' => 'esc_url_raw',
			)
		)
	);

	$wp_customize->add_setting( 'louelle_logo_size',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
			)
		);

	$wp_customize->add_control(
		'louelle_logo_size',
		array(
			'label' => esc_attr('Logo size', 'louelle' ),
			'description' => esc_attr('Input only number (ie. 200)', 'louelle' ),
			'section' => 'louelle_logo_section',
		)
	);

	/* Sidebar */
	$wp_customize->add_section( 'louelle_sidebar_section' , 
		array(
			'title'       => esc_attr( 'Sidebar', 'louelle' ),
			'priority'    => 3,
			'description' => esc_attr('Select your sidebar location', 'louelle' ),
			'panel' => 'body_panel',
			)
		);
	
	$wp_customize->add_setting( 'louelle_sidebar',		
		array(
			'sanitize_callback' => 'louelle_sanitize_choices',
			'default' => 'sidebar--right',
			'transport'         => 'postMessage',
			)
	);

	$wp_customize->add_control(
		'louelle_sidebar',
		array(
			'type' => 'select',
			'label' => esc_attr('Sidebar Left or Right', 'louelle' ),
			'description' => esc_attr('Default is right', 'louelle' ),
			'section' => 'louelle_sidebar_section',
			'settings' => 'louelle_sidebar',
			'choices' => array(
				'sidebar--left' => 'Left',
				'sidebar--right' => 'Right',
			),
		)
	);

	//sidebar type
	$wp_customize->add_setting( 'louelle_sidebar_style',		
		array(
			'sanitize_callback' => 'louelle_sanitize_choices',
			'default' => 'sidebar--type0',
			'transport'         => 'postMessage',
			)
	);

	$wp_customize->add_control(
		'louelle_sidebar_style',
		array(
			'type' => 'select',
			'label' => esc_attr('Sidebar Design Style', 'louelle' ),
			'description' => esc_attr('Leave for default no style', 'louelle' ),
			'section' => 'louelle_sidebar_section',
			'settings' => 'louelle_sidebar_style',
			'choices' => array(
				'sidebar--type0' => 'No Style',
				'sidebar--type1' => 'Style 1',
			),
		)
	);

	$wp_customize->add_setting( 'louelle_heading_color',		
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default' => 'gray',
			'transport'         => 'postMessage',
			)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'louelle_heading_color', 
		array(
			'label' => esc_attr('Heading Font Color', 'louelle' ),
			'description' => __('h1, h2, h3, h4, h5, h6', 'louelle'),
			'section' => 'colors',
			'settings' => 'louelle_heading_color'
			)
		)
	);

	$wp_customize->add_setting( 'louelle_normal_font_color',		
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default' => 'gray',
			'transport'         => 'postMessage',
			)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'louelle_normal_font_color', 
		array(
			'label' => esc_attr('Normal Font Color', 'louelle' ),
			'description' => __('Overall normal font color', 'louelle'),
			'section' => 'colors',
			'settings' => 'louelle_normal_font_color'
			)
		)
	);

	$wp_customize->add_setting( 'louelle_link_color',		
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default' => 'gray',
			'transport'         => 'postMessage',
			)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'louelle_link_color', 
		array(
			'label' => esc_attr('Link Color', 'louelle' ),
			'description' => __('Site links color', 'louelle'),
			'section' => 'colors',
			'settings' => 'louelle_link_color'
			)
		)
	);

	$wp_customize->add_setting( 'louelle_hover_color',		
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default' => 'rgb(41, 47, 54)',
			'transport'         => 'postMessage',
			)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'louelle_hover_color', 
		array(
			'label' => esc_attr('Link Hover Color', 'louelle' ),
			'description' => __('Site links hover color', 'louelle'),
			'section' => 'colors',
			'settings' => 'louelle_hover_color'
			)
		)
	);

	//sidebar
	$wp_customize->add_setting( 'louelle_sidebar_bgcolor',		
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default' => '#ededed',
			'transport'         => 'postMessage',
			)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'louelle_sidebar_bgcolor', 
		array(
			'label' => esc_attr('Sidebar Background Color', 'louelle' ),
			'description' => __('Background color for sidebar, automatically adds padding 20px for better user experience', 'louelle'),
			'section' => 'louelle_sidebar_section',
			'settings' => 'louelle_sidebar_bgcolor'
			)
		)
	);

	//footer
	$wp_customize->add_setting( 'louelle_footer_font_color',		
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default' => 'gray',
			'transport'         => 'postMessage',
			)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'louelle_footer_font_color', 
		array(
			'label' => esc_attr('Footer Font Color', 'louelle' ),
			'description' => __('Copyright, proudly powered by..', 'louelle'),
			'section' => 'colors',
			'settings' => 'louelle_footer_font_color'
			)
		)
	);

	/* more link */
	$wp_customize->add_section('more_options',
		array(
			'title' => esc_attr('More Link Options', 'louelle'),
			'description' => esc_attr('Customize your read more link', 'louelle' ),
			'priority' => 1,
			'panel' => 'body_panel',
			)
		);

	$wp_customize->add_setting(
		'ss_excerpt_type',
		array(
			'default' => 'option2',
			'sanitize_callback' => 'louelle_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'ss_excerpt_type',
		array(
			'type' => 'select',
			'label' => esc_attr('Excerpt type', 'louelle' ),
			'section' => 'more_options',
			'choices' => array(
				'option1' => 'More Tag',
				'option2' => 'Excerpt',
			),
		)
	);

	//more type
	$wp_customize->add_setting(
		'ss_more_type',
		array(
			'default' => 'option1',
			'sanitize_callback' => 'louelle_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'ss_more_type',
		array(
			'type' => 'select',
			'label' => esc_attr('Read More Type', 'louelle' ),
			'section' => 'more_options',
			'choices' => array(
				'option1' => 'None',
				'option2' => 'Text',
				'option3' => 'Text + Button',
			),
		)
	);

	//more type - text
	$wp_customize->add_setting(
		'ss_more_text',
		array(
			'sanitize_callback' => 'esc_attr',
			'default' => 'Read More &raquo;',
		)
	);

	$wp_customize->add_control(
		'ss_more_text',
		array(
			'label' => esc_attr('Read More Text', 'louelle' ),
			'section' => 'more_options',
		)
	);


	//more position
	$wp_customize->add_setting(
		'ss_more_position',
		array(
			'default' => 'option1',
			'sanitize_callback' => 'louelle_sanitize_choices',

		)
	);

	$wp_customize->add_control(
		'ss_more_position',
		array(
			'type' => 'select',
			'label' => esc_attr('Read More Position', 'louelle' ),
			'description' => esc_attr('Only works if read more type is button', 'louelle' ),
			'section' => 'more_options',
			'choices' => array(
				'left' => 'Left',
				'right' => 'Right',
			),
		)
	);


	//more type - text + button
	$wp_customize->add_setting(
		'ss_more_button',
		array(
			'default' => 'option1',
			'sanitize_callback' => 'louelle_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'ss_more_button',
		array(
			'type' => 'select',
			'label' => esc_attr('Read More Button Style', 'louelle' ),
			'section' => 'more_options',
			'choices' => array(
				'option1' => 'Sharp Edges',
				'option2' => 'Rounded Corners',
			),
		)
	);

	//background color
	$wp_customize->add_setting(
		'ss_button_bg',
		array(
			'default' => '#c7c7c7',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);


	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'ss_button_bg', 
		array(
			'label' => esc_attr( 'Button Background Color', 'louelle' ),
			'section' => 'more_options',
	) ) );


	//text color
	$wp_customize->add_setting(
		'ss_text_color',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);


	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
		'ss_text_color', 
		array(
			'label' => esc_attr( 'Button Text Color', 'louelle' ),
			'section' => 'more_options',
	) ) );

	// google fonts
	require_once( dirname( __FILE__ ) . '/google-fonts/fonts.php' );


	$wp_customize->add_section( 'louelle_google_fonts', array(
		'title'    => __( 'Fonts', 'louelle' ),
		'priority' => 50,
	) );

	$wp_customize->add_setting( 'louelle_google_fonts_heading_font', array(
		'default'           => 'none',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'louelle_google_fonts_heading_font', array(
		'label'    => __( 'Header Font', 'louelle' ),
		'section'  => 'louelle_google_fonts',
		'settings' => 'louelle_google_fonts_heading_font',
		'type'     => 'select',
		'choices'  => $font_choices,
	) );

	$wp_customize->add_setting( 'louelle_google_fonts_body_font', array(
		'default'           => 'none',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'louelle_google_fonts_body_font', array(
		'label'    => __( 'Body Font', 'louelle' ),
		'section'  => 'louelle_google_fonts',
		'settings' => 'louelle_google_fonts_body_font',
		'type'     => 'select',
		'choices'  => $font_choices,
	) );
	// end google fonts



}
add_action( 'customize_register', 'louelle_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function louelle_customize_preview_js() {
	wp_enqueue_script( 'louelle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery','customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'louelle_customize_preview_js' );


function louelle_sanitize_choices( $input, $setting ) {
	global $wp_customize;
 
	$control = $wp_customize->get_control( $setting->id );
 
	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}
