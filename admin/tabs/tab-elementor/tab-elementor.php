<?php

require_once 'tab-elementor-settings.php';

trait Tab_Elementor {

	use Tab_Elementor_Settings;

	/**
	 * Provide default values for the Social Options.
	 *
	 * @return array
	 */
	public function default_social_options() {

		$defaults = array(
			'twitter'		=>	'twitter',
			'facebook'		=>	'',
			'googleplus'	=>	'',
		);

		return  $defaults;

	}

	/**
	 * This function provides a simple description for the Social Options page.
	 *
	 * It's called from the 'wppb-demo_theme_initialize_social_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function social_options_callback() {
		$options = get_option('wppb_demo_social_options');
		var_dump($options);
		echo '<p>' . __( 'Provide the URL to the social networks you\'d like to display.', 'functions-manager' ) . '</p>';
	} // end general_options_callback
    
	/**
	 * Initializes the theme's social options by registering the Sections,
	 * Fields, and Settings.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function initialize_social_options() {
		delete_option('wppb_demo_social_options');
		if( false == get_option( 'wppb_demo_social_options' ) ) {
			$default_array = $this->default_social_options();
			update_option( 'wppb_demo_social_options', $default_array );
		} // end if

		add_settings_section(
			'social_settings_section',			// ID used to identify this section and with which to register options
			__( 'Social Options', 'functions-manager' ),		// Title to be displayed on the administration page
			array( $this, 'social_options_callback'),	// Callback used to render the description of the section
			'wppb_demo_social_options'		// Page on which to add this section of options
		);

		add_settings_field(
			'twitter',
			'Twitter',
			array( $this, 'twitter_callback'),
			'wppb_demo_social_options',
			'social_settings_section'
		);

		add_settings_field(
			'facebook',
			'Facebook',
			array( $this, 'facebook_callback'),
			'wppb_demo_social_options',
			'social_settings_section'
		);

		add_settings_field(
			'googleplus',
			'Google+',
			array( $this, 'googleplus_callback'),
			'wppb_demo_social_options',
			'social_settings_section'
		);

		register_setting(
			'wppb_demo_social_options',
			'wppb_demo_social_options',
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