<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TT_Autoloader {

	/**
	 * Path to the includes directory.
	 *
	 * @var string
	 */
	private $include_path = '';

	/**
	 * The Constructor.
	 */
	public function __construct() {

		if ( function_exists( "__autoload" ) ) {
			
			spl_autoload_register( "__autoload" );
		}

		spl_autoload_register( array( $this, 'autoload' ) );

		$this->include_path = untrailingslashit( plugin_dir_path( THEMEBEEZTOOLKIT_PLUGIN_FILE ) ) . '/includes/demo-importer/';
	}

	/**
	 * Take a class name and turn it into a file name.
	 *
	 * @param  string $class
	 *
	 * @return string
	 */
	private function get_file_name_from_class( $class ) {

		return 'class-' . str_replace( '_', '-', $class ) . '.php';
	}

	/**
	 * Include a class file.
	 *
	 * @param  string $path
	 *
	 * @return bool successful or not
	 */
	private function load_file( $path ) {

		if ( $path && is_readable( $path ) ) {

			include_once( $path );

			return true;
		}

		return false;
	}

	/**
	 * Auto-load TT classes on demand to reduce memory consumption.
	 *
	 * @param string $class
	 */
	public function autoload( $class ) {

		$class = strtolower( $class );

		if ( 0 !== strpos( $class, 'tt_' ) ) {
			return;
		}

		$file = $this->get_file_name_from_class( $class );

		$path = '';

		if ( 0 === strpos( $class, 'tt_theme_demo' ) ) {

			$path = $this->include_path . 'theme-demo/';
		} else if ( 0 === strpos( $class, 'tt_admin' ) ) {

			$path = $this->include_path . 'admin/';
		} else if ( 0 === strpos( $class, 'tt_importer' ) ) {

			$path = $this->include_path . 'importer/';
		} else {

			$path = $this->include_path;
		}

		if ( empty( $path ) || ! $this->load_file( $path . $file ) ) {

			$this->load_file( $this->include_path . $file );
		}
	}
}

new TT_Autoloader();
