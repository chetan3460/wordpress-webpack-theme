export default class Header {
  constructor({
    header,
    htmlBody,
  }) {
    this.header = header;
    this.htmlBody = htmlBody;
    this.mobileMenu = this.htmlBody.find('.mobile-menu');
    this.mobileNav = this.htmlBody.find('.mobile-nav');
    this.mobileMenuMask = this.htmlBody.find('.mobile-menu-mask');
    this.hamMenu = this.htmlBody.find('.ham-menu');
    this.mainNav = this.htmlBody.find("#menu-main-menu-header-1 > .menu-item-has-children");
    this.megaMenu = this.htmlBody.find(".mega-menu-wrapper");

    this.imageHover = this.htmlBody.find('.image-hover img');
    this.bindEvents();
  }

  bindEvents = () => {
    const $container = this.htmlBody;
    $container.on('click', '.mobile-menu', this.handleMobileMenu);


    // Mobile menu click

    const levelOneListArrow = $(".mobile-nav .mobile-menu-list > ul > li > .nav-item > span");
    const levelOneList = $(".mobile-nav .mobile-menu-list > ul > li");
    const levelTwo = $(".mobile-nav .mobile-menu-list > ul > li > ul");
    const levelTwoList = $(".mobile-nav .mobile-menu-list > ul > li > ul > li");
    const levelTwoListArrow = $(".mobile-nav .mobile-menu-list > ul > li > ul > li > .nav-item > span");
    const levelThree = $(".mobile-nav .mobile-menu-list > ul > li > ul .sub-nav-wrap");
    const backButton = $(".mobile-nav .back-to");

    levelOneListArrow.on("click", function () {

      if (!$(this).parents("li").hasClass("active")) {
        levelOneList.removeClass("active");
        $(this).parents("li").addClass("active");
        levelTwo.slideUp(500);
        $(this).parents("li").find("ul").slideDown(500);
      } else {
        levelOneList.removeClass("active");
        levelTwo.slideUp(500);
      }
    });

    levelTwoListArrow.on("click", function () {
      if (!$(this).closest("li").hasClass("active")) {
        levelTwoList.removeClass("active");
        levelThree.removeClass("active");
        $(this).closest("li").find(".sub-nav-wrap").addClass("active");
      } else {

      }
    });

    backButton.on("click", function () {
      levelThree.removeClass("active");
    });


    // Main menu hover
    this.mainNav.hover(
      ({ currentTarget }) => {
        this.mainNav.removeClass("active");
        this.htmlBody.removeClass("active");
        this.htmlBody.addClass("menu-active");
        currentTarget.classList.add("active");
        this.hamMenu.removeClass('active');
        this.mobileMenu.removeClass('active');
      },
      ({ currentTarget }) => {

      }
    );

    const hideMegaMenu = () => {
      this.htmlBody.removeClass("menu-active");
      this.mainNav.removeClass("active");
    }

    // Mega menu hover
    this.megaMenu.hover(
      ({ currentTarget }) => {

      },
      ({ currentTarget }) => {
        hideMegaMenu();
      }
    );

    this.header.hover(
      ({ currentTarget }) => {

      },
      ({ currentTarget }) => {
        hideMegaMenu();
      }
    );

    // otherLinks hover
    const otherLinks = $("#menu-main-menu-header-1 > li:not(.menu-item-has-children),.mobile-menu,.make-enquiry,.search-btn,.logo");
    otherLinks.hover(
      ({ currentTarget }) => {
        this.htmlBody.removeClass("menu-active");
        this.mainNav.removeClass("active");
      },
      ({ currentTarget }) => {

      }
    );

    // Hover image update
    let hoverTimeout;
    $container.on('mouseenter', 'a[data-hover-image]', ({ currentTarget }) => {
      const hoverImageSrc = currentTarget.getAttribute('data-hover-image');
      // Clear any previous timeout
      clearTimeout(hoverTimeout);
      this.imageHover.removeClass('active');
      hoverTimeout = setTimeout(() => {
        this.imageHover.attr('src', hoverImageSrc);
        this.imageHover.addClass('active');
      }, 300); // Adjust the delay time as needed
    });

    $container.on('mouseleave', 'a[data-hover-image]', ({ currentTarget }) => {
      clearTimeout(hoverTimeout);
      this.imageHover.removeClass('active');
    });

    // Remove menu-active on scroll
    $(window).on('scroll', () => {
      if (this.htmlBody.hasClass('menu-active')) {
        this.htmlBody.removeClass('menu-active');
        this.mainNav.removeClass("active");
        this.hamMenu.removeClass('active');
      }
      if (this.hamMenu.hasClass('active')) {
        this.hamMenu.removeClass('active');
        this.mobileMenu.removeClass('active');
      }
    });

  };

  handleMobileMenu = () => {
    if (this.mobileMenu.hasClass('active')) {
      this.mobileMenu.removeClass('active');
      this.htmlBody.removeClass('active');
      this.mobileNav.removeClass('active');
      this.mobileMenuMask.removeClass('active');
      this.hamMenu.removeClass('active');
      if (window.innerWidth < 1200) {
        this.htmlBody.removeClass('no-scroll');
      }
    } else {
      this.mobileMenu.addClass('active');
      this.htmlBody.addClass('active');
      this.mobileNav.addClass('active');
      this.mobileMenuMask.addClass('active');
      this.hamMenu.addClass('active');
      this.htmlBody.removeClass("menu-active");
      this.mainNav.removeClass("active");
      if (window.innerWidth < 1200) {
        this.htmlBody.addClass('no-scroll');
      }
    }
  };
}
