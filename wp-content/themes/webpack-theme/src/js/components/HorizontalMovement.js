import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default class HorizontalMovement {
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
  };

  bindEvents = () => {
    const horizontalSection = $(".h-movement h2");
    gsap.to(horizontalSection, {
      x: "-120vh",
      ease: "none",
      scrollTrigger: {
        invalidateOnRefresh: true,
        trigger: horizontalSection,
        start: "top bottom",
        scrub: 0.8,
        end: "bottom top",
      },
    });
  };
}
