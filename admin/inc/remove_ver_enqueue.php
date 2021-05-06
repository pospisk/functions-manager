<?php

function fm_remove_wp_ver( $src ) {
    if ( strpos( $src, 'ver=' ) ){
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'style_loader_src', 'fm_remove_wp_ver', 9999 );
add_filter( 'script_loader_src', 'fm_remove_wp_ver', 9999 );

?>