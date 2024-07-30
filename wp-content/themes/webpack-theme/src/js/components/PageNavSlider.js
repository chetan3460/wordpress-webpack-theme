import Swiper from "swiper";

export default class PageNavSlider {
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
        const sliders = document.querySelectorAll(".page-nav-slider");
        let swipers = [];
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
                    swipers.push(swiper);
            });
        }
        let sections = document.querySelectorAll(".section-block");
        let pageNav = document.querySelector(".page-nav");
        let pageNavPosition = document.querySelector(".page-nav-postion");
        let header = document.querySelector("header");
        let navLinks = document.querySelectorAll(".page-nav a");
        function isElementInViewport(el) {
            let rect = el.getBoundingClientRect();
            return (
                rect.top <= window.innerHeight / 2 &&
                rect.bottom >= window.innerHeight / 2
            );
        }
         $(document).on("click", ".page-nav a", function () {
            // Make sure this.hash has a value before overriding default behavior
            $(this).parent().addClass("active");
            $(this).parent().siblings().removeClass("active");
            if (this.hash !== "") {
                var hash = this.hash;
                $("html, body").animate(
                {
                    scrollTop: $(hash).offset().top - 100,
                },
                1200,
                function () {
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                }
                );
            } // End if
        });
        window.onscroll = () => {
                let sectionInView = false;
                sections.forEach((sec,index) => {
                    let id = sec.getAttribute("id");
                    if (isElementInViewport(sec)) {
                        sectionInView = true;
                        navLinks.forEach((links) => {
                        links.classList.remove("active");
                        });
                        document
                        .querySelector(".page-nav a[href='#" + id + "']")
                        .classList.add("active");
                        swipers.forEach(swiper => {
                            swiper.slideTo(index);
                        });
                    }
                });
                if (!sectionInView) {
                    navLinks.forEach((links) => {
                        links.classList.remove("active");
                    });
                }

                let rect = pageNavPosition.getBoundingClientRect();

                if (rect.top <= 0 && !header.classList.contains("sticky")) {
                    pageNav.classList.add("fixed");
                } else {
                    pageNav.classList.remove("fixed");
                }
        };
    }
}