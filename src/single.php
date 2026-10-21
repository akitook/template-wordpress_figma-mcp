<?php get_header(); ?>
<main class="single l-main">
  <div class="l-page">
    <div class="p-container--lg">
      <div class="l-page__header">
        <div class="l-page__title">
          <div class="en"><span>NEWS</span></div>
          <div class="ja">お知らせ</div>
        </div>
      </div>
      <div class="l-page__container">
        <div class="l-page__breadcrumb">
          <?php get_template_part('template-parts/breadcrumb'); ?>
        </div>
        <div class="p-container">
          <?php if (have_posts()) while (have_posts()) : the_post(); ?>
            <article class="article">
              <div class="article__header">
                <div class="date"><?php the_time('Y.m.d'); ?></div>
                <h1 class="title"><?php the_title(); ?></h1>
                <div class="category">
                  <?php echo get_the_category_list($post->ID); ?>
                </div>
              </div>
              <div class="article__thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail(); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.jpg" alt="no image">
                <?php endif; ?>
              </div>
              <div class="article__content">
                <div class="p-editor-content">
                  <?php the_content(); ?>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
