<?php

/**
 * アーカイブのタイトルタグ（<title>）をカスタマイズ
 */


/* 通常
function change_title_tag( $title ) {

  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  } elseif ( is_post_type_archive( 'カスタム投稿名' ) ) {
    $title = '任意のタイトル';
  }
  return $title;
}
add_filter( 'pre_get_document_title', 'change_title_tag' );
*/

/* All in One SEOの場合 */
function change_aioseop_title($title)
{

  if (is_category()) { /* カテゴリーアーカイブの場合 */
    $title = single_cat_title('', false) . 'ブログ';
  } elseif (is_tag()) { /* タグアーカイブの場合 */
    $title = single_tag_title('', false);
  } elseif (is_post_type_archive('カスタム投稿名')) { /* parts投稿タイプのアーカイブの場合 */
    $title = '任意のタイトル';
  }
  return $title;
}
add_filter('aioseop_title', 'change_aioseop_title');

/**
 * アーカイブのthe_archive_title（<h1>）をカスタマイズ
 */
function change_archive_title($title) {

  if (is_category()) { /* カテゴリーアーカイブの場合 */
    $title = single_cat_title('', false) . 'ブログ';
  } elseif (is_tag()) { /* タグアーカイブの場合 */
    $title = single_tag_title('', false);
  } elseif (is_tax('columncat')) {
    $title = single_term_title("", false) . 'のコラム';
  } elseif (is_tax('newscat')) {
    $title = single_term_title("", false) . 'のお知らせ';
  } elseif (is_year()) {
    $title = get_the_time('Y年');
  }

  return $title;
};
add_filter('get_the_archive_title', 'change_archive_title');

/**
 * wp_get_archivesの出力に「年」を追加
 */

function add_unit_year_archives($link_html)
{
  $regex = array(
    "/ title='([\d]{4})'/"  => " title='$1年'",
    "/ ([\d]{4}) /"         => " $1年 ",
    "/>([\d]{4})<\/a>/"        => ">$1年</a>"
  );
  $link_html = preg_replace(array_keys($regex), $regex, $link_html);
  return $link_html;
}
add_filter('get_archives_link', 'add_unit_year_archives');
