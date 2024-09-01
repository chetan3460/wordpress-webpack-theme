<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <script src="https://kit.fontawesome.com/20e2f44b6f.js" crossorigin="anonymous"></script>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-url" content="<?php echo get_template_directory_uri(); ?>">
    <!-- Custom scripts or code in header from theme settings -->
    <?php
    if (get_field('header_code', 'option')) :
        echo the_field('header_code', 'option');
    endif;
    ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper overflow-hidden <?php if (wp_is_mobile()) { ?> mobile-device <?php } ?>"><!-- opening of wrapper div ends in footer.php -->
        <div class="mobile-nav">
            <div class="top-bar flex justify-between">
                <div class="logo left">
                    <?php
                    // if (function_exists('the_custom_logo')) {
                    //     the_custom_logo();
                    // }
                    ?>

                    <a href="/" class="w-[8.4rem]"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-blue.svg" class="w-[8.4rem]" alt="Future Pipe Industries"></a>


                </div>
                <div class="right flex items-center gap-0">
                    <div class="search-btn rounded-full bg-white border border-darkblue bg-opacity-20  w-10 h-10 cursor-pointer flex items-center justify-center text-xl ">
                        <span class="icon-search text-darkblue"></span>
                    </div>
                    <div class="mobile-menu relative">
                        <span class="nav-icon"></span>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-list">
                <?php
                if (has_nav_menu('main-menu')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'walker'         => new mobile_menu_Navwalker(),
                        )
                    );
                }
                ?>
                <?php
                $enquiry_link = get_field('enquiry_link', 'option');
                if (!empty($enquiry_link)) {
                    $enquiry_target = $enquiry_link['target'] ? $enquiry_link['target'] : '_self';
                }
                if ($enquiry_link) :
                ?>
                    <div class="enq-block">
                        <!-- <a href="<? //= $enquiry_link['url']; 
                                        ?>" aria-label="Send Enquiry" role="button" class="full-btn make-enquiry border-solid border border-white bg-white  rounded-full text-darkblue px-5 py-3 capitalize font-medium flex items-center gap-3 leading-3 text-[0.875rem] transition-all duration-700 cursor-pointer hover:bg-transparent hover:text-white max-lg:hidden">
                            <span class="btn-text"><span><? //= $enquiry_link['title'] 
                                                            ?></span></span>
                            <span class="btn-arrow">
                                <span><span class="icon-arrow-right"></span></span>
                            </span>
                        </a> -->
                        <button aria-label="Send Enquiry" role="button" class="primary-btn make-enquiry mt-20 max-md:mt-10">
                            <span class="btn-text"><span><?= $enquiry_link['title'] ?></span></span>
                            <span class="btn-arrow">
                                <span><span class="icon-arrow-right"></span></span>
                            </span>
                        </button>
                    </div>
                <?php endif; ?>


            </div>
        </div>

        <script type="text/javascript">
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        </script>

        <!-- header start here -->
        <header class="header dark-mode absolute w-full z-50 transition-[top] duration-700 mt-10 max-lg:mt-5 [&.top]:top-[-150px] [&.top]:fixed [&.sticky]:!top-[-20px] group">
            <div class="max-container header-wrap px-16 max-xl:px-5 pb-10  max-lg:pb-10 max-lg:group-[&.top]:px-0 [clip-path:polygon(0%_100%,100%_100%,100%_100%,0%_100%)]">
                <div class="header-inner relative lg:group-[&:not(.top)]:backdrop-blur-[0.625rem] lg:group-[&:not(.top)]:bg-[#D9D9D9] bg-darkblue   lg:group-[&:not(.top)]:bg-opacity-10 group-[&:not(.top)]:border-white/40 group-[&:not(.top)]:border-solid group-[&:not(.top)]:border py-6 max-lg:py-5 px-7 flex justify-between max-lg:bg-opacity-0 max-lg:border-white max-lg:border-solid max-lg:border max-lg:group-[&.top]:bg-darkblue max-lg:group-[&.top]:border-none lg:rounded-3xl">
                    <div class="overlay-cu lg:block absolute bg-black/30 w-full h-full top-0 left-0 overflow-hidden rounded-none lg:rounded-[25px] -z-10">

                    </div>
                    <!-- New logo -->
                    <a href="./" class="header__logo">
                        <div class="header__logo-shape">
                            <svg class="header__logo-shape-top" width="29" height="31" viewbox="0 0 29 31" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M28.591 9.97462C28.591 8.03639 26.4306 5.01796 25.9633 4.4587C23.0751 1.58583 19.2446 0 15.1689 0C7.46963 0 1.08035 5.70745 0.0078125 13.108C1.43276 10.7331 3.2714 9.18554 5.32455 8.63395C8.72603 7.72229 12.6408 9.43069 16.9539 13.7055C16.9999 13.7515 17.0459 13.7975 17.0995 13.8434L17.2451 13.9966C18.4632 15.4982 20.2712 16.3562 22.2017 16.3562C25.7258 16.3562 28.591 13.491 28.591 9.97462Z"></path>
                            </svg>
                            <svg class="header__logo-shape-bottom" width="29" height="31" viewbox="0 0 29 31" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.0709 24.0874C20.248 24.2023 15.9962 22.356 12.6407 19.215C11.8822 23.6277 12.8475 26.9833 15.3833 28.5384C18.1412 30.2315 22.1556 29.5037 25.3809 26.7228C26.5913 25.6426 27.6102 24.3862 28.4223 22.9842C27.1353 23.666 25.672 24.0414 24.0709 24.0874Z"></path>
                                <path d="M11.1927 17.6905C10.0053 16.3191 9.017 14.8099 8.26622 13.2088C7.64568 11.8834 7.31626 10.8875 7.26263 10.1367C7.23965 10.1367 7.209 10.1367 7.18602 10.1367C2.50515 10.1367 0.421355 16.0357 0.030644 17.2844C0.015322 17.3151 0.007661 17.3457 0 17.3764L0.145559 18.2727C1.5322 25.4204 7.85252 30.6299 15.1688 30.6299C15.3526 30.6299 15.5288 30.6222 15.7127 30.6146C15.2837 30.446 14.8777 30.2545 14.4793 30.0094C11.0625 27.9102 9.87503 23.4286 11.1927 17.6905Z"></path>
                            </svg>
                        </div>
                        <div class="flex items-start flex-col">
                            <div class="header__typo-1">
                                <span class="header__logo-letter letter-c">C</span>
                                <span class="header__logo-letter letter-a">R</span>
                                <span class="header__logo-letter letter-a">E</span>
                                <span class="header__logo-letter letter-a">A</span>
                                <span class="header__logo-letter letter-a">T</span>
                                <span class="header__logo-letter letter-a">I</span>
                                <span class="header__logo-letter letter-a">V</span>
                                <span class="header__logo-letter letter-a">E</span>

                            </div>
                            <div class="header__typo-2">
                                <span class="header__logo-letter">A</span>
                                <span class="header__logo-letter">G</span>
                                <span class="header__logo-letter">E</span>
                                <span class="header__logo-letter">N</span>
                                <span class="header__logo-letter">C</span>
                                <span class="header__logo-letter">Y</span>
                                <!-- <svg class="header__logo-letter letter-k" width="19" height="32" viewbox="0 0 19 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.57422 25.6834V5.59091H4.77651V15.937L14.3298 5.56055H17.8768L9.87108 14.4568L18.3365 25.6834H14.7588L7.89454 16.4152L4.77651 19.6185V25.6834H1.57422Z"></path>
                            </svg>
                            <svg class="header__logo-letter letter-i" width="5" height="32" viewbox="0 0 5 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.05371 8.43098V5H4.20238V8.43098H1.05371ZM1.05371 10.8676H4.20238V25.6922H1.05371V10.8676Z"></path>
                            </svg>
                            <svg class="header__logo-letter letter-t" width="12" height="32" viewbox="0 0 12 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2979 24.9253C10.8995 25.115 10.3479 25.3276 9.63543 25.5629C8.93062 25.7982 8.17984 25.9196 7.37543 25.9196C6.87747 25.9196 6.41014 25.8513 5.97347 25.7223C5.53679 25.5932 5.14608 25.3959 4.81666 25.1302C4.47957 24.8645 4.2191 24.523 4.02757 24.0979C3.83605 23.6728 3.74411 23.1566 3.74411 22.557V13.2736H1.76758V10.8673H3.74411V5.99414H6.89279V10.8673H10.1564V13.2736H6.89279V21.5474C6.93109 22.0788 7.09964 22.4583 7.39076 22.6936C7.68954 22.9289 8.04961 23.0504 8.49395 23.0504C8.93062 23.0504 9.35198 22.9745 9.75035 22.8226C10.1487 22.6708 10.4475 22.5494 10.639 22.4507L11.2979 24.9253Z"></path>
                            </svg>
                            <svg class="header__logo-letter letter-e" width="16" height="32" viewbox="0 0 16 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.87906 25.9733C6.71459 25.9733 5.65737 25.7684 4.70741 25.3661C3.75744 24.9562 2.93771 24.4096 2.26355 23.7113C1.58938 23.013 1.06077 22.2008 0.693039 21.2747C0.31765 20.3486 0.133789 19.3694 0.133789 18.3295C0.133789 17.2896 0.31765 16.3028 0.693039 15.3692C1.06843 14.4355 1.58938 13.6081 2.26355 12.9022C2.93771 12.1963 3.75744 11.6346 4.70741 11.2323C5.65737 10.8224 6.7299 10.625 7.9097 10.625C9.07417 10.625 10.1237 10.8299 11.0737 11.2474C12.016 11.6649 12.8204 12.219 13.4869 12.9022C14.1534 13.593 14.6667 14.3976 15.0191 15.3084C15.3715 16.2269 15.5477 17.1833 15.5477 18.1853C15.5477 18.413 15.5401 18.6256 15.5171 18.8229C15.4941 19.0203 15.4788 19.1873 15.4558 19.3163H3.47398C3.52761 19.9767 3.68849 20.5764 3.94896 21.1001C4.20944 21.6239 4.53886 22.0869 4.95255 22.474C5.35859 22.8612 5.82591 23.1572 6.35452 23.3697C6.87546 23.5747 7.42705 23.6809 8.00163 23.6809C8.42298 23.6809 8.83668 23.6278 9.24272 23.5215C9.65641 23.4153 10.0318 23.2635 10.3689 23.0661C10.7136 22.8687 11.0201 22.6258 11.2882 22.345C11.5563 22.0641 11.7632 21.7529 11.9164 21.4113L14.6054 22.178C14.0921 23.2938 13.2341 24.2047 12.0466 24.9106C10.8439 25.6166 9.45722 25.9733 7.87906 25.9733ZM12.422 17.1606C12.3684 16.5381 12.2075 15.9612 11.947 15.4299C11.6866 14.8985 11.3571 14.4507 10.9588 14.0863C10.5604 13.7144 10.0931 13.4335 9.55681 13.221C9.02054 13.0161 8.46129 12.9098 7.87139 12.9098C7.28149 12.9098 6.72225 13.0161 6.2013 13.221C5.68035 13.426 5.21303 13.7144 4.81466 14.0863C4.41629 14.4583 4.08686 14.9061 3.84171 15.4299C3.59656 15.9612 3.44333 16.5381 3.38205 17.1606H12.422Z"></path>
                            </svg> -->
                            </div>
                        </div>

                    </a>


                    <!-- Site Logo -->
                    <!-- <div class="logo left">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                        ?>
                    </div> -->

                    <!-- Navigation -->
                    <div class="right flex items-center gap-5 max-xxl:gap-3  pr-[3.75rem] max-md:pr-12">
                        <?php
                        if (has_nav_menu('main-menu')) {
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'main-menu',
                                    'container' => false,
                                    'menu_class' => 'text-white flex gap-10 mr-10 max-xxl:mr-3  max-xxl:gap-6 max-lg:hidden font-medium',
                                    'add_a_class'     => 'duration-700 transition-all  text-[0.875rem] 4xl:text-base',
                                    'walker'         => new Mega_Menu_Walker(),
                                    // 'depth' => 3,
                                    // 'walker' => new categoryImage_Walker_Menu()
                                )
                            );
                        }
                        ?>

                        <div class="search-btn rounded-full bg-white bg-opacity-20 text-white w-10 h-10 cursor-pointer flex items-center justify-center text-xl transition-all duration-700 hover:bg-opacity-100 hover:text-darkblue ">
                            <span class="icon-search"></span>
                        </div>

                        <?php
                        $enquiry_link = get_field('enquiry_link', 'option');
                        if (!empty($enquiry_link)) {
                            $enquiry_target = $enquiry_link['target'] ? $enquiry_link['target'] : '_self';
                        }
                        if ($enquiry_link) :
                        ?>
                            <button href="#" aria-label="Send Enquiry" role="button" class="full-btn make-enquiry border-solid border border-white bg-white  rounded-full text-darkblue px-5 py-3 capitalize font-medium flex items-center gap-3 leading-3 text-[0.875rem] transition-all duration-700 cursor-pointer hover:bg-transparent hover:text-white max-lg:hidden">
                                <?= $enquiry_link['title'] ?> <span class="icon-arrow-right "></span>
                            </button>
                        <?php endif; ?>

                        <div class="mobile-menu ">
                            <span class="nav-icon"></span>
                        </div>

                        <!-- Ham menu -->
                        <?php if (has_nav_menu('ham-menu')) { ?>
                            <div class="ham-menu">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'ham-menu',
                                        'container' => false,
                                        'menu_class' => '',
                                        'add_a_class'     => '',
                                        'walker' => new Ham_Walker_Nav_Menu(),
                                    )
                                );
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </header>

        <section class="search-top-block search-bar group fixed size-full inset-0  z-[60] transition-all duration-1000 [clip-path:polygon(0%_0%,100%_0%,100%_0%,0%_0%)] invisible [&.active]:[clip-path:polygon(0%_100%,100%_100%,100%_0%,0%_0%)] [&.active]:visible">
            <?php get_search_form(); ?>
        </section>




        <div class="menu-overlay size-full inset-0 fixed backdrop-blur-[0.5rem] bg-black/10 z-20 transition-all duration-500 opacity-0 pointer-events-none"></div>



        <section class="form-pop-up default-form blue  group fixed size-full inset-0 z-[60]  transition-all duration-1000 [clip-path:polygon(0_0,0_0,0_100%,0_100%)] invisible [&.active]:[clip-path:polygon(0_0,100%_0%,100%_100%,0_100%)] [&.active]:visible ">
            <div class="w-1/2 max-lg:w-3/4 max-md:w-full bg-darkblue h-full overflow-scroll absolute right-0 top-0 z-10">
                <div class="form-block px-14 py-16 max-md:p-5 relative">
                    <h2 class="text-[2.5rem] max-md:text-2xl mb-7 text-white">Make Enquiry</h2>
                    <div class="close-btn rounded-btn rounded-full cursor-pointer transition-all duration-700 delay-0 bg-white w-11 h-11  flex items-center justify-center hover:opacity-50 absolute right-14 top-10 max-md:top-3 max-md:right-5">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="<?php echo $site; ?>" class=" w-3 h-3" />
                    </div>
                    <?php if ($gravity_forms_select) :

                        echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]');

                    endif; ?>
                </div>
            </div>
            <div class="overlay-blurred close-btn size-full inset-0 absolute backdrop-blur-[0.5rem] bg-black/10 ">

            </div>
        </section>


        <!-- cookie block -->
        <section class="fixed cookie-preference hidden right-5 bottom-5 bg-white rounded-3xl p-7 max-md:p-5 w-[31.5rem] max-md:w-[calc(100%-2.5rem)] shadow-2xl z-50">
            <h2 class="text-3xl max-md:text-xl">Cookies Preference</h2>
            <p class="text-xl max-md:text-[0.875rem] max-md:leading-6 mt-2 text-[#1A0A0C] [&>a]:text-orange [&>a:hover]:text-[#1A0A0C] [&>a]:transition-all [&>a]:duration-700 [&>a]:cursor-pointer">Our website uses cookies to make your browsing experience better. by using our site you agree to the use of cookies, visit <a href="/cookie-policy">Cookies Policy page</a>. </p>
            <div class="btn-wrap  flex max-md:flex-col  gap-8 max-md:gap-3 mt-6">
                <a href="#" class="primary-btn max-md:w-auto accept">
                    <span class="btn-text max-md:w-[calc(100%-2.68rem)] max-md:text-center"><span>Accept</span></span>
                    <span class="btn-arrow">
                        <span class="icon-arrow-right"></span>
                    </span>
                </a>
                <a href="#" class="primary-btn bordered max-md:w-auto reject">
                    <span class="btn-text max-md:w-[calc(100%-2.68rem)] max-md:text-center"><span>Reject</span></span>
                    <span class="btn-arrow">
                        <span class="icon-arrow-right"></span>
                    </span>
                </a>
            </div>
        </section>

        <!-- cookie block ends -->