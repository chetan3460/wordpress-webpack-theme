<?php

$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');
$select_news = get_sub_field('select_news');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($select_news && !$hide_block) :
?>

    <section class="py-[6.25rem]   max-md:py-12 news-list-block" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-container">

            <?php if ($sub_title || $heading || $cta) : ?>
                <div class="flex gap-5 justify-between  w-full max-md:flex-wrap max-md:max-w-full max-6xl:px-16 max-xl:px-5 fade-in">

                    <?php if ($sub_title || $heading) : ?>
                        <div class="flex flex-col text-black max-md:max-w-full">
                            <?php if ($sub_title) : ?>
                                <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem]"><?= $sub_title; ?></p>
                            <?php endif; ?>
                            <?php if ($heading) : ?>
                                <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize"><?= $heading; ?></h2>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($cta) : ?>
                        <div class="flex gap-1.5 self-end  rounded-full max-sl:w-[30%] max-md:hidden">
                            <a href="<?= $cta['url']; ?>" target="<?= $cta_target ?>" class="primary-btn">
                                <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                                <span class="btn-arrow">
                                    <span><span class="icon-arrow-right"></span></span>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>


            <div class="mt-16 max-md:mt-10  fade-in max-6xl:px-16 max-xl:px-5">
                <div class="grid-layout grid gap-y-14 gap-x-5 max-md:gap-5  grid-cols-3 max-lg:grid-cols-2 max-md:grid-cols-1">
                    <?php foreach ($select_news as $post) : setup_postdata($post); ?>
                        <!-- News card import -->
                        <?php get_template_part('template-parts/parts/news_card'); ?>

                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>
                <?php if ($cta) : ?>
                    <a href="<?= $cta['url']; ?>" target="<?= $cta_target ?>" class="primary-btn md:hidden max-md:mt-10 ">
                        <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                        <span class="btn-arrow">
                            <span><img loading="lazy" class="lazy-image" data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-right.svg" alt="arrow"></span>
                        </span>
                    </a>
                <?php endif; ?>

            </div>

        </div>
    </section>

<?php endif; ?>