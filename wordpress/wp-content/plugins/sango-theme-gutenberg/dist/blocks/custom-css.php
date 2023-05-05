<?php

use SangoBlocks\App;

function sng_space_css($block, $id) {
  $spaceBottom = isset($block['attrs']['spaceBottom']) ? $block['attrs']['spaceBottom'] : 0;
  $mobileSpaceBottom = isset($block['attrs']['mobileSpaceBottom']) ? $block['attrs']['mobileSpaceBottom'] : 0;
  $spaceBottomType = isset($block['attrs']['spaceBottomType']) ? $block['attrs']['spaceBottomType'] : 'em';
  $css = "";
  if ($spaceBottom !== 0) {
      $css .= <<< EOM
  #$id {
    margin-bottom: ${spaceBottom}${spaceBottomType};
  }
EOM;
  }
  if ($mobileSpaceBottom !== 0) {
      $css .= <<< EOM
  @media screen and (max-width: 768px) {
    #$id {
      margin-bottom: ${mobileSpaceBottom}${spaceBottomType};
    }
  }
EOM;
  }
  App::get('css')->register("margin-$id", $css);
}

function sng_camel_to_kebab($input) {
  $pattern = '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!';
  preg_match_all($pattern, $input, $matches);
  $ret = $matches[0];
  foreach ($ret as &$match) {
    $match = $match == strtoupper($match) ?
      	strtolower($match) :
    	lcfirst($match);
  }
  return implode('-', $ret);
}


function sng_custom_css( $block_content, $block ) {
  if (is_admin()) {
    return $block_content;
  }
  if (
    isset($block['attrs']['js']) ||
    isset($block['attrs']['scopedCSS']) ||
    isset($block['attrs']['spaceBottom']) ||
    isset($block['attrs']['mobileSpaceBottom']) ||
    (isset($block['attrs']['customControls'] ) && count($block['attrs']['customControls']) > 0)
  ) {
    $id = '';
    if (App::get('content-block')->is_lazy_mode()) {
      $id = wp_unique_id("sgb-css-lazy-id-");
    } else {
      $id = wp_unique_id("sgb-css-id-");
    }
    $style = "";
    if (isset($block['attrs']['customControls']) && count($block['attrs']['customControls']) > 0) {
      $controls = $block['attrs']['customControls'];
      $style = "style=\"";
      foreach ($controls as $control) {
        $name = isset($control['variableName'] ) ? sng_camel_to_kebab($control['variableName']) : '';
        $value = isset($control['value']) ? $control['value'] : '';
        $type = isset($control['variableType']) ? $control['variableType'] : 'string';
        $disabled = isset($control['disableCSS']) ? $control['disableCSS'] : false;
        $useQuotation = isset($control['useQuotation']) ? $control['useQuotation'] : false;

        if ($type !== 'boolean' && $type !== 'date' && $value && !$disabled) {
          if ($type === 'image') {
            $style .= "--sgb--custom--{$name}: url({$value});";
          } else if($type === 'string' && $useQuotation) {
            $style .= "--sgb--custom--{$name}: '{$value}';";
          } else {
            $style .= "--sgb--custom--{$name}: {$value};";
          }
        }
      }
      $style .= "\"";
    }
    if (isset($block['attrs']['dependencies']) && count($block['attrs']['dependencies']) > 0) {
      $dependencies = $block['attrs']['dependencies'];
      foreach ($dependencies as $dependency) {
        $src = isset($dependency['src']) ? $dependency['src'] : '';
        $srcId = "sng-" . preg_replace("/[^a-zA-Z0-9]+/", "", $src);
        if (!$src) {
          continue;
        }
        wp_enqueue_script($srcId, $src);
      }
    }
    if (isset($block['attrs']['scopedCSS'])) {
      $css = $block['attrs']['scopedCSS'];
      $selector = "#".$id;
      $css = preg_replace("/#id-[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}/", $selector, $css);
      // プリセットの不具合対応
      $css = preg_replace("/#undefined/", $selector, $css);
      App::get('css')->register($id, $css);
    }
    if (isset($block['attrs']['js'])) {
      $js = $block['attrs']['js'];
      $controls = isset($block['attrs']['customControls']) ? $block['attrs']['customControls'] : [];
      App::get('js')->register($id, $js, true, $controls);
    }
    if ((isset($block['attrs']['spaceBottom']) || isset($block['attrs']['mobileSpaceBottom']))) {
      sng_space_css($block, $id);
      // マージンを設定している場合はクラスを付与して返す
      return "<div id=\"$id\" class=\"sgb-space-bottom\" $style>$block_content</div>";
    }
    return "<div id=\"$id\" $style>$block_content</div>";
  }
  return $block_content;
}

add_filter( 'render_block', 'sng_custom_css', 10, 2 );

