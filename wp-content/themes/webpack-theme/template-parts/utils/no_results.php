<?php
$success = $args['success'] ? $args['success'] : false;
?>

<div class="col-12 text-center" id="no-result"  <?php if($success) { ?>style="display: none;"<?php } ?>>
    <h2><?php echo __('No Data Found', 'fpi'); ?></h2>
</div>