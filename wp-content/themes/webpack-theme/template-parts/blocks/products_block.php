<?php
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');
$products_categories = get_sub_field('products_categories');

// Product count
$product_count = wp_count_posts('products')->publish;

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($products_categories && !$hide_block) :

?>

    <section class="flex flex-col py-[6.25rem]  max-md:py-12 tab-section-block bg-aliceblue" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

        <div class="max-container">
            <div class="flex gap-8 flex-col mb-14 max-md:mb-0 fade-in">
                <?php if ($sub_title || $heading) : ?>
                    <div class="flex flex-col w-[50%]  max-lg:w-full">
                        <div class="flex flex-col grow text-black max-6xl:pl-16 max-xl:pl-5">
                            <?php if ($sub_title) : ?>
                                <p class="text-xl leading-5 uppercase max-md:text-[1rem]"><?= $sub_title; ?></p>
                            <?php endif; ?>
                            <?php if ($heading) : ?>
                                <h2 class="mt-5 text-6xl leading-[4rem] max-xl:text-[4rem] max-xl:leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem] font-medium capitalize">
                                    <?= $heading; ?>
                                </h2>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col lg:w-max max-6xl:pl-16 max-xl:pl-5">
                    <div class="flex flex-col grow ">
                        <div class="free-slider flex gap-3 justify-between items-start   text-base text-center  max-md:mb-4 max-xxl:gap-3 max-xxl:text-[0.875rem] ">
                            <div class="swiper-wrapper  w-max  border border-black/10 p-2 rounded-md max-md:border-r-0 max-md:rounded-r-none">
                                <?php foreach ($products_categories as $key => $term) : ?>
                                    <div class="swiper-slide last:!m-0 w-max flex justify-between  hover:cursor-pointer  relative p-3 rounded-md  transition-colors duration-700  <?php echo ($key == 0) ? 'active' : ''; ?> group [&.active]:bg-darkblue [&.active]:text-white  max-md:after:!w-0 hover:bg-darkblue hover:text-white">
                                        <h3 class="flex-1 my-auto font-medium capitalize leading-[120%]"><?= $term->name ?></h3>
                                        <div class="flex justify-center items-center p-2.5 bg-orange h-[1.875rem] leading-[130%]  w-[1.875rem] transition-colors duration-700 rounded-full group-[&.active]:text-black ml-2.5">
                                            <?= $term->count; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content max-lg:mb-5 max-md:mb-0 fade-in">
                <div class="swiper-wrapper">
                    <?php foreach ($products_categories as $key => $term) :
                    ?>
                        <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700">
                            <div class="sector-listing flex flex-col max-lg:px-5">
                                <?php
                                // Define the custom query parameters
                                $args = array(
                                    'post_type' => 'products',
                                    'posts_per_page' => 3, // -1 to fetch all posts
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'products_category',
                                            'field'    => 'slug',
                                            'terms'    => $term->slug,
                                            'operator' => 'IN', // Use 'AND' if you want posts that match all terms
                                        ),
                                    ),
                                );
                                $products_query = new WP_Query($args);
                                $counter = 0;
                                if ($products_query->have_posts()) :
                                    while ($products_query->have_posts()) : $products_query->the_post();
                                        $caption = get_field('caption');
                                ?>
                                        <div class="row flex justify-end <?php echo ($key == 0) ? 'max-md:items-start' : ''; ?> max-md:mb-5 fade-in">
                                            <div class="w-[58.5%] max-lg:w-full h-[31.25rem] max-md:h-auto bg-lavendermist relative group overflow-hidden max-lg:flex max-lg:flex-row max-md:flex-col">
                                                <a href="<?php the_permalink(); ?>" class="flex justify-center cursor-pointer relative h-full max-md:h-full max-lg:w-[55%] max-md:w-full">
                                                    <?php
                                                    if (has_post_thumbnail()) {
                                                        $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
                                                    } else {
                                                        $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                                                    }
                                                    ?>
                                                    <img loading="lazy" data-src="<?php echo $post_featured_img; ?>" alt="<?php the_title(); ?>" class="transition-all duration-700  lg:group-hover:-translate-x-[9.5rem] h-full object-cover lazy-image">
                                                    <h3 class="absolute text-[2.5rem] leading-10 left-8 bottom-8 transition-all duration-700 opacity-100 lg:group-hover:opacity-0 max-lg:hidden"><?php the_title(); ?> </h3>
                                                </a>
                                                <div class="product-desc flex flex-col max-md:pt-2 w-[18rem] max-lg:w-[45%] max-md:w-full lg:absolute lg:right-0 lg:bottom-0 h-full lg:transition-all lg:duration-700 lg:translate-x-full lg:group-hover:translate-x-0 bg-aliceblue max-lg:bg-darkblue">
                                                    <div class="flex flex-col lg:grow px-5 py-8 mx-auto w-full bg-darkblue justify-between max-lg:h-auto max-lg:justify-start gap-7">
                                                        <div>
                                                            <!-- <p class="text-base leading-5 text-white">30 Products</p> -->
                                                            <h4 class="mt-2.5 text-xl font-medium leading-6 text-white">
                                                                <?php the_title(); ?>
                                                            </h4>
                                                            <p class="mt-5 text-base leading-5 text-white opacity-80 max-md:line-clamp-3">
                                                                <?= get_the_excerpt(); ?>
                                                            </p>
                                                        </div>
                                                        <a href="<?php the_permalink(); ?>" class="primary-btn white">
                                                            <span class="btn-text"><span>learn more</span></span>
                                                            <span class="btn-arrow">
                                                                <span><span class="icon-arrow-right"></span></span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        $counter++;
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>

                            </div>
                        </div>
                    <?php

                    endforeach; ?>


                </div>
            </div>


            <div class="flex flex-col col w-[41.5%] items-end max-lg:w-[calc(100%-2.5rem)] max-lg:items-start max-lg:m-auto max-lg:h-auto fade-in">
                <a href="<?= site_url();?>/product" class=" overflow-hidden relative flex flex-col grow justify-start  p-5 max-xl:p-3 text-white lg:aspect-[0.96] cursor-pointer group w-[calc(50%-0.625rem)] max-lg:w-full bg-darkblue border border-solid border-transparent hover:bg-transparent hover:border-darkblue hover:text-darkblue transition-all duration-700">
                    <div class="primary-btn white absolute z-10 right-5 bottom-5  transition-all duration-700 group-hover:opacity-100 pointer-events-none">
                        <span class="btn-arrow group-hover:after:bg-darkblue">
                            <span><span class="icon-arrow-right group-hover:before:!text-white group-hover:before:content-['\e904']"></span></span>
                        </span>
                    </div>
                    <div class="desc relative z-10 p-3">
                        <p class="text-base  capitalize  max-md:mb-[1rem] mb-2 max-md:text-[1rem]"><?= $product_count;?> products</p>
                        <h3 class="capitalize text-[1.625rem] font-medium leading-7 ">Discover all <br class="!block">products</h3>
                    </div>
                </a>
            </div>


        </div>

    </section>


<?php endif; ?>