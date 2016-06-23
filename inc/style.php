<?php 

/* Dynamic styling */

function my_styles_method() {	
	//heder nav text hover color
	$header_bgcolor = get_theme_mod( 'header_bgcolor','#292f36');

	//Link color
	$louelle_normal_font_color = get_theme_mod( 'louelle_normal_font_color','gray');

	//Link color
	$louelle_link_color = get_theme_mod( 'louelle_link_color','gray');

	//Link hover color
	$louelle_hover_color = get_theme_mod( 'louelle_hover_color','rgb(41, 47, 54)');

	//Link hover color
	$louelle_heading_color = get_theme_mod( 'louelle_heading_color','gray');

	//sidebar bg color
	$louelle_sidebar_bgcolor = get_theme_mod( 'louelle_sidebar_bgcolor','#ffffff');
	$louelle_sidebar_bgcolor2 = ( $louelle_sidebar_bgcolor == '#ffffff' ) ? '0' : '20px';

	//footer text color
	$louelle_footer_font_color = get_theme_mod( 'louelle_footer_font_color','gray');

	//heder nav text color
	$header_navcolor = get_theme_mod( 'header_navcolor','#fff');

	//heder nav text hover color
	$header_navhovercolor = get_theme_mod( 'header_navhovercolor','#fff');

	//heder nav text hover color
	$header_fontcolor = get_theme_mod( 'header_fontcolor','#fff');

    $color = get_theme_mod( 'my-custom-color' );

    $custom_css = "
            .site-header,
			.main-navigation ul ul,
			.sidr {
                background-color: $header_bgcolor;
            }

            body, button, input, select, textarea {
				color: $louelle_link_color;
			}

			.site-content a {
				color: $louelle_link_color;
			}

			.site-content a:hover, .site-footer a:hover {
				color: $louelle_hover_color;
			}

			.site-content h1, .site-content h2, .site-content h3, .site-content h4, .site-content h5, .site-content h6 {
				color: $louelle_heading_color;
			}

			.site-footer a, .site-footer {
				color: $louelle_footer_font_color;
			}

			.widget-area {
				background-color: $louelle_sidebar_bgcolor;
				padding:$louelle_sidebar_bgcolor2;
			}

			.site-title a,
			.site-description {
				color: $header_fontcolor;
			}

			.main-navigation ul a,
			.sidr li a {
				color: $header_navcolor;
			}

			.current_page_item a,
			.current-menu-item a,
			.current_page_item a:visited,
			.current-menu-item a:visited,
			.main-navigation li:hover > a {
				color: $header_navhovercolor;
			}";

    wp_add_inline_style( 'louelle-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );
?>