<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://pospi.sk/
 * @since      1.0.0
 *
 * @package    Functions_Manager
 * @subpackage Functions_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Functions_Manager
 * @subpackage Functions_Manager/admin
 * @author     pospisk <kristian.pospis@gmail.com>
 */
class Functions_Manager_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_dependencies();
		$this->load_admin_functions();
	}

	/**
	 * Load the required dependencies for the Admin facing functionality.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
			
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/class-functions-manager-settings.php';

	}

	function add_plugin_link( $links ) {
		$links = array_merge( array(
			'<a href="' . esc_url( admin_url( '/tools.php?page=functions_manager' ) ) . '">' . __( 'Settings', 'textdomain' ) . '</a>'
		), $links );
		return $links;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Functions_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Functions_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/functions-manager-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Functions_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Functions_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/functions-manager-admin.js', array( 'jquery' ), $this->version, false );

	}

	private function load_admin_functions(){
		
		$options = get_option('fm_wordpress_settings');
		
		$remove_emojis = isset( $options['remove_emojis'] ) ? $options['remove_emojis'] : 0;
		$remove_widgets = isset( $options['remove_widgets'] ) ? $options['remove_widgets'] : 0;
		$remove_heartbeat = isset( $options['remove_heartbeat'] ) ? $options['remove_heartbeat'] : 0;
		$remove_ver_enqueue = isset( $options['remove_ver_enqueue'] ) ? $options['remove_ver_enqueue'] : 0;
		$remove_wp_ver = isset( $options['remove_wp_ver'] ) ? $options['remove_wp_ver'] : 0;
		$remove_wlmanifest = isset( $options['remove_wlmanifest'] ) ? $options['remove_wlmanifest'] : 0;
		$remove_oembed = isset( $options['remove_oembed'] ) ? $options['remove_oembed'] : 0;
		
		$disable_core_updates = isset( $options['disable_core_updates'] ) ? $options['disable_core_updates'] : 0;
		$disable_plugin_updates = isset( $options['disable_plugin_updates'] ) ? $options['disable_plugin_updates'] : 0;
		$disable_theme_updates = isset( $options['disable_theme_updates'] ) ? $options['disable_theme_updates'] : 0;

		$allow_svg_upload = isset( $options['allow_svg_upload'] ) ? $options['allow_svg_upload'] : 0;
		
		$wp_logo_settings_active = isset( $options['wp_logo_settings_active'] ) ? $options['wp_logo_settings_active'] : 0;
		$wp_logo_settings_url = $options['wp_logo_settings_url'];
		$wp_logo_settings_link = $options['wp_logo_settings_link'];
		$wp_logo_settings_title = $options['wp_logo_settings_title'];
		$wp_logo_settings_title = $options['wp_logo_settings_title'];
		$wp_backend_footer_text = $options['wp_backend_footer_text'];

		if ( $remove_widgets == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/remove_widgets.php';
		}
		if ( $remove_heartbeat == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/remove_heartbeat.php';
		}
		if ( $remove_ver_enqueue == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/remove_ver_enqueue.php';
		}
		if ( $remove_wp_ver == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/remove_wp_ver.php';
		}
		if ( $remove_wlmanifest == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/remove_wlmanifest.php';
		}
		if ( $remove_oembed == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/remove_oembed.php';
		}
		if ( $remove_emojis == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/remove_emojis.php';
		}
		if ( $allow_svg_upload == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/allow_svg_upload.php';
		}
		if ( $wp_logo_settings_active == 1 ){
			if ( $wp_logo_settings_url !== '' ){
				require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/change_wp_logo_url.php';
			}
			if ( $wp_logo_settings_link !== '' ){
				require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/change_wp_logo_link.php';
			}
			if ( $wp_logo_settings_title !== '' ){
				require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/change_wp_logo_title.php';
			}
		}
		if ( $disable_core_updates == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/disable_core_updates.php';
		}
		if ( $disable_plugin_updates == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/disable_plugin_updates.php';
		}
		if ( $disable_theme_updates == 1 ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/disable_theme_updates.php';
		}
		if ( $wp_logo_settings_title !== '' ){
			require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/inc/change_wp_be_footer_text.php';
		}
		
	}

}
