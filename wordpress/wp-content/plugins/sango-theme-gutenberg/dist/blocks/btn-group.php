<?php

use SangoBlocks\App;

function sng_build_btn_group_css($id, $options) {
  $css = "#$id .wp-block-sgb-btn-group {";
  if (isset($options["orientation"]) && $options["orientation"] === "vertical") {
    $css .= "flex-direction: column;";
    if ($options["justifyContent"] === "left") {
      $css .= "align-items: flex-start;";
    } else if ($options["justifyContent"] === "center") {
      $css .= "align-items: center;";
    } else if ($options["justifyContent"] === "right") {
      $css .= "align-items: flex-end;";
    }
  } else {
    $css .= "flex-direction: row;";
    if ($options["justifyContent"] === "left") {
      $css .= "justify-content: flex-start;";
    } else if ($options["justifyContent"] === "center") {
      $css .= "justify-content: center;";
    } else if ($options["justifyContent"] === "right") {
      $css .= "justify-content: flex-end;";
    } else if ($options["justifyContent"] === "space-between") {
      $css .= "justify-content: space-between;";
    }
  }
  $css .= "}";
  return $css;
}

function sng_btn_group_render($block_content, $block)
{
  if ($block['blockName'] !== 'sgb/btn-group') {
    return $block_content;
  }
  $id = isset($block['attrs']['blockId']) ? $block['attrs']['blockId'] : '';
  $id = "btn-group-$id";
  if (!isset($block['attrs']['layout'])) {
    return $block_content;
  }

  $css = sng_build_btn_group_css($id, $block['attrs']['layout']);

  App::get('css')->register($id, $css);
  return "<div id=\"$id\">$block_content</div>";
}

add_filter( 'render_block', 'sng_btn_group_render', 10, 2 );
