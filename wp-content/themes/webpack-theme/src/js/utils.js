export const isInViewport = (element) => {
  if (element.length) {
    let flag = false;
    element.each((_, el) => {
      const elementTop = $(el).offset().top;
      const elementBottom = elementTop + $(el).outerHeight();
      const viewportTop = $(window).scrollTop();
      const viewportBottom = viewportTop + $(window).height();

      if (elementBottom > viewportTop && elementTop < viewportBottom) {
        flag = true;
      }
    });

    return flag;
  }
};

export const isInViewportOffset = (element) => {
  if (element.length) {
    let flag = false;
    element.each((_, el) => {
      const elementTop = element.offset().top - 800;
      const elementBottom = elementTop + element.outerHeight();
      const viewportTop = $(window).scrollTop();
      const viewportBottom = viewportTop + $(window).height();

      if (elementBottom > viewportTop && elementTop < viewportBottom) {
        flag = true;
      }
    });
    return flag;
  }
};

export const inVP = (elm) => {
  if (isInViewport(elm) || isInViewportOffset(elm)) {
    return true;
  } else {
    return false;
  }
};

export const lazyLoad = (element) => {
  const scrollTop = window.pageYOffset;
  const win = $(window);
  element.each((index, e) => {
    var $this = $(e),
      src = $this.attr("data-src"),
      srcset = $this.attr("data-srcset"),
      tab = $this.attr("dataa-tab"),
      mobile = $this.attr("data-mobile");

    if (win.width() > 767 && win.width() <= 1024 && tab) {
      src = tab;
    } else if (win.width() < 768 && mobile) {
      src = mobile;
    }

    $this.addClass("inview");

    if ($this.hasClass("lazy-bg")) {
      $this
        .removeClass("lazy-bg lazy desk-lazy")
        .removeAttr("data-src")
        .css({ "background-image": "url(" + src + ")" });
    } else {
      if (mobile && $(window).width() < 768) {
        $this.removeClass("lazy desk-lazy").attr("src", mobile);
      } else {
        //$this.attr('srcset', srcset);
        $this.removeAttr("data-srcset").attr("srcset", srcset);
        //$this.removeClass('lazy').attr('src', src);
        $this
          .removeClass("lazy desk-lazy")
          .removeAttr("data-src")
          .attr("src", src);
      }
    }

    $this.parent().removeClass("bg-dark");

    if ($this.parent().find(".spinner").length) {
      $this.parent().find(".spinner").remove();
    }
  });
};

export const importComponent = (element, classID) => {
  // if (element.length && !element.hasClass("init") && inVP(element)) { // for lazy loading
  if (element.length && !element.hasClass("init")) {
    import(
      /* webpackChunkName: "[request]" */ /* webpackMode: "lazy" */ `./components/${classID}`
    ).then((module) => {
      new module.default();
    });
    element.addClass("init");
  }
};

// Media Queries
export const max1200 = window.matchMedia("(max-width: 1200px)");
export const max767 = window.matchMedia("(max-width: 767px)");
export const max375 = window.matchMedia("(max-width: 375px)");
export const sm576 = window.matchMedia("(max-width: 576px)");
export const max991 = window.matchMedia("(max-width: 991px)");

export const isMobileAndTablet = () => {
  let check = false;
  (function (a) {
    if (
      /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(
        a
      ) ||
      /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
        a.substr(0, 4)
      )
    )
      check = true;
  })(navigator.userAgent || navigator.vendor || window.opera);
  return check;
};


// Define your breakpoints
const larger = 1600;
const xxl = 1400;
const xl = 1200;
const lg = 992;
const md = 768;
const sm = 576;

// Get the window object
const windowOn = window;

// Get the current device width
const device_width = window.innerWidth;

// Export the variables and windowOn object
export { windowOn, larger, xxl, xl, lg, md, sm, device_width };


// Three js
export const detectModelLoad = (modelViewer) => {
  if (!$(modelViewer).length) return;
  if (modelViewer.complete) {
    $(modelViewer).hasClass("model-rotate-trigger") && modelRotateTrigger(modelViewer);
    $(modelViewer).closest(".rotate-model-on-hover").length && rotateModelOnHover($(modelViewer).closest(".rotate-model-on-hover"));

    if ($(modelViewer).attr("data-color") && ($(modelViewer).attr("data-color") != "" || $(modelViewer).attr("data-color") != "gold")) {
      changeModelColor(modelViewer, $(modelViewer).attr("data-color"));
    } else {
      $(modelViewer).addClass("model-loaded");
    }
  } else {
    modelViewer.addEventListener("load", () => {
      $(modelViewer).hasClass("model-rotate-trigger") && modelRotateTrigger(modelViewer);
      $(modelViewer).closest(".rotate-model-on-hover").length && rotateModelOnHover($(modelViewer).closest(".rotate-model-on-hover"));

      if ($(modelViewer).attr("data-color") && $(modelViewer).attr("data-color") != "" && $(modelViewer).attr("data-color") != "gold") {
        changeModelColor(modelViewer, $(modelViewer).attr("data-color"));
      } else {
        $(modelViewer).addClass("model-loaded");
      }
    })
  }
}

export const changeModelColor = (currentValue, cl) => {
  const newColor = cl == "black" ? "#000000" : "#ffffff";

  const [material] = currentValue.model.materials;
  let colorString = hexToRgbToDecimal(newColor);

  let color = colorString.split(',')
  material.pbrMetallicRoughness.setBaseColorFactor(color);
  cl == "white" && material.pbrMetallicRoughness.setRoughnessFactor(0.67);

  cl == "black" && (
    currentValue.exposure = 1.5,
    material.pbrMetallicRoughness.setMetallicFactor(0.61),
    material.pbrMetallicRoughness.setRoughnessFactor(0.63)
  );

  setTimeout(() => {
    $(currentValue).addClass("model-loaded");
  }, 100)
}

export const rotateModelOnHover = (currentValue) => {
  const current = currentValue[0];
  const modelViewer = current.querySelector("model-viewer");
  const cameraOrbit = modelViewer.getCameraOrbit();

  let rotateTimeout = null;
  current.addEventListener("mouseover", (el) => {
    modelViewer.autoRotate = true;
    const tl = gsap.timeline({ ease: "circ.out" });

    gsap.to(modelViewer, {
      ease: "circ.out",
      keyframes: [
        { rotationPerSecond: "-100%", duration: 1.2 },
        { rotationPerSecond: "-4000%", duration: 1.8 },
        { rotationPerSecond: "-100%", duration: 0.8 }
      ]
    });
  });

  current.addEventListener("mouseout", (el) => {
    modelViewer.cameraOrbit = cameraOrbit;
    modelViewer.autoRotate = false;
    clearTimeout(rotateTimeout);
  });
};

export const modelRotateTrigger = (modelRotateTrigger) => {
  const temp = modelRotateTrigger.cameraOrbit.split(" ");
  const x = parseInt(temp[0].replace("deg", ""));
  const y = parseInt(temp[1].replace("deg", ""));
  const z = parseInt(temp[2].replace("%", ""));

  modelRotateTrigger.cameraOrbit = `-${x + 45}deg ${y}deg ${z}%`;

  gsap.to(modelRotateTrigger, {
    opacity: 1,
    delay: 0.4
  });

  const xOrbit = $(modelRotateTrigger).hasClass("extend-orbit") ? 180 : 90;
  const duration = $(modelRotateTrigger).hasClass("extend-orbit") ? 4000 : 2000;

  gsap.to(modelRotateTrigger, {
    cameraOrbit: `${xOrbit}deg ${y}deg ${z}%`,
    scrollTrigger: {
      trigger: modelRotateTrigger,
      start: "top bottom",
      end: `+=${duration}s`,
      scrub: true,
      immediateRender: false,
    },
  });
}

export const hexToRgbToDecimal = (hex) => {
  var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
  return result ? `${parseInt(result[1], 16) / 255}, ${parseInt(result[2], 16) / 255}, ${parseInt(result[3], 16) / 255}` : null;
}

export const useDebounce = (func, timeout = 500) => {
  let timer;

  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      func.apply(this, args);
    }, timeout);
  };
}
