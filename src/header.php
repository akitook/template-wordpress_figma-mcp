<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- Global site tag (gtag.js) - Google Analytics
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-000000000"></script>
-->
  <script>
    /*
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-00000000');
  */
  </script>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>">
  <?php /*
  <title><?php wp_title(); ?></title>
  */ ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=yes">
  <meta name="format-detection" content="telephone=no">
  <link rel="icon" type="image/png" sizes="256x256" href="<?php echo get_template_directory_uri(); ?>/assets/img/icon_256.jpg">
  <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icon_180.jpg">
  <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100;200;300;400&family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@300;500&display=swap" rel="stylesheet">

  <!-- wp_head -->
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <?php
  $links = site_links();
  $contact = site_contact();
  $logo_tag = (is_front_page() && is_home()) ? 'h1' : 'div';
  ?>
  <header id="header" class="l-header">
    <div class="l-header__inner">
      <<?php echo $logo_tag; ?> class="l-header__logo">
        <a href="<?php echo esc_url($links['top']); ?>">
          <img src="<?php echo theme_image_url('common/logo.svg'); ?>" alt="<?php echo esc_attr($contact['name']); ?>" width="188" height="64">
        </a>
      </<?php echo $logo_tag; ?>>
      <nav class="l-header__navigation u-hide-down-lg" aria-label="グローバルナビゲーション">
        <ul class="l-header__navigation-list">
          <li><a href="<?php echo esc_url($links['top']); ?>">Top</a></li>
          <li><a href="<?php echo esc_url($links['about']); ?>">About</a></li>
          <li><a href="<?php echo esc_url($links['plan']); ?>">Plan</a></li>
          <li><a href="<?php echo esc_url($links['works']); ?>">Works</a></li>
          <li><a href="<?php echo esc_url($links['news']); ?>">News</a></li>
          <li><a href="<?php echo esc_url($links['faq']); ?>">FAQ</a></li>
          <li><a href="<?php echo esc_url($links['contact']); ?>">Contact</a></li>
          <li>
            <a class="c-external-link" href="<?php echo esc_url($links['instagram']); ?>" target="_blank" rel="noopener">
              Instagram<img class="c-external-link__icon" src="<?php echo theme_image_url('common/icon-arrow.svg'); ?>" alt="" width="9" height="11">
            </a>
          </li>
        </ul>
      </nav>
      <div class="l-header__actions">
        <a class="l-header__line c-external-link u-hide-up-lg" href="<?php echo esc_url($links['line']); ?>" target="_blank" rel="noopener">
          Contact on LINE<img class="c-external-link__icon" src="<?php echo theme_image_url('common/icon-arrow.svg'); ?>" alt="" width="9" height="11">
        </a>
        <button class="l-header__menu-button js-menu-toggle" type="button" aria-controls="menu" aria-expanded="false" aria-label="メニューを開く">
          <img class="u-hide-down-lg" src="<?php echo theme_image_url('common/icon-menu-open.svg'); ?>" alt="" width="56" height="9">
          <img class="u-hide-up-lg" src="<?php echo theme_image_url('common/icon-menu-open-small.svg'); ?>" alt="" width="40" height="7">
        </button>
      </div>
    </div>
  </header>

  <?php // メニュー展開時（Figma: TOP_Menu展開時_PC / TOP_Menu_SP） ?>
  <div id="menu" class="p-menu" aria-hidden="true">
    <div class="p-menu__panel">
      <div class="p-menu__header">
        <a class="p-menu__logo" href="<?php echo esc_url($links['top']); ?>">
          <img src="<?php echo theme_image_url('common/logo-white.svg'); ?>" alt="<?php echo esc_attr($contact['name']); ?>" width="188" height="64">
        </a>
        <button class="p-menu__close js-menu-toggle" type="button" aria-controls="menu" aria-label="メニューを閉じる">
          Close<img src="<?php echo theme_image_url('common/icon-menu-close.svg'); ?>" alt="" width="40" height="1">
        </button>
      </div>
      <div class="p-menu__body">
        <div class="p-menu__row">
          <p class="p-menu__label">Menu</p>
          <div class="p-menu__links">
            <ul class="p-menu__list">
              <li><a href="<?php echo esc_url($links['top']); ?>">Top</a></li>
              <li><a href="<?php echo esc_url($links['about']); ?>">About</a></li>
              <li><a href="<?php echo esc_url($links['works']); ?>">Works</a></li>
              <li><a href="<?php echo esc_url($links['news']); ?>">News</a></li>
              <li><a href="<?php echo esc_url($links['faq']); ?>">FAQ</a></li>
            </ul>
            <ul class="p-menu__list">
              <li><a href="<?php echo esc_url($links['plan']); ?>">Plan</a></li>
              <li class="p-menu__sub-item"><a href="<?php echo esc_url($links['muni']); ?>">-&nbsp;&nbsp;Muni</a></li>
              <li class="p-menu__sub-item"><a href="<?php echo esc_url($links['awai']); ?>">-&nbsp;&nbsp;Awai</a></li>
              <li class="p-menu__sub-item"><a href="<?php echo esc_url($links['utsushiki']); ?>">-&nbsp;&nbsp;Utsushiki</a></li>
            </ul>
          </div>
        </div>
        <div class="p-menu__row">
          <p class="p-menu__label">Social media</p>
          <a class="c-external-link" href="<?php echo esc_url($links['instagram']); ?>" target="_blank" rel="noopener">
            Instagram<img class="c-external-link__icon" src="<?php echo theme_image_url('common/icon-arrow-white.svg'); ?>" alt="" width="9" height="11">
          </a>
        </div>
        <div class="p-menu__row p-menu__row--vertical">
          <p class="p-menu__label">Contact</p>
          <div class="p-menu__buttons">
            <a class="c-paper-button" href="<?php echo esc_url($links['line']); ?>" target="_blank" rel="noopener">
              気軽にLINEで相談する<img class="c-paper-button__icon" src="<?php echo theme_image_url('common/icon-arrow-button.svg'); ?>" alt="" width="11" height="13">
            </a>
            <a class="c-paper-button" href="<?php echo esc_url($links['contact']); ?>">じっくりメールで相談する</a>
          </div>
        </div>
      </div>
    </div>
  </div>
