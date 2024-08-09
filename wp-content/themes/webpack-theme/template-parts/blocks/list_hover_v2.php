<?php
$sub_title = get_sub_field('subtitle');
$heading = get_sub_field('heading');
$items_v2 = get_sub_field('items_v2');
$transparent_background = get_sub_field('transparent_background');
$background_image = get_sub_field('background_image');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($items_v2 && !$hide_block) :
?>



<?php if (!wp_is_mobile()) { ?>

<section
    style="background-image: url('<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/homepage6-5.webp'); ?>');"
    class="list_hover_v2 desktop py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 max-container fade-in  w-full  bg-[center_center] bg-no-repeat bg-cover bg-fixed"
    data-delay="0.2" style
    style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

    <div class=" w-full   px-16 max-xl:px-5 pb-36">
        <?php if ($sub_title) : ?>
        <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem] text-[#7B7B7B]">
            <?= $sub_title; ?>
        </p>
        <?php endif; ?>

        <?php if ($heading) : ?>
        <h2
            class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize text-white font-medium">
            <?= $heading; ?></h2>
        <?php endif; ?>
    </div>





    <div class="interactive-showcase">
        <?php foreach ($items_v2 as $key => $item) {
                        // $link = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];
                        $thumbnail = $item['image'];
                        if (!$thumbnail) {
                            $thumbnail = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                        }
                    ?>
        <div
            class="showcase__item group  transition-all duration-700   flex min-h-[174px] justify-start items-center relative w-full pointer-events-auto pt-[11px] pb-1.5 px-[3.125%] border-solid border-t border-[#FFFFFF33] group">



            <?php if ($title || $desc) : ?>


            <?php if ($title || $desc) : ?>

            <?php if ($title) : ?>
            <h3 class="showcase__title">
                <span class="showcase__subtitle">
                    0<?= $key + 1; ?></span>
                <span class="title"> <?= $title; ?></span>
            </h3>
            <?php endif; ?>

            <?php if ($desc) : ?>
            <div class="showcase__content overflow-hidden w-[35%] text-white">
                <p class=" text-base leading-7 max-md:max-w-full    transition-all duration-700 font-medium">
                    <?= $desc; ?></p>
            </div>
            <?php endif; ?>


            <div
                class="showcase__image interactive absolute h-auto left-[var(--wgl-image-position)] z-[4] opacity-0 -translate-y-2/4 origin-[top_center] pointer-events-none overflow-hidden top-2/4">

                <img data-src="<?= $thumbnail['url'] ?>" alt="block image" class=" lazy-image " />



            </div>

            <?php endif; ?>

            <?php endif; ?>
        </div>
        <?php } ?>
    </div>


    <?php  if ($cta) : ?>
    <div class="flex justify-center w-full mt-20 max-md:mt-10">

        <a href="<?= $cta['url']; ?>" target="<?= $cta_target; ?>" class="primary-btn bordered"> <span
                class="btn-text"><span><?= $cta['title']; ?></span></span> <span class="btn-arrow"> <span
                    class="icon-arrow-right"></span> </span> </a>

    </div>
    <?php endif; ?>


</section>
<?php } else { ?>


<section class="img-content-block mob-tablet py-[6.25rem] max-md:py-12 px-16 max-xl:px-5  fade-in  flex-col gap-20 ">
    <?php
            foreach ($items_v2 as $key => $item) {
                $thumbnail = $item['image'];
                $title = $item['title'];
                $desc = $item['description'];
                if (!$thumbnail) {
                    $thumbnail = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                }
                // var_dump($term);

            ?>

    <a class="item-block flex gap-10 max-md:gap-5 max-md:flex-col cursor-default" href="javascript:void(0);">
        <div class="flex col md:min-w-[50%]">
            <img data-src="<?= $thumbnail['url']; ?>" class="object-cover  aspect-[0.875]   lazy-image" />
        </div>
        <div class="flex col flex-col">
            <p class="mt-8 max-sl:mt-2 text-xl font-medium leading-6 text-black">0<?= $key + 1; ?></p>
            <?php if ($title) : ?>
            <h2 class="mt-5 max-md-3 text-4xl max-md:text-3xl font-medium leading-10 text-black capitalize">
                <?= $title; ?>
            </h2>
            <?php endif; ?>
            <?php if ($desc) : ?>
            <p class="mt-8 max-md:mt-4 text-lg max-md:text-base leading-7 text-black sl:line-clamp-5">
                <?= $desc; ?>
            </p>
            <?php endif; ?>
            <!-- <div class="primary-btn mt-10 max-md:mt-5">
                            <span class="btn-text"><span>learn more</span></span>
                            <span class="btn-arrow">
                                <span class="icon-arrow-right"></span>
                            </span>
                        </div> -->
        </div>
    </a>
    <?php } ?>
</section>

<?php }

    ?>



<?php
    endif;
 ?>