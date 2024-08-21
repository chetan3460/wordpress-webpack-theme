
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { hexToRgbToDecimal } from "../utils";

gsap.registerPlugin(ScrollTrigger);
export default class ModelViewerScrollWithControls {
    constructor() {
        this.init();
    }

    init = () => {
        this.setDomMap();
        // this.bindEvents();
        this.initModelAnimation();
        // this.controls();
    };

    setDomMap = () => {
        this.window = $(window);
        this.body = $("body");
        this.modelContainer = document.querySelector("#webgi-canvas-container");
        this.model = document.querySelector("#scroll-3d");

        this.roll = document.querySelector('#roll');
        this.pitch = document.querySelector('#pitch');
        this.yaw = document.querySelector('#yaw');
        this.theta = document.querySelector('#theta');
        this.phi = document.querySelector('#phi');
        this.radius = document.querySelector('#radius');
        this.x = document.querySelector('#x');
        this.y = document.querySelector('#y');
        this.z = document.querySelector('#z');
        this.exposure = document.querySelector('#exposure');
    }

    vw = (pixels) => {
        var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        return (pixels * w) / 1440;
    }

    canvasStatic = () => {
        const cssObj = {
            width: $(this.modelContainer).width(),
            height: $(this.modelContainer).height(),
            top: $("main > section:last-of-type").offset().top,
            position: "absolute",
        };

        $(this.modelContainer).css(cssObj)
    }

    initModelAnimation = () => {

        this.model.addEventListener("load", (ev) => {

            const [material] = this.model.model.materials;
            let colorString = hexToRgbToDecimal("#000000");

            let color = colorString.split(',')
            material.pbrMetallicRoughness.setBaseColorFactor(color);
            material.pbrMetallicRoughness.setMetallicFactor(0);
            material.pbrMetallicRoughness.setRoughnessFactor(0.67);

            // let metalnessDisplay = document.querySelector("#metalness-value");
            // let roughnessDisplay = document.querySelector("#roughness-value");
            // let exposureDisplay = document.querySelector("#exposure-value");

            // document.querySelector('#metalness').addEventListener('input', (event) => {
            //     material.pbrMetallicRoughness.setMetallicFactor(event.target.value);
            //     metalnessDisplay.textContent = event.target.value;
            // });

            // document.querySelector('#roughness').addEventListener('input', (event) => {
            //     material.pbrMetallicRoughness.setRoughnessFactor(event.target.value);
            //     roughnessDisplay.textContent = event.target.value;
            // });
            // document.querySelector('#exposure').addEventListener('input', (event) => {
            //     this.model.exposure = event.target.value
            //     exposureDisplay.textContent = event.target.value;
            // });

            // this.model.exposure = 0.5;

            setTimeout(() => {
                gsap.to(this.model, {
                    opacity: 1,
                    duration: 2.5,
                    delay: 3.5,
                    onComplete: () => {
                        this.model.animationName = "Node_27Action.001"

                        let duration = 0;
                        this.model.play();
                        duration = this.model.duration;
                        this.model.pause();
                        this.model.currentTime = 0;
                        //Section 1

                        const mainHeight = $("main").outerHeight();
                        const lastSectionHeight = $("main > section:last-of-type").outerHeight();
                        const scrollHeight = mainHeight - lastSectionHeight;
                        let tl = gsap.timeline({
                            scrollTrigger: {
                                start: "top top",
                                end: `top+=${scrollHeight}px top`,
                                scrub: true,
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
                            }
                        })
                        tl.to(this.model, {
                            currentTime: duration - 0.01,
                            // duration: duration,
                            ease: "none",
                        });
                        // tl.to(this.model, {
                        //     currentTime: 0,
                        //     scrollTrigger: {
                        //         trigger: ".banner",
                        //         start: "top bottom",
                        //         // end: "top center",
                        //         end: "+=5000s",
                        //         scrub: true,
                        //         immediateRender: false,
                        //         onUpdate: () => {
                        //             // this.model.play();
                        //             // this.model.pause();
                        //             // this.model.jumpCameraToGoal()
                        //             // this.model.updateFraming()
                        //         }
                        //     },
                        // }).to(this.model, {
                        //     currentTime: duration,
                        //     scrollTrigger: {
                        //         trigger: ".slider-with-tabs",
                        //         start: "top bottom",
                        //         end: "top center",
                        //         scrub: true,
                        //         immediateRender: false,
                        //         onUpdate: () => {
                        //             // this.model.jumpCameraToGoal()
                        //             // this.model.updateFraming()
                        //         }
                        //     },
                        // })
                        /*.to(this.model, {
                            currentTime: 2,
                            scrollTrigger: {
                                trigger: ".stats-section",
                                start: "top bottom",
                                end: "top center",
                                scrub: true,
                                markers: true,
                                immediateRender: false,
                                onUpdate: () => {
                                    // this.model.jumpCameraToGoal()
                                    // this.model.updateFraming()
                                }
                            },
                        }).to(this.model, {
                            currentTime: 3,
                            scrollTrigger: {
                                trigger: ".dropdown-button-section",
                                start: "top bottom",
                                end: "top center",
                                scrub: true,
                                immediateRender: false,
                                onUpdate: () => {
                                    // this.model.jumpCameraToGoal()
                                    // this.model.updateFraming()
                                }
                            },
                        }).to(this.model, {
                            currentTime: 4,
                            scrollTrigger: {
                                trigger: ".two-column-content-with-cards",
                                start: "top bottom",
                                end: "top center",
                                scrub: true,
                                immediateRender: false,
                                onUpdate: () => {
                                    // this.model.jumpCameraToGoal()
                                    // this.model.updateFraming()
                                }
                            },
                        }).to(this.model, {
                            currentTime: 7,
                            scrollTrigger: {
                                trigger: ".slider-with-tabs",
                                start: "top bottom",
                                end: "top center",
                                scrub: true,
                                immediateRender: false,
                                onUpdate: () => {
                                    // this.model.jumpCameraToGoal()
                                    // this.model.updateFraming()
                                }
                            },
                        })*/
                    }
                })
            }, 500)
        })
    }

    controls = () => {
        // this.roll.addEventListener('input', () => {
        //     this.updateOrientation();
        // });
        // this.pitch.addEventListener('input', () => {
        //     this.updateOrientation();
        // });
        // this.yaw.addEventListener('input', () => {
        //     this.updateOrientation();
        // });

        this.theta.addEventListener('input', () => {
            this.updatePosition();
        });
        this.phi.addEventListener('input', () => {
            this.updatePosition();
        });
        this.radius.addEventListener('input', () => {
            this.updatePosition();
        });

        // this.x.addEventListener('input', () => {
        //     this.updateTarget();
        // });
        // this.y.addEventListener('input', () => {
        //     this.updateTarget();
        // });
        // this.z.addEventListener('input', () => {
        //     this.updateTarget();
        // });
        // this.exposure.addEventListener('input', () => {
        //     this.updateExposure();
        // });
    }

    setupScrollAnimation = () => {

        // gsap.fromTo(this.model, {
        //     cameraOrbit: "-90.45deg 87.06deg 59.05%",
        //     cameraTarget: "0.85m -0.08m 0m"
        // },{
        //     cameraOrbit: "-90.45deg 79.43deg 63.13%",
        //     cameraTarget: "2.93m -0.08m 0m",
        //     duration: 2,
        //     ease: "none",
        // })


        // gsap.to(this.model, {
        //     cameraOrbit: "0deg 0deg 0%",
        //     duration: 2,
        //     ease: "none",
        // })
        // gsap.to(this.model, {
        //     cameraTarget: "-1.1m 3m 1.2m",
        //     duration: 2,
        //     ease: "none",
        // })

        const tl = gsap.timeline();

        //Section 1
        tl.to(this.model, {
            orientation: "3deg 5deg -45deg",
            scrollTrigger: {
                trigger: ".banner",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })
        tl.to(this.model, {
            cameraOrbit: "0deg 0deg 0%",
            scrollTrigger: {
                trigger: ".banner",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })
        tl.to(this.model, {
            cameraTarget: "-1.1m 3m 1.2m",
            scrollTrigger: {
                trigger: ".banner",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })

        //Section 2
        tl.to(this.model, {
            orientation: "-2deg -20deg -180deg",
            scrollTrigger: {
                trigger: ".stats-section",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })
        tl.to(this.model, {
            cameraTarget: "1.8m 4m 1m",
            scrollTrigger: {
                trigger: ".stats-section",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })

        //Section 3
        tl.to(this.model, {
            orientation: "9deg 16deg 1deg",
            scrollTrigger: {
                trigger: ".dropdown-button-section",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })
        tl.to(this.model, {
            cameraTarget: "-1.7m 4m 1.1m",
            scrollTrigger: {
                trigger: ".dropdown-button-section",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })

        //Section 4
        tl.to(this.model, {
            orientation: "19deg -3deg 90deg",
            scrollTrigger: {
                trigger: ".two-column-content-with-cards",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })
        tl.to(this.model, {
            cameraTarget: "0m 4m 2m",
            scrollTrigger: {
                trigger: ".two-column-content-with-cards",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })


        //Section 5
        tl.to(this.model, {
            orientation: "-0.1deg 76deg 180deg",
            scrollTrigger: {
                trigger: ".slider-with-tabs",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })
        tl.to(this.model, {
            cameraTarget: "0.6m 2m -0.1m",
            scrollTrigger: {
                trigger: ".slider-with-tabs",
                start: "top bottom",
                end: "top center",
                scrub: true,
                immediateRender: false
            },
        })

        // tl.to(this.model, {
        //     attr: {
        //         ['camera-orbit']: "0deg 50deg 50%",
        //         ['camera-target']: "-1.1m 3m 1.2m",
        //     },
        //     scrollTrigger: {
        //         trigger: ".banner",
        //         start: "top bottom",
        //         end: "top center",
        //         scrub: true,
        //         immediateRender: false
        //     },
        // }).to(this.model, {
        //     attr: {
        //         ['camera-orbit']: "-60deg 60deg 50%",
        //         ['camera-target']: "1.8m 4m 1m",
        //     },
        //     scrollTrigger: {
        //         trigger: ".stats-section",
        //         start: "top bottom",
        //         end: "top center",
        //         scrub: true,
        //         immediateRender: false
        //     },
        // }).to(this.model, {
        //     attr: {
        //         ['camera-orbit']: "44deg 83deg 50%",
        //         ['camera-target']: "-1.7m 4m 1.1m",
        //     },
        //     scrollTrigger: {
        //         trigger: ".dropdown-button-section",
        //         start: "top bottom",
        //         end: "top center",
        //         scrub: true,
        //         immediateRender: false
        //     },
        // }).to(this.model, {
        //     attr: {
        //         ['camera-orbit']: "0deg 50deg 50%'",
        //         ['camera-target']: "0m 4m 2m",
        //     },
        //     scrollTrigger: {
        //         trigger: ".two-column-content-with-cards",
        //         start: "top bottom",
        //         end: "top center",
        //         scrub: true,
        //         immediateRender: false
        //     },
        // }).to(this.model, {
        //     attr: {
        //         ['camera-orbit']: "-60deg 60deg 50%",
        //         ['camera-target']: "0.6m 2m -0.1m",
        //     },
        //     scrollTrigger: {
        //         trigger: ".slider-with-tabs",
        //         start: "top bottom",
        //         end: "top center",
        //         scrub: true,
        //         immediateRender: false
        //     },
        // })
    }

    // updateOrientation = () => {
    //     this.model.orientation = `${this.roll.value}deg ${this.pitch.value}deg ${this.yaw.value}deg`;
    //     this.updateValues()
    // };

    updatePosition = () => {
        this.model.cameraOrbit = `${this.theta.value}deg ${this.phi.value}deg ${this.radius.value}%`;

        this.updateValues()
    };

    updateTarget = () => {
        this.model.cameraTarget = `${this.x.value}m ${this.y.value}m ${this.z.value}m`;

        this.updateValues()
    };

    updateExposure = () => {
        this.model.exposure = `${this.exposure.value}`;

        this.updateValues()
    };

    updateValues = () => {
        // this.roll.value = this.roll.value;
        // this.pitch.value = this.pitch.value;
        // this.yaw.value = this.yaw.value;

        this.theta.value = this.theta.value;
        this.phi.value = this.phi.value;
        this.radius.value = this.radius.value;

        // this.x.value = this.x.value;
        // this.y.value = this.y.value;
        // this.z.value = this.z.value;

        // $("#roll-val").text(this.roll.value)
        // $("#pitch-val").text(this.pitch.value)
        // $("#yaw-val").text(this.yaw.value)
        $("#theta-val").text(this.theta.value)
        $("#phi-val").text(this.phi.value)
        $("#radius-val").text(this.radius.value)
        // $("#x-val").text(this.x.value)
        // $("#y-val").text(this.y.value)
        // $("#z-val").text(this.z.value)
        // $("#exposure-val").text(this.exposure.value)

        // this.model.updateFraming();

    };
}