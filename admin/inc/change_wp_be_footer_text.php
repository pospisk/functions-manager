<?php

function fm_change_wp_be_footer_text() {
    $options = get_option('fm_wordpress_settings');
    echo $options['wp_backend_footer_text'];
}
add_filter( 'admin_footer_text', 'fm_change_wp_be_footer_text' );

?>