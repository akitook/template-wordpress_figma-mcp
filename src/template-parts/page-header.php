<?php

/**
 * Displays the page header
 *
 * @package WordPress
 * @subpackage
 * @since
 */

$entry_header_classes = '';

?>

<div class="page-header">
  <div class="container">
    <div class="page-header__container">
      <?php
      if (is_singular('post')) {
        echo 'お知らせ';
      } else {
        the_title('<h1 class="page-title">', '</h1>');
      }
      ?>
      <div class="en">
        <?php
        if (is_singular('post')) {
          echo 'news';
        } else {
          $slug = $post->post_name;
          echo $slug;
        }
        ?>
      </div>
    </div>
  </div>
</div>
