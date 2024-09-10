import { WebGLRenderer, LinearToneMapping, ACESFilmicToneMapping, Scene, PointLight, DirectionalLight, Clock, AnimationMixer } from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';
import { DRACOLoader } from 'three/examples/jsm/loaders/DRACOLoader';
// import * as dat from 'dat.gui'

import { max767, max991 } from "../utils";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
export default class ModelWithThree {
    constructor() {
        this.init();
    }

    init = () => {
        const modelViewer = new URL(`${themeUrl}/assets/3d/NBK-TT-new.glb`, import.meta.url)
        // modelViewer.src = themeUrl + "/src/js/libs/model-viewer.min.js";

        ///////////////////////////////////////////////

        const renderer = new WebGLRenderer({
            antialias: true,
            alpha: true
        });
        renderer.toneMapping = LinearToneMapping;
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.toneMapping = ACESFilmicToneMapping;

        renderer.setClearColor(0x000000);

        // document.body.appendChild(renderer.domElement);
        const webgi = document.querySelector("#webgi-canvas-container");
        webgi.appendChild(renderer.domElement);

        const scene = new Scene();

        // const gui = new dat.GUI()

        const pl1 = new PointLight(0xffffff, 5)
        pl1.position.set(-500, 0, 0)
        // lightFolder.add(pl1.position, 'x', -500, 500).name('X');
        // lightFolder.add(pl1.position, 'y', -500, 500).name('Y');
        // lightFolder.add(pl1.position, 'z', -500, 500).name('Z');
        // lightFolder.add(pl1.rotation, 'x', -500, 500).name('X');
        // lightFolder.add(pl1.rotation, 'y', -500, 500).name('Y');
        // lightFolder.add(pl1.rotation, 'z', -500, 500).name('Z');
        // lightFolder.add(pl1, 'intensity', 0, 100).name('Intensity');
        scene.add(pl1)
        // const plHelper = new PointLightHelper(pl1, 3);
        // scene.add(plHelper);

        const pl2 = new PointLight(0xffffff, 3)
        pl2.position.set(56, 12, -500)
        scene.add(pl2)

        const pl3 = new PointLight(0xffffff, 1)
        pl3.position.set(500, -198, -242)
        scene.add(pl3)

        const pl4 = new PointLight(0xffffff, 0)
        pl4.position.set(-500, -54, -500)
        scene.add(pl4)

        // setup directional light + helper
        const directionalLight = new DirectionalLight(0xFFFAF3, 6);
        // directionalLight.position.set(0, 100, 0); // Adjust the light's position
        scene.add(directionalLight);

        const directionalLight2 = new DirectionalLight(0xFFFAEC, 2);
        directionalLight2.position.set(1, 0, 0); // Adjust the light's position
        scene.add(directionalLight2);

        const directionalLight3 = new DirectionalLight(0xFFFAEC, 7);
        directionalLight3.position.set(0, 0, 1); // Adjust the light's position
        scene.add(directionalLight3);


        const assetLoader = new GLTFLoader();
        const dracoLoader = new DRACOLoader();
        dracoLoader.setDecoderPath(`${CCM_APPLICATION_URL}/application/themes/nbk_wealth/src/js/libs/draco/`);
        assetLoader.setDRACOLoader(dracoLoader);

        const clock = new Clock();
        let mixer;
        let main_camera;
        const moveAmount = 0; // 5%
        assetLoader.load(modelViewer.href, function (gltf) {
            const model = gltf.scene;
            // model.environment = "ModelViewer"
            scene.add(model)

            main_camera = gltf.cameras['0'];

            mixer = new AnimationMixer(model)
            const clips = gltf.animations;

            clips.forEach(function (clip) {
                const action = mixer.clipAction(clip);
                action.play();
                action.timeScale = 0;

                var delta = clock.getDelta();
                mixer.update(delta);

                const model3D = webgi.querySelector("canvas")
                gsap.to(model3D, {
                    opacity: 1,
                    duration: 2,
                    delay: 0.2,
                });

                const mainHeight = $("main").outerHeight();
                const lastSectionHeight = $("main > section:last-of-type").outerHeight();
                const scrollHeight = mainHeight - lastSectionHeight - 100;

                const timeline = gsap.timeline({
                    scrollTrigger: {
                        trigger: '.section-one', // This is the trigger element
                        start: 'top top', // When the animation starts relative to the trigger element
                        end: `top+=${scrollHeight}px top`, // When the animation ends relative to the trigger element
                        scrub: 1.5, // Smoothly scrub the animation with scrolling
                        onUpdate: (self) => {
                            mixer.update(self.progress);
                        },
                    },
                });

                // Add animation to the timeline
                timeline.to(action, { time: action.getClip().duration, duration: 2 });

                // const t2 = gsap.timeline();
                // t2.to(model3D, {
                //     x: "10%",
                //     scrollTrigger: {
                //         trigger: ".dropdown-button-section",
                //         start: "top top",
                //         end: `top+=400px top`,
                //         scrub: 1.5,
                //         immediateRender: false,
                //     },
                // })

                // t2.to(pl4, {
                //     intensity: 13.7,
                //     scrollTrigger: {
                //         trigger: ".two-column-content-with-cards",
                //         start: "top bottom",
                //         end: `top+=400px top`,
                //         // end: `top center`,
                //         scrub: 1.5,
                //         immediateRender: false,
                //     },
                // })

                modelSize()

            })
        }, undefined, function (error) {
            console.error(error)
        })

        function animate() {
            if (!mixer) return;

            // main_camera.position.set(main_camera.position.x * moveAmount, main_camera.position.y, main_camera.position.z)

            mixer.update(clock.getDelta())
            renderer.render(scene, main_camera);
        }

        renderer.setAnimationLoop(animate);

        function modelSize() {
            max991.matches && (main_camera.fov = 35);
            max767.matches && (main_camera.fov = 40);
            main_camera.aspect = window.innerWidth / window.innerHeight;
            main_camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }

        window.addEventListener('resize', function () {
            modelSize()
        });
    };
}

