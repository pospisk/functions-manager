<?php

trait Tab_Elementor_Settings {

    public function twitter_callback() {

		// First, we read the social options collection
		$options = get_option( 'wppb_demo_social_options' );

		// Next, we need to make sure the element is defined in the options. If not, we'll set an empty string.
		$url = '';
		if( isset( $options['twitter'] ) ) {
			$url = esc_url( $options['twitter'] );
		} // end if

		// Render the output
		echo '<input type="text" id="twitter" name="wppb_demo_social_options[twitter]" value="' . $url . '" />';

	} // end twitter_callback

	public function facebook_callback() {

		$options = get_option( 'wppb_demo_social_options' );

		$url = '';
		if( isset( $options['facebook'] ) ) {
			$url = esc_url( $options['facebook'] );
		} // end if

		// Render the output
		echo '<input type="text" id="facebook" name="wppb_demo_social_options[facebook]" value="' . $url . '" />';

	} // end facebook_callback

	public function googleplus_callback() {

		$options = get_option( 'wppb_demo_social_options' );

		$url = '';
		if( isset( $options['googleplus'] ) ) {
			$url = esc_url( $options['googleplus'] );
		} // end if

		// Render the output
		echo '<input type="text" id="googleplus" name="wppb_demo_social_options[googleplus]" value="' . $url . '" />';

	} // end googleplus_callback

}

?>