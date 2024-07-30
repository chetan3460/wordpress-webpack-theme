<?php
// Variables declaration to avoid missing variables
$external_link = '';
$external_target = '';
$customLink = '';
$image = '';
$heading = '';
$desc = '';
// Args from template parts
if ($args) {
    $customLink = $args['$link'];
    $heading = $args['$heading'];
    $image = $args['$image'];
    $desc = $args['$desc'];
}

if (!empty($customLink)) {
    $external_target = $customLink['target'] ? $customLink['target'] : '_self';
    $external_link = $customLink['url'];
} else {
    $external_link = get_field('link');
}
$terms = get_the_terms(get_the_ID(), 'studies_category');
// $terms = get_the_terms(get_the_ID(), 'studies_category');
// if (!empty($terms) && !is_wp_error($terms)) {
//     $first_term = $terms[0]; // Get the first term
//     echo '<a href="' . esc_url(get_term_link($first_term)) . '">' . esc_html($first_term->name) . '</a>';
// }

if ($image) {
    $post_featured_img = wp_get_attachment_image_url($image, "full");
} else {
    if (has_post_thumbnail()) {
        $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
    } else {
        $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
    }
}
?>


<a class="text-black cursor-pointer group  transition-all duration-700" href="<?php if ($external_link) {
                                                                                    echo $external_link;
                                                                                } else { ?>javascript:void(0);<?php } ?>" target="<?php if (!empty($customLink)) {
                                                                                                                                                                                    echo $external_target;
                                                                                                                                                                                } else { ?>_blank<?php } ?>">
    <div class="p-5 max-md:p-3 bg-aliceblue max-lg:bg-darkblue group-hover:bg-darkblue transition-all duration-700">
        <div class="image relative">
            <?php if (!empty($terms) && !is_wp_error($terms)) { ?>
                <div class="absolute left-5 top-5 max-md:left-3 max-md:top-3 justify-center px-2.5 py-1 max-md:py-0.5 bg-white rounded-full text-[0.875rem] font-medium"><?= $terms[0]->name; ?></div>
            <?php } ?>
            <img loading="lazy" data-src="<?= $post_featured_img; ?>" alt="Case Studies" class="lazy-image object-cover h-[23rem] max-md:h-[11.5rem] w-full" />
        </div>
        <div class="desc pr-14 pt-6 max-md:pt-5 pb-2 relative min-h-[10.3rem]">
            <h3 class="capitalize text-[1.875rem] max-md:text-[1.25rem] max-md:leading-7 line-clamp-2 font-medium leading-9 pr-[40%] max-md:pr-0 max-lg:text-white group-hover:text-white transition-all duration-700">
                <?php if ($heading) :
                    echo $heading;
                else :
                    the_title();
                endif;
                ?>
            </h3>

            <?php if (has_excerpt() || $desc) : ?>
                <p class="text-base max-md:text-[0.875rem] max-md:leading-5 mt-3 line-clamp-2 max-md:line-clamp-3 max-lg:text-white group-hover:text-white transition-all duration-700">
                    <?= $desc; ?>
                    <?= get_the_excerpt(); ?>
                </p>
            <?php endif; ?>
            <?php if($external_link):?>
                <div class="primary-btn white absolute pointer-events-none bottom-5 right-0 opacity-0  transition-all duration-700 group-hover:opacity-100">
                    <span class="btn-arrow">
                        <span class="icon-arrow-right"></span>
                    </span>
                </div>
            <?php endif;?>
        </div>
    </div>
</a>