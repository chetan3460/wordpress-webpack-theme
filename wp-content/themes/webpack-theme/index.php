<?php
get_header();
if ( have_posts() ) : ?>
<?php
  while ( have_posts() ) : the_post();
  	?>
	<!-- Default Page-->
	<section class="default-page">

	</section>
	<?php
  endwhile;
endif;
get_footer(); ?>