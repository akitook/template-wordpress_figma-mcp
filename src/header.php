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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- wp_head -->
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <header id="header" class="l-header">
    <div class="l-header__inner">
      <?php if (is_front_page() && is_home()) : ?>
        <h1 class="l-header__logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.svg" alt="サービス名称" /></a></h1>
      <?php else : ?>
        <div class="l-header__logo">
          <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.svg" alt="サービス名称" /></a>
        </div>
      <?php endif; ?>
      <nav class="l-header__nav">
        <ul>
          <li class="nav-item"><a href="<?php echo home_url('/about/'); ?>">このサイトについて</a></li>
          <li class="nav-item"><a href="<?php echo home_url('/news/'); ?>">お知らせ</a></li>
          <li class="nav-item"><a href="<?php echo home_url('/column/'); ?>">コラム</a></li>
          <li class="l-header__button"><a href="<?php echo home_url('/contact/'); ?>">ご相談・お見積り</a></li>
          <li class="l-header__button l-header__button--cta u-hide-down-lg"><a href="<?php echo home_url('/'); ?>">資料ダウンロード</a></li>
        </ul>
      </nav>
      <div class="l-header__menu c-menu-icon js-drawer">
        <div class="c-menu-icon__wrap">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </header>