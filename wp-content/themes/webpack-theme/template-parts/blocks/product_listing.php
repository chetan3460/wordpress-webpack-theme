<?php
$keyword = isset($_GET['keyword']) ? sanitize_text_field(urldecode($_GET['keyword'])) : '';

$heading = get_sub_field('heading');
$download = get_sub_field('download_catalog');
$post_id = get_the_ID();

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));
if (!$hide_block) :
?>

    <section id="3" class="relevant-products py-[6.25rem] px-16 max-xl:px-5 max-md:py-12  bg-aliceblue section-block fade-in" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>" data-type="<?php echo $post_id; ?>">
        <div class="max-container">

            <div class="flex gap-5 justify-between items-end  w-full max-sl:flex-col max-sl:items-start max-md:flex-wrap max-md:max-w-full">
                <div class="flex flex-col text-black max-md:max-w-full">
                    <?php if ($heading) : ?>
                        <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize"><?= $heading;?></h2>
                    <?php endif; ?>
                    <div class="input-block w-[33.5rem] mt-10 max-md:w-full max-md:mt-5">
                        <div class="element w-full relative">
                            <input type="text" placeholder="Search Products" id="keywords" class=" border border-solid border-black p-5 pl-14 w-full h-16 max-md:h-14 !rounded-none bg-transparent" value="<?php echo $keyword; ?>">
                            <span class="icon-search absolute left-5 top-[50%] -translate-y-[50%] text-2xl"></span>
                        </div>
                    </div>
                </div>
                <?php if ($download) : ?>
                    <div class="flex gap-1.5   rounded-full  ">
                        <a href="<?= $download;?>" download class="primary-btn mt-10 max-md:mt-5">
                            <span class="btn-text"><span>Download Catalog</span></span>
                            <span class="btn-arrow">
                                <span class="icon-arrow-right"></span>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <?php
            $response = relevant_products_filter_ajax($post_id, true);
            set_query_var('response', $response);
            ?>
            <?php get_template_part('template-parts/parts/products/product_query'); ?>

        </div>
    </section>
<?php endif; ?>