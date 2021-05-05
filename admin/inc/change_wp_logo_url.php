<?php

function fm_login_logo() {
    $options = get_option('fm_wordpress_settings');
    $logo_size;
    if ($options['wp_logo_settings_size'] !== ''){
        $logo_size = $options['wp_logo_settings_size'] . 'px ';
    }else{
        $logo_size = 'inherit';
    }
    echo '
    <style type="text/css">
        #login h1 a,
        .login h1 a { 
            background-image: url("' . $options['wp_logo_settings_url'] . '") !important; 
            background-size: contain !important;
            width: ' . $logo_size . ' !important;
            height: ' . $logo_size . ' !important;
        }
    </style>
    ';
}
add_action('login_head', 'fm_login_logo');

?>