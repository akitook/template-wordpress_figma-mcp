<?php get_header(); ?>
<main class="page-notfound l-main">
  <div class="l-page">
    <div class="p-container--lg">
      <div class="l-page__header">
        <div class="l-page__title">
          <div class="en"><span>NOT FOUND</span></div>
          <h1 class="ja">404</h1>
        </div>
      </div>
      <div class="l-page__container">
        <div class="l-page__breadcrumb">
          <?php get_template_part('template-parts/breadcrumb'); ?>
        </div>
        <div class="p-container">
          <div class="page-notfound__content">
            <h2 class="page-notfound__title">お探しのページは見つかりませんでした。</h2>
            <div class="page-notfound__description">
              <p>メニューまたは以下ボタンから他のページをご覧ください。</p>
              <p>ご不明な点がございましたら、お気軽にお問い合わせください。</p>
            </div>
            <div class="page-notfound__action">
              <div class="c-button-wrapper">
                <a href="<?php echo home_url(); ?>" class="c-button">トップに戻る</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>