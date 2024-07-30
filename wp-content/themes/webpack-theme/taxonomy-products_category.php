<?php get_header(); ?>

<!-- Banner and breadcrumb include -->
<?php include(locate_template('template-parts/parts/section_banner.php', false, false)); ?>


<?php include(locate_template('template-parts/taxonomy_modules.php', false, false)); ?>

<?php
$keyword = isset($_GET['keyword']) ? sanitize_text_field(urldecode($_GET['keyword'])) : '';
?>

<section id="3" class="product-listing py-[6.25rem] px-16 max-xl:px-5 max-md:py-12   section-block fade-in">
    <div class="max-container">

        <div class="flex gap-5 justify-between items-end  w-full max-sl:flex-col max-sl:items-start max-md:flex-wrap max-md:max-w-full">
            <div class="flex flex-col text-black max-md:max-w-full">
                <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize">Products Listing</h2>
                <div class="input-block w-[33.5rem] mt-10 max-md:w-full max-md:mt-5">
                    <div class="element w-full relative">
                        <input type="text" placeholder="Search Products" id="keywords" class=" border border-solid border-black p-5 pl-14 w-full h-16 max-md:h-14 !rounded-none bg-transparent" value="<?php echo $keyword; ?>">
                        <span class="icon-search absolute left-5 top-[50%] -translate-y-[50%] text-2xl"></span>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $current_term = get_queried_object();
        $response = products_filter_ajax($current_term->slug, true);
        set_query_var('response', $response);
        set_query_var('current_term', $current_term);
        ?>
        <?php get_template_part('template-parts/parts/products/product_query'); ?>
    </div>
</section>

<?php get_footer(); ?>