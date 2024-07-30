import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

export function isOverlapping(element1, element2) {
  const bounds1 = element1.getBoundingClientRect();
  const bounds2 = element2.getBoundingClientRect();
  return !(
    bounds1.bottom < bounds2.top ||
    bounds1.top > bounds2.bottom ||
    bounds1.right < bounds2.left ||
    bounds1.left > bounds2.right
  );
}

gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.prototype.isOverlapping = isOverlapping;
