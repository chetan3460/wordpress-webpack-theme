import select2 from "select2";
import "select2/dist/css/select2.css";

export default class SelectDrop {
  constructor() {
    this.bindEvents();
  }
  bindEvents = () => {
    $("select:not(.no-select2), .form-select").select2({
      minimumResultsForSearch: -1,
    });
  };
}
