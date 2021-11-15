<?php
/**
 * Fascinate Pro Theme Info Configurations
 *
 * @package Themebeez_Toolkit
 */

if( ! function_exists( 'themebeez_toolkit_fascinate_pro_config'  ) ) {

	function themebeez_toolkit_fascinate_pro_config() {

		$config = array(
			'menu_name' => esc_html__( 'Fascinate Pro Info', 'themebeez-toolkit' ),
			'page_name' => esc_html__( 'Fascinate Pro Info', 'themebeez-toolkit' ),

			/* translators: theme version */
			'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'themebeez-toolkit' ), 'Fascinate Pro' ),

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
					'url'  => 'https://themebeez.com/themes/fascinate-pro/',
					),
				'demo_url' => array(
					'text' => esc_html__( 'View Demo','themebeez-toolkit' ),
					'url'  => 'https://themebeez.com/demos/?theme=fascinate-pro',
					),
				'documentation_url' => array(
					'text'   => esc_html__( 'View Documentation','themebeez-toolkit' ),
					'url'    => 'https://themebeez.com/docs/fascinate-pro-theme-documentation/',
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
					'button_link'         => 'https://themebeez.com/docs/fscinate-pro-theme-documentation/',
					'is_button'           => true,
					'recommended_actions' => false,
					'is_new_tab'          => true,
				),
				array(
					'title'               => esc_html__( 'Recommended Actions', 'themebeez-toolkit' ),
					'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'themebeez-toolkit' ),
					'button_label'        => esc_html__( 'Check recommended actions', 'themebeez-toolkit' ),
					'button_link'         => esc_url( admin_url( 'themes.php?page=themebeez-toolkit-about&tab=recommended_actions' ) ),
					'is_button'           => true,
					'recommended_actions' => false,
					'is_new_tab'          => false,
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
				),
			),

			// Recommended actions.
			'recommended_actions' => array(
				'content' => array(
					'woocommerce' => array(
						'title'       => esc_html__( 'WooCommerce', 'themebeez-toolkit' ),
						'description' => esc_html__( 'Installing Woocommerce plugin help you set your online shop or store.', 'themebeez-toolkit' ),
						'check'       => class_exists( 'WooCommerce' ),
						'plugin_slug' => 'woocommerce',
						'id'          => 'woocommerce',
					),
					'mailchimp-for-wp' => array(
						'title'       => esc_html__( 'MailChimp for WordPress', 'themebeez-toolkit' ),
						'description' => esc_html__( 'Installing MailChimp for WordPress plugin help you create newsletter subscription.', 'themebeez-toolkit' ),
						'check'       => class_exists( 'MC4WP_MailChimp' ),
						'plugin_slug' => 'mailchimp-for-wp',
						'id'          => 'mailchimp-for-wp',
					),
					'contact-from-7' => array(
						'title'       => esc_html__( 'Contact Form 7', 'themebeez-toolkit' ),
						'description' => esc_html__( 'Installing Contact Form 7 plugin lets you create contact forms.', 'themebeez-toolkit' ),
						'check'       => class_exists( 'WPCF7' ),
						'plugin_slug' => 'contact-form-7',
						'id'          => 'contact-form-7',
					),
					'regenerate-thumbnails' => array(
						'title'       => esc_html__( 'Regenerate Thumbnails', 'themebeez-toolkit' ),
						'description' => esc_html__( 'If you are switching theme, use this plugin to generate all the thumbnails of sizes defined in the theme.', 'themebeez-toolkit' ),
						'check'       => class_exists( 'RegenerateThumbnails' ),
						'plugin_slug' => 'regenerate-thumbnails',
						'id'          => 'regenerate-thumbnails',
					),
				),
			),
		);

		Themebeez_Toolkit_Theme_Info::init( $config );
	}
}

add_action( 'after_setup_theme', 'themebeez_toolkit_fascinate_pro_config' );