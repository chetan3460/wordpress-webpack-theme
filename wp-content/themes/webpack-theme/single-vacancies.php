<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();

    ?>

        <!-- Banner and breadcrumb include -->
        <?php include(locate_template('template-parts/parts/short_banner.php', false, false)); ?>

        <!--  Career detail page -->
        <section class="career-desc-block fade-in">
            <div class="max-container flex gap-10 max-md:gap-5 max-lg:flex-col">
                <div class="col lg:w-[55%] max-6xl:pl-16 max-lg:px-5 lg:pt-[6.25rem] max-lg:pt-12">
                    <div class="text-block ">
                        <?= the_content(); ?>
                    </div>
                </div>
                <div class="col lg:flex lg:justify-end lg:w-[45%] ">
                    <div class="content h-max    max-w-[33vw] max-lg:max-w-[50%] max-md:max-w-full   bg-darkblue text-white py-[4.375rem] px-[3.75rem] max-lg:px-5 max-lg:py-7">
                        <span class="icon-animation w-[5.625rem] block" data-icon="suitcase"></span>
                        <h2 class="text-3xl max-md:text-xl leading-9 mt-8 max-md:mt-5">Apply for this position</h2>

                        <?php if (has_excerpt()) : ?>
                            <p class="mt-5 max-md:mt-3 text-base max-md:text-[0.875rem] leading-5 text-white/60"><?= the_excerpt(); ?></p>
                        <?php endif; ?>

                        <a aria-label="Send Enquiry" role="button" class="primary-btn apply-btn white mt-10 max-md:mt-8">
                            <span class="btn-text"><span>apply now</span></span>
                            <span class="btn-arrow">
                                <span class="icon-arrow-right"></span>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </section>

        <section class="form-apply-pop-up default-form blue  group fixed size-full inset-0 z-[60]  transition-all duration-1000 [clip-path:polygon(0_0,0_0,0_100%,0_100%)] invisible [&.active]:[clip-path:polygon(0_0,100%_0%,100%_100%,0_100%)] [&.active]:visible ">
            <div class="w-1/2 max-lg:w-3/4 max-md:w-full bg-darkblue h-full overflow-scroll absolute right-0 top-0 z-10">
                <div class="form-block px-14 py-16 max-md:p-5 relative">
                    <h2 class="text-[2.5rem] max-md:text-2xl mb-7 text-white">Apply now</h2>
                    <h3 class="text-xl mb-5 opacity-50 text-white"><?= the_title(); ?></h3>
                    <div class="close-btn rounded-btn rounded-full cursor-pointer transition-all duration-700 delay-0 bg-white w-11 h-11  flex items-center justify-center hover:opacity-50 absolute right-14 top-10 max-md:top-3 max-md:right-5">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="<?php echo $site; ?>" class=" w-3 h-3" />
                    </div>
                    <?php

                    echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]');

                    ?>
                </div>
            </div>
            <div class="overlay-blurred close-btn size-full inset-0 absolute backdrop-blur-[0.5rem] bg-black/10 ">
            </div>
        </section>

        <!--  Vacancy detail page ends -->

        <!-- More vacancies -->

        <?php
        // Get the current post ID
        $current_post_id = get_the_ID();

        // Query top 3 vacancies excluding the current one
        $other_vacancies_query = new WP_Query(array(
            'post_type' => 'vacancies',
            'posts_per_page' => 3,
            'post__not_in' => array($current_post_id) // Exclude the current post
        ));

        ?>

        <!-- Check if there are other vacancies -->
        <?php if ($other_vacancies_query->have_posts()) { ?>
            <section class="career-block-wrap py-[6.25rem] max-md:py-12 px-16 max-xl:px-5  fade-in  ">
                <div class="max-container">
                    <div class="flex gap-5 mb-14 max-md:mb-8 justify-between items-end  w-full max-sl:flex-col max-sl:items-start max-md:flex-wrap max-md:max-w-full">
                        <div class="flex flex-col text-black max-md:max-w-full">
                            <h2 class="text-6xl leading-[4rem] max-md:text-2xl max-md:leading-9  font-medium capitalize">More Vacancies</h2>
                        </div>
                    </div>
                    <div class="career-blocks grid grid-cols-3 max-lg:grid-cols-2 max-md:grid-cols-1 gap-5">
                        <?php
                        while ($other_vacancies_query->have_posts()) {
                            $other_vacancies_query->the_post();
                            //  Vacancy card include
                            get_template_part('template-parts/parts/vacancy_card');
                        } ?>
                    </div>
                </div>
            </section>
        <?php }
        // Restore original post data
        wp_reset_postdata();
        ?>




<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>