import Swiper from "swiper";
import {gsap} from "gsap";
import { Navigation,Pagination,EffectFade } from "swiper/modules";

export default class Timeline {
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
        const allYears = document.querySelectorAll(".years-wrapper h2");
        gsap.to(allYears, {
            xPercent: -100,
            duration: 3,
            repeat: -1,
            ease: "linear"
        });
        const sliders = document.querySelectorAll(".timeline-block");
        if (sliders.length > 0) {
            sliders.forEach((slider) => {
                    const swiperContainer = slider.querySelector(".swiper");
                    const prevButton = slider.querySelector(".swiper-btn-prev");
                    const nextButton = slider.querySelector(".swiper-btn-next");
                    const sliderPagination = slider.querySelector(".swiper-pagination");
                    const mainImageContainer = slider.querySelector('.main-image');
                    const images = mainImageContainer.querySelectorAll('img');
                    const stackImageOne = slider.querySelector('.stack-image.one img');
                    const stackImageTwo = slider.querySelector('.stack-image.two img');
                    // Select the images in the main-image div
                    const mainImages = slider.querySelectorAll('.main-image .lazy-image');
                    const swiper = new Swiper(swiperContainer, {
                        slidesPerView: 1,
                        speed: 800,
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
                        on: {
                            slideNextTransitionStart: function () {
                                const currentSlideIndex = this.realIndex -1;
                                images.forEach((image, index) => {
                                        if (index === currentSlideIndex) {
                                            image.classList.add('in-active');
                                            const nextImage = images[index + 2];
                                            if (nextImage) {
                                                const nextImageSrc = nextImage.getAttribute('data-src');
                                                stackImageOne.classList.add("hide");
                                                setTimeout(function(){
                                                    stackImageOne.setAttribute('src', nextImageSrc);
                                                    stackImageOne.classList.remove("hide");
                                                },500)
                                            }else{
                                                 stackImageOne.classList.add("hide");
                                            }
                                            const imageAfterNext = images[index + 3];
                                            if (imageAfterNext) {
                                                const imageAfterNextSrc = imageAfterNext.getAttribute('data-src');
                                                stackImageTwo.classList.add("hide");
                                                setTimeout(function(){
                                                    stackImageTwo.setAttribute('src', imageAfterNextSrc);
                                                    stackImageTwo.classList.remove("hide");
                                                },600)
                                            }else{
                                                stackImageTwo.classList.add("hide");
                                            }
                                        } 
                                }); 
                            },
                            slidePrevTransitionStart: function () {
                                const currentSlideIndex = this.realIndex -1;
                                images.forEach((image, index) => {
                                        if (index === currentSlideIndex+1) {
                                            image.classList.remove('in-active');
                                            const prevImage = images[index - 1];
                                            if (prevImage) {
                                                const prevImageSrc = prevImage.getAttribute('data-src');
                                                stackImageOne.classList.add("hide");
                                                setTimeout(function(){
                                                    stackImageOne.setAttribute('src', prevImageSrc);
                                                    stackImageOne.classList.remove("hide");
                                                },500)
                                            }
                                            else{
                                                 stackImageOne.classList.add("hide");
                                            }
                                            const imageBeforePrev = images[index-2];
                                            if (imageBeforePrev) {
                                                const imageBeforePrevSrc = imageBeforePrev.getAttribute('data-src');
                                                stackImageTwo.classList.add("hide");
                                                setTimeout(function(){
                                                    stackImageTwo.setAttribute('src', imageBeforePrevSrc);
                                                    stackImageTwo.classList.remove("hide");
                                                },600)
                                            }else{
                                                stackImageTwo.classList.add("hide");
                                            }
                                        }
                                }); 
                            }
                        }
                    });
                    

                    // Function to update years in current years-wrapper
                    function updateYearsFirstLoad() {
                        const currentWrapper = slider.querySelector(".years-wrapper.current");
                        const activeSlide = slider.querySelector(".swiper-slide.swiper-slide-active");
                        const year = activeSlide.getAttribute("data-year");
                        currentWrapper.querySelectorAll("h2").forEach(h2 => {
                            h2.textContent = year;
                        });
                    }

                    // Initial update on slider init
                    updateYearsFirstLoad();

                    function updateYears() {
                        const nextWrapper = slider.querySelector(".years-wrapper.next");
                        const activeSlide = slider.querySelector(".swiper-slide.swiper-slide-active");
                        const year = activeSlide.getAttribute("data-year");
                        nextWrapper.querySelectorAll("h2").forEach(h2 => {
                            h2.textContent = year;
                        });
                    }

                    images.forEach((image, index) => {
                        image.style.zIndex = images.length - index; // Setting z-index based on index
                    });

                   
                    // Ensure there are at least three images in the main-image div
                    if (mainImages.length >= 3) {
                        const secondImageSrc = mainImages[1].getAttribute('data-src');
                        const thirdImageSrc = mainImages[2].getAttribute('data-src');
                        if (stackImageOne && stackImageTwo) {
                            stackImageOne.setAttribute('src', secondImageSrc);
                            stackImageTwo.setAttribute('src', thirdImageSrc);
                        }
                    }

                    const initialNextWrapper = slider.querySelector(".years-wrapper.next");
                    gsap.set(initialNextWrapper, { yPercent: 100 });
                    function YearAnimation(){
                        prevButton.classList.add("disabled");
                        nextButton.classList.add("disabled");
                        const currentWrapper = slider.querySelector(".years-wrapper.current");
                        const nextWrapper = slider.querySelector(".years-wrapper.next");
                        gsap.set(currentWrapper, { yPercent: 0 });
                        updateYears();
                        gsap.to(currentWrapper, {
                            yPercent: -100,
                            duration: 1,
                            ease: "Power4.inOut",
                            onComplete: () => {
                                gsap.set(currentWrapper, { yPercent: 100 });
                                currentWrapper.classList.remove("current");
                                currentWrapper.classList.add("next");
                                nextWrapper.classList.remove("next");
                                nextWrapper.classList.add("current");
                                prevButton.classList.remove("disabled");
                                nextButton.classList.remove("disabled");
                            }
                        });
                        gsap.to(nextWrapper, {
                            yPercent: 0,
                            duration: 1,
                            ease: "Power4.inOut"
                        });
                    }
                    nextButton.addEventListener("click", () => {
                        YearAnimation();
                    });
                    prevButton.addEventListener("click", () => {
                        YearAnimation();
                    });
            });
        }
    }
}