<?php
$heading = get_sub_field('heading');
$banner = get_sub_field('banner');
$select_sectors_category = get_sub_field('select_sectors_category');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($select_sectors_category && !$hide_block) :

?>

    <section class="sector-list-block pb-[6.25rem] max-md:pb-12 fade-in" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <?php if ($banner) : ?>
            <img class="h-[50rem] max-md:h-[13rem] object-cover w-full" loading="lazy" src="<?= wp_get_attachment_image_url($banner, 'full') ?>" alt="<?= esc_attr(get_post_meta($banner, '_wp_attachment_image_alt', true)) ?: 'Banner Image'; ?>" />
        <?php endif; ?>

        <div class=" md:px-5  max-container flex gap-10 ">
            <div class="bg-darkblue p-16 max-md:p-5 w-full md:-mt-80 fade-up" data-delay="0.3">
                <?php if ($heading) : ?>
                    <h2 class="text-4xl max-md:text-2xl font-medium leading-10 text-white"><?= $heading; ?></h2>
                <?php endif; ?>
                <div class="sector-list mt-12 max-md:mt-5 grid grid-cols-2 max-lg:grid-cols-1 gap-x-10 gap-y-5 max-md:gap-y-3 ">
                    <?php foreach ($select_sectors_category as $term) :
                    // var_dump($term);
                        $icon = get_field('sector_icon', 'term_'.$term->term_id);
                        $prefixes = get_field('sector_prefix', 'term_' . $term->term_id);
                        // echo 'sdf'. $icon;
                    ?>
                        <a class="item group w-full cursor-pointer border border-solid border-white border-opacity-20 lg:hover:border-opacity-100 transition-colors duration-700 text-white lg:hover:text-darkblue lg:hover:bg-white  px-5 py-8 max-md:px-3 max-md:py-4 flex justify-between gap-5 items-center" href="<?= site_url()?>/sectors/#<?= $term->slug; ?>">
                            <div class="text flex items-center gap-6 max-md:gap-3 w-full">
                                <?php if($icon):?>
                                <img class="lazy-image transition-all duration-700 delay-100 img-invert !opacity-50 w-10 max-h-9 group-hover:!opacity-100 group-hover:!filter-none" loading="lazy" data-src="<?= $icon;?>" alt="Sector Icon" />
                                <?php endif;?>
                                <p class="relative flex pt-2 truncate"><span class="text-2xl max-md:text-xl font-medium leading-7 "><?= $term->name;?></span>
                                <?php if($prefixes):?>
                                <span class=" opacity-50 max-md:text-[0.875rem]  relative -top-2 ml-2 capitalize truncate max-sm:hidden">/ <?= $prefixes;?></span></p>
                                <?php endif;?>
                            </div>
                            <div class="btn pointer-events-none opacity-0 max-lg:opacity-100  max-lg:text-darkblue group-hover:opacity-100 transition-all duration-700">
                                <div href="#" class="primary-btn ">
                                    <span class="btn-arrow max-lg:after:!bg-white">
                                        <span class="icon-arrow-right max-lg:text-darkblue"></span>
                                    </span>
                                </div>
                            </div>
                        </a>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>