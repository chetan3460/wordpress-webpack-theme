import Swiper from "swiper";

export default class SolutionSlider {
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
        const sliders = document.querySelectorAll(".solution-slider");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                const swiperContainer = slider.querySelector(".swiper");
                if (swiperContainer) {
                    const swiper = new Swiper(swiperContainer, {
                        slidesPerView: "auto",
                        speed: 1000,
                        spaceBetween: "0",
                        breakpoints: {
                            1200: {
                                spaceBetween: "0",
                                slidesPerView: "auto",
                            },
                            992: {
                                spaceBetween: "20",
                                slidesPerView: "3.2",
                            },
                            767: {
                                spaceBetween: "20",
                                slidesPerView: "2.2",
                            },
                            320: {
                                spaceBetween: "20",
                                slidesPerView: "1.2",
                            },
                        },
                    });
                }
            });
        }
    }
}