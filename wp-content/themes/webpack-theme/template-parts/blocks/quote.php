<?php

$quote = get_sub_field('quote');
$quote_by = get_sub_field('quote_by');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($quote && !$hide_block) :
?>

<div class="quote-block pt-10 max-md:pt-7 pb-5" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <img data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/quote.svg" alt="Quote icon" class=" object-contain h-auto w-14 lazy-image" />
        <h2 class="mt-4 text-[2.5rem] max-md:max-md:text-[1.625rem] leading-[3rem] max-md:leading-7"><?= $quote;?></h2>
        <?php if($quote_by):?>
            <p class="text-xl max-md:text-base opacity-50 mt-3 font-medium"><?= $quote_by;?></p>
        <?php endif;?>
    </div>
<?php endif;?>