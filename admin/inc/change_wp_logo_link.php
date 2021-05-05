<?php

function fm_login_logo_link($url) {
    $options = get_option('fm_wordpress_settings');
    return $options['wp_logo_settings_link'];
}
add_filter( 'login_headerurl', 'fm_login_logo_link' );

?>