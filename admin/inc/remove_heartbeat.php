<?php

function fm_remove_heartbeat() {
    wp_deregister_script('heartbeat');
}
add_action( 'init', 'fm_remove_heartbeat', 1 );
    
?>