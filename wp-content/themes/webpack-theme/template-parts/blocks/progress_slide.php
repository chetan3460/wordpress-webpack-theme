<?php
$banner = get_sub_field('banner');
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');
// $illustration = get_sub_field('illustration');
$slides = get_sub_field('slides');
$transparent = get_sub_field('transparent_background');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($banner || $sub_title || $heading) && !$hide_block) :

?>

    <!-- Progress image slider -->
    <section class="progress-slide-block <?php echo (!$transparent) ? 'light-bg' : ''; ?> relative flex items-center  h-[71.8rem] max-md:-mb-12 justify-end fade-progress-slider max-xl:h-auto max-xl:block max-container" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

        <?php if ($banner) : ?>
            <div class="absolute size-full z-10 w-[76%] left-0 max-xl:static max-xl:h-[16.25rem] max-xl:w-full fade-up">
                <img class="h-full object-cover max-xl:w-full lazy-image" loading="lazy" data-src="<?= wp_get_attachment_image_url($banner, 'full') ?>" alt="<?= esc_attr(get_post_meta($banner, '_wp_attachment_image_alt', true)) ?: 'Banner '; ?>">
            </div>
        <?php endif; ?>


        <div class="content-block bg-darkblue text-white h-[50rem] max-md:h-auto max-sl:h-[45rem] z-20 relative w-[68.75rem] py-[5rem] px-[3.75rem] max-sl:px-[1.875rem] max-sl:py-[2.5rem] max-xl:w-[calc(100%-2.5rem)] max-xl:m-auto max-xl:relative max-xl:top-[-3.5rem]  <?php if (!wp_is_mobile()) { ?> parallax-item translate-y-[16%]<?php } ?>">

            <!-- <?php //if ($illustration) : ?>
                <img class="lazy-image absolute left-0 bottom-0 max-md:hidden" data-src="<? //= $illustration; ?>" alt="" />
            <?php //endif; ?> -->

            <div class="flex gap-5 h-full max-md:flex-col ">

                <?php if ($sub_title || $heading) : ?>

                    <div class="left flex flex-col w-[43%]  justify-between max-md:w-full max-md:relative max-md:pb-5">
                        <div>
                            <?php if ($sub_title) : ?>
                                <p class="text-xl leading-5 uppercase  max-md:mb-2 mb-5 max-md:text-[1rem]"><?= $sub_title; ?></p>
                            <?php endif; ?>

                            <?php if ($heading) : ?>
                                <h2 class="text-6xl leading-[4rem] max-xl:text-[3rem] max-sl:text-[2.5rem] max-md:text-[2rem] max-md:leading-[2.3rem] max-sl:leading-[3rem]  font-medium capitalize ">
                                    <?= $heading; ?>
                                </h2>
                            <?php endif; ?>

                            <?php if (wp_is_mobile()) { ?>
                                <div class="btn-wrap  flex gap-3  mt-7">
                                    <button class="swiper-btn-prev swiper-arrow flex items-center justify-center border-white border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-white hover:text-darkblue [&.swiper-button-disabled]:pointer-events-none  [&.disabled]:pointer-events-none" aria-label="left slide arrow">
                                        <span class="icon-arrow-left "></span>
                                    </button>
                                    <button class="swiper-btn-next swiper-arrow flex items-center justify-center border-white border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-white hover:text-darkblue [&.swiper-button-disabled]:pointer-events-none  [&.disabled]:pointer-events-none" aria-label="right slide arrow">
                                        <span class="icon-arrow-right "></span>
                                    </button>
                                </div>
                            <?php } ?>

                        </div>
                        <?php if ($slides) : ?>
                            <div class="max-md:absolute max-md:bottom-8 max-md:right-0 c-block">
                                <p class="text-8xl max-sl:text-7xl max-md:text-[2.5rem] max-md:leading-[3rem] leading-[6rem] count relative top-2.5 overflow-hidden"><span class="current [&.next]:absolute leading-none block">01</span></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="right flex flex-col w-[57%] max-md:w-full relative justify-between md:pl-16 swiper overflow-visible">
                    <?php if (!wp_is_mobile()) { ?>
                        <div>
                            <div class="btn-wrap  flex gap-3 mb-8 ">
                                <button class="swiper-btn-prev swiper-arrow flex items-center justify-center border-white border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-white hover:text-darkblue [&.swiper-button-disabled]:pointer-events-none  [&.disabled]:pointer-events-none" aria-label="left slide arrow">
                                    <span class="icon-arrow-left "></span>
                                </button>
                                <button class="swiper-btn-next swiper-arrow flex items-center justify-center border-white border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-white hover:text-darkblue [&.swiper-button-disabled]:pointer-events-none  [&.disabled]:pointer-events-none" aria-label="right slide arrow">
                                    <span class="icon-arrow-right "></span>
                                </button>
                            </div>
                        </div>
                    <?php } ?>


                    <?php if ($slides) : ?>
                        <div class="md:absolute md:rotate-90 md:-translate-x-2/4 md:-translate-y-2/4 md:!top-[50%] md:w-[40.2rem] md:left-0 mt-0">
                            <div class="swiper-pagination   <?php echo ($transparent) ? 'white' : ''; ?>  "></div>
                        </div>

                        <div class="w-[80%] max-md:w-full swiper-wrapper h-auto max-md:mt-10">

                            <?php foreach ($slides as $slide) {
                                $icon = $slide['icon'];
                                $title = $slide['title'];
                                $content = $slide['content'];
                                $btn_selection = $slide['cta_action'];
                                $cta = $slide['cta'];
                                $download = $slide['download_link'];
                                // var_dump($download);

                                if (!empty($cta)) {
                                    $cta_target = $cta['target'] ? $cta['target'] : '_self';
                                }
                                if ($download) {
                                    $cta['title'] = $download['title'];
                                    $cta['url'] = $download['url'];
                                    $cta_target = '_self';
                                }
                                if ($title || $content || $cta) :
                            ?>

                                    <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700 flex justify-end flex-col">
                                        <img loading="lazy" class="lazy-image aspect-[1.08] fill-white w-[5.625rem] max-md:w-[3.125rem]" data-src="<?= wp_get_attachment_image_url($icon, 'full') ?>" alt="<?= esc_attr(get_post_meta($icon, '_wp_attachment_image_alt', true)) ?: 'Slide Icon'; ?>" />

                                        <?php if ($title) : ?>
                                            <h3 class="self-stretch mt-8 max-md:mt-5 text-3xl max-md:text-xl font-medium leading-9  capitalize max-md:max-w-full">
                                                <?= $title; ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if ($content) : ?>
                                            <div class="self-stretch mt-6 max-md:mt-5 text-base leading-6  opacity-80 w-[80%] max-md:w-full prose text-white">
                                                <p><?= $content; ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($cta || $download) : ?>
                                            <a href="<?= $cta['url'] ?>" target="<?= $cta_target ?>" <?= ($download) ? 'download' : ''; ?> class="primary-btn <?php echo ($transparent) ? 'white' : ''; ?> mt-[3.75rem] max-md:mt-7">
                                                <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                                                <span class="btn-arrow">
                                                    <span><span class="icon-arrow-right"></span></span>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                    </div>

                            <?php endif;
                            } ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>