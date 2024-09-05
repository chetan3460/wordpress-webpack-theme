<a href="<?php the_permalink(); ?>" class="fade-in overflow-hidden relative flex flex-col grow justify-end  text-white aspect-[0.96] cursor-pointer group p-8  max-lg:p-4 h-[31.25rem] max-md:h-[20rem] w-full bg-aliceblue  group transition-all  delay-200 rounded-2xl">

    <?php
    if (get_field('post_thumbnail')) {
        $post_featured_img = wp_get_attachment_image_url(get_field('post_thumbnail'), "full");
    } else {
        if (has_post_thumbnail()) {
            $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
        } else {
            $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
        }
    }
    ?>
    <img data-src="<?php echo $post_featured_img; ?>" alt="<?php the_title(); ?>" class="lazy-image object-cover absolute inset-0 size-full scale-100 duration-700 transition-all group-hover:scale-110" />
    <div class="absolute top-0 z-10 mt-8 text-navyblue max-md:text-navyblue justify-center self-start px-5 py-2 max-md:py-1.5 whitespace-nowrap bg-whi   transition-all  delay-200 group-hover:text-navyblue bg-white/60 backdrop-blur-[10px] backdrop-brightness-[1.2]">News</div>
    <div class="desc relative z-10">
        <p class="text-base mt-3 line-clamp-4 pb-3"> <time datetime="<?php echo get_the_date('c'); ?>" class="relative opacity-50"><?php echo get_the_date('j F Y'); ?></time></p>
        <h3 class="capitalize text-[1.625rem] font-medium leading-7 relative transition-all duration-700 bottom-0 left-0 lg:group-hover:bottom-14"><?php the_title(); ?></h3>

        <div class="absolute bg-white text-black  bottom-0 p-5 transition-all duration-700 delay-100 [clip-path:polygon(0%_100%,100%_100%,100%_100%,0%_100%)] group-hover:[clip-path:polygon(0%_0%,100%_0%,100%_100%,0%_100%)] max-lg:hidden">
            <p class="text-base mt-3 line-clamp-4 pb-3"> <time datetime="<?php echo get_the_date('c'); ?>" class="relative opacity-50"><?php echo get_the_date('j F Y'); ?></time></p>
            <h3 class="capitalize text-[1.625rem] font-medium leading-7 "><?php the_title(); ?></h3>
        </div>
    </div>
    <div class="overlay"></div>
</a>