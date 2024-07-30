import Swiper from "swiper";
import { Navigation,Pagination } from "swiper/modules";
import {gsap} from "gsap";

export default class NewsSlider {
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
        const sliders = document.querySelectorAll(".news-slider");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                const swiperContainer = slider.querySelector(".swiper");
                const prevButton = slider.querySelector(".swiper-btn-prev");
                const nextButton = slider.querySelector(".swiper-btn-next");
                const sliderPagination = slider.querySelector(".swiper-pagination");
                const currentCount = slider.querySelector(".count-item");
                const totalCount = slider.querySelector(".t-count");
                const isNoLoop = slider.classList.contains("no-loop");
                if (swiperContainer) {
                    const swiper = new Swiper(swiperContainer, {
                        slidesPerView: "auto",
                        speed: 1000,
                        spaceBetween: "20",
                        loop: !isNoLoop,
                        slidesOffsetAfter: 30,
                        watchSlidesProgress: true,
                        on: {
                            init: function () {
                                if(currentCount){
                                    const totalSlides = this.slides.length;
                                    if (totalCount) {
                                        totalCount.textContent =
                                        totalSlides < 10 ? "/0" + totalSlides : totalSlides;
                                    }
                                }
                            },
                            slideChange: function () {
                                 if(currentCount){
                                    const currentSlideIndex = this.realIndex + 1;
                                    const contentTL = new gsap.timeline();
                                    contentTL
                                        .to(
                                        currentCount,
                                        0.4,
                                        { y: "-50%", autoAlpha: 0, ease: "power3.in", stagger: 0.1 },
                                        0
                                        )
                                        .set(currentCount, { y: "50%" });

                                    setTimeout(function () {
                                        if (currentCount) {
                                            currentCount.textContent =
                                            currentSlideIndex < 10
                                                ? "0" + currentSlideIndex
                                                : currentSlideIndex;
                                        }
                                        gsap.to(currentCount, 0.6, {
                                            y: 0,
                                            autoAlpha: 1,
                                            ease: "power3.out",
                                            stagger: 0.1,
                                        });
                                    },600);
                                 }   
                            },
                        },
                        modules: [Navigation,Pagination],
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
                                spaceBetween: "30",
                            },
                            320: {
                                spaceBetween: "15",
                            },
                        },
                    });
                }
            });
        }
    }
}