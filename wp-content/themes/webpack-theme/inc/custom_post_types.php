<?php
add_action('init', 'create_custom_posts');
function create_custom_posts()
{
    // CPT News
    register_post_type(
        'news',
        array(
            'labels' => array(
                'name' => __('News'),
                'singular_name' => __('News')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'news'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for News
    $news_cat = array(
        'name' => _x('Category', 'news category'),
        'singular_name' => _x('Category', 'news category'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'news_category',
        array('news'),
        array(
            'hierarchical' => true,
            'labels' => $news_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'news-category'),
        )
    );

    //CPT Solutions
    register_post_type(
        'solutions',
        array(
            'labels' => array(
                'name' => __('Solutions'),
                'singular_name' => __('Solutions')
            ),
            'public' => true,
            // 'has_archive' => false,
            'rewrite' => array('slug' => 'solutions'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for solutions
    $solutions_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'solutions_category',
        array('solutions'),
        array(
            'hierarchical' => true,
            'labels' => $solutions_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'solutions-category'),
        )
    );

    //CPT Sectors
    register_post_type(
        'sectors',
        array(
            'labels' => array(
                'name' => __('Sectors'),
                'singular_name' => __('Sectors')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'sectors'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for sectors
    $sectors_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'sectors_category',
        array('sectors'),
        array(
            'hierarchical' => true,
            'labels' => $sectors_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'sectors-category'),
        )
    );


    //CPT Products
    register_post_type(
        'products',
        array(
            'labels' => array(
                'name' => __('Products'),
                'singular_name' => __('Products')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for products
    $products_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'products_category',
        array('products'),
        array(
            'hierarchical' => true,
            'labels' => $products_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => array('thumbnail'),
            'rewrite' => array('slug' => 'products-category'),
        )
    );


    //CPT Teams
    register_post_type(
        'teams',
        array(
            'labels' => array(
                'name' => __('Teams'),
                'singular_name' => __('Teams')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'teams'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => false,
            'supports' => array('title', 'thumbnail', 'excerpt')
        )
    );

    //CPT Teams
    register_post_type(
        'accreditations',
        array(
            'labels' => array(
                'name' => __('Accreditations'),
                'singular_name' => __('Accreditations')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'accreditations'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    //CPT Profiles
    register_post_type(
        'profiles',
        array(
            'labels' => array(
                'name' => __('Profiles'),
                'singular_name' => __('Profiles')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'profiles'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for profiles
    $profiles_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'profiles_category',
        array('profiles'),
        array(
            'hierarchical' => true,
            'labels' => $profiles_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => array('thumbnail'),
            'rewrite' => array('slug' => 'profiles-category'),
        )
    );

    //CPT Brochures
    register_post_type(
        'brochures',
        array(
            'labels' => array(
                'name' => __('Brochures'),
                'singular_name' => __('Brochures')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'brochures'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for brochures
    $brochures_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'brochures_category',
        array('brochures'),
        array(
            'hierarchical' => true,
            'labels' => $brochures_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => array('thumbnail'),
            'rewrite' => array('slug' => 'brochures-category'),
        )
    );

    //CPT Catalogues
    register_post_type(
        'catalogues',
        array(
            'labels' => array(
                'name' => __('Catalogues'),
                'singular_name' => __('Catalogues')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'catalogues'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for catalogues
    $catalogues_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'catalogues_category',
        array('catalogues'),
        array(
            'hierarchical' => true,
            'labels' => $catalogues_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => array('thumbnail'),
            'rewrite' => array('slug' => 'catalogues-category'),
        )
    );



    //CPT Case Studies
    register_post_type(
        'studies',
        array(
            'labels' => array(
                'name' => __('Case Studies'),
                'singular_name' => __('Case Studies')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'studies'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => false,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for Case Studies
    $studies_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'studies_category',
        array('studies'),
        array(
            'hierarchical' => true,
            'labels' => $studies_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => array('thumbnail'),
            'rewrite' => array('slug' => 'studies-category'),
        )
    );


    //CPT Case Events
    register_post_type(
        'events',
        array(
            'labels' => array(
                'name' => __('Events'),
                'singular_name' => __('Events')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for Events
    $events_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'events_category',
        array('events'),
        array(
            'hierarchical' => true,
            'labels' => $events_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => array('thumbnail'),
            'rewrite' => array('slug' => 'events-category'),
        )
    );

    //CPT Success Stories
    register_post_type(
        'success-stories',
        array(
            'labels' => array(
                'name' => __('Success Stories'),
                'singular_name' => __('Success Stories')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'success-stories'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    // Custom taxonomy - Category for brochures
    $success_stories_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'success_stories_category',
        array('success-stories'),
        array(
            'hierarchical' => true,
            'labels' => $success_stories_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => array('thumbnail'),
            'rewrite' => array('slug' => 'success-stories-category'),
        )
    );




    //CPT Vacancies
    register_post_type(
        'vacancies',
        array(
            'labels' => array(
                'name' => __('Vacancies'),
                'singular_name' => __('Vacancies')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'vacancies'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor','excerpt')
        )
    );

    // Custom taxonomy - Category for vacancies
    $vacancies_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'vacancies_category',
        array('vacancies'),
        array(
            'hierarchical' => true,
            'labels' => $vacancies_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => array('thumbnail'),
            'rewrite' => array('slug' => 'vacancies-category'),
        )
    );

    //CPT Vacancies
    register_post_type(
        'certificates',
        array(
            'labels' => array(
                'name' => __('Certificates'),
                'singular_name' => __('Certificates')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'certificates'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'excerpt')
        )
    );

    //CPT Vacancies
    register_post_type(
        'join_systems',
        array(
            'labels' => array(
                'name' => __('Joint Systems'),
                'singular_name' => __('Joint Systems')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'joint_systems'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => false,
            'supports' => array('title', 'editor', 'excerpt')
        )
    );

    //CPT Downloads
    register_post_type(
        'downloads',
        array(
            'labels' => array(
                'name' => __('Downloads'),
                'singular_name' => __('Downloads')
            ),
            'public' => true,
            // 'has_archive' => true,
            'rewrite' => array('slug' => 'downloads'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'excerpt')
        )
    );

    // Custom taxonomy - Category for downloads
    $downloads_cat = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    register_taxonomy(
        'downloads_category',
        array('downloads'),
        array(
            'hierarchical' => true,
            'labels' => $downloads_cat,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => array('thumbnail'),
            'rewrite' => array('slug' => 'downloads-category'),
        )
    );

}


function modify_nav_menu_meta_box_object($object)
{
    if ($object->name === 'news_category') {
        $object->labels->name = __('News Category',T_PREFIX);
    }
    if ($object->name === 'solutions_category') {
        $object->labels->name = __('Solutions Category', T_PREFIX);
    }
    if ($object->name === 'sectors_category') {
        $object->labels->name = __('Sectors Category', T_PREFIX);
    }
    if ($object->name === 'products_category') {
        $object->labels->name = __('Products Category', T_PREFIX);
    }
    if ($object->name === 'profiles_category') {
        $object->labels->name = __('Profiles Category', T_PREFIX);
    }
    if ($object->name === 'brochures_category') {
        $object->labels->name = __('Brochures Category', T_PREFIX);
    }
    if ($object->name === 'catalogues_category') {
        $object->labels->name = __('Catalogues Category', T_PREFIX);
    }
    if ($object->name === 'studies_category') {
        $object->labels->name = __('Case Studies Category', T_PREFIX);
    }
    if ($object->name === 'events_category') {
        $object->labels->name = __('Events Category', T_PREFIX);
    }
    if ($object->name === 'success_stories_category') {
        $object->labels->name = __('Success Stories Category', T_PREFIX);
    }
    if ($object->name === 'vacancies_category') {
        $object->labels->name = __('Vacancies Category', T_PREFIX);
    }
    if ($object->name === 'downloads_category') {
        $object->labels->name = __('Downloads Category', T_PREFIX);
    }
    return $object;
}

add_filter('nav_menu_meta_box_object', 'modify_nav_menu_meta_box_object');

?>