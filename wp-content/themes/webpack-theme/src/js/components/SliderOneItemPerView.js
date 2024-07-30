import Swiper from "swiper";

export default class SliderOneItemPerView {
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
        const sliders = document.querySelectorAll(".overflow-slider-one-item");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                if (slider) {
                    const swiper = new Swiper(slider, {
                        slidesPerView: 2,
                        speed: 1000,
                        spaceBetween: "10",
                        breakpoints: {
                            767: {
                                slidesPerView: "2.2",
                            },
                            320: {
                                slidesPerView: 1,
                            },
                        },
                    });
                }
            });
        }
    }
}