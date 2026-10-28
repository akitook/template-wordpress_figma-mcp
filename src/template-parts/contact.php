<?php

/**
 * お問い合わせ導線（Share Your Story ＋ Instagram）
 * Figma: contact_pc / contact_sp。footer.php からフッターの直前に読み込む
 */

$links = site_links();
?>
<section class="p-contact" aria-labelledby="contact-title">
  <img class="p-contact__detail" src="<?php echo theme_image_url('common/contact-detail.jpg'); ?>" alt="" width="240" height="320" loading="lazy">
  <h2 id="contact-title" class="p-contact__title">
    <span class="p-contact__title-line">Share</span>
    <span class="p-contact__title-line p-contact__title-line--second">Your</span>
    <span class="p-contact__title-line p-contact__title-line--third">Story</span>
  </h2>
  <div class="p-contact__body">
    <img class="p-contact__photo" src="<?php echo theme_image_url('common/contact.jpg'); ?>" alt="" width="720" height="960" loading="lazy">
    <div class="p-contact__content">
      <p class="p-contact__lead">ふたりのことを、<br>教えてください。</p>
      <div class="p-contact__text">
        <p>「まだ何も決まっていないけれど」<br>「こんな希望は叶うのかな」<br>そんな小さなお気持ちのままで、<br>大丈夫です。</p>
        <p>ふたりの歩幅に合わせて、<br>ゆっくりとお話ししていきましょう。</p>
      </div>
      <div class="p-contact__buttons">
        <a class="c-paper-button c-paper-button--dark" href="<?php echo esc_url($links['line']); ?>" target="_blank" rel="noopener">
          気軽にLINEで相談する<img class="c-paper-button__icon" src="<?php echo theme_image_url('common/icon-arrow-white.svg'); ?>" alt="" width="9" height="11">
        </a>
        <a class="c-paper-button c-paper-button--dark" href="<?php echo esc_url($links['contact']); ?>">じっくりメールで相談する</a>
      </div>
    </div>
  </div>
  <div class="p-contact__instagram">
    <p class="p-contact__instagram-title">Instagram</p>
    <p class="p-contact__instagram-text">Knotのクリエイションと、<br class="u-hide-up-lg">そこに込めた想いをご紹介しています。</p>
    <a class="p-contact__instagram-link c-external-link" href="<?php echo esc_url($links['instagram']); ?>" target="_blank" rel="noopener">
      インスタグラムを見る<img class="c-external-link__icon" src="<?php echo theme_image_url('common/icon-arrow-button.svg'); ?>" alt="" width="11" height="13">
    </a>
  </div>
  <img class="p-contact__decoration" src="<?php echo theme_image_url('common/decoration-line-contact.svg'); ?>" alt="" width="464" height="612">
</section>
