<?php
/**
 * Plugin Name:     SANGO Gutenberg
 * Plugin URI:      https://saruwakakun.com/sango/gutenberg
 * Description:     SANGOでGutenbergエディターを快適に使用するためのプラグイン
 * Author:          CatNose
 * Author URI:      https://saruwakakun.com/sango
 * Text Domain:     sango-theme-gutenberg
 * Domain Path:     /languages
 * Version:         1.69.14
 *
 * @package SGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 3.0以上の場合は機能させない
$theme_ver = wp_get_theme('sango-theme')->Version;
if (version_compare($theme_ver, '3.0.0', '>=')) {
  return;
}

define( "SGB_VER_NUM", "1.69.14" );

require_once dirname( __FILE__ ) . '/vendor/autoload.php';
require_once dirname( __FILE__ ) . '/dist/color.php';
require_once dirname( __FILE__ ) . '/dist/init.php';

// Auto update
require_once dirname( __FILE__ ) . '/plugin-update-checker/plugin-update-checker.php';
$SangoGutenbergUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://sango-gutenberg.netlify.com/update-info.json',
    __FILE__,
    'sango-theme-gutenberg'
);
