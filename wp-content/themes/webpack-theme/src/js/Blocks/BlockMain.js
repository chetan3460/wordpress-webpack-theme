import ListingBlock from "./ListingBlock";

export default class BlockMain {
    constructor() {
        this.setDomMap();
    };

    setDomMap = () => {
        this.listingBlock = $(".listing--block");

        // dom ready shorthand
        $(() => {
            this.domReady();
        });
    };

    domReady = () => {
        this.initComponents();
    };

    initComponents = () => {
        if(this.listingBlock.length) {
            new ListingBlock();
        }
    }
}