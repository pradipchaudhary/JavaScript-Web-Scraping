<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TT_Theme_Demo_Fascinate_Pro extends TT_Theme_Demo {

	public static function import_files() {

		$server_url = 'https://themebeez.com/demo-contents/fascinate-pro/';

		$demo_urls  = array(
			array(
				'import_file_name'           => esc_html__( 'Demo One', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-one/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-one/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-one/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-one/screenshot.jpg',
				'demo_url'                   => 'https://demo.themebeez.com/demos-2/fascinate-pro/',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Two', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-two/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-two/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-two/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-two/screenshot.jpg',
				'demo_url'                   => 'https://demo.themebeez.com/demos-2/fascinate-pro-ii/',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Three', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-three/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-three/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-three/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-three/screenshot.jpg',
				'demo_url'                   => 'https://demo.themebeez.com/demos-2/fascinate-pro-iii/',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Four', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-four/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-four/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-four/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-four/screenshot.jpg',
				'demo_url'                   => 'https://demo.themebeez.com/demos-2/fascinate-pro-iv/',
			),
		);

		return $demo_urls;
	}

	public static function after_import( $selected_import ) {

		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu');  
	    $header_menu 	= get_term_by('name', 'Top Menu', 'nav_menu');

	    set_theme_mod(
	     	'nav_menu_locations', 
	     	array( 
	     		'menu-1' => $primary_menu->term_id, 
	     		'menu-2' => $header_menu->term_id,
	     	)
	    );

		update_option( 'themebeez_themes', $installed_demos );
	}
}