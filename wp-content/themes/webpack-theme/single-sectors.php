<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();

    ?>

        <!-- Banner and breadcrumb include -->
        <?php include(locate_template('template-parts/parts/section_banner.php', false, false)); ?>


        <!-- Single Sectors Page-->


        <?php
        //Commented Duplicate code
        //$relevant_products = get_field('select_products');
        //        if ($relevant_products) { 
        ?>
        <!--            <div class="product-list mt-[3.75rem] grid grid-cols-3 max-sl:grid-cols-2 max-md:grid-cols-1 gap-5 hover-slide-block" data-type="--><?php //if ($current_term) {
                                                                                                                                                            //                                                                                                                                                    echo $current_term->slug;
                                                                                                                                                            //                                                                                                                                                }; 
                                                                                                                                                            ?><!--">-->
        <!--                --><?php
                                //                foreach ($relevant_products as $product) :
                                //                    $product_id = $product->ID;
                                //                    set_query_var('product_id', $product_id);
                                //                    get_template_part('template-parts/parts/product_card');
                                //                endforeach;
                                //                wp_reset_postdata();
                                //                
                                ?>
        <!--            </div>-->
        <!--        --><?php //} 
                        ?>

        <?php include(locate_template('template-parts/modules.php', false, false)); ?>

<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>