import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default class HoverDescSlide {
    constructor() {
        this.init();
    }

    init = () => {
        this.setDomMap();
        this.bindEvents();
    };

    setDomMap = () => {
        this.window = $(window);
        this.body = $("body");
    }

    bindEvents = () => {
    
       let hoverTimeout;

       $(document).on('mouseenter', '.hover-slide-block .hover-block', function() {
            let $currentTarget = $(this);
            let $thisBlock = $currentTarget.closest('.hover-slide-block');
            let $desc = $thisBlock.find('.desc');
            let $hoverBlock = $thisBlock.find('.hover-block');

            clearTimeout(hoverTimeout);

           if (!$currentTarget.hasClass('active')) {
                hoverTimeout = setTimeout(() => {
                    $desc.slideUp();
                    $hoverBlock.removeClass('active'); // Remove active class from all hover blocks
                    $currentTarget.addClass("active");
                    $currentTarget.find('.desc').slideDown();
                    // Get the data-image attribute and update the image if it exists
                    let dataImage = $currentTarget.attr("data-image");
                    if (dataImage) {
                        let hBlockWrap = $currentTarget.closest(".hover-slide-block");
                        let imgItem = hBlockWrap.find(".img-item")[0];
                        if (imgItem) {
                            imgItem.classList.add("opacity-0");
                            setTimeout(function() {
                                imgItem.src = dataImage;
                                imgItem.classList.remove("opacity-0");
                            }, 300);
                        }
                    }
                }, 300);
            }

        }).on('mouseleave', '.hover-slide-block .hover-block', function() {
            let $currentTarget = $(this);
            let $thisBlock = $currentTarget.closest('.hover-slide-block');
            let $hoverBlock = $thisBlock.find('.hover-block');

            clearTimeout(hoverTimeout);

            if (!$currentTarget.hasClass('type-two')) {
                $currentTarget.find('.desc').slideUp();
                $hoverBlock.removeClass('active');
            }
            ScrollTrigger.refresh();
        });

        $('.hover-slide-block').each(function() {
            const $thisBlock = $(this);
            const $desc = $thisBlock.find('.desc');
            const $hoverBlock = $thisBlock.find('.hover-block');

            // Slide up all desc initially
            if (window.innerWidth > 767) {
            $desc.slideUp();
            }

            // Check if the block has the class 'first-item-open'
            if ($thisBlock.hasClass('first-item-open')) {
                $hoverBlock.first().find('.desc').slideDown();
                $hoverBlock.first().addClass('active');
                const firstImageAttr = $hoverBlock.first().attr("data-image");
                if (firstImageAttr) {
                    let firstImage = $thisBlock.find(".img-item")[0];
                    firstImage.src = firstImageAttr;
                }
            }
        });
    }
}