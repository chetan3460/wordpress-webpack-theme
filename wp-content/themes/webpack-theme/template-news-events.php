<?php

/**
 * Template Name: News & Events
 */


get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();

    ?>

        <!-- Page banner -->
        <?php include(locate_template('template-parts/parts/short_banner.php', false, false)); ?>




<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>