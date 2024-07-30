<?php

$about_subtitle = get_sub_field('sub_title');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$more_tag = '<!--more-->';
$parts = explode($more_tag, $content);
$transparent_background = get_sub_field('transparent_background');

$collapsable_items = get_sub_field('collapsable_items');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($heading || $content) && !$hide_block) :
?>
    <!-- About Us block -->
    <section class="flex flex-col py-[6.25rem] px-16 max-xl:px-5 max-md:py-12  fade-up <?php echo (!$transparent_background) ? 'bg-aliceblue' : ''; ?>" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px; <?php } ?>">

        <?php if (!$collapsable_items) : ?>
            <div class="flex gap-28 max-xl:flex-col max-xl:gap-10 max-md:gap-7 justify-between max-container">
                <!-- About Content call -->
                <?php include(locate_template('template-parts/parts/about/top_heading.php', false, false)); ?>

                <?php if ($content || $cta) : ?>
                    <div class="flex flex-col w-6/12 max-xl:w-full mt-10 max-xl:mt-0 text-darkgray  max-w-[50%] max-xl:max-w-[100%]">
                        <?php if ($content) : ?>
                            <!-- About Content call -->
                            <?php include(locate_template('template-parts/parts/about/about_content.php', false, false)); ?>

                        <?php endif; ?>
                        <?php if ($cta) : ?>
                            <a href="<?= $cta['url'] ?>" target="<?= $cta_target; ?>" class="primary-btn mt-10">
                                <span class="btn-text"><span><?= $cta['title'] ?></span></span>
                                <span class="btn-arrow">
                                    <span class="icon-arrow-right"></span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php else : ?>



            <?php if ($collapsable_items) : ?>
                <div class="flex pb-10 max-container">
                    <!-- About Content call -->
                    <?php include(locate_template('template-parts/parts/about/top_heading.php', false, false)); ?>

                </div>
                <div class="flex gap-28 max-xl:flex-col max-xl:gap-10 max-md:gap-7 justify-between max-container">
                    <?php if ($content) : ?>
                        <div class="flex flex-col w-6/12 max-xl:w-full  max-w-[50%] max-xl:max-w-[100%]">
                            <!-- About Content call -->
                            <?php include(locate_template('template-parts/parts/about/about_content.php', false, false)); ?>
                        </div>
                    <?php endif; ?>


                    <div class="flex flex-col w-6/12 max-xl:w-full    max-w-[50%] max-xl:max-w-[100%]">
                        <div class="accordion-block max-md:mt-5">
                            <?php foreach ($collapsable_items as $row) {
                                $heading = $row['heading'];
                                $description = $row['description'];
                                if ($heading || $description) :
                            ?>
                                    <div class="accordion-item group">
                                        <?php if ($heading) : ?>
                                            <h3 class="text-3xl max-md:text-xl leading-9 max-md:leading-7 mb-10 max-md:mb-8 relative pr-32 max-md:pr-14 cursor-pointer capitalize transition-all duration-700 hover:opacity-80"><?= $heading; ?> <div class="plus-minus w-[2.85rem] h-[2.85rem] absolute right-0 top-0 rounded-full bg-lightblue transition-all duration-700 group-[&.active]:bg-darkblue "><span class="line-1 w-[0.9rem] h-[1px] bg-darkblue block top-1/2 left-1/2 -translate-x-[50%] absolute group-[&.active]:bg-white"></span><span class="line-1 w-[0.9rem] h-[1px] bg-darkblue block top-1/2 left-1/2 -translate-x-[50%] absolute rotate-90 transition-all duration-700 group-[&.active]:opacity-0"></span></div>
                                            </h3>
                                        <?php endif; ?>
                                        <?php if ($description) : ?>
                                            <div class="accordion-content text-darkgray hidden mb-10">
                                                <div class="prose prose-p:text-base prose-p:leading-6   max-w-full">
                                                    <p> <?= $description; ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                            <?php endif;
                            } ?>

                        </div>
                    </div>

                </div>
            <?php endif; ?>

        <?php endif; ?>


    </section>

<?php endif; ?>
