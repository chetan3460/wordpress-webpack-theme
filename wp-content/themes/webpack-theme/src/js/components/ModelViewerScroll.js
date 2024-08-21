
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { hexToRgbToDecimal } from "../utils";

gsap.registerPlugin(ScrollTrigger);
export default class ModelViewerScroll {
    constructor() {
        this.init();
    }

    init = () => {
        this.setDomMap();
        this.initModelAnimation();
    };

    setDomMap = () => {
        this.window = $(window);
        this.body = $("body");
        this.modelContainer = document.querySelector("#webgi-canvas-container");
        this.model = document.querySelector("#scroll-3d");
    }

    canvasStatic = () => {
        const mainHeight = $("main").outerHeight();
                const lastSectionHeight = $("main > section:last-of-type").outerHeight();
                // const scrollHeight = mainHeight - lastSectionHeight;
 
                const topOffset = this.window.scrollTop();

        const cssObj = {
            width: $(this.modelContainer).width(),
            height: $(this.modelContainer).height(),
            // top: $("main > section:last-of-type").offset().top - 100,
            top: topOffset,
            position: "absolute",
        };

        $(this.modelContainer).css(cssObj)
    }

    initModelAnimation = () => {
        const [material] = this.model.model.materials;
        let colorString = hexToRgbToDecimal("#000000");


        let color = colorString.split(',')
        material.pbrMetallicRoughness.setBaseColorFactor(color);
        material.pbrMetallicRoughness.setMetallicFactor(0);
        material.pbrMetallicRoughness.setRoughnessFactor(0.67);

        this.model.animationName = "NBK+TowerAction"

        // const effect = this.model.querySelector("effect-composer");

        // let threeRenderer;
        // let scene;
        // let toneMV = this.model

        // for (let p = toneMV; p != null; p = Object.getPrototypeOf(p)) { // Loop through toneMV object
        //     const privateAPI = Object.getOwnPropertySymbols(p); // Get symbols (private API)
        //     const renderer = privateAPI.find((value) => value.toString() == 'Symbol(renderer)'); // Find the "renderer" Symbol

        //     const sceneSym = privateAPI.find((value) => value.toString() == 'Symbol(scene)'); // Find the "scene" Symbol
            
            

        //     if (renderer != null) { // If renderer was found
        //         threeRenderer = toneMV[renderer].threeRenderer; // set threeRenderer to the threeRenderer object
        //     }
        //     if (sceneSym != null) { // Same with scene
        //         scene = toneMV[sceneSym];
        //         // scene.name  = "Camera_main"
        //         scene.playAnimation("NBK+TowerAction")
        //     }
        //     if (threeRenderer != null && scene != null) { // If both are found, break out of the loop, as we have what we need
        //         break;
        //     }
        // }


        let duration = 0;
        this.model.play();
        duration = this.model.duration;
        this.model.pause();

        gsap.to(this.model, {
            duration: 0.1,
            currentTime: 0.71,
        })

        // this.model.addEventListener('camera-change', (event) => {
        //     console.log({
        //         "Target": this.model.getCameraTarget(),
        //         "Orbit": this.model.getCameraOrbit(),
        //         "FieldOfView": this.model.getFieldOfView(),
        //     })
        // });

        gsap.to(this.model, {
            opacity: 1,
            duration: 2,
            delay: 0.2,
            // currentTime: 4.2,
            onComplete: () => {
                duration = this.model.duration;

                const mainHeight = $("main").outerHeight();
                const lastSectionHeight = $("main > section:last-of-type").outerHeight();
                const scrollHeight = mainHeight - lastSectionHeight - 100;

                let tl = gsap.timeline({
                    scrollTrigger: {
                        start: "top top",
                        end: `top+=${scrollHeight}px top`,
                        scrub: 1.5
                    }
                })
                tl.to(this.model, {
                    currentTime: duration - 0.01,
                    // ease: "none",
                });
                
                const t2 = gsap.timeline();

                t2.to(this.model, {
                    fieldOfView: "2.591873521146019deg",
                    cameraOrbit: "0.7061905239767663rad 1.5084638696907116rad 119.16908334875183m",
                    cameraTarget: "15.076528989123982m 6.298547886191598m 12.149226637924277m",
                    scrollTrigger: {
                        trigger: ".banner",
                        start: "5%",
                        // end: `top center`,
                        end: `150%`,
                        scrub: 1.5,
                        // markers: true,
                        immediateRender: false
                    },
                })
                t2.to(this.model, {
                    fieldOfView: "3.1357148729348756deg",
                    cameraOrbit: "0.7061905239767663rad 1.5084638696907116rad 159.5352938234032m",
                    cameraTarget: "14.0132m 7.2479m 9.3371m",
                    scrollTrigger: {
                        trigger: ".dropdown-button-section",
                        start: "top bottom",
                        end: `top+=800px top`,
                        scrub: 1.5,
                        immediateRender: false
                    },
                })
                t2.to(this.model, {
                    fieldOfView: "3.5deg",
                    cameraOrbit: "0.7061905239767663rad 1.5084638696907116rad 280.0093322638742m",
                    cameraTarget: "3.04002976356818m 12.689507704044422m -2.0795230607366038m",
                    scrollTrigger: {
                        trigger: ".latest-news--trigger",
                        start: "top bottom",
                        // end: `top+=400px top`,
                        end: `top center`,
                        scrub: 1.5,
                        immediateRender: false,
                        onLeave: () => {
                            // this.canvasStatic();
                        },
                        onEnterBack: () => {
                            // $(this.modelContainer).css({
                            //     width: "",
                            //     height: "",
                            //     top: "",
                            //     position: ""
                            // });
                        },
                    },
                })
             
            }
        })
    }
}