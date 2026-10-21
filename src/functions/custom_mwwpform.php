<?php

/**
 * MW WP FORMのカスタマイズ
 *
 **/

// 添付ファイルの保存先と記載されたURLが異なるため、保存先フォルダをカスタムして統一
function my_mwform_upload_dir($path, $Data, $key)
{

  /* 2.8.0 〜 */
  return '/mw-wp-form_uploads';
}
add_filter('mwform_upload_dir_mw-wp-form-142', 'my_mwform_upload_dir', 10, 3);


/* 完了画面に問い合わせ番号を出力
function ag_mwform_complete_content( $content, $Data )
{
    //DBに保存した問い合わせの投稿IDを取得する
    $saved_mail_id   = $Data->get_saved_mail_id();

    //問い合わせ番号を取得する
    $tracking_number = get_post_meta($saved_mail_id, 'tracking_number', true);

    //input hiddenとして出力する
    $add_txt = '<input id="tracking-number" type="hidden" value="'.$tracking_number.'">';
    $content = $add_txt.$content;

    return $content;
}
add_filter( 'mwform_complete_content_mw-wp-form-142', 'ag_mwform_complete_content', 15, 2 );
add_filter( 'mwform_complete_content_mw-wp-form-143', 'ag_mwform_complete_content', 15, 2 );
*/

// mwwpformで自動改行処理を無効
function my_off_autop()
{
  if (class_exists('MW_WP_Form_Admin')) {
    $mw_wp_form_admin = new MW_WP_Form_Admin();
    $forms = $mw_wp_form_admin->get_forms();
    foreach ($forms as $form) {
      add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
    }
  }
}
my_off_autop();
