/**
 * 指定した時間だけイベント発火を遅延させるdebounce関数
 * @param {Function} func 実行したい関数
 * @param {number} wait 遅延時間（ミリ秒）
 * @return {Function}
 */
function debounce(func, wait) {
  let timeout;
  return function (...args) {
    clearTimeout(timeout);
    timeout = setTimeout(() => func.apply(this, args), wait);
  };
}

const watchResize = () => {
  // window幅が変更されたときリロード
  let lastInnerWidth = window.innerWidth;
  window.addEventListener(
    "resize",
    debounce(() => {
      console.log("debounce");
      if (lastInnerWidth !== window.innerWidth) {
        lastInnerWidth = window.innerWidth;
        window.location.reload();
      }
    }, 300),
  );

  // 端末の向きが変更されたときリロード
  window.addEventListener(
    "orientationchange",
    () => {
      window.location.reload();
    },
    false,
  );
};

export default watchResize();
