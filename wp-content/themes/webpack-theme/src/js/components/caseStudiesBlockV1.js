import { StickySidebar } from 'theia-sticky-sidebar';

export default class caseStudiesBlockV1 {
    constructor() {
        this.init();
    }

    init = () => {
        this.setDomMap();
        this.bindEvents();
    };

    setDomMap = () => {
        // Define your DOM mapping here if necessary
    }

    bindEvents = () => {
        if ($('.sticky-sidebar').length) {
            $('body').addClass('sticky-sidebar_init');
            $('.sticky-sidebar').each(function () {
                $(this).theiaStickySidebar({
                    additionalMarginTop: 150,
                    additionalMarginBottom: 30
                });
            });
        }
    }
}
