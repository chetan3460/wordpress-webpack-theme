import Listing from "./Listing";
import LazyLoad from "./LazyLoad";

export default class RelevantProducts extends Listing {
    init() {
        this.parent = $(".relevant-products");
        super.init();
        this.listItemContainer = this.parent.find(".product-list");
        this.keywords = this.parent.find("#keywords");
        this.slug = this.parent.data('type');
    }

    bindEvents() {
        super.bindEvents();

        this.initOnClickLoadMore();
        this.keywords.keyup(this.delayFilter.bind(this));
    }

    formParams() {
        let data = super.formParams();

        data["action"] = encodeURIComponent('relevant_products_filter_ajax');
        data["keyword"] = encodeURIComponent(this.keywords.val());
        data["cpid"] = encodeURIComponent(this.slug);

        return data;
    }

    bindData(response) {
        this.listItemContainer.append(response.data);
        this.hideLoader();
        this.toggleLoadMore(response.hasNextPage);
        this.toggleNoResults(response.success);

        new LazyLoad();
    }

    applyFilter() {
        this.resetPage();
        this.clearContainer();
        this.showLoader();
        this.requestData();
    }
}