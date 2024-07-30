<?php

$heading = get_sub_field('heading');


// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if ($heading && !$hide_block) :

    $args = array(
        'post_type'      => 'teams',
        'posts_per_page' => -1, // -1 means all posts
        'orderby'        => 'date',
        'order'          => 'DESC' // Change to 'ASC' for ascending order
    );

    $teams_query = new WP_Query($args);
?>

    <section class="py-[6.25rem] px-16 max-xl:px-5 max-md:py-12  bg-aliceblue">
        <div class="max-container fade-in">
            <h2 class="text-6xl max-md:text-3xl font-medium text-center text-black capitalize leading-[4.5rem] max-md:leading-9">Meet The Team</h2>

            <?php if ($teams_query->have_posts()) : ?>
                <div class="mt-16 max-md:mt-8 grid grid-cols-3 max-md:grid-cols-1 gap-14 max-sl:gap-6">
                    <?php
                    $index = 0;
                    while ($teams_query->have_posts()) : $teams_query->the_post();
                        $hidden_class = $index >= 6 ? ' hidden' : '';
                    ?>
                        <div class="item <?php echo $hidden_class; ?>">
                            <?php include(locate_template('template-parts/parts/teams_card.php', false, false)); ?>
                        </div>
                        <?php
                        $index++;
                         endwhile;
                    wp_reset_postdata(); ?>
                        </div>
                    <?php else :
                    // No posts found
                    echo '<p>No team members found.</p>';

                endif; ?>
                    <?php if ($teams_query->found_posts > 6) : ?>
                        <div class="load-more flex justify-center w-full mt-20">
                            <a href="#" class="primary-btn bordered" id="load-more">
                                <span class="btn-text"><span>load more</span></span>
                                <span class="btn-arrow">
                                    <span class="icon-arrow-right"></span>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
    </section>

<?php endif; ?>


<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreButton = document.getElementById('load-more');
        let currentIndex = 6;

        loadMoreButton.addEventListener('click', function(e) {
            e.preventDefault();

            // Re-query for hidden items each time the button is clicked
            const items = document.querySelectorAll('.item.hidden');

            for (let i = 0; i < 6 && i < items.length; i++) {
                items[i].classList.remove('hidden');
            }

            currentIndex += 6;

            // If there are no more hidden items, hide the load more button
            if (items.length <= 6) {
                loadMoreButton.style.display = 'none';
            }
        });
    });
</script>