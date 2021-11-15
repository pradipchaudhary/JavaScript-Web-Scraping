<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TT_Theme_Demo_Royale_News_Lite extends TT_Theme_Demo {

	public static function import_files() {

		$server_url = 'https://themebeez.com/demo-contents/royale-news-lite/';

		$demo_urls  = array(
			array(
				'import_file_name'           => __( 'Demo One', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'contents.xml',
				'import_widget_file_url'     => $server_url . 'widgets.wie',
				'import_customizer_file_url' => $server_url . 'customizer.dat',
				'import_preview_image_url'   => $server_url . 'screenshot.png',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=royale-news-lite',
			),
		);

		return $demo_urls;
	}

	public static function after_import( $selected_import ) {

		$primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 
	    $footer_menu 	= get_term_by('name', 'Footer Menu', 'nav_menu');

	    set_theme_mod(
	     	'nav_menu_locations', 
	     	array( 
	     		'primary' => $primary_menu->term_id,
	     		'footer' => $footer_menu->term_id,
	     	)
	    );

	    $beauty_category = get_term_by( 'slug', 'beauty', 'category' );
	    $beauty_category_id = $beauty_category->term_id;

	    $lifestyle_category = get_term_by( 'slug', 'lifestyle', 'category' );
	    $lifestyle_category_id = $lifestyle_category->term_id;

	    $travel_category = get_term_by( 'slug', 'travel', 'category' );
	    $travel_category_id = $travel_category->term_id;

	    $events_category = get_term_by( 'slug', 'events', 'category' );
	    $events_category_id = $events_category->term_id;

	    $fashion_category = get_term_by( 'slug', 'fashion', 'category' );
	    $fashion_category_id = $fashion_category->term_id;

	    $events_category = get_term_by( 'slug', 'fashion', 'category' );
	    $events_category_id = $events_category->term_id;

	    $photography_category = get_term_by( 'slug', 'photography', 'category' );
	    $photography_category_id = $photography_category->term_id;


	    $banner_widget = get_option('widget_royale-news-main-highlight-two');

	    $banner_widget[1]['cat_1'] = absint( $fashion_category_id );
	    $banner_widget[1]['cat_2'] = absint( $beauty_category_id );
	    $banner_widget[1]['cat_3'] = absint( $lifestyle_category_id );

	    update_option( 'widget_royale-news-main-highlight-two', $banner_widget );


	    $first_widget = get_option( 'widget_royale-news-news-layout-widget-one' );

	    $first_widget[1]['cat'] = absint( $travel_category_id );

	    update_option( 'widget_royale-news-news-layout-widget-one', $first_widget );


	    $second_widget = get_option( 'widget_royale-news-news-layout-widget-two' );

	    $second_widget[1]['cat'] = absint( $events_category_id );

	    update_option( 'widget_royale-news-news-layout-widget-two', $second_widget );

	    $third_widget = get_option( 'widget_royale-news-bottom-news-widget-one' );

	    $third_widget[1]['cat'] = array( absint( $lifestyle_category_id ) ); 

	    update_option( 'widget_royale-news-bottom-news-widget-one', $third_widget );

	    $fourth_widget = get_option( 'widget_royale-news-bottom-news-widget-two' );

	    $fourth_widget[1]['cat'] = array( absint( $fashion_category_id ) );

	    update_option( 'widget_royale-news-bottom-news-widget-two', $fourth_widget );

	    $fifth_widget = get_option( 'widget_royale-news-sidebar-widget-one' );

	    $fifth_widget[1]['cat'] = array( absint( $photography_category_id ) );

	    update_option( 'widget_royale-news-sidebar-widget-one', $fifth_widget );

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home' );
		$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
		update_option( 'themebeez_themes', $installed_demos );
	}
}