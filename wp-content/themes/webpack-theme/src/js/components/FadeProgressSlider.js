import Swiper from "swiper";
import {gsap} from "gsap";
import { Navigation,Pagination,EffectFade } from "swiper/modules";

export default class FadeProgressSlider {
    constructor() {
        this.init();
    }

    init = () => {
        this.setDomMap();
        this.bindEvents();
    };

    setDomMap = () => {
    }

    bindEvents = () => {
        const sliders = document.querySelectorAll(".fade-progress-slider");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                const swiperContainer = slider.querySelector(".swiper");
                const prevButton = slider.querySelector(".swiper-btn-prev");
                const nextButton = slider.querySelector(".swiper-btn-next");
                const sliderPagination = slider.querySelector(".swiper-pagination");
                    const swiper = new Swiper(swiperContainer, {
                        slidesPerView: 1,
                        speed: 1000,
                        effect: "fade",
                        allowTouchMove: false,
                        autoHeight: true,
                            1024: {
                                spaceBetween: "0",
                                slidesPerView: "auto",
                            },
                        modules: [Navigation,Pagination,EffectFade],
                         pagination: {
                            el: sliderPagination,
                            type: "progressbar",
                        },
                        navigation: {
                            nextEl: nextButton,
                            prevEl: prevButton,
                        },
                        breakpoints: {
                            767: {
                                autoHeight: false,
                            },
                        },
                        on: {
                            slideChange: function () {
                                prevButton.classList.add("disabled");
                                nextButton.classList.add("disabled");
                                const currentSlideIndex = this.realIndex + 1; 
                                const currentCountElement = slider.querySelector(".current");
                                const contentTL = new gsap.timeline();
                                contentTL
                                    .to(
                                    ".current",
                                    0.4,
                                    { y: "-50%", autoAlpha: 0, ease: "power3.in", stagger: 0.1 },
                                    0
                                    )
                                    .set(".current", { y: "50%" });

                                setTimeout(function () {
                                    if (currentCountElement) {
                                        currentCountElement.textContent =
                                        currentSlideIndex < 10
                                            ? "0" + currentSlideIndex
                                            : currentSlideIndex;
                                    }
                                    gsap.to(".current", 0.6, {
                                    y: 0,
                                    autoAlpha: 1,
                                    ease: "power3.out",
                                    stagger: 0.1,
                                    });
                                    setTimeout(function(){
                                        prevButton.classList.remove("disabled");
                                        nextButton.classList.remove("disabled");
                                    },200);
                                },600);
                            },
                        },
                    });
            });
        }
    }
}