    <a href="<?php if ($cta) {
                    echo $cta['url'];
                } { ?>#<?php } ?>" class="flex hover-block type-one overflow-hidden relative flex-col justify-end p-8  max-lg:p-4 text-black h-[46vw] max-sl:h-[90vw] 6xl:h-[54rem] max-md:h-[20rem] w-full bg-aliceblue group transition-all  delay-200 cursor-pointer" target="<?= $cta_target;?>">
        <?php if ($image) : ?>
            <img src="<?= wp_get_attachment_image_url($image, 'full') ?>" alt="<?= esc_attr(get_post_meta($image, '_wp_attachment_image_alt', true)) ?: 'Block image'; ?>" loading="lazy" class="object-cover absolute max-lg:size-full max-lg:left-0 max-lg:top-0  aspect-square left-[1.875rem] w-[17.5rem] h-[17.5rem] top-[2.2rem] transition-all duration-1000  group-hover:left-0 group-hover:top-0 group-hover:h-full group-hover:w-full" />
        <?php endif; ?>

        <div class="overlay !opacity-0 max-md:!opacity-40 group-hover:delay-500 transition-all duration-700  group-hover:!opacity-40"></div>
        <?php if ($title || $description || $cta) : ?>
            <div class="relative z-10 lg:group-hover:p-2 max-lg:p-4   transition-all duration-700 delay-100 after:transition-all after:duration-700 after:delay-100 after:absolute after:content[''] after:bg-white/0 after:w-[calc(100%+1.5rem)] after:h-[calc(100%+1.5rem)] after:-left-3 after:-top-3 after:-z-10 lg:group-hover:after:bg-white max-lg:bg-white">
                <?php if ($title) : ?>
                    <h3 class="relative  mb-6 max-md:mb-2 text-[2.5rem] max-md:text-[1.25rem] max-md:leading-7 font-medium leading-[3.125rem] capitalize line-clamp-3"><?= $title; ?></h3>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <p class="text-base leading-6 lg:group-hover:mb-8  line-clamp-3 max-md:line-clamp-2 desc  overflow-hidden max-lg:!h-auto max-lg:mb-5 max-md:mb-3 md:hidden"><?= $description; ?></p>
                <?php endif; ?>

                <?php if ($cta) : ?>
                    <div class="primary-btn">
                        <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                        <span class="btn-arrow">
                            <span class="icon-arrow-right"></span>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </a>