<?php

namespace SangoBlocks;

class CustomCSS {
  private $styles = array();

  public function init() {}

  public function register($id, $css) {
    foreach ($this->styles as $style) {
      if ($style['id'] === $id) {
        return;
      }
    }
    $this->styles[] = array(
      'id' => $id,
      'style' => $css
    );
  }

  public function get_style() {
    $raw = '';
    foreach ($this->styles as $style) {
      $raw .= $style['style'];
    }
    return $this->minify_css($raw);
  }

  public function minify_css($raw) {
    if (function_exists('sng_minify_css')) {
      return sng_minify_css($raw);
    }
    return $raw;
  }
}
