<?php
if (have_rows('panels')) { ?>
    <!-- Flex modules -->
    <div class="flex-modules">
        <?php
        // check if the flexible content field has rows of data
        if (have_rows('panels')) {
            while (have_rows('panels')) {
                the_row();
                // Dynamically get the template part based on the layout name
                $layout = get_row_layout();
                get_template_part('template-parts/blocks/' . $layout);
            }
        }
        ?>
    </div>
<?php } ?>