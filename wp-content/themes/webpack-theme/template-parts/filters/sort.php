<?php
$sorting = fetch_default_sorts(DEFAULT_ALL_OPTION);
$selectedSort = isset($_GET['sort_by']) ? sanitize_text_field(urldecode($_GET['sort_by'])) : '';
?>

<div class="select-wrap relative border border-solid border-black flex items-center w-[20rem] max-sl:w-1/2 max-md:w-full gap-2">
    <span class="label h-16 max-md:h-14 flex items-center pl-5 text-base opacity-50 relative -top-[1px] capitalize min-w-fit">Sort by:</span>
    <select class="sort-list">
        <?php foreach ($sorting as $key => $value) { ?>
            <option value="<?php echo $key; ?>" <?php if($key == $selectedSort) {?>selected<?php } ?>><?php echo $value; ?></option>
        <?php } ?>
    </select>
</div>
