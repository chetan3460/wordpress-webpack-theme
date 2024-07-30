import Swiper from "swiper";
import { gsap} from "gsap";
import {EffectFade, Autoplay } from "swiper/modules";
import { SplitText } from "gsap/SplitText";
import { max767} from "../utils"

export default class BannerSlider {
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
        const bannerSlider = document.querySelector(".banner-slider");
        const captionTitle = $(".banner-block .caption h1");
        
        // const titleHeadingSplitText = new SplitText(captionTitle, {
        //     type: "words,lines",
        //     wordsClass: "word word++",
        //     linesClass: "line line++",
        //     });
        // const titleHeadingSplitTextWords = titleHeadingSplitText.lines;

        function clearAndSplitText(element) {
            // Clear the HTML content of the element
            //element.html('');

            // Initialize SplitText on the cleared element
            const splitText = new SplitText(element, {
                type: "words,lines",
                wordsClass: "word word++",
                linesClass: "line line++",
            });

            // Return the splitText object
            return splitText.lines;
        }

        const titleHeadingSplitTextWords = clearAndSplitText(captionTitle);

        if (bannerSlider) {
                    const progressBars = document.querySelectorAll(".p-bar");
                    const bannerCounts = document.querySelectorAll(".banner-count");
                    const swiper = new Swiper(bannerSlider, {
                        slidesPerView: 1,
                        speed: 1000,
                        effect: "fade",
                        loop: true,
                        crossFade: true,
                        autoplay: {
                            delay: 6000,
                            disableOnInteraction: false,
                        },
                        touchEventsTarget: "container",
                        modules: [EffectFade, Autoplay],
                        on: {
                            autoplayTimeLeft(s, time, progress) {
                                if(progress==1){
                                    progressBars.forEach((progressBar) => {
                                        progressBar.style.setProperty("width", "0%");
                                    });
                                    
                                }else{
                                    const activeIndex = s.realIndex
                                    const activeProgressBar = progressBars[activeIndex];
                                    activeProgressBar.style.setProperty("width", `${100 * (1-progress)}%`);
                                } 
                            },
                            slideChangeTransitionStart: function () {

                                const activebannerCount = bannerCounts[this.realIndex];
                                const currentSlideIndex = this.realIndex; 
                                bannerCounts.forEach((bannerCount) => {
                                        bannerCount.classList.remove("active");
                                });
                                freeSlider.slideTo(currentSlideIndex);
                                setTimeout(function(){
                                    activebannerCount.classList.add("active");
                                },100)

                                console.log("before st");
                                let captionTitleBlock = $(".banner-block .caption h1");
                                let captionTitleDiv = $(".banner-block .caption h1 .line");
                                gsap.to(captionTitleDiv, {
                                    duration: 0.8,
                                    autoAlpha: 0,
                                    y: "-50%",
                                    ease: "Power2.easeOut",
                                    stagger: 0.2,
                                    onComplete: function () {
                                         console.log("com st");
                                         gsap.set(captionTitleBlock, {
                                                autoAlpha: 0,
                                         });
                                         gsap.set(captionTitleDiv, {
                                                y: "100%",
                                                autoAlpha: 0,
                                         });

                                        captionTitle.html('');
                                        captionTitle.html('Suman George Mathew');
                                        const titleHeadingSplit = clearAndSplitText(captionTitle);
                                        gsap.set(captionTitleBlock, {
                                                autoAlpha: 1,
                                        });
                                        console.log(titleHeadingSplit);
                                        gsap.to(titleHeadingSplit, {
                                                    duration: 1,
                                                    autoAlpha: 1,
                                                    y: "0%",
                                                    ease: "Power2.easeOut",
                                                    stagger: 0.2,
                                        });
                                    },
                                });
                            }
                        }
                    });
        
                    const bannerFreeSlide = document.querySelector(".banner-free-slide");
                    let freeSlider = new Swiper(bannerFreeSlide, {
                                    slidesPerView: "auto",
                                    speed: 1000,
                                    freeMode: true,
                                    touchEventsTarget: "container",
                    });
                    
        }

        function bannerAnimation() {
            const header = $("header .max-container");
            const bannerBlock = $(".banner-block");
            const bannerSlider = $(".banner-block .banner-slider");
            const captionSubTitle = $(".banner-block .caption h2");
            const videoBlock = $(".banner-block .video-block");
            const bannerFreeSliderFirstCount = $(".banner-free-slide .swiper-slide:first-child p")
            const bannerFreeSliderProgressBlock = $(".banner-free-slide .progress-block")
            const bannerFreeSliderTitle = $(".banner-free-slide h3")
           
            const duration2000 = 0.2;
            const duration4000 = 0.4;
            const duration6000 = 0.6;
            const duration8000 = 0.8;
            const duration10000 = 1;

            gsap.to(bannerBlock, {
                    clipPath: "polygon(0 100%, 100% 100%, 100% 0%, 0 0%)",
                    duration: max767.matches ? duration8000 : duration10000,
                    ease: "Power3.easeInOut",
                    onComplete: function () {
                        fullAnimation();
                    },
            });

            gsap.to(bannerSlider, {
                scale: 1,
                duration: max767.matches ? duration8000 : duration10000,
                delay:max767.matches ? duration2000 : duration4000,
                ease: "Power1.easeOut",
            });
          
            function fullAnimation(){
                gsap.to(header, {
                    clipPath: "polygon(0 100%, 100% 100%, 100% 0%, 0 0%)",
                    duration: max767.matches ? duration6000 : duration8000,
                    ease: "0.25,0.1,0.25,1",
                });
                gsap.to(captionSubTitle, {
                    autoAlpha: 1,
                    y:0,
                    duration: max767.matches ? duration6000 : duration8000,
                    ease: "Power3.easeOut"
                });
                gsap.to(titleHeadingSplitTextWords, {
                    duration: max767.matches ? duration6000 : duration10000,
                    autoAlpha: 1,
                    y: 0,
                    ease: "Power2.easeOut",
                    stagger: 0.2,
                    onStart: function () {
                        bannerFreeSliderFirstCount.addClass("active");
                        gsap.to(bannerFreeSliderProgressBlock, {
                            width: "100%",
                            duration: max767.matches ? duration6000 : duration8000,
                            delay:max767.matches ? 0 : 0.2,
                            ease: "Power3.easeOut"
                        });
                        gsap.to(bannerFreeSliderTitle, {
                            autoAlpha: 1,
                            y:0,
                            duration: max767.matches ? duration6000 : duration8000,
                            delay:max767.matches ? 0 : 0.3,
                            ease: "Power3.easeOut"
                        });
                    },
                });
                gsap.to(videoBlock, {
                    scale: 1,
                    autoAlpha: 1,
                    duration: max767.matches ? duration8000 : duration10000,
                    ease: "Power1.easeOut",
                    onComplete: function () {
                        setTimeout(function(){
                            lazy();
                        },3000)
                    },
                });
            }    
        }

        
        // var firstImage = document.querySelector(".first-image");
        // if (firstImage) {
        //         var load = firstImage.complete;
        //         if (load) {
        //             bannerAnimation();
        //         }
        // }

        bannerAnimation();

        function lazy() {
            const videoLazy = document.querySelectorAll(
                ".banner-slider .b-lazy-video"
            );
            const imageLazy = document.querySelectorAll(
                ".banner-slider .b-lazy-image"
            );
            imageLazy.forEach((image) => {
                if (!image.classList.contains("loaded")) {
                image.classList.add("loaded");
                let imgDataSrc = image.getAttribute("data-src");
                if (imgDataSrc) {
                    image.setAttribute("src", imgDataSrc);
                    image.onload = function () {
                    image.classList.add("loaded-full-image");
                    };
                }
                }
            });
            videoLazy.forEach(function (video) {
                if (!video.classList.contains("loaded")) {
                let videoDataSrc = video.getAttribute("data-src");
                let newSource = document.createElement("source");
                newSource.setAttribute("src", videoDataSrc);
                video.classList.add("loaded");
                video.appendChild(newSource);
                video.removeAttribute("data-src");
                }
            });
        }
       
    }
}