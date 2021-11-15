<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( ! class_exists( 'TT_Theme_Demo' ) ) {

	abstract class TT_Theme_Demo {

		public static function import_files() {

			$demo_urls = array(
				'import_file_name'           => '',
				'import_file_url'            => '',
				'import_widget_file_url'     => '',
				'import_customizer_file_url' => '',
				'import_preview_image_url'   => '',
				'demo_url'                   => '',
				'import_notice'              => '',
			);

			return $demo_urls;
		}

		public static function before_import() {

		}

		public static function after_import($selected_import) {

		}
	}
}