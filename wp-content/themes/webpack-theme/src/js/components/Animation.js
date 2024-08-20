import { windowOn, sm, device_width } from "../utils";
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
    this.fadeInLeft();
    this.animateImage();


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

  // animate-image
  animateImage = () => {
    if (device_width > sm) {
      gsap.utils.toArray('.animate-image').forEach((el, index) => {
        let tl = gsap.timeline({
          scrollTrigger: {
            trigger: el,
            start: "-990 top",
            end: "990 top",
            toggleActions: "play none none none",
            markers: false,
          }
        })
        tl
          .set(el, { transformOrigin: 'center center' })
          .fromTo(el, {
            opacity: 0,
            scale: 0,
            y: "+=990"
          },
            {
              opacity: 1,
              scale: 1, y: 10,
              duration: 1,
              immediateRender: false,

            })
      })
    };
  }

  //Fade in Left Animation
  fadeInLeft = () => {
    // Get Device width
    if (device_width > sm) {
      gsap.set(".bdFadeLeft", { x: -80, opacity: 0 });
      const fadeArray = gsap.utils.toArray(".bdFadeLeft")
      fadeArray.forEach((item, i) => {
        let fadeTl = gsap.timeline({
          scrollTrigger: {
            trigger: item,
            start: "top center+=200",
          }
        })
        fadeTl.to(item, {
          x: 0,
          opacity: 1,
          ease: "power2.out",
          duration: 1,
        })
      })
    }

  };


}
