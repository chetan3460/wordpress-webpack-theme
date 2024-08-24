<?php
$args = array(
    'post_type' => 'solutions',
    'posts_per_page' => -1, // -1 to fetch all posts
);
$solutions_query = new WP_Query($args);
if ($solutions_query->have_posts()){
    if (!wp_is_mobile()) { ?>

    <section class="sticky-img-block desktop py-[10rem]  max-md:py-12  fade-in" data-delay="0.2">
        <div class="wrap relative max-container">

            <div class="images-list absolute left-[14vw] 6xl:left-[9vw] -translate-y-28 6xl:w-[22vw] 6xl:h-[26vw] w-[28vw] h-[32vw] bg-white">
                <?php
                $firstImage = true; // Initialize a variable to track the first image
                while ($solutions_query->have_posts()) : $solutions_query->the_post();
                    if (get_field('post_thumbnail')) {
                        $thumbnail = wp_get_attachment_image_url(get_field('post_thumbnail'), "full");
                    }
                    else{
                        if (has_post_thumbnail()) {
                            $thumbnail = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
                        }
                        else{
                            $thumbnail = get_stylesheet_directory_uri(). '/assets/images/placeholder.jpg';
                        }
                    }
                    // Add the 'active' class to the first image
                    $activeClass = $firstImage ? ' active' : '';
                    $firstImage = false; // Set to false after the first iteration
                    ?>

                    <img data-src="<?= $thumbnail ?>" alt="<?php the_title(); ?>" class="object-cover absolute size-full  left-0 top-0  aspect-[0.875]     lazy-image !opacity-0 [&.active]:!opacity-100 <?= $activeClass ?>" />

                <?php  endwhile;
                wp_reset_postdata();
                ?>

            </div>

            <div class="list-block">
                <?php
                $key = 0;
                while ($solutions_query->have_posts()) : $solutions_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="item-block group px-16 max-xl:px-5 py-10 flex justify-between  transition-all duration-700 delay-0 [&.active]:bg-darkblue <?= (is_page_template('template-solutions.php')) ? 'cursor-pointer' : ''; ?>">
                        <p class="text-xl leading-6 transition-all duration-700 text-black group-[&.active]:text-white group-[&.active]:translate-x-14">0<?= $key + 1; ?></p>
                        <div class="content-wrap relative w-[45vw] 6xl:w-[40vw] transition-all duration-700 group-[&.active]:translate-x-14">
                            <div class="content pr-[9.5vw]">
                                <h2 class="text-4xl leading-10 max-md:max-w-full pr-10 transition-all duration-700 text-black group-[&.active]:text-white capitalize"><?php the_title(); ?> </h2>
                                <div class="desc overflow-hidden">
                                    <p class=" text-base leading-5 max-md:max-w-full opacity-80 text-white group-[&.active]:mt-5 transition-all duration-700"><?= get_the_excerpt(); ?></p>
                                </div>
                            </div>
                            <?php if (!is_page_template('template-solutions.php')) : ?>
                                <div class="primary-btn white absolute pointer-events-none top-0 right-0  opacity-0 transition-all duration-700 delay-100 group-[&.active]:opacity-100">
                                    <span class="btn-arrow">
                                        <span class="icon-arrow-right"></span>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>
                    
                <?php $key++; endwhile; ?>
            </div>

        </div>
    </section>
<?php } else { ?>


    <section class="img-content-block mob-tablet py-[6.25rem] max-md:py-12 px-16 max-xl:px-5  fade-in  flex-col gap-20">
        <?php
        $key = 0;
        while ($solutions_query->have_posts()) : $solutions_query->the_post();
            if (get_field('post_thumbnail')) {
                $thumbnail = wp_get_attachment_image_url(get_field('post_thumbnail'), "full");
            }
            else{
                if (has_post_thumbnail()) {
                    $thumbnail = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
                }
                else{
                    $thumbnail = get_stylesheet_directory_uri(). '/assets/images/placeholder.jpg';
                }
            }
            // var_dump($term);

            ?>

            <a class="item-block flex gap-10 max-md:gap-5 max-md:flex-col" href="<?php the_permalink(); ?>">
                <div class="flex col md:min-w-[50%]">
                    <img data-src="<?= $thumbnail; ?>" class="object-cover  aspect-[0.875]   lazy-image" alt="<?php the_title(); ?>" />
                </div>
                <div class="flex col flex-col">
                    <p class="mt-8 max-sl:mt-2 text-xl font-medium leading-6 text-black">0<?= $key + 1; ?></p>
                    <h2 class="mt-5 max-md-3 text-4xl max-md:text-3xl font-medium leading-10 text-black capitalize">
                        <?= get_the_title(); ?>
                    </h2>
                    <p class="mt-8 max-md:mt-4 text-lg max-md:text-base leading-7 text-black sl:line-clamp-5">
                        <?= get_the_excerpt();; ?>
                    </p>
                    <div class="primary-btn mt-10 max-md:mt-5">
                        <span class="btn-text"><span>learn more</span></span>
                        <span class="btn-arrow">
                            <span class="icon-arrow-right"></span>
                        </span>
                    </div>
                </div>
            </a>
        <?php endwhile; ?>
    </section>

<?php }
}?>