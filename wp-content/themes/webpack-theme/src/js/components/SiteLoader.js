import gsap from 'gsap';

export default class SiteLoader {
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
        // this.navTabs = $('.nav-tabs');
        // this.homePage = $('.home-page');
        // this.siteLoader = $('.site-loader');
        this.modelViewer = $('model-viewer');
        // this.siteLogo = this.siteLoader.find('img');
        // this.progress = this.siteLoader.find('.progress');
    }

    bindEvents = () => {
        // if (document.cookie.indexOf("visited=") == -1 || this.homePage.length) {
        //     this.handleSplashScreen();
        // } else if (!this.homePage.length && document.cookie.indexOf("visited=") !== -1) {
        //     $("body, html").addClass("page-loaded");
        //     this.initComponents()
        // }
        // setCookie("visited", "1");
    }

    handleSplashScreen = () => {
        // const logoAnim = gsap.to(this.siteLogo, {
        //     duration: 2,
        //     scale: 1.2,
        //     repeat: -1,
        //     yoyo: true,
        //     ease: "none",
        // });

        // import("../libs/percent-preloader.js").then(() => {
        //     const checkBodyClass = (mutationList, observer) => {
        //         if ($("body").hasClass("page-loaded")) {
        //             this.body.removeClass("active");
        //             gsap.to(this.siteLogo, {
        //                 opacity: 0,
        //                 duration: 1,
        //                 // onComplete: () => {
        //                 //     logoAnim.pause();
        //                 // }
        //             });

        //             this.progress.hide()

        //             setTimeout(() => {
        //                 this.siteLoader.fadeOut("slow", () => {
        //                     this.initComponents();
        //                 });
        //             }, 100)

        //             observer.disconnect();
        //         }
        //     };

        //     const observer = new MutationObserver(checkBodyClass);

        //     const targetNode = document.querySelector("body");
        //     const config = { attributes: true, childList: true, subtree: true };

        //     observer.observe(targetNode, config);
        // });
    };

    initComponents = () => {
        // import(/* webpackChunkName: "Header" */ /* webpackMode: "lazy" */ './Header').then(module => {
        //     new module.default();
        // });

        // (this.homePage.length && !this.body.hasClass("edit-mode")) && import(
        //     /* webpackChunkName: "ModelViewerScroll" */ /* webpackMode: "lazy" */ "./ModelViewerScroll"
        //   ).then((module) => {
        //     new module.default();
        //   });
        (this.homePage.length && !this.body.hasClass("edit-mode")) && import(
            /* webpackChunkName: "ModelWithThree" */ /* webpackMode: "lazy" */ "./ModelWithThree"
        ).then((module) => {
            new module.default();
        });

        // import(/* webpackChunkName: "Animations" */ /* webpackMode: "lazy" */ './Animations').then(module => {
        //     new module.default();
        // });

        // import(/* webpackChunkName: "Events" */ /* webpackMode: "lazy" */ './Events').then(module => {
        //     new module.default();
        // });

        // import(/* webpackChunkName: "ChatBot" */ /* webpackMode: "lazy" */ './ChatBot').then(module => {
        //     new module.default();
        // });

        // import(/* webpackChunkName: "DynamicImports" */ /* webpackMode: "lazy" */ './DynamicImports').then(module => {
        //     new module.default();
        // });

        //External Dynamic Components
        // this.navTabs.length && import('bootstrap/js/dist/tab');
    }
}