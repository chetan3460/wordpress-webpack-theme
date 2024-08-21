    <div class="push"></div> <!-- Push div for making fixed footer -->

    </div> <!-- closing of wrapper div from header_top.php -->


    <?php
    // Question and Social Network
    $footer_logo = get_field('footer_logo', 'option');
    $question = get_field('question', 'option');
    $follow = get_field('follow_us', 'option');
    ?>

    <footer class="pt-[6.25rem] pb-[3.75rem] px-16 max-xl:px-5 max-md:pt-12 max-md:pb-12 bg-darkblue ">
        <div class="max-container">
            <?php
            if ($question || $follow) :
            ?>
                <!-- Question and follow block -->
                <div class="flex gap-[1.875rem] max-lg:flex-col">
                    <!-- Question block -->
                    <?php if ($question) :
                        $question_subtitle = $question['sub_title'];
                        $heading = $question['heading'];
                        $question_btn = $question['action_button'];
                        if (!empty($question_btn)) {
                            $question_target = $question_btn['target'] ? $question_btn['target'] : '_self';
                        }
                        if ($question_subtitle || $heading) :
                    ?>
                            <div class="flex flex-col w-6/12 max-lg:w-full">
                                <div class="flex flex-col grow px-8 py-9 max-md:p-5 w-full bg-white bg-opacity-10">
                                    <?php if ($question_subtitle) : ?>
                                        <p class="text-base leading-4 text-white uppercase"><?= $question_subtitle; ?></p>
                                    <?php endif; ?>
                                    <?php if ($heading || $question_btn) : ?>
                                        <div class="flex gap-5 justify-between mt-4 w-full max-md:flex-col">
                                            <?php if ($heading) : ?>
                                                <h3 class="my-auto text-3xl max-md:text-2xl font-medium leading-9 text-white capitalize"><?= $heading; ?></h3>
                                            <?php endif; ?>
                                            <?php if ($question_btn) : ?>
                                                <div class="flex gap-1.5">
                                                    <a href="<?= $question_btn['url']; ?>" class="primary-btn white">
                                                        <span class="btn-text"><span><?= $question_btn['title']; ?></span></span>
                                                        <span class="btn-arrow">
                                                            <span><span class="icon-arrow-right"></span></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                    <?php endif;
                    endif; ?>

                    <!-- Follow block -->
                    <?php if ($follow) :
                        $follow_subtitle = $follow['sub_title'];
                        $heading = $follow['heading'];
                        $social_links = $follow['social_links'];
                        $instagram = $social_links['instagram'];
                        $facebook = $social_links['facebook'];
                        $linkedin = $social_links['linkedin'];
                        $twitter = $social_links['twitter'];
                        if ($follow_subtitle || $heading) :
                    ?>
                            <div class="flex flex-col w-6/12 max-lg:w-full">

                                <div class="flex flex-col grow px-8 py-9 max-md:p-5 w-full bg-white bg-opacity-10">
                                    <?php if ($follow_subtitle) : ?>
                                        <p class="text-base leading-4 text-white uppercase"><?= $follow_subtitle; ?></p>
                                    <?php endif; ?>
                                    <?php if ($heading || $social_links) : ?>
                                        <div class="flex gap-5 justify-between mt-4 w-full max-md:flex-col">

                                            <?php if ($heading) : ?>
                                                <h3 class="my-auto text-3xl max-md:text-2xl font-medium leading-9 text-white capitalize"><?= $heading; ?></h3>
                                            <?php endif; ?>

                                            <?php if ($social_links) : ?>
                                                <div class="flex gap-[1.125rem] py-0.5 text-white">
                                                    <?php if ($instagram) : ?>
                                                        <a aria-label="Instagram" href="<?= $instagram ?>" target="_blank" class="flex justify-center items-center p-2.5 bg-white bg-opacity-20 h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:bg-white hover:text-darkblue">
                                                            <span class="icon-instagram"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($facebook) : ?>
                                                        <a aria-label="facebook" href="<?= $facebook ?>" target="_blank" class="flex justify-center items-center p-2.5 bg-white bg-opacity-20 h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:bg-white hover:text-darkblue">
                                                            <span class="icon-facebook"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($linkedin) : ?>
                                                        <a aria-label="linkedin" href="<?= $linkedin ?>" target="_blank" class="flex justify-center items-center p-2.5 bg-white bg-opacity-20 h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:bg-white hover:text-darkblue">
                                                            <span class="icon-linkedin"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($twitter) : ?>
                                                        <a aria-label="twitter" href="<?= $twitter ?>" target="_blank" class="flex justify-center items-center p-2.5 bg-white bg-opacity-20 h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:bg-white hover:text-darkblue">
                                                            <span class="icon-twitter"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div><!-- Follow block ends -->
                    <?php endif;
                    endif; ?>

                </div>
            <?php endif; ?>
            <!-- Question and follow block ends -->

            <!-- Navigation -->
            <?php if (has_nav_menu('footer-menu_1') || has_nav_menu('footer-menu_2') || has_nav_menu('footer-menu_3') || has_nav_menu('footer-menu_4')) : ?>
                <div class="flex gap-5 justify-between mt-20 max-md:flex-col">
                    <div class="flex flex-col  w-[38rem] max-lg:w-full">

                        <h2 class="text-3xl max-md:text-2xl font-medium leading-9 text-white capitalize mb-12 max-md:mb-10">Quick Links</h2>

                        <div class="block">
                            <div class="flex md:gap-5 max-lg:flex-col">
                                <!-- Menu1 -->
                                <?php if (has_nav_menu('footer-menu_1')) :
                                    $theme_location = 'footer-menu_1';
                                ?>
                                    <div class="flex flex-col w-[33%] max-lg:w-full">
                                        <?php
                                        echo transient_footerMenu($theme_location);
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Menu 1 ends -->
                                <!-- Menu2 -->
                                <?php if (has_nav_menu('footer-menu_2')) :
                                    $theme_location = 'footer-menu_2';
                                ?>
                                    <div class="flex flex-col  w-[33%] max-lg:w-full">
                                        <?php
                                        echo transient_footerMenu($theme_location);
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Menu 2 ends -->

                                <!-- Menu3-->
                                <?php if (has_nav_menu('footer-menu_3')) :
                                    $theme_location = 'footer-menu_3';
                                ?>
                                    <div class="flex flex-col  w-[33%] max-lg:w-full">
                                        <?php
                                        echo transient_footerMenu($theme_location);
                                        ?>
                                    </div>
                                    <!-- Menu 3 ends -->
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <div class="block max-lg:w-full max-md:mt-10">
                        <!-- Menu3-->
                        <?php if (has_nav_menu('footer-menu_4')) :
                            $theme_location = 'footer-menu_4';
                        ?>

                            <h2 class="text-3xl max-md:text-2xl font-medium leading-9 capitalize text-white mb-12 max-md:mb-10"><?php _e(wp_get_nav_menu_name($theme_location)); ?></h2>
                            <?= transient_footerMenu($theme_location); ?>

                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

            <!-- Copyright -->
            <?php
            $footer_logo = get_field('footer_logo', 'option');
            $terms = get_field('terms', 'option');
            $policy = get_field('policy', 'option');
            if (!empty($terms)) {
                $terms_target = $terms['target'] ? $terms['target'] : '_self';
            }
            if (!empty($policy)) {
                $policy_target = $policy['target'] ? $policy['target'] : '_self';
            }
            if (!empty($terms) || !empty($policy)) :
            ?>
                <div class="flex max-sl:flex-col max-sl:gap-10 gap-5 justify-between sl:items-end  mt-[12.5rem] max-md:mt-20 text-sm leading-4 text-white">

                    <ul class="mt-16 flex gap-4 sl:hidden max-sl:mt-0">
                        <?php if (!empty($terms)) : ?>
                            <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-['']"><a href="<?= $terms['url'] ?>" target="<?= $terms_target; ?>"><?= $terms['title']; ?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($policy)) : ?>
                            <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-['']"><a href="<?= $policy['url'] ?>" target="<?= $policy_target; ?>"><?= $policy['title']; ?></a></li>
                        <?php endif; ?>
                    </ul>
                    <?php if ($footer_logo) : ?>
                        <a href="<?= get_home_url(); ?>"><img loading="lazy" src="<?= $footer_logo; ?>" alt="<?php bloginfo('name'); ?>" class="shrink-0 self-stretch max-w-full aspect-[1.85] w-[8.75rem]  !opacity-100"></a>
                    <?php endif; ?>
                    <p class="mt-16 sl:text-right max-sl:mt-0">© <?php echo date("Y"); ?> Future Pipe Industries &nbsp;|&nbsp; All Rights Reserved</p>

                    <ul class="mt-16 flex gap-4 max-sl:hidden max-sl:mt-0 prose-a:transition-all prose-a:duration-700 [&>li>a:hover]:opacity-50">
                        <?php if (!empty($terms)) : ?>
                            <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-['']"><a href="<?= $terms['url'] ?>" target="<?= $terms_target; ?>"><?= $terms['title']; ?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($policy)) : ?>
                            <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-['']"><a href="#"><a href="<?= $policy['url'] ?>" target="<?= $policy_target; ?>"><?= $policy['title']; ?></a></li>
                        <?php endif; ?>
                    </ul>

                </div>
            <?php endif; ?>


        </div>
    </footer>

    <?php //endif;
    ?>

    <!-- Go to top button -->

    <div id="gotoTop" class="fixed z-30 right-2 bottom-14 w-10 h-10 text-xl leading-10 text-center opacity-0 invisible bg-black bg-opacity-50 rounded-full cursor-pointer transition-all duration-700 [&.active]:opacity-100 [&.active]:visible text-white hover:bg-black">
        <span class="icon-arrow-right -rotate-90 block translate-y-1.5 text-lg" aria-hidden="true"></span>
    </div>

    <!-- For Landscape Alert -->
    <div class="landscape-alert">
        <p>For better web experience, please use the website in portrait mode</p>
    </div>

    <div id="magic-cursor" class="absolute z-50 left-0 top-0 pointer-events-none max-lg:hidden">
        <div class="cursor flex items-center justify-center  fixed w-12 h-12 bg-darkblue text-white rounded-full scale-0">
            <span class="icon-arrow-right "></span>
        </div>
    </div>
    <!-- Threejs -->
    <?php
    if (is_page('creative')) { // Replace 'creative' with the actual slug of your page.
    ?>
        <div id="webgi-canvas-container">
            <!-- <model-viewer id="scroll-3d" disable-tap interaction-prompt="none" class="w-100 h-100" loading="eager" camera-orbit="-89.78deg 90.177deg 0%" src="<?php echo $themePath; ?>/assets/3d/nbk-wealth-shell.glb" exposure="1" shadow-intensity="0" auto-rotate-delay="0"> -->
            <!-- <model-viewer id="scroll-3d" disable-tap interaction-prompt="none" class="w-100 h-100" loading="eager" src="<?php echo $themePath; ?>/assets/3d/NBK_main_30_10_new-baked-v1.glb" exposure="1" shadow-intensity="0" auto-rotate-delay="0" 
        camera-orbit="0.6201667687001415rad 1.1299009183012785rad 136.98410211259906m" 
        camera-target="15.317220012784658m 8.49520583849267m 12.252313429329606m" 
        field-of-view="2.8137deg"
        min-field-of-view="1deg"
        max-field-of-view="180deg"
        camera-controls
        ></model-viewer> -->

        </div>
    <?php
    }
    ?>
    <?php wp_footer(); ?>

    <!-- Custom scripts or code in footer from theme settings -->
    <?php
    if (get_field('footer_code', 'option')) :
        echo the_field('footer_code', 'option');
    endif;
    ?>



    </body>

    </html>