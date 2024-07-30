
<div class="serach-form">
    <form role="search" class="search-form" method="get" action="<?php echo home_url( '/' ); ?>">
         <div class="input-block relative bg-darkblue  z-[70] p-[3.75rem] max-md:py-10 max-xl:px-5 max-md:h-full">
                <div class="input-wrap relative">
                        <input type="text" placeholder="<?php esc_html_e('Type your search', T_PREFIX);?>" name="s"  autocomplete="off" value="" class="search-input my-auto text-3xl max-md:text-xl font-medium leading-9 text-white capitalize bg-transparent border-none focus:outline-none w-[90%] max-md:w-[80%] !rounded-none"  />
                        <button type="submit" class="search-submit hidden"></button>
                         <div class="close-btn rounded-btn rounded-full cursor-pointer transition-all duration-700 delay-0 bg-white w-11 h-11  flex items-center justify-center hover:opacity-50 absolute right-0 top-0 max-md:-top-3">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="<?php echo $site; ?>" class=" w-3 h-3" />
                        </div>
                </div>
            </div>
            <div class="overlay-blurred close-btn size-full inset-0 absolute backdrop-blur-[0.5rem] bg-black/10 ">
        </div>
    </form>
</div>
