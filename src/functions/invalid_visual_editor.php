<?php

/**
 * すべての投稿で無効にする
 */
// add_filter( 'user_can_richedit', '__return_false' );


/**
 * MWWPFORMのみ無効
 */

function my_off_ve_in_page()
{
    global $typenow;
    if (in_array($typenow, array('page', 'mw-wp-form'))) {
        add_filter('user_can_richedit', 'my_off_ve_filter');
    }
}
function my_off_ve_filter()
{
    return false;
}
add_action('load-post.php', 'my_off_ve_in_page');
add_action('load-post-new.php', 'my_off_ve_in_page');
