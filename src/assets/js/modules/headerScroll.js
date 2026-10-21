/* headerScroll
 * 一定量スクロールでヘッダー固定
   ----------------------------------------------------------------- */

const headerScroll = () => {
  let winScrollTop = window.scrollY || window.pageYOffset;
  let startPos = 0;
  const header = document.getElementById("header");
  const headerHeight = 80;

  // .is-scroll - スクロール検知した時に付与
  // .is-show - 上にスクロールしたときに付与

  const headerScroll = () => {
    winScrollTop = window.scrollY || window.pageYOffset;
    if (winScrollTop === 0) {
      startPos = 0;
    }

    if (winScrollTop >= headerHeight) {
      header.classList.add("is-scroll");

      if (winScrollTop === startPos) {
        // for IE11
      } else if (winScrollTop - startPos < 0) {
        header.classList.add("is-show");
      } else {
        header.classList.remove("is-show");
      }
      setTimeout(() => {
        startPos = winScrollTop;
      }, 100);
    } else {
      header.classList.remove("is-scroll");
      header.classList.remove("is-show");
    }
  };

  window.addEventListener("scroll", headerScroll);
};

export default headerScroll();
