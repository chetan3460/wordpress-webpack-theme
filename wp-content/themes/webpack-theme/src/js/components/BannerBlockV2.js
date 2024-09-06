import gsap from "gsap/all";
import ScrollTrigger from "gsap/ScrollTrigger";
import { Linear } from "gsap";

export default class bannerBlockV2 {
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

        var heroCaptionParallax = gsap.to('.parallax-scroll-caption', {
            duration: 1,
            yPercent: 5,
            opacity: 0.5,
            ease: Linear.easeNone,
            scrollTrigger: {
                trigger: '#hero',
                start: "top top",
                end: () => `+=${$('#hero').outerHeight()}`,
                scrub: true,
            }
        });

        // end
    }
}
