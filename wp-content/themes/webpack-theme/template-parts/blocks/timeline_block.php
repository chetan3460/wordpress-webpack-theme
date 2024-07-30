<?php

$heading = get_sub_field('heading');
$timeline = get_sub_field('timeline');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($timeline && !$hide_block) :

?>


    <?php if (!wp_is_mobile()) { ?>

        <section class="timeline-block fade-in relative max-md:hidden" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

            <div class="years-block  w-full  overflow-hidden h-[9rem] max-sl:h-20  max-md:pb-0 absolute -z-10 top-[20%] ">
                <div class="years-wrapper current absolute">
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                </div>
                <div class="years-wrapper next absolute ">
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                    <h2></h2>
                </div>
            </div>
            <div class="timeline flex gap-[6.25rem] max-lg:gap-10 max-sl:gap-5 py-[6.25rem] max-md:py-12 px-16 max-xl:px-5">
                <div class="col img-wrap w-1/2 max-lg:w-[55%] max-sl:w-[58%]">
                    <div class="images pl-16 relative overflow-hidden">
                        <div class="main-image min-h-[44.4rem] max-sl:min-h-[38rem] h-[48vw] relative z-20">
                            <?php foreach ($timeline as $row) {
                                $image = $row['image'];
                                if ($image) {
                                    $image = wp_get_attachment_image_url($image, 'full');
                                } else {
                                    $image = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                                }
                            ?>
                                <img loading="lazy" class="lazy-image object-cover size-full absolute transition-all duration-1000   [&.in-active]:[clip-path:polygon(100%_0%,100%_0%,100%_100%,100%_100%)]  [clip-path:polygon(100%_0%,0%_0%,0%_100%,100%_100%)] " data-src="<?= $image; ?>" alt="Timeline Image">
                            <?php } ?>
                        </div>

                        <div class="stack-image two absolute min-h-[44.4rem] max-sl:min-h-[38rem] h-[48vw] w-full z-0 scale-[0.90] -left-4 top-0 transition-all duration-1000">
                            <img loading="lazy" class="object-cover size-full absolute transition-all duration-1000 !opacity-100  [&.hide]:translate-x-20" data-src="" alt="FPI">
                        </div>
                        <div class="stack-image one absolute min-h-[44.4rem] max-sl:min-h-[38rem] h-[48vw] w-full z-0 scale-[0.95] left-6 top-0 transition-all duration-1000 ">
                            <img loading="lazy" class="object-cover size-full absolute transition-all duration-1000 !opacity-100 [&.hide]:translate-x-20" data-src="" alt="FPI">
                        </div>
                    </div>
                </div>
                <div class="col info-block w-1/2 max-lg:w-[45%] max-sl:w-[42%] flex flex-col justify-between relative">
                    <?php if ($heading) : ?>
                        <div class="top">
                            <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-14 max-md:text-[1rem]"><?= $heading; ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="info-list pb-40 max-sl:pb-32 lg:w-[70%]  relative">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($timeline as $row) {
                                    $year = $row['year'];
                                    $content = $row['content'];
                                    if ($year || $heading || $content) :
                                ?>
                                        <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700" data-year="<?= $year; ?>">
                                            <div class="info prose prose-h3:font-medium prose-h3:text-3xl  prose-p:mb-2 prose-p:mt-2 prose-p:text-xl max-sl:prose-p:text-base">
                                                <?php if ($year) : ?>
                                                    <h3><?= $year; ?></h3>
                                                <?php endif; ?>
                                                <?php if ($content) : ?>
                                                    <p><?= $content; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                <?php endif;
                                } ?>

                            </div>
                        </div>
                    </div>
                    <div class="bottom absolute bottom-0  w-[70%] pb-9">
                        <div class="btn-wrap  flex justify-start gap-3 ">
                            <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none [&.disabled]:pointer-events-none" aria-label="left slide arrow">
                                <span class="icon-arrow-left"></span>
                            </button>
                            <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none [&.disabled]:pointer-events-none" aria-label="right slide arrow">
                                <span class="icon-arrow-right"></span>
                            </button>
                        </div>
                        <div class="swiper-pagination !top-auto bottom-0 !w-[95%]"></div>
                    </div>
                </div>
            </div>
        </section>

    <?php } ?>
    <!--timeline block till tablet Ends -->

    <!-- timeline block For mobile -->

    <section class="timeline-mobile-block overflow-slider auto-height fade-in md:hidden py-[6.25rem] max-md:py-12 px-16 max-xl:px-5">
        <?php if ($heading) : ?>
            <div class="top">
                <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-14 max-md:text-[1rem]"><?= $heading; ?></p>
            </div>
        <?php endif; ?>


        <div class="swiper overflow-visible">
            <div class="swiper-wrapper">
                <?php
                foreach ($timeline as $row) {
                    $year = $row['year'];
                    $content = $row['content'];
                    $image = $row['image'];
                    if ($image) {
                        $image = wp_get_attachment_image_url($image, 'full');
                    } else {
                        $image = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                    }

                    if ($year || $heading || $content) :
                ?>
                        <div class="swiper-slide w-full">
                            <div class="image aspect-[0.8]">
                                <img loading="lazy" class="object-cover w-full h-full" src="<?= $image; ?>" alt="Timeline Image">
                            </div>
                            <div class="info mt-5 prose prose-h3:font-medium prose-h3:text-xl prose-h4:opacity-50 prose-h4:text-base prose-h4:font-medium prose-p:mb-2 prose-p:mt-2 prose-p:text-base ">
                                <?php if ($year) : ?>
                                    <h4><?= $year; ?></h4>
                                <?php endif; ?>
                                <?php if ($content) : ?>
                                    <p><?= $content;?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php endif;
                } ?>
            </div>
            <div class="btn-wrap mt-10  flex  gap-3 ">
                <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&amp;.swiper-button-disabled]:pointer-events-none swiper-button-disabled" aria-label="left slide arrow" disabled="">
                    <span class="icon-arrow-left"></span>
                </button>
                <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&amp;.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                    <span class="icon-arrow-right"></span>
                </button>
            </div>
        </div>

    </section>
<?php endif; ?>