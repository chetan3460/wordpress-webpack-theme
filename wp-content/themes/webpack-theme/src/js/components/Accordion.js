import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default class Accordion {
    constructor() {
        this.init();
    }

    init = () => {
        this.setDomMap();
        this.bindEvents();
        this.activateFirstItems();
    };

    setDomMap = () => {
       this.accordionBlocks = $('.accordion-block');
    }

    bindEvents = () => {
       this.accordionBlocks.each((index, block) => {
            $(block).find('.accordion-item h3,.accordion-block .top-bar').on('click', this.handleAccordionClick);
       });
    }

    activateFirstItems = () => {
        this.accordionBlocks.each((index, block) => {
            const $firstItem = $(block).find('.accordion-item').first();
            const $firstContent = $firstItem.find('.accordion-content');

            $firstItem.addClass('active');
            $firstContent.slideDown();
        });
    }

    handleAccordionClick = (event) => {
        const $clickedHeader = $(event.currentTarget);
        const $accordionBlock = $clickedHeader.closest('.accordion-block');
        const $accordionItem = $clickedHeader.closest('.accordion-item');
        const $accordionContent = $accordionItem.find('.accordion-content');

        $accordionBlock.find('.accordion-item').not($accordionItem).removeClass('active').find('.accordion-content').slideUp();

        $accordionItem.toggleClass('active');
        $accordionContent.slideToggle();
    }

}