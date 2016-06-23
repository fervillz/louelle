/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_fontcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Header louelle_logo_size color.
	wp.customize( 'louelle_logo_size', function( value ) {
		value.bind( function( to ) {
			$( '.site-branding .site-logo a > img' ).css( {
				'width': to+'px',
			} );
			
		} );
	} );

	// Header louelle_normal_font_color color.
	wp.customize( 'louelle_heading_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-content h1, .site-content h2, .site-content h3, .site-content h4, .site-content h5, .site-content h6').css( {
				'color': to,
			} );
			
		} );
	} );


	// Header louelle_normal_font_color color.
	wp.customize( 'louelle_normal_font_color', function( value ) {
		value.bind( function( to ) {
			$( 'body, button, input, select, textarea').css( {
				'color': to,
			} );
			
		} );
	} );

	// Header header_navcolor.
	wp.customize( 'header_navcolor', function( value ) {
		value.bind( function( to ) {
			$( '.main-navigation ul a').css( {
				'color': to,
			} );
			
		} );
	} );

	// Header louelle_hover_color color.
	wp.customize( 'header_navhovercolor', function( value ) {
		value.bind( function( to ) {
			$('.current_page_item a,.current-menu-item a,.current_page_item a:visited,.current-menu-item a:visited').css( {
				'color': to,
			} );			

			$('.main-navigation ul a')
				.on('mouseenter', function(e) {
					$(e.target).attr('style', 'color: ' + to);
				})
				.on('mouseleave', function(e) {
					$(e.target).attr('style', '');
			});
			
		} );
	} );	

	//sidebar bgcolor.
	wp.customize( 'louelle_sidebar_bgcolor', function( value ) {
		value.bind( function( to ) {
			if ( to == '#ffffff') {
				console.log(to);	
				$( '.widget-area').css( {
					'background-color': to,
					'padding': '0',
				} );
			}
			else {
				$( '.widget-area').css( {
					'background-color': to,
					'padding': '20',
				} );
			}					
		} );
	} );

	//sidebar pos color.
	wp.customize( 'louelle_sidebar', function( value ) {
		value.bind( function( to ) {
			if ( to == 'sidebar--left' ) {
				$('body').addClass('sidebar--left');
				$('body').removeClass('sidebar--right');
			}
			if ( to == 'sidebar--right' ) {
				$('body').addClass('sidebar--right');
				$('body').removeClass('sidebar--left');
			}			
		} );
	} );


	//sidebar pos color.
	wp.customize( 'louelle_sidebar_style', function( value ) {
		value.bind( function( to ) {
			if ( to == 'sidebar--type0' ) {
				$('body').addClass('sidebar--type0');
				$('body').removeClass('sidebar--type1');
				$('body').removeClass('sidebar--type2');
			}
			if ( to == 'sidebar--type1' ) {
				$('body').addClass('sidebar--type1');
				$('body').removeClass('sidebar--type0');
				$('body').removeClass('sidebar--type2');
			}
			if ( to == 'sidebar--type2' ) {
				$('body').addClass('sidebar--type2');
				$('body').removeClass('sidebar--type0');
				$('body').removeClass('sidebar--type1');
			}			
		} );
	} );


	// Header louelle_link_color color.
	wp.customize( 'louelle_link_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-content a').css( {
				'color': to,
			} );
			
		} );
	} );

	// Header louelle_hover_color color.
	wp.customize( 'louelle_hover_color', function( value ) {
		value.bind( function( to ) {
			$('.site-content a, .site-footer a')
				.on('mouseenter', function(e) {
					$(e.target).attr('style', 'color: ' + to);
				})
				.on('mouseleave', function(e) {
					$(e.target).attr('style', '');
			});
			
		} );
	} );	

	// Header background color.
	wp.customize( 'header_bgcolor', function( value ) {
		value.bind( function( to ) {
			
			$( '#masthead, .main-navigation ul ul, .sidr' ).css('background-color', to );
		} );
	} );

	// Header louelle_footer_font_color color.
	wp.customize( 'louelle_footer_font_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer a, .site-footer').css( {
				'color': to,
			} );
			
		} );
	} );

	// google fonts
	wp.customize('louelle_google_fonts_body_font', function(value) {
			value.bind(function(to) {
					var font = to.replace(' ', '+');
					WebFontConfig = {
							google: { families: [font + '::latin'] }
					};
					(function() {
							var wf = document.createElement('script');
							wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
									'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
							wf.type = 'text/javascript';
							wf.async = 'true';
							var s = document.getElementsByTagName('script')[0];
							s.parentNode.insertBefore(wf, s);
					})();

					// style the text
					if (to == 'none') {
							$('body').attr('style', '');
					} else {
							var myVar = setInterval(function() {
									if (typeof WebFont != 'undefined') {
											WebFont.load({
													google: {
															families: [font]
													}
											});
											clearInterval(myVar);
									}
							}, 100);

							$('body, p, span, small, input, li, li a, .block_cont_in :not(h1,h2,h3,h4,h5,.fa,h1 a, h2 a, h3 a, h4 a, h5 a), .banner_left .text a, .profile_cont :not(h1,h2,h3,h4,h5), .herotext, .herobuttons .button').attr("style", 'font-family:"' + to + '" !important');
					}
			});
	});
	wp.customize('louelle_google_fonts_heading_font', function(value) {
			value.bind(function(to) {
					var font = to.replace(' ', '+');
					WebFontConfig = {
							google: { families: [font + '::latin'] }
					};
					(function() {
							var wf = document.createElement('script');
							wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
									'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
							wf.type = 'text/javascript';
							wf.async = 'true';
							var s = document.getElementsByTagName('script')[0];
							s.parentNode.insertBefore(wf, s);
					})();

					// style the text
					if (to == 'none') {
							$('h1,h2,h3,h4,h5,h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a').attr("style", '');
					} else {
							var myVar = setInterval(function() {
									if (typeof WebFont != 'undefined') {
											WebFont.load({
													google: {
															families: [font]
													}
											});
											clearInterval(myVar);
									}
							}, 100);

							$('h1,h2,h3,h4,h5,h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a').attr("style", 'font-family:"' + to + '" !important');
					}
			});
	});

} )( jQuery );
