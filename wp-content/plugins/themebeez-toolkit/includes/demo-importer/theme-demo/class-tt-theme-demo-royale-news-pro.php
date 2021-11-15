<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TT_Theme_Demo_Royale_News_Pro extends TT_Theme_Demo {

	public static function import_files() {

		$server_url = 'https://themebeez.com/demo-contents/royale-news-pro/';

		$demo_urls  = array(
			array(
				'import_file_name'           => __( 'Demo One', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-one/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-one/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-one/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-one/screenshot.png',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=royale-news-pro',
			),
			array(
				'import_file_name'           => __( 'Demo Two', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-two/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-two/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-two/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-two/screenshot.png',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=royale-news-pro-ii',
			),
			array(
				'import_file_name'           => __( 'Demo Three', 'themebeez-toolkit' ),
				'import_file_url'            => $server_url . 'demo-three/contents.xml',
				'import_widget_file_url'     => $server_url . 'demo-three/widgets.wie',
				'import_customizer_file_url' => $server_url . 'demo-three/customizer.dat',
				'import_preview_image_url'   => $server_url . 'demo-three/screenshot.png',
				'demo_url'                   => 'https://themebeez.com/demos/?theme=royale-news-pro-iii',
			),
		);

		return $demo_urls;
	}

	public static function after_import( $selected_import ) {

	    $import_file_name = isset( $selected_import['import_file_name'] ) ? $selected_import['import_file_name'] : '';

	    if( !empty( $import_file_name ) ) {

	    	if( $import_file_name == 'Demo One' ) {

	    		$fashion_category = get_term_by( 'slug', 'fashion', 'category' );
	    		$fashion_category_id = $fashion_category->term_id;

	    		$business_category = get_term_by( 'slug', 'business', 'category' );
	    		$business_category_id = $business_category->term_id;

	    		$sports_category = get_term_by( 'slug', 'sports', 'category' );
	    		$sports_category_id = $sports_category->term_id;

	    		$events_category = get_term_by( 'slug', 'events', 'category' );
	    		$events_category_id = $events_category->term_id;

	    		$politics_category = get_term_by( 'slug', 'politics', 'category' );
	    		$politics_category_id = $politics_category->term_id;

	    		$technology_category = get_term_by( 'slug', 'technology', 'category' );
	    		$technology_category_id = $technology_category->term_id;

	    		$wildlife_category = get_term_by( 'slug', 'wildlife', 'category' );
	    		$wildlife_category_id = $wildlife_category->term_id;

	    		$sidebar_slider_widget = get_option('widget_sidebar-widget-four');
	    		$sidebar_slider_widget[1]['cat'] = absint( $events_category_id );
	    		update_option( 'widget_sidebar-widget-four', $sidebar_slider_widget );

	    		$main_highlight = get_option('widget_royale-news-pro-main-highlight-two');
			    $main_highlight[1]['cat_1'] = absint( $fashion_category_id );
			    $main_highlight[1]['cat_2'] = absint( $business_category_id );
			    $main_highlight[1]['cat_3'] = absint( $politics_category_id );
			    update_option( 'widget_royale-news-pro-main-highlight-two', $main_highlight );

			    $slider_highlight = get_option( 'widget_royale-news-pro-slider-highlight_two' );
			    $slider_highlight[1]['cat'] = absint( $events_category_id );
			    update_option( 'widget_royale-news-pro-slider-highlight_two', $slider_highlight );

			    $layout_one_widget = get_option( 'widget_news-layout-widget-one' );
			    $layout_one_widget[1]['cat'] = absint( $politics_category_id );
			    update_option( 'widget_news-layout-widget-one', $layout_one_widget );

			    $layout_two_widget = get_option( 'widget_news-layout-widget-two' );
			    $layout_two_widget[1]['cat'] = absint( $business_category_id );
			    $layout_two_widget[2]['cat'] = absint( $sports_category_id );
			    update_option( 'widget_news-layout-widget-two', $layout_two_widget );

			    $layout_three_widget = get_option( 'widget_news-layout-widget-three' );
			    $layout_three_widget[1]['cat'] = absint( $technology_category_id );
			    update_option( 'widget_news-layout-widget-three', $layout_three_widget );

			    $layout_four_widget = get_option( 'widget_news-layout-widget-four' );
			    $layout_four_widget[1]['cat'] = absint( $fashion_category_id );
			    update_option( 'widget_news-layout-widget-four', $layout_four_widget );

			    $layout_five_widget = get_option( 'widget_royale-news-pro-bottom-news-widget-two' );
			    $layout_five_widget[1]['cat'][0] = $fashion_category_id;
			    $layout_five_widget[1]['cat'][1] = $wildlife_category_id;
			    update_option( 'widget_royale-news-pro-bottom-news-widget-two', $layout_five_widget );

			    $layout_six_widget = get_option( 'widget_royale-news-pro-bottom-news-widget-one' );
			    $layout_six_widget[1]['cat'][0] = $business_category_id;
			    $layout_six_widget[1]['cat'][1] = $events_category_id;
			    $layout_six_widget[1]['cat'][2] = $food_category_id;
			    update_option( 'widget_royale-news-pro-bottom-news-widget-one', $layout_six_widget );

			    $primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu'); 
				$social_menu 	= get_term_by('name', 'Social Menu', 'nav_menu');  
			    $footer_menu 	= get_term_by('name', 'Footer Menu', 'nav_menu');

			    set_theme_mod(
			     	'nav_menu_locations', 
			     	array( 
			     		'primary' => $primary_menu->term_id, 
			     		'social' => $social_menu->term_id,
			     		'footer' => $footer_menu->term_id,
			     	)
			    );

	    	} else if( $import_file_name == 'Demo Two' ) {

	    		$fashion_category = get_term_by( 'slug', 'fashion', 'category' );
	    		$fashion_category_id = $fashion_category->term_id;

	    		$business_category = get_term_by( 'slug', 'business', 'category' );
	    		$business_category_id = $business_category->term_id;

	    		$war_category = get_term_by( 'slug', 'war', 'category' );
	    		$war_category_id = $war_category->term_id;

	    		$sports_category = get_term_by( 'slug', 'sports', 'category' );
	    		$sports_category_id = $sports_category->term_id;

	    		$politics_category = get_term_by( 'slug', 'politics', 'category' );
	    		$politics_category_id = $politics_category->term_id;

	    		$technology_category = get_term_by( 'slug', 'technology', 'category' );
	    		$technology_category_id = $technology_category->term_id;

	    		$main_highlight = get_option('widget_royale-news-pro-slider-highlight_one');
			    $main_highlight[1]['cat'] = absint( $politics_category_id );
			    update_option( 'widget_royale-news-pro-slider-highlight_one', $main_highlight );

			    $slider_highlight = get_option( 'widget_royale-news-pro-slider-highlight_two' );
			    $slider_highlight[1]['cat'] = absint( $war_category_id );
			    update_option( 'widget_royale-news-pro-slider-highlight_two', $slider_highlight );

			    $layout_two_widget = get_option( 'widget_news-layout-widget-two' );
			    $layout_two_widget[1]['cat'] = absint( $politics_category_id );
			    $layout_two_widget[2]['cat'] = absint( $sports_category_id );
			    update_option( 'widget_news-layout-widget-two', $layout_two_widget );

			    $layout_three_widget = get_option( 'widget_news-layout-widget-three' );
			    $layout_three_widget[1]['cat'] = absint( $fashion_category_id );
			    update_option( 'widget_news-layout-widget-three', $layout_three_widget );

			    $layout_four_widget = get_option( 'widget_news-layout-widget-four' );
			    $layout_four_widget[1]['cat'] = absint( $business_category_id );
			    update_option( 'widget_news-layout-widget-four', $layout_four_widget );

			    $layout_five_widget = get_option( 'widget_royale-news-pro-bottom-news-widget-two' );
			    $layout_five_widget[1]['cat'][0] = $fashion_category_id;
			    $layout_five_widget[1]['cat'][1] = $politics_category_id;
			    $layout_five_widget[1]['cat'][2] = $war_category_id;
			    update_option( 'widget_royale-news-pro-bottom-news-widget-two', $layout_five_widget );

			    $layout_six_widget = get_option( 'widget_royale-news-pro-bottom-news-widget-one' );
			    $layout_six_widget[1]['cat'][0] = $technology_category_id;
			    update_option( 'widget_royale-news-pro-bottom-news-widget-one', $layout_six_widget );

			    $primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu');  
			    $footer_menu 	= get_term_by('name', 'Footer Menu', 'nav_menu');

			    set_theme_mod(
			     	'nav_menu_locations', 
			     	array( 
			     		'primary' => $primary_menu->term_id, 
			     		'footer' => $footer_menu->term_id,
			     	)
			    );
	    	} else {

	    		$fashion_category = get_term_by( 'slug', 'fashion', 'category' );
	    		$fashion_category_id = $fashion_category->term_id;

	    		$gossip_category = get_term_by( 'slug', 'gossip', 'category' );
	    		$gossip_category_id = $gossip_category->term_id;

	    		$beauty_category = get_term_by( 'slug', 'beauty', 'category' );
	    		$beauty_category_id = $beauty_category->term_id;

	    		$lifestyle_category = get_term_by( 'slug', 'lifestyle', 'category' );
	    		$lifestyle_category_id = $lifestyle_category->term_id;

	    		$photography_category = get_term_by( 'slug', 'photography', 'category' );
	    		$photography_category_id = $photography_category->term_id;

	    		$food_drink_category = get_term_by( 'slug', 'food-drink', 'category' );
	    		$food_drink_category_id = $food_drink_category->term_id;

	    		$travel_living_category = get_term_by( 'slug', 'travel-living', 'category' );
	    		$travel_living_category_id = $travel_living_category->term_id;

	    		$sidebar_slider_widget = get_option('widget_sidebar-widget-four');
	    		$sidebar_slider_widget[1]['cat'] = absint( $gossip_category_id );
	    		update_option( 'widget_sidebar-widget-four', $sidebar_slider_widget );

	    		$main_highlight = get_option('widget_royale-news-pro-main-highlight-two');
			    $main_highlight[1]['cat_1'] = absint( $fashion_category_id );
			    $main_highlight[1]['cat_2'] = absint( $beauty_category_id );
			    $main_highlight[1]['cat_3'] = absint( $lifestyle_category_id );
			    update_option( 'widget_royale-news-pro-main-highlight-two', $main_highlight );

			    $slider_highlight = get_option( 'widget_royale-news-pro-slider-highlight_two' );
			    $slider_highlight[1]['cat'] = absint( $lifestyle_category_id );
			    update_option( 'widget_royale-news-pro-slider-highlight_two', $slider_highlight );

	    		$layout_one_widget = get_option( 'widget_news-layout-widget-one' );
			    $layout_one_widget[1]['cat'] = absint( $food_drink_category_id );
			    update_option( 'widget_news-layout-widget-one', $layout_one_widget );

	    		$layout_two_widget = get_option( 'widget_news-layout-widget-two' );
			    $layout_two_widget[1]['cat'] = absint( $travel_living_category_id );
			    update_option( 'widget_news-layout-widget-two', $layout_two_widget );

			    $layout_three_widget = get_option( 'widget_news-layout-widget-three' );
			    $layout_three_widget[1]['cat'] = absint( $photography_category_id );
			    update_option( 'widget_news-layout-widget-three', $layout_three_widget );

	    		$bottom_one_widget = get_option( 'widget_royale-news-pro-bottom-news-widget-one' );
			    $bottom_one_widget[1]['cat'][0] = $beauty_category_id;
			    update_option( 'widget_royale-news-pro-bottom-news-widget-one', $bottom_one_widget );	

			    $bottom_two_widget = get_option( 'widget_royale-news-pro-bottom-news-widget-two' );
			    $bottom_two_widget[1]['cat'][0] = $fashion_category_id;
			    update_option( 'widget_royale-news-pro-bottom-news-widget-two', $bottom_two_widget );

			    $primary_menu 	= get_term_by('name', 'Main Menu', 'nav_menu');  
			    $footer_menu 	= get_term_by('name', 'Footer Menu', 'nav_menu');

			    set_theme_mod(
			     	'nav_menu_locations', 
			     	array( 
			     		'primary' => $primary_menu->term_id, 
			     		'footer' => $footer_menu->term_id,
			     	)
			    );	    		
	    	}
	    }

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home' );
		$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
		update_option( 'themebeez_themes', $installed_demos );
	}
}