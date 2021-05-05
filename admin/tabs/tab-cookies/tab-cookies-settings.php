<?php

trait Tab_Cookies_Settings {
    
	public function input_element_callback() {

		$options = get_option( 'fm_cookies_settings' );

		// Render the output
		echo '<input type="text" id="input_example" name="fm_cookies_settings[input_example]" value="' . $options['input_example'] . '" />';

	} // end input_element_callback

	public function textarea_element_callback() {

		$options = get_option( 'fm_cookies_settings' );

		// Render the output
		echo '<textarea id="textarea_example" name="fm_cookies_settings[textarea_example]" rows="5" cols="50">' . $options['textarea_example'] . '</textarea>';

	} // end textarea_element_callback

	public function checkbox_element_callback() {

		$options = get_option( 'fm_cookies_settings' );

		$html = '<input type="checkbox" id="checkbox_example" name="fm_cookies_settings[checkbox_example]" value="1"' . checked( 1, $options['checkbox_example'], false ) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="checkbox_example">This is an example of a checkbox</label>';

		echo $html;

	} // end checkbox_element_callback

	public function radio_element_callback() {

		$options = get_option( 'fm_cookies_settings' );

		$html = '<input type="radio" id="radio_example_one" name="fm_cookies_settings[radio_example]" value="1"' . checked( 1, $options['radio_example'], false ) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="radio_example_one">Option One</label>';
		$html .= '&nbsp;';
		$html .= '<input type="radio" id="radio_example_two" name="fm_cookies_settings[radio_example]" value="2"' . checked( 2, $options['radio_example'], false ) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="radio_example_two">Option Two</label>';

		echo $html;

	} // end radio_element_callback

	public function select_element_callback() {

		$options = get_option( 'fm_cookies_settings' );

		$html = '<select id="time_options" name="fm_cookies_settings[time_options]">';
		$html .= '<option value="default">' . __( 'Select a time option...', 'functions-manager' ) . '</option>';
		$html .= '<option value="never"' . selected( $options['time_options'], 'never', false) . '>' . __( 'Never', 'functions-manager' ) . '</option>';
		$html .= '<option value="sometimes"' . selected( $options['time_options'], 'sometimes', false) . '>' . __( 'Sometimes', 'functions-manager' ) . '</option>';
		$html .= '<option value="always"' . selected( $options['time_options'], 'always', false) . '>' . __( 'Always', 'functions-manager' ) . '</option>';	$html .= '</select>';

		echo $html;

	} // end select_element_callback

}

?>