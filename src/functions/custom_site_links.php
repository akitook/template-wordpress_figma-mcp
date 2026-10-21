<?php

/**
 * ヘッダー・メニュー・フッターで共通して使うリンクと連絡先
 * 値は docs/project/site-info.md と揃える
 */
function site_links()
{
  return array(
    'top' => home_url('/'),
    'about' => home_url('/about/'),
    'plan' => home_url('/plan/'),
    'muni' => home_url('/plan/muni/'),
    'awai' => home_url('/plan/awai/'),
    'utsushiki' => home_url('/plan/utsushiki/'),
    'works' => home_url('/works/'),
    'news' => home_url('/news/'),
    'faq' => home_url('/faq/'),
    'contact' => home_url('/contact/'),
    'privacy' => home_url('/privacy-policy/'),
    'instagram' => 'https://www.instagram.com/knot_wedding_produce/',
    'line' => 'https://lin.ee/v2aOlLW',
  );
}

function site_contact()
{
  return array(
    'name' => 'Knot total wedding produce',
    'tel' => '082-555-1122',
    'mail' => 'info@knotwedding.jp',
  );
}

// テーマ内の画像のURL（例: theme_image_url('common/logo.svg')）
function theme_image_url($path)
{
  return get_template_directory_uri() . '/assets/img/' . $path;
}
