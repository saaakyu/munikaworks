<?php
//子テーマのCSSの読み込み
add_action('wp_enqueue_scripts', 'enqueue_my_child_styles');
function enqueue_my_child_styles()
{
  wp_enqueue_style(
    'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array('sng-stylesheet', 'sng-option')
  );
}
add_action('after_setup_theme', 'enqueue_my_child_gutenberg_styles');
function enqueue_my_child_gutenberg_styles()
{
  add_theme_support('editor-styles');
  add_editor_style('my-gutenberg.css');
}

/************************
 *functions.phpへの追記は以下に
 *************************/
//Google fontsを変更
function register_googlefonts() { wp_deregister_style('sng-googlefonts');//初期設定を解除
  wp_register_style( 'sng-googlefonts', '//fonts.googleapis.com/css?family=Josefin+Sans:400,600|Zen+Maru+Gothic:400,500,700&family=Noto+Sans+JP:wght@400,500,700&display=swap', array(), '', 'all' ); wp_enqueue_script('sng-googlefonts');
}
add_action('wp_enqueue_scripts', 'register_googlefonts');
//END Google Fontsを変更

//headにタグを追加
add_action('wp_head', 'add_meta_to_head');
function add_meta_to_head(){
  echo '<link href="/files/css/common.css" rel="stylesheet" media="all">';
}

//body閉じタグ前にscriptタグを追加
// add_action('wp_footer', 'add_requirejs');
// function add_requirejs()
// {
//   echo '
//   <script src="/files/js/common.min.js"></script>';
// }


/************************
 *functions.phpへの追記はこの上に
 *************************/

