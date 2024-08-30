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
        <header class="absolute w-full z-50 transition-[top] duration-700 mt-10 max-lg:mt-5 [&.top]:top-[-150px] [&.top]:fixed [&.sticky]:!top-[-20px] group">
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
                        <div class="header__typo-1">
                            <svg class="header__logo-letter letter-c" width="18" height="32" viewbox="0 0 18 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 15.4841C0 14.2772 0.214508 13.0702 0.643524 11.8709C1.07254 10.6716 1.69308 9.60131 2.52047 8.65248C3.34019 7.71124 4.34379 6.93699 5.5389 6.34492C6.73402 5.75285 8.09002 5.44922 9.61456 5.44922C11.4226 5.44922 12.9701 5.85911 14.2495 6.67891C15.5288 7.4987 16.4788 8.5538 17.107 9.83662L15.9042 10.5198C15.5442 9.82144 15.1152 9.23696 14.6325 8.75875C14.1499 8.28813 13.6213 7.901 13.062 7.61256C12.5027 7.31652 11.9129 7.10398 11.3 6.97494C10.6871 6.8459 10.0895 6.77759 9.49964 6.77759C8.20493 6.77759 7.05578 7.03567 6.06751 7.55942C5.07924 8.07559 4.23653 8.75116 3.54704 9.58613C2.85755 10.4211 2.34426 11.3548 1.99186 12.4099C1.63945 13.4574 1.46325 14.5125 1.46325 15.5676C1.46325 16.7593 1.6701 17.8903 2.09145 18.9682C2.51281 20.0461 3.07972 20.9949 3.80752 21.8147C4.53531 22.6345 5.39334 23.2949 6.38161 23.7883C7.36988 24.2817 8.44242 24.5246 9.58391 24.5246C10.1968 24.5246 10.825 24.4487 11.4685 24.2968C12.1197 24.145 12.7402 23.9097 13.3301 23.5909C13.92 23.2721 14.4716 22.8622 14.9926 22.3612C15.5059 21.8602 15.9349 21.2682 16.2796 20.5926L17.536 21.1847C17.1913 21.9437 16.724 22.6117 16.1341 23.1962C15.5442 23.7807 14.8853 24.2741 14.1575 24.6688C13.4297 25.0635 12.6636 25.3595 11.8516 25.5645C11.0395 25.7618 10.2428 25.8605 9.46133 25.8605C8.06703 25.8605 6.79531 25.5569 5.64616 24.9496C4.48935 24.3424 3.49341 23.5605 2.65837 22.5814C1.81566 21.6097 1.16447 20.5015 0.697151 19.2642C0.237491 18.0345 0 16.7745 0 15.4841Z"></path>
                            </svg>
                            <svg class="header__logo-letter letter-a" width="16" height="32" viewbox="0 0 16 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.37014 25.9719C5.68065 25.9719 5.04478 25.8504 4.45489 25.6151C3.86499 25.3798 3.34404 25.061 2.89971 24.6511C2.44771 24.2412 2.10296 23.763 1.85781 23.2089C1.61266 22.6547 1.48242 22.0551 1.48242 21.4099C1.48242 20.7647 1.63564 20.1802 1.94208 19.6488C2.24852 19.1175 2.66987 18.662 3.2138 18.2749C3.75773 17.8878 4.40892 17.5842 5.17502 17.3716C5.94112 17.1515 6.77617 17.0452 7.69549 17.0452C8.4999 17.0452 9.3043 17.1136 10.1087 17.2578C10.9208 17.402 11.6486 17.5918 12.2997 17.8423V16.4C12.2997 15.0033 11.9014 13.8951 11.097 13.0677C10.2926 12.2479 9.21237 11.838 7.83339 11.838C7.1056 11.838 6.33949 11.9899 5.52743 12.2935C4.71536 12.5971 3.89563 13.0298 3.05292 13.5991L2.50899 12.6351C4.41658 11.3522 6.22458 10.707 7.94064 10.707C9.73332 10.707 11.1429 11.2232 12.1772 12.2479C13.2038 13.2803 13.7247 14.6997 13.7247 16.5139V23.7098C13.7247 24.1805 13.9315 24.4158 14.3529 24.4158V25.691C14.261 25.7062 14.1537 25.7214 14.0541 25.7365C13.9469 25.7441 13.8549 25.7517 13.786 25.7517C13.4029 25.7517 13.0965 25.6227 12.8743 25.3722C12.6445 25.1141 12.5143 24.8105 12.476 24.4537V23.224C11.7865 24.1121 10.9131 24.7953 9.84823 25.2659C8.76803 25.729 7.61122 25.9719 6.37014 25.9719ZM6.66125 24.8333C7.76444 24.8333 8.78335 24.6283 9.71033 24.2108C10.6373 23.7933 11.3421 23.2468 11.8401 22.5637C12.1465 22.1689 12.2997 21.7894 12.2997 21.4326V18.829C11.6103 18.5634 10.8978 18.366 10.1547 18.237C9.41156 18.1079 8.63779 18.0396 7.84105 18.0396C7.09793 18.0396 6.42377 18.1231 5.81089 18.2825C5.19801 18.4419 4.67706 18.662 4.24038 18.9505C3.8037 19.2313 3.46662 19.5805 3.22147 19.9828C2.98398 20.3927 2.8614 20.8406 2.8614 21.3264C2.8614 21.8198 2.95333 22.2828 3.14486 22.7155C3.33638 23.1481 3.60452 23.5201 3.94926 23.8313C4.29401 24.1425 4.70004 24.3854 5.16736 24.5676C5.62702 24.7498 6.12498 24.8333 6.66125 24.8333Z"></path>
                            </svg>
                            <svg class="header__logo-letter letter-r" width="10" height="32" viewbox="0 0 10 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.10897 12.2266C7.77595 12.2645 6.60382 12.6593 5.60789 13.4031C4.6043 14.147 3.90715 15.1718 3.50878 16.4774V25.6848H2.07617V10.9514H3.44749V14.5797C3.96078 13.5398 4.64261 12.6972 5.49298 12.0444C6.34335 11.3916 7.25501 11.0197 8.22795 10.921C8.41948 10.9058 8.58802 10.8906 8.74124 10.8906C8.89446 10.8906 9.01704 10.8906 9.11663 10.8906V12.2266H9.10897Z"></path>
                            </svg>
                            <svg class="header__logo-letter letter-g" width="16" height="32" viewbox="0 0 16 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.08358 25.9107C6.057 25.9107 5.10704 25.6982 4.249 25.2731C3.39097 24.848 2.64786 24.2787 2.03498 23.5728C1.41444 22.8668 0.931792 22.0546 0.579386 21.1513C0.22698 20.2481 0.0507812 19.3068 0.0507812 18.3428C0.0507812 17.3408 0.219324 16.3768 0.548747 15.4508C0.885831 14.5247 1.35315 13.7049 1.96603 12.999C2.57891 12.293 3.30671 11.7313 4.15708 11.3138C5.00745 10.8964 5.94209 10.6914 6.97632 10.6914C8.27103 10.6914 9.40486 11.0254 10.3625 11.701C11.3278 12.3689 12.1398 13.1887 12.8063 14.1528V10.9495H14.124V25.9714C14.124 26.9734 13.9325 27.8539 13.5495 28.6054C13.1664 29.3644 12.6608 29.9869 12.0173 30.4879C11.3814 30.9888 10.6383 31.3684 9.78791 31.6189C8.93754 31.877 8.04886 31.9984 7.11422 31.9984C6.25619 31.9984 5.48243 31.9149 4.8006 31.7555C4.11111 31.5961 3.50589 31.3684 2.98494 31.0723C2.464 30.7763 1.99667 30.4195 1.58298 29.9945C1.16929 29.5694 0.81688 29.0988 0.51044 28.5902L1.48338 27.9374C2.07328 28.9394 2.87769 29.6681 3.88894 30.1311C4.90019 30.5941 5.98039 30.8219 7.12188 30.8219C7.88798 30.8219 8.60811 30.7156 9.28228 30.5106C9.95645 30.3057 10.5463 29.9945 11.052 29.5922C11.5576 29.1823 11.956 28.6813 12.2548 28.074C12.5535 27.4668 12.6991 26.7608 12.6991 25.9486V22.715C12.0862 23.679 11.2818 24.4457 10.2705 25.0226C9.25164 25.6222 8.19442 25.9107 7.08358 25.9107ZM7.42832 24.6962C8.05652 24.6962 8.6694 24.5747 9.27462 24.3394C9.87218 24.1041 10.4161 23.7929 10.9064 23.421C11.3891 23.0414 11.7951 22.6163 12.1092 22.1457C12.4233 21.6751 12.6225 21.2045 12.6991 20.7263V15.8834C12.4693 15.3141 12.1628 14.7904 11.7874 14.3122C11.4044 13.8339 10.9754 13.4165 10.4851 13.0825C10.0024 12.7409 9.47381 12.4752 8.91456 12.2779C8.3553 12.0805 7.78839 11.9818 7.21381 11.9818C6.31748 11.9818 5.51307 12.1716 4.80826 12.5511C4.10345 12.9307 3.50589 13.424 3.02325 14.0237C2.5406 14.631 2.16522 15.3141 1.90474 16.0808C1.64427 16.8474 1.52169 17.6141 1.52169 18.3883C1.52169 19.2385 1.67491 20.0431 1.98135 20.7946C2.28779 21.5536 2.70914 22.2216 3.23775 22.8061C3.77402 23.3906 4.40222 23.8536 5.12236 24.1952C5.83483 24.5216 6.60859 24.6962 7.42832 24.6962Z"></path>
                            </svg>
                            <svg class="header__logo-letter letter-o" width="18" height="32" viewbox="0 0 18 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.81911 25.9719C7.76955 25.9719 6.80427 25.7669 5.9156 25.3646C5.02692 24.9547 4.26081 24.4082 3.60963 23.7098C2.95844 23.0115 2.45282 22.1993 2.09275 21.2732C1.73269 20.3472 1.54883 19.3756 1.54883 18.3508C1.54883 17.3109 1.73269 16.3317 2.10808 15.4057C2.48347 14.4796 2.98909 13.6674 3.64028 12.969C4.29146 12.2707 5.05756 11.7166 5.94623 11.3143C6.83491 10.912 7.79254 10.707 8.81911 10.707C9.84568 10.707 10.8033 10.912 11.6767 11.3143C12.55 11.7242 13.3238 12.2707 13.9826 12.969C14.6415 13.6674 15.1548 14.4796 15.5302 15.4057C15.9055 16.3317 16.0894 17.3109 16.0894 18.3508C16.0894 19.368 15.9055 20.3472 15.5302 21.2732C15.1548 22.1993 14.6491 23.0115 13.998 23.7098C13.3468 24.4082 12.5807 24.9623 11.692 25.3646C10.811 25.7669 9.85334 25.9719 8.81911 25.9719ZM2.98909 18.404C2.98909 19.2769 3.14231 20.0891 3.44875 20.8558C3.75519 21.6224 4.16888 22.2904 4.68983 22.8521C5.21078 23.4214 5.83132 23.8692 6.53613 24.1956C7.24095 24.5296 7.99172 24.689 8.79613 24.689C9.60053 24.689 10.3513 24.522 11.0561 24.1956C11.7609 23.8692 12.3815 23.4062 12.9177 22.8217C13.454 22.2373 13.8677 21.5617 14.1742 20.795C14.4806 20.0284 14.6338 19.201 14.6338 18.3129C14.6338 17.4475 14.4806 16.6278 14.1742 15.8611C13.8677 15.0944 13.4464 14.4265 12.9177 13.8496C12.3815 13.2727 11.7686 12.8172 11.0714 12.4757C10.3743 12.1341 9.62352 11.9671 8.82678 11.9671C8.02237 11.9671 7.27159 12.1341 6.56677 12.4757C5.86196 12.8172 5.24909 13.2803 4.72048 13.8647C4.19953 14.4492 3.77818 15.1324 3.46408 15.9218C3.14232 16.7037 2.98909 17.531 2.98909 18.404Z"></path>
                            </svg>
                        </div>
                        <div class="header__typo-2">
                            <svg class="header__logo-letter letter-k" width="19" height="32" viewbox="0 0 19 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
                            </svg>
                        </div>
                    </a>


                    <!-- Site Logo -->
                    <div class="logo left">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                        ?>

                    </div>
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