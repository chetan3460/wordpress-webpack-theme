<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();

    ?>

        <!-- Banner and breadcrumb include -->
        <?php include(locate_template('template-parts/parts/section_banner.php', false, false)); ?>


        <!-- Modules Import-->
        <?php include(locate_template('template-parts/modules.php', false, false)); ?>


<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>