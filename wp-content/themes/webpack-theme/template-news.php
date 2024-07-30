<?php

/**
 * Template Name: News
 */


get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();
    $keyword    = isset($_GET['keyword']) ? sanitize_text_field(urldecode($_GET['keyword'])) : '';
    $postType = 'news';
    $taxonomyHandle = 'news_category';
    ?>

        <!-- Page banner -->
        <?php include(locate_template('template-parts/parts/short_banner.php', false, false)); ?>

        <section class="career-block-wrap common-listing py-[6.25rem] max-md:py-12 px-16 max-xl:px-5  fade-in" data-type="<?php echo $postType; ?>">
            <div class="max-container">
                <div class="filter-block mb-14 max-md:mb-8 flex max-sl:flex-col gap-5 justify-between">
                    <div class="input-block w-[33.5rem]  max-sl:w-full">
                        <div class="element w-full relative">
                            <input type="text" placeholder="Search" id="keywords" class="border border-solid border-black p-5 pl-14 w-full h-16 max-md:h-14 !rounded-none bg-transparent" value="<?php echo $keyword; ?>">
                            <span class="icon-search absolute left-5 top-[50%] -translate-y-[50%] text-2xl"></span>
                        </div>
                    </div>
                    <div class="select-block flex max-md:flex-col  gap-5 md:h-16">
                        <?php
                        get_template_part('template-parts/filters/category', 'post', array('taxonomy_handle' => $taxonomyHandle));
                        get_template_part('template-parts/filters/sort');
                        ?>
                    </div>
                </div>

                <?php
                $response = common_filter_ajax($postType,true);
                ?>

                <div class="list-item-container gap-5 grid grid-cols-3 max-sl:grid-cols-1">
                    <?php if ($response['success'] && $response['data']->have_posts()) {
                        $query = $response['data'];
                        while ($query->have_posts()) : $query->the_post();
                            get_template_part('template-parts/parts/news_card', 'post');
                        endwhile;
                        wp_reset_postdata();
                    } ?>
                </div>

                <?php
                get_template_part('template-parts/utils/no_results', 'post', array('success' => $response['success']));
                get_template_part('template-parts/filters/loader');
                get_template_part('template-parts/filters/load_more','post', array('hasNextPage' => $response['hasNextPage']));
                ?>
            </div>

        </section>


<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>