<?php

/**
 * The settings of the plugin.
 *
 * @link       http://pospi.sk
 * @since      1.0.0
 *
 * @package    Functions_Manager
 * @subpackage Functions_Manager/admin
 */

/**
 * Class WordPress_Plugin_Template_Settings
 *
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/tabs/tab-wordpress/tab-wordpress.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/tabs/tab-elementor/tab-elementor.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/tabs/tab-cookies/tab-cookies.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/tabs/tab-custom/tab-custom.php';

class Functions_Manager_Settings {
	use Tab_Wordpress;
	use Tab_Elementor;
	use Tab_Cookies;
	use Tab_Custom;
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

	}

	/**
	 * Create Tools Settings Page
	 */
	public function setup_tools_options_menu() {

		//Add the menu to the Tools set of menu items
		add_management_page(
			'Functions Manager', 	                        // The title to be displayed in the browser window for this page.
			'Functions Manager',	                        // The text to be displayed for this menu item
			'manage_options',		                        // Which type of users can see this menu item
			'functions_manager',	                        // The unique ID - that is, the slug - for this menu item
			array( $this, 'render_settings_page_content'),	// The name of the function to call when rendering this menu's page
			0
		);

	}

	/**
	 * Renders a simple page to display for the theme menu defined above.
	 */
	public function render_settings_page_content( $active_tab = '' ) {
		?>
		<!-- Create a header in the default WordPress 'wrap' container -->
		<div class="wrap">

			<h2><?php _e( 'Functions Manager', 'functions-manager' ); ?></h2>
			<?php settings_errors(); ?>

			<?php if( isset( $_GET[ 'tab' ] ) ) {
				$active_tab = $_GET[ 'tab' ];
				}
			if( $active_tab == 'elementor_options' ) {
				$active_tab = 'elementor_options';
			}
			if( $active_tab == 'cookies_options' ) {
				$active_tab = 'cookies_options';
			} 
			if( $active_tab == 'wordpress_options' ) {
				$active_tab = 'wordpress_options';
			}
			if( $active_tab == '' ) {
				$active_tab = 'wordpress_options';
			}
			?>

			<h2 class="nav-tab-wrapper">
				<a href="?page=functions_manager&tab=wordpress_options" class="nav-tab <?php echo $active_tab == 'wordpress_options' ? 'nav-tab-active' : ''; ?>">
					<?php _e( 'WordPress', 'functions-manager' ); ?>
				</a>
				<a href="?page=functions_manager&tab=elementor_options" class="nav-tab <?php echo $active_tab == 'elementor_options' ? 'nav-tab-active' : ''; ?>">
					<?php _e( 'Elementor', 'functions-manager' ); ?>
				</a>
				<a href="?page=functions_manager&tab=cookies_options" class="nav-tab <?php echo $active_tab == 'cookies_options' ? 'nav-tab-active' : ''; ?>">
					<?php _e( 'Cookies', 'functions-manager' ); ?>
				</a>
				<a href="?page=functions_manager&tab=custom_options" class="nav-tab <?php echo $active_tab == 'custom_options' ? 'nav-tab-active' : ''; ?>">
					<?php _e( 'Custom', 'functions-manager' ); ?>
				</a>
			</h2>

			<form method="post" action="options.php">
				<?php

				if( $active_tab == 'wordpress_options' ) {

					settings_fields( 'fm_wordpress_settings' );
					do_settings_sections( 'fm_wordpress_settings' );

				}
				if( $active_tab == 'elementor_options' ) {

					settings_fields( 'fm_elementor_settings' );
					do_settings_sections( 'fm_elementor_settings' );

				} 
				if ( $active_tab == 'cookies_options' ) {

					settings_fields( 'fm_cookies_settings' );
					do_settings_sections( 'fm_cookies_settings' );

				}
				if ( $active_tab == 'custom_options' ) {

					settings_fields( 'fm_custom_settings' );
					do_settings_sections( 'fm_custom_settings' );

				}

				submit_button();

				?>
			</form>

		</div><!-- /.wrap -->
	<?php
	}
	
}