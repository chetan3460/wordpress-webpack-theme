<?php
$response = get_query_var('response');
$response = $response ? $response : ['success'=>false, 'hasNextPage'=>false];
$current_term = get_query_var('current_term');
?>
<div class="product-list mt-[3.75rem] grid grid-cols-3 max-sl:grid-cols-2 max-md:grid-cols-1 gap-5 hover-slide-block" data-type="<?php if($current_term) { echo $current_term->slug; }; ?>">
<?php
    if ($response && $response['success'] && $response['data']->have_posts()) {
        $query = $response['data'];
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/parts/product_card', 'post');
        endwhile;
        wp_reset_postdata();
    ?>
</div>
<?php } ?>
<?php
get_template_part('template-parts/utils/no_results', 'post', array('success' => $response['success']));
get_template_part('template-parts/filters/loader');
get_template_part('template-parts/filters/load_more', 'post', array('hasNextPage' => $response['hasNextPage']));
?>