<?php get_header(); ?>

<main id="front" class="page-front l-main">
  <section class="mainview">
    <div class="mainview__container p-container">
      <div class="mainview-title">
        <h2 class="mainview-title__ja">メインコピー</h2>
        <div class="mainview-title__en">main copy</div>
      </div>
    </div>
  </section>
  <section class="about">
    <div class="about__container p-container">
      <div class="p-section-title">
        <div class="p-section-title__en">ABOUT</div>
        <h2 class="p-section-title__ja">このサイトについて</h2>
        <div class="about__description">
          <p>親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）</p>
          <p>親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）</p>
        </div>
      </div>
    </div>
  </section>
  <section class="news">
    <div class="news__container p-container">
      <div class="p-section-title">
        <div class="p-section-title__en">NEWS</div>
        <h2 class="p-section-title__ja">お知らせ</h2>
      </div>
      <ul class="news__list">
        <?php
        $articlelist = get_posts(array(
          'posts_per_page' => 3 //取得記事件数
        ));
        foreach ($articlelist as $post) :
          setup_postdata($post);
        ?>
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
        <?php
        endforeach;
        wp_reset_postdata();
        ?>
      </ul>
      <div class="news__action c-button-wrapper">
        <a class="c-button" href="<?php echo home_url('/news/'); ?>">もっと見る</a>
      </div>
    </div>
  </section>
  <section class="column">
    <div class="column__container p-container">
      <div class="p-section-title">
        <div class="p-section-title__en">COLUMN</div>
        <h2 class="p-section-title__ja">コラム</h2>
      </div>
      <ul class="column__list">
        <?php
        $articlelist = get_posts(array(
          'post_type' => 'column',
          'posts_per_page' => 3 //取得記事件数
        ));
        foreach ($articlelist as $post) :
          setup_postdata($post);
        ?>
          <li class="column__item">
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
        <?php
        endforeach;
        wp_reset_postdata();
        ?>
      </ul>
      <div class="column__action">
        <a class="c-button c-button--rounded c-button--outline c-button--gray" href="<?php echo home_url('/column/'); ?>">もっと見る</a>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
