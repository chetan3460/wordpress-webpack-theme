<?php
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');
$stats = get_sub_field('stats');
// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($sub_title || $heading) && !$hide_block) :

?>

    <!-- Key Numbers -->
    <section class="py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 number-block-wrap max-container fade-in" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <?php if ($sub_title) : ?>
            <p class=" text-xl max-md:text-[1rem] leading-5 uppercase mb-5">
                <?= $sub_title; ?>
            </p>
        <?php endif; ?>
        <?php if ($sub_title) : ?>
            <h2 class="text-6xl leading-[4rem] font-medium capitalize max-md:text-[2.5rem] max-md:leading-[3rem]">
                <?= $heading; ?>
            </h2>
        <?php endif; ?>

        <?php if ($stats) : ?>
            <div class="self-stretch mt-[6.25rem] max-md:mt-10">
                <div class="flex sl:gap-[5rem] max-sl:flex-col  min-h-[32rem]">

                    <div class="flex flex-col w-[33%] max-sl:w-full left-block">
                        <div class="flex flex-col grow text-xl leading-6 text-black justify-between max-sl:gap-7 max-sl:mb-7">
                            <?php foreach ($stats as  $key => $stat) {
                                $title = $stat['title'];
                                $number = $stat['number'];
                                $description = $stat['description'];
                                if ($title || $description || $number) :

                                    if (($key == 0) || ($key == 1)) :
                            ?>
                                        <div class="number-block group <?php echo ($key == 0) ? 'active' : ''; ?> [&.active]:pointer-events-none" data-index="<?= $key ?>">
                                            <?php if ($title) : ?>
                                                <p class="max-md:text-[1rem] font-medium"><?= $title; ?></p>
                                            <?php endif; ?>

                                            <?php if ($number) : ?>
                                                <hr class="shrink-0 mt-8 max-md:mt-5 h-px  bg-black bg-opacity-10" />
                                                <p class="mt-6 max-md:mt-5 text-[6.875rem] max-md:text-[4rem] max-md:leading-[4rem] capitalize leading-[6rem]  text-darkblue md:group-[&.active]:text-darkpurple transition-all duration-700 active"><?= $number; ?></p>
                                            <?php endif; ?>

                                            <?php if ($description) : ?>
                                                <div class="hidden number-desc mobile">
                                                    <p class="leading-8 text-darkgray text-xl max-md:text-[1rem] max-md:leading-7 font-medium mt-5" data-index="<?= $key ?>"><?= $description; ?></p>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                            <?php endif;
                                endif;
                            } ?>
                        </div>
                    </div>


                    <div class="flex flex-col  w-[33%] max-sl:w-[50%] max-lg:m-auto max-sl:hidden relative number-images middle-block">
                        <?php foreach ($stats as  $key => $stat) {
                            $illustration = $stat['illustration'];
                            if ($illustration) :
                        ?>
                                <img loading="lazy" data-index="<?= $key ?>" src="<?= wp_get_attachment_image_url($illustration, 'full') ?>" alt="<?= esc_attr(get_post_meta($illustration, '_wp_attachment_image_alt', true)) ?: 'Illustrations'; ?>" class="self-stretch my-auto w-full aspect-square max-md:mt-10 absolute <?php echo ($key == 0) ? 'active' : ''; ?> transition-all duration-700 opacity-0 [&.active]:opacity-100 " />

                        <?php endif;
                        } ?>
                    </div>


                    <div class="flex flex-col  w-[33%] max-sl:w-full  relative right-block">
                        <div class="flex flex-col grow text-xl  text-black justify-between">
                            <?php foreach ($stats as  $key => $stat) {
                                $title = $stat['title'];
                                $number = $stat['number'];
                                $description = $stat['description'];
                                if ($title || $description || $number) :
                                    if ($key == 2) :
                            ?>

                                        <div class="number-block group [&.active]:pointer-events-none" data-index="<?= $key ?>">
                                            <?php if ($title) : ?>
                                                <p class="max-md:text-[1rem] font-medium"><?= $title; ?></p>
                                            <?php endif; ?>

                                            <?php if ($number) : ?>
                                                <hr class="shrink-0 mt-8 max-md:mt-5 h-px  bg-black bg-opacity-10" />
                                                <p class="mt-6 max-md:mt-5 text-[6.875rem] max-md:text-[4rem] max-md:leading-[4rem] capitalize leading-[6rem]  text-darkblue md:group-[&.active]:text-darkpurple transition-all duration-700 active"><?= $number; ?></p>
                                            <?php endif; ?>

                                            <?php if ($description) : ?>
                                                <div class="hidden number-desc mobile">
                                                    <p class="leading-8 text-darkgray text-xl max-md:text-[1rem] max-md:leading-7 font-medium mt-5" data-index="<?= $key ?>"><?= $description; ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                            <?php endif;
                                endif;
                            } ?>

                            <div class="max-sl:hidden number-desc">
                                <?php foreach ($stats as  $key => $stat) {
                                    $description = $stat['description'];
                                    if ($description) :
                                ?>
                                        <p class="absolute bottom-0 leading-8 text-darkgray text-xl font-medium <?php echo ($key == 0) ? 'active' : ''; ?> transition-all duration-700 opacity-0 [&.active]:opacity-100" data-index="<?= $key; ?>"><?= $description; ?></p>

                                <?php endif;
                                } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </section>

<?php endif; ?>