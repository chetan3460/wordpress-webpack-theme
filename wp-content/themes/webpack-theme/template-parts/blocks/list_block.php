<?php

$list_heading = get_sub_field('list_heading');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($list_heading && !$hide_block) :
?>


    <div class="grid grid-cols-2 max-md:grid-cols-1 md:gap-5 pt-14 max-md:pt-10" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <?php if (have_rows('list_heading')) : ?>
            <div class="flex flex-col">
                <?php
                $counter = 0;
                while (have_rows('list_heading')) : the_row();
                    $counter++;
                    if ($counter == 7) : // Start new column after 6 items
                ?>
            </div>
            <div class="flex flex-col">
            <?php endif; ?>

            <div class="col flex items-center gap-7 border-b-[1px] border-lightblue py-10 max-md:py-7 md:pr-[10%]">
                <span class="w-14 h-14 bg-lightblue flex-none flex items-center justify-center font-medium">
                    <?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?>
                </span>
                <p class="text-xl max-md:text-base leading-7 max-md:leading-6 font-medium">
                    <?php the_sub_field('list_heading'); ?>
                </p>
            </div>

        <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>

<?php endif; ?>