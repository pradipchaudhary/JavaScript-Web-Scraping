<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TT_Theme_Demo_Orchid_Store extends TT_Theme_Demo {

	public static function import_files() {

		if( class_exists( 'Orchid_Store_Pro_Demo_Import' ) ) {

			$demo_class = new Orchid_Store_Pro_Demo_Import();

			return $demo_class->demo_import();
		} else {

			$server_url = 'https://themebeez.com/demo-contents/orchid-store/';

			$demo_urls  = array(
				array(
					'import_file_name'           => esc_html__( 'Default Demo', 'themebeez-toolkit' ),
					'import_file_url'            => $server_url . 'demo-one/contents.xml',
					'import_widget_file_url'     => $server_url . 'demo-one/widgets.wie',
					'import_customizer_file_url' => $server_url . 'demo-one/customizer.dat',
					'import_preview_image_url'   => $server_url . 'demo-one/screenshot.jpg',
					'demo_url'                   => 'https://demo.themebeez.com/demos-2/orchid-store/',
				),
				array(
					'import_file_name'           => esc_html__( 'Elementor Demo', 'themebeez-toolkit' ),
					'import_file_url'            => $server_url . 'demo-two/contents.xml',
					'import_widget_file_url'     => $server_url . 'demo-two/widgets.wie',
					'import_customizer_file_url' => $server_url . 'demo-two/customizer.dat',
					'import_preview_image_url'   => $server_url . 'demo-two/screenshot.jpg',
					'demo_url'                   => 'https://demo.themebeez.com/demos-2/orchid-store-ii/',
				),
				array(
					'import_file_name'           => esc_html__( 'RTL Demo', 'themebeez-toolkit' ),
					'import_file_url'            => $server_url . 'demo-three/contents.xml',
					'import_widget_file_url'     => $server_url . 'demo-three/widgets.wie',
					'import_customizer_file_url' => $server_url . 'demo-three/customizer.dat',
					'import_preview_image_url'   => $server_url . 'demo-three/screenshot.jpg',
					'demo_url'                   => 'https://demo.themebeez.com/demos-2/orchid-store-iii/',
				),
			);

			return $demo_urls;
		}
	}

	public static function after_import( $selected_import ) {

		$primary_menu 	= get_term_by('name', 'Primary menu', 'nav_menu'); 
		$secondary_menu 	= get_term_by('name', 'Secondary menu', 'nav_menu'); 

	    set_theme_mod(
	     	'nav_menu_locations', 
	     	array( 
	     		'menu-1' => $primary_menu->term_id,
	     		'menu-2' => $secondary_menu->term_id,
	     	)
	    );

	    // Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Homepage' );
		$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );

		update_option( 'themebeez_themes', $installed_demos );
	}
}