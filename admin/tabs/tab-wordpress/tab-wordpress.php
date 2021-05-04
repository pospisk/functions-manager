<?php

require_once 'tab-wordpress-settings.php';

trait Tab_Wordpress {

	use Tab_Wordpress_Settings;

	/**
	 * Provides default values for the Display Options.
	 *
	 * @return array
	 */
	public function default_display_options() {
		$defaults = array(
			'remove_widgets'		=>	'',
			'allow_svg_upload'		=>	'',
			'remove_emojis'		=>	'',
		);
		return $defaults;
	}

	/**
	 * This function provides a simple description for the General Options page.
	 *
	 * It's called from the 'wppb-demo_initialize_theme_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function general_options_callback() {
		$options = get_option('fm_wordpress_settings');
		// var_dump($options);
		echo '<p>' . __( 'Select which areas of content you wish to display.', 'functions-manager' ) . '</p>';
	} // end general_options_callback

	/**
	 * Initializes the theme's display options page by registering the Sections,
	 * Fields, and Settings.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function initialize_display_options() {

		// If the theme options don't exist, create them.
		if( false == get_option( 'fm_wordpress_settings' ) ) {
			$default_array = $this->default_display_options();
			add_option( 'fm_wordpress_settings', $default_array );
		}


		add_settings_section(
			'general_settings_section',			            // ID used to identify this section and with which to register options
			__( 'WordPress Options', 'functions-manager' ), // Title to be displayed on the administration page
			array( $this, 'general_options_callback'),	    // Callback used to render the description of the section
			'fm_wordpress_settings'		                // Page on which to add this section of options
		);

		// Next, we'll introduce the fields for toggling the visibility of content elements.
		add_settings_field(
			'remove_widgets',						        // ID used to identify the field throughout the theme
			__( 'Dashboard Widgets', 'functions-manager' ),		// The label to the left of the option interface element
			array( $this, 'toggle_header_callback'),	// The name of the function responsible for rendering the option interface
			'fm_wordpress_settings',	            // The page on which this option will be displayed
			'general_settings_section',			        // The name of the section to which this field belongs
			array(								        // The array of arguments to pass to the callback. In this case, just a description.
				__( 'Activate to hide all dashboard widgets.', 'functions-manager' ),
			)
		);

		add_settings_field(
			'allow_svg_upload',
			__( 'Allow SVG Uploads', 'functions-manager' ),
			array( $this, 'toggle_content_callback'),
			'fm_wordpress_settings',
			'general_settings_section',
			array(
				__( 'Activate to allow svg uploads to media.', 'functions-manager' ),
			)
		);

		add_settings_field(
			'remove_emojis',
			__( 'Remove Emojis', 'functions-manager' ),
			array( $this, 'toggle_footer_callback'),
			'fm_wordpress_settings',
			'general_settings_section',
			array(
				__( 'Activate to remove emojis.', 'functions-manager' ),
			)
		);

		// Finally, we register the fields with WordPress
		register_setting(
			'fm_wordpress_settings',
			'fm_wordpress_settings'
		);

	} // end wppb-demo_initialize_theme_options

}

?>