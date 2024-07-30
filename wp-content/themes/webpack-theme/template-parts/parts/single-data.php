       <section class="detail-section pt-10 pb-[6.25rem] max-md:py-12 fade-in">
           <div class="max-container">
               <!-- Page content -->
               <?php if (!empty(get_the_content())) { ?>
                    <div class="text-block">
                        <?= the_content(); ?>
                    </div>
               <?php } ?>

               <?php include(locate_template('template-parts/modules.php', false, false)); ?>
           </div>
           <!-- Share -->
           <div class="share-block  border-t-[1px] border-black/20 mx-16 max-xl:mx-5 pt-14 max-md:pt-8 mt-14 max-md:mt-7 text-center">
               <p class="font-medium capitalize text-xl opacity-85">Share this article</p>
               <div class="flex gap-[1.125rem] py-0.5 text-white justify-center mt-5">
                   <a aria-label="share" class="js-copy-clipboard cursor-pointer flex justify-center items-center p-2.5 bg-white border border-darkblue/20 text-darkblue  h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:text-white hover:border-darkblue hover:bg-darkblue">
                       <span class="icon-link"></span>
                   </a>
                   <a aria-label="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= the_permalink(); ?>" class="flex justify-center items-center p-2.5 bg-white border border-darkblue/20 text-darkblue  h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:text-white hover:border-darkblue hover:bg-darkblue">
                       <span class="icon-facebook"></span>
                   </a>
                   <a aria-label="linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?= the_permalink(); ?>" class="flex justify-center items-center p-2.5 bg-white border border-darkblue/20 text-darkblue  h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:text-white hover:border-darkblue hover:bg-darkblue">
                       <span class="icon-linkedin"></span>
                   </a>
                   <a aria-label="twitter" target="_blank" href="https://twitter.com/intent/tweet?source=webclient&amp;text=<?= the_permalink(); ?>" class="flex justify-center items-center p-2.5 bg-white border border-darkblue/20 text-darkblue  h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:text-white hover:border-darkblue hover:bg-darkblue">
                       <span class="icon-twitter"></span>
                   </a>
               </div>
           </div>
       </section>