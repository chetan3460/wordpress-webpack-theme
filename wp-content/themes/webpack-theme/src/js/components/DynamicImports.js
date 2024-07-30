import { importComponent, max767 } from "../utils";
import { componentList } from "../componentList";

export default class DynamicImports {
    constructor() {
        this.init();
    }

    init = () => {
        this.setDomMap();
        this.bindEvents();
        this.components();
    };

    setDomMap = () => {
        this.window = $(window);
    }

    bindEvents = () => {
        // Window Events
        this.window.scroll(this.windowScroll);
    }

    windowScroll = () => {
        this.components();
    }

    components = () => {
        if (componentList) {
            $.each(componentList, (_, { element: el, className: classID, mobile }) => {
                if (!mobile && max767.matches)
                    return;

                importComponent(el, classID);
            })
        }
    };
}