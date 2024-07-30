<?php
$heading = get_sub_field('heading');
$time_table = get_sub_field('time_table');
$date = get_sub_field('date');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($time_table && !$hide_block) :

?>

    <div class="time-table-block py-5" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <?php if ($heading) : ?>
            <h2 class="mt-5 text-3xl leading-8  max-md:max-w-full"><?= $heading; ?></h2>
        <?php endif; ?>
        <?php if ($heading) : ?>
            <div class="mt-8 ms-44  mb-5 text-[0.875rem] opacity-50 leading-4  max-md:max-w-full max-md:mt-12 max-md:-mb-8"><?= $date; ?></div>
        <?php endif; ?>
        <div class="w-full relative flex flex-col gap-8">
            <div class="absolute w-px h-[80%] m-auto top-0 bottom-0 start-[4.375rem] max-md:hidden" style="background-image: url('<?= get_stylesheet_directory_uri();?>/assets/images/dotted-line.svg"></div>
            <?php while (have_rows('time_table')) : the_row();
                $time = get_sub_field('time'); ?>
                <div class="flex gap-10 max-md:flex-col max-md:gap-0">
                    <?php if ($time) : ?>
                        <div class="flex flex-col w-[8.75rem] h-full shrink-0 justify-center items-center p-4   text-base leading-4 bg-lightblue relative z-10   max-md:mt-0 max-md:mb-5"> <?= $time; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('entries')) : ?>
                        <div class="flex flex-col gap-2.5 w-4/5 max-md:w-full">
                            <?php while (have_rows('entries')) : the_row();
                                $title = get_sub_field('title');
                                $time = get_sub_field('time');
                                if ($title || $time) :
                            ?>
                                    <div class="flex gap-2.5 justify-between px-6 py-4 border border-solid border-darkblue/10 max-md:flex-wrap max-md:px-5 max-md:max-w-full">
                                        <?php if ($title) : ?>
                                            <div class="text-base"><?= $title; ?></div>
                                        <?php endif; ?>
                                        <?php if ($time) : ?>
                                            <div class="my-auto text-base opacity-20"><?= $time;?></div>
                                        <?php endif; ?>
                                    </div>
                            <?php endif;
                            endwhile; ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endwhile; ?>

        </div>
        <?php if($cta):?>
        <div class="link-off mt-10 flex justify-center">
            <a href="<?= $cta['url'];?>" target="<?= $cta_target;?>" class="primary-btn">
                <span class="btn-text"><span><?= $cta['title'];?></span></span>
                <span class="btn-arrow">
                    <span class="icon-arrow-right"></span>
                </span>
            </a>
        </div>
        <?php endif;?>
    </div>

<?php endif; ?>