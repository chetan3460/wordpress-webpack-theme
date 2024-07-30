<?php
//  if (!empty(get_the_content())) {
?>

    <div class="swiper-slide">
        <div class="logo-block bg-darkblue flex h-[18rem] items-center justify-center">
            <div class="flex justify-center items-center p-8   bg-white h-[12rem] w-[12rem]">
                <?php
                if (has_post_thumbnail()) {
                    $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
                } else {
                    $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                }
                ?>
                <img loading="lazy" src="<?= $post_featured_img;?>" alt="<?= the_title();?>" class="max-w-full transition-all duration-500 img-item  w-[12vw] max-md:w-full " />
            </div>
        </div>
        <div class="more-details p-16 max-lg:p-10 max-md:p-5 h-[calc(100%-27rem)] max-md:h-[calc(100%-24rem)] overflow-y-auto">
            <div class="md:pr-[10%] prose prose-h2:max-md:mb-3">
                <h2 class="text-[1.875rem] max-md:text-2xl leading-9 max-md:leading-7 font-medium">
                <?= !empty(get_the_content()) ? the_content() : get_the_excerpt() ;?>
            </div>
        </div>
    </div>
<?php //} ?>