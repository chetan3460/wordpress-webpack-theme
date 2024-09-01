<?php
$subtitle = get_sub_field('subtitle');
$heading = get_sub_field('heading');
$scroll_image = get_sub_field('scroll_image');
// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($scroll_image && !$hide_block) :
?>

    <section class="service-hero-section py-[6.25rem] max-xl:px-5 max-md:py-12 max-container fade-in overflow-hidden"
        style="
    <?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px;<?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">

        <div class="images_shape_move_container" style="background-image: url('<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/services/service-landing-text-mask.png'); ?>');">
            <div class="shape_contaner">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/services/top-shape1.svg" alt="Brand Identity Integra Magna" class="img1">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/services/bottom-shape1.svg" alt="Brand Identity Integra Magna" class="img2">
            </div>
        </div>

    </section>

<?php endif; ?>