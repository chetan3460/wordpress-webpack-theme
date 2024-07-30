<div class="prose prose-p:text-xl prose-p:leading-8   max-md:prose-p:text-[1rem] max-md:prose-p:leading-[1.5rem] max-w-full">
    <?php
    if (count($parts) > 1) {
        echo $parts[0]; // Display the content before the "Read More" tag
    ?>
        <div class="read-more-block prose prose-p:text-xl prose-p:leading-8 max-md:prose-p:text-[1rem] max-md:prose-p:leading-[1.5rem] max-w-full init">
            <div class="more-content hidden"><?= $parts[1]; ?></div>
            <a class="read-more-btn mt-5 inline-block text-darkblue/80 capitalize text-xl max-md:text-base font-normal cursor-pointer transition-all duration-700 hover:text-darkblue max-md:no-underline"> Read more</a>
        </div>
    <?php
    } else {
        echo $content; // If no "Read More" tag, display the full content
    }
    ?>
</div>