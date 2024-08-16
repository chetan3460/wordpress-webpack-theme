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

<section class="home-part  max-container fade-in  w-full  partner-slider pb-[6.25rem]">
    <div class="">
        <div class="home-part__head  py-[6.25rem] px-16 max-xl:px-5 max-md:py-12">
            <div
                class="home-part__label text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem] text-[#7B7B7B]">
                Investors & Supporters </div>
            <h2
                class=" heading home-part__title text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize   pb-10">
                Trusted by top<br>Partners & Supporters
            </h2>

            <a href="http://localhost/wordpress-webpack-theme/news-events-2/" target="_self"
                class="primary-btn home-part__btn mt-5">
                <span class="btn-text"><span>Explore All</span></span>
                <span class="btn-arrow">
                    <span><span class="icon-arrow-right"></span></span>
                </span>
            </a>

        </div>
    </div>
    <div class="home-part__main home-part__main-supporters w-full block flex-nowrap">
        <div class="home-part__marquee w-full overflow-hidden block ">
            <div
                class="--right home-part__marquee-wrapper flex items-stretch flex-nowrap will-change-transform justify-start -mb-[2px]">
                <div class="home-part__marquee-item flex items-stretch justify-start flex-nowrap">
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://images.prismic.io/cargokite/65cf5a139be9a5b998b5ed8d_IWSA-logo_grey_small.png?auto=format,compress"
                            alt="HAX logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://images.prismic.io/cargokite/ZhaHrTjCgu4jzueQ_Third_Derivative_Logo.webp?auto=format%2Ccompress&rect=0%2C8%2C864%2C380&w=900&h=396"
                            alt="ESA logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/42f66beb-ec0f-415d-a484-bfcd0b1d60a3_logo-4.svg"
                            alt="Federal Ministry of Economic Affairs of Germany logo" loading="lazy" width="229"
                            height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4]  -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/42f66beb-ec0f-415d-a484-bfcd0b1d60a3_logo-4.svg"
                            alt="TUM logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://images.prismic.io/cargokite/ZqNoSh5LeNNTxhFY_Lomar_logo_BW.png?auto=format,compress"
                            alt="Fraunhofer CML logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/d28f665f-6a1c-4f93-99a8-1178ea6032f0_logo-17.svg"
                            alt="Microsoft for Startup logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/7ce097ef-fb64-495d-9208-9247b2438233_logo-16.svg"
                            alt="KIC logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/bf8575a0-02b0-490a-8f43-116e4e8869ca_logo-6.svg"
                            alt="Unternehmertum logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/ec7cca82-2b5d-4530-a790-b1606c517ab0_logo-7.svg"
                            alt="Digital hub Logistics logo" loading="lazy" width="229" height="129">
                    </div>
                </div>
            </div>
            <div
                class="--left home-part__marquee-wrapper flex items-stretch flex-nowrap will-change-transform justify-start  justify-end ">
                <div class="home-part__marquee-item flex items-stretch justify-start flex-nowrap">
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://images.prismic.io/cargokite/65cf5a139be9a5b998b5ed8d_IWSA-logo_grey_small.png?auto=format,compress"
                            alt="HAX logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://images.prismic.io/cargokite/ZhaHrTjCgu4jzueQ_Third_Derivative_Logo.webp?auto=format%2Ccompress&rect=0%2C8%2C864%2C380&w=900&h=396"
                            alt="ESA logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/42f66beb-ec0f-415d-a484-bfcd0b1d60a3_logo-4.svg"
                            alt="Federal Ministry of Economic Affairs of Germany logo" loading="lazy" width="229"
                            height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/42f66beb-ec0f-415d-a484-bfcd0b1d60a3_logo-4.svg"
                            alt="TUM logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="lhttps://images.prismic.io/cargokite/ZqNoSh5LeNNTxhFY_Lomar_logo_BW.png?auto=format,compress"
                            alt="Fraunhofer CML logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/d28f665f-6a1c-4f93-99a8-1178ea6032f0_logo-17.svg"
                            alt="Microsoft for Startup logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/7ce097ef-fb64-495d-9208-9247b2438233_logo-16.svg"
                            alt="KIC logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/bf8575a0-02b0-490a-8f43-116e4e8869ca_logo-6.svg"
                            alt="Unternehmertum logo" loading="lazy" width="229" height="129">
                    </div>
                    <div
                        class="mb-0 home-part__main-item border border-[#cfd3d4] -mr-[1px] py-[2.8rem] px-[1.9rem] w-[30rem]">
                        <img src="https://cargokite.cdn.prismic.io/cargokite/ec7cca82-2b5d-4530-a790-b1606c517ab0_logo-7.svg"
                            alt="Digital hub Logistics logo" loading="lazy" width="229" height="129">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="wgl_cpt_section case-studies-block py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 max-container">
    <div class="wgl-portfolio portfolio_header-inline lg:flex block -mr-[0.063rem]" id="portfolio_module_668d106aad6e6">
        <div
            class="wgl-portfolio_header sticky-sidebar  bd-position-sticky block xxl:w-[33%] max-3xl:w-[calc(25%+1px)] max-lg:w-full  p-16 max-3xl:p-12 max-lg:p-0 max-lg:pb-14 border  border-black max-lg:border-0">
            <div class="item_title column two w-full min-w-[33%]">
                <div class="">
                    <div class="c-button">
                        <div
                            class="portfolio_subtitle text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem] text-[#7B7B7B]">
                            (LATEST WORKS)</div>
                        <h3
                            class="portfolio_title text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize   pb-10">
                            Our Cases</h3>
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
                </div>

            </div>
        </div>
        <div class="wgl-portfolio_wrapper 3xl:w-[75%] xxl:w-[67%]  max-lg:w-full -mx-[1px]">
            <div class="wgl-portfolio_container container-grid row grid-2">

                <article class="portfolio__item item design development  group">
                    <div
                        class="item__wrapper relative flex border border-black -mb-[1px] sm:group-odd:flex-row-reverse sm:group-even:flex-row-reverse   flex-col group">
                        <div
                            class="item__image relative overflow-hidden self-center sm:w-[calc(50%+1px)] w-full transition duration-500 scale-100 before:absolute before:inset-0 before:z-10 before:rounded-inherit before:transition-all before:duration-500 before:ease-in-out after:absolute after:inset-0 after:z-10 after:rounded-inherit after:transition-all after:duration-500 after:ease-in-out transition-all duration-500 ease-in-out">
                            <div
                                class="item__image-wrap 3xl:scale-[0.85] lg:scale-[0.816] scale-[1] transition duration-1000 ease-in-out group-hover:scale-[1]">
                                <img class="" decoding="async"
                                    src="https://wgl-dsites.net/motto/wp-content/uploads/2023/12/portfolio-s2-1290x1290.jpg"
                                    alt="">
                            </div>
                            <a href="https://wgl-dsites.net/motto/portfolio/eye-vision-agency/"
                                class="single_link portfolio_link"></a>
                        </div>
                        <div
                            class="item__description sm:w-[calc(50%+1px)] w-full lg:p-11 p-6 relative z-10 flex flex-col justify-between	sm:group-odd:border-r-black sm:group-odd:border sm:border-l-0 group-even:border-l-black group-odd:-mr-[1px] group-even:-ml-[1px] gap-10">
                            <div class="description__wrapper">
                                <div class="post_cats text-base font-medium  text-[#7B7B7B] uppercase">
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/design/
                                        class="portfolio-category inline-block transition after:inline-block  after:content-['-'] after:mx-1 whitespace-normal">design</a>
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/development/
                                        class="portfolio-category  last:after:hidden   ">development</a>
                                </div>
                                <div class=" item__title">
                                    <h5
                                        class="title lg:text-5xl md:text-[2.1rem] text-[1.9rem] font-medium md:my-5 my-3">
                                        <a href="https://wgl-dsites.net/motto/portfolio/eye-vision-agency/"
                                            class="single_link">Eye Vision Agency</a>
                                    </h5>
                                </div>
                                <div class="description_content lg:text-xl text-[1rem] font-medium  mt-6 text-black">
                                    <div class="content">Company branding goes beyond just a logo; it encompasses the
                                        values, personality,</div>
                                </div>
                            </div>
                            <div class="description__footer">

                                <div class="item__button">
                                    <a href="https://wgl-dsites.net/motto/portfolio/eye-vision-agency/"
                                        class="single_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="portfolio__item item development marketing group">
                    <div
                        class="item__wrapper flex border border-black -mb-[1px] sm:group-odd:flex-row-reverse sm:group-even:flex-row-reverse flex-col group">
                        <div
                            class="item__image relative overflow-hidden self-center sm:w-[calc(50%+1px)] w-full transition duration-500 scale-100 before:absolute before:inset-0 before:z-10 before:rounded-inherit before:transition-all before:duration-500 before:ease-in-out after:absolute after:inset-0 after:z-10 after:rounded-inherit after:transition-all after:duration-500 after:ease-in-out transition-all duration-500 ease-in-out">
                            <div
                                class="item__image-wrap 3xl:scale-[0.85] xxl:scale-[0.816] scale-[1] transition duration-1000 ease-in-out group-hover:scale-[1]">
                                <img class="duration-500" decoding="async"
                                    src="https://wgl-dsites.net/motto/wp-content/uploads/2023/12/portfolio-s3-1290x1290.jpg"
                                    alt="">
                            </div>
                            <a href="https://wgl-dsites.net/motto/portfolio/company-branding/"
                                class="single_link portfolio_link"></a>
                        </div>
                        <div
                            class="item__description sm:w-[calc(50%+1px)] w-full p-11 relative z-10 flex flex-col content-between border-r-black   sm:group-even:border-l group-even:border-l-black -mr-[1px] gap-10 sm:group-even:-ml-[1px]">
                            <div class="description__wrapper">
                                <div class="post_cats">
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/development/
                                        class="portfolio-category">development</a>
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/marketing/
                                        class="portfolio-category">marketing</a>
                                </div>
                                <div class="item__title">
                                    <h5 class="title">
                                        <a href="https://wgl-dsites.net/motto/portfolio/company-branding/"
                                            class="single_link">Company Branding</a>
                                    </h5>
                                </div>
                                <div class="description_content">
                                    <div class="content">Company branding goes beyond just a logo; it encompasses the
                                        values, personality,</div>
                                </div>
                            </div>
                            <div class="description__footer">
                                <div class="item__date">
                                    <span class="item__date-title">DATE:</span>
                                    <span class="item__date-date">December 27, 2023</span>
                                </div>
                                <div class="item__button">
                                    <a href="https://wgl-dsites.net/motto/portfolio/company-branding/"
                                        class="single_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- <article class="portfolio__item item marketing photography group">
                    <div
                        class="item__wrapper flex border border-black -mb-[1px] md:group-odd:flex-row-reverse flex-col ">
                        <div
                            class="item__image relative overflow-hidden self-center w-[calc(50%+1px)] transition duration-500 scale-100">
                            <div class="item__image-wrap">
                                <img decoding="async"
                                    src="https://wgl-dsites.net/motto/wp-content/uploads/2023/12/portfolio-s10-1290x1290.jpg"
                                    alt="">
                            </div>
                            <a href="https://wgl-dsites.net/motto/portfolio/slow-motion/"
                                class="single_link portfolio_link"></a>
                        </div>
                        <div class="item__description w-[calc(50%+1px)]">
                            <div class="description__wrapper">
                                <div class="post_cats">
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/marketing/
                                        class="portfolio-category">marketing</a>
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/photography/
                                        class="portfolio-category">photography</a>
                                </div>
                                <div class="item__title">
                                    <h5 class="title">
                                        <a href="https://wgl-dsites.net/motto/portfolio/slow-motion/"
                                            class="single_link">Slow Motion</a>
                                    </h5>
                                </div>
                                <div class="description_content">
                                    <div class="content">Company branding goes beyond just a logo; it encompasses the
                                        values, personality,</div>
                                </div>
                            </div>
                            <div class="description__footer">
                                <div class="item__date">
                                    <span class="item__date-title">DATE:</span>
                                    <span class="item__date-date">January 3, 2024</span>
                                </div>
                                <div class="item__button">
                                    <a href="https://wgl-dsites.net/motto/portfolio/slow-motion/"
                                        class="single_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="portfolio__item item design development">
                    <div class="item__wrapper flex border border-black -mb-[1px]">
                        <div
                            class="item__image relative overflow-hidden self-center w-[calc(50%+1px)] transition duration-500 scale-100">
                            <div class="item__image-wrap">
                                <img decoding="async"
                                    src="https://wgl-dsites.net/motto/wp-content/uploads/2023/12/portfolio-s13-1290x1290.jpg"
                                    alt="">
                            </div>
                            <a href="https://wgl-dsites.net/motto/portfolio/product-design/"
                                class="single_link portfolio_link"></a>
                        </div>
                        <div class="item__description">
                            <div class="description__wrapper">
                                <div class="post_cats">
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/design/
                                        class="portfolio-category">design</a>
                                    <a href=https://wgl-dsites.net/motto/portfolio-category/development/
                                        class="portfolio-category">development</a>
                                </div>
                                <div class="item__title">
                                    <h5 class="title">
                                        <a href="https://wgl-dsites.net/motto/portfolio/product-design/"
                                            class="single_link">Product Design</a>
                                    </h5>
                                </div>
                                <div class="description_content">
                                    <div class="content">Company branding goes beyond just a logo; it encompasses the
                                        values, personality,</div>
                                </div>
                            </div>
                            <div class="description__footer">
                                <div class="item__date">
                                    <span class="item__date-title">DATE:</span>
                                    <span class="item__date-date">January 3, 2024</span>
                                </div>
                                <div class="item__button">
                                    <a href="https://wgl-dsites.net/motto/portfolio/product-design/"
                                        class="single_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article> -->
            </div>
        </div>
    </div>
</section>
<?php
    endif;
 ?>