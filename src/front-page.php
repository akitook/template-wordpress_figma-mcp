<?php
/**
 * トップページ（Figma: TOP_PC / TOP_SP / TAB）
 */

$links = site_links();

// お知らせ（ヒーロー下の1件と、Newsセクションの3件）
$news_query = new WP_Query(array(
  'post_type' => 'news',
  'posts_per_page' => 3,
  'no_found_rows' => true,
));
$latest_news = $news_query->posts ? $news_query->posts[0] : null;

// 施工事例（8件）
$works_query = new WP_Query(array(
  'post_type' => 'works',
  'posts_per_page' => 8,
  'no_found_rows' => true,
));

$plans = array(
  array('slug' => 'muni', 'name' => 'むに', 'title_width' => 166, 'title_height' => 229),
  array('slug' => 'awai', 'name' => '間 あわい', 'title_width' => 110, 'title_height' => 325),
  array('slug' => 'utsushiki', 'name' => 'うつしき', 'title_width' => 98, 'title_height' => 292),
);
?>

<?php get_header(); ?>
<main class="front l-main">

  <?php // ヒーロー ?>
  <section class="front-hero">
    <div class="front-hero__visual">
      <img class="front-hero__photo" src="<?php echo theme_image_url('front/hero.jpg'); ?>" alt="" width="1000" height="1330">
    </div>
    <img class="front-hero__decoration" src="<?php echo theme_image_url('common/decoration-line.svg'); ?>" alt="" width="464" height="612">
    <?php if ($latest_news) : ?>
      <a class="front-hero__news" href="<?php echo esc_url(get_permalink($latest_news)); ?>">
        <span class="front-hero__news-meta">
          <time class="front-hero__news-date" datetime="<?php echo esc_attr(get_the_date('Y-m-d', $latest_news)); ?>"><?php echo esc_html(get_the_date('Y.n.j', $latest_news)); ?></time>
          <?php if (news_category_name($latest_news->ID)) : ?>
            <span class="front-hero__news-category u-hide-up-lg"><?php echo esc_html(news_category_name($latest_news->ID)); ?></span>
          <?php endif; ?>
        </span>
        <span class="front-hero__news-title"><?php echo esc_html(get_the_title($latest_news)); ?></span>
      </a>
    <?php endif; ?>
  </section>

  <?php // Our Philosophy ?>
  <section class="front-philosophy" aria-labelledby="front-philosophy-title">
    <h2 id="front-philosophy-title" class="front-philosophy__heading c-section-heading">Our Philosophy</h2>
    <img class="front-philosophy__photo" src="<?php echo theme_image_url('front/philosophy.jpg'); ?>" alt="" width="864" height="564" loading="lazy">
    <div class="front-philosophy__content">
      <p class="front-philosophy__lead">誰かの正解より、<br>ふたりの答えを。</p>
      <div class="front-philosophy__text">
        <p>結婚式は、人生を豊かにする贈り物。</p>
        <p>これまでの歩みをり振り返り、<br>大切な人への想いを見つめ、<br>これからのふたりを思い描く。</p>
        <p>人生の宝物を、一日のかたちに。</p>
        <p>人と人、記憶と想い、<br>ふたりと未来を、やさしく結ぶ。</p>
        <p>Knotはその、ゆるぎない結び目。</p>
      </div>
    </div>
    <a class="front-philosophy__link c-arrow-link" href="<?php echo esc_url($links['about']); ?>">
      <img class="c-arrow-link__icon" src="<?php echo theme_image_url('common/icon-triangle.svg'); ?>" alt="" width="6" height="5">
      <span class="c-arrow-link__text">Knotについて</span>
    </a>
    <img class="front-philosophy__decoration" src="<?php echo theme_image_url('common/decoration-line-short.svg'); ?>" alt="" width="160" height="213">
    <img class="front-philosophy__detail" src="<?php echo theme_image_url('front/philosophy-detail.jpg'); ?>" alt="" width="240" height="320" loading="lazy">
  </section>

  <?php // Talk About Yours.（プラン） ?>
  <section class="front-plan" aria-labelledby="front-plan-title">
    <h2 id="front-plan-title" class="front-plan__heading c-section-heading">Talk About Yours.</h2>
    <p class="front-plan__lead">結婚式を決める前に、<br>まずはふたりのことを。</p>
    <ul class="front-plan__list">
      <?php foreach ($plans as $plan) : ?>
        <li class="front-plan__item">
          <a class="front-plan__card" href="<?php echo esc_url($links[$plan['slug']]); ?>">
            <img class="front-plan__photo" src="<?php echo theme_image_url('front/plan-' . $plan['slug'] . '.jpg'); ?>" alt="" width="520" height="693" loading="lazy">
            <img class="front-plan__title front-plan__title--<?php echo esc_attr($plan['slug']); ?>" src="<?php echo theme_image_url('front/plan-' . $plan['slug'] . '-title.svg'); ?>" alt="<?php echo esc_attr($plan['name']); ?>" width="<?php echo esc_attr($plan['title_width']); ?>" height="<?php echo esc_attr($plan['title_height']); ?>">
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="front-plan__text">
      <p>Knotは、決まった会場や形式から<br>結婚式を考えるのではなく、<br>おふたりが大切にしたいこと、<br>叶えたい時間から、<br>一緒に結婚式のかたちを考えていきます。</p>
      <p>会場も、クリエイターも、過ごし方も。<br>必要なものを自由に選びながら、<br>ふたりにしかつくれない一日を。</p>
    </div>
    <a class="front-plan__link c-arrow-link" href="<?php echo esc_url($links['plan']); ?>">
      <img class="c-arrow-link__icon" src="<?php echo theme_image_url('common/icon-triangle.svg'); ?>" alt="" width="6" height="5">
      <span class="c-arrow-link__text">3つのウェディングプランを見る</span>
    </a>
    <img class="front-plan__decoration" src="<?php echo theme_image_url('common/decoration-line.svg'); ?>" alt="" width="464" height="612">
  </section>

  <?php // Works ?>
  <section class="front-works" aria-labelledby="front-works-title">
    <h2 id="front-works-title" class="front-works__heading c-section-heading">Works</h2>
    <?php if ($works_query->have_posts()) : ?>
      <div class="front-works__container">
        <ul class="front-works__list">
          <?php $works_number = 0; ?>
          <?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
            <?php $works_number++; ?>
            <li class="front-works__item">
              <a class="front-works__card" href="<?php the_permalink(); ?>">
                <span class="front-works__thumbnail">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium_large', array('alt' => '', 'loading' => 'lazy')); ?>
                  <?php else : ?>
                    <img src="<?php echo theme_image_url('common/noimage.jpg'); ?>" alt="" loading="lazy">
                  <?php endif; ?>
                </span>
                <span class="front-works__caption">
                  <span class="front-works__number"><?php echo esc_html(sprintf('%02d', $works_number)); ?></span>
                  <span class="front-works__title u-hide-up-lg"><?php the_title(); ?></span>
                </span>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
        <?php // lg以上: 右側のタイトル一覧 ?>
        <ol class="front-works__index u-hide-down-lg">
          <?php $works_number = 0; ?>
          <?php foreach ($works_query->posts as $works_post) : ?>
            <?php $works_number++; ?>
            <li class="front-works__index-item">
              <span class="front-works__number"><?php echo esc_html(sprintf('%02d', $works_number)); ?></span>
              <a href="<?php echo esc_url(get_permalink($works_post)); ?>"><?php echo esc_html(get_the_title($works_post)); ?></a>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>
    <?php endif; ?>
    <a class="front-works__link c-arrow-link" href="<?php echo esc_url($links['works']); ?>">
      <img class="c-arrow-link__icon" src="<?php echo theme_image_url('common/icon-triangle.svg'); ?>" alt="" width="6" height="5">
      <span class="c-arrow-link__text">この他の事例を見る</span>
    </a>
  </section>

  <?php // News ?>
  <section class="front-news" aria-labelledby="front-news-title">
    <h2 id="front-news-title" class="front-news__heading c-section-heading">News</h2>
    <?php if ($news_query->have_posts()) : ?>
      <ul class="front-news__list">
        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
          <li class="front-news__item">
            <article class="p-news-card">
              <a class="p-news-card__link" href="<?php the_permalink(); ?>">
                <div class="p-news-card__thumbnail">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium_large', array('alt' => '', 'loading' => 'lazy')); ?>
                  <?php else : ?>
                    <img src="<?php echo theme_image_url('common/noimage.jpg'); ?>" alt="" loading="lazy">
                  <?php endif; ?>
                </div>
                <div class="p-news-card__body">
                  <div class="p-news-card__meta">
                    <time class="p-news-card__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.n.j')); ?></time>
                    <?php if (news_category_name(get_the_ID())) : ?>
                      <span class="p-news-card__category"><?php echo esc_html(news_category_name(get_the_ID())); ?></span>
                    <?php endif; ?>
                  </div>
                  <h3 class="p-news-card__title"><?php the_title(); ?></h3>
                </div>
              </a>
            </article>
          </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
    <?php endif; ?>
    <a class="front-news__link c-arrow-link" href="<?php echo esc_url($links['news']); ?>">
      <img class="c-arrow-link__icon" src="<?php echo theme_image_url('common/icon-triangle.svg'); ?>" alt="" width="6" height="5">
      <span class="c-arrow-link__text">この他のお知らせを見る</span>
    </a>
    <img class="front-news__decoration" src="<?php echo theme_image_url('common/decoration-line-works.svg'); ?>" alt="" width="464" height="612">
  </section>

</main>
<?php get_footer(); ?>
