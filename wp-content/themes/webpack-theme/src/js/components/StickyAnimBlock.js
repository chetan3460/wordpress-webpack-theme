import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
import { isOverlapping } from "./Overlap";

export default class StickyAnimBlock {
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
        const contentBlock = document.querySelector(".sticky-anim-block .content-block");
        const numberBlock = document.querySelector(".sticky-anim-block .left p");
        const infoBlock = document.querySelectorAll(".sticky-anim-block .item");
        const infoBlockLast = document.querySelector(".sticky-anim-block .item:last-child");
        const counter = document.querySelector(".sticky-anim-block .counter");
        let totalItemCount = infoBlock.length;
        ScrollTrigger.create({
            trigger: contentBlock, 
            start: "top top",
            end: "bottom 60%",
            pin: numberBlock, 
            pinSpacing: false,
            onLeave: () => {
              counter.textContent = totalItemCount; // Update the counter with the total item count
              infoBlockLast.classList.add("active");
            },
            onUpdate: (self) => {
                infoBlock.forEach((content, index) => {
                    const overlap = isOverlapping(
                        contentBlock.querySelector(".overlap"),
                        content
                    );
                    if (overlap && !content.classList.contains("active")) {
                        if (parseInt(counter.textContent) !== index + 1) {
                            content.classList.add("active");
                            const contentTL = new gsap.timeline();
                            contentTL.to(
                                        counter,
                                        0.4,
                                        { y: "-50%", autoAlpha: 0, ease: "power3.in"},
                                        0
                                        )
                                        .set(counter, { y: "50%" });

                            setTimeout(function () {
                                        counter.textContent = index+1;
                                        gsap.to(counter, 0.4, {
                                        y: 0,
                                        autoAlpha: 1,
                                        ease: "power3.out",
                                        });
                            },400);
                        }
                    }else if (!overlap) {
                        content.classList.remove("active");
                    }
                });
            }
        });
        ScrollTrigger.refresh();
    }
}