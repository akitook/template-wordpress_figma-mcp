// scssで指定したブレイクポイントと同じ数値を設定
export const bp = {
  xs: 425,
  sm: 554,
  md: 768,
  lg: 992,
  xl: 1200,
  max: 1920,
};
export const checkBreakPoint = (breakpoint = "md") => {
  // 初期値'md'
  const windowWidth = window.innerWidth;
  // 引数にブレイクポイントの名前(xs, sm...)か数値を受け取る
  let BPWidth;
  if (typeof breakpoint === "string") {
    BPWidth = bp[breakpoint];
  } else if (typeof breakpoint === "number") {
    BPWidth = breakpoint;
  }

  // ウィンドウ幅がブレイクポイント以上であればtrueを返す
  return windowWidth >= BPWidth;
};
