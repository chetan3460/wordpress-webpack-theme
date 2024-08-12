<?php
$sub_title = get_sub_field('subtitle');
$heading = get_sub_field('heading');
$partners_items = get_sub_field('partners_items');


$partners_cta = get_sub_field('partners_cta');
if (!empty($partners_cta)) {
    $cta_target = $partners_cta['target'] ? $partners_cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($partners_items && !$hide_block) :
?>

<section class="home-part partner-slider">
    <div class="container grid">
        <div class="home-part__head">
            <div class="home-part__label txt txt-20 txt-med"> Investors &amp; Supporters </div>
            <h2 class="h3 heading home-part__title">
                <div class="g-lines"> Trusted by top
                </div>
                <div class="g-lines" ">Partners &amp;
                    Supporters </div>
            </h2> <a href=" #" class="btn btn-lg btn-pri home-part__btn" data-popup="contact">
                    <div class="txt txt-18 txt-med"> Partner with us today </div>
                    </a>
                </div>
                <!-- Heading & CTA -->
                <div class=" w-full max-xl:px-5 pb-16 flex md:flex-row flex-col justify-between">
                    <div class=" ">
                        <?php if ($sub_title) : ?>
                        <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem] text-[#7B7B7B]">
                            <?= $sub_title; ?>
                        </p>
                        <?php endif; ?>

                        <?php if ($heading) : ?>
                        <h2
                            class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize text-white font-medium">
                            <?= $heading; ?></h2>
                        <?php endif; ?>
                    </div>
                    <?php  if ($cta) : ?>
                    <div class="md:mt-0 mt-5">

                        <a href="<?= $cta['url']; ?>" target="<?= $cta_target; ?>" class="primary-btn  white"> <span
                                class="btn-text"><span><?= $cta['title']; ?></span></span> <span class="btn-arrow">
                                <span class="icon-arrow-right"></span> </span> </a>

                    </div>
                    <?php endif; ?>
                </div>

        </div>
        <div class="home-part__main home-part__main-supporters">
            <div class="home-part__marquee">
                <div class="--right home-part__marquee-wrapper">
                    <div class="home-part__marquee-item">
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/d28f665f-6a1c-4f93-99a8-1178ea6032f0_logo-17.svg"
                                alt="HAX" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/d36b9948-4831-412f-870d-b6a08d0851b9_logo-2.svg"
                                alt="ESA" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/7ce097ef-fb64-495d-9208-9247b2438233_logo-16.svg"
                                alt="Federal Ministry of Economic Affairs of Germany" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/bf8575a0-02b0-490a-8f43-116e4e8869ca_logo-6.svg"
                                alt="TUM" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/ec7cca82-2b5d-4530-a790-b1606c517ab0_logo-7.svg"
                                alt="Fraunhofer CML" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/95d511c0-def5-495a-87f6-ad95f5282600_logo-1.svg"
                                alt="Microsoft for Startup" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/f676e6d7-fc8e-484a-b035-2beda6906e02_logo-5.svg"
                                alt="KIC" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/f6149619-7c34-4f3f-b8cd-f4ea77a99250_logo.svg"
                                alt="Unternehmertum" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/42f66beb-ec0f-415d-a484-bfcd0b1d60a3_logo-4.svg"
                                alt="Digital hub Logistics" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/65cf5a139be9a5b998b5ed8d_IWSA-logo_grey_small.png?auto=format,compress"
                                alt="IWSA" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/ZhaHrTjCgu4jzueQ_Third_Derivative_Logo.webp?auto=format%2Ccompress&amp;rect=0%2C8%2C864%2C380&amp;w=900&amp;h=396"
                                alt="Third Derivative" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/ZqNoSh5LeNNTxhFY_Lomar_logo_BW.png?auto=format,compress"
                                alt="Lomar Labs" loading="lazy">
                        </div>
                    </div>
                    <div class="home-part__marquee-item"
                        style="translate: none; rotate: none; scale: none; transform: translate(-94.8822%, 0%) translate3d(0px, 0px, 0px);">
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/d28f665f-6a1c-4f93-99a8-1178ea6032f0_logo-17.svg"
                                alt="HAX" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/d36b9948-4831-412f-870d-b6a08d0851b9_logo-2.svg"
                                alt="ESA" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/7ce097ef-fb64-495d-9208-9247b2438233_logo-16.svg"
                                alt="Federal Ministry of Economic Affairs of Germany" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/bf8575a0-02b0-490a-8f43-116e4e8869ca_logo-6.svg"
                                alt="TUM" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/ec7cca82-2b5d-4530-a790-b1606c517ab0_logo-7.svg"
                                alt="Fraunhofer CML" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/95d511c0-def5-495a-87f6-ad95f5282600_logo-1.svg"
                                alt="Microsoft for Startup" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/f676e6d7-fc8e-484a-b035-2beda6906e02_logo-5.svg"
                                alt="KIC" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/f6149619-7c34-4f3f-b8cd-f4ea77a99250_logo.svg"
                                alt="Unternehmertum" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/42f66beb-ec0f-415d-a484-bfcd0b1d60a3_logo-4.svg"
                                alt="Digital hub Logistics" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/65cf5a139be9a5b998b5ed8d_IWSA-logo_grey_small.png?auto=format,compress"
                                alt="IWSA" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/ZhaHrTjCgu4jzueQ_Third_Derivative_Logo.webp?auto=format%2Ccompress&amp;rect=0%2C8%2C864%2C380&amp;w=900&amp;h=396"
                                alt="Third Derivative" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/ZqNoSh5LeNNTxhFY_Lomar_logo_BW.png?auto=format,compress"
                                alt="Lomar Labs" loading="lazy">
                        </div>
                    </div>
                </div>
                <div class="--left home-part__marquee-wrapper">
                    <div class="home-part__marquee-item"
                        style="translate: none; rotate: none; scale: none; transform: translate(94.8822%, 0%) translate3d(0px, 0px, 0px);">
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/d28f665f-6a1c-4f93-99a8-1178ea6032f0_logo-17.svg"
                                alt="HAX" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/d36b9948-4831-412f-870d-b6a08d0851b9_logo-2.svg"
                                alt="ESA" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/7ce097ef-fb64-495d-9208-9247b2438233_logo-16.svg"
                                alt="Federal Ministry of Economic Affairs of Germany" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/bf8575a0-02b0-490a-8f43-116e4e8869ca_logo-6.svg"
                                alt="TUM" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/ec7cca82-2b5d-4530-a790-b1606c517ab0_logo-7.svg"
                                alt="Fraunhofer CML" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/95d511c0-def5-495a-87f6-ad95f5282600_logo-1.svg"
                                alt="Microsoft for Startup" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/f676e6d7-fc8e-484a-b035-2beda6906e02_logo-5.svg"
                                alt="KIC" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/f6149619-7c34-4f3f-b8cd-f4ea77a99250_logo.svg"
                                alt="Unternehmertum" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/42f66beb-ec0f-415d-a484-bfcd0b1d60a3_logo-4.svg"
                                alt="Digital hub Logistics" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/65cf5a139be9a5b998b5ed8d_IWSA-logo_grey_small.png?auto=format,compress"
                                alt="IWSA" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/ZhaHrTjCgu4jzueQ_Third_Derivative_Logo.webp?auto=format%2Ccompress&amp;rect=0%2C8%2C864%2C380&amp;w=900&amp;h=396"
                                alt="Third Derivative" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/ZqNoSh5LeNNTxhFY_Lomar_logo_BW.png?auto=format,compress"
                                alt="Lomar Labs" loading="lazy">
                        </div>
                    </div>
                    <div class="home-part__marquee-item"
                        style="translate: none; rotate: none; scale: none; transform: translate(94.8822%, 0%) translate3d(0px, 0px, 0px);">
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/d28f665f-6a1c-4f93-99a8-1178ea6032f0_logo-17.svg"
                                alt="HAX" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/d36b9948-4831-412f-870d-b6a08d0851b9_logo-2.svg"
                                alt="ESA" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/7ce097ef-fb64-495d-9208-9247b2438233_logo-16.svg"
                                alt="Federal Ministry of Economic Affairs of Germany" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/bf8575a0-02b0-490a-8f43-116e4e8869ca_logo-6.svg"
                                alt="TUM" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/ec7cca82-2b5d-4530-a790-b1606c517ab0_logo-7.svg"
                                alt="Fraunhofer CML" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/95d511c0-def5-495a-87f6-ad95f5282600_logo-1.svg"
                                alt="Microsoft for Startup" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/f676e6d7-fc8e-484a-b035-2beda6906e02_logo-5.svg"
                                alt="KIC" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/f6149619-7c34-4f3f-b8cd-f4ea77a99250_logo.svg"
                                alt="Unternehmertum" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://cargokite.cdn.prismic.io/cargokite/42f66beb-ec0f-415d-a484-bfcd0b1d60a3_logo-4.svg"
                                alt="Digital hub Logistics" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/65cf5a139be9a5b998b5ed8d_IWSA-logo_grey_small.png?auto=format,compress"
                                alt="IWSA" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/ZhaHrTjCgu4jzueQ_Third_Derivative_Logo.webp?auto=format%2Ccompress&amp;rect=0%2C8%2C864%2C380&amp;w=900&amp;h=396"
                                alt="Third Derivative" loading="lazy">
                        </div>
                        <div class="home-part__main-item">
                            <img src="https://images.prismic.io/cargokite/ZqNoSh5LeNNTxhFY_Lomar_logo_BW.png?auto=format,compress"
                                alt="Lomar Labs" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

<?php
    endif;
 ?>