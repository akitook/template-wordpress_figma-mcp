<?php

/**
 * お知らせ（news）の表示用
 */

// 最初のカテゴリー（newscat）の名前。未設定なら空文字
function news_category_name($post_id)
{
  $terms = get_the_terms($post_id, 'newscat');
  return ($terms && !is_wp_error($terms)) ? $terms[0]->name : '';
}
