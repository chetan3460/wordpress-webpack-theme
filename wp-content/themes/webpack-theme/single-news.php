<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();
        if (has_post_thumbnail()) {
            $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
        } else {
            $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
        }
    ?>
        <!-- Single Blog Page-->
        <!-- Banner -->
        <section class="inner-banner no-banner detail-banner relative  fade-in px-16 max-xl:px-5 h-[43.75rem] max-md:h-[19rem] bg-lightblue ">
            <div class="inner-banner-content relative flex flex-col fade-in z-10 h-full text-white pt-52 max-md:pt-32 full-max-container" data-delay="0.3">
                <!-- Breadcrumbs -->
                <?php include(locate_template('template-parts/parts/breadcrumbs.php', false, false)); ?>
                <div class="title-section">
                    <div class="title-block">
                        <h1 class="text-8xl font-medium capitalize leading-[6.5rem] max-lg:text-7xl max-lg:leading-[5rem] max-md:text-3xl"><?= the_title(); ?></h1>

                        <p class="opacity-50 mt-10 max-md:mt-2 max-md:text-[0.875rem]">Published on <?= get_the_date('j F Y'); ?></p>
                    </div>
                </div>
            </div>
            <div class="image-wrap  relative z-20 mt-10 max-md:mt-8 full-max-container text-center max-md:w-[calc(100%+2.5rem)] max-md:-ml-5">
                <img data-src="<?= $post_featured_img; ?>" alt="Featured Image" class=" object-cover h-[35rem] max-sl:h-[25rem] max-md:h-[10rem] w-full lazy-image" />
                <p class="opacity-50 mt-2 max-md:mt-4 max-md:px-5 max-md:text-[0.875rem] max-md:leading-4"><?= wp_get_attachment_caption(get_post_thumbnail_id()); ?></p>
            </div>
            <div class="white-block bg-white absolute w-full h-[18.75rem] max-sl:h-[15rem] max-md:h-[5rem] bottom-0 left-0 z-10"></div>
        </section>

        <!-- Modules and share  -->
        <?php include(locate_template('template-parts/parts/single-data.php', false, false)); ?>

        <!-- Related news -->
        <?php
        // Get the current post ID
        $current_post_id = get_the_ID();


        $other_news_query = new WP_Query(array(
            'post_type' => 'news',
            'posts_per_page' => 6,
            'post__not_in' => array($current_post_id) // Exclude the current post
        ));

        ?>


        <!-- Check if there are other news -->
        <?php if ($other_news_query->have_posts()) { ?>


            <section class="py-[6.25rem]   max-md:py-12 bg-lightblue">
                <div class="max-container">

                    <div class="flex gap-5 justify-between  w-full max-md:flex-wrap max-md:max-w-full max-6xl:px-16 max-xl:px-5 fade-in">

                        <div class="flex flex-col text-black max-md:max-w-full">
                            <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize"><?= _e('Related News',T_PREFIX); ?></h2>
                        </div>

                        <div class="flex gap-1.5 self-end  rounded-full max-sl:w-[30%] max-md:hidden">
                            <a href="<?= site_url(); ?>/news-events/news" class="primary-btn">
                                <span class="btn-text"><span><?= _e('Explore All',T_PREFIX); ?></span></span>
                                <span class="btn-arrow">
                                    <span><span class="icon-arrow-right"></span></span>
                                </span>
                            </a>
                        </div>
                    </div>



                    <div class="mt-16 max-md:mt-10 news-slider fade-in">

                        <div class="flex gap-5 ">

                            <div class="flex  w-[27%] bg-lightblue h-auto z-20 relative items-end flex-wrap max-md:hidden ml-16 max-xl:ml-5">
                                <div class="btn-wrap  flex justify-end gap-3 mb-8">
                                    <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="left slide arrow">
                                        <span class="icon-arrow-left"></span>
                                    </button>
                                    <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                                        <span class="icon-arrow-right"></span>
                                    </button>
                                </div>
                                <div class="swiper-pagination !top-auto !w-[95%]"></div>
                            </div>

                            <div class="flex flex-col w-[73%] swiper  z-10 max-md:w-full max-md:pl-5">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($other_news_query->have_posts()) {
                                        $other_news_query->the_post(); ?>
                                        <div class="swiper-slide  w-[26.5rem] max-md:w-[19rem]">
                                        <!-- News card include -->
                                        <?php get_template_part('template-parts/parts/news_card'); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                            <a href="<?= site_url() ?>/news-events/news" class="primary-btn md:hidden max-md:mt-10 max-md:pl-5">
                                <span class="btn-text"><span><?= _e('Explore All', T_PREFIX); ?></span></span>
                                <span class="btn-arrow">
                                    <span><img loading="lazy" class="lazy-image" data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-right.svg" alt="arrow"></span>
                                </span>
                            </a>

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