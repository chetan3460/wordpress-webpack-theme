<?php
$download_link  = get_field('download_link');
?>
<div class="flex flex-col download-item grow justify-between px-8 py-10 max-md:p-3.5 bg-white group-odd:bg-aliceblue min-h-[19rem] max-md:min-h-[14rem]">
    <div class="top-desc">
        <h3 class="text-xl max-md:text-base font-medium leading-6 max-md:leading-5 text-black line-clamp-2"><?php echo the_title(); ?></h3>
        <p class="mt-5 max-md:mt-3 text-base max-md:text-[0.875rem] leading-5 text-black line-clamp-3"><?php echo get_the_content(); ?></p>
    </div>
    <?php if($download_link): ?>
    <div class="flex gap-5 justify-between">
        <div class="flex gap-1.5">
            <a href="<?php echo $download_link['link']; ?>" download class="primary-btn ">
                <span class="btn-text"><span>download</span>
                </span><span class="btn-arrow"> <span class="icon-download"></span> </span>
            </a>
        </div>
        <img class="lazy-image" loading="lazy"
             data-src="<?php echo get_stylesheet_directory_uri() . '/assets/images/pdf.svg' ?>"
             alt="<?php echo the_title(); ?>"
             src="<?php echo get_stylesheet_directory_uri() . '/assets/images/pdf.svg' ?>">
    </div>
    <?php endif;?>
</div>