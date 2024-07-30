<?php

/**
 * Template Name: Contact
 */

get_header();

if (have_posts()) :

    while (have_posts()) : the_post();

?>

        <!-- Page banner -->
        <?php include(locate_template('template-parts/parts/short_banner.php', false, false)); ?>

        <!-- Fields -->
        <?php
        $section_heading = get_field('section_heading');
        if (have_rows('offices')) :

        ?>

            <section class="contact-block tab-section-block py-[6.25rem] max-md:py-12  fade-in ">
                <div class="max-container">
                    <div class="flex gap-14 max-md:gap-10 flex-col mb-14 max-md:mb-0  lg:w-max max-6xl:pl-16 max-xl:pl-5">
                        <!-- Section Heading -->
                        <?php if ($section_heading) : ?>
                            <h2 class="text-6xl leading-[4rem] max-xl:text-[4rem] max-xl:leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem] font-medium capitalize">
                                <?= $section_heading; ?>
                            </h2>
                        <?php endif; ?>

                        <div class="flex flex-col lg:w-max ">
                            <div class="flex flex-col grow ">
                                <div class="free-slider flex gap-3 justify-between items-start   text-base text-center  max-md:mb-4 max-xxl:gap-3 max-xxl:text-[0.875rem] ">
                                    <div class="swiper-wrapper  w-max  border border-black/10 p-2 rounded-md max-md:border-r-0 max-md:rounded-r-none">

                                        <?php
                                        $keyCount = 0;
                                        while (have_rows('offices')) : the_row();
                                            $itemsCount = count(get_sub_field('location'));
                                            $type_of_office = get_sub_field('type_of_office');
                                            if ($type_of_office) :
                                        ?>

                                                <div class="swiper-slide last:!m-0 w-max flex justify-between  hover:cursor-pointer  relative p-3 rounded-md  transition-colors duration-700  <?= ($keyCount == 0) ? 'active' : ''; ?> group [&.active]:bg-darkblue [&.active]:text-white  max-md:after:!w-0 hover:bg-darkblue hover:text-white">
                                                    <h3 class="flex-1 my-auto font-medium capitalize leading-[120%]"><?= $type_of_office; ?></h3>
                                                    <div class="flex justify-center items-center p-2.5 bg-orange h-[1.875rem] leading-[130%]  w-[1.875rem] transition-colors duration-700 rounded-full group-[&.active]:text-black ml-2.5">
                                                        <?= $itemsCount; ?>
                                                    </div>
                                                </div>

                                        <?php endif;
                                            $keyCount++;
                                        endwhile; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="map-address-block  mt-14 max-md:mt-2 max-6xl:pl-16 max-xl:pl-5 max-md:pl-0" id="map_contact">
                        <div class="tab-content max-lg:mb-5 max-md:mb-0 fade-in">
                            <div class="swiper-wrapper">

                                <?php if (have_rows('offices')) :
                                    while (have_rows('offices')) : the_row(); ?>
                                        <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700">
                                            <?php if (have_rows('location')) : ?>
                                                <div class="address-item flex h-[47rem] max-md:h-full">
                                                    <div class="col accordion-block locations w-[54%] max-md:w-full h-full bg-aliceblue overflow-scroll">

                                                        <?php while (have_rows('location')) : the_row();
                                                            $name = get_sub_field('name');
                                                            $address = get_sub_field('address');
                                                            $phone = get_sub_field('phone');
                                                            $email = get_sub_field('email');
                                                            $image = get_sub_field('image');
                                                            $latitude = get_sub_field('latitude');
                                                            $longitude = get_sub_field('longitude');
                                                            if ($name || $address || $phone || $email || $image) :
                                                        ?>
                                                                <div data-lat="<?= $latitude; ?>" data-lng="<?= $longitude; ?>" class="location-item  accordion-item  relative  py-6 px-9 max-sl:p-5  border-b-[1px] border-black/10 last:border-none md:[&.active]:border-none duration-700 transition-all [&.active]:bg-lightblue  group max-md:bg-lightblue">

                                                                    <?php if ($name) : ?>
                                                                        <div class="top-bar flex gap-5 cursor-pointer  group-[&.active]:pointer-events-none max-md:pointer-events-none">
                                                                            <div class="arrow rounded-full border border-black/20 text-black text-[0.5rem] w-8 h-8 flex items-center justify-center max-md:hidden">
                                                                                <span class="icon-arrow-down  group-[&.active]:rotate-180 transition-all duration-700"></span>
                                                                            </div>
                                                                            <h3 class="text-3xl max-md:text-xl block capitalize"><?= $name; ?></h3>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if ($address || $phone || $email || $image) : ?>
                                                                        <div class="location-detail md:hidden sl:-mt-8 accordion-content  md:pl-[3.4rem] ">
                                                                            <?php if ($image) : ?>
                                                                                <div class="image  mt-5  w-[8.3rem] h-[8.3rem] flex-none sl:hidden">
                                                                                    <img loading="lazy" class="object-cover size-full  !m-0" src="<?= wp_get_attachment_image_url($image, 'full') ?>" alt="FPI">
                                                                                </div>
                                                                            <?php endif; ?>

                                                                            <div class="flex justify-between ">
                                                                                <div class="details mt-12 max-sl:mt-5 prose prose-strong:opacity-40 prose-strong:font-normal prose-h4:text-xl max-md:prose-h4:text-base prose-h4:font-normal prose-h4:mb-5 prose-p:mb-0 prose-p:mt-0 prose-p:font-normal max-md:prose-p:text-[0.875rem] prose-a:cursor-pointer">

                                                                                    <h4><?= $address; ?></h4>

                                                                                    <?php if ($phone) : ?>
                                                                                        <p><strong>Phone:</strong> <a href="tel:<?= $phone; ?>"><?= $phone; ?></a></p>
                                                                                    <?php endif; ?>

                                                                                    <?php if ($email) : ?>
                                                                                        <p><strong>Email:</strong> <a href="mailto:<?= $email; ?>"><?= $email; ?></a></p>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                                <?php if ($image) : ?>
                                                                                    <div class="image  w-[8.3rem] h-[8.3rem] flex-none max-sl:hidden">
                                                                                        <img loading="lazy" class="object-cover size-full  !m-0" src="<?= wp_get_attachment_image_url($image, 'full') ?>" alt="FPI">
                                                                                    </div>
                                                                                <?php endif; ?>

                                                                            </div>

                                                                        </div>
                                                                    <?php endif; ?>

                                                                </div>
                                                        <?php endif;
                                                        endwhile; ?>

                                                    </div>

                                                    <div class="col map w-[46%] h-full max-md:hidden">
                                                        <div class="h-full map_contact">


                                                        </div>
                                                        <div class="map-coordinates hidden">
                                                            <?php while (have_rows('location')) : the_row();
                                                                $latitude = get_sub_field('latitude');
                                                                $longitude = get_sub_field('longitude');
                                                            ?>
                                                                <div class="coordinates" data-lat="<?= $latitude; ?>" data-lng="<?= $longitude; ?>">
                                                                </div>
                                                            <?php endwhile; ?>
                                                        </div>

                                                    </div>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php
        endif;
?>

            <!-- Modules -->
            <?php include(locate_template('template-parts/modules.php', false, false)); ?>
<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>