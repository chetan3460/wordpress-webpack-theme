<?php
$banner = get_sub_field('banner');
$video_url = get_sub_field('video_url');
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$extra_content = get_sub_field('extra_content');
$illustration = get_sub_field('illustration');
$transparent = get_sub_field('transparent_background');
$block_selection = get_sub_field('block_selection');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($banner || $heading || $content) && !$hide_block) :

?>
    <!-- Full banner Content -->
    <section class="pb-[12.5rem] relative max-md:mb-[-3.125rem] max-md:pb-0 max-container <?php echo (!$transparent) ? 'light-bg' : ''; ?> group" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <?php
        if ($banner || $video_url) :
        ?>
            <div class="image relative fade-in">

                <?php if ($banner || $video_url) : ?>
                    <img loading="lazy" class="object-cover size-full min-h-[46.8rem] max-md:min-h-[15.625rem] lazy-image" data-src="<?= wp_get_attachment_image_url($banner, 'full') ?>" alt="<?= esc_attr(get_post_meta($banner, '_wp_attachment_image_alt', true)) ?: 'Section Image'; ?>" />
                <?php endif; ?>

                <?php if ($video_url) : ?>
                    <div class=" absolute bottom-[3.75rem] left-[3.75rem] max-sl:left-5 z-1  max-md:top-1/2 max-md:left-1/2 max-md:-translate-x-1/2 max-md:-translate-y-1/2">
                        <a data-fancybox href="<?= $video_url; ?>" class="fancy-box flex items-center gap-1.5 text-base font-medium leading-5 uppercase whitespace-nowrap bg-white  rounded-full text-darkblue cursor-pointer px-16 py-2.5 max-md:px-12 transition-all duration-700 group hover:bg-darkblue hover:text-white">
                            <span class="icon-play"></span>
                            <div class="flex-1">Play</div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($heading || $content) : ?>
            <div class="flex absolute flex-col justify-between pt-12 pb-12 pl-12 top-auto bottom-0 bg-darkblue group-[&.light-bg]:bg-aliceblue text-white group-[&.light-bg]:text-black right-16 max-sl:right-5  min-h-[42rem] h-[70vh] w-[51%] max-sl:w-[64%] max-md:bottom-auto max-md:top-[-3.7rem] max-md:w-[calc(100%-2.5rem)] max-md:left-0 max-md:mx-auto max-md:p-[1.875rem] max-md:relative max-md:min-h-[20rem] max-md:h-auto <?php if (!wp_is_mobile()) { ?> parallax-item translate-y-[16%]<?php } ?>">
                <div class="flex  flex-col w-[80%] max-md:w-full">
                    <?php if ($sub_title) : ?>
                        <p class="text-xl leading-5  uppercase max-md:text-base"><?= $sub_title; ?></p>
                    <?php endif; ?>

                    <?php if ($heading) : ?>
                        <h2 class="mt-5 max-md:mt-2 text-7xl max-xl:text-[4rem] max-xl:leading-[4rem] max-sl:text-[3rem] max-sl:leading-[3rem] max-md:text-[2rem] max-md:leading-[2rem] font-medium capitalize leading-[4.5rem] max-md:max-w-full ">
                            <?= $heading; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (($block_selection != 'more_content') && $content) : ?>
                        <p class="mt-8 max-md:mt-5 text-base leading-6  opacity-80">
                            <?= $content; ?>
                        </p>
                    <?php endif; ?>

                </div>

                <?php if ($cta || (($block_selection == 'more_content') && $extra_content)) : ?>
                    <div class="max-md:mt-10 <?php echo ($block_selection == 'more_content') ? 'md:pr-12' : ''; ?>">
                        <?php if (($block_selection == 'more_content') && $extra_content) : ?>
                            <h3 class="opacity-80 text-2xl max-md:text-xl"><?= $extra_content; ?></h3>
                        <?php endif; ?>
                        <?php if (($block_selection == 'more_content') && $content) : ?>
                            <p class="mt-8 max-md:mt-5 text-base leading-6  opacity-80">
                                <?= $content; ?>
                            </p>
                        <?php endif; ?>

                        <a href="<?= $cta['url'] ?>" target="<?= $cta_target; ?>" class="primary-btn <?php echo ($transparent) ? 'white' : ''; ?> <?php echo ($block_selection == 'more_content') ? 'mt-10' : ''; ?>">
                            <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                            <span class="btn-arrow">
                                <span><span class="icon-arrow-right"></span></span>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($illustration) : ?>
                    <div class="absolute bottom-0 right-0 w-[66%] max-md:hidden">
                        <img class="w-full lazy-image" loading="lazy" data-src="<?= $illustration; ?>" alt="Illustration">
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>