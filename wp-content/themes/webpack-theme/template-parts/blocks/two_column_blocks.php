<?php
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');

$content = get_sub_field('content');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (have_rows('content') && !$hide_block) :

?>


    <section class="two-col-block py-[6.25rem] max-md:py-12 px-16 max-xl:px-5  fade-in hover-slide-block" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

        <?php if ($sub_title || $heading) : ?>
            <div class="title-block text-center pb-16 max-md:pb-10">
                <?php if ($sub_title) : ?>
                    <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-10 max-md:text-[1rem]"><?= $sub_title; ?></p>
                <?php endif; ?>
                <?php if ($heading) : ?>
                    <h2 class="text-[5rem] leading-[5.5rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize ">
                        <?= $heading; ?>
                    </h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="gap-5 grid grid-cols-2 max-sl:grid-cols-1  max-container">
            <?php while (have_rows('content')) : the_row();
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $image = get_sub_field('image');

                $cta = get_sub_field('cta');
                if (!empty($cta)) {
                    $cta_target = $cta['target'] ? $cta['target'] : '_self';
                }
            ?>
                <?php include(locate_template('template-parts/parts/external_card.php', false, false));?>
            <?php endwhile; ?>
        </div>

    </section>

<?php endif; ?>