<?php get_header(); ?>
<main class="page l-main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="l-page">
        <div class="p-container--lg">
          <div class="l-page__header">
            <div class="l-page__title">
              <div class="en"><span>ABOUT</span></div>
              <h1 class="ja">このサイトについて</h1>
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
