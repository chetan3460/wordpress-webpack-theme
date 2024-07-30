    <?php
    $designation = get_field('designation');
    $linkedin_profile = get_field('linkedin_profile');
    $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
    if (!has_post_thumbnail()) {
        $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
    }
    ?>
    <a class="flex flex-col items-start group cursor-pointer mb-5 !opacity-100 translate-y-0 [&:nth-child(3n-1)]:translate-y-5 fade-up" href="<?php if ($linkedin_profile) {
echo $linkedin_profile; } else { ?>javascript:void(0);<?php } ?>" target="<?php if ($linkedin_profile) {?>_target <?php } else { ?>_self<?php } ?>">
        <div class="flex overflow-hidden relative flex-col items-end self-stretch w-full aspect-square ">
            <div class="absolute z-10 bg-white  w-[2.5rem] h-[2.5rem] flex items-center justify-center top-5 right-5">
                <span class="icon-linkedin"></span>
            </div>
            <img class="object-cover scale-100 duration-700 transition-all group-hover:scale-110" loading="lazy" src="<?= $post_featured_img; ?>" alt="<?= the_title(); ?>" />
        </div>
        <h3 class="mt-5 text-xl font-medium leading-6 text-black"><?= the_title(); ?></h3>
        <?php if ($designation) : ?>
            <p class="mt-4 text-base leading-5 text-black opacity-50"><?= $designation; ?></p>
        <?php endif; ?>
    </a>