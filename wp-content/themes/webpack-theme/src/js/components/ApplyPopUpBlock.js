export default class ApplyPopUpBlock {
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
        ".apply-btn",
        function () {
          $(".form-apply-pop-up").addClass("active");
          $("body").addClass("popup-active");
        }
      );

    $(document).on(
      "click",
      ".form-apply-pop-up .close-btn",
      function () {
        $(".form-apply-pop-up").removeClass("active");
        $("body").removeClass("popup-active");
      }
    );
  };
}
