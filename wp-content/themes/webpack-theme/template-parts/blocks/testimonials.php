<?php

$heading = get_sub_field('heading');
$testimonial = get_sub_field('testimonial');


// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($testimonial && !$hide_block) :
?>


    <section class="img-hover-block type-two py-[6.25rem] px-16 max-xl:px-5 max-md:py-12  text-black fade-in" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px; <?php } ?>">
        <div class="max-container">

            <?php if ($heading) : ?>
                <div class="flex gap-5 mb-[3.75rem] max-md:mb-10">
                    <div class="w-[35%] max-sl:w-[32%] max-md:hidden">
                    </div>
                    <div class="w-[65%] max-sl:w-[68%] max-md:w-full">
                        <h2 class=" text-6xl max-sl:text-4xl max-md:text-3xl font-medium  capitalize leading-[3.75rem]">
                            <?= $heading ?>
                        </h2>
                    </div>
                </div>
            <?php endif; ?>

            <div class="flex gap-5 hover-slide-block first-item-open">

                <?php foreach ($testimonial as $key => $row) {
                    if (($key == 0) && $row['name']) :
                        if ($row['image']) {
                            $post_featured_img = wp_get_attachment_image_url($row['image'], 'full');
                        } else {
                            $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                        }
                ?>
                        <div class="flex flex-col w-[35%] max-sl:w-[32%] max-md:hidden image-wrap">
                            <div class="flex justify-center items-center px-16 max-sl:px-10  bg-darkblue h-[20vw] w-[24vw]">
                                <img loading="lazy" src="<?= $post_featured_img; ?>" alt="<?= $row['name']; ?>" class="max-w-full transition-all duration-500 img-item  w-[12vw] " />
                            </div>
                        </div>
                <?php endif;
                } ?>


                <div class="flex testimonial-list flex-col w-[65%] max-sl:w-[68%] max-md:w-full border-t-[1px] border-black/10">
                    <?php
                    $total_testimonials = count($testimonial);
                    foreach ($testimonial as $key => $row) {
                        $name = $row['name'];
                        $message = $row['message'];
                        if ($row['image']) {
                            $post_featured_img = wp_get_attachment_image_url($row['image'], 'full');
                        } else {
                            $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                        }
                        if ($name && $message) :
                            // Only show the first 5 items initially
                            $display_class = $key < 5 ? '' : 'hidden';
                            // Format the key to have a leading zero for numbers less than 10
                            $formatted_key = $key < 9 ? '0' . ($key + 1) : ($key + 1);
                    ?>
                            <div class="item py-10 border-b-[1px] border-black/10 flex max-md:flex-col gap-24 max-sl:gap-14 max-md:gap-3 relative cursor-pointer group hover-block type-two <?= $display_class ?>" data-index="<?= $key ?>" data-image="<?= $post_featured_img; ?>">
                                <div class="col">
                                    <p class="self-start text-xl max-md:text-base leading-8 text-darkblue"><?= $formatted_key; ?></p>
                                </div>
                                <div class=" col justify-center items-center px-8  bg-darkblue  w-full h-full hidden max-md:flex aspect-[1.48]">
                                    <img data-src="<?= $post_featured_img; ?>" alt="<?= $name; ?>" class="max-w-full h-auto  w-[60%] transition-all duration-500 lazy-image" />
                                </div>
                                <div class="col">
                                    <h3 class="text-3xl max-sl:text-2xl max-md:text-[1.25rem] font-medium leading-9 max-md:leading-7 capitalize text-darkblue"><?= $name; ?></h3>
                                    <p class="mt-3 max-md:mt-2 text-base max-md:text-[0.875rem] leading-6 max-md:leading-5  opacity-50 max-w-[60%] max-sl:max-w-[80%] max-md:max-w-full h-item desc  overflow-hidden max-md:!h-auto hidden max-md:!block">
                                        <?= $message; ?>
                                    </p>
                                </div>
                            </div>
                    <?php endif;
                    } ?>

                    <?php if ($total_testimonials > 5): ?>
                    <!-- Load more -->
                    <a href="javascript:void(0);" id="load-more" class="primary-btn mt-20 max-md:mt-10">
                        <span class="btn-text"><span>load more</span></span>
                        <span class="btn-arrow">
                            <span class="icon-plus"></span>
                        </span>
                    </a>
                    <?php endif;?>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreButton = document.getElementById('load-more');
        let currentIndex = 5;

        loadMoreButton.addEventListener('click', function(e) {
            e.preventDefault();

            // Re-query for hidden items each time the button is clicked
            const items = document.querySelectorAll('.item.hidden');

            for (let i = 0; i < 5 && i < items.length; i++) {
                items[i].classList.remove('hidden');
            }

            currentIndex += 5;

            // If there are no more hidden items, hide the load more button
            if (items.length <= 5) {
                loadMoreButton.style.display = 'none';
            }
        });
    });
</script>