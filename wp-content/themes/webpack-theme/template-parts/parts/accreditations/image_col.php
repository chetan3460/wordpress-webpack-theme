<?php
if (has_post_thumbnail()) {
    $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
} else {
    $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
}
?>


<div class="flex flex-col w-[35%] max-sl:w-[32%] max-md:hidden image-wrap">
    <div class="flex justify-center items-center px-16 max-sl:px-10  bg-darkblue h-[20vw] w-[24vw]">
        <img loading="lazy" src="<?= $post_featured_img; ?>" alt="Certification logo" class="max-w-full transition-all img-invert duration-500 img-item  w-[12vw] " />
    </div>
</div>