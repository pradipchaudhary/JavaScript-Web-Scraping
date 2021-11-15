<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TT_Theme_Demo_Style_Blog extends TT_Theme_Demo {

	public static function import_files() {

		$server_url = 'https://themebeez.com/demo-contents/style-blog/';

		$demo_urls  = array(
			array(
				'import_file_name'           => esc_html__( 'Style Blog Demo', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'contents.xml',
				'import_widget_file_url'     => $server_url . 'widgets.wie',
				'import_customizer_file_url' => $server_url . 'customizer.dat',
				'import_preview_image_url'   => $server_url . 'screenshot.png',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=style-blog',
			),
		);

		return $demo_urls;
	}

	public static function after_import( $selected_import ) {

		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 
		$social_menu 	= get_term_by('name', 'Social Menu', 'nav_menu');  
	    $header_menu 	= get_term_by('name', 'Header Top', 'nav_menu');

	    $banner_cat		= get_term_by( 'slug', 'style', 'category' );
	    $banner_cat_id	= $banner_cat->term_id;

	    set_theme_mod(
	     	'nav_menu_locations', 
	     	array( 
	     		'menu-1' => $primary_menu->term_id, 
	     		'menu-2' => $social_menu->term_id,
	     		'menu-3' => $header_menu->term_id,
	     	)
	    );

	    set_theme_mod( 'styleblog_featured_post_cat', $banner_cat_id );

		update_option( 'themebeez_themes', $installed_demos );
	}
}