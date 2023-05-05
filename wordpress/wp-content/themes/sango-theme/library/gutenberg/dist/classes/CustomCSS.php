<?php

namespace SangoBlocks;

class CustomCSS {
  private $styles = array();
  private $enabled = true;

  public function set_enabled($enabled) {
    $this->enabled = $enabled;
  }

  public function is_enabled() {
    return $this->enabled;
  }

  public function init() {
    if (!get_option('sng_disable_footer_custom_css', false)) {
      add_action('wp_footer', [$this, 'add_custom_css_to_footer']);
    }
    add_action( 'wp_enqueue_scripts', [$this, 'add_custom_inline_css'] );
  }

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

  public function get_custom_css_style() {
    $style = $this->get_style();
    if (!$style) {
        return;
    }
    return '<style>'.  $style . '</style>';
  }

  public function add_custom_css_to_footer() {
    $style = $this->get_custom_css_style();
    echo $style;
  }

  public function add_custom_inline_css() {
    $css = get_transient('sgb-shared-css');
    wp_add_inline_style( 'sango_theme_gutenberg-style',
      App::get('format')->get_custom_format_css() .
      App::get('color')->get_editor_front_global_vars() .
      $css
    );
  }
}
