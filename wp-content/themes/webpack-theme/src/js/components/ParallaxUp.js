import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);


export default class ParallaxUp {
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
        const parallaxBlocks = gsap.utils.toArray(".parallax-block-wrap");
        parallaxBlocks.forEach((section) => {
            const parallaxElements = gsap.utils.toArray(section.querySelectorAll(".parallax-block"));
            gsap.from(parallaxElements, {
                y: (index, element) => {
                    return 100 + Math.random();
                },
                stagger: {
                    each: 0.1,
                    from: "random",
                },
                scrollTrigger: {
                    trigger: section,
                    start: "top bottom",
                    scrub: true,
                    end: "bottom 30%",
                },
            });
        });
    }
}