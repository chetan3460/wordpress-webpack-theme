<!-- Module Banner slider with video -->
<?php
$banner_group = get_sub_field('banner_group');
$slide_subtitle = get_sub_field('slide_subtitle');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($banner_group && !$hide_block) :
?>
<!-- Slider Banner  -->
    <section class="relative h-[100svh] overflow-hidden banner-block [clip-path:polygon(0%_100%,100%_100%,100%_100%,0%_100%)]" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

        <div class="banner-slider absolute size-full scale-125">
            <div class="swiper-wrapper">
                <?php
                $i = 0;

                while (have_rows('banner_group')) : the_row();
                    $image = get_sub_field('banner_image');
                    $slideClass = '';
                    $slideClass = ($i == 0) ? 'object-cover h-full w-full first-image' : 'object-cover h-full w-full b-lazy-image';
                    $image_alt = !empty($image['alt']) ? esc_attr($image['alt']) : 'Banner Image'; // Provide default alt text if empty

                ?>
                    <div class="swiper-slide">
                        <?php
                        // echo wp_get_attachment_image_url($image, 'banner');
                        echo wp_get_attachment_image($image, 'full', false, array('class' => esc_attr($slideClass), 'alt' => esc_attr($image_alt)));
                        ?>
                    </div>
                <?php $i++;
                endwhile; ?>
            </div>
        </div>

        <div class="overlay !opacity-20 "></div>

        <div class="flex justify-between max-sl:justify-start  relative z-10 px-16 max-xl:px-5 max-md:pl-5 max-md:pr-0 pb-16 max-sl:pb-10 items-end h-full gap-[21rem] max-3xl:gap-[10rem] max-lg:gap-5  max-sl:flex-col-reverse max-sl:items-start max-container">
            <div class="left-block  flex gap-[6.25rem] flex-col relative max-lg:gap-10 max-md:gap-5 max-md:w-full">

                <div class="caption sl:max-w-[60rem] lg:max-w-[55rem] relative max-md:pr-5">
                    <?php if ($slide_subtitle) : ?>
                        <h2 class="text-xl max-md:text-base leading-5 text-white uppercase mb-4 font-normal opacity-0 translate-y-4"><?= $slide_subtitle; ?></h2>
                    <?php endif; ?>
                    <?php $k = 0;
                    while (have_rows('banner_group')) : the_row();
                        $firstheading = get_sub_field('heading');
                        if ($k == 0) {
                    ?>
                            <h1 class="text-8xl max-lg:text-7xl max-md:text-5xl leading-[6.2rem] font-medium text-white capitalize  relative md:-left-1.5"><?= $firstheading; ?></h1>
                    <?php }
                        $k++;
                    endwhile; ?>
                </div>

                <div class="slide-items relative max-md:pr-20">
                    <div class="banner-free-slide">
                        <div class="swiper-wrapper text-white">
                            <?php
                            $j = 0;
                            while (have_rows('banner_group')) : the_row();
                                $heading = get_sub_field('heading');
                            ?>
                                <div class="swiper-slide w-[33.333%] max-xxl:min-w-[16rem] min-w-[20rem] max-md:w-[100%]">
                                    <div class="mr-7">
                                        <p class="text-[1.25rem] mb-4 font-medium banner-count group"><span class="transition-all duration-700 opacity-0 translate-y-3 inline-block group-[&.active]:opacity-100 group-[&.active]:translate-y-0">0</span><span class="slide-count transition-all duration-700 delay-100 opacity-0 translate-y-3 inline-block group-[&.active]:opacity-100 group-[&.active]:translate-y-0"><?= $j + 1; ?></span></p>
                                        <div class="progress-block w-0 h-1 bg-white bg-opacity-50 mb-4 rounded-full relative">
                                            <span class=" bg-white absolute left-0 h-full rounded-full p-bar"></span>
                                        </div>
                                        <h3 class="flex-1 my-auto font-medium capitalize text-[1.25rem]/6 pr-8 translate-y-3 opacity-0"><?= $heading ?></h3>
                                    </div>
                                </div>
                            <?php $j++;
                            endwhile; ?>

                        </div>
                    </div>
                </div>
            </div>

            <?php if (have_rows('video')) :
                while (have_rows('video')) : the_row();
                    $videoImage = get_sub_field('video_image');
                    $videoUrl = get_sub_field('video_url');
            ?>
                    <div class="right-block  flex md:justify-end relative max-md:w-full">
                        <div class="video-block w-[14rem] max-lg:w-[10rem] h-[14rem] max-lg:h-[10rem] max-md:h-auto md:p-2 lg:p-5 md:border-white/50 md:border-solid md:border md:rounded-xl opacity-0 scale-75">
                            <?php if ($videoImage) : ?>
                                <img loading="lazy" data-src="<?= $videoImage; ?>" alt="Video Image" class="w-full aspect-[1.41]  lazy-image mb-3 rounded-xl object-cover  max-lg:h-[5.3rem] max-md:hidden" />
                            <?php endif; ?>
                            <?php if ($videoUrl) : ?>
                                <a data-fancybox href="<?= $videoUrl; ?>" class="fancy-box flex items-center justify-center gap-1.5 text-base font-medium leading-5 uppercase whitespace-nowrap bg-white  rounded-full text-darkblue cursor-pointer max-md:mr-5 px-16 py-2.5 max-lg:px-2 max-md:px-0 max-md:py-2 transition-all duration-700 group hover:bg-darkblue hover:text-white">
                                    <span class="icon-play"></span>
                                    <div class="lg:flex-1">Play</div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php endwhile;
            endif; ?>

        </div>
    </section>
<?php endif; ?>