<?php
$heading = get_sub_field('heading');
$select_vacancy = get_sub_field('select_vacancy');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}


// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($select_vacancy && !$hide_block) :

?>

    <section class="career-block-wrap py-[6.25rem] max-md:py-12 px-16 max-xl:px-5 fade-in lightblue-bg" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-container">
            <?php if ($heading || $cta) : ?>
                <div class="flex gap-5 mb-14 max-md:mb-8 justify-between items-end  w-full max-sl:flex-col max-sl:items-start max-md:flex-wrap max-md:max-w-full">
                    <?php if ($heading) : ?>
                        <div class="flex flex-col text-black max-md:max-w-full">
                            <h2 class="text-6xl leading-[4rem] max-md:text-2xl max-md:leading-9  font-medium capitalize"><?= $heading; ?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if ($cta) : ?>
                        <div class="flex gap-1.5   rounded-full  ">
                            <a href="<?= $cta['url']; ?>" target="<?= $cta_target; ?>" class="primary-btn md:mt-10 ">
                                <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                                <span class="btn-arrow">
                                    <span class="icon-arrow-right"></span>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="career-blocks grid grid-cols-3 max-lg:grid-cols-2 max-md:grid-cols-1 gap-5">
                <?php foreach ($select_vacancy as $post) :
                    setup_postdata($post); ?>
                    <?php include(locate_template('template-parts/parts/vacancy_card.php', false, false)); ?>
                <?php endforeach;
                wp_reset_postdata();
                 ?>
            </div>
        </div>
    </section>
<?php endif; ?>