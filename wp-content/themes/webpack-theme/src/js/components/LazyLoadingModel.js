
export default class LazyLoadingModel {
    constructor() {
        this.setDomMap();
        this.bindEvents();
    };

    setDomMap = () => {
        this.model = document.querySelectorAll(".lazy-model")
    };

    bindEvents = () => {
        this.model.forEach((currentValue) => {
            const modelViewer = currentValue.querySelector("model-viewer");


            if (!$(modelViewer).length) return;

            if (modelViewer.complete) {
                this.loaded(modelViewer)
            } else {
                modelViewer.addEventListener("load", () => {

                    this.loaded(modelViewer)
                })
            }
        });
    }

    loaded = (modelViewer) => {
        modelViewer.parentElement.classList.add("loaded")
    }
}