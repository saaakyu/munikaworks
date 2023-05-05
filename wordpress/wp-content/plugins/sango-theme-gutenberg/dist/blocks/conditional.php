<?php

function sng_conditional_render( $block_content, $block ) {
  if ( isset($block['blockName']) && $block['blockName'] === 'sgb/conditional') {
    $device = isset($block['attrs']['device']) ? $block['attrs']['device'] : 'all';
    $categories = isset($block['attrs']['categories']) ? $block['attrs']['categories'] : [];
    $tags = isset($block['attrs']['tags']) ? $block['attrs']['tags'] : [];
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
    if (count($tags) > 0) {
      if (!has_tag($tags)) {
        return '';
      }
    }
  }
  return $block_content;
}

add_filter( 'render_block', 'sng_conditional_render', 10, 2 );
