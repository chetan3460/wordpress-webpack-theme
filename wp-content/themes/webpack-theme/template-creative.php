<?php

/**
 * Template Name: Creative
 */


get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();

    ?>

        <!-- Page banner -->
        <?php include(locate_template('template-parts/parts/section_banner.php', false, false)); ?>

        <!-- Page content -->
        <?php if (!empty(get_the_content())) { ?>
            <section class="default-section py-[6.25rem] max-md:py-12 px-16 max-xl:px-5 fade-in">
                <div class="max-container">
                    <div class="text-block type-two lg:w-[70%] md:w-[90%] m-auto">
                        <?= the_content(); ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <!-- Page modulees -->
        <?php include(locate_template('template-parts/modules.php', false, false)); ?>


<?php
    endwhile;
endif;
?>

<section id="<?php echo $sectionID; ?>" class="two_column_content_with_list | <?php echo $backgroundCls; ?> px-3-h px-md-6 px-xl-15-h px-xxl-15-p">
    <div class="r-1 | flex justify-between ">
        <div class="c-1 | pe-5 w-full | inner-text-bottom-top-reveal" data-duration="2">

            <h2>Wealth Management</h2>
            <div class="img-holder | transition-all relative pe-8 d-none d-md-block w-[25rem] h-[25rem] overflow-hidden top-[50%] -translate-y-[50%] " data-delay="0.1" data-duration="1">
                <model-viewer src="<?php echo get_template_directory_uri(); ?>/assets/3d/model-1.glb" class="w-100 h-100 contain center w-100 h-100 | model-rotate-trigger"
                    loading="eager"
                    shadow-intensity="0"
                    auto-rotate-delay="0"
                    rotation-per-second="-40%"
                    disable-zoom
                    disable-tap
                    interaction-prompt="none"
                    exposure="0.45"
                    data-color="white"
                    reveal="auto">
            </div>

        </div>
        <div class="c-2 c-559 common-content | w-full p-small | fade-anim" data-delay="0.2" data-duration="2">
            <p>We place our clients at the core of our business. Our customized solutions offer comprehensive plans matching each client's evolving needs and objectives. With an emphasis on a holistic planning approach, NBK Wealth helps you take control of your finances around the world. We provide services in areas such as family affairs, investments, real estate, cash and credit management, fiduciaries, trusts, and wills.&nbsp;</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>