<?php

/**
 * Themebeez Demo Importer class, so we don't have to worry about namespaces.
 */
class TT_Main {

	/**
	 * @var $instance the reference to *Singleton* instance of this class
	 */
	private static $instance;

	/**
	 * Private variables used throughout the plugin.
	 */
	private $importer, $plugin_page, $import_files, $logger, $log_file_path, $selected_index, $selected_import_files, $microtime, $frontend_error_messages, $ajax_call_number;


	/**
	 * Returns the *Singleton* instance of this class.
	 *
	 * @return TT_Main the *Singleton* instance.
	 */
	public static function getInstance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}


	/**
	 * Class construct function, to initiate the plugin.
	 * Protected constructor to prevent creating a new instance of the
	 * *Singleton* via the `new` operator from outside of this class.
	 */
	protected function __construct() {

		// Actions.
		add_action( 'admin_menu', array( $this, 'create_plugin_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'wp_ajax_TT_import_demo_data', array( $this, 'import_demo_data_ajax_callback' ) );
		add_action( 'after_setup_theme', array( $this, 'setup_plugin_with_filter_data' ) );
	}


	/**
	 * Creates the plugin page and a submenu item in WP Appearance menu.
	 */
	public function create_plugin_page() {
		$plugin_page_setup = apply_filters( 'themebeez-demo-importer/plugin_page_setup', 
			array(
				'parent_slug' => 'themes.php',
				'page_title'  => esc_html__( 'Themebeez Demo Importer', 'themebeez-toolkit' ),
				'menu_title'  => esc_html__( 'Import Demo Content', 'themebeez-toolkit' ),
				'capability'  => 'import',
				'menu_slug'   => 'themebeez-demo-importer',
			)
		);

		$this->plugin_page = add_submenu_page( $plugin_page_setup['parent_slug'], $plugin_page_setup['page_title'], $plugin_page_setup['menu_title'], $plugin_page_setup['capability'], $plugin_page_setup['menu_slug'], array(
			$this,
			'display_plugin_page'
		) );
	}


	/**
	 * Plugin page display.
	 */
	public function display_plugin_page() {
		?>
        <div class="TT__intro-notice notice notice-warning is-dismissible">
            <p><?php esc_html_e( 'Before you begin, make sure all the required plugins are activated.', 'themebeez-toolkit' ); ?></p>
        </div>
        <div class="wrap">
            <h1 class="wp-heading-inline"><?php esc_html_e( 'Themebeez Demo Importer', 'themebeez-toolkit' ); ?><span class="title-count theme-count"><?php echo esc_html( count( $this->import_files ) ); ?></span>
            </h1>
            <div class="TT_about-description">
            	<p><?php esc_html_e( 'It will allow you to quickly edit everything instead of creating content from scratch.', 'themebeez-toolkit' ); ?></p>
				<p><?php esc_html_e( 'When you import the data, the following things might happen:', 'themebeez-toolkit' ); ?></p>

				<ul>
					<li><?php esc_html_e( 'No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.', 'themebeez-toolkit' ); ?></li>
					<li><?php esc_html_e( 'Posts, pages, images, widgets, menus and other theme settings will get imported.', 'themebeez-toolkit' ); ?></li>
				</ul>
			</div>

			<hr>			
			<?php
			// Display warrning if PHP safe mode is enabled, since we wont be able to change the max_execution_time.
			if ( ini_get( 'safe_mode' ) ) {
				printf(
					esc_html__( '%sWarning: your server is using %sPHP safe mode%s. This means that you might experience server timeout errors.%s', 'themebeez-toolkit' ),
					'<div class="notice  notice-warning  is-dismissible"><p>',
					'<strong>',
					'</strong>',
					'</p></div>'
				);
			}

			if ( 0 < count( $this->import_files ) ) : ?>
                <div class="TT__multi-select-import">
                	<?php  if( count( $this->import_files ) == 1 ) : ?>
                		<h2><?php esc_html_e( 'Import demo content from the demo below:', 'themebeez-toolkit' ); ?></h2>
                	<?php else : ?>
                		<h2><?php esc_html_e( 'Select any one demo to import from the demos below:', 'themebeez-toolkit' ); ?></h2>
                	<?php endif; ?>
                    
                    <div class="theme-browser rendered">
                        <div class="themes wp-clearfix">
							<?php
							$installed_demos = get_option( 'themebeez_themes', array() );
							foreach ( $this->import_files as $index => $import_file ) :

								$is_installed = false;

								$import_file_name = isset( $import_file['import_file_name'] ) ? $import_file['import_file_name'] : '';

								if( ! $import_file_name ) {
									if ( in_array( $import_file_name, $installed_demos ) ) {
										$is_installed = true;
									}
								}
								?>
                                <div class="theme <?php echo $is_installed ? 'active' : '' ?>">
                                    <div class="theme-screenshot">
                                        <img src="<?php echo $import_file['import_preview_image_url'] ?>">
                                    </div>
                                    <a target="_blank" href="<?php echo $import_file['demo_url'] ?>"
                                       style="text-decoration: none;"
                                       class="more-details"><?php esc_html_e( 'Live Preview', 'themebeez-toolkit' ); ?></a>
                                    <div class="theme-author">
										<?php esc_html_e( 'By Themebeez', 'themebeez-toolkit' ); ?>
                                    </div>
                                    <div class="theme-id-container">
                                        <h2 class="theme-name">
                                        	<?php
											if ( $is_installed ) {

												echo '<b>Imported</b> : ';
											}
											echo $import_file['import_file_name'] 
											?>
										</h2>

                                        <div class="theme-actions">
											<?php
											$href = '';
											if ( $is_installed ) {

												$href = ' href="' . $import_file['demo_url'] . '" target="_blank"';
											}
											?>
                                            <a <?php echo $href; ?> class="button button-primary <?php echo ! $is_installed ? 'load-customize hide-if-no-customize jsthemebeezimport-data ' : ''; ?>" data-index="<?php echo $index; ?>">
												<?php
												if ( ! $is_installed ) {
													esc_html_e( 'Import Demo', 'themebeez-toolkit' );
												} else {
													esc_html_e( 'Live Preview', 'themebeez-toolkit' );
												}
												?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
							<?php endforeach; ?>
                        </div>
                    </div>
					<?php
					// Check if at least one preview image is defined, so we can prepare the structure for display.
					$preview_image_is_defined = false;
					
					foreach ( $this->import_files as $import_file ) {
						if ( isset( $import_file['import_preview_image_url'] ) ) {
							$preview_image_is_defined = true;
							break;
						}
					}
					
					$preview_image_is_defined = false;

					if ( $preview_image_is_defined ) :
						?>
                        <div class="TT__demo-import-preview-container">
                            <p><?php esc_html_e( 'Import preview:', 'themebeez-toolkit' ); ?></p>
                            <p class="TT__demo-import-preview-image-message jsthemebeezpreview-image-message">
                            	<?php
								if ( ! isset( $this->import_files[0]['import_preview_image_url'] ) ) {
									esc_html_e( 'No preview image defined for this import.', 'themebeez-toolkit' );
								} // Leave the img tag below and the p tag above available for later changes via JS.
								?>
							</p>

                            <img id="TT__demo-import-preview-image" class="jsthemebeezpreview-image"
                                 src="<?php echo ! empty( $this->import_files[0]['import_preview_image_url'] ) ? esc_url( $this->import_files[0]['import_preview_image_url'] ) : ''; ?>">
                        </div>
						<?php 
					endif; 
					?>
                </div>
                <p><?php esc_html_e( 'Click the Import Demo button once and wait. The import process may take few minutes.', 'themebeez-toolkit' ); ?></p>
                <p><?php esc_html_e( 'Sometimes of the elements may not be imported, due to some errors. So manually configure them.', 'themebeez-toolkit' ); ?></p>
				<?php 
			endif;
			?>
        </div>
		<?php
	}


	/**
	 * Enqueue admin scripts (JS and CSS)
	 *
	 * @param string $hook holds info on which admin page you are currently loading.
	 */
	public function admin_enqueue_scripts() {

		global $pagenow;

		if ( 'themes.php' == $pagenow && ( isset( $_GET['page'] ) && 'themebeez-demo-importer' == $_GET['page'] ) ) {
			
			wp_enqueue_script( 'themebeez-toolkit-main', TT()->plugin_url() . '/admin/js/themebeez-toolkit-main.js', array( 'jquery', 'jquery-form' ), THEMEBEEZTOOLKIT_VERSION, true );

			wp_localize_script( 'themebeez-toolkit-main', 'tt_admin_ajax',
				array(
					'ajax_url'     => admin_url( 'admin-ajax.php' ),
					'ajax_nonce'   => wp_create_nonce( 'tt-ajax-verification' ),
					'import_files' => $this->import_files,
					'texts'        => array(
						'missing_preview_image' => esc_html__( 'No preview image defined for this import.', 'themebeez-toolkit' ),
					),
				)
			);

			wp_enqueue_style( 'themebeez-toolkit-main', TT()->plugin_url() . '/admin/css/themebeez-toolkit-main.css', array(), THEMEBEEZTOOLKIT_VERSION );
		}
	}


	/**
	 * Main AJAX callback function for:
	 * 1. prepare import files (uploaded or predefined via filters)
	 * 2. import content
	 * 3. before widgets import setup (optional)
	 * 4. import widgets (optional)
	 * 5. import customizer options (optional)
	 * 6. after import setup (optional)
	 */
	public function import_demo_data_ajax_callback() {

		// Try to update PHP memory limit (so that it does not run out of it).
		ini_set( 'memory_limit', apply_filters( 'themebeez-demo-importer/import_memory_limit', '350M' ) );

		// Verify if the AJAX call is valid (checks nonce and current_user_can).
		TT_Helpers::verify_ajax_call();

		// Is this a new AJAX call to continue the previous import?
		$use_existing_importer_data = $this->get_importer_data();

		if ( ! $use_existing_importer_data ) {

			// Set the AJAX call number.
			$this->ajax_call_number = empty( $this->ajax_call_number ) ? 0 : $this->ajax_call_number;

			// Error messages displayed on front page.
			$this->frontend_error_messages = '';

			// Create a date and time string to use for demo and log file names.
			$demo_import_start_time = date( apply_filters( 'themebeez-demo-importer/date_format_for_file_names', 'Y-m-d__H-i-s' ) );

			// Define log file path.
			$this->log_file_path = TT_Helpers::get_log_path( $demo_import_start_time );

			// Get selected file index or set it to 0.
			$this->selected_index = empty( $_POST['selected'] ) ? 0 : absint( $_POST['selected'] );

			/**
			 * 1. Prepare import files.
			 * Manually uploaded import files or predefined import files via filter: et-demo-content-import
			 */
			if ( ! empty( $_FILES ) ) { // Using manual file uploads?

				// Get paths for the uploaded files.
				$this->selected_import_files = TT_Helpers::process_uploaded_files( $_FILES, $this->log_file_path );

				// Set the name of the import files, because we used the uploaded files.
				$this->import_files[ $this->selected_index ]['import_file_name'] = esc_html__( 'Manually uploaded files', 'themebeez-toolkit' );
			} else if ( ! empty( $this->import_files[ $this->selected_index ] ) ) { // Use predefined import files from wp filter: et-demo-content-import.

				// Download the import files (content and widgets files) and save it to variable for later use.
				$this->selected_import_files = TT_Helpers::download_import_files(
					$this->import_files[ $this->selected_index ],
					$demo_import_start_time
				);

				// Check Errors.
				if ( is_wp_error( $this->selected_import_files ) ) {

					// Write error to log file and send an AJAX response with the error.
					TT_Helpers::log_error_and_send_ajax_response(
						$this->selected_import_files->get_error_message(),
						$this->log_file_path,
						esc_html__( 'Downloaded files', 'themebeez-toolkit' )
					);
				}

				// Add this message to log file.
				$log_added = TT_Helpers::append_to_file(
					sprintf(
						__( 'The import files for: %s were successfully downloaded!', 'themebeez-toolkit' ),
						$this->import_files[ $this->selected_index ]['import_file_name']
					) . TT_Helpers::import_file_info( $this->selected_import_files ),
					$this->log_file_path,
					esc_html__( 'Downloaded files', 'themebeez-toolkit' )
				);
			} else {

				// Send JSON Error response to the AJAX call.
				wp_send_json( esc_html__( 'No import files specified!', 'themebeez-toolkit' ) );
			}
		}

		/**
		 * 2. Import content.
		 * Returns any errors greater then the "error" logger level, that will be displayed on front page.
		 */
		$this->frontend_error_messages .= $this->import_content( $this->selected_import_files['content'] );
		

		/**
		 * 5. Import customize options.
		 */
		if ( ! empty( $this->selected_import_files['customizer'] ) && empty( $this->frontend_error_messages ) ) {
			$this->import_customizer( $this->selected_import_files['customizer'] );
		}

		/**
		 * 4. Import widgets.
		 */
		if ( ! empty( $this->selected_import_files['widgets'] ) && empty( $this->frontend_error_messages ) ) {
			$this->import_widgets( $this->selected_import_files['widgets'] );
		}

		/**
		 * 3. Before widgets import setup.
		 */
		$action = 'themebeez-demo-importer/before_widgets_import';
		if ( ( false !== has_action( $action ) ) && empty( $this->frontend_error_messages ) ) {

			// Run the before_widgets_import action to setup other settings.
			$this->do_import_action( $action, $this->import_files[ $this->selected_index ] );
		}
		

		/**
		 * 6. After import setup.
		 */
		$action = 'et-after-demo-content-import';
		//if ( ( false !== has_action( $action ) ) && empty( $this->frontend_error_messages ) ) {

		// Run the after_import action to setup other settings.
		$this->do_import_action( $action, $this->import_files[ $this->selected_index ] );
		//}

		// Display final messages (success or error messages).
		if ( empty( $this->frontend_error_messages ) ) {
			$response['message'] = sprintf(
				__( 'The demo import has finished. Please check your page and make sure that everything has imported correctly.', 'themebeez-toolkit' ) );

		} else {
			$response['message'] = $this->frontend_error_messages . '<br>';
			$response['message'] .= sprintf(
				__( 'The demo import has finished, but there were some import errors.%s More details about the errors can be found in this %s %slog file%s %s.', 'themebeez-toolkit' ),
				'<br>',
				'<strong>',
				'<a href="' . TT_Helpers::get_log_url( $this->log_file_path ) . '" target="_blank">',
				'</strong>',
				'</a>'
			);
		}

		wp_send_json( $response );
	}


	/**
	 * Import content from an WP XML file.
	 *
	 * @param string $import_file_path path to the import file.
	 */
	private function import_content( $import_file_path ) {

		$this->microtime = microtime( true );

		// This should be replaced with multiple AJAX calls (import in smaller chunks)
		// so that it would not come to the Internal Error, because of the PHP script timeout.
		// Also this function has no effect when PHP is running in safe mode
		// http://php.net/manual/en/function.set-time-limit.php.
		// Increase PHP max execution time.
		set_time_limit( apply_filters( 'themebeez-demo-importer/set_time_limit_for_demo_data_import', 300 ) );

		// Disable import of authors.
		add_filter( 'wxr_importer.pre_process.user', '__return_false' );

		// Check, if we need to send another AJAX request and set the importing author to the current user.
		add_filter( 'wxr_importer.pre_process.post', array( $this, 'new_ajax_request_maybe' ) );

		// Disables generation of multiple image sizes (thumbnails) in the content import step.
		if ( ! apply_filters( 'themebeez-demo-importer/regenerate_thumbnails_in_content_import', true ) ) {
			add_filter( 'intermediate_image_sizes_advanced',
				function () {
					return null;
				}
			);
		}

		// Import content.
		if ( ! empty( $import_file_path ) ) {
			ob_start();
			$this->importer->import( $import_file_path );
			$message = ob_get_clean();

			// Add this message to log file.
			$log_added = TT_Helpers::append_to_file(
				$message . PHP_EOL . esc_html__( 'Max execution time after content import = ', 'themebeez-toolkit' ) . ini_get( 'max_execution_time' ),
				$this->log_file_path,
				esc_html__( 'Importing content', 'themebeez-toolkit' )
			);
		}

		// Delete content importer data for current import from DB.
		delete_transient( 'TT_importer_data' );

		// Return any error messages for the front page output (errors, critical, alert and emergency level messages only).
		return $this->logger->error_output;
	}


	/**
	 * Import widgets from WIE or JSON file.
	 *
	 * @param string $widget_import_file_path path to the widget import file.
	 */
	private function import_widgets( $widget_import_file_path ) {

		// Widget import results.
		$results = array();

		// Create an instance of the Widget Importer.
		$widget_importer = new TT_Importer_Widget();

		// Import widgets.
		if ( ! empty( $widget_import_file_path ) ) {

			// Import widgets and return result.
			$results = $widget_importer->import_widgets( $widget_import_file_path );
		}

		// Check for errors.
		if ( is_wp_error( $results ) ) {

			// Write error to log file and send an AJAX response with the error.
			TT_Helpers::log_error_and_send_ajax_response(
				$results->get_error_message(),
				$this->log_file_path,
				esc_html__( 'Importing widgets', 'themebeez-toolkit' )
			);
		}

		ob_start();
		$widget_importer->format_results_for_log( $results );
		$message = ob_get_clean();

		// Add this message to log file.
		$log_added = TT_Helpers::append_to_file(
			$message,
			$this->log_file_path,
			esc_html__( 'Importing widgets', 'themebeez-toolkit' )
		);
	}


	/**
	 * Import customizer from a DAT file, generated by the Customizer Export/Import plugin.
	 *
	 * @param string $customizer_import_file_path path to the customizer import file.
	 */
	private function import_customizer( $customizer_import_file_path ) {

		// Try to import the customizer settings.
		$results = TT_Importer_Customizer_Importer::import_customizer_options( $customizer_import_file_path );

		// Check for errors.
		if ( is_wp_error( $results ) ) {

			// Write error to log file and send an AJAX response with the error.
			TT_Helpers::log_error_and_send_ajax_response(
				$results->get_error_message(),
				$this->log_file_path,
				esc_html__( 'Importing customizer settings', 'themebeez-toolkit' )
			);
		}

		// Add this message to log file.
		$log_added = TT_Helpers::append_to_file(
			esc_html__( 'Customizer settings import finished!', 'themebeez-toolkit' ),
			$this->log_file_path,
			esc_html__( 'Importing customizer settings', 'themebeez-toolkit' )
		);
	}


	/**
	 * Setup other things in the passed wp action.
	 *
	 * @param string $action the action name to be executed.
	 * @param array $selected_import with information about the selected import.
	 */
	private function do_import_action( $action, $selected_import ) {

		ob_start();
		do_action( $action, $selected_import );
		$message = ob_get_clean();

		// Add this message to log file.
		$log_added = TT_Helpers::append_to_file(
			$message,
			$this->log_file_path,
			$action
		);
	}


	/**
	 * Check if we need to create a new AJAX request, so that server does not timeout.
	 *
	 * @param array $data current post data.
	 *
	 * @return array
	 */
	public function new_ajax_request_maybe( $data ) {

		$time = microtime( true ) - $this->microtime;

		// We should make a new ajax call, if the time is right.
		if ( $time > apply_filters( 'themebeez-demo-importer/time_for_one_ajax_call', 25 ) ) {
			$this->ajax_call_number ++;
			$this->set_importer_data();

			$response = array(
				'status'  => 'newAJAX',
				'message' => 'Time for new AJAX request!: ' . $time,
			);

			// Add any output to the log file and clear the buffers.
			$message = ob_get_clean();

			// Add message to log file.
			$log_added = TT_Helpers::append_to_file(
				__( 'Completed AJAX call number: ', 'themebeez-toolkit' ) . $this->ajax_call_number . PHP_EOL . $message,
				$this->log_file_path,
				''
			);

			wp_send_json( $response );
		}

		// Set importing author to the current user.
		// Fixes the [WARNING] Could not find the author for ... log warning messages.
		$current_user_obj    = wp_get_current_user();
		$data['post_author'] = $current_user_obj->user_login;

		return $data;
	}

	/**
	 * Set current state of the content importer, so we can continue the import with new AJAX request.
	 */
	private function set_importer_data() {

		$data = array(
			'frontend_error_messages' => $this->frontend_error_messages,
			'ajax_call_number'        => $this->ajax_call_number,
			'log_file_path'           => $this->log_file_path,
			'selected_index'          => $this->selected_index,
			'selected_import_files'   => $this->selected_import_files,
		);

		$data = array_merge( $data, $this->importer->get_importer_data() );

		set_transient( 'TT_importer_data', $data, 0.5 * HOUR_IN_SECONDS );
	}

	/**
	 * Get content importer data, so we can continue the import with this new AJAX request.
	 */
	private function get_importer_data() {

		if ( $data = get_transient( 'TT_importer_data' ) ) {
			$this->frontend_error_messages = empty( $data['frontend_error_messages'] ) ? '' : $data['frontend_error_messages'];
			$this->ajax_call_number        = empty( $data['ajax_call_number'] ) ? 1 : $data['ajax_call_number'];
			$this->log_file_path           = empty( $data['log_file_path'] ) ? '' : $data['log_file_path'];
			$this->selected_index          = empty( $data['selected_index'] ) ? 0 : $data['selected_index'];
			$this->selected_import_files   = empty( $data['selected_import_files'] ) ? array() : $data['selected_import_files'];
			$this->importer->set_importer_data( $data );

			return true;
		}

		return false;
	}


	/**
	 * Get data from filters, after the theme has loaded and instantiate the importer.
	 */
	public function setup_plugin_with_filter_data() {

		// Get info of import data files and filter it.
		$this->import_files = TT_Helpers::validate_import_file_info( apply_filters( 'et-demo-content-import', array() ) );

		// Importer options array.
		$importer_options = apply_filters( 'themebeez-demo-importer/importer_options', array(
			'fetch_attachments' => true,
		) );

		// Logger options for the logger used in the importer.
		$logger_options = apply_filters( 'themebeez-demo-importer/logger_options', array(
			'logger_min_level' => 'warning',
		) );

		// Configure logger instance and set it to the importer.
		$this->logger            = new TT_Logger();
		$this->logger->min_level = $logger_options['logger_min_level'];

		//// Create importer instance with proper parameters.
		$this->importer = new TT_Importer_Main( $importer_options, $this->logger );
	}
}