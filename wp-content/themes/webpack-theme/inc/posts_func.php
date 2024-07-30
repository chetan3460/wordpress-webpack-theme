<?php
/*
=============================================================
1.0 - Fetching sectors posts as categories for case studies
=============================================================
*/



function sync_sectors_to_studies_category($post_id, $post, $update)
{
    // Only proceed if the post type is 'sectors'
    if ($post->post_type != 'sectors') {
        return;
    }

    // Get the sector title to use as a term
    $sector_title = $post->post_title;

    // Check if the term already exists
    $term = term_exists($sector_title, 'studies_category');

    // If the term doesn't exist, insert it
    if ($term === 0 || $term === null) {
        $term_result = wp_insert_term($sector_title, 'studies_category');
        if (is_wp_error($term_result)) {
            error_log('Failed to insert term: ' . $term_result->get_error_message());
            return;
        }
    } else {
        // Optionally update the term if needed
        $term_id = $term['term_id'];
        $term_result = wp_update_term($term_id, 'studies_category', array('name' => $sector_title));
        if (is_wp_error($term_result)) {
            error_log('Failed to update term: ' . $term_result->get_error_message());
            return;
        }
    }
}
add_action('save_post', 'sync_sectors_to_studies_category', 10, 3);

function delete_sector_term($post_id)
{
    $post = get_post($post_id);

    // Only proceed if the post type is 'sectors'
    if ($post->post_type != 'sectors') {
        return;
    }

    // Get the sector title to use as a term
    $sector_title = $post->post_title;

    // Check if the term exists
    $term = term_exists($sector_title, 'studies_category');

    // If the term exists, delete it
    if ($term !== 0 && $term !== null) {
        $term_result = wp_delete_term($term['term_id'], 'studies_category');
        if (is_wp_error($term_result)) {
            error_log('Failed to delete term: ' . $term_result->get_error_message());
        }
    }
}
add_action('before_delete_post', 'delete_sector_term');

// function force_sync_existing_sectors()
// {
//     // Get all sectors posts
//     $sectors = get_posts(array(
//         'post_type' => 'sectors',
//         'numberposts' => -1,
//     ));

//     // Loop through each sector and add/update terms in studies_category
//     foreach ($sectors as $sector) {
//         $sector_title = $sector->post_title;
//         $term = term_exists($sector_title, 'studies_category');
//         if ($term === 0 || $term === null) {
//             wp_insert_term($sector_title, 'studies_category');
//         } else {
//             wp_update_term($term['term_id'], 'studies_category', array('name' => $sector_title));
//         }
//     }
// }
// add_action('init', 'force_sync_existing_sectors');

/*
=============================================================
1.1 - Get page url based on template
=============================================================
*/

function getTplPageURL($template_name)
{
    $url = null;
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $template_name
    ));
    if (isset($pages[0])) {
        $url = get_page_link($pages[0]->ID);
    }
    return $url;
}



/*
=============================================================
1.2 - Custom breadcrumbs
=============================================================
*/

add_filter('wpseo_breadcrumb_links', 'custom_breadcrumb');
function custom_breadcrumb($links)
{
    if (is_singular('vacancies')) {
        global $post;

        // Find the position of the 'home' link
        $home_link_key = 0;
        foreach ($links as $key => $link) {
            if ($link['url'] === get_home_url()) {
                $home_link_key = $key;
                break;
            }
        }

        // Add the 'Vacancy Listing' breadcrumb linked to your custom template
        $vacancy_listing_url = getTplPageURL('template-vacancies.php');

        $breadcrumb = array(
            'url' => $vacancy_listing_url,
            'text' => 'Vacancy Listing',
        );

        array_splice($links, $home_link_key + 1, 0, array($breadcrumb));
    }

    if (is_singular('sectors')) {
        global $post;

        // Find the position of the 'home' link
        $home_link_key = 0;
        foreach ($links as $key => $link) {
            if ($link['url'] === get_home_url()) {
                $home_link_key = $key;
                break;
            }
        }

        // Add the 'Vacancy Listing' breadcrumb linked to your custom template
        $sector_url = getTplPageURL('template-sectors.php');

        $breadcrumb = array(
            'url' => $sector_url,
            'text' => 'Sectors',
        );

        array_splice($links, $home_link_key + 1, 0, array($breadcrumb));
    }

    if (is_singular('news') || is_singular('events')) {
        // Create custom breadcrumb
        $breadcrumb = array();

        // Add the parent page
        $breadcrumb[] = array(
            'url' => getTplPageURL('template-news-events.php'),
            'text' => 'News & Events',
        );

        // Add the post type archive link within the parent page structure
        if (is_singular('news')) {
            $breadcrumb[] = array(
                'url' => getTplPageURL('template-news-events.php') . 'news/',
                'text' => 'News',
            );
        } elseif (is_singular('events')) {
            $breadcrumb[] = array(
                'url' => getTplPageURL('template-news-events.php') . 'events/',
                'text' => 'Events',
            );
        }

        // Find and remove the existing 'News' or 'Events' breadcrumb to prevent duplication
        foreach ($links as $key => $link) {
            if ($link['text'] === 'News' || $link['text'] === 'Events') {
                unset($links[$key]);
            }
        }

        // Reindex the array to fix the unset array gap
        $links = array_values($links);

        // Remove the last item in the breadcrumbs array (the current post title)
        array_pop($links);

        // Find the position of the 'home' link and splice in the custom breadcrumb
        $home_link_key = 0;
        foreach ($links as $key => $link) {
            if ($link['url'] === get_home_url()) {
                $home_link_key = $key;
                break;
            }
        }

        array_splice($links, $home_link_key + 1, 0, $breadcrumb);

        // Add the current post title back to the breadcrumbs array
        $links[] = array(
            'url' => get_permalink(),
            'text' => single_post_title('', false),
        );
    }


    return $links;
}



?>



