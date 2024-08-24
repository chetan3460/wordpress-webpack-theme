<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php
  while (have_posts()) : the_post();

  ?>
    <!-- Single Blog Page-->
    <section class="default-page single-blog">
      <div class="container">
        <div class="row">

        </div>

      </div>



    </section>



<?php
  endwhile;
endif;
?>
<?php include(locate_template('template-parts/modules.php', false, false)); ?>
<?php get_footer(); ?>