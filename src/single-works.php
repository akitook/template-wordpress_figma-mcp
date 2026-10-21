<?php get_header(); ?>
<main class="single single-works l-main">
  <div class="l-page">
    <div class="p-container--lg">
      <div class="l-page__header">
        <div class="l-page__title">
          <div class="en"><span>WORKS</span></div>
          <div class="ja">施工事例</div>
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
                <h1 class="title"><?php the_title(); ?></h1>
                <ul class="single-works__terms">
                  <?php foreach (array_keys(works_taxonomies()) as $taxonomy) : ?>
                    <?php
                    $works_terms = get_the_terms(get_the_ID(), $taxonomy);
                    if (!$works_terms || is_wp_error($works_terms)) {
                      continue;
                    }
                    ?>
                    <?php foreach ($works_terms as $works_term) : ?>
                      <li><a href="<?php echo esc_url(works_filter_url($taxonomy, $works_term->slug)); ?>"><?php echo esc_html($works_term->name); ?></a></li>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
                </ul>
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
