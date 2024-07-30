<?php
$taxonomy_handle = $args['taxonomy_handle'] ? $args['taxonomy_handle'] : null;
$categories = fetch_wp_terms($taxonomy_handle, DEFAULT_ALL_OPTION);
$selectedCategory = isset($_GET['category']) ? sanitize_text_field(urldecode($_GET['category'])) : '';
?>

<div class="select-wrap relative border border-solid border-black flex items-center w-[20rem] max-sl:w-1/2 max-md:w-full gap-2">
    <span class="label h-16 max-md:h-14 flex items-center pl-5 text-base opacity-50 relative -top-[1px] capitalize min-w-fit">Category:</span>
    <select class="categories-list">
        <?php foreach ($categories as $key => $value) {
            if(is_object($value)) { ?>
                <option value="<?php echo $value->slug; ?>" <?php if($value->slug == $selectedCategory) {?>selected<?php } ?>><?php echo $value->name; ?></option>
            <?php } else { ?>
                <option value="<?php echo $key; ?>" <?php if($key == $selectedCategory) {?>selected<?php } ?>><?php echo $value; ?></option>
            <?php } ?>
        <?php } ?>
    </select>
</div>