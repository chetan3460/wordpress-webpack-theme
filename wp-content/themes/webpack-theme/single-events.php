<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();
        $event_date = get_field('event_date');
        $event_start_time = get_field('event_start_time');
        $event_end_time = get_field('event_end_time');
        $date = DateTime::createFromFormat('j F Y', $event_date);
        $startTime = DateTime::createFromFormat('H:i:s', $event_start_time);
        $endTime = DateTime::createFromFormat('H:i:s', $event_end_time);
        $location = get_field('location');
        if (has_post_thumbnail()) {
            $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
        } else {
            $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
        }


    ?>
        <!-- Single Events Page-->
        <!-- Banner -->
        <section class="inner-banner no-banner detail-banner for-event relative  fade-in px-16 max-xl:px-5 h-[43.75rem] max-md:h-[19rem] bg-lightblue">
            <div class="inner-banner-content relative flex flex-col fade-in z-10 h-full text-white pt-52 max-md:pt-32 full-max-container" data-delay="0.3">
                <!-- Breadcrumbs -->
                <?php include(locate_template('template-parts/parts/breadcrumbs.php', false, false)); ?>
                <div class="title-section">
                    <div class="title-block">
                        <h1 class="text-8xl font-medium capitalize leading-[6.5rem] max-lg:text-7xl max-lg:leading-[5rem] max-md:text-3xl"><?= the_title(); ?></h1>

                    </div>
                    <div class="detail flex flex-col gap-5 max-md:gap-3 w-[42%] max-sl:w-1/2 max-md:w-full md:border-l-[1px] md:border-black/20 pl-12 max-sl:pl-8 max-md:pl-0">
                        <div class="e-detail flex gap-2 items-start max-md:text-[0.875rem]">
                            <img loading="lazy" class="lazy-image object-contain w-4.5 h-auto" data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-time.svg" alt="FPI">
                            <?php if ($startTime || $endTime) : ?>
                                <div class="descp">
                                    <p><span class="opacity-50">Time</span>
                                        <?php if ($startTime && $endTime) : ?>
                                            <span class="text-orange px-2 text-[0.9rem]">|</span><?= $startTime->format('H:i') ?> - <?= $endTime->format('H:i') ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($location) : ?>
                            <div class="e-detail flex gap-2 items-start max-md:text-[0.875rem]">
                                <img loading="lazy" class="lazy-image object-contain w-4.5 h-auto" data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-location.svg" alt="FPI">
                                <div class="descp">
                                    <p><span class="opacity-50">Location</span><span class="text-orange px-2 text-[0.9rem]">|</span><?= $location; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="image-wrap  relative z-20 pt-10 max-md:pt-8 full-max-container text-center max-md:w-[calc(100%+2.5rem)] max-md:-ml-5">
                <img data-src="<?= $post_featured_img; ?>" alt="Featured Image" class=" object-cover h-[35rem] max-sl:h-[25rem] max-md:h-[10rem] w-full lazy-image" />
                <p class="opacity-50 mt-2 max-md:mt-4 max-md:px-5 max-md:text-[0.875rem] max-md:leading-4"><?= wp_get_attachment_caption(get_post_thumbnail_id()); ?></p>
            </div>
            <div class="white-block bg-white absolute w-full h-[18.75rem] max-sl:h-[15rem] max-md:h-[5rem] bottom-0 left-0 z-10"></div>
        </section>

        <!-- Modules and share  -->
        <?php include(locate_template('template-parts/parts/single-data.php', false, false)); ?>

        <!-- Related events -->
        <?php
        // Get the current post ID
        $current_post_id = get_the_ID();


        $other_events_query = new WP_Query(array(
            'post_type' => 'events',
            'posts_per_page' => 6,
            'post__not_in' => array($current_post_id) // Exclude the current post
        ));
        $total_posts = $other_events_query->found_posts;

        ?>

        <!-- Check if there are other events -->
        <?php if ($other_events_query->have_posts()) { ?>
            <section class="py-[6.25rem]   max-md:py-12 event-list-block bg-lightblue overflow-slider">
                <div class="max-container">
                    <div class="flex gap-5 justify-between  w-full max-md:flex-wrap max-md:max-w-full max-6xl:px-16 max-xl:px-5 fade-in">
                        <div class="flex flex-col text-black max-md:max-w-full">
                            <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize"><?= _e('other events',T_PREFIX);?></h2>
                        </div>
                        <?php if($total_posts >= 2):?>
                        <div class="flex gap-1.5 justify-end   rounded-full max-sl:w-[30%] max-md:hidden">
                            <div class="btn-wrap  flex justify-end gap-3">
                                <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&amp;.swiper-button-disabled]:pointer-events-none swiper-button-disabled" aria-label="left slide arrow" disabled="">
                                    <span class="icon-arrow-left"></span>
                                </button>
                                <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&amp;.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                                    <span class="icon-arrow-right"></span>
                                </button>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>

                    <div class="mt-16 max-md:mt-10 fade-in max-6xl:px-16 max-xl:px-5">
                        <div class="swiper overflow-visible">
                            <div class="swiper-wrapper">
                                <?php
                                while ($other_events_query->have_posts()) {
                                    $other_events_query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <!-- Event card import -->
                                        <?php get_template_part('template-parts/parts/events_card'); ?>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>




<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>