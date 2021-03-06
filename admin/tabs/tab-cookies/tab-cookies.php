<?php

require_once 'tab-cookies-settings.php';

trait Tab_Cookies{

    use Tab_Cookies_Settings;

    /**
	 * Provides default values for the Input Options.
	 *
	 * @return array
	 */
	public function cookies_options_default() {
		$defaults = array(
			'input_example'		=>	'default input example',
			'textarea_example'	=>	'',
			'checkbox_example'	=>	'',
			'radio_example'		=>	'2',
			'time_options'		=>	'default'
		);
		return $defaults;
	}

    /**
	 * This function provides a simple description for the Input Examples page.
	 */
	public function cookies_options_page() {
		$options = get_option('fm_cookies_settings');
		var_dump($options);
		echo '<p>' . __( 'Provides examples of the five basic element types.', 'functions-manager' ) . '</p>';
	}

    /**
	 * This function initializes the cookies sections and settings.
	 */
	public function init_cookies_options() {

		if( false == get_option( 'fm_cookies_settings' ) ) {
			$default_array = $this->cookies_options_default();
			update_option( 'fm_cookies_settings', $default_array );
		} 

		add_settings_section(
			'cookies_settings_section',
			__( 'Input Examples', 'functions-manager' ),
			array( $this, 'cookies_options_page'),
			'fm_cookies_settings'
		);

		add_settings_field(
			'Input Element',
			__( 'Input Element', 'functions-manager' ),
			array( $this, 'input_element_callback'),
			'fm_cookies_settings',
			'cookies_settings_section'
		);

		add_settings_field(
			'Textarea Element',
			__( 'Textarea Element', 'functions-manager' ),
			array( $this, 'textarea_element_callback'),
			'fm_cookies_settings',
			'cookies_settings_section'
		);

		add_settings_field(
			'Checkbox Element',
			__( 'Checkbox Element', 'functions-manager' ),
			array( $this, 'checkbox_element_callback'),
			'fm_cookies_settings',
			'cookies_settings_section'
		);

		add_settings_field(
			'Radio Button Elements',
			__( 'Radio Button Elements', 'functions-manager' ),
			array( $this, 'radio_element_callback'),
			'fm_cookies_settings',
			'cookies_settings_section'
		);

		add_settings_field(
			'Select Element',
			__( 'Select Element', 'functions-manager' ),
			array( $this, 'select_element_callback'),
			'fm_cookies_settings',
			'cookies_settings_section'
		);

		register_setting(
			'fm_cookies_settings',
			'fm_cookies_settings',
			array( $this, 'validate_input_examples')
		);

	}

    public function validate_input_examples( $input ) {

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
		return apply_filters( 'validate_input_examples', $output, $input );

	} // end validate_input_examples


}

?>