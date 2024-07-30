<?php

$heading = get_sub_field('heading');
$subtitle = get_sub_field('sub_title');
$values = get_sub_field('values');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($values && !$hide_block) :
?>

    <section class="pt-[6.25rem]   max-md:pt-12 bg-aliceblue sticky-anim-block" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-container fade-in">
            <?php if ($heading || $cta) : ?>
                <div class="flex gap-5 justify-between items-center  w-full max-md:flex-wrap max-md:max-w-full px-16 max-xl:px-5 fade-in pb-2">
                    <?php if ($heading) : ?>
                        <div class="flex flex-col text-black max-md:max-w-full">
                            <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize"><?= $heading; ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if ($cta) : ?>
                        <div class="flex gap-1.5 rounded-full max-sl:w-[30%] max-md:hidden">
                            <a href="<?= $cta['url'] ?>" target="<?= $cta_target; ?>" class="primary-btn">
                                <span class="btn-text"><span><?= $cta['title'] ?></span></span>
                                <span class="btn-arrow">
                                    <span><span class="icon-arrow-right"></span></span>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (!wp_is_mobile()) { ?>
                <div class="flex gap-5 pl-14 max-xl:pl-4 pt-36 content-block">

                    <div class="flex flex-col w-[33%] left max-sl:w-[26%]">
                        <p class="text-black opacity-[0.05]  text-[18.75rem] max-lg:text-[9rem] leading-[19.75rem] max-lg:leading-[9.5rem] overflow-hidden">0<span class="counter inline-block">1</span></p>
                    </div>


                    <div class="flex flex-col w-[67%] max-sl:w-[74%] right relative">
                        <div class="overlap w-full h-1  left-0  fixed top-[50%] pointer-events-none"></div>
                        <?php foreach ($values as $key => $row) {
                            $title = $row['heading'];
                            $desc = $row['description'];
                            $image = $row['image'];
                        ?>
                            <div class="item flex border-t-[1px] gap-12 border-opacity-20 border-black pt-10 pb-36 pr-16 max-xl:pr-5 transition-all duration-700 opacity-40 <?php echo ($key == 0) ? 'active' : ''; ?> [&.active]:opacity-100">
                                <?php if ($title || $desc) : ?>
                                    <div class="flex flex-col w-[81%] ">
                                        <div class="flex flex-col grow text-black max-md:mt-10 max-md:max-w-full">
                                            <?php if ($title) : ?>
                                                <h2 class="text-6xl font-medium capitalize leading-[60px] max-md:max-w-full max-md:text-4xl">
                                                    <?= $title; ?>
                                                </h2>
                                            <?php endif; ?>
                                            <?php if ($desc) : ?>
                                                <p class="mt-8 text-xl leading-8 opacity-80">
                                                    <?= $desc; ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($image) : ?>
                                    <div class="flex flex-col items-end  w-[19%] ">
                                        <img loading="lazy" data-src="<?= wp_get_attachment_image_url($image, 'full') ?>" alt="Value one icon" class="lazy-image shrink-0 max-w-full aspect-[1.16] w-[8.75rem] object-cover" />
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            <?php } else { ?>
                <div class="overflow-slider pl-5 pt-8 pb-12">
                    <div class="swiper overflow-visible">
                        <div class="swiper-wrapper">
                            <?php foreach ($values as $key => $row) {
                                $title = $row['heading'];
                                $desc = $row['description'];
                                $image = $row['image'];
                            ?>
                                <div class="swiper-slide w-[20rem]">
                                    <div class="item flex flex-col border-t-[1px] gap-2 border-opacity-20 border-black pt-5">
                                        <div class="flex flex-col">
                                            <?php if ($image) : ?>
                                                <img loading="lazy" data-src="<?= wp_get_attachment_image_url($image, 'full') ?>" alt="Value one icon" class="lazy-image shrink-0 max-w-full aspect-[1.16] w-[8.75rem] " />
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($title || $desc) : ?>
                                            <div class="flex flex-col w-full">
                                                <div class="flex flex-col grow text-black mt-4">
                                                    <?php if ($title) : ?>
                                                        <h2 class="text-3xl font-medium capitalize">
                                                            <?= $title; ?>
                                                        </h2>
                                                    <?php endif; ?>
                                                    <?php if ($desc) : ?>
                                                        <p class="mt-4 text-base opacity-80">
                                                            <?= $desc; ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

<?php endif; ?>