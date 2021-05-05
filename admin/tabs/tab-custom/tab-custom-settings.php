<?php

trait Tab_Custom_Settings {

	/**
	 * This function renders the interface elements for toggling the visibility of the header element.
	 *
	 * It accepts an array or arguments and expects the first element in the array to be the description
	 * to be displayed next to the checkbox.
	 */
	public function remove_widgetss($args) {

		// First, we read the options collection
		$options = get_option('fm_custom_settings');

		// Next, we update the name attribute to access this element's ID in the context of the display options array
		// We also access the remove_widgets element of the options collection in the call to the checked() helper function
		$html = '<input type="checkbox" id="remove_widgets" name="fm_custom_settings[remove_widgets]" value="1" ' . checked( 1, isset( $options['remove_widgets'] ) ? $options['remove_widgets'] : 0, false ) . '/>';

		// Here, we'll take the first argument of the array and add it to a label next to the checkbox
		$html .= '<label for="remove_widgets">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	}

    public function allow_svg_uploadss($args) {

		$options = get_option('fm_custom_settings');

		$html = '<input type="checkbox" id="allow_svg_upload" name="fm_custom_settings[allow_svg_upload]" value="1" ' . checked( 1, isset( $options['allow_svg_upload'] ) ? $options['allow_svg_upload'] : 0, false ) . '/>';
		$html .= '<label for="allow_svg_upload">&nbsp;'  . $args[0] . '</label>';
		$html .= '<br><br><span>Due to custom, SVG files have to start with the following xml snippet: <pre class="wp-block-code"><code>&lt;?xml version="1.0" encoding="utf-8"?&gt;</code></pre></span>';

		echo $html;

	}

	public function remove_emojiss($args) {

		$options = get_option('fm_custom_settings');

		$html = '<input type="checkbox" id="remove_emojis" name="fm_custom_settings[remove_emojis]" value="1" ' . checked( 1, isset( $options['remove_emojis'] ) ? $options['remove_emojis'] : 0, false ) . '/>';
		$html .= '<label for="remove_emojis">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	}

}

?>