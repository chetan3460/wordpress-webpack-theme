<?php

get_header();
?>

<?php
if (have_posts()) {
	while (have_posts()) {
		the_post(); ?>
<!-- HomePage -->
<main>

    <?php include(locate_template('template-parts/modules.php', false, false)); ?>

</main>
<?php }
}
?>
<?php get_footer(); ?>