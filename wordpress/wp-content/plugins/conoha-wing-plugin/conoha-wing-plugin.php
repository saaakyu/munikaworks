<?php

/*
Plugin Name: ConoHa WING コントロールパネルプラグイン
Description:WordPressの管理画面上で、ConoHa WINGサーバーのWebに関する設定が行えるプラグインです。
Version: 1.2
Author: GMO Internet Group, Inc.
Author URI: https://www.conoha.jp
*/

// constants
define( 'CWP_PLUGIN_BASENAME', basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ ) );
define( 'CWP_PLUGIN_PATH', dirname( __FILE__ ) );
define( 'CWP_PLUGIN_URL', plugins_url( '', CWP_PLUGIN_BASENAME ) );

define( 'CWP_PAGE_TITLE', 'ConoHa WING' );
define( 'CWP_MENU_TITLE', 'ConoHa WING' );
define( 'CWP_SUB_MENU_TITLE', '設定' );
define( 'CWP_MENU_SLUG', 'cwp_plugin' );
define( 'CWP_CONTROL_PANEL_URL_TITLE', 'コントロールパネル' );

define( 'CWP_RANDOM_STR_LENGTH', 50 );
define( 'CWP_TOKEN_FORMAT', 'Y/m/d H:m:s' );
define( 'CWP_TOKEN_LIMIT', '+ 1 hour' );
define( 'CWP_TOKEN_TIMEZONE', 'UTC' );
define( 'CWP_TOKEN_DELIMITER', '|' );
define( 'CWP_ENCRYPTION_BLOCK_SIZE', 16 );
define( 'CWP_OPENSSL_CIPHER_METHOD', 'AES-256-CBC' );

define( 'CWP_IFRAME_URL', 'https://manage.conoha.jp/Wing/WPPlugin' );
define( 'CWP_CONTROL_PANEL_URL', 'https://www.conoha.jp/conoha/login/' );

define( 'CWP_WEXAL_MENU_SLUG', 'cwp_plugin_wexal' );
define( 'CWP_SUB_MENU_TITLE_WEXAL', 'WEXAL設定' );
define( 'CWP_WEXAL_IFRAME_URL', 'https://manage.conoha.jp/Wing/WPPlugin/WexalSettings' );

$plugin_data = get_file_data( CWP_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'conoha-wing-plugin.php', array( 'Version' => 'Version' ) );
define('CWP_PLUGIN_VERSION', $plugin_data['Version']);

// import
$controller_dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'controller';
$model_dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'model';
$util_dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'util';

// controller
require_once $controller_dir . DIRECTORY_SEPARATOR . 'class-cwp-main-controller.php';

// model
require_once $model_dir . DIRECTORY_SEPARATOR . 'class-cwp-control-panel.php';

// util
require_once $util_dir . DIRECTORY_SEPARATOR . 'encryption.php';

// =========================================================================
// initialization
// =========================================================================
$main_controller = new Cwp_Plugin_Main_Controller();
