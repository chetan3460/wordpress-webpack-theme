<?php
$result = get_query_var('result');
$result_key = get_query_var('result_key');
?>

<div data-type="<?php echo $result_key; ?>" class="<?php echo ($result['class']) ?? ''; ?> search-tab swiper-slide last:!m-0 w-max flex justify-between  hover:cursor-pointer relative p-3 rounded-md  transition-colors duration-700  group [&.active]:bg-darkblue [&.active]:text-white  max-md:after:!w-0 hover:bg-darkblue hover:text-white">
    <h3 class="flex-1 my-auto font-medium capitalize leading-[120%]"><?php echo $result['title']; ?></h3>
    <div class="flex justify-center items-center p-2.5 bg-orange h-[1.875rem] leading-[130%]  w-[1.875rem] rounded-full transition-colors duration-700 group-[&.active]:text-black group-hover:text-black ml-2.5">
        <?php echo $result['count']; ?>
    </div>
</div>