<?php
/**
 * Initialize Plugin
 *
 * Enqueue CSS/JS for Gutenberg on SANGO default styles and  all the blocks.
 *
 * @since   1.0.0
 * @package SGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use SangoBlocks\App;

/**
 * Enqueue Gutenberg block assets for both frontend + Gutenberg.
 *
 * @since 1.0.0
 */

function sango_theme_gutenberg_common_assets() { // phpcs:ignore
	// Styles.
	wp_enqueue_style(
		'sango_theme_gutenberg-style',
		App::getUrl( 'build/style-blocks.css')
	);

  if (is_admin()) {
    wp_enqueue_style('sango_theme_icon_style',
      App::getUrl('icon.build.css')
    );
  }
}

add_filter('clean_url', 'sng_hook_strip_ampersand', 99, 3);
function sng_hook_strip_ampersand($url, $original_url, $_context) {
    if (strstr($url, "sango-theme-gutenberg") !== false) {
        $url = str_replace("&#038;", "&", $url);
    }
    return $url;
}

/*******************************
 * bodyに付与するクラスを追加
*******************************/
if (!function_exists('sng_admin_original_body_class')) {
  function sng_admin_original_body_class($classes) {
    // FontAwesome5を使用している場合"fa5"を付与
    $classes .= get_option('use_fontawesome4') ? ' fa4 ' : ' fa5 ';
    return $classes;
  }
}
add_filter('admin_body_class', 'sng_admin_original_body_class');

// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'sango_theme_gutenberg_common_assets' );

/**
 * Enqueue Gutenberg block assets for Gutenberg editor.
 *
 * @since 1.0.0
 */

function sng_original_admin_body_class($classes) {
	// FontAwesome5を使用している場合"fa5"を付与
	$classes .= get_option('use_fontawesome4') ? 'fa4' : 'fa5';
	return $classes;
}

function sango_theme_gutenberg_editor_external_assets() {
  add_theme_support('editor-styles');
}

function sango_theme_gutenberg_editor_assets() { // phpcs:ignore

	add_filter('admin_body_class', 'sng_original_admin_body_class');
  global $pagenow;
  global $post;

	// Scripts.
  $deps = $pagenow === 'widgets.php' ? array( 'wp-blocks', 'wp-element', 'wp-rich-text', 'wp-plugins', 'wp-edit-widgets' ) : array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-rich-text', 'wp-plugins', 'wp-edit-post' );

  wp_register_script(
    'css-validator',
    'https://cdn.jsdelivr.net/npm/csstree-validator/dist/csstree-validator.js'
  );

  wp_enqueue_script('css-validator');

  wp_enqueue_script(
    'sango_theme_gutenberg-block-js', // Handle.
    App::getUrl( 'build/blocks.js'),
    $deps
  );


  // 親テーマのget_optionの値を全てエディターのJSにわたす->必要に応じてブロックで利用
	// $editor_include_options = wp_load_alloptions();
	$cats = get_categories();
	$categories = array();
	foreach ($cats as $cat) {
		$categories[] = $cat;
	}
	$tgs = get_tags();
	$tags = array();
	foreach ($tgs as $tag) {
		$tags[] = $tag;
	}
  $editor_include_options = array(
		'site_url' => site_url(),
    'say_image_upload' => get_option("say_image_upload"),
		'say_name' => get_option("say_name"),
		'image_dir' => @App::getDirUrl('images'),
		'categories' => $categories,
    'users' => get_users(),
		'tags' => $tags,
    'custom_formats' => @App::get('format')->get(),
    'custom_colors' => @App::get('color')->get(),
    'infeed_enabled' => get_theme_mod('enable_ad_infeed', false),
    'sango_version' => wp_get_theme(get_template())->get('Version'),
    'page_now' => $pagenow === "widgets.php" ? "widgets" : "post",
    "post_type" => $post ? $post->post_type : "",
    "use_toc" => get_option('not_use_sgb_toc') ? false : true,
    "api_key" => @App::get('gallery')->getKey(),
  );
  wp_localize_script( 'sango_theme_gutenberg-block-js', 'sgb_parent_options', $editor_include_options );
  wp_enqueue_code_editor(['type' => 'text/css']);
  wp_enqueue_style('wp-codemirror');
	// Block Editor Styles.
	wp_enqueue_style(
		'sango_theme_gutenberg-block-editor-style', // Handle.
		App::getUrl( 'build/blocks.css'),
    array( 'wp-edit-blocks' )
  );
  // Custom styles from SANGO theme.
  wp_add_inline_style( 'sango_theme_gutenberg-block-editor-style', sango_theme_parent_colors().sgb_custom_colors() );
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'sango_theme_gutenberg_editor_assets' );
add_action( 'after_setup_theme', 'sango_theme_gutenberg_editor_external_assets' );


/**
 * Register SANGO custom block category
 *
 * @since 1.0.0
 */
function sango_theme_gutenberg_register_block_category( $categories ) {
  $categories[] = [
    'slug'  => 'sgb_custom',
    'title' => 'SANGOカスタムブロック'
  ];
  return $categories;
}

if ( function_exists( 'get_default_block_categories' ) && function_exists( 'get_block_editor_settings' ) ) {
  add_filter( 'block_categories_all', 'sango_theme_gutenberg_register_block_category' );
} else{
  add_filter( 'block_categories', 'sango_theme_gutenberg_register_block_category' );
}

/**
 * Register SANGO custom inline css (Frontend + Backend)
 *
 * @since 1.0.4
 */
function sango_theme_gutenberg_custom_inline_css() { // phpcs:ignore
  wp_add_inline_style( 'sango_theme_gutenberg-style', sgb_custom_colors().sgb_custom_format() );
  if (!is_admin()) {
    wp_enqueue_script(
      'sango_theme_client-block-js', // Handle.
      App::getUrl( 'client.build.js'),
      array(),
      SGB_VER_NUM,
      true
    );
    wp_localize_script('sango_theme_client-block-js', 'sgb_client_options', array(
      'site_url' => site_url(),
      'is_logged_in' => is_user_logged_in()
    ));
  }
}
add_action( 'wp_enqueue_scripts', 'sango_theme_gutenberg_custom_inline_css' );

function sango_block_init() {
  add_theme_support( 'align-wide' );
  $pluginUrl = get_template_directory_uri().'/library/sango-theme-gutenberg/dist/';
  $dirName = dirname( __FILE__ );
  if (strpos(dirname(__FILE__), "plugins")) {
    $pluginUrl = plugin_dir_url( __FILE__ );
    App::setIsPlugin(true);
  }
  App::setRootPluginDir($dirName);
  App::setRootPluginUrl($pluginUrl);
	require_once $dirName. '/blocks/posts.php';
	require_once $dirName. '/blocks/kanren.php';
  require_once $dirName. '/blocks/conditional.php';
  require_once $dirName. '/blocks/slider.php';
  require_once $dirName. '/blocks/ab-test.php';
  require_once $dirName. '/blocks/custom-css.php';
  require_once $dirName. '/blocks/table.php';
  require_once $dirName. '/blocks/content-block.php';
  require_once $dirName. '/blocks/profile.php';
  require_once $dirName. '/blocks/btn-group.php';
  require_once $dirName. '/blocks/list.php';
  require_once $dirName. '/blocks/codebox.php';
  require_once $dirName. '/blocks/footer.php';
  require_once $dirName. '/blocks/full-bg.php';
  require_once $dirName. '/blocks/faq.php';
  if (!get_option('not_use_sgb_toc')) {
    require_once dirname(__FILE__). '/blocks/toc.php';
  }
  App::register('format', 'SangoBlocks\Format');
  App::register('css', 'SangoBlocks\CustomCSS');
  App::register('js', 'SangoBlocks\CustomJS');
  App::register('color', 'SangoBlocks\Color');
  App::register('content-block', 'SangoBlocks\ContentBlock');
  App::register('posts', 'SangoBlocks\Posts');
  App::register('toc', 'SangoBlocks\Toc');
  App::register('fontawesome', 'SangoBlocks\FontAwesome');
  App::register('profile', 'SangoBlocks\Profile');
  App::register('rest', 'SangoBlocks\Rest');
	if (!is_user_logged_in()) {
    App::run();
		return;
	}
  App::register('preset', 'SangoBlocks\Preset');
  App::register('migrate', 'SangoBlocks\Migrate');
  App::register('gallery', 'SangoBlocks\Gallery');
	App::run();
}

add_action('init', 'sango_block_init');
add_action('widgets_init', function () {
  $dirName = dirname( __FILE__ );
  require_once $dirName. '/classes/ContentBlockWidget.php';
  register_widget('ContentBlockWidget');
});

if (!function_exists('sng_content_block_template')) {
  function sng_content_block_template($single)
  {
    global $post;
    $dirName = dirname( __FILE__ );
    if (get_post_type($post) === "content_block") {
      if (file_exists($dirName . '/single-content_block.php')) {
          return $dirName . '/single-content_block.php';
      }
    }
    return $single;
  }
}

add_filter('single_template', 'sng_content_block_template');

if (!function_exists('sng_render_custom_css')) {
  function sng_render_custom_css()
  {
      if (!App::get('css')) {
        return;
      }
      $style = App::get('css')->get_style();
      if (!$style) {
          return;
      }
      return '<style>'.  $style . '</style>';
  }
}

// Layout Shift対策
// カスタムCSSのheadへの出力
// xmlの場合は無視
$is_xml = false;
if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '.xml') !== false) {
  $is_xml = true;
}
if (!$is_xml) {
  ob_start();
  add_action('shutdown', function() {
    $final = ob_get_clean();
    $style = sng_render_custom_css();
    if ($style) {
      $final = str_replace('</head>', "$style\n</head>", $final);
    }
    if (function_exists('sng_save_cache')) {
      sng_save_cache($final); // SANGO 3.0より
    }
    echo $final;
  }, 0);
}

// カスタムCSSのfooterへの出力
// 念の為footerへも出力
function sgb_add_custom_css_to_footer() {
  $style = sng_render_custom_css();
  echo $style;
}

add_action('wp_footer', 'sgb_add_custom_css_to_footer');
