<?php

use SANGO\App;

function sng_conditional_render( $block_content, $block ) {
  if ( isset($block['blockName']) && $block['blockName'] === 'sgb/conditional') {
    $device = isset($block['attrs']['device']) ? $block['attrs']['device'] : 'all';
    $categories = isset($block['attrs']['categories']) ? $block['attrs']['categories'] : [];
    $tags = isset($block['attrs']['tags']) ? $block['attrs']['tags'] : [];
    $login = isset($block['attrs']['login']) ? $block['attrs']['login'] : '';
    $show_on_page = isset($block['attrs']['showOnPage']) ? $block['attrs']['showOnPage'] : true;
    $show_on_post = isset($block['attrs']['showOnPost']) ? $block['attrs']['showOnPost'] : true;
    $show_on_top = isset($block['attrs']['showOnTop']) ? $block['attrs']['showOnTop'] : true;
    $show_on_category_top = isset($block['attrs']['showOnCategoryTop']) ? $block['attrs']['showOnCategoryTop'] : true;
    $post_type = get_post_type();
    $status = App::get('status')->get_status();
    $is_top = $status['is_top'] && !$status['is_paged'];
    $is_category_top = $status['is_category_top'];
    if (!$show_on_category_top) {
      if ($is_category_top) {
        return '';
      }
    }
    if (!$show_on_top) {
      if ($is_top) {
        return '';
      }
    }
    if (!$show_on_post) {
      if ($post_type === "post" && !$is_top && !$is_category_top) {
        return '';
      }
    }
    if (!$show_on_page) {
      if ($post_type === "page" && !$is_top && !$is_category_top) {
        return '';
      }
    }
    if ($device === 'mobile' && !wp_is_mobile()) {
      return '';
    }
    if ($device === 'pc' && wp_is_mobile()) {
      return '';
    }
    if (count($categories) > 0) {
      if (!in_category($categories)) {
        return '';
      }
    }
    if ($login === 'login' && !is_user_logged_in()) {
      return '';
    }
    if ($login === 'logout' && is_user_logged_in()) {
      return '';
    }
    if (count($tags) > 0) {
      if (!has_tag($tags)) {
        return '';
      }
    }
  }
  return $block_content;
}

add_filter( 'render_block', 'sng_conditional_render', 10, 2 );
