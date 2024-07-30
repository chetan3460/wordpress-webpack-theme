 <?php
    if (has_post_thumbnail()) {
        $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
    } else {
        $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
    }
    $year = get_field('year');
    ?>


 <div class="item py-10 border-b-[1px] border-black/10 flex max-md:flex-col gap-24 max-sl:gap-14 max-md:gap-3 relative cursor-pointer group hover-block type-two" data-image="<?= $post_featured_img; ?>">
     <div class="col">
         <?php if ($year) : ?>
             <p class="self-start text-xl max-md:text-base leading-8 text-darkblue"><?= $year; ?></p>
         <?php endif; ?>
     </div>
     <div class=" col justify-center items-center px-8  bg-darkblue  w-full h-full hidden max-md:flex aspect-[1.48]">
         <img data-src="<?= $post_featured_img; ?>" alt="Certification logo" class="max-w-full h-auto  w-[60%] transition-all duration-500 lazy-image" />
     </div>
     <div class="col">
         <h3 class="text-3xl max-sl:text-2xl max-md:text-[1.25rem] font-medium leading-9 max-md:leading-7 capitalize text-darkblue"><?php the_title(); ?></h3>
         <p class="mt-3 max-md:mt-2 text-base max-md:text-[0.875rem] leading-6 max-md:leading-5  opacity-50 max-w-[60%] max-sl:max-w-[80%] max-md:max-w-full h-item desc  overflow-hidden max-md:!h-auto hidden max-md:!block">
             <?= get_the_excerpt(); ?>
         </p>
     </div>
     <div class="primary-btn absolute max-md:static pointer-events-none top-[50%] right-0 md:-translate-y-[50%] max-md:mt-3 opacity-0 max-md:opacity-100 transition-all duration-700 delay-100 group-hover:opacity-100">
         <span class="btn-text hidden max-md:block"><span>learn more</span></span>
         <span class="btn-arrow">
             <span class="icon-arrow-right"></span>
         </span>
     </div>
 </div>