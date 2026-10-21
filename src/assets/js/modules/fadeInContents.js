import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const fadeInContents = () => {
  document.addEventListener("DOMContentLoaded", () => {
    // 画面に入ったらis-activeを付与
    const fadeInItem = document.querySelectorAll(".m-fadeIn");

    fadeInItem.forEach((el, _index) => {
      ScrollTrigger.create({
        trigger: el,
        start: "top 90%",
        toggleClass: "is-active",
        once: true,
      });
    });

    const fadeInGroup = document.querySelectorAll(".m-fadeInGroup");
    ScrollTrigger.create({
      trigger: fadeInGroup,
      start: "top 90%",
      toggleClass: "is-active",
      once: true,
    });
  });
};

export default fadeInContents();
