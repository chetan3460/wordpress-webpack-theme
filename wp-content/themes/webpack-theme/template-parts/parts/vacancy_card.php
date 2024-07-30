<?php
$date_posted = get_field('date_posted');
$location = get_field('location');
$job_type = get_field('job_type');

?>

<a class="c-item flex flex-col justify-between cursor-pointer  py-10 px-8 max-lg:p-4 bg-aliceblue  h-[26vw] max-lg:h-[40vw] max-md:h-[12.5rem]  transition-all duration-700 hover:bg-darkblue hover:text-white group" href="<?php the_permalink(); ?>">
    <?php if ($date_posted) : ?>
        <div class="top">
            <ul class="flex gap-5 max-md:text-[0.875rem]">
                <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-[''] opacity-50">Date Posted</li>
                <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-[''] opacity-50"><?= $date_posted; ?></li>
            </ul>
        </div>
    <?php endif; ?>

    <div class="bottom">
        <h2 class="text-3xl max-md:text-xl leading-9 max-md:leading-6 lg:pr-[30%] line-clamp-4"><?= the_title();?></h2>
        <?php if ($location || $job_type) : ?>
            <ul class="flex gap-5 mt-4">
                <?php if ($location) : ?>
                    <li class="after:content-['|'] after:text-orange after:absolute after:right-[-0.7rem] relative last:after:content-['']"><?= $location;?></li>
                <?php endif; ?>
                <?php if ($job_type) : ?>
                    <li class="after:content-['|'] after:text-orange after:absolute after:right-[-0.7rem] relative last:after:content-[''] "><?= $job_type;?></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>

</a>