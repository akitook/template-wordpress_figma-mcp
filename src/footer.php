<?php
$links = site_links();
$contact = site_contact();
?>

<?php
// お問い合わせ導線（お問い合わせフォームのページでは出さない）
if (!is_page(array('contact', 'confirm', 'complete'))) {
  get_template_part('template-parts/contact');
}
?>

<?php // Figma: footer_pc（PC/TAB）/ contact_sp 内の footer（SP） ?>
<footer class="l-footer">
  <div class="l-footer__inner">
    <a class="l-footer__logo" href="<?php echo esc_url($links['top']); ?>">
      <img src="<?php echo theme_image_url('common/logo-white.svg'); ?>" alt="<?php echo esc_attr($contact['name']); ?>" width="188" height="64">
    </a>
    <div class="l-footer__information">
      <div class="l-footer__row">
        <p class="l-footer__label">Menu</p>
        <ul class="l-footer__menu l-footer__menu--first">
          <li><a href="<?php echo esc_url($links['top']); ?>">Top</a></li>
          <li><a href="<?php echo esc_url($links['about']); ?>">About</a></li>
        </ul>
        <ul class="l-footer__menu l-footer__menu--plan">
          <li><a href="<?php echo esc_url($links['plan']); ?>">Plan</a></li>
          <li class="l-footer__sub-item"><a href="<?php echo esc_url($links['muni']); ?>">-&nbsp;&nbsp;Muni</a></li>
          <li class="l-footer__sub-item"><a href="<?php echo esc_url($links['awai']); ?>">-&nbsp;&nbsp;Awai</a></li>
          <li class="l-footer__sub-item"><a href="<?php echo esc_url($links['utsushiki']); ?>">-&nbsp;&nbsp;Utsushiki</a></li>
        </ul>
        <ul class="l-footer__menu l-footer__menu--last">
          <li><a href="<?php echo esc_url($links['works']); ?>">Works</a></li>
          <li><a href="<?php echo esc_url($links['news']); ?>">News</a></li>
          <li><a href="<?php echo esc_url($links['faq']); ?>">FAQ</a></li>
          <li><a href="<?php echo esc_url($links['contact']); ?>">Contact</a></li>
        </ul>
      </div>
      <div class="l-footer__row">
        <p class="l-footer__label">Social<br class="u-hide-up-lg"> media</p>
        <div class="l-footer__social">
          <a class="c-external-link" href="<?php echo esc_url($links['instagram']); ?>" target="_blank" rel="noopener">
            Instagram<img class="c-external-link__icon" src="<?php echo theme_image_url('common/icon-arrow-white.svg'); ?>" alt="" width="9" height="11">
          </a>
          <a class="c-external-link" href="<?php echo esc_url($links['line']); ?>" target="_blank" rel="noopener">
            LINE<img class="c-external-link__icon" src="<?php echo theme_image_url('common/icon-arrow-white.svg'); ?>" alt="" width="9" height="11">
          </a>
        </div>
      </div>
      <div class="l-footer__row">
        <p class="l-footer__label">Contact</p>
        <dl class="l-footer__contact">
          <div>
            <dt>Tel / Fax :</dt>
            <dd><a href="tel:<?php echo esc_attr(str_replace('-', '', $contact['tel'])); ?>"><?php echo esc_html($contact['tel']); ?></a></dd>
          </div>
          <div>
            <dt>Mail :</dt>
            <dd><a href="mailto:<?php echo esc_attr($contact['mail']); ?>"><?php echo esc_html($contact['mail']); ?></a></dd>
          </div>
        </dl>
      </div>
    </div>
    <div class="l-footer__legal">
      <a href="<?php echo esc_url($links['privacy']); ?>">Privacy Policy</a>
      <small class="l-footer__copyright">&copy; <?php echo esc_html($contact['name']); ?></small>
    </div>
  </div>
</footer>

<!-- wp_footer -->
<?php wp_footer(); ?>
<!-- /wp_footer -->
</body>

</html>
