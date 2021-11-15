<?php

if ( ! class_exists( 'Simple_Mega_Menu_Walker_Filter' ) ) :
	/**
	* Menu Item Custom Fields Loader
	*/
	class Simple_Mega_Menu_Walker_Filter {

		/**
		* Add filter
		*
		* @wp_hook action wp_loaded
		*/
		public function __construct() {

			add_filter( 'wp_edit_nav_menu_walker', array( $this, '_filter_walker' ), 99 );

			$this->dependencies();
		}

		public function dependencies() {

			require_once plugin_dir_path( __FILE__ ) . 'class-simple-mega-menu-walker-nav-menu-edit.php';

			require_once plugin_dir_path( __FILE__ ) . 'class-simple-mega-menu-nav-walker-edit.php';
		}


		/**
		* Replace default menu editor walker with ours
		*
		* We don't actually replace the default walker. We're still using it and
		* only injecting some HTMLs.
		*
		* @since   0.1.0
		* @access  private
		* @wp_hook filter wp_edit_nav_menu_walker
		* @param   string $walker Walker class name
		* @return  string Walker class name
		*/
		public function _filter_walker( $walker ) {

			$navwalker = 'Simple_Mega_Menu_Nav_Walker_Edit';

			if ( class_exists( $navwalker ) ) {

				return $navwalker;
			}

			return $walker;
		}
	}
endif;


$SimpleMegaMenuWalkerFilterInit = new Simple_Mega_Menu_Walker_Filter();

// Uncomment the following line to test this plugin
require_once plugin_dir_path( __FILE__ ) . 'class-simple-mega-menu-fields.php';