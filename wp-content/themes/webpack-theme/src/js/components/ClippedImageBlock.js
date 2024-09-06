import gsap from "gsap/all";
import ScrollTrigger from "gsap/ScrollTrigger";
import { Linear } from "gsap";

export default class clippedImageBlock {
    constructor() {
        this.init();
    }

    init = () => {
        this.setDomMap();
        this.bindEvents();
    };

    setDomMap = () => {
        // Define your DOM mapping here if necessary
    }

    bindEvents = () => {
        // Clipped Image 
        gsap.utils.toArray('.clipped-image-wrapper').forEach((clippedImageWrapper) => {

            const clippedImagePin = clippedImageWrapper.querySelector(".clipped-image-pin");
            const clippedImage = clippedImageWrapper.querySelector(".clipped-image");
            const clippedImageGradient = clippedImageWrapper.querySelector(".clipped-image-gradient");
            const clippedImageContent = clippedImageWrapper.querySelector(".clipped-image-content");

            gsap.set(clippedImageContent, { paddingTop: (window.innerHeight / 2) + clippedImageContent.offsetHeight });



            function setClippedImageWrapperProperties() {
                gsap.set(clippedImageContent, { paddingTop: "" });
                gsap.set(clippedImageGradient, { height: window.innerHeight * 0.3 });
                gsap.set(clippedImage, { height: window.innerHeight, });
                gsap.set(clippedImageContent, { paddingTop: (window.innerHeight / 2) + clippedImageContent.offsetHeight });
                gsap.set(clippedImageWrapper, { height: window.innerHeight + clippedImageContent.offsetHeight });

            }


            setClippedImageWrapperProperties();

            window.addEventListener('resize', setClippedImageWrapperProperties);

            gsap.to(clippedImageGradient, {
                scrollTrigger: {
                    trigger: clippedImagePin,
                    start: function () {
                        const startPin = 0;
                        return "top +=" + startPin;
                    },
                    end: function () {
                        const endPin = clippedImageContent.offsetHeight;
                        return "+=" + endPin;
                    },
                    scrub: true,
                },
                opacity: 1,
                y: 1
            });

            var clippedImageAnimation = gsap.to(clippedImage, {
                clipPath: 'inset(0% 0% 0%)',
                scale: 1,
                duration: 1,
                ease: 'Linear.easeNone'
            });

            var clippedImageScene = ScrollTrigger.create({
                trigger: clippedImagePin,
                start: function () {
                    const startPin = 0;
                    return "top +=" + startPin;
                },
                end: function () {
                    const endPin = clippedImageContent.offsetHeight;
                    return "+=" + endPin;
                },
                animation: clippedImageAnimation,
                scrub: 1,
                pin: true,
                pinSpacing: false,
            });

        });
        $('.has-mask-fill').each(function () {
            var words = $(this).text();
            var total = words;
            $(this).empty();
            $(this).append($("<span /> ").text(words));
        });
        var hasMaskFill = gsap.utils.toArray('.has-mask-fill');
        hasMaskFill.forEach(function (hMaskFill) {
            var spanFillMask = hMaskFill.querySelectorAll("span");
            gsap.to(spanFillMask, {
                scrollTrigger: {
                    trigger: hMaskFill,
                    start: "top 85%",
                    end: () => `+=${hMaskFill.offsetHeight * 2}`,
                    scrub: 1,
                },
                duration: 1,
                backgroundSize: "200% 100%",
                stagger: 0.5,
                ease: Linear.easeNone,
            });
        });


        // end
    }
}
