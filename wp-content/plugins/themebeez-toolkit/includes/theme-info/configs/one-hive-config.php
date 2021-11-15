<?php
/**
 * One Hive Theme Info Configurations
 *
 * @package Themebeez_Toolkit
 */

if( ! function_exists( 'themebeez_toolkit_one_hive_config'  ) ) {

	function themebeez_toolkit_one_hive_config() {

		$config = array(
			'menu_name' => esc_html__( 'One Hive Info', 'themebeez-toolkit' ),
			'page_name' => esc_html__( 'One Hive Info', 'themebeez-toolkit' ),

			/* translators: theme version */
			'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'themebeez-toolkit' ), 'One Hive' ),

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
					'url'  => 'https://themebeez.com/themes/one-hive/',
					),
				'demo_url' => array(
					'text' => esc_html__( 'View Demo','themebeez-toolkit' ),
					'url'  => 'https://themebeez.com/demos/one-hive/',
					),
				'documentation_url' => array(
					'text'   => esc_html__( 'View Documentation','themebeez-toolkit' ),
					'url'    => 'https://themebeez.com/docs/one-hive-documentation/',
					),
				'pro_url' => array(
					'text' => esc_html__( 'Upgrade To Pro Theme','themebeez-toolkit' ),
					'url'  => 'https://themebeez.com/themes/one-hive-pro/',
					'button' => 'primary',
					),
				),

			// Tabs.
			'tabs' => array(
				'getting_started'     => esc_html__( 'Getting Started', 'themebeez-toolkit' ),
				'recommended_actions' => esc_html__( 'Recommended Actions', 'themebeez-toolkit' ),
				'demo_content'        => esc_html__( 'Demo Content', 'themebeez-toolkit' ),
				'support'             => esc_html__( 'Support', 'themebeez-toolkit' ),
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
					'button_link'         => 'https://themebeez.com/docs/one-hive-documentation/',
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
					'title'        			=> esc_html__( 'Pro Version', 'themebeez-toolkit' ),
					'text'         			=> esc_html__( 'Upgrade to pro version for additional features and options.', 'themebeez-toolkit' ),
					'button_label' 			=> esc_html__( 'View Pro Version', 'themebeez-toolkit' ),
					'button_link'  			=> 'https://themebeez.com/themes/one-hive-pro/',
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
						'description' => esc_html__( 'Please install WooCommerce plugin.', 'themebeez-toolkit' ),
						'check'       => class_exists( 'WooCommerce' ),
						'plugin_slug' => 'woocommerce',
						'id'          => 'woocommerce',
					),
					'one-click-demo-import' => array(
						'title'       => esc_html__( 'One Click Demo Import', 'themebeez-toolkit' ),
						'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'themebeez-toolkit' ),
						'check'       => class_exists( 'OCDI_Plugin' ),
						'plugin_slug' => 'one-click-demo-import',
						'id'          => 'one-click-demo-import',
					),
				),
			),

			// Demo content.
			'demo_content' => array(
				'description' => sprintf( esc_html__( 'Install %1$s plugin from recommendeded action tab. Demo datas are bundled with-in themebeez toolkit. If you have installed One click demo import plugin from recommendeded action tab already go to Dashboard > Appearance > Import demo data.', 'themebeez-toolkit' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'themebeez-toolkit' ) . '</a>' ),
			),

			// Support.
			'support_content' => array(
				'first' => array(
					'title'        => esc_html__( 'Contact Support', 'themebeez-toolkit' ),
					'icon'         => 'dashicons dashicons-sos',
					'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'themebeez-toolkit' ),
					'button_label' => esc_html__( 'Contact Support', 'themebeez-toolkit' ),
					'button_link'  => 'https://themebeez.com/support-forum/',
					'is_button'    => true,
					'is_new_tab'   => true,
				),
				'second' => array(
					'title'        => esc_html__( 'Theme Documentation', 'themebeez-toolkit' ),
					'icon'         => 'dashicons dashicons-book-alt',
					'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'themebeez-toolkit' ),
					'button_label' => esc_html__( 'View Documentation', 'themebeez-toolkit' ),
					'button_link'  => 'https://themebeez.com/docs/one-hive-documentation/',
					'is_button'    => true,
					'is_new_tab'   => true,
				),
				'third' => array(
					'title'        => esc_html__( 'Pro Version', 'themebeez-toolkit' ),
					'icon'         => 'dashicons dashicons-products',
					'icon'         => 'dashicons dashicons-star-filled',
					'text'         => esc_html__( 'Upgrade to pro version for additional features and options.', 'themebeez-toolkit' ),
					'button_label' => esc_html__( 'View Pro Version', 'themebeez-toolkit' ),
					'button_link'  => 'https://themebeez.com/themes/one-hive/',
					'is_button'    => true,
					'is_new_tab'   => true,
				),
				'fourth' => array(
					'title'        => esc_html__( 'Youtube Video Tutorials', 'themebeez-toolkit' ),
					'icon'         => 'dashicons dashicons-video-alt3',
					'text'         => esc_html__( 'Please check our youtube channel for video instructions of themebeez-toolkit setup and customization.', 'themebeez-toolkit' ),
					'button_label' => esc_html__( 'Video Tutorials', 'themebeez-toolkit' ),
					'button_link'  => 'https://www.youtube.com/channel/UC3oIQqb6U-uQlxs2MDnP6yg',
					'is_button'    => true,
					'is_new_tab'   => true,
				),
				'fifth' => array(
					'title'        => esc_html__( 'Customization Request', 'themebeez-toolkit' ),
					'icon'         => 'dashicons dashicons-admin-tools',
					'text'         => esc_html__( 'We have dedicated team members for theme customization. Feel free to contact us any time if you need any customization service.', 'themebeez-toolkit' ),
					'button_label' => esc_html__( 'Customization Request', 'themebeez-toolkit' ),
					'button_link'  => 'https://themebeez.com/support/',
					'is_button'    => true,
					'is_new_tab'   => true,
				),
				'sixth' => array(
					'title'        => esc_html__( 'Child Theme', 'themebeez-toolkit' ),
					'icon'         => 'dashicons dashicons-admin-customizer',
					'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'themebeez-toolkit' ),
					'button_label' => esc_html__( 'About child theme', 'themebeez-toolkit' ),
					'button_link'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
					'is_button'    => true,
					'is_new_tab'   => true,
				),
			),
		);

		Themebeez_Toolkit_Theme_Info::init( $config );
	}
}

add_action( 'after_setup_theme', 'themebeez_toolkit_one_hive_config' );

