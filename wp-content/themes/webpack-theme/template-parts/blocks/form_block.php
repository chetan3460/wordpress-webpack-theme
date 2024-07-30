<?php

$heading = get_sub_field('heading');
$description = get_sub_field('description');
$image = get_sub_field('image');
$gravity_forms_select = get_sub_field('gravity_forms_select');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($gravity_forms_select && !$hide_block) :
?>

    <section class="form-section default-form  py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 bg-lightblue" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-container flex max-sl:flex-col max-sl:gap-10 max-md:gap-8 justify-between fade-in">
            <div class="col sl:w-[43%]">
                <?php if ($heading) : ?>
                    <h3 class="text-6xl max-md:text-[2.5rem]"><?= $heading; ?></h3>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <p class="md:opacity-50 text-xl max-md:text-base mt-8 md:pr-[20%]"><?= $description; ?></p>
                <?php endif; ?>

                <?php if ($image) : ?>
                    <img loading="lazy" src="<?= wp_get_attachment_image_url($image, 'full'); ?>" alt="<?= esc_attr(get_post_meta($image, '_wp_attachment_image_alt', true)) ?: 'Section Image' ?>" class="object-cover w-full h-[25rem] mt-24 max-sl:hidden" />
                <?php endif; ?>
            </div>

            <div class="col sl:w-[50%]">
                <?php if ($gravity_forms_select) :

                        echo do_shortcode('[gravityform id="'.$gravity_forms_select.'" title="false" description="false" ajax="true"]');

                endif; ?>
            </div>
        </div>

    </section>




<?php endif; ?>



