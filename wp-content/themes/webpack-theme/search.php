<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

get_header();

?>

<!-- Page banner -->
<?php include(locate_template('template-parts/parts/short_banner.php', false, false)); ?>

<?php
$keyword = isset($_GET['s']) ? sanitize_text_field(urldecode($_GET['s'])) : '';
$tabs = fetch_search_tabs();
$first = '';
$firstItem = null;
if($tabs) {
    $first = array_key_first($tabs);
    $firstItem = $tabs[$first];
}
?>


<section class="search-page pt-14 pb-[6.25rem] px-16 max-xl:px-5 max-md:px-0 max-md:pl-5 max-md:py-12 fade-in">
    <div class="max-container">

        <!-- Search Bar -->
        <div class="flex gap-5 justify-between items-end max-md:pr-5  w-full max-sl:flex-col max-sl:items-start max-md:flex-wrap max-md:max-w-full">
            <div class="flex flex-col text-black w-full">
                <div class="input-block w-[33.5rem] max-md:w-full ">
                    <div class="element w-full relative">
                        <input type="text" placeholder="Search" id="keywords" class=" border border-solid border-black/10 p-5 pl-14 w-full h-16 max-md:h-14" value="<?php echo $keyword; ?>">
                        <span class="icon-search absolute left-5 top-[50%] -translate-y-[50%] text-2xl"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="flex flex-col lg:w-max mt-14 max-md:mt-10" <?php if(!$tabs) { ?>style="display: none;"<?php } ?>>
            <div class="flex flex-col grow ">
                <div class="free-slider flex gap-3 justify-between items-start   text-base text-center    max-xxl:gap-3 max-xxl:text-[0.875rem] ">
                    <div class="search-tabs swiper-wrapper w-max  border border-black/10 p-2 rounded-md max-md:border-r-0 max-md:rounded-r-none">
                        <?php
                        if($tabs) {
                            foreach ($tabs as $key => $tab) {
                                set_query_var('result_key', $key);
                                set_query_var('result', $tab);
                                get_template_part('template-parts/parts/search/tab');
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Results -->
        <div class="search-list-block pt-14 max-md:pt-7 max-md:pr-5">
            <p class="results-count opacity-50 mb-10 max-md:mb-5 max-md:text-[0.875rem]" <?php if(!$firstItem) {?>style="display: none;" <?php } ?>><?php if ($firstItem && $firstItem['count']) { echo $firstItem['count'] . ' ' . ($firstItem['count'] == 1 ? 'result Found' : 'results Found'); } ?></p>
            <div class="list-item-container search-blocks grid grid-cols-3 max-lg:grid-cols-2 max-md:grid-cols-1 gap-5">

                <?php $response = search_filter_ajax($first, true); ?>
                <?php if ($response['success'] && $response['data']->have_posts()) {
                    $query = $response['data'];
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/parts/search/search_card', 'post');
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

    </div>
</section>
<?php
get_footer(); ?>