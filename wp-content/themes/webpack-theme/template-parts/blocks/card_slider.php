<?php
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');
$items = get_sub_field('items');

// Hiding and cosmetics/styles
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($items && !$hide_block) :

?>
    <section class="py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 max-container overflow-slider section-block fade-in overflow-hidden" style="
    <?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px;<?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="flex gap-5 justify-between items-end  w-full max-md:flex-wrap max-md:max-w-full">
            <?php if ($sub_title || $heading) : ?>
                <div class="flex flex-col text-black max-md:max-w-full">
                    <?php if ($sub_title) : ?>
                        <p class="text-xl leading-5 mb-5 uppercase max-md:max-w-full"><?= $sub_title; ?></p>
                    <?php endif; ?>
                    <?php if ($heading) : ?>
                        <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize"><?= $heading; ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="flex gap-1.5  rounded-full max-sl:w-[30%] max-md:hidden">
                <div class="btn-wrap  flex justify-end gap-3">
                    <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="left slide arrow">
                        <span class="icon-arrow-left"></span>
                    </button>
                    <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                        <span class="icon-arrow-right"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="cases-list mt-14 max-md:mt-10">
            <div class="swiper overflow-visible">
                <div class="swiper-wrapper">
                    <?php foreach ($items as $item) :
                    ?>
                        <div class="swiper-slide w-[39rem] max-md:w-[20rem]">
                            <?php
                            get_template_part('template-parts/parts/case_study','card', array(
                                '$heading' => $item['heading'],
                                '$desc' => $item['description'],
                                '$image' => $item['image'],
                                '$link' => $item['link'],
                            )); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>