import headerScroll from "./modules/headerScroll";
import menu from "./modules/menu";
import fadeInContents from "./modules/fadeInContents";
import watchResize from "./modules/watchResize";
// import setupYubinbango from './modules/setupYubinbango'

//  サンプル用 複製時は削除してください //
import sampleJS from "./modules/sampleJS";

window.addEventListener("DOMContentLoaded", () => {
  menu();
});

export default {
  headerScroll,
  fadeInContents,
  watchResize,

  //  サンプル用 複製時は削除してください //
  sampleJS,
};
