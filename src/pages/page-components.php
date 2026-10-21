<?php
/*
Template Name: components
*/
?>

<?php get_header(); ?>
<main class="page-components l-main">
  <div class="l-page">
    <div class="p-container--lg">
      <div class="l-page__header">
        <div class="l-page__title">
          <div class="en"><span>COMPONENTS</span></div>
          <h1 class="ja">UIコンポーネント</h1>
        </div>
      </div>
      <div class="l-page__container">
        <div class="l-page__breadcrumb">
          <?php get_template_part('template-parts/breadcrumb'); ?>
        </div>
        <div class="p-container">
          <?php // Figmaのデザインからセクション単位で実装する（docs/agents/figma-mcp-wordpress.md） ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
