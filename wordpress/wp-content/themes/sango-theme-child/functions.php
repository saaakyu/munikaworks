<?php
//子テーマのCSSの読み込み
add_action( 'wp_enqueue_scripts', 'enqueue_my_child_styles' );
function enqueue_my_child_styles() {
  wp_enqueue_style( 'child-style', 
  	get_stylesheet_directory_uri() . '/style.css', 
  	array('sng-stylesheet','sng-option')
	);
}
add_action( 'after_setup_theme', 'enqueue_my_child_gutenberg_styles' );
function enqueue_my_child_gutenberg_styles() {
  add_theme_support( 'editor-styles' );
  add_editor_style( 'my-gutenberg.css' );
}
  
/************************
 *functions.phpへの追記は以下に
 *************************/
//元々記載があった
 function delete_domain_from_attachment_url( $url ) {
 
 if ( preg_match( '/^http(s)?:\/\/[^\/\s]+(.*)$/', $url, $match ) ) {
 $url = $match[2];
 }
 return $url;
}
 
add_filter( 'wp_get_attachment_url', 'delete_domain_from_attachment_url' );


//Google fontsを変更
function register_googlefonts() { wp_deregister_style('sng-googlefonts');//初期設定を解除 
  wp_register_style( 'sng-googlefonts', '//fonts.googleapis.com/css2?family=Josefin+Sans&family=Noto+Sans+JP:wght@400;700&family=Zen+Maru+Gothic:wght@400;500;700&display=swap', array(), '', 'all' ); wp_enqueue_script('sng-googlefonts');
}
add_action('wp_enqueue_scripts', 'register_googlefonts');
//END Google Fontsを変更

//headにタグを追加add_action( 'wp_head', 'add_meta_to_head' );
//function add_meta_to_head() {	echo '<meta property="fb:app_id" content="123456" />';
//}

/************************
 *functions.phpへの追記はこの上に
 *************************/