<?php

$editor = get_sub_field('editor');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($editor && !$hide_block) :
?>

    <div class="text-block" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <?= $editor; ?>
    </div>
<?php endif; ?>