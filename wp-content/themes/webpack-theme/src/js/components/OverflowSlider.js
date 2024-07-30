import Swiper from "swiper";
import { Navigation } from "swiper/modules";

export default class OverflowSlider {
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
        const sliders = document.querySelectorAll(".overflow-slider");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                const swiperContainer = slider.querySelector(".swiper");
                const prevButton = slider.querySelector(".swiper-btn-prev");
                const nextButton = slider.querySelector(".swiper-btn-next");
                const autoHeight = slider.classList.contains("auto-height");
                if (swiperContainer) {
                    const swiper = new Swiper(swiperContainer, {
                        slidesPerView: "auto",
                        speed: 1000,
                        spaceBetween: "30",
                        slidesOffsetAfter: 0,
                        autoHeight: autoHeight,
                        modules: [Navigation],
                        navigation: {
                            nextEl: nextButton,
                            prevEl: prevButton,
                        },
                        breakpoints: {
                            767: {
                                spaceBetween: "30",
                                slidesOffsetAfter: 0,
                            },
                            320: {
                                spaceBetween: "15",
                                slidesOffsetAfter: 20,
                            },
                        },
                    });
                }
            });
        }
    }
}