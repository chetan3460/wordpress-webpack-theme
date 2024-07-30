import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
export default class HeightCheck {
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
        let itemBlocks = document.querySelectorAll(".h-block");
        let firstItems = document.querySelectorAll(".h-block.v-one:first-child");

        function getImage(item){
            let dataImage = item.getAttribute("data-image");
            if (dataImage) {
                               let hBlockWrap = item.closest(".h-block-wrap");
                               let imgItem = hBlockWrap.querySelector(".img-item");
                               if (imgItem) {
                                    imgItem.classList.add("opacity-0")
                                    setTimeout(function(){
                                        imgItem.src = dataImage;
                                        imgItem.classList.remove("opacity-0")
                                    },500)
                               }
            }
        }
       
        itemBlocks.forEach(function (item) {
            let pTag = item.querySelector(".desc");
            if (pTag) {
                let computedStyle = window.getComputedStyle(pTag);
                let height = parseFloat(computedStyle.getPropertyValue("height"));
                let totalHeight = height;
                let blockHeightComputed = window.getComputedStyle(item);
                let blockHeight = parseFloat(blockHeightComputed.getPropertyValue("height"));
                item.setAttribute("data-height", blockHeight);
                pTag.setAttribute("data-height", totalHeight);
                let dataHeight = pTag.getAttribute("data-height");
                pTag.style.height = "0";
                item.addEventListener("mouseover", function () {
                    if (!item.classList.contains("active")) {
                        getImage(item);
                    }
                    itemBlocks.forEach(function (otherItem) {
                        otherItem.classList.remove("active");
                        otherItem.querySelector(".desc").style.height = "0";
                    });
                    if (!item.classList.contains("active")) {
                        item.classList.add("active");
                        pTag.style.height = dataHeight + "px";
                    }
                    ScrollTrigger.refresh();
                });
                // Mouseout event listener
                item.addEventListener("mouseout", function () {
                    if (item.classList.contains("v-two")) {
                        pTag.style.height = "0";
                        item.classList.remove("active");
                    }
                });
            }
        });

        function firstItemActive(){
            firstItems.forEach(function (firstItem) {
                            firstItem.classList.add("active");
                            let firstItemDesc = firstItem.querySelector(".desc");
                            let dataHeight = firstItemDesc.getAttribute("data-height");
                            firstItemDesc.style.height = dataHeight + "px";
                            getImage(firstItem);
                            ScrollTrigger.refresh();
            });
        }

        firstItemActive();

         ScrollTrigger.create({
            trigger: firstItems, 
            start: "top bottom",
            onEnter: () => {
                itemBlocks.forEach(function (otherItem) {
                        otherItem.classList.remove("active");
                        otherItem.querySelector(".desc").style.height = "0";
                });
               firstItemActive();
            },
         })

        
        ScrollTrigger.refresh();

        let timeoutId;
        window.addEventListener("resize", function (e) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            if (!document.body.classList.contains('mobile-tablet-device')) {
                location.reload();
            }
        }, 300); // Adjust the debounce time as needed
        });
    }
}