<?php

/**
 * Template Name: About Us
 */
get_header();

?>


<div class="about">

    <?php echo do_shortcode('[gravityform id="1" title="true"]') ?>

</div>

<?php
get_footer();
?>