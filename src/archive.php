<?php get_header(); ?>
<main class="archive l-main">
  <div class="l-page">
    <div class="p-container--lg">
      <div class="l-page__header">
        <div class="l-page__title">
          <div class="en"><span>archive</span></div>
          <h1 class="ja"><?php the_archive_title(); ?></h1>
        </div>
      </div>
      <div class="l-page__container">
        <div class="l-page__breadcrumb">
          <?php get_template_part('template-parts/breadcrumb'); ?>
        </div>
        <div class="p-container">
          <div class="archive__container">
            <?php if (have_posts()) : ?>
              <ul class="archive__list">
                <?php while (have_posts()) : the_post(); ?>
                  <li class="archive__item">
                    <article class="p-article-card">
                      <a href="<?php the_permalink(); ?>" class="p-article-card__inner">
                        <div class="p-article-card__thumbnail">
                          <?php if (get_the_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                          <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.jpg" alt="noimage">
                          <?php endif; ?>
                        </div>
                        <div class="p-article-card__body">
                          <div class="p-article-card__date"><?php the_time('Y.m.d'); ?></div>
                          <h2 class="p-article-card__title"><?php the_title(); ?></h2>
                        </div>
                      </a>
                    </article>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php else : ?>
              <div class="archive-nopost">
                <h2 class="archive-nopost__title">該当する記事がありません</h2>
                <div class="archive-nopost__action c-button-wrapper">
                  <a class="c-button" href="<?php echo home_url(); ?>">TOPに戻る</a>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <?php
          if (function_exists("the_pagination")) :
            $pagination_array = the_pagination();
            // 配列であれば表示
            if (is_array($pagination_array)) :
          ?>
              <div class="p-pagination">
                <div class="p-pagination__container">
                  <?php
                  echo '<ul class="p-pagination__list">';
                  foreach ($pagination_array as $key => $val) {
                    echo '<li class="p-pagination__item">' . $pagination_array[$key] . '</li>';
                  }
                  echo '</ul>';
                  ?>
                </div>
              </div>
          <?php
            endif;
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
