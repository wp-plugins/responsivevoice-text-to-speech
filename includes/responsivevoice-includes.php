<?php

function RV_load_scripts(){
    wp_enqueue_style('rv-style', plugin_dir_url(__FILE__) . 'css/responsivevoice.css');
    wp_enqueue_script( 'responsive-voice', 'http://code.responsivevoice.org/responsivevoice.js');
}

add_action('wp_enqueue_scripts', 'RV_load_scripts');
?>