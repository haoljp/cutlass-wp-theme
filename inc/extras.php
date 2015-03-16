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

function cutlass_post_thumb() {
  global $post;
  
  if ( has_post_thumbnail() ) {   
      echo the_post_thumbnail('cutlass-thumb');
    } else {
      $content = $post->post_content;  
      preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $matches, PREG_PATTERN_ORDER);  
      $n = count($matches[1]);  
      if($n > 0){
        return '<img src="'.$matches[1][0].'" alt="'.trim(strip_tags( $post->post_title )).'" />';  
      }else {
        return '<img src="'.get_bloginfo('template_url').'/dist/img/default-thumb.jpg" alt="'.trim(strip_tags( $post->post_title )).'" />';  
      }  
    }
}
