<?php

/**
 * ページネーションのカスタマイズ
 *
 **/

function the_pagination()
{
  // 一覧ページのクエリ
  global $wp_query;
  $big = 999999999;
  // １ページ以下なら非表示
  if ($wp_query->max_num_pages > 1) {
    return paginate_links(array(
      'base' => str_replace($big, '%#%', esc_url(
        get_pagenum_link($big)
      )),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total' => $wp_query->max_num_pages,
      'type' => 'array',
      'end_size' => 2,
      'mid_size' => 2,
      'prev_next' => false
    ));
  }
}
