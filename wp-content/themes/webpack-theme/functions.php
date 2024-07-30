<?php
/**
 * FPI functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if (!defined('T_PREFIX')) define('T_PREFIX', 'fpi');

// require_once get_theme_file_path('/inc/custom-post-type.php');
// require_once get_theme_file_path('/inc/user-functions.php');
// require_once get_theme_file_path('/inc/filter-functions.php');
require_once get_theme_file_path('/inc/theme-settings.php');
require_once get_theme_file_path('/inc/enqueue.php');
require_once get_theme_file_path('/inc/menu.php');
require_once get_theme_file_path('/inc/custom_post_types.php');
require_once get_theme_file_path('/inc/posts_func.php');



// add_action('init', 'create_custom_posts');
// function create_custom_posts()
// {

// 	//CPT Sectors
// 	register_post_type(
// 		'Sectors',
// 		array(
// 			'labels' => array(
// 				'name' => __('Sectors'),
// 				'singular_name' => __('Sectors')
// 			),
// 			'public' => true,
// 			'has_archive' => false,
// 			'rewrite' => array('slug' => 'sectors'),
// 			'show_in_rest' => true,
// 			'capability_type' => 'post',
// 			'hierarchical' => true,
// 			'menu_position' => null,
// 			'publicly_queryable'  => false,
// 			'supports' => array('title', 'thumbnail')
// 		)
// 	);

// 	// Custom taxonomy - Kategori for Ansatte
// 	$kategori = array(
// 		'name' => _x('Kategori', 'taxonomy general name'),
// 		'singular_name' => _x('Kategori', 'taxonomy singular name'),
// 		'search_items' => __('Søkestedtype'),
// 		'all_items' => __('Alle Kategori'),
// 		'parent_item' => __('Overordnet kategoritype'),
// 		'parent_item_colon' => __('Overordnet elementtype:'),
// 		'edit_item' => __('Rediger kategoritype'),
// 		'update_item' => __('Oppdater kategoritype'),
// 		'add_new_item' => __('Legg til ny kategoritype'),
// 		'new_item_name' => __('Nytt elementnavn'),
// 		'menu_name' => __('Kategori'),
// 	);

// 	register_taxonomy(
// 		'sector_kategori',
// 		array('sectors'),
// 		array(
// 			'hierarchical' => true,
// 			'labels' => $kategori,
// 			'show_ui'           => true,
// 			'show_admin_column' => true,
// 			'query_var'         => true,
// 			'show_in_rest' => true,
// 			'has_archive' => false,
// 		)
// 	);

// }



// add_filter('gform_pre_render_1', 'populate_posts_custom');
// add_filter('gform_pre_validation_1', 'populate_posts_custom');
// add_filter('gform_pre_submission_filter_1', 'populate_posts_custom');
// add_filter('gform_admin_pre_render_1', 'populate_posts_custom');
// function populate_posts_custom($form)
// {

// 	foreach ($form['fields'] as $field) {

// 		//$field->type != 'select' ||

// 		if (strpos($field->cssClass, 'show-sectors') === false) {
// 			continue;
// 		}

// 		$posts = get_posts('numberposts=-1&post_type=sectors&order=ASC');

// 		$choices = array();

// 		foreach ($posts as $post) {
// 			$choices[] = array('text' => $post->post_title, 'value' => $post->post_title);
// 		}

// 		// update 'Select a Post' to whatever you'd like the instructive option to be
// 		$field->placeholder = 'Select a Post';
// 		$field->choices = $choices;
// 	}

// 	return $form;
// }


// Hook to various Gravity Forms filters to populate the custom post types in the form
// Hook to various Gravity Forms filters to populate the custom post types in the form
// add_filter('gform_pre_render_1', 'populate_posts_custom');
// add_filter('gform_pre_validation_1', 'populate_posts_custom');
// add_filter('gform_pre_submission_filter_1', 'populate_posts_custom');
// add_filter('gform_admin_pre_render_1', 'populate_posts_custom');

// function populate_posts_custom($form)
// {
// 	// Loop through each field in the form
// 	foreach ($form['fields'] as &$field) {
// 		// Check if the field's CSS class contains 'show-sectors' and if it's a select field
// 		if (strpos($field->cssClass, 'show-sectors') === false || $field->type != 'select') {
// 			continue;
// 		}

// 		// Fetch posts of custom post type 'sectors'
// 		$posts = get_posts(array(
// 			'numberposts' => -1,
// 			'post_type' => 'sectors',
// 			'orderby' => 'title',
// 			'order' => 'ASC'
// 		));

// 		// Initialize choices array with existing choices
// 		$choices = $field->choices;

// 		// Create an array to track existing values
// 		$existing_values = array();

// 		// Add existing choices to the tracking array
// 		foreach ($choices as $choice) {
// 			$existing_values[$choice['value']] = true;
// 		}

// 		// Loop through each post and add it to the choices array if not already added
// 		foreach ($posts as $post) {
// 			if (!isset($existing_values[$post->post_title])) {
// 				$choices[] = array('text' => $post->post_title, 'value' => $post->post_title);
// 				$existing_values[$post->post_title] = true;
// 			}
// 		}

// 		// Set the updated choices for the field
// 		$field->choices = $choices;
// 	}

// 	// Return the modified form
// 	return $form;
// }

/**
 * @param $taxonomy_handle
 * @param $options (default options that need to be attached)
 * @param $order_by
 * @return WP_Term[]
 */
function fetch_wp_terms($taxonomy_handle, $options, $order_by = 'name')
{
    $selectOptions = get_terms(array(
        'taxonomy' => $taxonomy_handle,
        'hide_empty' => false, // Set to true if you want to hide empty categories
        'orderby' => $order_by,
        'order' => 'ASC'
    ));

    if($options)
        $selectOptions = array_merge($options, $selectOptions);

    return $selectOptions;
}


const DEFAULT_ALL_OPTION = ["" => "All"];
const DOWNLOAD_LINK_CONST = ['brochures', 'catalogues', 'profiles', 'studies', 'success-stories'];

/** function returns default sorting array.
 * @param $options
 * @return array[]
 */
function fetch_default_sorts($options)
{
    $selectOptions = [
        'latest' => 'Latest',
        'oldest' => 'Oldest',
        'a_z' => 'A-Z',
        'z_a' => 'Z-A',
    ];


    if($options)
        $selectOptions = array_merge($options, $selectOptions);

    return $selectOptions;
}

/** function returns WP_query args for sorting.
 * @return array[]
 */
function get_sort_query_options()
{
    $args = [
            'orderby' => 'date',
            'order' => 'DESC',
    ];
    $sortOption = (isset($_GET['sort_by'])) ? urldecode($_GET['sort_by']) : '';

    switch ($sortOption) {
        case 'latest':
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
            break;
        case 'oldest':
            $args['orderby'] = 'date';
            $args['order'] = 'ASC';
            break;
        case 'a_z':
            $args['orderby'] = 'title';
            $args['order'] = 'ASC';
            break;
        case 'z_a':
            $args['orderby'] = 'title';
            $args['order'] = 'DESC';
            break;
    }

    return $args;
}

/** function returns taxonomy-handle & template-part based on post_type
 * @param $postType
 * @return string[]
 */
function get_post_type_configs($postType)
{
    $categoryMap = array(
        'brochures'       => ['taxonomy-handle' => 'brochures_category', 'template-part' => 'downloads-card'],
        'catalogues'      => ['taxonomy-handle' => 'catalogues_category', 'template-part' => 'downloads-card'],
        'profiles'        => ['taxonomy-handle' => 'profiles_category', 'template-part' => 'downloads-card'],
        'studies'         => ['taxonomy-handle' => 'studies_category', 'template-part' => 'downloads-card'],
        'success-stories' => ['taxonomy-handle' => 'success_stories_category', 'template-part' => 'downloads-card'],
        'vacancies'       => ['taxonomy-handle' => 'vacancies_category', 'template-part' => 'vacancy_card'],
        'news'            => ['taxonomy-handle' => 'news_category', 'template-part' => 'news_card'],
        'events'          => ['taxonomy-handle' => 'events_category', 'template-part' => 'events_card'],
        'products'        => ['taxonomy-handle' => 'products_category', 'template-part' => 'product_card'],
    );

    return isset($categoryMap[$postType]) ? $categoryMap[$postType] : $categoryMap['brochures'];
}

/** function for listing and filtering pages. this is a common function used on multiple pages.
 * @param $postType
 * @param $isDefault
 * @return array[]
 */
function common_filter_ajax($postType, $isDefault = false)
{
    // Sanitize inputs
    $keyword    = isset($_GET['keyword']) ? sanitize_text_field(urldecode($_GET['keyword'])) : '';
    $postType   = isset($_GET['post_type']) ? sanitize_text_field(urldecode($_GET['post_type'])) : sanitize_text_field($postType);
    $page       = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $sort_by    = get_sort_query_options();
    $configs    = get_post_type_configs($postType);

    // Build taxonomy query
    $taxQuery = array();
    $category = isset($_GET['category']) ? sanitize_text_field(urldecode($_GET['category'])) : '';
    if ($category) {
        $taxQuery[] = array(
            'taxonomy' => $configs['taxonomy-handle'],
            'field' => 'slug',
            'terms' => $category,
        );
    }

    // Build meta query
    $metaQuery = [];
    $conditionalRendering = in_array($postType, DOWNLOAD_LINK_CONST);
    if($conditionalRendering) {
        $metaQuery = array(
            array(
                'key' => 'download_link',
                'value' => array(null, false),
                'compare' => 'NOT IN',
            )
        );
    }

    // Build main query args
    $args = array(
        'post_type' => $postType,
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'paged' => $page,
        's' => $keyword,
        'tax_query' => $taxQuery,
        'meta_query' => $metaQuery,
    );
    $args = array_merge($args, $sort_by);
    $query = new WP_Query($args);

    //For first page load
    if($isDefault) {
        return [
            'success' => $query->have_posts(),
            'data' => $query,
            'hasNextPage' => $query->max_num_pages > $page,
        ];
    }

    $out = '';
    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            if($conditionalRendering) {
                $download_link  = get_field('download_link');
                if ($download_link) {
                    get_template_part('template-parts/parts/' . $configs['template-part'], 'post');
                }
            } else {
                get_template_part('template-parts/parts/' . $configs['template-part'], 'post');
            }
        endwhile;
    }
    $out .= ob_get_clean();
    wp_reset_postdata();

    //IF NO DATA
    if(!$out){
        echo json_encode([
            'success' => false,
            'data' => '',
            'hasNextPage' => false,
        ]);
        exit;
    }

    echo json_encode([
        'success' => true,
        'data' => $out,
        'hasNextPage' => $query->max_num_pages > $page,
    ]);
    exit;

}
add_action('wp_ajax_nopriv_common_filter_ajax', 'common_filter_ajax');
add_action('wp_ajax_common_filter_ajax', 'common_filter_ajax');

function accreditations_filter_ajax($isDefault = false)
{
    // Sanitize inputs
    $page       = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Build main query args
    $args = array(
        'post_type' => 'accreditations',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'paged' => $page,
        'meta_query' => array(
            array(
                'key' => 'year',
                'compare' => 'EXISTS',
            ),
        ),
        'orderby' => array(
            'meta_value_num' => 'DESC',
        ),
        'meta_key' => 'year',
    );
    $query = new WP_Query($args);
    $havePosts = $query->have_posts();

    //For first page load
    if($isDefault) {
        return [
            'success' => $havePosts,
            'data' => $query,
            'hasNextPage' => $query->max_num_pages > $page,
        ];
    }

    //IF NO DATA
    if(!$havePosts){
        echo json_encode([
            'success' => false,
            'data' => '',
            'hasNextPage' => false,
        ]);
        exit;
    }

    $items = '';
    ob_start();
    while ($query->have_posts()) : $query->the_post();
        get_template_part('template-parts/parts/accreditations/year_row');
    endwhile;
    $items .= ob_get_clean();

    $popup = '';
    ob_start();
    while ($query->have_posts()) : $query->the_post();
        get_template_part('template-parts/parts/accreditations/popup');
    endwhile;
    $popup .= ob_get_clean();
    wp_reset_postdata();


    echo json_encode([
        'success' => true,
        'items' => $items,
        'popup' => $popup,
        'hasNextPage' => $query->max_num_pages > $page,
    ]);
    exit;

}
add_action('wp_ajax_nopriv_accreditations_filter_ajax', 'accreditations_filter_ajax');
add_action('wp_ajax_accreditations_filter_ajax', 'accreditations_filter_ajax');

function get_search_tabs($tab = null)
{
    $configs = array(
        'all'       => ['title' => 'All', 'post_type' => ['products', 'solutions', 'sectors', 'brochures','catalogues','profiles','studies','success-stories'] , 'template-part' => 'search_card'],
        'products'  => ['title' => 'Products', 'post_type' => 'products' , 'template-part' => 'search_card'],
        'solutions' => ['title' => 'Solutions', 'post_type' => 'solutions' , 'template-part' => 'search_card'],
        'sectors'   => ['title' => 'Sectors', 'post_type' => 'sectors' , 'template-part' => 'search_card'],
        'downloads' => ['title' => 'Downloads', 'post_type' => ['brochures','catalogues','profiles','studies','success-stories'], 'template-part' => 'search_card'],
    );

    if($tab) {
        return $configs[$tab] ?? $configs['all'];
    }

    return $configs;
}

function get_mappings_title($post_type)
{
    $configs = array(
        'products'    => ['title' => 'Products', 'url' => 'products'],
        'solutions'   => ['title' => 'Solutions', 'url' => 'solutions'],
        'sectors'     => ['title' => 'Sectors', 'url' => 'sectors'],
        'brochures'   => ['title' => 'Downloads', 'url' => 'downloads'],
        'catalogues'  => ['title' => 'Downloads', 'url' => 'downloads'],
        'profiles'    => ['title' => 'Downloads', 'url' => 'downloads'],
        'studies'     => ['title' => 'Downloads', 'url' => 'downloads'],
        'success-stories'     => ['title' => 'Downloads', 'url' => 'downloads'],
        );

    $response = $configs[$post_type];
    $response['url'] = site_url($response['url']);

    return $response;
}

function fetch_search_tabs($selected_key = '')
{
    $configs = get_search_tabs();
    $keyword = isset($_GET['s']) ? sanitize_text_field(urldecode($_GET['s'])) : '';

    // Collect all post types in a single array
    $all_post_types = [];
    foreach ($configs as $config) {
        $all_post_types = array_merge($all_post_types, (array) $config['post_type']);
    }
    $all_post_types = array_unique($all_post_types);

    // Build the query arguments
    $args = array(
        'post_type' => $all_post_types,
        'posts_per_page' => -1,
        'fields' => 'ids',
        's' => $keyword
    );

    $query = new WP_Query($args);
    $post_counts = array_fill_keys($all_post_types, 0);

    // Count the number of posts for each post_type
    if ($query->have_posts()) {
        foreach ($query->posts as $post_id) {
            $post_type = get_post_type($post_id);
            if (isset($post_counts[$post_type])) {
                $post_counts[$post_type]++;
            }
        }
    }

    // Prepare the results
    $results = array();
    $total_count = 0;
    foreach ($configs as $key => $config) {
        $count = 0;
        if (is_array($config['post_type'])) {
            foreach ($config['post_type'] as $post_type) {
                $count += isset($post_counts[$post_type]) ? $post_counts[$post_type] : 0;
            }
        } else {
            $count = isset($post_counts[$config['post_type']]) ? $post_counts[$config['post_type']] : 0;
        }

        if($count > 0) {
            // total count for 'all' tab
            $total_count += $count;

            $results[$key] = $config;
            $results[$key]['count'] = $count;
        }
    }

    if ($total_count > 0) {
        $all_result = $configs['all'];
        $all_result['count'] = $total_count;
        $results = array_merge(array('all' => $all_result), $results);
    }


    // Add class 'active' only to the selected tab, if not present then add to the first tab
    if (isset($results[$selected_key])) {
        $results[$selected_key]['class'] = 'active';
    } else {
        $first_key = key($results);
        if ($first_key) {
            $results[$first_key]['class'] = 'active';
        }
    }

    wp_reset_postdata();
    return $results;
}

function search_filter_ajax($theTab = '', $isDefault = false)
{
    // Sanitize inputs
    $keyword    = isset($_GET['s']) ? sanitize_text_field(urldecode($_GET['s'])) : '';
    $tab        = isset($_GET['tab']) ? sanitize_text_field(urldecode($_GET['tab'])) : $theTab;
    $tab        = $tab ? $tab : 'all';
    $changed    = isset($_GET['changed']) ? rest_sanitize_boolean(urldecode($_GET['changed'])) : false;
    $page       = isset($_GET['page']) ? intval($_GET['page']) : 1;

    $tabItems = '';
    $totalCount = 0;
    if($changed) {
        $all_the_tabs = fetch_search_tabs($tab);

        ob_start();
        foreach ($all_the_tabs as $itemKey => $itemTab) {
            set_query_var('result_key', $itemKey);
            set_query_var('result', $itemTab);
            get_template_part('template-parts/parts/search/tab');
        }
        $tabItems .= ob_get_clean();

        //if passed tab not exists in found tabs then set to all tab
        $tab = $all_the_tabs[$tab] ? $tab : 'all';

        //get count of all tab
        $totalCount = $all_the_tabs['all']['count'];
    }

    $configs    = get_search_tabs($tab);
    // Build main query args
    $args = array(
        'post_type' => $configs['post_type'],
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'paged' => $page,
        'orderby' => 'date',
        'order' => 'DESC',
        's' => $keyword
    );
    $query = new WP_Query($args);
    $havePosts = $query->have_posts();

    //For first page load
    if($isDefault) {
        return [
            'success' => $havePosts,
            'data' => $query,
            'hasNextPage' => $query->max_num_pages > $page,
        ];
    }

    //IF NO DATA
    if(!$havePosts){
        echo json_encode([
            'success' => false,
            'data' => '',
            'tabs' => '',
            'hasNextPage' => false,
            'count' => 'No results Found',
        ]);
        exit;
    }

    $items = '';
    ob_start();
    while ($query->have_posts()) : $query->the_post();
        get_template_part('template-parts/parts/search/search_card');
    endwhile;
    $items .= ob_get_clean();

    $resultWord = ($totalCount === 1) ? 'result' : 'results';

    echo json_encode([
        'success'   => true,
        'items'     => $items,
        'tabs'      => $tabItems,
        'hasNextPage' => $query->max_num_pages > $page,
        'count' => sprintf('%d %s found', $totalCount, $resultWord),
    ]);
    exit;

}
add_action('wp_ajax_nopriv_search_filter_ajax', 'search_filter_ajax');
add_action('wp_ajax_search_filter_ajax', 'search_filter_ajax');


/** function for listing and filtering products
 * @param $isDefault
 * @param $slug
 * @return array[]
 */
function products_filter_ajax($slug, $isDefault = false)
{
    // Sanitize inputs
    $keyword    = isset($_GET['keyword']) ? sanitize_text_field(urldecode($_GET['keyword'])) : '';
    $slug       = isset($_GET['slug']) ? sanitize_text_field(urldecode($_GET['slug'])) : $slug;
    $page       = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $sort_by    = get_sort_query_options();
    $postType   = 'products';
    $configs    = get_post_type_configs($postType);

    // Build main query args
    $args = array(
        'post_type' => $postType,
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'paged' => $page,
        's' => $keyword,
        'tax_query' => array(
            array(
                'taxonomy' => $configs['taxonomy-handle'],
                'field' => 'slug',
                'terms' => $slug,
            ),
        ),
    );
    $args = array_merge($args, $sort_by);
    $query = new WP_Query($args);
    $havePosts = $query->have_posts();

    //For first page load
    if($isDefault) {
        return [
            'success' => $havePosts,
            'data' => $query,
            'hasNextPage' => $query->max_num_pages > $page,
        ];
    }

    //IF NO DATA
    if(!$havePosts){
        echo json_encode([
            'success' => false,
            'data' => '',
            'hasNextPage' => false,
        ]);
        exit;
    }

    $out = '';
    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/parts/' . $configs['template-part'], 'post');
        endwhile;
    }
    $out .= ob_get_clean();
    wp_reset_postdata();

    echo json_encode([
        'success' => true,
        'data' => $out,
        'hasNextPage' => $query->max_num_pages > $page,
    ]);
    exit;
}
add_action('wp_ajax_nopriv_products_filter_ajax', 'products_filter_ajax');
add_action('wp_ajax_products_filter_ajax', 'products_filter_ajax');



/** function for listing and filtering relevant products
 * @param $isDefault
 * @param $post_id
 * @return array[]
 */
function relevant_products_filter_ajax($post_id, $isDefault = false)
{
    // Sanitize inputs
    $keyword    = isset($_GET['keyword']) ? sanitize_text_field(urldecode($_GET['keyword'])) : '';
    $post_id    = isset($_GET['cpid']) ? sanitize_text_field(urldecode($_GET['cpid'])) : $post_id;
    $page       = isset($_GET['page']) ? intval($_GET['page']) : 1;

    //var_dump($term_ids);exit;
    $terms = get_the_terms($post_id, 'products_category');

    // Build taxonomy query
    $taxQuery = array();
    if ($terms) {
        // Extract term IDs dynamically
        $term_ids = array_map(function($term) {
            return $term->term_id;
        }, $terms);

        $taxQuery[] = array(
            'taxonomy' => 'products_category',
            'field'    => 'term_id',
            'terms'    => $term_ids,
        );
    }

    // Build main query args
    $args = array(
        'post_type' => 'products',
        'posts_per_page' => 6,
        'paged' => $page,
        's' => $keyword,
        'tax_query' => $taxQuery,
        'post__not_in' => array($post_id)
    );

    $query = new WP_Query($args);
    $havePosts = $query->have_posts();

    //For first page load
    if($isDefault) {
        return [
            'success' => $havePosts,
            'data' => $query,
            'hasNextPage' => $query->max_num_pages > $page,
        ];
    }

    //IF NO DATA
    if(!$havePosts){
        echo json_encode([
            'success' => false,
            'data' => '',
            'hasNextPage' => false,
        ]);
        exit;
    }


    $out = '';
    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/parts/product_card', 'post');
        endwhile;
    }
    $out .= ob_get_clean();
    wp_reset_postdata();

    echo json_encode([
        'success' => true,
        'data' => $out,
        'hasNextPage' => $query->max_num_pages > $page,
    ]);
    exit;
}
add_action('wp_ajax_nopriv_relevant_products_filter_ajax', 'relevant_products_filter_ajax');
add_action('wp_ajax_relevant_products_filter_ajax', 'relevant_products_filter_ajax');