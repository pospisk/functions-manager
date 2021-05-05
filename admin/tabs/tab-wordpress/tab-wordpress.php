<?php

require_once 'tab-wordpress-settings.php';

trait Tab_Wordpress {

	use Tab_Wordpress_Settings;

	/**
	 * Provides default values for the Display Options.
	 *
	 * @return array
	 */
	public function wordpress_options_default() {
		$defaults = array(
			'remove_widgets'			=> '',
			'allow_svg_upload'			=> '',
			'remove_emojis'				=> '',
			'wp_logo_settings_active' 	=> '',
			'wp_logo_settings_url'		=> '',
			'wp_logo_settings_link'		=> '',
			'wp_logo_settings_size'		=> '',
		);
		return $defaults;
	}

	/**
	 * This function provides a simple description for the General Options page.
	 */
	public function wordpress_options_page() {
		$options = get_option('fm_wordpress_settings');
		var_dump($options);
		echo '<p>' . __( 'Select which areas of content you wish to display.', 'functions-manager' ) . '</p>';
	} // end wordpress_options_page

    /**
	 * This function initializes the wordpress sections and settings.
	 */
	public function init_wordpress_options() {

		// If the theme options don't exist, create them.
		// if( false == get_option( 'fm_wordpress_settings' ) ) {
		// 	$default_array = $this->wordpress_options_default();
		// 	add_option( 'fm_wordpress_settings', $default_array );
		// }

		if( false == get_option( 'fm_wordpress_settings' ) ) {
			$default_array = $this->wordpress_options_default();
			update_option( 'fm_wordpress_settings', $default_array );
		}

		add_settings_section(
			'wordpress_settings_section',			            // ID used to identify this section and with which to register options
			__( 'WordPress Options', 'functions-manager' ), // Title to be displayed on the administration page
			array( $this, 'wordpress_options_page'),	    // Callback used to render the description of the section
			'fm_wordpress_settings'		                // Page on which to add this section of options
		);

		add_settings_field(
			'remove_widgets',						        // ID used to identify the field throughout the theme
			__( 'Dashboard Widgets', 'functions-manager' ),		// The label to the left of the option interface element
			array( $this, 'toggle_header_callback'),	// The name of the function responsible for rendering the option interface
			'fm_wordpress_settings',	            // The page on which this option will be displayed
			'wordpress_settings_section',			        // The name of the section to which this field belongs
			array(								        // The array of arguments to pass to the callback. In this case, just a description.
				__( 'Activate to hide all dashboard widgets.', 'functions-manager' ),
			)
		);

		add_settings_field(
			'allow_svg_upload',
			__( 'Allow SVG Uploads', 'functions-manager' ),
			array( $this, 'toggle_content_callback'),
			'fm_wordpress_settings',
			'wordpress_settings_section',
			array(
				__( 'Activate to allow svg uploads to media.', 'functions-manager' ),
			)
		);

		add_settings_field(
			'remove_emojis',
			__( 'Remove Emojis', 'functions-manager' ),
			array( $this, 'toggle_footer_callback'),
			'fm_wordpress_settings',
			'wordpress_settings_section',
			array(
				__( 'Activate to remove emojis.', 'functions-manager' ),
			)
		);

		add_settings_field(
			'wp_logo_settings_active',
			__( 'Login Logo Settings', 'functions-manager' ),
			array( $this, 'wp_logo_settings_active'),
			'fm_wordpress_settings',
			'wordpress_settings_section',
			array(
				__( 'Activate to show WordPress Logo Settings.', 'functions-manager' ),
				'wp_logo_settings_url wp_logo_settings_link wp_logo_settings_size',
			)
		);

		add_settings_field(
			'wp_logo_settings_url',
			'Logo URL',
			array( $this, 'wp_logo_settings_url'),
			'fm_wordpress_settings',
			'wordpress_settings_section',
			array(
				__( 'Enter URL for an image file to change the login logo.', 'functions-manager' ),
			)
		);

		add_settings_field(
			'wp_logo_settings_link',
			'Logo Link',
			array( $this, 'wp_logo_settings_link'),
			'fm_wordpress_settings',
			'wordpress_settings_section',
			array(
				__( 'Enter a link where the logo should direct. default: https://wordpress.org/', 'functions-manager' ),
			)
		);

		add_settings_field(
			'wp_logo_settings_size',
			'Logo Size',
			array( $this, 'wp_logo_settings_size'),
			'fm_wordpress_settings',
			'wordpress_settings_section',
			array(
				__( 'Enter a size in "px" for the login logo.', 'functions-manager' ),
			)
		);

		register_setting(
			'fm_wordpress_settings',
			'fm_wordpress_settings',
			array( $this, 'sanitize_wordpress_options')
		);

	}

	/**
	 * @params	$input	The unsanitized collection of options.
	 *
	 * @returns			The collection of sanitized values.
	 */
	public function sanitize_wordpress_options( $input ) {

		// Create our array for storing the validated options
		$output = array();

		// Loop through each of the incoming options
		foreach( $input as $key => $value ) {

			// Check to see if the current option has a value. If so, process it.
			if( isset( $input[$key] ) ) {

				// Strip all HTML and PHP tags and properly handle quoted strings
				$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );

			} // end if

		} // end foreach

		// Return the array processing any additional functions filtered by this action
		return apply_filters( 'sanitize_wordpress_options', $output, $input );

	} // end sanitize_wordpress_options

}

?>