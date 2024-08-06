<!-- Module Counter Stats -->
<?php
$counter_group = get_sub_field('counter_group');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($counter_group && !$hide_block) :
?>

<section class="py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 max-container  section-block fade-in overflow-hidden"
    style="
    <?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px;<?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
    <div class="container  mx-auto grid">


        <div class="counter-wrapper">
            <?php
                $i = 0;

                while (have_rows('counter_group')) : the_row();
                    $number = get_sub_field('number');
                    $title = get_sub_field('title');
                ?>
            <div class="swiper-slide">
                <p><?php echo $number; ?></p>
                <p><?php echo $title; ?></p>

            </div>
            <?php $i++;
                endwhile; ?>
        </div>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border shadow-lg">
                <div
                    class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        My Blog Posts
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        10
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<?php endif; ?>