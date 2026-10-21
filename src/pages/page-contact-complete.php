<?php
/*
Template Name: contact-complete
*/
?>

<?php get_header(); ?>
<main class="page-contact page-contact-complete l-main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="l-page">
        <div class="p-container--lg">
          <div class="l-page__header">
            <div class="l-page__title">
              <div class="en"><span>CONTACT</span></div>
              <h1 class="ja">お問い合わせ完了</h1>
            </div>
          </div>
          <div class="l-page__container">
            <div class="l-page__breadcrumb">
              <?php get_template_part('template-parts/breadcrumb'); ?>
            </div>
            <div class="p-container">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
  <?php endwhile;
  endif; ?>
</main>
<?php get_footer(); ?>
