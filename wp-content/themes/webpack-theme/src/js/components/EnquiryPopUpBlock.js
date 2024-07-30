export default class EnquiryPopUpBlock {
  constructor() {
    this.init();
  }

  init = () => {
    this.setDomMap();
    this.bindEvents();
  };

  setDomMap = () => {
    this.window = $(window);
    this.body = $("body");
  };

  bindEvents = () => {
      $(document).on(
        "click",
        ".make-enquiry",
        function () {
          $(".form-pop-up").addClass("active");
          $("body").addClass("popup-active");
        }
      );

    $(document).on(
      "click",
      ".form-pop-up .close-btn",
      function () {
        $(".form-pop-up").removeClass("active");
        $("body").removeClass("popup-active");
      }
    );
  };
}
