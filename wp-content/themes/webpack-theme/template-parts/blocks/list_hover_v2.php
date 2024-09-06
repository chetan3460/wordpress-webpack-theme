<!-- List Hover V2 -->
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





    <section style="--bg-img: url(https://www.loomdigital.co.uk/wp-content/uploads/2024/04/img-7-2560x1200.webp); --bg-img-medium: url(https://www.loomdigital.co.uk/wp-content/uploads/2024/04/img-7-1438x674.webp); --bg-img-small: url(https://www.loomdigital.co.uk/wp-content/uploads/2024/04/img-7-714x714.webp); "
        style="background-image: url('');"
        class="list_hover_v2 section-colorway-img py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 max-container fade-in  w-full  bg-[center_center] bg-no-repeat bg-cover bg-fixed"
        data-delay="0.2" style
        style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

        <!-- Heading & CTA -->
        <div class=" w-full max-xl:px-5 pb-16 flex md:flex-row flex-col justify-between">
            <div class=" ">
                <?php if ($sub_title) : ?>
                    <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem] text-navyblue">
                        <?= $sub_title; ?>
                    </p>
                <?php endif; ?>

                <?php if ($heading) : ?>
                    <h2
                        class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  text-navyblue ">
                        <?= $heading; ?></h2>
                <?php endif; ?>
            </div>
            <?php if ($cta) : ?>
                <div class="md:mt-0 mt-5">

                    <a href="<?= $cta['url']; ?>" target="<?= $cta_target; ?>" class="primary-btn"> <span
                            class="btn-text"><span><?= $cta['title']; ?></span></span> <span class="btn-arrow"> <span
                                class="icon-arrow-right"></span> </span> </a>

                </div>
            <?php endif; ?>
        </div>





        <div class="interactive-showcase">
            <?php foreach ($items_v2 as $key => $item) {
                // $link = $item['link'];
                $title = $item['title'];
                $desc = $item['description'];
                $thumbnail = $item['image'];
                $item_link = $item['item_link']; // Get the item link from ACF

                if (!$thumbnail) {
                    $thumbnail = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                }
            ?>
                <div
                    class="showcase__item relative flex  lg:flex-row max-lg:flex-col justify-start items-center  py-[0.9em]  px-[3.125%] border-t border-purple/30  lg:min-h-[11em] max-sl:min-h-[10em] w-full pointer-events-auto m-0 transition-all duration-700 group ">

                    <?php if ($title || $desc) : ?>


                        <?php if ($title || $desc) : ?>

                            <!-- Link -->
                            <?php if ($item_link): ?>
                                <a href="<?= esc_url($item_link); ?>" class="absolute inset-0 z-20"></a> <!-- Full cover link -->
                            <?php endif; ?>

                            <!-- Title -->
                            <?php if ($title) : ?>
                                <h3
                                    class="showcase__title || relative   md:flex-row flex-col flex-grow  inline-flex md:items-center items-start md:text-4xl text-[1.7em] leading-[1.25em] tracking-tight   whitespace-normal lg:pr-[13rem] pr-0 lg:w-1/2 max-lg:w-full  xxl:pb-0 max-lg:pb-4  transform translate-x-0 lg:group-hover:translate-x-[6.5em] group-hover:translate-x-0 lg:group-[&.active]:translate-x-[6.5em] transition-all duration-[0.8s] z-10 ">
                                    <span
                                        class="showcase__subtitle text-[14px] leading-[1.5em] inline-block relative w-[44px] min-w-fit text-center self-start mr-[24px] px-[6px] py-[3px] border border-navyblue text-navyblue rounded-[30px] transition-all duration-[0.4s] transform translate-y-[0.3em] flex-shrink-0">
                                        0<?= $key + 1; ?></span>
                                    <span class=" title text-navyblue transform skew-0 transition-all duration-700 md:mt-0 mt-4">
                                        <?= $title; ?></span>
                                </h3>
                            <?php endif; ?>

                            <!-- Description -->
                            <?php if ($desc) : ?>
                                <div
                                    class="showcase__content overflow-hidden w-[35%] max-lg:w-full text-navyblue max-lg:mb-0 transition-all duration-[0.4s] transform translate-x-0">
                                    <p
                                        class=" text-xl leading-7 max-md:max-w-full    transition-all duration-700 font-normal xxl:pl-0 md:pl-[4.1em] pl-0">
                                        <?= $desc; ?></p>
                                </div>
                            <?php endif; ?>


                            <div
                                class="showcase__image interactive absolute h-auto   origin-[top_center] top-2/4 max-lg:hidden  left-0 transform -translate-y-1/2 z-[4] opacity-0 group-hover:opacity-100 pointer-events-none overflow-hidden transition-all duration-[0.45s] ml-[20px] rounded-2xl">
                                <img data-src="<?= $thumbnail['url'] ?>" alt="block image"
                                    class=" lazy-image transform -translate-x-full group-hover:translate-x-0 transition-all duration-[0.8s] h-[140px] rounded-2xl" />
                            </div>

                        <?php endif; ?>


                    <?php endif; ?>
                </div>
            <?php } ?>
        </div>

    </section>





<?php
endif;
?>