<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php
  while (have_posts()) : the_post();

  ?>
    <!-- Default Page-->


    <!-- Page banner -->
    <?php include(locate_template('template-parts/parts/short_banner.php', false, false)); ?>

    <!-- Page content -->
    <?php if (!empty(get_the_content())) { ?>
      <section class="default-section py-[6.25rem] max-md:py-12 px-16 max-xl:px-5 fade-in">
        <div class="max-container">
          <div class="text-block type-two lg:w-[70%] md:w-[90%] m-auto">
            <?= the_content(); ?>
          </div>
        </div>
      </section>
    <?php } ?>

    <!-- Page modulees -->
    <?php include(locate_template('template-parts/modules.php', false, false)); ?>


<?php
  endwhile;
endif;
?>

<?php get_footer(); ?>