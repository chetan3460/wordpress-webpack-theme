<?php
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}
$args = array(
    'post_type' => 'news',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC'
);
$news_query = new WP_Query($args);

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($heading || $sub_title || $news_query->have_posts()) && !$hide_block) :

?>

    <section class="py-[6.25rem]   max-md:py-12 bg-lightblue  " style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-container">
            <?php if ($heading || $sub_title) : ?>
                <div class="flex gap-5 justify-between  w-full max-md:flex-wrap max-md:max-w-full max-6xl:px-16 max-xl:px-5 fade-in">
                    <?php if ($heading || $sub_title) : ?>
                        <div class="flex flex-col text-black max-md:max-w-full">
                            <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem]"><?= $sub_title; ?></p>
                            <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize"><?= $heading; ?></h2>
                        </div>
                    <?php endif; ?>

                    <?php if ($cta) : ?>
                        <div class="flex gap-1.5 self-end  rounded-full max-sl:w-[30%] max-md:hidden">
                            <a href="<?= $cta['url'] ?>" target="<?= $cta_target; ?>" class="primary-btn">
                                <span class="btn-text"><span><?= $cta['title'] ?></span></span>
                                <span class="btn-arrow">
                                    <span><span class="icon-arrow-right"></span></span>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if ($news_query->have_posts() || $cta) : ?>
                <div class="mt-16 max-md:mt-10 news-slider fade-in">
                    <?php if ($news_query->have_posts()) : ?>
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
                                    <?php while ($news_query->have_posts()) : $news_query->the_post();  ?>
                                        <div class="swiper-slide  w-[26.5rem] max-md:w-[19rem]">
                                            <!-- News card import -->
                                           <?php get_template_part('template-parts/parts/news_card');?>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($cta) : ?>
                        <a href="<?= $cta['url'] ?>" target="<?= $cta_target ?>" class="primary-btn md:hidden max-md:mt-10 max-md:pl-5">
                            <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                            <span class="btn-arrow">
                                <span><img loading="lazy" class="lazy-image" data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-right.svg" alt="arrow"></span>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>