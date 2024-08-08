<!-- Module Counter Stats -->
<?php
$counter_group = get_sub_field('counter_group');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($counter_group && !$hide_block) :
?>

<section class="py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 max-container  section-counter fade-in overflow-hidden"
    style="
    <?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px;<?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px <?php } ?>">
    <div class="container  mx-auto grid">


        <div class="counter-wrapper fade-up-stagger-wrap">

            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <?php
                // $i = 0;

                while (have_rows('counter_group')) : the_row();
                    $number = get_sub_field('number');
                    $title = get_sub_field('title');
                    $delay = $delay + 0.2;
                ?>
                <!-- Card -->
                <div class="flex items-center p-4 fade-up-stagger" data-delay="<?php echo $delay?>">
                    <div class="w-full text-center">
                        <div class="overflow-hidden ">
                            <p class="text-[8em] leading-[1em] -tracking-[0.10em] font-medium -mb-6">
                                <?php echo $number; ?>
                            </p>
                        </div>
                        <div class="w-full h-px mb-5 bg-black "></div>
                        <p class="text-[1.3em] mt-7"><?php echo $title; ?></p>
                    </div>

                </div>
                <?php $i++;
                endwhile; ?>
            </div>

        </div>



    </div>
</section>

<?php endif; ?>