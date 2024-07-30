<?php
$post_type = get_post_type(get_post());
$info = get_mappings_title($post_type);
$download_link = get_field('download_link');
?>

<div class="s-item flex flex-col justify-between py-10 px-8 max-lg:p-4 bg-aliceblue h-[32vw] max-lg:h-[40vw] max-md:h-[16.2rem]  transition-all duration-700 hover:bg-darkblue hover:text-white group">
    <div class="top">
        <ul class="flex gap-1 text-[0.875rem] text-black/50 group-hover:text-white/50">
            <li><a href="<?= site_url('/'); ?>" class="cursor-pointer  hover:opacity-50">Home</a></li>
            <li>/</li>
            <li><a href="<?= $info['url']; ?>" class="cursor-pointer  hover:opacity-50"><?= $info['title']; ?></a></li>
        </ul>
    </div>
    <?php if ($download_link): ?>

        <a href="<?= $download_link['link']; ?>" class="bottom lg:pr-10 cursor-pointer">
            <h2 class="text-xl max-md:text-base leading-7 max-md:leading-6 lg:pr-[30%] line-clamp-2"><?= the_title(); ?></h2>
            <p class="line-clamp-2 mt-3 max-md:text-[0.875rem]"><?= get_the_content(); ?></p>
            <div class="primary-btn mt-8 max-md:mt-4 group-hover:text-darkblue ">
                <span class="btn-text group-hover:text-darkblue group-hover:bg-white group-hover:after:bg-white !translate-x-0"><span>download</span></span>
                <span class="btn-arrow group-hover:text-darkblue group-hover:bg-white group-hover:after:bg-white">
                        <span class="icon-arrow-right"></span>
                    </span>
            </div>
        </a>
    <?php else: ?>
        <a href="<?= the_permalink(); ?>" class="bottom lg:pr-10 cursor-pointer">
            <h2 class="text-xl max-md:text-base leading-7 max-md:leading-6 lg:pr-[30%] line-clamp-2"><?= the_title(); ?></h2>
            <p class="line-clamp-2 mt-3 max-md:text-[0.875rem]"><?= get_the_content(); ?></p>
            <div class="primary-btn mt-8 max-md:mt-4 group-hover:text-darkblue ">
                <span class="btn-text group-hover:text-darkblue group-hover:bg-white group-hover:after:bg-white !translate-x-0"><span>learn more</span></span>
                <span class="btn-arrow group-hover:text-darkblue group-hover:bg-white group-hover:after:bg-white">
                        <span class="icon-arrow-right"></span>
                    </span>
            </div>
        </a>
    <?php endif; ?>
</div>