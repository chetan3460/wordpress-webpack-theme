<?php
$post_id = get_query_var('product_id') ?: get_the_ID();
$post_permalink = get_the_permalink($post_id);
$post_title = get_the_title($post_id);
$post_excerpt = get_the_excerpt($post_id);

// Truncate the post excerpt to 20 words
$truncated_excerpt = wp_trim_words($post_excerpt, 15, '...');

$post_featured_img = has_post_thumbnail($post_id)
    ? wp_get_attachment_image_url(get_post_thumbnail_id($post_id), "full")
    : get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
?>

<a href="<?php echo $post_permalink; ?>" class="flex flex-col justify-end grow bg-aliceblue h-[31.5vw] max-2xl:h-[28rem] max-md:h-[22.3rem] max-md:bg-lightblue px-5 py-7 group hover:bg-lightblue transition-all duration-700 relative <?php echo has_excerpt($post_id) ? 'hover-block' : ''; ?> type-one max-md:gap-5">
    <div class="image min-h-[16rem] max-md:min-h-1 flex items-center justify-center py-10 transition-all duration-700 scale-100 group-hover:scale-75 lg:group-hover:-translate-y-2">
        <img loading="lazy" data-src="<?php echo $post_featured_img; ?>" alt="<?php echo $post_title; ?>" class="lazy-image object-contain w-[66%]" />
    </div>
    <div class="desc-block pt-7 border-t-[1px] border-opacity-20 border-black">
        <h2 class="text-xl font-medium leading-6 text-black"><?php echo $post_title; ?></h2>
        <p class="mt-5 max-md:mt-3 text-base leading-5 text-black line-clamp-3 max-md:line-clamp-2 desc overflow-hidden md:hidden">
            <?php echo $truncated_excerpt; ?>
        </p>
    </div>
    <div class="primary-btn absolute pointer-events-none top-8 right-8 max-lg:top-4 max-lg:right-4 opacity-0 transition-all duration-700 delay-100 group-hover:opacity-100 max-lg:opacity-100">
        <span class="btn-arrow">
            <span class="icon-arrow-right"></span>
        </span>
    </div>
</a>
