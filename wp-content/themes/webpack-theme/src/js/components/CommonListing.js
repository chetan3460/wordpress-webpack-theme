import Listing from "./Listing";
import LazyLoad from "./LazyLoad";

export default class CommonListing extends Listing {
    init() {
        this.parent = $(".common-listing");
        super.init();

        this.post_type = this.parent.data('type');
        this.keywords = this.parent.find("#keywords");
        this.categoriesList = this.parent.find(".categories-list");
        this.sortList = this.parent.find(".sort-list");
    }

    bindEvents() {
        super.bindEvents();

        this.initOnClickLoadMore();
        this.keywords.keyup(this.delayFilter.bind(this));
        this.categoriesList.on('select2:select',this.delayFilter.bind(this));
        this.sortList.on('select2:select',this.delayFilter.bind(this));
    }

    formParams() {
        let data = super.formParams();

        data["action"] = encodeURIComponent('common_filter_ajax');
        data["post_type"] = encodeURIComponent(this.post_type);
        data["keyword"] = encodeURIComponent(this.keywords.val());
        data["category"] = encodeURIComponent(this.categoriesList.val());
        data["sort_by"] = encodeURIComponent(this.sortList.val());

        return data;
    }

    bindData(response) {
        this.listItemContainer.append(response.data);
        this.hideLoader();
        this.toggleLoadMore(response.hasNextPage);
        this.toggleNoResults(response.success);

        new LazyLoad();
    }
}