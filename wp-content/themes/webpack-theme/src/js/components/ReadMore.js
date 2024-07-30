import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default class ReadMore {
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
        this.readMoreBtns = $(".read-more-btn");
    }

    bindEvents = () => {
        this.readMoreBtns.on('click', this.handleReadMoreClick);
    }

    handleReadMoreClick = (event) => {
        const btn = $(event.currentTarget);
        const moreContent = btn.closest('.read-more-block').find('.more-content');

        if (moreContent.is(':visible')) {
            moreContent.slideUp();
            btn.addClass('mt-5');
            btn.text('Read More');
        } else {
            moreContent.slideDown();
            btn.removeClass('mt-5');
            btn.text('Read Less');
        }
        ScrollTrigger.refresh();
    }
}