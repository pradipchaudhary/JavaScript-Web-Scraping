<?php
/**
 * StyleBlog Plus Theme Info Configurations
 *
 * @package Themebeez_Toolkit
 */

if( ! function_exists( 'themebeez_toolkit_styleblog_plus_config'  ) ) {

	function themebeez_toolkit_styleblog_plus_config() {

		$config = array(
			'menu_name' => esc_html__( 'StyleBlog Plus Info', 'themebeez-toolkit' ),
			'page_name' => esc_html__( 'StyleBlog Plus Info', 'themebeez-toolkit' ),

			/* translators: theme version */
			'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'themebeez-toolkit' ), 'StyleBlog Plus' ),

			'notification' => '',

			/* translators: 1: theme name */
			'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'themebeez-toolkit' ), 'themebeez-toolkit' ),

			// Quick links.
			'quick_links' => array(
				'demo_import_url' => array(
					'text' => esc_html__( 'Import Demo','themebeez-toolkit' ),
					'url'  => esc_url( admin_url( 'themes.php?page=themebeez-demo-importer' ) ),
					'button' => 'primary',
					),
				'theme_url' => array(
					'text' => esc_html__( 'Theme Details','themebeez-toolkit' ),
					'url'  => 'https://themebeez.com/themes/style-blog/',
					),
				'demo_url' => array(
					'text' => esc_html__( 'View Demo','themebeez-toolkit' ),
					'url'  => 'https://themebeez.com/demos/?theme=style-blog-pro',
					),
				'documentation_url' => array(
					'text'   => esc_html__( 'View Documentation','themebeez-toolkit' ),
					'url'    => 'https://themebeez.com/docs/style-blog-documentation/',
					),
			),

			// Tabs.
			'tabs' => array(
				'getting_started'     => esc_html__( 'Getting Started', 'themebeez-toolkit' ),
			),

			// Getting started.
			'getting_started' => array(
				array(
					'title'               => esc_html__( 'Import Demo Content', 'themebeez-toolkit' ),
					'text'                => esc_html__( 'Setup theme easily by importing demo contents.', 'themebeez-toolkit' ),
					'button_label'        => esc_html__( 'Import Demo', 'themebeez-toolkit' ),
					'button_link'         => esc_url( admin_url( 'themes.php?page=themebeez-demo-importer' ) ),
					'is_button'           => true,
					'recommended_actions' => false,
					'is_new_tab'          => false,
				),
				array(
					'title'               => esc_html__( 'Theme Documentation', 'themebeez-toolkit' ),
					'text'                => esc_html__( 'Find step by step instructions with video documentation to setup theme easily.', 'themebeez-toolkit' ),
					'button_label'        => esc_html__( 'View documentation', 'themebeez-toolkit' ),
					'button_link'         => 'https://themebeez.com/docs/style-blog-documentation/',
					'is_button'           => true,
					'recommended_actions' => false,
					'is_new_tab'          => true,
				),
				array(
					'title'               => esc_html__( 'Customize Everything', 'themebeez-toolkit' ),
					'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'themebeez-toolkit' ),
					'button_label'        => esc_html__( 'Go to Customizer', 'themebeez-toolkit' ),
					'button_link'         => esc_url( wp_customize_url() ),
					'is_button'           => true,
					'recommended_actions' => false,
					'is_new_tab'          => false,
				),
				array(
					'title'        			=> esc_html__( 'Youtube Video Tutorials', 'themebeez-toolkit' ),
					'text'         			=> esc_html__( 'Please check our youtube channel for video instructions of themebeez-toolkit setup and customization.', 'themebeez-toolkit' ),
					'button_label' 			=> esc_html__( 'Video Tutorials', 'themebeez-toolkit' ),
					'button_link'  			=> 'https://www.youtube.com/channel/UC3oIQqb6U-uQlxs2MDnP6yg',
					'is_button'    			=> true,
					'recommended_actions' 	=> false,
					'is_new_tab'   			=> true,
				),
				array(
					'title'        			=> esc_html__( 'Contact Support', 'themebeez-toolkit' ),
					'text'         			=> esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'themebeez-toolkit' ),
					'button_label' 			=> esc_html__( 'Contact Support', 'themebeez-toolkit' ),
					'button_link'  			=> 'https://themebeez.com/support-forum/',
					'is_button'    			=> true,
					'recommended_actions' 	=> false,
					'is_new_tab'   			=> true,
				)
			)
		);

		Themebeez_Toolkit_Theme_Info::init( $config );
	}
}

add_action( 'after_setup_theme', 'themebeez_toolkit_styleblog_plus_config' );

