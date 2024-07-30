import Swiper from "swiper";
import {Navigation, Thumbs, EffectFade,Pagination} from "swiper/modules";
import {gsap} from "gsap";

export default class ProductGallery {
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
        const sliders = document.querySelectorAll(".product-gallery");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                const swiperThumb = slider.querySelector(".product-thumb-block");
                const swiperGallery = slider.querySelector(".product-items");
                const swiperImages = slider.querySelectorAll(".product-images");
                const prevButton = slider.querySelector(".swiper-btn-prev");
                const nextButton = slider.querySelector(".swiper-btn-next");
                const totalCount = slider.querySelector(".t-count");
                const currentCount = slider.querySelector(".count-item");
                if (swiperThumb) {
                    const swiper = new Swiper(swiperThumb, {
                        spaceBetween: 15,
                        slidesPerView: "auto",
                        grid: {
                            rows: 2,
                        },
                        speed: 1000,
                        watchSlidesProgress: true,
                        on: {
                            init: function () {
                                const totalSlides = this.slides.length;
                                if (totalCount) {
                                    totalCount.textContent =
                                    totalSlides < 10 ? "/0" + totalSlides : totalSlides;
                                }
                            },
                        }
                    });
                    const swiper2 = new Swiper(swiperGallery, {
                        speed: 1000,
                        allowTouchMove: false,
                        modules: [Navigation, Thumbs,EffectFade],
                        effect: "fade",
                        crossFade: true,
                        autoHeight: false,
                        navigation: {
                        nextEl: nextButton,
                        prevEl: prevButton,
                        },
                        thumbs: {
                            swiper: swiper,
                        },
                        breakpoints: {
                            768: {
                               autoHeight: false,
                            },
                            320: {
                                autoHeight: true,
                            },
                        },
                        on: {
                            slideChange: function () {
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
                            },
                        }
                    });
                     swiperImages.forEach((swiperImage) => {
                        const swiper3 = new Swiper(swiperImage, {
                            slidesPerView: 1,
                            speed: 1000,
                            effect: "fade",
                            modules: [EffectFade,Pagination,Navigation],
                            loop: true,
                            crossFade: true,
                            pagination: {
                                el: swiperImage.querySelector(".swiper-pagination"),
                                clickable: true,
                            },
                            navigation: {
                                nextEl: swiperImage.querySelector(".next-block"),
                                prevEl: swiperImage.querySelector(".prev-block"),
                            },
                        });
                    });
                }
            });
        }
       
    }
}