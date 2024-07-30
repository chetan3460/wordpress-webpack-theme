
<?php
$image_gallery = get_sub_field('image_gallery');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($image_gallery && !$hide_block) :

?>
    <div class="gallery-slider pt-14 max-md:pt-10" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <h2 class="text-[2.5rem] max-md:text-2xl leading-[3rem]">Gallery</h2>
        <div class="gallery pt-14 max-md:pt-8 swiper overflow-visible">
            <div class="swiper-wrapper">
                <?php foreach ($image_gallery as $image) : ?>
                    <div class="swiper-slide text-center opacity-50 transition-all duration-700 [&.swiper-slide-active]:!opacity-100">
                        <div class="img aspect-[1.97]">
                            <img data-src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="object-cover lazy-image w-full h-full" />
                        </div>
                        <?php if ($image['caption']) : ?>
                            <p class="opacity-50 text-[0.875rem] mt-5"><?php echo esc_html($image['caption']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="btn-wrap  flex justify-center gap-3 mt-10 max-md:mt-7">
            <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="left slide arrow">
                <span class="icon-arrow-left"></span>
            </button>
            <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                <span class="icon-arrow-right"></span>
            </button>
        </div>
    </div>
<?php endif;?>