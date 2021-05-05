<?php

require_once 'tab-custom-settings.php';

trait Tab_Custom {

	use Tab_Custom_Settings;

	/**
	 * Provides default values for the Display Options.
	 *
	 * @return array
	 */
	public function custom_options_default() {
		$defaults = array(
			'remove_widgetss'		=>	'',
			'allow_svg_uploadss'		=>	'',
			'remove_emojiss'		=>	'',
		);
		return $defaults;
	}

	/**
	 * This function provides a simple description for the General Options page.
	 *
	 * It's called from the 'wppb-demo_initialize_theme_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function custom_options_callback() {
		$options = get_option('fm_custom_settings');
		var_dump($options);
		echo '<p>' . __( 'Select which areas of content you wish to display.', 'functions-manager' ) . '</p>';
	} // end custom_options_callback

	/**
	 * Initializes the theme's display options page by registering the Sections,
	 * Fields, and Settings.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function init_custom_options() {

		// If the theme options don't exist, create them.
		if( false == get_option( 'fm_custom_settings' ) ) {
			$default_array = $this->custom_options_default();
			add_option( 'fm_custom_settings', $default_array );
		}


		add_settings_section(
			'custom_settings_section',			            // ID used to identify this section and with which to register options
			__( 'custom Options', 'functions-manager' ), 	// Title to be displayed on the administration page
			array( $this, 'custom_options_callback'),	    // Callback used to render the description of the section
			'fm_custom_settings'		                	// Page on which to add this section of options
		);

		add_settings_field(
			'remove_widgets',						        // ID used to identify the field throughout the theme
			__( 'Dashboard Widgets', 'functions-manager' ),	// The label to the left of the option interface element
			array( $this, 'remove_widgetss'),				// The name of the function responsible for rendering the option interface
			'fm_custom_settings',	            			// The page on which this option will be displayed
			'custom_settings_section',			        	// The name of the section to which this field belongs
			array(								        	// The array of arguments to pass to the callback. In this case, just a description.
				__( 'Activate to hide all dashboard widgets.', 'functions-manager' ),
			)
		);

		add_settings_field(
			'allow_svg_upload',
			__( 'Allow SVG Uploads', 'functions-manager' ),
			array( $this, 'allow_svg_uploadss'),
			'fm_custom_settings',
			'custom_settings_section',
			array(
				__( 'Activate to allow svg uploads to media.', 'functions-manager' ),
			)
		);

		add_settings_field(
			'remove_emojis',
			__( 'Remove Emojis', 'functions-manager' ),
			array( $this, 'remove_emojiss'),
			'fm_custom_settings',
			'custom_settings_section',
			array(
				__( 'Activate to remove emojis.', 'functions-manager' ),
			)
		);

		// Finally, we register the fields with custom
		register_setting(
			'fm_custom_settings',
			'fm_custom_settings'
		);

	} // end wppb-demo_initialize_theme_options

}

?>