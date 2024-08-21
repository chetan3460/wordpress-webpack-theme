import {
    ViewerApp,
    AssetManagerPlugin,
    GBufferPlugin,
    ProgressivePlugin,
    TonemapPlugin,
    SSRPlugin,
    SSAOPlugin,
    BloomPlugin,
    ScrollableCameraViewPlugin,
    GLTFAnimationPlugin,

    addBasePlugins,
    AssetManagerBasicPopupPlugin, CanvasSnipperPlugin,
} from "webgi";
// import { Pane } from "tweakpane";

import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

async function setupViewer() {


    const canvas = document.getElementById('webgi-canvas')

    // Initialize the viewer
    const viewer = new ViewerApp({
        // canvas: document.getElementById('webgi-canvas') as HTMLCanvasElement,
        canvas: canvas,
        // isAntialiased: true,
        // useRgbm: false,
    })

    viewer.renderer.displayCanvasScaling = Math.min(window.devicePixelRatio, 1);

    const data = {
        position: { x: 0, y: 0, z: 0 },
        rotation: { x: 0, y: 0, z: 0 },
    };

    // Add some plugins
    const manager = await viewer.addPlugin(AssetManagerPlugin)
    const scene = viewer.scene
    const camera = viewer.scene.activeCamera
    const position = camera.position
    const target = camera.target
    const rotation = camera.rotation


    await viewer.addPlugin(AssetManagerBasicPopupPlugin)

    await viewer.addPlugin(GBufferPlugin)
    await viewer.addPlugin(new ProgressivePlugin(32))
    await viewer.addPlugin(new TonemapPlugin(!viewer.useRgbm))
    await viewer.addPlugin(SSRPlugin)
    await viewer.addPlugin(SSAOPlugin)
    await viewer.addPlugin(BloomPlugin)
    await viewer.addPlugin(CanvasSnipperPlugin)


    // WEBGi loader
    const importer = manager.importer;

    const body = $("body");
    // const siteLoader = document.querySelector(".site-loader");
    // const progressDOM = siteLoader.querySelector(".progress");

    // importer.addEventListener("onProgress", (ev) => {
    //     const progressRatio = ev.loaded / ev.total;
    //     progressDOM
    //         ?.setAttribute("style", `transform: scaleX(${progressRatio})`);
    // });

    importer.addEventListener("onLoad", (ev) => {
        // setTimeout(() => {
        //     $(progressDOM).fadeOut(() => {
        //         body.addClass("page-loaded")

        //         setTimeout(()=>{
        //             introAnimation();
        //         }, 2000)
        //     });
        // }, 1000)
        const checkBodyClass = (mutationList, observer) => {
            if (body.hasClass("page-loaded")) {

                introAnimation();

                observer.disconnect();
            }
        };

        const observer = new MutationObserver(checkBodyClass);

        const targetNode = document.querySelector("body");
        const config = { attributes: true, childList: true, subtree: true };

        observer.observe(targetNode, config);
    });

    // This must be called once after all plugins are added.
    viewer.renderer.refreshPipeline()

    // Import and add a GLB file.
    // await viewer.load(`${CCM_APPLICATION_URL}/application/themes/nbk_wealth/assets/3d/fins.glb`).then(module => {});
    // const model = await manager.addFromPath(`${CCM_APPLICATION_URL}/application/themes/nbk_wealth/assets/3d/scene-new.glb`);

    // const model = await manager.addFromPath(`${"<?php echo get_template_directory_uri(); ?>"}/assets/3d/scene-new.glb`);



    // Construct the path with embedded PHP
    const modelPath = `${"<?php echo get_template_directory_uri(); ?>"}/assets/3d/scene-new.glb`;

    // Log the path to the console
    console.log(modelPath);

    // Use the path in your function
    const model = await manager.addFromPath(modelPath);

    const object3d = model[0].modelObject;
    const modelPosition = object3d.position;
    const modelRotation = object3d.rotation;


    function introAnimation() {
        // position.x = "-3.3531578635"
        // position.y = "0.0993763723"
        // position.z = "-0.0781185419"
        // target.x = "-0.0255525286"
        // target.y = "0"
        // target.z = "0"

        gsap.to(canvas, {
            opacity: 1,
            duration: 2,
            onComplete: () => {
                setupScrollAnimation();
            }
        })
    }

    function setupScrollAnimation() {
        const intro = gsap.timeline();
        const tl = gsap.timeline();

        intro.to(position, {
            x: -27, y: 2, z: 2,
            duration: 2,
            ease: "none",
            onUpdate,
        })
        intro.to(rotation, {
            x: 2.41, y: -35.68, z: 2.43,
            duration: 2,
            ease: "none",
        })

        // intro.to(position, {
        //         x: -1.9681209574, y: 1.0782430958, z: 0.0095770471,
        //         duration: 2,
        //         ease: "none",
        //         onUpdate,
        //     })
        // intro.to(target, {
        //     x: 0.0352181653, y: 0.1819927204, z: -0.0601084873,
        //     duration: 2,
        //     ease: "none",
        // })

        // intro.to(position, {
        //         x: -0.144408117, y: 0.9742655747, z: -0.5509844568,
        //         duration: 2,
        //         ease: "none",
        //         onUpdate,
        //     })
        // intro.to(target, {
        //     x: 0.3709150336, y: 0.6312266138, z: -0.1380868597,
        //     duration: 2,
        //     ease: "none",
        // })

        // intro.to(position, {
        //         x: 2.1833897408, y: 0.4636829181, z: -0.2954863218,
        //         duration: 2,
        //         ease: "none",
        //         onUpdate,
        //     })
        // intro.to(target, {
        //     x: 1.3097835389, y: 0.1376504219, z: 0.5521105568,
        //     duration: 2,
        //     ease: "none",
        // })

        // intro.to(position, {
        //         x: 2.7523108717, y: 0.2010007079, z: 2.6052276874,
        //         duration: 2,
        //         ease: "none",
        //         onUpdate,
        //     })
        // intro.to(target, {
        //     x: 1.1555000372, y: 0.0718636174, z: 1.5676359049,
        //     duration: 2,
        //     ease: "none",
        // })

        //Section 1
        // tl.to(position, {
        //     x: -0.6898879485, y: 5.3119773524, z: 0.0375809523,
        //     scrollTrigger: {
        //         trigger: ".banner",
        //         start: "top bottom",
        //         end: "top center",
        //         scrub: true,
        //         immediateRender: false
        //     },
        //     onUpdate
        // })
        // .to(target, {
        //     x: -1.0921846288, y: 0.4182673361, z: -0.4764016324,
        //     scrollTrigger: {
        //         trigger: ".banner",
        //         start: "top bottom",
        //         end: "top center",
        //         scrub: true,
        //         immediateRender: false
        //     },
        // })
        // //Section 3
        // tl.to(position, {
        //     x: -1.343526285, y: 7.3300516997, z: 0.0883275654,
        //     scrollTrigger: {
        //         trigger: ".stats-section",
        //         start: "top bottom",
        //         end: "top center",
        //         scrub: true,
        //         immediateRender: false
        //     },
        //     onUpdate
        // })
        // .to(target, {
        //     x: -1.3435266671, y: 0.5635509775, z: 0.0883208056,
        //     scrollTrigger: {
        //         trigger: ".stats-section",
        //         start: "top bottom",
        //         end: "top center",
        //         scrub: true,
        //         immediateRender: false
        //     },
        // })
        // //Section 4
        // .to(position, {
        //     x: 0.370708693, y: 8.6364006252, z: 0.1894774178,
        //     scrollTrigger: {
        //         trigger: ".dropdown-button-section",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     },
        //     onUpdate
        // })
        // .to(target, {
        //     x: 0.0734345489, y: 0.0441388935, z: -1.010530798,
        //     scrollTrigger: {
        //         trigger: ".dropdown-button-section",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     }
        // })
        // //Section 5
        // .to(position, {
        //     x: 0.370708693, y: 8.6364006252, z: 0.1894774178,
        //     scrollTrigger: {
        //         trigger: ".two-column-content-with-cards",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     },
        //     onUpdate
        // })
        // .to(target, {
        //     x: -0.1978467339, y: 0.484079945, z: 0.2160889456,
        //     scrollTrigger: {
        //         trigger: ".two-column-content-with-cards",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     }
        // })
        // //Section 6
        // .to(position, {
        //     x: -8.4381166579, y: 4.417580599, z: 1.3857217029,
        //     scrollTrigger: {
        //         trigger: ".slider-with-tabs",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     },
        //     onUpdate
        // })
        // .to(target, {
        //     x: 1.4788283393, y: 0.31074103, z: 2.3351081179,
        //     scrollTrigger: {
        //         trigger: ".slider-with-tabs",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     }
        // })
        // //Section 7
        // .to(position, {
        //     x: 1.4774741108, y: -7.2387111575, z: 0.1796505122,
        //     scrollTrigger: {
        //         trigger: ".locations",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     },
        //     onUpdate
        // })
        // .to(target, {
        //     x: 0.1897501977, y: -0.7462241115, z: 0.1454498034,
        //     scrollTrigger: {
        //         trigger: ".locations",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     }
        // })
        // //Section 8
        // .to(position, {
        //     x: 1.5761223691, y: 0.0731371347, z: 6.168123633,
        //     scrollTrigger: {
        //         trigger: ".latest-news",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     },
        //     onUpdate
        // })
        // .to(target, {
        //     x: -0.947748318, y: 0.7224246938, z: -0.067132701,
        //     scrollTrigger: {
        //         trigger: ".latest-news",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     }
        // })
        // //Section 8
        // .to(position, {
        //     x: -0.5121913811, y: -3.8639286277, z: -1.1065667415,
        //     scrollTrigger: {
        //         trigger: ".headline-content-block",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     },
        //     onUpdate
        // })
        // .to(target, {
        //     x: -0.512190776, y: 0.7900672688, z: -1.1065621252,
        //     scrollTrigger: {
        //         trigger: ".headline-content-block",
        //         start: "top bottom",
        //         end: "top top",
        //         scrub: true,
        //         immediateRender: false
        //     }
        // })

        ///
    }

    let needsUpdate = true

    function onUpdate() {
        needsUpdate = true
        viewer.setDirty()
    }

    viewer.addEventListener("preFrame", () => {
        if (needsUpdate) {
            camera.positionUpdated(true)
            camera.targetUpdated(true)
            needsUpdate = false
        }
    })

    viewer.scene.activeCamera.setCameraOptions({ controlsEnabled: false })

    // Load an environment map if not set in the glb file
    // await viewer.setEnvironmentMap((await manager.importer!.importSinglePath<ITexture>("./assets/environment.hdr"))!);

    // // Add some UI for tweak and testing.
    // const uiPlugin = await viewer.addPlugin(TweakpaneUiPlugin)
    // // Add plugins to the UI to see their settings.
    // uiPlugin.setupPlugins<IViewerPlugin>(TonemapPlugin, CanvasSnipperPlugin)

    // const pane = new Pane();

    // pane.addInput(data, "position", {
    //     x: { step: 0.01 },
    //     y: { step: 0.01 },
    //     z: { step: 0.01 },
    // });
    // pane.addInput(data, "rotation", {
    //     x: { min: -6.28319, max: 6.28319, step: 0.001 },
    //     y: { min: -6.28319, max: 6.28319, step: 0.001 },
    //     z: { min: -6.28319, max: 6.28319, step: 0.001 },
    // });

    // pane.on("change", (e) => {
    //     if (e.presetKey === "rotation") {
    //         const { x, y, z } = e.value;
    //         modelRotation.set(x, y, z);
    //     } else {
    //         const { x, y, z } = e.value;
    //         modelPosition.set(x, y, z);
    //     }

    //     onUpdate();
    // });


}

setupViewer()
