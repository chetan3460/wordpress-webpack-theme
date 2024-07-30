import Swiper from "swiper";

export default class FreeSlider {
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
        const sliders = document.querySelectorAll(".free-slider");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                    const swiper = new Swiper(slider, {
                        slidesPerView: "auto",
                        speed: 1000,
                        freeMode: true,
                        touchEventsTarget: "container",
                        breakpoints: {
                            767: {
                                spaceBetween: 30,
                            },
                            320: {
                                spaceBetween: 20,
                                slidesOffsetAfter: 20,
                            },
                        },
                    });
            });
        }
    }
}