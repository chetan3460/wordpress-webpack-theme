<?php
$large_image = get_sub_field('large_image');
$medium_image = get_sub_field('medium_image');
$small_image = get_sub_field('small_image');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

?>

<?php
if (($large_image || $medium_image || $small_image) && !$hide_block) :
?>
    <!-- Image Group Block -->
    <section class="flex  pb-[6.25rem] px-16 max-xl:px-5 max-md:pb-12 gap-28 max-container fade-up" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <?php if ($large_image) :
            $largeSize = "size-1000*1156";
        ?>
            <div class="flex flex-col w-6/12 pr-28 max-xxl:pr-10 max-md:pr-0 max-md:w-full">
                <img loading="lazy" data-offset="300" src="<?= wp_get_attachment_image_url($large_image, 'blur') ?>" data-src="<?= wp_get_attachment_image_url($large_image, $largeSize) ?>" alt="<?= esc_attr(get_post_meta($large_image, '_wp_attachment_image_alt', true)) ?: 'Section Image'; ?>" class="grow w-full aspect-[0.87]  max-md:max-w-full lazy-image object-cover" />
            </div>
        <?php endif; ?>
        <?php if ($medium_image || $small_image) : ?>
            <div class="flex w-6/12 max-md:hidden">
                <div class="flex gap-5 max-md:flex-col items-start">
                    <?php if ($medium_image) :
                        // $mediumSize = 'size';
                    ?>
                        <div class="flex flex-col w-6/12">
                            <img loading="lazy" data-offset="300" src="<?= wp_get_attachment_image_url($medium_image, 'blur') ?>" data-src="<?= wp_get_attachment_image_url($medium_image, 'full') ?>" alt="<?= esc_attr(get_post_meta($medium_image, '_wp_attachment_image_alt', true)) ?: 'Section Image' ?>" class="w-full aspect-[1.1] lazy-image object-cover" />
                        </div>
                    <?php endif; ?>
                    <?php if ($small_image) : ?>
                        <div class="flex flex-col  w-6/12">
                            <img loading="lazy" data-offset="300" src="<?= wp_get_attachment_image_url($small_image, 'blur') ?>" data-src="<?= wp_get_attachment_image_url($small_image, 'full') ?>" alt="<?= esc_attr(get_post_meta($small_image, '_wp_attachment_image_alt', true)) ?: 'Section Image' ?>" class="w-full aspect-[0.76] lazy-image object-cover" />
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>

<?php endif; ?>