<?php
// 絵文字機能を無効化
function disable_wp_emojis()
{
  // スクリプトとスタイルの削除（フロント・管理画面）
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');

  // 6.4以降：インラインスタイル読み込み無効化（フロント・管理画面）
  if (function_exists('wp_enqueue_emoji_styles')) {
    remove_action('wp_enqueue_scripts', 'wp_enqueue_emoji_styles');
    remove_action('admin_enqueue_scripts', 'wp_enqueue_emoji_styles');
  }

  // 絵文字変換フィルターの削除
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

  // TinyMCE（エディタ）から絵文字プラグイン削除
  add_filter('tiny_mce_plugins', function ($plugins) {
    return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
  });

  // 絵文字SVGの読み込み停止
  add_filter('emoji_svg_url', '__return_false');
}
add_action('init', 'disable_wp_emojis');
