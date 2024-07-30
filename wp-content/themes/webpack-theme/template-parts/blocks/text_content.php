<?php

$heading = get_sub_field('heading');
$description = get_sub_field('description');
$content = get_sub_field('content');
$lottie_icon_key = get_sub_field('lottie_icon_key');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($heading || $description) && !$hide_block) :
?>
    <!-- Text/Content/CTA block -->
    <section class="lottie-block py-[6.25rem] max-md:py-12 px-16 max-xl:px-5  fade-in bg-aliceblue" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="flex gap-5 max-md:gap-8 max-md:flex-col max-container">
            <?php if ($heading) : ?>
                <div class="flex flex-col w-[42%] max-xl:w-1/2  max-md:w-full">
                    <h2 class="text-6xl max-sl:text-5xl max-md:text-3xl leading-[4rem] max-md:leading-9 font-medium text-black capitalize">
                        <?= $heading; ?>
                    </h2>
                </div>
            <?php endif; ?>

            <?php if ($description || $cta) : ?>
                <div class="flex flex-col w-[58%] max-xl:w-1/2  max-md:w-full">
                    <div class="content pl-24 max-sl:pl-10 max-md:pl-0 max-md:pt-8  max-w-[32vw] max-xl:max-w-full md:border-l-[1px] max-md:border-t-[1px]  border-opacity-10 border-darkblue">
                        <?php if($lottie_icon_key):?>
                            <span class="icon-animation w-20 block" data-icon="<?= $lottie_icon_key;?>"></span>
                        <?php endif;?>
                        <?php if ($description) : ?>
                            <p class="mt-8 max-md:mt-5 text-base leading-5 text-darkblue/80"><?= $description; ?></p>
                        <?php endif; ?>
                        <?php if ($cta) : ?>
                            <a class="primary-btn mt-10 max-md:mt-8" href="<?= $cta['url']?>" target="<?= $cta_target;?>">
                                <span class="btn-text"><span><?= $cta['title']?></span></span>
                                <span class="btn-arrow">
                                    <span class="icon-arrow-right"></span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>