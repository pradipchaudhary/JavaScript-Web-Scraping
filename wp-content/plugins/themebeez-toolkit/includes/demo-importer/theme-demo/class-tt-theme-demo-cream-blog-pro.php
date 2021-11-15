<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TT_Theme_Demo_Cream_Blog_Pro extends TT_Theme_Demo {

	public static function import_files() {

		$server_url = 'https://themebeez.com/demo-contents/cream-blog-pro/';

		$demo_urls  = array(
			array(
				'import_file_name'           => esc_html__( 'Demo One', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-one/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-one/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-one/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-one/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-fashion',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Two', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-two/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-two/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-two/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-two/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-pro-fashion-video',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Three', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-three/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-three/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-three/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-three/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-pro-fashion-slider',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Four', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-four/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-four/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-four/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-four/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-pro-food',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Five', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-five/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-five/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-five/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-five/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-pro-mens-blog',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Six', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-six/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-six/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-six/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-six/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-pro-sports',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Seven', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-seven/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-seven/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-seven/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-seven/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-pro-lifestyle',
			),
			array(
				'import_file_name'           => esc_html__( 'Demo Eight', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-eight/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-eight/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-eight/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-eight/screenshot.jpg',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=cream-blog-pro-writer',
			),
		);

		return $demo_urls;
	}

	public static function after_import( $selected_import ) {

	    $import_file_name = isset( $selected_import['import_file_name'] ) ? $selected_import['import_file_name'] : '';

	    if( !empty( $import_file_name ) ) {

	    	if( $import_file_name == 'Demo One' || $import_file_name == 'Demo Two' || $import_file_name == 'Demo Three' ) {

	    		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 

			    set_theme_mod(
			     	'nav_menu_locations', 
			     	array( 
			     		'menu-1' => $primary_menu->term_id, 
			     	)
			    );
	    	} else if( $import_file_name == 'Demo Four' ) {

	    		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 

			    set_theme_mod(
			     	'nav_menu_locations', 
			     	array( 
			     		'menu-1' => $primary_menu->term_id, 
			     	)
			    );

	    		$american_cuisine_category	= get_term_by( 'slug', 'american-cuisine', 'category' );
			    $breakfast_category	= get_term_by( 'slug', 'breakfast', 'category' );

			   	$banner_cats = array( $american_cuisine_category->term_id, $breakfast_category->term_id );

			   	set_theme_mod( 'cream_blog_pro_banner_categories', $banner_cats );
	    	} else if( $import_file_name == 'Demo Five' ) {

	    		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 
	    		$header_menu 	= get_term_by('name', 'Top Menu', 'nav_menu');

			    set_theme_mod(
			     	'nav_menu_locations', 
			     	array( 
			     		'menu-1' => $primary_menu->term_id, 
			     		'menu-2' => $header_menu->term_id,
			     	)
			    );

	    		$diy_category	= get_term_by( 'slug', 'diy', 'category' );
			    $fashion_category	= get_term_by( 'slug', 'fashion', 'category' );

			   	$banner_cats = array( $diy_category->term_id, $fashion_category->term_id );

			   	set_theme_mod( 'cream_blog_pro_banner_categories', $banner_cats );
	    	} else if( $import_file_name == 'Demo Six' ) {

	    		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 
	    		$header_menu 	= get_term_by('name', 'Top Menu', 'nav_menu');

			    set_theme_mod(
			     	'nav_menu_locations', 
			     	array( 
			     		'menu-1' => $primary_menu->term_id, 
			     		'menu-2' => $header_menu->term_id,
			     	)
			    );

	    		$basketball_category	= get_term_by( 'slug', 'basketball', 'category' );
			    $football_category	= get_term_by( 'slug', 'football', 'category' );
			    $golf_category	= get_term_by( 'slug', 'golf', 'category' );

			   	$banner_cats = array( $basketball_category->term_id, $football_category->term_id, $golf_category->term_id );

			   	set_theme_mod( 'cream_blog_pro_banner_categories', $banner_cats );
	    	} else if( $import_file_name == 'Demo Seven' ) {

	    		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 

			    set_theme_mod(
			     	'nav_menu_locations', 
			     	array( 
			     		'menu-1' => $primary_menu->term_id, 
			     	)
			    );

	    		$diy_category	= get_term_by( 'slug', 'diy', 'category' );
			    $photography_category	= get_term_by( 'slug', 'photography', 'category' );

			   	$banner_cats = array( $diy_category->term_id, $photography_category->term_id );

			   	set_theme_mod( 'cream_blog_pro_banner_categories', $banner_cats );
	    	} else {

	    		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 

			    set_theme_mod(
			     	'nav_menu_locations', 
			     	array( 
			     		'menu-1' => $primary_menu->term_id, 
			     	)
			    );
	    	}
	    }    

		update_option( 'themebeez_themes', $installed_demos );
	}
}