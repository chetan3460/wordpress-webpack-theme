 <section class="inner-banner no-banner relative  fade-in px-16 max-xl:px-5 h-[43.75rem] max-md:h-[19rem] bg-lightblue">
     <div class="inner-banner-content relative flex flex-col fade-in z-10 h-full text-white pt-52 max-md:pt-32 full-max-container" data-delay="0.3">
         <!-- Breadcrumbs -->
         <?php include(locate_template('template-parts/parts/breadcrumbs.php', false, false)); ?>
         <h1 class="text-8xl font-medium capitalize leading-[6.5rem] max-lg:text-7xl max-lg:leading-[5rem] max-md:text-3xl">
             <?php if (is_search()) : ?>
                 <?php _e('Search', T_PREFIX); ?>
             <?php else : ?>
                 <?= the_title(); ?>
             <?php endif; ?>
         </h1>
     </div>
 </section>