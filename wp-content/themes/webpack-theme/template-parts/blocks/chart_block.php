<?php
$heading = get_sub_field('heading');
$description = get_sub_field('description');
$items = get_sub_field('items');
$chart_image = get_sub_field('chart_image');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($items && !$hide_block) :

?>
<!-- Chart block -->
    <section class="chart-block py-[6.25rem] max-md:py-12 px-16 max-xl:px-5  fade-in bg-aliceblue" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-container">

            <?php if ($heading || $description) : ?>
                <div class="top-desc w-1/2 max-lg:w-3/4 max-sl:w-full pb-10">
                    <?php if ($heading) : ?>
                        <h2 class="text-6xl max-md:text-3xl max-md:leading-9 font-medium  capitalize leading-[3.75rem]"><?= $heading; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <p class="mt-6 max-md:mt-3 text-base max-md:text-[0.875rem] leading-6  max-md:max-w-full w-3/4 max-md:w-full opacity-80"><?= $description; ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="values-block flex justify-between max-md:flex-col-reverse max-md:gap-10">

                <div class="values  w-[55%] max-md:w-full flex flex-wrap items-end gap-y-10">
                    <?php foreach ($items as $item) {
                        $caption = $item['caption'];
                        $number = $item['number'];
                        $color = $item['dot_color'];

                    ?>
                        <div class="col w-1/2 border-l-[1px]  border-opacity-10 border-darkblue h-40 max-md:h-24 pl-7 max-sl:pl-4 flex justify-between flex-col">
                            <?php if ($color) : ?>
                                <div class="shrink-0  h-[0.7rem] w-[0.7rem]" style="background-color: <?= $color; ?>"></div>
                            <?php endif; ?>
                            <?php if ($caption || $number) : ?>
                                <div>
                                    <?php if ($caption) : ?>
                                        <p class="text-base max-sl:text-[0.875rem] leading-5 opacity-50"><?= $caption; ?></p>
                                    <?php endif; ?>
                                    <?php if ($number) : ?>
                                        <p class="mt-6 max-md:mt-3 text-6xl max-sl:text-3xl font-medium capitalize leading-[3.75rem] max-md:leading-6"><?= $number; ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                        </div>
                    <?php } ?>
                </div>
            <?php if ($chart_image) : ?>
                <div class="chart-img  w-[38%] max-sl:w-[45%] max-md:w-full">
                    <img data-src="<?= wp_get_attachment_image_url($chart_image, 'full') ?>" alt="<?= esc_attr(get_post_meta($chart_image, '_wp_attachment_image_alt', true)) ?: 'Chart Image' ?>" class="object-contain  aspect-[1]   lazy-image w-full" />
                </div>
            <?php endif; ?>
            </div>
        </div>
    </section>

<?php endif; ?>