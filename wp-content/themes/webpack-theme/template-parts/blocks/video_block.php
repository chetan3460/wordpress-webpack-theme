<?php
$video_url = get_sub_field('video_url');
$banner = get_sub_field('banner');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($video_url && !$hide_block) :

?>
    <div class="video-block py-10 text-center max-md:w-[calc(100%+2.5rem)] max-md:-ml-5" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="v-image relative">
            <a data-fancybox href="<?= $video_url; ?>" class="fancy-box flex items-center justify-center gap-1.5 text-base font-medium leading-5 uppercase whitespace-nowrap bg-white  rounded-full text-darkblue cursor-pointer max-md:mr-5 px-16 py-2.5 max-lg:px-6 max-md:px-14  transition-all duration-700 group hover:bg-darkblue hover:text-white absolute left-1/2 max-md:left-5 max-md:bottom-5 md:top-1/2 md:-translate-x-1/2 md:-translate-y-1/2">
                <span class="icon-play"></span>
                <div class="lg:flex-1">Play</div>
            </a>
            <?php if ($banner) : ?>
                <img data-src="<?= wp_get_attachment_image_url($banner, " full");?>" alt="Banner img" class="object-cover lazy-image w-full h-[37.8rem] max-sl:h-[30rem] max-md:h-[15rem]" />
            <?php endif; ?>
        </div>
        <p class="opacity-50 text-[0.875rem] mt-5 max-md:px-5"><?= wp_get_attachment_caption($banner); ?></p>
    </div>
<?php endif; ?>