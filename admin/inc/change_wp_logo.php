<?php

function fm_custom_login_logo() {
    $options = get_option('fm_wordpress_settings');
    echo '
    <style type="text/css">
        h1 a { background-image: url("' . $options['change_wp_logo'] . '") !important; }
    </style>
    ';
}
add_action('login_head', 'fm_custom_login_logo');

?>