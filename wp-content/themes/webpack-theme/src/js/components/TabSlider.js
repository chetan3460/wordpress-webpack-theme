import Swiper from "swiper";
import {EffectFade } from "swiper/modules";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default class TabSlider {
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
    const tabSections = document.querySelectorAll(
      ".tab-section-block"
    );

    

    if (tabSections.length > 0) {
      tabSections.forEach((tabSection) => {
        const slider = tabSection.querySelector(".tab-content");
        const swiper = new Swiper(slider, {
          slidesPerView: 1,
          speed: 1000,
          effect: "fade",
          //crossFade: true,
          allowTouchMove: false,
          autoHeight: true,
          modules: [EffectFade],
        });
        const buttons = tabSection.querySelectorAll(".free-slider .swiper-slide")
        buttons.forEach((button, buttonIndex) => {
          button.addEventListener("click", (event) => {
            event.preventDefault();
            // Remove active class from all buttons
            buttons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");
            swiper.slideTo(buttonIndex);
            setTimeout(function(){
              ScrollTrigger.refresh();
            },1000)
          });
        });
      });
    }
   
  };
}
