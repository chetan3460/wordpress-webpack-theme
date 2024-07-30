<?php
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');

$solutions_type = get_sub_field('solutions_type');
$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}


// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($sub_title || $heading) && !$hide_block) :

?>
    <section class="flex flex-col py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 tab-section-block max-container" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
        <div class="flex gap-5 max-lg:flex-col max-md:gap-0 justify-between items-baseline fade-in">
            <?php if ($sub_title || $heading) : ?>
                <div class="flex flex-col w-[33%] max-xxl:w-[30%] max-lg:w-full">
                    <div class="flex flex-col grow text-black">
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

            <div class="flex flex-col w-auto max-xxl:w-[70%] max-lg:w-full">
                <div class="flex flex-col grow ">
                    <?php if ($cta) : ?>
                        <div class="flex gap-1.5 self-end max-lg:hidden">
                            <a href="<?= $cta['url'] ?>" target="<?= $cta_target; ?>" class="primary-btn">
                                <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                                <span class="btn-arrow">
                                    <span><span class="icon-arrow-right"></span></span>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($solutions_type) : ?>
                        <div class="free-slider flex gap-7 justify-between items-start mt-16 max-lg:mt-10  text-base text-center pb-7 md:border-b-[0.1rem] md:border-lightgray max-xxl:gap-3 max-xxl:text-[0.875rem]">
                            <div class="swiper-wrapper ">
                                <?php foreach ($solutions_type as $key => $term) : ?>
                                    <div class="swiper-slide last:!m-0 w-max flex gap-2.5 hover:cursor-pointer opacity-50 relative after:content-[''] after:absolute after:bottom-[-1.85rem] after:w-0 after:h-[0.1rem] after:bg-orange after:transition-all after:duration-700 hover:after:w-full transition-opacity duration-700 hover:opacity-100 <?php echo ($key == 0) ? 'active' : ''; ?> [&.active]:opacity-100 [&.active]:after:w-full max-md:after:!w-0">
                                        <h3 class="flex-1 my-auto font-medium capitalize leading-[120%]"><?= $term->name ?></h3>
                                        <div class="flex justify-center items-center p-2.5 bg-orange h-[1.875rem] leading-[130%]  w-[1.875rem] rounded-full">
                                            <?= $term->count; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Tab content -->

        <?php if ($solutions_type) : ?>

            <div class="tab-content fade-in">
                <div class="swiper-wrapper">

                    <?php foreach ($solutions_type as $key => $term) :


                    ?>
                        <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700">

                            <div class="solution-slider">
                                <div class="swiper w-full max-lg:overflow-visible mt-16 max-md:mt-0">
                                    <div class="swiper-wrapper sl:gap-[1.875rem] sl:justify-between">
                                        <?php
                                        // Define the custom query parameters
                                        $args = array(
                                            'post_type' => 'solutions',
                                            'posts_per_page' => -1, // -1 to fetch all posts
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'solutions_category',
                                                    'field'    => 'slug',
                                                    'terms'    => $term->slug,
                                                    'operator' => 'IN', // Use 'AND' if you want posts that match all terms
                                                ),
                                            ),
                                        );
                                        $solutions_query = new WP_Query($args);
                                        $counter = 0;
                                        if ($solutions_query->have_posts()) :
                                            while ($solutions_query->have_posts()) : $solutions_query->the_post();
                                                $caption = get_field('caption');
                                        ?>
                                                <article class="<?php echo ($counter % 2 != 0) ? 'w-[42%]' : 'w-[27%]'; ?> swiper-slide">
                                                    <a href="<?php the_permalink(); ?>" class="flex flex-col text-black cursor-pointer group">
                                                        <?php if (has_post_thumbnail()) {
                                                            $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
                                                        ?>
                                                            <div class="overflow-hidden">
                                                                <img loading="lazy" data-src="<?php echo $post_featured_img; ?>" alt="<?php the_title(); ?>" class="w-full aspect-[1.05] max-md:aspect-square scale-100 duration-700 transition-all group-hover:scale-110 lazy-image object-cover" />
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($caption) : ?>
                                                            <p class="mt-5 text-base opacity-50"><?= $caption; ?></p>
                                                        <?php endif; ?>
                                                        <h3 class="mt-3 text-3xl max-md:text-[1.57rem] font-medium leading-10 capitalize"><?php the_title(); ?></h3>
                                                    </a>
                                                </article>

                                        <?php
                                                $counter++;
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php

                    endforeach; ?>
                </div>
            </div>

        <?php endif; ?>


        <?php if ($cta) : ?>
            <div class="flex  mt-10 lg:hidden fade-in">
                <a href="<?= $cta['url'] ?>" target="<?= $cta_target; ?>" class="primary-btn">
                    <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                    <span class="btn-arrow">
                        <span><img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-right.svg" alt="arrow"></span>
                    </span>
                </a>
            </div>
        <?php endif; ?>

    </section>

<?php endif; ?>