import Lottie from 'lottie-web';

export default class LottieAnimations {
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
        this.iconAnimation = $(".icon-animation");
        this.themeUrl = document.querySelector('meta[name="theme-url"]').getAttribute('content');
    }

    bindEvents = () => {
        this.iconAnimation.length && this.lottieIconAnimation()
    }

    lottieIconAnimation = () => {
        this.iconAnimation.each((_, el) => {
            const icon = $(el).attr("data-icon")

            const anim = Lottie.loadAnimation({
                container: el,
                renderer: "svg",
                loop: true,
                autoplay: true,
                path: `${this.themeUrl}/src/js/json/${icon}.json`
            });

        })
    }
}