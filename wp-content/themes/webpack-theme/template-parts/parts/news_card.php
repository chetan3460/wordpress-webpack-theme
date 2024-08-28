 <a href="<?php the_permalink(); ?>" class="flex overflow-hidden relative flex-col justify-between p-8 max-md:p-[1.25rem] text-white h-[31.25rem] max-md:h-[22.5rem] w-full bg-dark-50 max-md:text-white group transition-all hover:text-white delay-200 cursor-pointer">
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
     <img data-src="<?php echo $post_featured_img; ?>" alt="<?php the_title(); ?>" class="object-cover absolute max-md:size-full max-md:left-0 max-md:top-0  aspect-square left-[1.875rem] w-[10rem] h-[10rem] top-[7rem] transition-all duration-1000  group-hover:left-0 group-hover:top-0 group-hover:h-full group-hover:w-full lazy-image" />


     <div class="relative text-white-[0.2] max-md:text-white justify-center self-start px-5 py-2 max-md:py-1.5 whitespace-nowrap border max-md:border-white border-beige border-solid transition-all group-hover:border-white delay-200 group-hover:text-white">News</div>

     <div class="overlay !opacity-0 max-md:!opacity-40 group-hover:delay-500 transition-all duration-700  group-hover:!opacity-40"></div>

     <div class="relative z-10">
         <time datetime="<?php echo get_the_date('c'); ?> class=" relative opacity-50"><?php echo get_the_date('j F Y'); ?></time>
         <h3 class="relative mt-3 text-3xl max-md:text-[1.57rem] max-md:leading-7 font-medium leading-9 capitalize line-clamp-2"><?php the_title(); ?></h3>
     </div>
 </a>