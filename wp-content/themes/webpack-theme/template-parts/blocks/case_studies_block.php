<?php
$subtitle = get_sub_field('subtitle');
$heading = get_sub_field('heading');
$case_studies_items = get_sub_field('case_studies_items');

// Hiding and cosmetics/styles
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($case_studies_items && !$hide_block) :

?>
<section class="py-[6.25rem] px-16 max-xl:px-5 max-md:py-12  max-container fade-in "
    style="
    <?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px;<?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">


    <div class="wgl-portfolio portfolio_header-inline lg:flex block -mr-[0.063rem]" id="portfolio_module_668d106aad6e6">
        <div
            class="wgl-portfolio_header sticky-sidebar  bd-position-sticky block xxl:w-[33%] max-3xl:w-[calc(25%+1px)] max-lg:w-full  p-16 max-3xl:p-12 max-lg:p-0 max-lg:pb-14 border  border-black max-lg:border-0">

            <?php if ($subtitle || $heading) : ?>
            <div class="item_title column two w-full min-w-[33%]">

                <?php if ($subtitle) : ?>
                <div
                    class="portfolio_subtitle text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem] text-[#7B7B7B]">
                    <?= $subtitle; ?>
                </div>
                <?php endif; ?>

                <?php if ($heading) : ?>
                <h3
                    class="portfolio_title text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize   pb-10">
                    <?= $heading; ?>
                </h3>
                <?php endif; ?>

                <div class="portfolio_header-button">
                    <a href="http://localhost/wordpress-webpack-theme/news-events-2/" target="_self"
                        class="primary-btn home-part__btn">
                        <span class="btn-text"><span>VIEW ALL PROJECTS</span></span>
                        <span class="btn-arrow">
                            <span><span class="icon-arrow-right"></span></span>
                        </span>
                    </a>
                </div>

            </div>
            <?php endif; ?>

        </div>
        <div class="wgl-portfolio_wrapper 3xl:w-[75%] xxl:w-[67%]  max-lg:w-full -mx-[1px]">
            <div class="wgl-portfolio_container container-grid row grid-2">

                <?php foreach ($case_studies_items as $key => $item) {
                        // $link = $item['link'];
                        $case_title = $item['case_title'];
                        $case_description = $item['case_description'];
                        $case_image_thumbnail = $item['case_image'];
                        // $item_link = $item['item_link']; // Get the item link from ACF

                        if (!$case_image_thumbnail) {
                            $case_image_thumbnail = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                        }
                    ?>

                <article class="portfolio__item item design development  group">
                    <div
                        class="item__wrapper relative flex border border-black -mb-[1px]  sm:group-odd:flex-row-reverse  max-sm:flex-col group">

                        <!-- Image -->
                        <div
                            class="item__image relative overflow-hidden self-center sm:w-[calc(50%+1px)] w-full transition duration-500 scale-100 before:absolute before:inset-0 before:z-10 before:rounded-inherit before:transition-all before:duration-500 before:ease-in-out after:absolute after:inset-0 after:z-10 after:rounded-inherit after:transition-all after:duration-500 after:ease-in-out transition-all duration-500 ease-in-out">
                            <div
                                class="item__image-wrap 3xl:scale-[0.85] lg:scale-[0.816] scale-[1] transition duration-1000 ease-in-out group-hover:scale-[1]">
                                <img data-src="<?= $case_image_thumbnail['url'] ?>" alt="" class="lazy-image">
                            </div>
                            <!-- <a href="https://wgl-dsites.net/motto/portfolio/eye-vision-agency/"
                                class="single_link portfolio_link"></a> -->
                        </div>
                        <?php if ($case_title || $case_description) : ?>
                        <!-- Description -->
                        <div
                            class="item__description sm:w-[calc(50%+1px)] w-full lg:p-11 p-6 relative z-10 flex flex-col justify-between	sm:group-odd:border-r-black sm:group-odd:border sm:border-l-0 group-even:border-l-black group-odd:-mr-[1px] group-even:-ml-[1px] gap-10">

                            <div class="description__wrapper">

                                <div class="post_cats text-base font-medium  text-[#7B7B7B] uppercase">
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/design/
                                        class="portfolio-category inline-block transition after:inline-block  after:content-['-'] after:mx-1 whitespace-normal">design</a>
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/development/
                                        class="portfolio-category  last:after:hidden   ">development</a>
                                </div>

                                <!-- Title -->
                                <?php if ($case_title) : ?>
                                <div class=" item__title">
                                    <h5
                                        class="title lg:text-5xl md:text-[2.1rem] text-[1.9rem] font-medium md:my-5 my-3">
                                        <?= $case_title; ?>
                                    </h5>
                                </div>
                                <?php endif; ?>

                                <!-- Description -->
                                <?php if ($case_description) : ?>
                                <div class="description_content lg:text-xl text-[1rem] font-medium  mt-6 text-black">
                                    <div class="content"> <?= $case_description; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>

                            <div class="description__footer">

                                <div class="item__button">
                                    <a href="https://wgl-dsites.net/motto/portfolio/eye-vision-agency/"
                                        class="single_link"></a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                </article>
                <?php } ?>




            </div>
        </div>
    </div>


</section>
<?php endif; ?>