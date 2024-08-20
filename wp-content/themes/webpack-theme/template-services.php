<?php

/**
 * Template Name: Services
 */

get_header(); ?>
<?php if (have_posts()) : ?>
        <?php
        while (have_posts()) : the_post();

        ?>
                <!-- Banner and breadcrumb include -->
                <?php include(locate_template('template-parts/parts/section_banner.php', false, false)); ?>

                <?php include(locate_template('template-parts/modules.php', false, false)); ?>



                <!-- Display categories -->
                <?php
                // Get the terms (categories) for the custom taxonomy 'sectors_categories'
                //                        $terms = get_terms(array(
                //                                'taxonomy' => 'solutions_category',
                //                                'hide_empty' => false, // Set to true if you want to hide empty categories
                //                        ));
                //                        if (!empty($terms) && !is_wp_error($terms)) {
                //                                // Category Hover section
                //                                include(locate_template('template-parts/parts/category_hover.php', false, false));
                //                        }
                include(locate_template('template-parts/parts/post_type_hover.php', false, false));

                ?>


<?php
        endwhile;
endif;
?>

<?php get_footer(); ?>