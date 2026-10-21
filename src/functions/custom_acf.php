<?php

/**
 * ACFの設定・カスタマイズ
 *
 **/

// 公開後でもプレビューでACFの値を表示させる
add_filter('wp_insert_post_data', function ($data) {
  if (isset($_GET['meta-box-loader'])) {
    unset($data["post_modified"]);
    unset($data["post_modified_gmt"]);
  }

  return $data;
});

// Google Map登録
/*
function my_acf_google_map_api( $api ){
  $api['key'] = ''; // 取得したkeyを設定
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
*/
