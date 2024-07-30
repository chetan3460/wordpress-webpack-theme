import Swiper from "swiper";
import { Navigation } from "swiper/modules";

export default class GallerySlider {
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
        const sliders = document.querySelectorAll(".gallery-slider");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                const swiperContainer = slider.querySelector(".swiper");
                const prevButton = slider.querySelector(".swiper-btn-prev");
                const nextButton = slider.querySelector(".swiper-btn-next");
                if (swiperContainer) {
                    const swiper = new Swiper(swiperContainer, {
                        slidesPerView: 1,
                        speed: 1000,
                        spaceBetween: "20",
                        loop:true,
                        modules: [Navigation],
                        navigation: {
                            nextEl: nextButton,
                            prevEl: prevButton,
                        },
                        breakpoints: {
                            767: {
                                spaceBetween: "20",
                            },
                            320: {
                                spaceBetween: "10",
                            },
                        },
                    });
                    swiper.slideTo(1);
                }
            });
        }
    }
}