<?php

/**
 * カスタム投稿、カスタムタクソノミーの登録
 * 一覧は docs/project/sitemap.md の「カスタム投稿タイプ」「カスタムタクソノミー」
 *
 **/

/**
 * Worksの絞り込み用タクソノミー
 * 並び順が一覧ページのフィルターの表示順になる
 */
function works_taxonomies()
{
  return array(
    'works_plan' => 'プラン',
    'works_area' => 'エリア',
    'works_guests' => '人数',
    'works_season' => '季節',
    'works_venue' => '会場',
  );
}

// カスタム投稿用のラベルを生成
function custom_post_type_labels($name)
{
  return array(
    'name' => $name,
    'singular_name' => $name,
    'all_items' => $name . '一覧',
    'add_new' => $name . '追加',
    'add_new_item' => $name . 'の追加',
    'edit_item' => $name . 'の編集',
    'new_item' => $name . '追加',
    'view_item' => $name . 'を表示',
    'search_items' => $name . 'を検索',
    'not_found' => $name . 'が見つかりません',
    'not_found_in_trash' => 'ゴミ箱内に' . $name . 'が見つかりませんでした。',
    'parent_item_colon' => ''
  );
}

// (カテゴリーのような) 階層化できるタクソノミー用のラベルを生成
function custom_taxonomy_labels($name)
{
  return array(
    'name' => $name,
    'singular_name' => $name,
    'search_items' => $name . 'を検索',
    'all_items' => 'すべての' . $name,
    'parent_item' => '親' . $name,
    'parent_item_colon' => '親' . $name . '：',
    'edit_item' => '編集',
    'update_item' => '更新',
    'add_new_item' => '新規' . $name . 'を追加',
    'new_item_name' => '名前',
  );
}

// News
add_action('init', 'my_news_init');
function my_news_init()
{
  // /news/newscat/{term-slug}/ が News詳細（/news/{post-slug}/）のルールに先に一致しないよう、タクソノミーを先に登録する
  register_taxonomy('newscat', array('news'), array(
    'hierarchical' => true,
    'labels' => custom_taxonomy_labels('カテゴリー'),
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'news/newscat', 'with_front' => false),
  ));

  register_post_type('news', array(
    'labels' => custom_post_type_labels('News'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 4,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
    'rewrite' => array('slug' => 'news', 'with_front' => false)
  ));
}

// Works
add_action('init', 'my_works_init');
function my_works_init()
{
  register_post_type('works', array(
    'labels' => custom_post_type_labels('Works'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
    'rewrite' => array('slug' => 'works', 'with_front' => false)
  ));

  // タームアーカイブのURLは作らず、/works/?works_area=tokyo,osaka のようにクエリパラメータで絞り込む
  foreach (works_taxonomies() as $taxonomy => $name) {
    register_taxonomy($taxonomy, array('works'), array(
      'hierarchical' => true,
      'labels' => custom_taxonomy_labels($name),
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'show_in_rest' => true,
      'rewrite' => false,
    ));
  }
}

/**
 * カスタムタクソノミーのデフォルト設定
 *
 **/

// [設定]→[投稿設定]から全てのカスタム投稿のデフォルトタームを設定可能とする。
add_action('load-options-writing.php', 'add_default_term_setting_item');
function add_default_term_setting_item()
{
  $post_types = get_post_types(array('public' => true, 'show_ui' => true), false);
  if ($post_types) {
    foreach ($post_types as $post_type_slug => $post_type) {
      $post_type_taxonomies = get_object_taxonomies($post_type_slug, false);
      if ($post_type_taxonomies) {
        foreach ($post_type_taxonomies as $tax_slug => $taxonomy) {
          if (!($post_type_slug == 'post' && $tax_slug == 'category') && $taxonomy->show_ui) {
            add_settings_field($post_type_slug . '_default_' . $tax_slug, $post_type->label . '用' . $taxonomy->label . 'の初期設定', 'default_term_setting_field', 'writing', 'default', array('post_type' => $post_type_slug, 'taxonomy' => $taxonomy));
          }
        }
      }
    }
  }
}

// add_settings_fieldから呼び出されるコールバック関数
function default_term_setting_field($args)
{
  $option_name = $args['post_type'] . '_default_' . $args['taxonomy']->name;
  $default_term = get_option($option_name);
  $terms = get_terms($args['taxonomy']->name, 'hide_empty=0');
  if ($terms) :
?>
    <select name="<?php echo $option_name; ?>">
      <option value="0">設定しない</option>
      <?php foreach ($terms as $term) : ?>
        <option value="<?php echo esc_attr($term->term_id); ?>" <?php echo $term->term_id == $default_term ? ' selected="selected"' : ''; ?>><?php echo esc_html($term->name); ?></option>
      <?php endforeach; ?>
    </select>
  <?php
  else :
  ?>
    <p><?php echo esc_html($args['taxonomy']->label); ?>が登録されていません。</p>
<?php
  endif;
}


// Wordpressがオプションを更新すると呼び出され、デフォルトタームが設定される。
add_filter('allowed_options', 'allow_default_term_setting');
function allow_default_term_setting($allowed_options)
{
  $post_types = get_post_types(array('public' => true, 'show_ui' => true), false);
  if ($post_types) {
    foreach ($post_types as $post_type_slug => $post_type) {
      $post_type_taxonomies = get_object_taxonomies($post_type_slug, false);
      if ($post_type_taxonomies) {
        foreach ($post_type_taxonomies as $tax_slug => $taxonomy) {
          if (!($post_type_slug == 'post' && $tax_slug == 'category') && $taxonomy->show_ui) {
            $allowed_options['writing'][] = $post_type_slug . '_default_' . $tax_slug;
          }
        }
      }
    }
  }
  return $allowed_options;
}

// カスタム投稿を登録した際、ターム(カテゴリ)が選択されていない場合、デフォルトタームが自動で設定される。
add_action('wp_insert_post', 'add_post_type_default_term', 10, 2);
function add_post_type_default_term($post_id, $post)
{
  if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || $post->post_status == 'auto-draft') {
    return;
  }

  $taxonomies = get_object_taxonomies($post, false);
  if ($taxonomies) {
    foreach ($taxonomies as $tax_slug => $taxonomy) {
      $default = get_option($post->post_type . '_default_' . $tax_slug);
      if (!($post->post_type == 'post' && $tax_slug == 'category') && $taxonomy->show_ui && $default && !($terms = get_the_terms($post_id, $tax_slug))) {
        if ($taxonomy->hierarchical) {
          $term = get_term($default, $tax_slug);
          if ($term) {
            wp_set_post_terms($post_id, array_filter(array($default)), $tax_slug);
          }
        } else {
          $term = get_term($default, $tax_slug);
          if ($term) {
            wp_set_post_terms($post_id, $term->name, $tax_slug);
          }
        }
      }
    }
  }
}
