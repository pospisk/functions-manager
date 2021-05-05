<?php

trait Tab_Wordpress_Settings {


	/**
	 * This function renders the interface elements for toggling the visibility of the header element.
	 *
	 * It accepts an array or arguments and expects the first element in the array to be the description
	 * to be displayed next to the checkbox.
	 */
	public function remove_widgets($args) {

		// First, we read the options collection
		$options = get_option('fm_wordpress_settings');

		// Next, we update the name attribute to access this element's ID in the context of the display options array
		// We also access the remove_widgets element of the options collection in the call to the checked() helper function
		$html = '<input type="checkbox" id="remove_widgets" name="fm_wordpress_settings[remove_widgets]" value="1" ' . checked( 1, isset( $options['remove_widgets'] ) ? $options['remove_widgets'] : 0, false ) . '/>';

		// Here, we'll take the first argument of the array and add it to a label next to the checkbox
		$html .= '<label for="remove_widgets">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} // end remove_widgets

    public function allow_svg_upload($args) {

		$options = get_option('fm_wordpress_settings');

		$html = '<input type="checkbox" id="allow_svg_upload" name="fm_wordpress_settings[allow_svg_upload]" value="1" ' . checked( 1, isset( $options['allow_svg_upload'] ) ? $options['allow_svg_upload'] : 0, false ) . '/>';
		$html .= '<label for="allow_svg_upload">&nbsp;'  . $args[0] . '</label>';
		$html .= '<br><br><span>Due to WordPress, SVG files have to start with the following xml snippet: <pre class="wp-block-code"><code>&lt;?xml version="1.0" encoding="utf-8"?&gt;</code></pre></span>';

		echo $html;

	} // end allow_svg_upload

	public function remove_emojis($args) {

		$options = get_option('fm_wordpress_settings');

		$html = '<input type="checkbox" id="remove_emojis" name="fm_wordpress_settings[remove_emojis]" value="1" ' . checked( 1, isset( $options['remove_emojis'] ) ? $options['remove_emojis'] : 0, false ) . '/>';
		$html .= '<label for="remove_emojis">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} // end remove_emojis

	public function remove_heartbeat($args) {

		$options = get_option('fm_wordpress_settings');

		$html = '<input type="checkbox" id="remove_heartbeat" name="fm_wordpress_settings[remove_heartbeat]" value="1" ' . checked( 1, isset( $options['remove_heartbeat'] ) ? $options['remove_heartbeat'] : 0, false ) . '/>';
		$html .= '<label for="remove_heartbeat">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} // end remove_heartbeat

	public function wp_logo_settings_active($args) {

		$options = get_option('fm_wordpress_settings');

		$html = '<input type="checkbox" id="wp_logo_settings_active" data-children="'.$args[1].'" name="fm_wordpress_settings[wp_logo_settings_active]" value="1" ' . checked( 1, isset( $options['wp_logo_settings_active'] ) ? $options['wp_logo_settings_active'] : 0, false ) . '/>';
		$html .= '<label for="wp_logo_settings_active">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} // end remove_emojis

	public function wp_logo_settings_url($args) {

		$options = get_option('fm_wordpress_settings');

		$url = '';
		if( isset( $options['wp_logo_settings_url'] ) ) {
			$url = esc_url( $options['wp_logo_settings_url'] );
		} 

		// Render the output
		$html = '<input type="text" id="wp_logo_settings_url" name="fm_wordpress_settings[wp_logo_settings_url]" value="' . $url . '" />';
		$html .= '<label for="wp_logo_settings_url">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} 

	public function wp_logo_settings_link($args) {

		$options = get_option('fm_wordpress_settings');

		$url = '';
		if( isset( $options['wp_logo_settings_link'] ) ) {
			$url = esc_url( $options['wp_logo_settings_link'] );
		} 

		// Render the output
		$html = '<input type="text" id="wp_logo_settings_link" name="fm_wordpress_settings[wp_logo_settings_link]" value="' . $url . '" />';
		$html .= '<label for="wp_logo_settings_link">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} 

	public function wp_logo_settings_size($args) {

		$options = get_option('fm_wordpress_settings');

		$url = $options['wp_logo_settings_size'];

		// Render the output
		$html = '<input type="number" id="wp_logo_settings_size" name="fm_wordpress_settings[wp_logo_settings_size]" value="' . $url . '" />';
		$html .= '<label for="wp_logo_settings_size">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} 

	public function wp_logo_settings_title($args) {

		$options = get_option('fm_wordpress_settings');

		$title = $options['wp_logo_settings_title'];

		// Render the output
		$html = '<input type="text" id="wp_logo_settings_title" name="fm_wordpress_settings[wp_logo_settings_title]" value="' . $title . '" />';
		$html .= '<label for="wp_logo_settings_title">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} 

}

?>