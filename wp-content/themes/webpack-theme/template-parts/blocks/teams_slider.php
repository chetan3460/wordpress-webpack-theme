<?php

$subtitle = get_sub_field('sub_title');
$heading = get_sub_field('heading');
$select_team = get_sub_field('select_team');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($select_team && !$hide_block) :
?>

    <section class="py-[6.25rem]   max-md:py-12   " style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-container">
            <div class="max-md:mt-10 news-slider fade-in no-loop">
                <div class="flex gap-5 max-md:gap-8 team-block <?php if (wp_is_mobile()) { ?> flex-col <?php } ?>">
                    <div class=" w-[36%] max-sl:w-[40%] max-md:w-full  h-auto z-20 relative  ml-12 max-xl:ml-3 bg-white/90">
                        <div class="pl-4 max-md:pl-2 flex flex-col justify-between flex-wrap h-full">
                            <?php if ($subtitle || $heading) : ?>
                                <div class="pr-[20%] max-md:pr-10">
                                    <?php if ($subtitle) : ?>
                                        <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-14 max-md:text-[1rem]"><?= $subtitle; ?></p>
                                    <?php endif; ?>
                                    <?php if ($heading) : ?>
                                        <h2 class="text-[2.5rem] max-md:text-2xl leading-[3rem] max-md:leading-8 font-medium "><?= $heading; ?></h2>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!wp_is_mobile()) { ?>
                                <div class="btn-wrap  flex  gap-3 ">
                                    <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="left slide arrow">
                                        <span class="icon-arrow-left"></span>
                                    </button>
                                    <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                                        <span class="icon-arrow-right"></span>
                                    </button>
                                </div>
                            <?php } ?>
                            <div class="swiper-pagination !top-auto !w-[95%] hidden"></div>
                        </div>
                    </div>
                    <div class="flex flex-col w-[64%] max-sl:w-[60%] max-md:w-full swiper overflow-visible  z-10  max-md:pl-5">
                        <div class="swiper-wrapper">
                            <?php foreach ($select_team as $post) : setup_postdata($post);
                                $designation = get_field('designation');
                                if (has_post_thumbnail()) {
                                    $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
                                } else {
                                    $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                                }

                            ?>
                                <div class="swiper-slide  w-[26.5rem] max-md:w-[19rem]">
                                    <div class="overflow-hidden relative flex flex-col grow justify-end  text-white aspect-[0.85] cursor-pointer group">

                                        <img loading="lazy" data-src="<?= $post_featured_img; ?>" alt="<?php the_title(); ?>" class="lazy-image object-cover absolute inset-0 size-full scale-100 duration-700 transition-all group-hover:scale-110" />

                                        <div class="desc relative z-10">
                                            <div class="absolute bg-white text-black  bottom-4 max-md:bottom-3 p-5 max-md:p-4  w-[calc(100%-1.6rem)] left-[0.8rem] ">
                                                <h3 class="capitalize text-[1.625rem] max-md:text-xl font-medium leading-7 "><?php the_title(); ?></h3>
                                                <?php if ($designation) : ?>
                                                    <p class="text-base max-md:text-[0.875rem] mt-3 max-md:mt-1 line-clamp-1 opacity-50"><?= $designation; ?>r</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                <?php if (wp_is_mobile()) { ?>
                    <div class="btn-wrap  flex  gap-3 px-5 mt-5">
                        <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="left slide arrow">
                            <span class="icon-arrow-left"></span>
                        </button>
                        <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                            <span class="icon-arrow-right"></span>
                        </button>
                    </div>
                <?php } ?>
                <?php if ($cta) : ?>
                    <a href="<?= $cta['url'] ?>" target="<?= $cta_target; ?>" class="primary-btn md:hidden max-md:mt-5 max-md:pl-5">
                        <span class="btn-text"><span><?= $cta['title'] ?></span></span>
                        <span class="btn-arrow">
                            <span><img loading="lazy" class="lazy-image" data-src="<?= get_stylesheet_directory_uri() ?>/assets/images/arrow-right.svg" alt="arrow"></span>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>



<?php endif; ?>