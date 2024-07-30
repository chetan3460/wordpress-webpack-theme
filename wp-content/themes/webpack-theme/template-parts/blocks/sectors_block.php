<?php
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($sub_title || $heading) && !$hide_block) :

?>

    <section class="grid-block flex flex-col py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 <?php if (wp_is_mobile()) { ?> overflow-slider-one-item <?php } ?> max-container fade-in" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

        <?php if ($sub_title) : ?>
            <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem]"><?= $sub_title; ?></p>
        <?php endif; ?>

        <?php if ($heading) : ?>
            <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize "><?= $heading; ?></h2>
        <?php endif; ?>

        <div class="mt-16 max-xl:mt-12 max-md:mt-8 <?php if (!wp_is_mobile()) { ?> grid grid-cols-4 max-sl:grid-cols-3 gap-5 <?php } ?> grid-block <?php if (wp_is_mobile()) { ?> swiper-wrapper <?php } ?>">

            <?php
            $args = array(
                'taxonomy'   => 'sectors_category',
                'number'     => 6,
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => false,
            );
            $categories = get_terms($args);
            $total_categories = wp_count_terms(array('taxonomy' => 'sectors_category', 'hide_empty' => false));
            if (!empty($categories) && !is_wp_error($categories)) {

                foreach ($categories as $category) {
                    $thumbnail = get_field('cat_tax_thumbnail', 'term_' . $category->term_id);
                    if (!$thumbnail) {
                        $thumbnail = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                    }
            ?>


                    <div class="flex flex-col col <?php if (wp_is_mobile()) { ?> swiper-slide<?php } ?>">
                        <a href="<?= site_url();?>/sectors#<?= $category->slug?>" class="fade-in overflow-hidden relative flex flex-col grow justify-end  text-white aspect-[0.96] cursor-pointer group">
                            <div class="primary-btn white absolute z-10 right-3 top-3 opacity-0 transition-all duration-700 group-hover:opacity-100 !pointer-events-none">
                                <span class="btn-arrow">
                                    <span><span class="icon-arrow-right"></span></span>
                                </span>
                            </div>
                            <img loading="lazy" data-src="<?= $thumbnail;?>" alt="<?= $category->name;?>" class="lazy-image object-cover absolute inset-0 size-full scale-100 duration-700 transition-all group-hover:scale-110" />
                            <div class="desc relative z-10">
                                <h3 class="capitalize text-[1.625rem] font-medium leading-7 p-5 pr-10 relative transition-all duration-700 bottom-0 left-0 lg:group-hover:bottom-14 lg:group-hover:left-5"><?= $category->name; ?></h3>
                                <div class="absolute bg-white text-black  bottom-4 p-5  w-[calc(100%-1.6rem)] left-[0.8rem] transition-all duration-700 delay-100 [clip-path:polygon(0%_100%,100%_100%,100%_100%,0%_100%)] group-hover:[clip-path:polygon(0%_0%,100%_0%,100%_100%,0%_100%)] max-lg:hidden">
                                    <h3 class="capitalize text-[1.625rem] font-medium leading-7 "><?= $category->name; ?></h3>
                                    <p class="text-base mt-3 line-clamp-4"><?= $category->description;?></p>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </a>
                    </div>

            <?php }
            } ?>

            <?php if (!wp_is_mobile() && ($total_categories > 6)) { ?>
                <div class="flex flex-col col fade-in">
                    <a href="<?= site_url();?>/sectors" class=" overflow-hidden relative flex flex-col grow justify-start  p-5 max-xl:p-3 text-white aspect-[0.96] cursor-pointer group w-[calc(50%-0.625rem)] bg-darkblue border border-solid border-transparent hover:bg-transparent hover:border-darkblue hover:text-darkblue transition-all duration-700">
                        <div class="primary-btn white absolute z-10 right-5 bottom-5  transition-all duration-700 group-hover:opacity-100 pointer-events-none">
                            <span class="btn-arrow group-hover:after:bg-darkblue">
                                <span><span class="icon-arrow-right group-hover:before:!text-white group-hover:before:content-['\e904']"></span></span>
                            </span>
                        </div>
                        <div class="desc relative z-10 p-3">
                            <p class="text-base  capitalize  max-md:mb-[1rem] mb-2 max-md:text-[1rem]"><?= $total_categories;?> sectors</p>
                            <h3 class="capitalize text-[1.625rem] font-medium leading-7 ">Discover all <br class="!block">sectors</h3>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
        <?php if (wp_is_mobile()) { ?>
            <div class="flex flex-col col mt-5">
                <a href="#" class="overflow-hidden relative flex flex-col grow justify-start  py-7 px-3  text-white  cursor-pointer group w-full bg-darkblue">
                    <div class="primary-btn white absolute z-10 -translate-y-1/2 top-[50%] right-7">
                        <span class="btn-arrow">
                            <span><span class="icon-arrow-right"></span></span>
                        </span>
                    </div>
                    <div class="desc relative z-10 p-3">
                        <p class="text-base  capitalize  max-md:mb-[1rem] mb-2 max-md:text-[1rem]">30 sectors</p>
                        <h3 class="capitalize text-[1.625rem] font-medium leading-7 ">Discover all <br class="!block">sectors</h3>
                    </div>
                </a>
            </div>
        <?php } ?>
    </section>

<?php endif; ?>