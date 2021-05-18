<?php

function fm_allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'fm_allow_svg_upload');

function fm_fix_svg() {
    echo <<<EOD
        <style>
            td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
                width: 100% !important; 
                height: auto !important; 
            }
        </style>
    EOD;
}
add_action('admin_head', 'fm_fix_svg');

?>
