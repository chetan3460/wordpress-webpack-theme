export default class ListingBlock {
    constructor() {
        this.page = 1;
        this.autoLoad = false;

        this.block = $(".listing--block");
        this.bindData = this.block.find(".bind--data");
        this.keywords = this.block.find("#keywords");
        this.ccmToken = this.block.find("[name=\"ccm_token\"]");
        this.sortFilter = this.block.find(".sort--filter");
        this.dynamicFilters = this.block.find(".block--filter");
        this.loader = this.block.find(".loader");
        this.loadMore = this.block.find(".load--more");

        this.bindEvents();
    };

    bindEvents = () => {
        this.keywords.keyup(this.delayLoad);
        this.dynamicFilters.on("change", this.filterSearch);
        this.sortFilter.on("change", this.filterSearch);
        this.initiatePagination();
    };

    delayLoad = () => {
        this.resetPage();
        clearInterval(this.timer);
        this.timer = setTimeout(() => {
            this.filterSearch();
        }, 500);
    };

    initiatePagination = () => {
        if(this.loadMore.length) {
            let paginationStyle = this.loadMore.attr("data-pagination-style");

            if(paginationStyle === "on_scroll") {
                this.autoLoad = this.loadMore.attr("data-load-more");
                this.toggleLoadMore = (flag) => {
                    this.autoLoad = !!flag;
                };
                $(window).scroll(this.windowScroll);
            }else if(paginationStyle === "on_click") {
                this.toggleLoadMore = (flag) => {
                    flag ? this.loadMore.show() : this.loadMore.hide();
                };
                this.loadMore.on("click", this.nextPage);
            }
        }
    };

    windowScroll = () => {
        if (this.autoLoad && this.isAtBottom() ) {
            this.autoLoad = false;
            this.nextPage();
        }
    };

    isAtBottom = () => {
        var scroll = this.block.scrollTop() + this.block.innerHeight() + 100;
        var scrollHeight = this.block[0].scrollHeight;
        return scroll >= scrollHeight;
    };

    nextPage = () => {
        this.addPage();
        this.showLoader();
        this.requestData();
    };

    addPage = () => {
        this.page ++;
    };

    resetPage = () => {
        this.page = 1;
    };

    getPath = () => {
        return window.location.pathname + "/listing_block";
    };

    formParams = () => {
        let data = {};

        data["keywords"] = this.keywords.val();
        data["page"] = this.page;
        data["ccm_token"] = this.ccmToken.val();

        if(this.sortFilter.length) data[this.sortFilter.attr("name")] = this.sortFilter.val();

        this.dynamicFilters.each((index, item) => {
            item = $(item);
            let key = item.attr("name");
            let values = item.val();
            data[key] = Array.isArray(values) ? values.map(value => {
                return encodeURIComponent(value);
            }) : [encodeURIComponent(values)];
        });

        return data;
    };

    clearContainer = () => {
        this.bindData.empty();
    };

    showLoader = () => {
        this.loader.show();
    };

    hideLoader = () => {
        this.loader.hide();
    };

    filterSearch = () => {
        this.resetPage();
        this.clearContainer();
        this.showLoader();
        this.setHistory();
        this.requestData();
    };

    requestData = () => {
        $.ajax({
            dataType: "json",
            type: "GET",
            cache: false,
            data: this.formParams(),
            url: this.getPath(),
            success: this.appendItems,
            error: this.handleError,
        });
    };

    appendItems = (response) => {
        this.bindData.append(response.data);
        this.hideLoader();
        this.toggleLoadMore(response.loadMore);
    };

    setHistory = () => {
        if (window.history.pushState) {
            let url = '?';
            let params = '';

            let data = this.formParams();
            for(let key in data){
                if(key === "page" || key === "ccm_token") continue;

                if(params.length)
                    params += '&';
                params += `${key}=${data[key]}`;
            }

            url += params;

            window.history.pushState('', '', url);
        }
    };

    handleError = (e) => {
        let response = JSON.parse(e.responseText);
        PNotify.error({
            title: response.title,
            text: response.message
        });
    }
}