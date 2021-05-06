<?php

function fm_remove_oembed(){
    wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'fm_remove_oembed' );

?>