  <?php
    $event_date = get_field('event_date');
    $event_start_time = get_field('event_start_time');
    $event_end_time = get_field('event_end_time');
    $date = DateTime::createFromFormat('j F Y', $event_date);
    $startTime = DateTime::createFromFormat('H:i:s', $event_start_time);
    $endTime = DateTime::createFromFormat('H:i:s', $event_end_time);
    $location = get_field('location');
    // if ($date) {
    //     // Get the day
    //     $day = $date->format('j'); // Output: '6'

    //     // Get the month
    //     $month = $date->format('F'); // Output: 'June'

    //     // Print day and month
    //     echo 'Day: ' . $day . '<br>';
    //     echo 'Month: ' . $month . '<br>';
    // } else {
    //     echo 'Invalid date format';
    // }
    ?>
  <?php if ($date && $startTime && $endTime) : ?>
      <a class="event-item type-two flex max-sl:flex-col gap-10  max-sl:gap-5 border-t-[1px] border-black/20 pt-10 max-md:pt-7 cursor-pointer group" href="<?php the_permalink(); ?>">
          <?php
            if (get_field('post_thumbnail')) {
                $post_featured_img = wp_get_attachment_image_url(get_field('post_thumbnail'), "full");
            }
            else{
                if (has_post_thumbnail()) {
                    $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
                } else {
                    $post_featured_img = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
                }
            }
            ?>
          <div class="col sl:w-[56%] flex max-sl:flex-col-reverse gap-[6.25rem] max-sl:gap-5">
              <div class="date bg-white group-[&.type-two]:bg-lightblue text-darkblue w-[5.7rem] max-sl:w-[8.75rem]  h-[7.7rem] max-sl:h-16 flex-none items-center text-center flex sl:flex-col justify-center ">
                  <?php if ($date) : ?>
                      <p class="text-[2.5rem] max-sl:text-[1.625rem] font-medium leading-10 sl:border-b-[1px] max-sl:border-r-[1px] border-darkblue/20 sl:pb-1 sl:mb-1 max-sl:pr-3 max-sl:mr-3"><?= $date->format('j'); ?></p>
                  <?php endif; ?>
                  <?php if ($date) : ?>
                      <p class="text-darkblue/50 text-[0.875rem] leading-5"><?= $date->format('F') ?> <br><?= $date->format('Y') ?></p>
                  <?php endif; ?>
              </div>
              <div class="image aspect-[1.421] overflow-hidden lg:min-h-[23.5rem] lg:w-full">
                  <img loading="lazy" class="lazy-image object-cover w-full h-full scale-100 duration-700 transition-all group-hover:scale-110" data-src="<?php echo $post_featured_img; ?>" alt="<?php the_title(); ?>">
              </div>
          </div>
          <div class="col sl:w-[44%] flex gap-5 justify-between flex-col  sl:py-3 lg:pr-[10%]">
              <div class="top">
                  <h3 class="text-3xl max-md:text-[1.25rem] font-medium leading-9 max-md:leading-7 capitalize line-clamp-2"> <?php the_title(); ?></h3>
                  <p class="mt-7 max-sl:mt-3 text-xl max-md:text-base leading-8 line-clamp-2"> <?= get_the_excerpt(); ?> </p>
              </div>
              <div class="bottom flex flex-col gap-5">
                  <div class="e-detail flex gap-2 items-start max-md:text-[0.875rem]">
                      <img loading="lazy" class="lazy-image object-contain w-4.5 h-auto pt-2" data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-time.svg" alt="Time Icon">
                      <?php if ($startTime || $endTime) : ?>
                          <div class="descp">
                              <p class="opacity-50">Time</p>
                              <?php if ($startTime && $endTime) : ?>
                                  <p><?= $startTime->format('H:i') ?> - <?= $endTime->format('H:i') ?></p>
                              <?php endif; ?>
                          </div>
                      <?php endif; ?>
                  </div>
                  <div class="e-detail flex gap-2 items-start max-md:text-[0.875rem]">
                      <img loading="lazy" class="lazy-image object-contain w-4.5 h-auto pt-2" data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-location.svg" alt="Location Icon">
                      <?php if ($location) : ?>
                          <div class="descp">
                              <p class="opacity-50">Location</p>
                              <p><?= $location; ?></p>
                          </div>
                      <?php endif; ?>
                  </div>
              </div>
          </div>
      </a>
  <?php endif; ?>