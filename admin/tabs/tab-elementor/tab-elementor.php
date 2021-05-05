<?php

require_once 'tab-elementor-settings.php';

trait Tab_Elementor {

	use Tab_Elementor_Settings;

	/**
	 * Provide default values for the Social Options.
	 *
	 * @return array
	 */
	public function elementor_options_default() {

		$defaults = array(
			'twitter'		=>	'twitter',
			'facebook'		=>	'',
			'googleplus'	=>	'',
		);

		return  $defaults;

	}

	/**
	 * This function provides a simple description for the Social Options page.
	 */
	public function elementor_options_callback() {
		$options = get_option('fm_elementor_settings');
		var_dump($options);
		echo '<p>' . __( 'Provide the URL to the social networks you\'d like to display.', 'functions-manager' ) . '</p>';
	} // end general_options_callback
    
	/**
	 * Initializes the theme's social options by registering the Sections,
	 * Fields, and Settings.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function init_elementor_options() {
		delete_option('fm_elementor_settings');
		if( false == get_option( 'fm_elementor_settings' ) ) {
			$default_array = $this->elementor_options_default();
			update_option( 'fm_elementor_settings', $default_array );
		} // end if

		add_settings_section(
			'social_settings_section',			// ID used to identify this section and with which to register options
			__( 'Social Options', 'functions-manager' ),		// Title to be displayed on the administration page
			array( $this, 'elementor_options_callback'),	// Callback used to render the description of the section
			'fm_elementor_settings'		// Page on which to add this section of options
		);

		add_settings_field(
			'twitter',
			'Twitter',
			array( $this, 'twitter_callback'),
			'fm_elementor_settings',
			'social_settings_section'
		);

		add_settings_field(
			'facebook',
			'Facebook',
			array( $this, 'facebook_callback'),
			'fm_elementor_settings',
			'social_settings_section'
		);

		add_settings_field(
			'googleplus',
			'Google+',
			array( $this, 'googleplus_callback'),
			'fm_elementor_settings',
			'social_settings_section'
		);

		register_setting(
			'fm_elementor_settings',
			'fm_elementor_settings',
			array( $this, 'sanitize_social_options')
		);

	}

	/**
	 * Sanitization callback for the social options. Since each of the social options are text inputs,
	 * this function loops through the incoming option and strips all tags and slashes from the value
	 * before serializing it.
	 *
	 * @params	$input	The unsanitized collection of options.
	 *
	 * @returns			The collection of sanitized values.
	 */
	public function sanitize_social_options( $input ) {

		// Define the array for the updated options
		$output = array();

		// Loop through each of the options sanitizing the data
		foreach( $input as $key => $val ) {

			if( isset ( $input[$key] ) ) {
				$output[$key] = esc_url_raw( strip_tags( stripslashes( $input[$key] ) ) );
			} // end if

		} // end foreach

		// Return the new collection
		return apply_filters( 'sanitize_social_options', $output, $input );

	} // end sanitize_social_options


}

?>