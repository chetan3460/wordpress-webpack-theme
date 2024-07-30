<?php
$sub_title = get_sub_field('sub_title');
$heading = get_sub_field('heading');
$select_products = get_field('select_products');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($select_products && !$hide_block) :

?>

    <section class="py-[6.25rem] px-16 max-xl:px-5 max-md:py-12    fade-in">
        <div class="max-container">
            <?php if ($heading) : ?>
                <div class="flex gap-5 justify-between items-end  w-full max-sl:flex-col max-sl:items-start max-md:flex-wrap max-md:max-w-full">
                    <div class="flex flex-col text-black max-md:max-w-full">
                        <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize"><?= $heading; ?></h2>
                    </div>
                </div>
            <?php endif; ?>

            <div class="product-list mt-[3.75rem] grid grid-cols-3 max-sl:grid-cols-2 max-md:grid-cols-1 gap-5 hover-slide-block">
                <?php foreach ($select_products as $post) :
                    setup_postdata($post); ?>
                    <!-- Product Card Call -->
                    <?php include(locate_template('template-parts/parts/product_card.php', false, false)); ?>
                <?php endforeach; ?>
            </div>
            <!-- Load More -->
            <div class="load-more flex justify-center w-full mt-20 max-md:mt-10">
                <a href="#" class="primary-btn bordered">
                    <span class="btn-text"><span>load more</span></span>
                    <span class="btn-arrow">
                        <span class="icon-arrow-right"></span>
                    </span>
                </a>
            </div>
        </div>
    </section>

<?php endif; ?>