<?php

/**
 * コメント機能を無効化
 */

// コメント受付を無効化（フロント側）
add_filter('comments_open', '__return_false', 20, 2);

// 管理画面の「コメント」メニューを非表示
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});
