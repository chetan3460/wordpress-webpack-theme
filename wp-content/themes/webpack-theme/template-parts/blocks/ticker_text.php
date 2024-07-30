<?php
$highlighted_text = get_sub_field('highlighted_text');
$rest_heading = get_sub_field('rest_heading');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($highlighted_text || $rest_heading) && !$hide_block) :

?>

    <section class="h-movement whitespace-nowrap overflow-hidden py-12 max-md:pb-0" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <h2 class="capitalize text-[5rem] max-md:text-[2.5rem] text-mercury translate-x-24">

            <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?><span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?><span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?>
        </h2>
    </section>

<?php endif; ?>