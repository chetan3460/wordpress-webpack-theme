<?php
$subtitle = get_sub_field('subtitle');
$heading = get_sub_field('heading');
$case_studies_items = get_sub_field('case_studies_items');

// Hiding and cosmetics/styles
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($case_studies_items && !$hide_block) :

?>
    <section class="py-[6.25rem] px-16 max-xl:px-5 max-md:py-12  max-container fade-in case-studies-block_v1"
        style="
    <?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px;<?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">


        <div class=" lg:flex block -mr-[0.063rem]">
            <div
                class=" sticky-sidebar block xxl:w-[33%] max-3xl:w-[calc(25%+1px)] max-lg:w-full  p-16 max-3xl:p-12 max-lg:p-0 max-lg:pb-14 border  border-light-border max-lg:border-0 -mb-[1px]">

                <?php if ($subtitle || $heading) : ?>
                    <div class=" column two w-full min-w-[33%] sticky top-[7rem]">

                        <?php if ($subtitle) : ?>
                            <div
                                class=" text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem] text-[#7B7B7B] upp ">
                                <?= $subtitle; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($heading) : ?>
                            <h3
                                class=" text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize   pb-10">
                                <?= $heading; ?>
                            </h3>
                        <?php endif; ?>

                        <div class="">
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
            <div class=" 3xl:w-[75%] xxl:w-[67%]  max-lg:w-full -mx-[1px]">
                <div class="">

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

                        <article class=" group">
                            <div
                                class=" relative flex border border-light-border -mb-[1px]  sm:group-odd:flex-row-reverse  max-sm:flex-col group">

                                <!-- Image -->
                                <div
                                    class=" relative overflow-hidden self-center sm:w-[calc(50%+1px)] w-full transition duration-500 scale-100 before:absolute before:inset-0 before:z-10 before:rounded-inherit before:transition-all before:duration-500 before:ease-in-out after:absolute after:inset-0 after:z-10 after:rounded-inherit after:transition-all after:duration-500 after:ease-in-out transition-all duration-500 ease-in-out">
                                    <div
                                        class=" 3xl:scale-[0.85] lg:scale-[0.816] scale-[1] transition duration-1000 ease-in-out group-hover:scale-[1]">
                                        <img data-src="<?= $case_image_thumbnail['url'] ?>" alt="" class="lazy-image">
                                    </div>
                                    <!-- <a href="https://wgl-dsites.net/motto/portfolio/eye-vision-agency/"
                                class="single_link portfolio_link"></a> -->
                                </div>
                                <?php if ($case_title || $case_description) : ?>
                                    <!-- Description -->
                                    <div
                                        class=" sm:w-[calc(50%+1px)] w-full lg:p-11 p-6 relative z-10 flex flex-col justify-between	sm:group-odd:border-r-light-border sm:group-odd:border-light-border  sm:border-l-0 group-even:border-l-light-border group-odd:-mr-[1px] group-even:-ml-[1px] gap-10">

                                        <div class="">

                                            <div class="post_cats text-base font-medium  text-[#7B7B7B] uppercase">
                                                <a href=https://wgl-dsites.net/motto/portfolio-category/design/
                                                    class="portfolio-category inline-block transition after:inline-block  after:content-['-'] after:mx-1 whitespace-normal">design</a>
                                                <a href=https://wgl-dsites.net/motto/portfolio-category/development/
                                                    class="portfolio-category  last:after:hidden   ">development</a>
                                            </div>

                                            <!-- Title -->
                                            <?php if ($case_title) : ?>
                                                <div class=" ">
                                                    <h5
                                                        class="title lg:text-5xl md:text-[2.1rem] text-[1.9rem] font-medium md:my-5 my-3">
                                                        <?= $case_title; ?>
                                                    </h5>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Description -->
                                            <?php if ($case_description) : ?>
                                                <div class=" lg:text-xl text-[1rem] font-medium  mt-6 text-black">
                                                    <div class="content"> <?= $case_description; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                        <div class="">

                                            <div class="">
                                                <a href="https://wgl-dsites.net/motto/portfolio/eye-vision-agency/"
                                                    class="single_link prose   prose-a:text-[#ababab] group">
                                                    <svg class="w-[40px] h-[40px] fill-[#ababab] rotate-[-45deg]   transition-colors duration-1000 ease-in-out group-hover:rotate-0 group-hover:fill-[#012555] transition-transform  " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                        <path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z" />
                                                    </svg>

                                                </a>
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