<?php

function fm_login_logo_title() {
    $options = get_option('fm_wordpress_settings');
    return $options['wp_logo_settings_title'];
}
add_filter( 'login_headertext', 'fm_login_logo_title' );

?>