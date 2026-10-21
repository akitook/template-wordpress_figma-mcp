<?php

/**
 * 次の記事および前の記事へのリンクにクラス付与
 *
 **/

function add_prev_post_link_class($output)
{
  return str_replace('<a href=', '<a class="prev-link" href=', $output);
}
add_filter('previous_post_link', 'add_prev_post_link_class');
function add_next_post_link_class($output)
{
  return str_replace('<a href=', '<a class="next-link" href=', $output);
}
add_filter('next_post_link', 'add_next_post_link_class');
