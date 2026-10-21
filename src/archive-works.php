<?php get_header(); ?>
<main class="archive-works l-main">
  <div class="l-page">
    <div class="p-container--lg">
      <div class="l-page__header">
        <div class="l-page__title">
          <div class="en"><span>WORKS</span></div>
          <h1 class="ja">施工事例</h1>
        </div>
      </div>
      <div class="l-page__container">
        <div class="l-page__breadcrumb">
          <?php get_template_part('template-parts/breadcrumb'); ?>
        </div>
        <div class="p-container">
          <?php // 絞り込み（src/functions/custom_works_filter.php） ?>
          <div class="archive-works__filter">
            <?php foreach (works_taxonomies() as $taxonomy => $taxonomy_name) : ?>
              <?php
              $works_terms = get_terms(array('taxonomy' => $taxonomy, 'hide_empty' => false));
              if (!$works_terms || is_wp_error($works_terms)) {
                continue;
              }
              $selected_terms = works_filter_selected_terms($taxonomy);
              ?>
              <div class="archive-works__filter-group">
                <div class="archive-works__filter-title"><?php echo esc_html($taxonomy_name); ?></div>
                <ul class="archive-works__filter-terms">
                  <?php foreach ($works_terms as $works_term) : ?>
                    <li class="archive-works__filter-term<?php echo in_array($works_term->slug, $selected_terms, true) ? ' is-active' : ''; ?>">
                      <a href="<?php echo esc_url(works_filter_url($taxonomy, $works_term->slug)); ?>"><?php echo esc_html($works_term->name); ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endforeach; ?>
          </div>
          <?php if (have_posts()) : ?>
            <ul class="archive-works__list">
              <?php while (have_posts()) : the_post(); ?>
                <li class="archive-works__item">
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
                        <h2 class="p-article-card__title"><?php the_title(); ?></h2>
                      </div>
                    </a>
                  </article>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php else : ?>
            <div class="works-nopost">
              <p>該当する施工事例がありません</p>
            </div>
          <?php endif; ?>
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
