<?php
/**
 * Clean up the_excerpt()
 */
function cutlass_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('查看', 'cutlass') . '</a>';
}
add_filter('excerpt_more', 'cutlass_excerpt_more');

/**
 * Manage output of wp_title()
 */
function cutlass_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'cutlass_wp_title', 10);

function cutlass_first_image() {
  global $post;
  $first_img = ''; 

  ob_start(); 

  ob_end_clean(); 

  $output = preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $post->post_content, $matches); 

  $first_img = $matches[1][0]; 

  if(empty($first_img)){  

    $first_img = bloginfo('template_url'). '/dist/img/default-thumb.jpg'; 

  } 

  return $first_img; 
}
