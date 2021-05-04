<?php

require_once 'tab-cookies-settings.php';

trait Tab_Cookies{

    use Tab_Cookies_Settings;

    /**
	 * Provides default values for the Input Options.
	 *
	 * @return array
	 */
	public function default_input_options() {
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
	 *
	 * It's called from the 'wppb-demo_theme_initialize_input_examples_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function input_examples_callback() {
		$options = get_option('wppb_demo_input_examples');
		var_dump($options);
		echo '<p>' . __( 'Provides examples of the five basic element types.', 'functions-manager' ) . '</p>';
	} // end general_options_callback

    /**
	 * Initializes the theme's input example by registering the Sections,
	 * Fields, and Settings. This particular group of options is used to demonstration
	 * validation and sanitization.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function initialize_input_examples() {
		//delete_option('wppb_demo_input_examples');
		if( false == get_option( 'wppb_demo_input_examples' ) ) {
			$default_array = $this->default_input_options();
			update_option( 'wppb_demo_input_examples', $default_array );
		} // end if

		add_settings_section(
			'input_examples_section',
			__( 'Input Examples', 'functions-manager' ),
			array( $this, 'input_examples_callback'),
			'wppb_demo_input_examples'
		);

		add_settings_field(
			'Input Element',
			__( 'Input Element', 'functions-manager' ),
			array( $this, 'input_element_callback'),
			'wppb_demo_input_examples',
			'input_examples_section'
		);

		add_settings_field(
			'Textarea Element',
			__( 'Textarea Element', 'functions-manager' ),
			array( $this, 'textarea_element_callback'),
			'wppb_demo_input_examples',
			'input_examples_section'
		);

		add_settings_field(
			'Checkbox Element',
			__( 'Checkbox Element', 'functions-manager' ),
			array( $this, 'checkbox_element_callback'),
			'wppb_demo_input_examples',
			'input_examples_section'
		);

		add_settings_field(
			'Radio Button Elements',
			__( 'Radio Button Elements', 'functions-manager' ),
			array( $this, 'radio_element_callback'),
			'wppb_demo_input_examples',
			'input_examples_section'
		);

		add_settings_field(
			'Select Element',
			__( 'Select Element', 'functions-manager' ),
			array( $this, 'select_element_callback'),
			'wppb_demo_input_examples',
			'input_examples_section'
		);

		register_setting(
			'wppb_demo_input_examples',
			'wppb_demo_input_examples',
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