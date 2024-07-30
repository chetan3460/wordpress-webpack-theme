<section class="inner-banner relative  fade-in px-16 max-xl:px-5 h-[43.75rem] max-md:h-[19rem] ">
    <div class="inner-banner-content relative flex flex-col fade-in z-10 h-full text-white justify-center max-md:pt-32 full-max-container" data-delay="0.3">

        <!-- Breadcrumbs -->
        <?php include(locate_template('template-parts/parts/breadcrumbs.php', false, false)); ?>

        <h1 class="text-8xl font-medium capitalize leading-[6.5rem] max-lg:text-7xl max-lg:leading-[5rem] max-md:text-3xl">
            <?php if (is_tax()) :
                single_term_title();
            else :
                the_title();
            endif;
            ?>

        </h1>

    </div>
    <?php
    $term = get_queried_object();
    $image = get_field('feature_image', $term);
    if (is_tax()) {
        if ($image) {
            $post_featured_img = $image['url'];
        } else {
            $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder-large.jpg';
        }
    } else {
        if (has_post_thumbnail()) {
            $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
        } else {
            $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder-large.jpg';
        }
    }
    ?>
    <div class="absolute size-full inset-0">
        <img src="<?php echo $post_featured_img; ?>" alt="<?php the_title(); ?>" class="object-cover size-full" />
        <div class="overlay full-overlay"></div>
    </div>

</section>