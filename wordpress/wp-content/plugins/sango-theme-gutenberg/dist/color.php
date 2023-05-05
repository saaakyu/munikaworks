<?php

use SangoBlocks\App;
/**
 * Include SANGO custom colors to color palette.
 */
function sango_theme_gutenberg_theme_setup() {
  $custom_colors = array(
    array(
      'name' => 'メインカラー',
      'slug' => sanitize_title('sango_main'),
      'color' => get_theme_mod('main_color', '#6bb6ff')
    ),
    array(
      'name' => 'パステルカラー',
      'slug' => sanitize_title('sango_pastel'),
      'color' => get_theme_mod('pastel_color', '#c8e4ff')
    ),
    array(
      'name' => 'アクセントカラー',
      'slug' => sanitize_title('sango_accent'),
      'color' => get_theme_mod('accent_color', '#ffb36b')
    ),
    array(
      'name'  => '黒',
      'slug' => sanitize_title('sango_black'),
      'color' => '#333',
    ),
    array(
      'name'  => 'グレイ',
      'slug' => sanitize_title('sango_gray'),
      'color' => 'gray',
    ),
    array(
      'name'  => 'シルバー',
      'slug' => sanitize_title('sango_silver'),
      'color' => 'whitesmoke',
    ),
  );
  add_theme_support( 'editor-color-palette', $custom_colors );
}
add_action( 'after_setup_theme', 'sango_theme_gutenberg_theme_setup' );

/**
 * Add SANGO custom color class to Gutenberg editor.
 */

// もともとSANGO本体で出力されているCSSをGutenbergエディターでも出力
function sango_theme_parent_colors() {
  $link_c = get_theme_mod('link_color', '#4f96f6');
  $main_c = get_theme_mod('main_color', '#6bb6ff');
  $pastel_c = get_theme_mod('pastel_color', '#c8e4ff');
  $accent_c = get_theme_mod('accent_color', '#ffb36b');

  $css  = '';
  $css .= '.editor-styles-wrapper a { color: ' . esc_attr( $link_c ) . '; }';
  $css .= '.editor-styles-wrapper h3 { border-left-color: ' . esc_attr( $main_c ) . '; }';
  $css .= '.editor-styles-wrapper .wp-block-quote:not(.is-large):not(.is-style-large):before { color: ' . esc_attr( $main_c ) . '; }';
  $css .= '.main-c, .has-sango-main-color { color: ' . esc_attr( $main_c ) . '; }';
  $css .= '.main-bc, .has-sango-main-background-color { background-color: ' . esc_attr( $main_c ) . '; }';
  $css .= '.main-bdr { border-color: ' . esc_attr( $main_c ) . '; }';
  $css .= '.main-c-before li:before, .main-c-before li:before, .main-c-b:before { color: ' . esc_attr( $main_c ) . '; }';
  $css .= '.main-bc-before li:before { background-color: ' . esc_attr( $main_c ) . '; }';
  $css .= '.accent-c, .has-sango-accent-color { color: ' . esc_attr( $accent_c ) . '; }';
  $css .= '.accent-bc, .has-sango-accent-background-color { background-color: ' . esc_attr( $accent_c ) . '; }';
  $css .= '.pastel-c, .has-sango-pastel-color { color: ' . esc_attr( $pastel_c ) . '; }';
  $css .= '.pastel-bc, .has-sango-pastel-background-color { background-color: ' . esc_attr( $pastel_c ) . '; }';
  $css .= '.li-mainbdr ul, .li-mainbdr ol { border-color: ' . esc_attr( $main_c ) . '; }';
  $css .= '.li-accentbdr ul, .li-accentbdr ol { border-color: ' . esc_attr( $accent_c ) . '; }';
  $css .= '.li-pastelbc ul, .li-pastelbc ol { background-color: ' . esc_attr( $pastel_c ) . '; }';
  $css .= '.acc-bc-before li:before { border-color: ' . esc_attr( $accent_c ) . '; }';
	return wp_strip_all_tags( $css );
}

// 本プラグインのカスタムCSS（フロント+バックエンドで出力）
function sgb_custom_colors() {
  $main_c = get_theme_mod('main_color', '#6bb6ff');
  $accent_c = get_theme_mod('accent_color', '#ffb36b');
  $css = '';
  $css .= '.is-style-sango-list-main-color li:before { background-color: ' . esc_attr( $main_c ) . '; }';
	$css .= '.is-style-sango-list-accent-color li:before { background-color: ' . esc_attr( $accent_c ) . '; }';
	$css .= '.sgb-label-main-c { background-color: ' . esc_attr( $main_c ) . '; }';
	$css .= '.sgb-label-accent-c { background-color: ' . esc_attr( $accent_c ) . '; }';
  return wp_strip_all_tags( $css );
}

// ユーザー定義のカスタムCSS（フロント+バックエンドで出力）
function sgb_custom_format() {
  $format = App::get('format');
  $items = @$format->get();
  $css = '';
  foreach ($items as $item) {
    $css .= $item['format_css'];
  }
  return wp_strip_all_tags($css);
}
