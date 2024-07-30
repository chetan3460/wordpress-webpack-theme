<?php
$medium_image = get_sub_field('medium_image');
$large_image = get_sub_field('large_image');
$small_image = get_sub_field('small_image');
$description = get_sub_field('description');


$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($medium_image || $large_image || $small_image) && !$hide_block) :

?>
    <section class="py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 max-container" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-w-[55rem] m-auto text-center flex flex-col items-center parallax-block-wrap">
            <?php if ($medium_image || $large_image || $small_image) : ?>
                <div class="image relative w-[27.3rem] max-md:w-[12.6rem]">

                    <?php if ($medium_image) : ?>
                        <img class="parallax-block lazy-image left absolute bottom-0 object-cover aspect-[0.89] w-[15rem] h-[20rem] max-md:w-[8.43rem] max-md:h-[9.375rem] z-0 -left-[50%] -translate-y-36" loading="lazy" data-src="<?= wp_get_attachment_image_url($medium_image, 'size-576*652') ?>" alt="<?= esc_attr(get_post_meta($medium_image, '_wp_attachment_image_alt', true)) ?: 'Block Image'; ?>">
                    <?php endif; ?>

                    <?php if ($large_image) : ?>
                        <img class="lazy-image relative object-cover aspect-[0.84] h-[32rem] max-md:h-[14.8rem]" loading="lazy" data-src="<?= wp_get_attachment_image_url($large_image, 'size-876*1026') ?>" alt="<?= esc_attr(get_post_meta($large_image, '_wp_attachment_image_alt', true)) ?: 'Block Image'; ?>">
                    <?php endif; ?>

                    <?php if ($small_image) : ?>
                        <img class="parallax-block lazy-image left absolute -bottom-7 object-cover aspect-[1.07] w-[17.5rem] h-[16.25rem] max-md:w-[8.125rem] max-md:h-[7.5rem] z-10 -right-[50%] -translate-y-20" loading="lazy" data-src="<?= wp_get_attachment_image_url($small_image, 'size-560*520') ?>" alt="<?= esc_attr(get_post_meta($small_image, '_wp_attachment_image_alt', true)) ?: 'Block Image'; ?>">
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if ($description || $cta) : ?>
                <div class="text-center text-black w-[36rem] max-md:w-[95%] pt-14 max-md:pt-10 flex flex-col items-center ">

                    <?php if ($description) : ?>
                        <p class="text-xl max-md:text-base leading-8 max-md:leading-6"><?= $description; ?></p>
                    <?php endif; ?>

                    <?php if ($cta) : ?>
                        <a href="<?= $cta['url'] ?>" target="<?= $cta_target ?>" class="primary-btn mt-10 max-md:mt-6">
                            <span class="btn-text"><span>learn more</span></span>
                            <span class="btn-arrow">
                                <span class="icon-arrow-right"></span>
                            </span>
                        </a>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </div>
    </section>

<?php endif; ?>