<?php
/*
=============================================================
1.0 - Theme Enqueue
=============================================================
*/

function theme_enqueue_scripts()
{
    if (is_admin()) return false;
    // Config version cache
    // $json_file_path = __DIR__ . '/../config/version.json';
    // $data = file_get_contents($json_file_path);
    // $data = json_decode($data, true);
    // $fileversion = $data['version'];
    $fileversion = json_decode(file_get_contents(__DIR__ . '/../config/version.json'), true)['version'];


    //  Styles
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/app.min.css', '', $fileversion);


    // Scripts
    // wp_enqueue_script( 'FontAwesome', 'https://kit.fontawesome.com/c6e0cd704f.js');

    wp_enqueue_script('custom-js', get_template_directory_uri() . '/dist/js/app-' . $fileversion . '.min.js', array('jquery'), $fileversion, true);


    // Test



    wp_localize_script('app-script', 'adminajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('load_more_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');



/*
======================================
 1.1  For Admin Backend
======================================
*/
add_action('admin_enqueue_scripts', 'load_admin_style');
function load_admin_style()
{
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/dist/css/admin.min.css', false, '1.0.0');
}
