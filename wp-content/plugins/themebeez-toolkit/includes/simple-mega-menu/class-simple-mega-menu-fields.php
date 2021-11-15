<?php
/**
 * Sample menu item metadata
 *
 * This class demonstrate the usage of Menu Item Custom Fields in plugins/themes.
 *
 * @since 0.1.0
 */
if( ! class_exists( 'Simple_Mega_Menu_Fields' ) ) {

	class Simple_Mega_Menu_Fields {

		/**
		 * Holds our custom fields
		 *
		 * @var    array
		 * @access protected
		 * @since  Menu_Item_Custom_Fields_Example 0.2.0
		 */
		protected $fields = array();


		/**
		 * Initialize plugin
		 */
		public function __construct() {

			add_action( 'wp_nav_menu_item_custom_fields', array( $this, 'create_menu_fields' ), 10, 4 );
			add_action( 'wp_update_nav_menu_item', array( $this, 'save_menu_fields' ), 10, 3 );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );

			$this->fields = array(
				'icon-field' => __( 'Menu Icon', 'themebeez-toolkit' ),
				'mega-menu-group-field' => '',
			);

			$this->load_dependencies();
		}


		public function load_dependencies() {

			require_once plugin_dir_path( __FILE__ ) . 'icon-fonts.php';
		}

		public function enqueue_scripts() {

			wp_enqueue_style( 'fontawesome', plugin_dir_url( __FILE__ ) . 'assets/css/fontawesome.css' );

			wp_enqueue_style( 'orchid-store-menu', plugin_dir_url( __FILE__ ) . 'assets/css/orchid-store-menu.css' );

			wp_enqueue_script( 'orchid-store-menu', plugin_dir_url( __FILE__ ) . 'assets/js/orchid-store-menu.js', array( 'jquery' ), 'THEMEBEEZTOOLKIT_VERSION', true );

			wp_localize_script( 'orchid-store-menu', 'orchid_store_ajax_script', array(
		       'ajax_url' => admin_url( 'admin-ajax.php' ),
		       'nonce' => wp_create_nonce( 'orchid-store-menu-nonce' ),
		    ) );
		}


		/**
		 * Save custom field value
		 *
		 * @wp_hook action wp_update_nav_menu_item
		 *
		 * @param int   $menu_id         Nav menu ID
		 * @param int   $menu_item_db_id Menu item ID
		 * @param array $menu_item_args  Menu item data
		 */
		public function save_menu_fields( $menu_id, $menu_item_db_id, $menu_item_args ) {

			if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
				return;
			}

			check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

			foreach ( $this->fields as $_key => $label ) {
				$key = sprintf( 'menu-item-%s', $_key );

				// Sanitize
				if ( ! empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {
					// Do some checks here...
					$value = $_POST[ $key ][ $menu_item_db_id ];
				} else {
					$value = null;
				}

				// Update
				if ( ! is_null( $value ) ) {
					update_post_meta( $menu_item_db_id, $key, $value );
				} else {
					delete_post_meta( $menu_item_db_id, $key );
				}
			}
		}


		/**
		 * Print field
		 *
		 * @param object $item  Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args  Menu item args.
		 * @param int    $id    Nav menu ID.
		 *
		 * @return string Form fields
		 */
		public function create_menu_fields( $id, $item, $depth, $args ) {

			foreach ( $this->fields as $_key => $label ) :

				$key   = sprintf( 'menu-item-%s', $_key );

				$id    = sprintf( 'edit-%s-%s', $key, $item->ID );

				$name  = sprintf( '%s[%s]', $key, $item->ID );

				$value = get_post_meta( $item->ID, $key, true );

				$class = sprintf( '%s', $_key );

				if( $_key == 'icon-field' ) {
					?>
					<div class="menu-icon-field <?php echo esc_attr( $class ) ?>">
						<div class="menu-icon-input-fields-holder">
							<label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label>
							<br/>
							<span class="menu-icon-holder-wrapper">
								<?php
								if( !empty( $value ) ) {
									?>
									<span class="menu-icon-holder"><i class="fa <?php echo esc_attr( $value ); ?>"></i></span>
									<?php
								}
								?>
							</span>
							<button class="menu-select-icon"><?php esc_html_e( 'Select Icon', 'themebeez-toolkit' ); ?></button>
							<button class="menu-remove-icon"><?php esc_html_e( 'Remove Icon', 'themebeez-toolkit' ); ?></button>
							<input type="text" id="<?php echo esc_attr( $id ); ?>" class="menu-icon-input widefat <?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>">
						</div>
						
						<div class="menu-icons-picker-wrapper">
						</div>
					</div>
					<?php
				}

				if( $_key == 'mega-menu-group-field' && ( $depth == 0 || $depth == 1 ) ) {
					?>
					<p class="mega-menu-item-field">
						<label for="<?php echo esc_attr( $id ); ?>"><input type="checkbox" value="1" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php checked( 1, absint( $value ) ); ?>><span class="mega-menu-group-title"><?php _e( 'Set it as mega menu group', 'themebeez-toolkit' ); ?></span><span class="mega-menu-sub-group-title"><?php _e( 'Set it as mega menu sub group', 'themebeez-toolkit' ); ?></span></label>
					</p>
					<?php
				}
			endforeach;
		}
	}
}
$smmf = new Simple_Mega_Menu_Fields();