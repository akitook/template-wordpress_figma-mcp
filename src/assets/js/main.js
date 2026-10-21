import headerScroll from "./modules/headerScroll";
import fadeInContents from "./modules/fadeInContents";
import watchResize from "./modules/watchResize";
// import setupYubinbango from './modules/setupYubinbango'

//  サンプル用 複製時は削除してください //
import sampleJS from "./modules/sampleJS";

window.addEventListener("DOMContentLoaded", () => {
  const drawer = document.querySelector(".js-drawer");
  const menuIcon = document.querySelector(".c-menu-icon");
  const header = document.querySelector("#header");
  drawer.addEventListener("click", () => {
    drawer.classList.toggle("is-open");
    menuIcon.classList.toggle("is-open");
    header.classList.toggle("is-open");
  });
});

export default {
  headerScroll,
  fadeInContents,
  watchResize,

  //  サンプル用 複製時は削除してください //
  sampleJS,
};
