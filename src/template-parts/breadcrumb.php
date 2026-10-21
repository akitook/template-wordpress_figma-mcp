<?php

/**
 * Displays the breadcrumb by yoast plugin
 *
 * @package WordPress
 * @subpackage
 * @since
 */

?>
<?php
if (function_exists('yoast_breadcrumb')) {
  yoast_breadcrumb('<p class="p-breadcrumb">', '</p>');
} else {
  echo '<p class="p-breadcrumb"><span><span><a href="/">ホーム</a> » <span><a href="/">子ページ</a> » <span class="breadcrumb_last" aria-current="page">孫ページ</span></span></span></span></p>';
}
?>
