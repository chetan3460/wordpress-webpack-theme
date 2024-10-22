<?php
$sub_title = get_sub_field('subtitle');
$heading = get_sub_field('heading');
$items = get_sub_field('items');
$transparent_background = get_sub_field('transparent_background');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($items && !$hide_block) :
?>

    <?php if (!wp_is_mobile()) { ?>

        <section class="sticky-img-block desktop pt-[10rem]  pb-[14rem]  max-md:py-12  fade-in <?= (!$transparent_background) ? 'bg-aliceblue' : '';?>" data-delay="0.2" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

            <div class=" w-full   px-16 max-xl:px-5 pb-36">
                 <?php if ($sub_title) : ?>
                    <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem]"><?= $sub_title; ?></p>
                <?php endif; ?>

                <?php if ($heading) : ?>
                    <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize "><?= $heading; ?></h2>
                <?php endif; ?>
            </div>
            <div class="wrap relative max-container">


                <div class="images-list absolute left-[14vw] 6xl:left-[9vw] -translate-y-28 6xl:w-[22vw] 6xl:h-[26vw] w-[28vw] h-[32vw] bg-white">
                    <?php
                    foreach ($items as $item) {
                        $thumbnail = $item['image'];
                        if (!$thumbnail) {
                            $thumbnail = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                        }

                    ?>

                        <img data-src="<?= $thumbnail['url'] ?>" alt="block image" class="object-cover absolute size-full  left-0 top-0  aspect-[0.875]     lazy-image !opacity-0 [&.active]:!opacity-100 active" />

                    <?php  } ?>

                </div>

                <div class="list-block">
                    <?php foreach ($items as $key => $item) {
                        // $link = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];

                    ?>

                        <a href="javascript:void(0);" class="item-block group px-16 max-xl:px-5 py-10 flex justify-between  transition-all duration-700 delay-0 [&.active]:bg-darkblue cursor-default">

                            <p class="text-xl leading-6 transition-all duration-700 text-black group-[&.active]:text-white">0<?= $key + 1; ?></p>
                            <?php if ($title || $desc) : ?>
                                <div class="content-wrap relative w-[45vw] 6xl:w-[40vw]">
                                    <?php if ($title || $desc) : ?>
                                        <div class="content pr-[9.5vw]">
                                            <?php if ($title) : ?>
                                                <h2 class="text-4xl leading-10 max-md:max-w-full pr-10 transition-all duration-700 text-black group-[&.active]:text-white capitalize"><?= $title; ?> </h2>
                                            <?php endif; ?>
                                            <?php if ($desc) : ?>
                                                <div class="desc overflow-hidden">
                                                    <p class=" text-base leading-5 max-md:max-w-full opacity-80 text-white group-[&.active]:mt-5 transition-all duration-700"><?= $desc; ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- <div class="primary-btn white absolute pointer-events-none top-0 right-0  opacity-0 transition-all duration-700 delay-100 group-[&.active]:opacity-100">
                                        <span class="btn-arrow">
                                            <span class="icon-arrow-right"></span>
                                        </span>
                                    </div> -->
                                </div>
                            <?php endif; ?>
                        </a>
                    <?php } ?>
                </div>

            </div>
            <?php  if ($cta) : ?>
            <div class="flex justify-center w-full mt-20 max-md:mt-10">

                <a href="<?= $cta['url']; ?>" target="<?= $cta_target; ?>" class="primary-btn bordered"> <span class="btn-text"><span><?= $cta['title']; ?></span></span> <span class="btn-arrow"> <span class="icon-arrow-right"></span> </span> </a>

            </div>
            <?php endif; ?>
        </section>
    <?php } else { ?>


        <section class="img-content-block mob-tablet py-[6.25rem] max-md:py-12 px-16 max-xl:px-5  fade-in  flex-col gap-20">
            <?php
            foreach ($items as $key => $item) {
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