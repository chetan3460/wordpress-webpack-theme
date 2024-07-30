export default class NumberTab {
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
        const listItems = $(".number-block");
        const pTags = $(".number-desc p");
        const images = $(".number-images img");
        const numberDescMobile = $(".number-desc.mobile")
        listItems.on("mouseover", function() {
            const dataIndex = $(this).attr("data-index");
            listItems.removeClass("active");
            $(this).addClass("active");
            pTags.removeClass("active");
            images.removeClass("active");
            const activePTag = $(`.number-desc p[data-index="${dataIndex}"]`);
            const activeImgTag = $(`.number-images img[data-index="${dataIndex}"]`);
            if (activePTag.length > 0) {
                activePTag.addClass("active");
            }
            if (activeImgTag.length > 0) {
                activeImgTag.addClass("active");
            }
            if (window.innerWidth < 992) {
                numberDescMobile.slideUp(500);
                $(this).find(".number-desc.mobile").slideDown(500);
            }
        });

        if (window.innerWidth < 992) {
                const firstNumberDesc = $(".left-block .number-block.active .number-desc.mobile");
                firstNumberDesc.slideDown(500);
                 
        }
    }
}