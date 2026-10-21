<?php get_header(); ?>
<main class="news l-main">
  <div class="l-page">
    <div class="p-container--lg">
      <div class="l-page__header">
        <div class="l-page__title">
          <div class="en"><span>NEWS</span></div>
          <h1 class="ja">お知らせ</h1>
        </div>
      </div>
      <div class="l-page__container">
        <div class="l-page__breadcrumb">
          <?php
          if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p class="p-breadcrumb">', '</p>');
          } else {
            echo '<p class="p-breadcrumb"><span><span><a href="/">ホーム</a> » <span><a href="/">子ページ</a> » <span class="breadcrumb_last" aria-current="page">孫ページ</span></span></span></span></p>';
          }
          ?>
        </div>
        <div class="p-container">
          <div class="news__container">
            <ul class="news__list">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <li class="news__item">
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
              <?php endwhile;
              endif; ?>
            </ul>
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
