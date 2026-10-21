/**
 * サンプルページ用の UI 挙動（アコーディオン・タブ・フィルター・モーダル・スムーススクロール）。
 * jQuery は WordPress 提供のグローバル `jQuery` を利用（`external` + `import` でバンドルに含めない）。
 * default import 名は `jQuery` にすること。`$` だと globals が効かない環境で IIFE 末尾が `})($);` になり WP で未定義になる。
 *
 * @module sampleJS
 */
import $ from "jquery";

const sampleJS = () => {
  /* ======================================================
    アコーディオン
    ====================================================== */
  // アコーディオンをクリックした時の動作
  $(".js-accordion .p-faqlist__title").on("click", function () {
    // タイトル要素をクリックしたら
    const findElm = $(this).next(".p-faqlist__content"); // 直後のアコーディオンを行うエリアを取得し
    $(findElm).slideToggle(); // アコーディオンの上下動作

    if ($(this).hasClass("is-close")) {
      // タイトル要素にクラス名closeがあれば
      $(this).removeClass("is-close"); // クラス名を除去し
    } else {
      // それ以外は
      $(this).addClass("is-close"); // クラス名closeを付与
    }
  });

  // ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
  $(window).on("load", function () {
    $(".js-accordion li:first-of-type section").addClass("is-open"); // accordion-areaのはじめのliにあるsectionにopenクラスを追加
    $(".is-open").each(function (index, element) {
      // openクラスを取得
      const Title = $(element).children(".p-faqlist__title"); // openクラスの子要素のtitleクラスを取得
      $(Title).addClass("is-close"); // タイトルにクラス名closeを付与し
      const Box = $(element).children(".p-faqlist__content"); // openクラスの子要素boxクラスを取得
      $(Box).slideDown(500); // アコーディオンを開く
    });
  });

  /* ======================================================
  タブ
  ====================================================== */
  $(".js-tab .p-tab__button > li").on("click", function () {
    const tabGroup = $(this).parents(".p-tab");
    const tabMenu = tabGroup.find(".p-tab__button > li");
    const tabContent = tabGroup.find(".p-tab__content > div");
    tabMenu.removeClass("is-active");
    $(this).addClass("is-active");
    // クリックしたタブからインデックス番号を取得
    const index = tabMenu.index(this);
    tabContent.removeClass("is-show").hide();
    // クリックしたタブと同じインデックス番号をもつコンテンツを表示
    tabContent.eq(index).stop().fadeIn().addClass("is-show");
  });

  /* ======================================================
  フィルター
  ====================================================== */
  const category = $(".category__list li");
  const item = $(".item__list li");

  category.on("click", function (e) {
    e.preventDefault();
    category.removeClass("is-active");
    $(this).addClass("is-active");
    const value = $(this).data("filter");
    if (value == "all") {
      item
        .fadeOut()
        .finish()
        .promise()
        .done(function () {
          item.each(function (i) {
            $(this)
              .delay(i++ * 60)
              .fadeIn(400);
          });
        });
    } else {
      item
        .fadeOut()
        .finish()
        .promise()
        .done(function () {
          item.filter('[data-category = "' + value + '"]').each(function (i) {
            $(this)
              .delay(i++ * 60)
              .fadeIn(400);
          });
        });
    }
  });

  /* ======================================================
  モーダル
  ====================================================== */
  const openBtn = $(".title-item");
  const closeBtn = $(".modal-close");
  $(".modal").hide();
  $(".modal-item").hide();

  openBtn.on("click", function (e) {
    e.preventDefault();
    const value = $(this).data("title");
    $('[data-modal = "' + value + '"]').fadeIn(300);
    $(".modal").fadeIn(300);
    $("body").css("overflow", "hidden");
  });

  closeBtn.on("click", function () {
    $(".modal-item").fadeOut(300);
    $(".modal").fadeOut(300);
    $("body").css("overflow", "auto");
  });

  /* ======================================================
    スムーススクロール
    ====================================================== */
  $('a[href^="#"]').on("click", function () {
    const speed = 400;
    const href = $(this).attr("href");
    const target = $(href == "#" || href == "" ? "html" : href);
    const position = target.offset().top;
    $("body,html").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
};

export default sampleJS();
