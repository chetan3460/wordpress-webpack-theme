
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
export default class StickyImageBlock {
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
        const itemBlocks = $(".sticky-img-block .item-block");
        const itemBlockFirst = $(".sticky-img-block .item-block:first-child");
        const imagesList = $(".sticky-img-block .images-list");
        const images = $(".sticky-img-block .images-list img");
        const wrap = $(".sticky-img-block .wrap");
        const pTags = $(".sticky-img-block .desc");
        itemBlockFirst.addClass("active");
        window.scrollTo(0, 0);
        pTags.slideUp("slow");
        ScrollTrigger.create({
            trigger: ".sticky-img-block",
            start: "top 70%",
            onEnter: () => {
                    itemBlocks.each(function() {
                        const itemOffsetTop = $(this).offset().top;
                        $(this).attr('data-offset', itemOffsetTop);
                    });
                    setTimeout(function(){
                        itemBlockFirst.find(".desc").slideDown("slow");
                        ScrollTrigger.refresh();
                    },400)
                    ScrollTrigger.refresh();
            }
        });
        let hoverTimeout;
        itemBlocks.each(function(index, item) {
            $(item).on("mouseover", function() {
                clearTimeout(hoverTimeout);
                hoverTimeout = setTimeout(() => {
                    if(!$(this).hasClass("active")){
                            const pTag = $(item).find(".desc");
                            itemBlocks.removeClass("active");
                            pTags.slideUp("1000");
                            $(item).addClass("active");
                            pTag.slideDown("1000");
                            images.removeClass("active");
                            //const itemOffsetTop = $(item).offset().top;
                            const itemOffsetTop = $(item).data('offset');
                            const wrapOffsetTop = wrap.offset().top;
                            const spaceBetween = itemOffsetTop - wrapOffsetTop;
                            images.eq(index).addClass("active");
                            gsap.to(imagesList, { y: spaceBetween-135, duration: 0.8 });
                            ScrollTrigger.refresh();
                    }
                 }, 200); // Adjust the delay as needed
            });

            $(item).on("mouseout", function() {
                 clearTimeout(hoverTimeout);
            });
        });

        let timeoutId;
        window.addEventListener("resize", function (e) {
        clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                if (!document.body.classList.contains('mobile-tablet-device')) {
                    location.reload();
                }
            }, 300); // Adjust the debounce time as needed
        });
    }
}