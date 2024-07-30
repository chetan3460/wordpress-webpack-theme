import Listing from "./Listing";
import CertificateSlider from "./CertificateSlider";

export default class Accreditations extends Listing {
    init() {
        this.parent = $(".accreditations-list");
        super.init();

        this.items = $(".accreditations-items");
        this.popup = $(".accreditations-popup");
    }

    bindEvents() {
        this.initOnClickLoadMore();
    }

    formParams() {
        let data = super.formParams();

        data["action"] = encodeURIComponent('accreditations_filter_ajax');

        return data;
    }

    bindData(response) {
        this.items.append(response.items);
        this.popup.append(response.popup);
        this.hideLoader();
        this.toggleLoadMore(response.hasNextPage);

        new CertificateSlider();
    }
}