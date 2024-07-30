<?php
$heading = get_sub_field('heading');
$description = get_sub_field('description');
$tabs = get_sub_field('tabs');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($tabs && !$hide_block) :
?>

    <section class="two-col-tab-block type-two py-[6.25rem]  max-md:py-12 fade-in" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="max-container flex gap-10 max-sl:flex-col">

            <?php if ($heading || $description) : ?>
                <div class="col sl:w-[45%] max-6xl:px-16 max-xl:px-5">
                    <div class="sl:max-w-[30vw]">
                        <?php if ($heading) : ?>
                            <h2 class="text-6xl max-md:text-3xl font-medium capitalize leading-[4rem]  max-md:leading-9">
                                <?= $heading; ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <p class="mt-8 max-md:mt-5 text-xl max-md:text-base leading-8 max-md:leading-6 opacity-50">
                                <?= $description; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col sl:w-[55%]">
                <div class="tab-section-block ">

                    <!-- Tabs -->
                    <div class="flex flex-col lg:w-max max-6xl:pl-16 max-xl:pl-5">
                        <div class="flex flex-col grow ">
                            <div class="free-slider flex gap-3 justify-between items-start   text-base text-center   max-xxl:gap-3 max-xxl:text-[0.875rem] ">
                                <div class="swiper-wrapper  w-max  border border-black/10 p-2 rounded-md max-md:border-r-0 max-md:rounded-r-none">
                                    <?php foreach($tabs as $key => $row ) {
                                        $tab_title = $row['tab_title'];
                                        if($tab_title):
                                        ?>
                                        <div class="swiper-slide last:!m-0 w-max flex justify-between  hover:cursor-pointer  relative p-3 rounded-md  transition-colors duration-700  <?php echo ($key == 0) ? 'active': '';?> group [&.active]:bg-darkblue [&.active]:text-white  max-md:after:!w-0 hover:bg-darkblue hover:text-white">
                                            <h3 class="flex-1 my-auto font-medium capitalize leading-[120%]"><?= $tab_title;?></h3>
                                        </div>
                                    <?php endif; } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab content -->
                    <?php if( have_rows('tabs') ): ?>
                    <div class="tab-content">
                        <div class="swiper-wrapper">
                             <?php while( have_rows('tabs') ): the_row();
                             ?>
                            <div class="swiper-slide max-6xl:px-16 max-xl:px-5 !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700">
                            <?php
                                // Sub repeater
                                $lists = get_sub_field('lists');
                                if ($lists) {
                                foreach ($lists as $key => $list) {
                                    $list_item = $list['heading'];
                                    if ($list_item) :
                                ?>
                                    <div class="col flex items-center  gap-7 border-b-[1px] border-lightblue py-10 max-md:py-7 md:pr-[10%]">
                                        <span class="w-14 h-14 bg-lightblue flex-none flex items-center justify-center font-medium">0<?= $key + 1;?></span>
                                        <p class="text-xl max-md:text-base leading-7 max-md:leading-6  font-medium"><?= $list_item;?></p>
                                    </div>
                                <?php
                                        endif;
                                    }
                                }
                                ?>
                            </div>
                             <?php endwhile; ?>
                        </div>
                    </div><!-- Tab content ends -->
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>