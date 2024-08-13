import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import SplitType from 'split-type';
import Lenis from "lenis";

gsap.registerPlugin(ScrollTrigger);

export default class PartnerSlider {
    constructor() {
        this.init();
    }

    init = () => {
        this.setDomMap();
        this.bindEvents();
    };

    setDomMap = () => {
        // Define your DOM mapping here if necessary
    }

    bindEvents = () => {
        // Initialize Lenis
        const lenis = new Lenis({
            lerp: 0.1, // Smoothing factor
            smooth: true, // Enable smooth scrolling
        });

        function homePart() {
            let typeOpts = {
                lines: { type: 'lines', linesClass: 'g-lines' },
                words: { type: 'words,lines', linesClass: 'g-lines' },
                chars: { type: 'chars,words,lines', linesClass: 'g-lines' }
            };
            // let gOpts = {
            //     ease: 'power2.easeOut'
            // };
            ScrollTrigger.create({
                trigger: '.home-part',
                start: 'top bottom',
                once: true,
                onEnter: () => {
                    const homePartLabel = new SplitType('.home-part__label', typeOpts.chars)
                    const homePartTitle = new SplitType('.home-part__title', typeOpts.words);
                    let tl = gsap.timeline({
                        scrollTrigger: {
                            trigger: '.home-part__head',
                            start: 'top top+=65%',
                        },
                        defaults: {
                            ease: 'power2.easeOut'
                        },
                        onComplete: () => {
                            homePartLabel.revert()
                            homePartTitle.revert()
                            new SplitType('.home-part__title', typeOpts.lines);
                        }
                    })
                    tl
                        .from(homePartLabel.chars, { yPercent: 60, autoAlpha: 0, duration: .4, stagger: .02 })
                        .from(homePartTitle.words, { yPercent: 60, autoAlpha: 0, duration: .4, stagger: .02 }, '<=.2')
                        .from('.home-part__btn', { yPercent: 60, autoAlpha: 0, duration: .4 }, '<=.2')

                    // Update width based on container's current width
                    let tlDur;
                    let parentWidth = $('.home-part__marquee-wrapper').width();

                    if ($(window).width() <= 767) {
                        $('.home-part__marquee-wrapper .home-part__main-item').css('width', `${parentWidth / 2}px`);
                        tlDur = 20;
                    } else if ($(window).width() <= 991) {
                        $('.home-part__marquee-wrapper .home-part__main-item').css('width', `${parentWidth / 4}px`);
                        tlDur = 30;
                    } else {
                        $('.home-part__marquee-wrapper .home-part__main-item').css('width', `${parentWidth / 6}px`);
                        tlDur = 40;
                    }

                    let cloneItem = $('.home-part__marquee-wrapper .home-part__marquee-item').eq(0).clone();
                    cloneItem.clone().appendTo('.home-part__marquee-wrapper.--right')
                    cloneItem.clone().appendTo('.home-part__marquee-wrapper.--left')

                    let tlMarquee = gsap.timeline({
                        repeat: -1,
                        onUpdate: () => {
                            let tlDir = lenis.direction >= 0 ? 1 : -1;
                            gsap.to(tlMarquee, { timeScale: tlDir * Math.min(Math.max(lenis.velocity / 2, 1), 4), duration: .1, ease: 'none' })
                        }
                    })
                    tlMarquee.seek(28800)
                    tlMarquee
                        .to('.home-part__marquee-wrapper.--right .home-part__marquee-item', { xPercent: -100, duration: tlDur, ease: 'none' })
                        .to('.home-part__marquee-wrapper.--left .home-part__marquee-item', { xPercent: 100, duration: tlDur, ease: 'none' }, 0)

                    let tlItems = gsap.timeline({
                        scrollTrigger: {
                            trigger: '.home-part__main-supporters',
                            start: 'top top+=65%',
                        }
                    })
                    tlItems
                        .from('.home-part__main-supporters .home-part__marquee-wrapper.--right .home-part__main-item', { autoAlpha: 0, duration: .8, stagger: .04, clearProps: 'transform' })
                        .from('.home-part__main-supporters .home-part__marquee-wrapper.--left .home-part__main-item', { autoAlpha: 0, duration: .8, stagger: .04, clearProps: 'transform' }, 0)

                }
            })
        }
        homePart();

        // RequestAnimationFrame to update Lenis
        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);
    }
}
