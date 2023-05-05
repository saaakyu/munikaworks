<?php

use SangoBlocks\App;

function sng_list_css( $block_content, $block ) {
  if (isset($block['attrs']['listId']) && isset($block['attrs']['iconColor'])) {
    $id = $block['attrs']['listId'];
    $iconColor = $block['attrs']['iconColor'];
    $listId = "li-${id}";
    $css = <<<EOM
    #$listId li:before {
      color: ${iconColor};
    }
    #$listId .ol-circle li:before {
      color: #FFF;
      background-color: ${iconColor};
    }
EOM;
    App::get('css')->register($listId, $css);
    return "<div id=\"${listId}\">$block_content</div>";
  }
  return $block_content;
}

add_filter( 'render_block', 'sng_list_css', 10, 2 );
