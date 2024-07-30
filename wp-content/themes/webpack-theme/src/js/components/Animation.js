import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default class Animation {
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
    this.fadeInAnimation();
    this.fadeUpAnimation();
    this.fadeUpStagger();
    this.parallaxAnimation();

    // Function to refresh ScrollTrigger
    const refreshScrollTrigger = () => {
      ScrollTrigger.refresh();
      setTimeout(function () {
        ScrollTrigger.refresh();
      }, 1000);
    };

    // Function to trigger ScrollTrigger.refresh() on window load
    const onWindowFullyLoaded = () => {
      refreshScrollTrigger();
      // Optionally remove the event listener after it's been triggered
      window.removeEventListener("load", onWindowFullyLoaded);
    };
    // Add event listener for window fully loaded event
    window.addEventListener("load", onWindowFullyLoaded);
  };

  // fade In
  fadeInAnimation = () => {
    const fadeIn = document.querySelectorAll(".fade-in");
    if (fadeIn.length) {
      fadeIn.forEach((container) => {
        let fadeInTimeline = gsap.timeline({
          scrollTrigger: {
            trigger: container,
            start: "50px bottom",
          },
        });
        let delay = container.getAttribute("data-delay");
        fadeInTimeline.to(
          container,
          {
            opacity: 1,
            duration: 1,
            onComplete: () => {
              ScrollTrigger.refresh();
            },
          },
          delay
        );
      });
    }
  };

  // fade Up
  fadeUpAnimation = () => {
    const fadeUp = document.querySelectorAll(".fade-up");
    if (fadeUp.length) {
      fadeUp.forEach((container) => {
        let fadeUpTimeline = gsap.timeline({
          scrollTrigger: {
            trigger: container,
            start: "15% 100%",
          },
        });
        let delay = container.getAttribute("data-delay");
        fadeUpTimeline.to(
          container,
          {
            opacity: 1,
            y: 0,
            duration: 1,
          },
          delay
        );
      });
    }
  };

  //Parallax
  parallaxAnimation = () => {
    const parallax = document.querySelectorAll(".parallax-item");

    if (parallax.length) {
      parallax.forEach((container) => {
        let parallaxTimeline = gsap.timeline({
          scrollTrigger: {
            trigger: container,
            start: "top bottom",
            scrub: true,
            end: "bottom top",
          },
        });
        parallaxTimeline.to(container, {
          y: "-16%",
          ease: "none",
          onComplete: () => {
            ScrollTrigger.refresh();
          },
        });
      });
    }
  };

  // fade Up Stagger
  fadeUpStagger = () => {
    const fadeUpWrapper = gsap.utils.toArray(".fade-up-stagger-wrap");

    if (fadeUpWrapper.length) {
      fadeUpWrapper.forEach((fadeUpWrap) => {
        const fadeUp = fadeUpWrap.querySelectorAll(".fade-up-stagger");
        let delay = fadeUpWrap.getAttribute("data-delay");
        gsap.to(fadeUp, {
          scrollTrigger: {
            trigger: fadeUpWrap,
            start: "5% 100%",
          },
          opacity: 1,
          y: 0,
          duration: 1,
          delay: delay,
          stagger: 0.2,
        });
      });
    }
  };
}
