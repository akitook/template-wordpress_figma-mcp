<?php

/**
 * Works一覧の絞り込み
 * /works/?works_area=tokyo,osaka のように、タクソノミーごとにタームのスラッグをカンマ区切りで指定する
 * 同じタクソノミー内はOR、タクソノミー間はAND（WordPress標準のクエリ変数の挙動）
 */

// 選択中のタームのスラッグ
function works_filter_selected_terms($taxonomy)
{
  $value = get_query_var($taxonomy);
  if (!$value) {
    return array();
  }
  return array_filter(array_map('sanitize_title', explode(',', $value)));
}

// タームの選択を切り替えたURL（他のタクソノミーの選択は維持し、ページ送りはリセット）
function works_filter_url($taxonomy, $term_slug)
{
  $query_args = array();
  foreach (array_keys(works_taxonomies()) as $works_taxonomy) {
    $selected = works_filter_selected_terms($works_taxonomy);
    if ($works_taxonomy === $taxonomy) {
      if (in_array($term_slug, $selected, true)) {
        $selected = array_diff($selected, array($term_slug));
      } else {
        $selected[] = $term_slug;
      }
    }
    if ($selected) {
      $query_args[$works_taxonomy] = implode(',', $selected);
    }
  }
  return add_query_arg($query_args, get_post_type_archive_link('works'));
}
