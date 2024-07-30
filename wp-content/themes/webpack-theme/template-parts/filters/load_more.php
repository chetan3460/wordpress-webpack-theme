<?php
$hasNextPage = $args['hasNextPage'] ? $args['hasNextPage'] : false;
?>

<div class="load-more flex justify-center w-full mt-20 max-md:mt-10" <?php if(!$hasNextPage) { ?>style="display: none;"<?php } ?>>
    <a class="primary-btn bordered">
        <span class="btn-text"><span>load more</span></span>
        <span class="btn-arrow"><span class="icon-plus"></span></span>
    </a>
</div>