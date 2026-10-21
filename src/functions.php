<?php

/**
 * Add Theme Supports
 * WordPressのテーマ拡張機能の有効化
 */

// サムネイル
add_theme_support('post-thumbnails');
// タイトルタグ
add_theme_support('title-tag');

/**
 * Include Functions
 * 必要なものだけインクルード
 */
// get_template_part('functions/custom_acf'); // ACFの設定・カスタマイズ
// get_template_part('functions/custom_archives'); // アーカイブのカスタマイズ
// get_template_part('functions/custom_contactform7'); // ContactForm7のカスタマイズ
// get_template_part('functions/custom_mwwpform'); // MWWPFORMのカスタマイズ
get_template_part('functions/custom_pagination'); // ページネーションのカスタマイズ
// get_template_part('functions/custom_postslink'); // 次の記事および前の記事へのリンクにクラス付与
// get_template_part('functions/invalid_visual_editor'); // テキストエディターでのビジュアルモードを無効
// get_template_part('functions/invalid_user_names'); // ユーザー名の外部公開防止
// get_template_part('functions/invalid_emoji'); // 絵文字機能を無効化
get_template_part('functions/invalid_comments'); // コメントの無効化
get_template_part('functions/custom_visual_editor'); // ビジュアルエディタのカスタマイズ
get_template_part('functions/register_post_taxonomy'); // カスタム投稿、タクソノミーの登録
get_template_part('functions/register_style_script'); // CSS, Javascriptの登録
// get_template_part('functions/register_thumbnails'); // サムネイル（アイキャッチ）画像の設定
