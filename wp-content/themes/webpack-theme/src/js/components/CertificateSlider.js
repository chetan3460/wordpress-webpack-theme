import Swiper from "swiper";
import { Navigation } from "swiper/modules";

export default class CertificateSlider {
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
        const sliders = document.querySelectorAll(".certificate-slider");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                const swiperContainer = slider.querySelector(".swiper");
                const prevButton = slider.querySelector(".swiper-btn-prev");
                const nextButton = slider.querySelector(".swiper-btn-next");
                if (swiperContainer) {
                    const swiper = new Swiper(swiperContainer, {
                        slidesPerView: 1,
                        speed: 600,
                        modules: [Navigation],
                        navigation: {
                            nextEl: nextButton,
                            prevEl: prevButton,
                        },
                    });
                    $(document).on("click", ".img-hover-block.type-one .item", function () {
                        var slideIndex = $(this).index();
                        swiper.slideTo(slideIndex);
                        setTimeout(function(){
                             $(".certificates-pop-up").addClass("active");
                            $("body").addClass("disable-scroll");
                        },200)
                    });
                    $(document).on(
                        "click",
                        ".certificates-pop-up .overlay-blurred,.certificates-pop-up .close-btn",
                        function () {
                            $(".certificates-pop-up").removeClass("active");
                            $("body").removeClass("disable-scroll");
                        }
                    );
                }
            });
        }
    }
}