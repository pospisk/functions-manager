<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://pospi.sk/
 * @since      1.0.0
 *
 * @package    Functions_Manager
 * @subpackage Functions_Manager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Functions_Manager
 * @subpackage Functions_Manager/public
 * @author     pospisk <kristian.pospis@gmail.com>
 */
class Functions_Manager_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_public_functions();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/functions-manager-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/functions-manager-public.js', array( 'jquery' ), $this->version, false );

	}

	public function register_shortcodes() {
		add_shortcode( 'current_date', array( $this, 'custom_date_shortcode') );
	}
	
	// Adding a basic custom shortcode that tells the current date
	public function custom_date_shortcode( ) {
		return '<p>The current date is ' . date('d-m-Y') . '.</p>';
	}
	

	public function load_public_functions(){

	}
	
}
