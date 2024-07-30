<?php
$heading = get_sub_field('heading');
$select_joint = get_sub_field('select_joint');
$total_joint = count($select_joint);
$formatted_count = $total_joint < 9 ? '0' . $total_joint : $total_joint;

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($select_joint && !$hide_block) :

?>

    <section class="product-gallery flex items-center pr-16 max-xl:pr-5 max-md:p-0 max-md:flex-col section-block max-container fade-in" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="bg-darkblue flex flex-col justify-between h-[54.5vw] max-lg:h-[70vw] max-sl:h-[75vh] max-md:h-auto w-[47%] max-md:w-full py-[6.8vw] pl-[3.75rem] max-lg:pl-7 pr-[10rem] max-lg:pr-[6rem] max-md:p-5 max-md:pb-[10rem] text-white">
            <div class="top-block">
                <?php if ($heading) : ?>
                    <div class="max-md:flex max-md:gap-3 max-md:justify-between">
                        <h2 class="text-3xl max-md:text-[1.65rem] font-medium leading-9  capitalize">
                            <?= $heading; ?>
                        </h2>
                        <?php if (wp_is_mobile()) { ?>
                            <div class="c-block">
                                <p class="relative flex pt-2 overflow-hidden"><span class="count-item text-6xl  leading-[3.875rem] inline-block">01</span><span class="opacity-50  relative -top-2 text-xl  font-medium t-count">/ <?= $formatted_count; ?></span></p>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif; ?>

                <div class="product-thumb-block swiper pt-12 max-md:pt-6 md:-ml-2.5">
                    <div class="swiper-wrapper">
                        <?php foreach ($select_joint as $joint) :
                            setup_postdata($joint);
                            $gallery = get_field('gallery', $joint->ID);
                            if ($gallery) {
                                foreach ($gallery as $key => $image) :
                                    if($key == 0){
                                        if ($image) {
                                            $slider_image = wp_get_attachment_image_url($image, "full");
                                        } else {
                                            $slider_image =
                                                get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                                        }

                            ?>
                            <div class="swiper-slide w-[28%] max-sl:w-[40%] max-md:w-[28%] cursor-pointer group">
                                <div class="product-thumb  p-2.5 aspect-[1] border border-solid border-transparent transition-all duration-700 hover:border-orange group-[&.swiper-slide-thumb-active]:border-orange relative mb-4">
                                    <div class="overlay !from-darkblue  !to-darkblue ransition-all duration-700 group-hover:opacity-0 group-[&.swiper-slide-thumb-active]:opacity-0"></div>
                                    <div class="img bg-lightblue p-3 relative">
                                        <img loading="lazy" src="<?= $slider_image;?>" alt="<?= $joint->post_title; ?>" class="object-contain" />
                                    </div>
                                </div>
                            </div>
                        <?php
                                    }
                                endforeach;
                            }
                        endforeach;
                        wp_reset_postdata(); ?>
                    </div>
                </div>

            </div>


            <div class="bottom-block  flex justify-between items-end">
                <div class="btn-wrap  flex gap-3 max-md:hidden">
                    <button class="swiper-btn-prev swiper-arrow flex items-center justify-center border-white border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-white hover:text-darkblue [&.swiper-button-disabled]:pointer-events-none  [&.disabled]:pointer-events-none" aria-label="left slide arrow">
                        <span class="icon-arrow-left "></span>
                    </button>
                    <button class="swiper-btn-next swiper-arrow flex items-center justify-center border-white border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-white hover:text-darkblue [&.swiper-button-disabled]:pointer-events-none  [&.disabled]:pointer-events-none" aria-label="right slide arrow">
                        <span class="icon-arrow-right "></span>
                    </button>
                </div>
                <?php if (!wp_is_mobile()) { ?>
                    <div class="c-block">
                        <p class="relative flex pt-2 overflow-hidden"><span class="count-item text-[6.875rem] max-lg:text-[3rem]  leading-[4.875rem] max-lg:leading-[3rem] inline-block">01</span><span class="opacity-50 text-md relative -top-2 text-3xl max-lg:text-2xl font-medium t-count">/ <?= $formatted_count; ?></span></p>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="bg-aliceblue h-[41vw] max-lg:h-[56vw] max-sl:h-[65vh] max-md:h-auto w-[61%] max-md:w-[calc(100%-2.5rem)] -ml-[7%] max-md:ml-0 max-md:-mt-40 px-10 py-16 max-lg:py-12 max-md:p-5 ">
            <div class="swiper product-items h-full">
                <div class="swiper-wrapper">
                    <?php foreach ($select_joint as $joint) :
                        setup_postdata($joint);
                    ?>
                        <div class="swiper-slide product-item !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-500">
                            <h3 class="text-xl max-md:text-[0.875rem] font-medium leading-6 max-md:leading-5 max-sl:max-w-[50%]"><?= $joint->post_title; ?></h3>
                            <div class="product-images swiper -top-8">
                                <div class="swiper-pagination text-right right-0 !top-0 !bottom-auto dash z-20"></div>
                                <div class="next-prev-block flex  h-full absolute w-full z-10">
                                    <div class="w-1/2  h-full show-cursor rotate prev-block relative">
                                        <div class="flex items-center justify-center rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 bg-darkblue text-white lg:hidden absolute top-1/2 left-[20%] -translate-x-1/2 -translate-y-1/2" aria-label="left slide arrow">
                                            <span class="icon-arrow-left "></span>
                                        </div>
                                    </div>
                                    <div class="w-1/2  h-full show-cursor next-block relative">
                                        <div class="flex items-center justify-center rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 bg-darkblue text-white lg:hidden absolute top-1/2 right-[20%] translate-x-1/2 -translate-y-1/2" aria-label="right slide arrow">
                                            <span class="icon-arrow-right "></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-wrapper">
                                    <?php $gallery = get_field('gallery', $joint->ID);
                                    if ($gallery) {
                                        foreach ($gallery as $image) :
                                            if ($image) {
                                                $slider_image = wp_get_attachment_image_url($image, "full");
                                            } else {
                                                $slider_image =
                                                    get_stylesheet_directory_uri() . '/assets/images/placeholder-large.jpg';
                                            }

                                    ?>
                                            <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-500">
                                                <img loading="lazy" src="<?= $slider_image; ?>" alt="<?= $joint->post_title; ?>" class="object-contain w-[25rem] h-[25rem] max-lg:w-[18rem] max-lg:h-[18rem] max-md:w-[12rem] max-md:h-[12rem] max-lg:mt-8 max-sl-mt-14 m-auto" />
                                            </div>
                                    <?php endforeach;
                                    } ?>
                                </div>
                            </div>
                            <div class="prose max-md:prose-ul:text-[0.875rem] max-md:leading-5 md:absolute -bottom-1 left-0 z-10 text-black marker:text-black">
                                <?= $joint->post_content; ?>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>


    </section>
<?php endif; ?>