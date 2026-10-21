<?php

/**
 * Contact Form 7 のカスタマイズ
 *
 **/

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}

// スパム対策（英数字のみでの項目への入力を禁止する）your-detailの場合
/*
add_filter('wpcf7_validate', 'wpcf7_validate_spam_message', 10, 2);
function wpcf7_validate_spam_message($result, $tag)
{
  $value = str_replace(array(PHP_EOL, ' '), '', esc_attr($_POST['your-detail']));
  if (!empty($value)) {
    if (preg_match('/^[!-~]+$/', $value)) {
      $result['valid'] = false;
      $result['reason'] = array('your-detail' => '日本語で入力してください');
    }
  }
  return $result;
}
*/

// バリデーション（テキストタイプ）
/*
add_filter('wpcf7_validate_text', 'custom_text_validation_filter', 20, 2);
add_filter('wpcf7_validate_text*', 'custom_text_validation_filter', 20, 2);
function custom_text_validation_filter($result, $tag)
{
  $name = $tag['name'];
  // 名前とフリガナで全角日本語を指定する
  if ($name == 'your-name-last' || $name == 'your-name-first' || $name == 'your-kana-last' || $name == 'your-kana-first') {
    $value = isset($_POST[$name]) ? trim($_POST[$name]) : '';
    if (!preg_match('/^[ぁ-ゞァ-ヾ\x{2E80}-\x{2FDF}々〇〻\x{3400}-\x{4DBF}\x{4E00}-\x{9FFF}\x{F900}-\x{FAFF}\x{20000}-\x{3FFFF}]+$/u', $value)) {
      $result->invalidate($tag, '全角日本語で入力してください。');
    }
  }
  // 郵便番号を半角で入力させる（3桁-4桁で入力が分かれている場合）
  if ($name == 'your-zip-01') {
    $value = isset($_POST[$name]) ? trim($_POST[$name]) : '';
    if (!preg_match('/^[0-9]{3}$/', $value)) {
      $result->invalidate($tag, '半角数字の3文字で入力してください。');
    }
  }
  if ($name == 'your-zip-02') {
    $value = isset($_POST[$name]) ? trim($_POST[$name]) : '';
    if (!preg_match('/^[0-9]{4}$/', $value)) {
      $result->invalidate($tag, '半角数字の4文字で入力してください。');
    }
  }

  // 郵便番号を半角で入力させる（7桁入力の場合）
  // if ($name == 'your-zip') {
  //   $value = isset($_POST[$name]) ? trim($_POST[$name]) : '';
  //   if (!preg_match('/^[0-9]{3}-[0-9]{4}$/', $value)) {
  //     $result->invalidate($tag, '半角数字で入力してください。');
  //   }
  // }
  return $result;
}
*/

// バリデーション（メール）
/*
add_filter('wpcf7_validate_email', 'custom_email_validation_filter', 11, 2);
add_filter('wpcf7_validate_email*', 'custom_email_validation_filter', 11, 2);
function custom_email_validation_filter($result, $tag)
{
  // メールアドレス一致確認
  if ('your-email-confirm' == $tag->name) {
    $your_email = isset($_POST['your-email']) ? trim($_POST['your-email']) : '';
    $your_email_confirm = isset($_POST['your-email-confirm']) ? trim($_POST['your-email-confirm']) : '';
    if ($your_email != $your_email_confirm) {
      $result->invalidate($tag, "メールアドレスが一致しません");
    }
  }
  return $result;
}
*/
