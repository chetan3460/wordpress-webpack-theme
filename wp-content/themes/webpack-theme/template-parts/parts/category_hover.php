<?php if (!wp_is_mobile()) { ?>

    <section class="sticky-img-block desktop py-[10rem]  max-md:py-12  fade-in" data-delay="0.2">
        <div class="wrap relative max-container">

            <div class="images-list absolute left-[14vw] 6xl:left-[9vw] -translate-y-28 6xl:w-[22vw] 6xl:h-[26vw] w-[28vw] h-[32vw] bg-white">
                <?php
                $firstImage = true; // Initialize a variable to track the first image
                foreach ($terms as $term) {
                    $thumbnail = get_field('cat_tax_thumbnail', 'term_' . $term->term_id);
                    if (!$thumbnail) {
                        $thumbnail = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                    }
                    // Add the 'active' class to the first image
                    $activeClass = $firstImage ? ' active' : '';
                    $firstImage = false; // Set to false after the first iteration

                ?>

                    <img data-src="<?= $thumbnail ?>" alt="<?= $term->name; ?>" class="object-cover absolute size-full  left-0 top-0  aspect-[0.875]     lazy-image !opacity-0 [&.active]:!opacity-100 <?= $activeClass ?>" />

                <?php  } ?>

            </div>

            <div class="list-block">
                <?php foreach ($terms as $key => $term) { ?>
                    <a href="<?= (is_page_template('template-solutions.php')) ? 'javascript:void(0);' : get_term_link($term) ?>" class="item-block group px-16 max-xl:px-5 py-10 flex justify-between  transition-all duration-700 delay-0 [&.active]:bg-darkblue <?= (is_page_template('template-solutions.php')) ? 'cursor-default' : ''; ?>">
                        <p class="text-xl leading-6 transition-all duration-700 text-black group-[&.active]:text-white">0<?= $key + 1; ?></p>
                        <div class="content-wrap relative w-[45vw] 6xl:w-[40vw]">
                            <div class="content pr-[9.5vw]">
                                <h2 class="text-4xl leading-10 max-md:max-w-full pr-10 transition-all duration-700 text-black group-[&.active]:text-white capitalize"><?= $term->name; ?> </h2>
                                <div class="desc overflow-hidden">
                                    <p class=" text-base leading-5 max-md:max-w-full opacity-80 text-white group-[&.active]:mt-5 transition-all duration-700"><?= $term->description; ?></p>
                                </div>
                            </div>
                            <?php if(!is_page_template('template-solutions.php')):?>
                            <div class="primary-btn white absolute pointer-events-none top-0 right-0  opacity-0 transition-all duration-700 delay-100 group-[&.active]:opacity-100">
                                <span class="btn-arrow">
                                    <span class="icon-arrow-right"></span>
                                </span>
                            </div>
                            <?php endif;?>
                        </div>
                    </a>
                <?php } ?>
            </div>

        </div>
    </section>
<?php } else { ?>


    <section class="img-content-block mob-tablet py-[6.25rem] max-md:py-12 px-16 max-xl:px-5  fade-in  flex-col gap-20">
        <?php
        foreach ($terms as $key => $term) {
            $thumbnail = get_field('cat_tax_thumbnail', 'term_' . $term->term_id);
            if (!$thumbnail) {
                $thumbnail = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
            }
            // var_dump($term);

        ?>

            <a class="item-block flex gap-10 max-md:gap-5 max-md:flex-col" href="<?= get_term_link($term) ?>">
                <div class="flex col md:min-w-[50%]">
                    <img data-src="<?= $thumbnail; ?>" class="object-cover  aspect-[0.875]   lazy-image" />
                </div>
                <div class="flex col flex-col">
                    <p class="mt-8 max-sl:mt-2 text-xl font-medium leading-6 text-black">0<?= $key + 1; ?></p>
                    <h2 class="mt-5 max-md-3 text-4xl max-md:text-3xl font-medium leading-10 text-black capitalize">
                        <?= $term->name; ?>
                    </h2>
                    <p class="mt-8 max-md:mt-4 text-lg max-md:text-base leading-7 text-black sl:line-clamp-5">
                        <?= $term->description; ?>
                    </p>
                    <div class="primary-btn mt-10 max-md:mt-5">
                        <span class="btn-text"><span>learn more</span></span>
                        <span class="btn-arrow">
                            <span class="icon-arrow-right"></span>
                        </span>
                    </div>
                </div>
            </a>
        <?php } ?>
    </section>

<?php } ?>