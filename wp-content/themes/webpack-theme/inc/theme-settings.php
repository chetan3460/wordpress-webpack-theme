<?php

/*
=============================================================
1.0 - Theme Support
=============================================================
*/

add_action('after_setup_theme', 'theme_setup');

function theme_setup()
{
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'script', 'style'));
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support('widgets');
    add_post_type_support('page', 'excerpt');

    // Custom image sizes

    add_image_size('size-1000*1156', 1000, 1156, true);
    add_image_size('size-576*652', 567, 652, true);
    add_image_size('size-876*1026', 876, 1026, true);
    add_image_size('size-560*520', 560, 520, true);

    add_image_size('size-2880*1500', 2880, 1500, true);

    add_image_size('blur', 1, 1, true);
}

/*
=============================================================
1.1 - Add support for SVG images
=============================================================
*/

define('ALLOW_UNFILTERED_UPLOADS', true);
add_action('upload_mimes', 'add_file_types_to_uploads');
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}

/*
=============================================================
1.2 - ACF Local JSON setup
=============================================================
*/


add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
}


/*
=============================================================
1.3 - Pass custom class to logo
=============================================================
*/


function custom_logo_with_class($html)
{
    $html = str_replace('custom-logo', 'w-[8.4rem]', $html);
    return $html;
}
add_filter('get_custom_logo', 'custom_logo_with_class');


/*
=============================================================
1.4 - Disable gutenberg
=============================================================
*/


function disable_gutenberg_for_template($use_block_editor, $post_type)
{
    $use_block_editor = false;
    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_template', 10, 2);


/*
=============================================================
1.4 - Populate Gravity forms inside ACF select
=============================================================
*/


function populate_acf_select_box_with_gravity_forms($field)
{
    // Reset choices
    $field['choices'] = array();

    // Get all Gravity Forms
    if (class_exists('GFAPI')) {
        $forms = GFAPI::get_forms();

        // Loop through forms and add them as choices
        if (!empty($forms)) {
            foreach ($forms as $form) {
                $form_id = $form['id'];
                $form_title = $form['title'];
                $field['choices'][$form_id] = $form_title;
            }
        }
    }

    return $field;
}
add_filter('acf/load_field/name=gravity_forms_select', 'populate_acf_select_box_with_gravity_forms');


/*
=============================================================
1.4 - webp
=============================================================
*/

function allow_webp_upload($mimes)
{
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'allow_webp_upload');
