<div class="flex flex-col w-6/12 max-xl:w-full  max-w-[50%] max-xl:max-w-[100%]">
    <?php if ($about_subtitle) : ?>
        <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem]"><?= $about_subtitle; ?></p>
    <?php endif; ?>
    <?php if ($heading) : ?>
        <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize ">
            <?= $heading; ?>
        </h2>
    <?php endif; ?>
</div>