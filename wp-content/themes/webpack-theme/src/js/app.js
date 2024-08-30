import Header from './components/Header';
import ContactMap from "./components/Maps/types/ContactMap";
import BlockMain from "./Blocks/BlockMain";
import DynamicImports from './components/DynamicImports';
import Animation from "./components/Animation";

import { inVP } from "./utils";
import Lenis from 'lenis'
import gsap from 'gsap';

import { viewport } from './utils';

export default new (class App {
  constructor() {
    this.setDomMap();
    this.previousScroll = 0;

    // dom ready shorthand
    $(() => {
      this.domReady();
    });
  }

  domReady = () => {
    this.initComponents();
    this.captchaLoad();
    this.handleUserAgent();
    this.windowResize();
    this.bindEvents();
    this.handleSplashScreen();
  };

  initComponents = () => {
    new Header({
      header: this.header,
      htmlBody: this.htmlBody,
    });

    if (this.mapContact.length) {
      new ContactMap({
        mapContact: this.mapContact,
      });
    }

    new BlockMain();

    new DynamicImports();
    new Animation();

    // TO BE Removed
    function wglShowcaseInit() {


      let $showcase_int = jQuery('.interactive-showcase');
      if ($showcase_int.length) {

        $showcase_int.each(function () {
          let $this = jQuery(this),
            content = $this.find('.showcase__item'),
            active = $this.find('.active');

          content.on('mouseenter', function () {
            let obj = jQuery(this);
            if (!obj.hasClass('active')) {
              content.removeClass('active');
              obj.addClass('active');
            }
          });
          if (0 === active.length) {
            $this.on('mouseleave', function () {
              content.removeClass('active');
            });
          }
        })
      }
    }
    wglShowcaseInit();

  };
  // loadModelViewer = () => {
  //   if (!this.loaded) {
  //     const modelViewer = document.createElement("script");
  //     modelViewer.type = "module";
  //     modelViewer.defer = "defer";
  //     modelViewer.src =
  //       CCM_APPLICATION_URL +
  //       "/application/themes/nbk_wealth/src/js/libs/model-viewer.min.js";
  //     this.htmlBody[0].appendChild(modelViewer);
  //     this.loaded = true;
  //   }
  // };
  captchaLoad = () => {
    $(window).on("scroll load", () => {
      if (inVP(this.formidable) && !this.formidable.hasClass("formInview")) {
        this.formidable.addClass('formInview');
      }
    });
  };

  setDomMap = () => {
    this.window = $(window);
    this.htmlNbody = $('body, html');
    this.html = $('html');
    this.htmlBody = $('body');
    this.siteLoader = $('.site-loader');
    this.header = $('header');
    this.siteBody = $('.site-body');
    this.footer = $('footer');
    this.gotoTop = $('#gotoTop');
    this.gRecaptcha = $('.g-recaptcha');
    this.wrapper = $('.wrapper');
    this.pushDiv = this.wrapper.find('.push');
    this.mapContact = $('#map_contact');
    this.formidable = $('.formidable');
    this.inputs = $('input, textarea').not('[type="checkbox"], [type="radio"]');
    this.searchBtn = $('.search-btn');
    this.searchTopBlock = $('.search-top-block');
    this.searchCloseBtn = $('.search-top-block .close-btn');
  };

  bindEvents = () => {

    const lenis = new Lenis()
    function raf(time) {
      lenis.raf(time)
      requestAnimationFrame(raf)
    }
    requestAnimationFrame(raf)

    const lerp = (a, b, t = 0.08) => {
      return a + (b - a) * t;
    }


    // ----

    const header = $('.header')
    let lastScrollTop = 0;

    const handleHeader = {
      toggleHide: (scrollPos) => {
        let headerHeight = header.height();
        if (scrollPos > lastScrollTop) {
          if (scrollPos > headerHeight) {
            header.addClass('on-hide')
          }
        } else {
          if (scrollPos > headerHeight) {
            header.addClass("on-hide");
            header.removeClass("on-hide");
          }
        }
        lastScrollTop = scrollPos;
      },
      addBG: (scrollPos) => {
        // if ($('[data-barba-namespace="home"]').length) {
        //     console.log(header.outerHeight())
        //     if (scrollPos > $('.home-hero').outerHeight() - header.outerHeight() / 2) header.addClass("on-scroll");
        //     else header.removeClass("on-scroll");    
        // } else {
        //     if (scrollPos > header.height()) header.addClass("on-scroll");
        //     else header.removeClass("on-scroll");
        // }
        if (scrollPos > header.height()) header.addClass("on-scroll");
        else header.removeClass("on-scroll");
      },
      toggleNav: () => {
        const hamburger = $('.header__toggle');
        hamburger.on('click', function (e) {
          e.preventDefault();
          if (header.hasClass('open-nav')) {
            if ($(window).width() <= 476) {
              let scrollY = $("body").css('top');
              $("body").css({
                'position': 'relative',
                'top': ''
              });
              lenis.start();
              window.scrollTo(0, parseInt(scrollY || '0') * -1);
            }
            header.removeClass('open-nav');
            header.removeClass('force')
          }
          else {
            if ($(window).width() <= 476) {
              setTimeout(() => {
                $("body").css({
                  'position': 'fixed',
                  'top': `-${window.scrollY}px`
                });
              }, 500)
              lenis.stop();
            }
            header.addClass('open-nav');
            header.addClass('force')
          }
        })
      },
    };

    function rotateLogo() {
      let currRot = gsap.getProperty('.header__logo-shape', 'rotate')
      gsap.quickSetter('.header__logo-shape', 'rotate', `deg`)(lerp(currRot, currRot + Math.min(Math.max(lenis.velocity, -80), 80), 0.08));
      requestAnimationFrame(rotateLogo)
    }
    if ($(window).width() > 767) {
      requestAnimationFrame(rotateLogo)
    }

    function changeLogoBackground() {
      function mainArea() {
        let currentMainArea = getCurrentLogoColor('[data-logo-main]');
        let currentColorMain = $(currentMainArea).attr('data-logo-main');

        if (currentMainArea) {
          if (currentColorMain == 'dark') {
            $('.header').removeClass(`mix-mode`)
          } else if (currentColorMain == 'mix') {
            $('.header').removeClass(`dark-mode`)
          }
          // if ($(window).width() < 767) {
          //     $('.header').addClass(`mix-mb-mode`)
          // } else {
          //     $('.header').addClass(`mix-mb-mode`)
          // }
          $('.header').addClass(`${currentColorMain}-mode`)
        }
        else {
          if ($(window).width() < 767) {
            $('.header').removeClass(`mix-mb-mode`)
          }
          $('.header').removeClass('dark-mode mix-mode')


        }

        if ($(window).width() > 767) {
          let currentSubArea = getCurrentLogoColor('[data-logo-sub]');
          let currentColorSub = $(currentSubArea).attr('data-logo-sub');
          if (currentSubArea) {
            if (currentColorSub == 'invert') {
              $('.header').addClass('invert-mode')
            }
          } else {
            $('.header').removeClass('invert-mode')
          }
        }

      }
      mainArea();
    }

    function getCurrentLogoColor(attribute) {
      let sections = $(attribute);
      for (let i = 0; i < sections.length; i++) {
        let rect = sections[i].getBoundingClientRect();
        if (rect.top < (header.outerHeight()) && (rect.bottom - header.outerHeight() * 0.5) > 0) {
          return $(sections[i]);
        }
      }
      return null;
    }

    handleHeader.toggleNav();
    function scrollHeaderSwitch() {
      if (viewport.width > 767) {
        lenis.on('scroll', function (inst) {
          let scrollPos = inst.scroll;
          handleHeader.addBG(inst.scroll);
          handleHeader.toggleHide(inst.scroll);
          changeLogoBackground();
        })
      }
      else {
        let lastPos = $('.wrapper').scrollTop();
        $('.wrapper').on("scroll", function () {
          let scrollPos = $('.wrapper').scrollTop();
          console.log(scrollPos)
          handleHeader.addBG(scrollPos);
          handleHeader.toggleHide(scrollPos);
          changeLogoBackground();
          let velo = lastPos - $('.wrapper').scrollTop();
          let currRot = gsap.getProperty('.header__logo-shape', 'rotate')
          console.log(velo)
          gsap.quickSetter('.header__logo-shape', 'rotate', `deg`)(lerp(currRot, currRot - Math.min(Math.max(velo, -80), 80), 0.08));
          lastPos = $('.wrapper').scrollTop();
        });
      }
    }
    scrollHeaderSwitch();

    function removeAllScrollTrigger() {
      console.log('remove scroll trigger')
      let triggers = ScrollTrigger.getAll();
      triggers.forEach(trigger => {
        trigger.kill();
      });
    }

    function resetBeforeLeave(data) {
      console.log('reset')
      $('.header').removeClass('on-hide')
      $('.header').removeClass('force-hidden')
      $('.header').removeClass('force')
      addNavActiveLink(data);
    }


    // addNavActiveLink(data)
    changeLogoBackground();

    // checkIfJobAvail()

    // --------




    // Window Events
    this.window.resize(this.windowResize).scroll(this.windowScroll);

    // General Events
    const $container = this.wrapper;

    $container.on('click', '.disabled', () => false);


    // Search click
    this.searchBtn.on('click', () => {
      this.searchTopBlock.toggleClass('active');
    });

    this.searchCloseBtn.on('click', () => {
      this.searchTopBlock.toggleClass('active');
    });

    // Specific Events
    this.gotoTop.on('click', () => {
      this.htmlNbody.animate({
        scrollTop: 0,
      });
    });


    // Blue header
    if ($(".no-banner,.error404").length) {
      this.htmlBody.addClass("blue-header");
    }

    //set cookie for site
    function setCookie(cname, cvalue) {
      var d = new Date();
      d.setTime(d.getTime() + 2160000000);
      var expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
    }

    if (document.cookie.indexOf("visited=") == -1) {
      $(".cookie-preference .accept").click(function () {
        setCookie("visited", "1");
        $('.cookie-preference').fadeOut();
      })
      $(".cookie-preference .reject").click(function () {
        $('.cookie-preference').fadeOut();
      })
      setTimeout(() => {
        $('.cookie-preference').fadeIn();
      }, 4000);
    }



    this.inputs
      .on({
        focus: e => {
          const self = $(e.currentTarget);
          self.closest('.gfield').addClass('active');
        },
        blur: e => {
          const self = $(e.currentTarget);
          if (self.val() !== '') {
            self.closest('.gfield').addClass('active');
          } else {
            self.closest('.gfield').removeClass('active');
          }
        },
      })
      .trigger('blur');






    // to be removed
    function calculate() {
      if ($(window).width() - $('.container').width() >= 0) {
        let scalefactor = $(window).width() / $('.container').width()
        $('.home-tech__bg-tri-inner').css('transform', `translate(-50%, -50%) scale(${scalefactor})`)
      }
      console.log($('.container').outerWidth())
    }
    $(window).on('resize', function (e) {
      calculate()
    })
    // Threejs
    // if (this.modelViewer.length) {
    //   this.modelViewer.each((_, el) => {
    //     detectModelLoad(el);
    //   });
    // }

  };

  windowResize = () => {
    this.screenWidth = this.window.width();
    this.screenHeight = this.window.height();

    // calculate footer height and assign it to wrapper and push/footer div
    if (this.pushDiv.length) {
      this.footerHeight = this.footer.outerHeight();
      this.wrapper.css('margin-bottom', -this.footerHeight);
      this.pushDiv.height(this.footerHeight);
    }
  };



  windowScroll = () => {
    const topOffset = this.window.scrollTop();

    this.header.toggleClass('top', topOffset > 300);
    this.header.toggleClass('sticky', topOffset > 600);
    if (topOffset > this.previousScroll || topOffset < 500) {
      this.header.removeClass('sticky');
    } else if (topOffset < this.previousScroll) {
      this.header.addClass('sticky');
      // Additional checking so the header will not flicker
      if (topOffset > 250) {
        this.header.addClass('sticky');
      } else {
        this.header.removeClass('sticky');
      }
    }

    this.previousScroll = topOffset;
    this.gotoTop.toggleClass(
      'active',
      this.window.scrollTop() > this.screenHeight / 2,
    );



    // Threejs
    // if (this.modelViewer.length) {
    //   this.modelViewer.each((_, el) => {
    //     if (el.matches(".model-loaded.model-rotate-trigger")) {
    //       if (inVP($(el))) {
    //         el.autoRotate = true;
    //         el.classList.add("rotating");
    //       } else {
    //         el.autoRotate = false;
    //         el.classList.remove("rotating");
    //       }
    //     }
    //   });
    // }
  };

  handleSplashScreen() {
    this.htmlBody.find('.logo-middle').fadeIn(500);
    this.siteLoader.delay(1500).fadeOut(500);
  }

  handleUserAgent = () => {
    // detect mobile platform
    if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
      this.htmlBody.addClass('ios-device');
    }
    if (navigator.userAgent.match(/Android/i)) {
      this.htmlBody.addClass('android-device');
    }

    // detect desktop platform
    if (navigator.appVersion.indexOf('Win') !== -1) {
      this.htmlBody.addClass('win-os');
    }
    if (navigator.appVersion.indexOf('Mac') !== -1) {
      this.htmlBody.addClass('mac-os');
    }


    // detect IE Edge
    if (/Edge\/\d./i.test(navigator.userAgent)) {
      this.html.addClass('ieEdge');
    }


    const isIPadPro = /Macintosh/i.test(navigator.userAgent) && 'ontouchend' in document;
    if (isIPadPro) {
      // Code for iPad Pro
      this.htmlBody.addClass("mobile-tablet-device");
      this.htmlBody.addClass("ipad-pro");
    }
  };



})();
