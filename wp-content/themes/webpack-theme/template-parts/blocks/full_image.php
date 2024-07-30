<?php

$banner = get_sub_field('banner');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($banner && !$hide_block) :
?>
    <!-- Full image block -->
    <section class="full-image-block section-block fade-in">
        <img loading="lazy" class="object-cover size-full min-h-[46.8rem] max-md:min-h-[15.625rem] lazy-image" data-src="<?= wp_get_attachment_image_url($banner, 'size-2880*1500') ?>" alt="<?= esc_attr(get_post_meta($banner, '_wp_attachment_image_alt', true)) ?: 'Banner Image' ?>" />
    </section>

<?php endif; ?>