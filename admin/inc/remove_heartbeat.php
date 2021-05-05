<?php

function remove_heartbeat() {
    wp_deregister_script('heartbeat');
}
add_action( 'init', 'remove_heartbeat', 1 );
    
?>