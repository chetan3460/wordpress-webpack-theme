import Listing from "./Listing";

export default class Search extends Listing {
    init() {
        this.parent = $(".search-page");
        super.init();

        this.keywords = this.parent.find("#keywords");
        this.allTabs = this.parent.find(".search-tabs");
        this.tabs = this.parent.find(".search-tab");
        this.items = this.parent.find(".search-blocks");
        this.resultsCount = this.parent.find(".results-count");
        this.clickedTab = '';
        this.oldKeyword = this.keywords.val();
        this.changed = false;
    }

    bindEvents() {
        this.initOnClickLoadMore();
        this.keywords.keyup(this.keywordPress.bind(this));
        this.tabs.click(this.triggerSelectedTab.bind(this));
    }

    keywordPress() {
        if(this.oldKeyword !== this.keywords.val()) {
            this.changed = true;
        }

        this.oldKeyword = this.keywords.val();
        this.delayFilter();
    }

    triggerSelectedTab(event) {
        const tabElement = event.currentTarget;
        this.clickedTab = tabElement.getAttribute('data-type');

        this.tabs.removeClass('active');
        $(tabElement).addClass('active');

        this.delayFilter();
    }

    formParams() {
        let data = super.formParams();

        data["action"] = encodeURIComponent('search_filter_ajax');
        data["s"] = encodeURIComponent(this.keywords.val());
        data["tab"] = encodeURIComponent(this.clickedTab);
        data["changed"] = encodeURIComponent(this.changed);

        return data;
    }

    bindData(response) {
        if(this.changed) {
            this.allTabs.empty();
            this.allTabs.append(response.tabs);

            if(response.tabs) {
                this.allTabs.show();
            }else{
                this.clickedTab = '';
                this.allTabs.hide();
            }

            this.resultsCount.html(response.count);
        }

        this.items.append(response.items);
        this.hideLoader();
        this.toggleLoadMore(response.hasNextPage);
        this.reInit();

        this.changed = false;
    }

    applyFilter() {
        this.resetPage();
        this.clearContainer();
        this.showLoader();
        this.requestData();
    }

    reInit() {
        this.tabs = this.parent.find(".search-tab");
        this.tabs.click(this.triggerSelectedTab.bind(this));
    }
}