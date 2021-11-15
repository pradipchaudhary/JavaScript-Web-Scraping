<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TT_Theme_Demo_Cream_Blog extends TT_Theme_Demo {

	public static function import_files() {

		$server_url = 'https://themebeez.com/demo-contents/cream-blog/';

		$demo_urls  = array(
			array(
				'import_file_name'           => esc_html__( 'Demo One', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-one/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-one/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-one/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-one/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-free',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Two', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-two/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-two/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-two/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-two/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-free-ii',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Three', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-three/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-three/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-three/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-three/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-free-iii',
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

	    $import_file_name = isset( $selected_import['import_file_name'] ) ? $selected_import['import_file_name'] : '';

	    if( !empty( $import_file_name ) ) {

	    	if( $import_file_name === 'Demo One' ) {

	    		$diy_category		= get_term_by( 'slug', 'diy', 'category' );
			    $modelling_category		= get_term_by( 'slug', 'modelling', 'category' );

			   	$banner_cats = array( $diy_category->term_id, $modelling_category->term_id );

			   	set_theme_mod( 'cream_blog_banner_categories', $banner_cats );

	    	} else if( $import_file_name === 'Demo Two' ) {

	    		$american_cuisine_category		= get_term_by( 'slug', 'american-cuisine', 'category' );
			    $breakfast_category		= get_term_by( 'slug', 'breakfase', 'category' );

			   	$banner_cats = array( $american_cuisine_category->term_id, $breakfast_category->term_id );

			   	set_theme_mod( 'cream_blog_banner_categories', $banner_cats );
	    	} else {

	    		$fashion_category		= get_term_by( 'slug', 'fashion', 'category' );
			    $lifestyle_category		= get_term_by( 'slug', 'lifestyle', 'category' );

			   	$banner_cats = array( $fashion_category->term_id, $lifestyle_category->term_id );

			   	set_theme_mod( 'cream_blog_banner_categories', $banner_cats );
	    	}
	    }    

		update_option( 'themebeez_themes', $installed_demos );
	}
}