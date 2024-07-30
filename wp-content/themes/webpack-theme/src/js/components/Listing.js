import LazyLoad from "./LazyLoad";

export default class Listing {
    constructor() {
        this.init();
        this.bindEvents();
    }

    init() {
        this.listItemContainer = this.parent.find(".list-item-container");
        // this.ccmToken = this.parent.find('[name="ccm_token"]');
        this.loadMore = this.parent.find(".load-more");
        this.loader = this.parent.find(".loader");
        this.noResult = this.parent.find("#no-result");
        this.page = 1;
        this.autoLoad = true;
    }

    bindEvents() {

    }

    initOnClickLoadMore() {
        this.loadMore.on("click", this.nextPage.bind(this));
    }

    initOnScrollLoadMore() {
        $(window).scroll(this.windowScroll.bind(this));
    }

    windowScroll(e) {
        if (this.autoLoad && this.isAtBottom()) {
            this.autoLoad = false;
            this.nextPage(e);
        }
    };

    isAtBottom() {
        let scroll = this.listItemContainer.scrollTop() + this.listItemContainer.innerHeight() + 100;
        let scrollHeight = this.listItemContainer[0].scrollHeight;
        return scroll >= scrollHeight;
    };

    delayFilter() {
        clearInterval(this.timer);
        this.timer = setTimeout(() => {
            this.applyFilter();
        }, 500);
    }

    nextPage(e) {
        e.preventDefault();
        this.addPage();
        this.toggleNoResults(true);
        this.showLoader();
        this.requestData();
    }

    requestData() {
        $.ajax({
            dataType: "json",
            type: "GET",
            cache: false,
            data: this.formParams(),
            url: ajaxurl,
            success: this.bindData.bind(this),
            error: this.handleError.bind(this),
        });
    };

    formParams() {
        let data = {};

        data["page"] = this.page;
        // data["ccm_token"] = this.ccmToken.val();

        return data;
    }

    addPage() {
        this.page++;
    }

    resetPage() {
        this.page = 1;
    }

    applyFilter() {
        this.resetPage();
        this.clearContainer();
        this.toggleNoResults(true);
        this.showLoader();
        this.setHistory();
        this.requestData();
    }

    clearContainer() {
        this.listItemContainer.empty();
    }

    showLoader() {
        this.loader.show();
    }

    hideLoader() {
        this.loader.hide();
    }

    bindData(response) {
        this.listItemContainer.append(response.data);
        this.autoLoad = response.hasNextPage;
        this.hideLoader();
        this.toggleLoadMore(response.hasNextPage);
        this.toggleNoResults(response.success);
        this.additionalDataBind(response);
        this.callbackFn();

        new LazyLoad();
    }

    setHistory() {
        if (window.history.pushState) {
            let url = "?";
            let params = [];

            let data = this.formParams();
            for (let key in data) {
                if (key === "page" || key === "ccm_token" || key === "action" || key === "post_type") continue;
                params.push(`${key}=${data[key]}`);
            }

            url += params.join("&");

            window.history.pushState("", "", url);
        }
    }

    handleError(textStatus, errorThrown) {
        // window.location.reload();
    }

    toggleLoadMore(flag) {
        flag ? this.loadMore.show() : this.loadMore.hide();
    }

    toggleNoResults(flag) {
        flag ? this.noResult.hide() : this.noResult.show();
    }

    callbackFn() {
    }

    additionalDataBind(response) {

    }
}