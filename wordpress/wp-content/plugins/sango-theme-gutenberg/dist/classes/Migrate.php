<?php

namespace SangoBlocks;

class Migrate {
  public function init() {
    $version_key = 'sng_gutenberg_version';
    $version = \get_option($version_key);
    $current_version = SGB_VER_NUM;
    if (!$version) {
      \update_option($version_key, $current_version);
    }
    if ($version !== $current_version) {
      \update_option($version_key, $current_version);
    }
    if (!$version || version_compare($version, '1.56.0', '<')) {
      $format = App::get('format');
      $color = App::get('color');
      $preset = App::get('preset');
      $format->createDb();
      $color->createDb();
      $preset->createDb();
      $format->migrate_table();
    }
    if (!$version || version_compare($version, '1.59.0', '<')) {
      $gallery = App::get('gallery');
      $gallery->createDb();
    }
    if (!$version || version_compare($version, '1.61.0', '<')) {
      $content_block = App::get('content-block');
      $content_block->createDb();
    }
  }
}
