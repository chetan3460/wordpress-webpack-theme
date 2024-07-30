<?php

$heading = get_sub_field('heading');
$select_accreditations = get_sub_field('select_accreditations');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($select_accreditations && !$hide_block) :
?>

    <section class="img-hover-block type-one py-[6.25rem] px-16 max-xl:px-5 max-md:py-12  text-black fade-in" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-container">
            <?php if ($heading) : ?>
                <div class="flex gap-5 mb-[3.75rem] max-md:mb-10">
                    <div class="w-[35%] max-sl:w-[32%] max-md:hidden">
                    </div>
                    <div class="w-[65%] max-sl:w-[68%] max-md:w-full">
                        <h2 class="text-6xl max-sl:text-4xl max-md:text-3xl font-medium  capitalize leading-[3.75rem]">
                            <?= $heading; ?>
                        </h2>
                    </div>
                </div>
            <?php endif; ?>
            <div class="flex gap-5 hover-slide-block first-item-open">
                <?php foreach ($select_accreditations as $key => $post) :
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post);
                    if ($key == 0) {

                ?>
                        <!-- Image col -->
                        <?php get_template_part('template-parts/parts/accreditations/image_col'); ?>
                <?php }
                endforeach;
                wp_reset_postdata(); ?>
                <div class="flex flex-col w-[65%] max-sl:w-[68%] max-md:w-full border-t-[1px] border-black/10">
                    <?php foreach ($select_accreditations as $key => $post) :
                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post);

                    ?>
                        <!-- Image col -->
                        <?php get_template_part('template-parts/parts/accreditations/year_row'); ?>

                    <?php endforeach;
                    wp_reset_postdata(); ?>

                    <?php if ($cta) : ?>
                        <a href="<?= $cta['url'] ?>" target="<?= $cta_target; ?>" class="primary-btn mt-20 max-md:mt-10">
                            <span class="btn-text"><span><?= $cta['title'] ?></span></span>
                            <span class="btn-arrow">
                                <span class="icon-arrow-right"></span>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Certification Block Popup-->

    <section class="certificates-pop-up group fixed size-full inset-0  z-[60]  certificate-slider transition-all duration-1000 [clip-path:polygon(0_0,0_0,0_100%,0_100%)] invisible [&.active]:[clip-path:polygon(0_0,100%_0%,100%_100%,0_100%)] [&.active]:visible">
        <div class="w-1/2 max-lg:w-3/4 max-md:w-full bg-white h-full absolute right-0 top-0 z-10 swiper ">

            <div class="swiper-wrapper">
                <?php foreach ($select_accreditations as $key => $post) :
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post);

                ?>
                    <!-- Popup -->
                    <?php get_template_part('template-parts/parts/accreditations/popup'); ?>

                <?php endforeach;
                wp_reset_postdata(); ?>


            </div>

            <div class="close-btn rounded-btn rounded-full cursor-pointer transition-all duration-700 delay-0 bg-white w-11 h-11  flex items-center justify-center hover:opacity-50 absolute right-10 top-10 max-md:right-5 max-md:top-5  z-20">
                <img data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="Close icon" class="lazy-image w-3 h-3" />
            </div>

            <div class="btn-wrap  flex justify-start gap-3 absolute z-20 left-16 bottom-16 max-lg:left-10 max-lg:bottom-10 max-md:left-5 max-md:bottom-5">
                <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&amp;.swiper-button-disabled]:pointer-events-none swiper-button-disabled" aria-label="left slide arrow" disabled="">
                    <span class="icon-arrow-left"></span>
                </button>
                <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&amp;.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                    <span class="icon-arrow-right"></span>
                </button>
            </div>

        </div>
        <div class="overlay-blurred close-btn size-full inset-0 absolute backdrop-blur-[0.5rem] bg-black/10 ">

        </div>
    </section>
    <!-- Certification Block Popup Ends-->

<?php endif; ?>