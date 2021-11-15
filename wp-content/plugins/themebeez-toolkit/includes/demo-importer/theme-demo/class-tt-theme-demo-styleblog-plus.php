<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TT_Theme_Demo_StyleBlog_Plus extends TT_Theme_Demo {

	public static function import_files() {

		$server_url = 'https://themebeez.com/demo-contents/style-blog-pro/';

		$demo_urls  = array(
			array(
				'import_file_name'           => esc_html__( 'Demo One', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-one/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-one/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-one/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-one/screenshot.png',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=style-blog-pro',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Two', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-two/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-two/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-two/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-two/screenshot.png',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=style-blog-pro-ii',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Three', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-three/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-three/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-three/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-three/screenshot.png',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=style-blog-pro-iii',
			)
		);

		return $demo_urls;
	}

	public static function after_import( $selected_import ) {

		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 
		$social_menu 	= get_term_by('name', 'Social Menu', 'nav_menu');  
	    $header_menu 	= get_term_by('name', 'Header Top', 'nav_menu');
	    $footer_menu 	= get_term_by('name', 'Footer Bottom', 'nav_menu');

	    set_theme_mod(
	     	'nav_menu_locations', 
	     	array( 
	     		'menu-1' => $primary_menu->term_id, 
	     		'menu-2' => $social_menu->term_id,
	     		'menu-3' => $header_menu->term_id,
	     		'menu-4' => $footer_menu->term_id
	     	)
	    );

	    $import_file_name = isset( $selected_import['import_file_name'] ) ? $selected_import['import_file_name'] : '';

	    if( !empty( $import_file_name ) ) {

	    	if( $import_file_name == 'Demo One' ) {

	    		$fashion_category		= get_term_by( 'slug', 'fashion', 'category' );
	    		$fashion_category_id	= $fashion_category->term_id;

			   	set_theme_mod( 'styleblog_plus_featured_post_cat', $fashion_category_id );

	    	} else if( $import_file_name == 'Demo Two' ) {

	    		$blog_category		= get_term_by( 'slug', 'blog', 'category' );
	    		$blog_category_id		= $blog_category->term_id;

	    		$glamour_category		= get_term_by( 'slug', 'glamour', 'category' );
	    		$glamour_category_id		= $glamour_category->term_id;

	    		$style_category		= get_term_by( 'slug', 'style', 'category' );
	    		$style_category_id		= $style_category->term_id;

			   	set_theme_mod( 'styleblog_plus_featured_post_cat', array( $blog_category_id, $glamour_category_id, $style_category_id ) );
	    	} else {

	    		$general_category		= get_term_by( 'slug', 'general', 'category' );
	    		$general_category_id	= $general_category->term_id;

			   	set_theme_mod( 'styleblog_plus_featured_post_cat', $general_category_id );
	    	}
	    }

		update_option( 'themebeez_themes', $installed_demos );
	}
}