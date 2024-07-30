<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 */

get_header();

?>
<!-- 404 Block -->
<section class="404-block max-container flex flex-col sm:flex-row max-md:pt-24 items-center md:justify-center min-h-screen fade-in">
    <div class="col md:min-h-screen content md:w-1/2 flex flex-col  justify-center max-sl:py-10  px-16 max-xl:px-5 text-black">

        <h1 class="text-[6.25rem] max-lg:text-7xl max-md:text-5xl leading-[6.6rem] capitalize"><?= _e('404', T_PREFIX); ?></h1>

        <p class="text-xl max-md:text-base mt-6 max-md:mt-3"><?= _e('We can’t find the page you are looking for', T_PREFIX); ?></p>

        <a href="<?= site_url(); ?>" class="primary-btn mt-20 max-md:mt-10">
            <span class="btn-text"><span><?= _e('Go Back to the homepage', T_PREFIX); ?></span></span>
            <span class="btn-arrow">
                <span><span class="icon-arrow-right"></span></span>
            </span>
        </a>

    </div>

    <!-- Fetch the products post type -->
    <?php
    $args = array(
        'post_type' => 'products',
        'posts_per_page' => 7,

    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        $counter = 1;
    ?>

    <div class="col img md:w-1/2 max-md:w-full bg-lightblue md:min-h-screen flex items-center max-md:py-12 ">
        <div class="flex flex-col items-start justify-center px-20 max-md:px-5 max-sl:px-8 w-full md:pt-44 md:pb-10">
            <h3 class="text-3xl max-md:text-xl text-darkblue mb-14 capitalize"><?= _e('Explore our products', T_PREFIX); ?></h3>
            <ul class='w-full'>
                <?php while ($query->have_posts()) : $query->the_post();

                 ?>
                <li class=" last:mb-0 mb-12 relative pl-7 pr-10">
                    <a href="<?= the_permalink();?>" class="transition-all max-md:block pr-10 duration-700 text-2xl max-md:text-xl capitalize  md:opacity-30 hover:opacity-100 font-medium relative md:after:content-[''] after:absolute after:-bottom-[0.5rem] after:left-0 after:w-0 after:h-[1px] after:bg-black after:transition-all after:duration-700 md:hover:after:w-full"><span class="font-normal absolute text-base -left-7 -top-3 max-md:opacity-30">0<?= $counter;?></span><?= the_title();?> </a>
                    <a href="#" class="btn pointer-events-none absolute right-0 -top-4 opacity-0  max-md:opacity-100  max-lg:text-darkblue group-hover:opacity-100 transition-all duration-700">
                        <div class="primary-btn ">
                            <span class="btn-arrow">
                                <span class="icon-arrow-right "></span>
                            </span>
                        </div>
                    </a>
                </li>
                <?php
                $counter++;
             endwhile;
                wp_reset_postdata();
             ?>
            </ul>

        </div>
    </div>
    <?php } ?>

</section>

<?php get_footer(); ?>