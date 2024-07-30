import gsap from "gsap";

export default class CursorCustom {
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
    let mouse = { x: 0, y: 0 };
    let pos = { x: 0, y: 0 };
    let ratio = 0.65;
    let active = false;
    let cursor = document.querySelector(".cursor");

    gsap.set(cursor, {
      xPercent: -50,
      yPercent: -50,
    });

    document.addEventListener("mousemove", mouseMove);

    function mouseMove(e) {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      mouse.x = e.pageX;
      mouse.y = e.pageY - scrollTop;
    }

    gsap.ticker.add(updatePosition);

    function updatePosition() {
      if (!active) {
        pos.x += (mouse.x - pos.x) * ratio;
        pos.y += (mouse.y - pos.y) * ratio;
        gsap.to(cursor, 0, { x: pos.x, y: pos.y });
      }
    }

    let showCursor = document.querySelectorAll(".show-cursor");
    let hoverTimer;
    const ease = "cubic-bezier(0.25, 0.1, 0.25, 1)";
    showCursor.forEach((item) => {
      item.addEventListener("mouseenter", function () {
        document.body.style.cursor = 'none'; // Hide default cursor
        hoverTimer = setTimeout(function () {
            if (item.classList.contains("rotate")) {
                gsap.to(cursor, {
                    rotation: 180,
                    ease: ease,
                });
            }
            gsap.to(cursor, {
                scale: 1,
                ease: ease,
            });
        }, 150);
      });
      item.addEventListener("mouseleave", function () {
        document.body.style.cursor = ''; // Show default cursor
        clearTimeout(hoverTimer);
        gsap.to(cursor, {
          scale: 0,
          rotation: 0,
          ease: ease,
        });
      });
    });
  };
}
