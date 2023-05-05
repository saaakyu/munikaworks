<?php

use SANGO\App;

App::get('builder')->addSection('✏️ カスタマイズ', 'customize', ['priority' => 3]);

App::get('builder')->addConfig('customize', [
  'name' => 'customize_title0',
  'value' => '',
  'title' => 'エディター設定',
  'type' => 'title',
  'description' => ''
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sangoland_apikey',
  'value' => get_theme_mod('sangoland_apikey', ''),
  'title' => 'SANGO Land APIキー',
  'type' => 'text',
  'textType' => 'password',
  'updateMethod' => 'theme_mod',
  'description' => 'SANGO Landはトップページのパーツや記事内で使える装飾をコピペするだけで使えるテンプレートサイトです。詳しい説明は<a href="https://saruwakakun.com/sango/connect-to-sangoland" target="_blank" rel="noopener noreferrer">こちら</a>'
]);

App::get('builder')->addConfig('customize', [
  'name' => 'not_use_sgb_toc',
  'value' => get_option('not_use_sgb_toc', ''),
  'title' => '目次ブロックを停止する',
  'type' => 'checkbox',
  'description' => '目次系のプラグインをご利用の場合は競合することもあります。SANGO標準の目次を使用しない場合はチェックをつけて停止してください。'
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sgb_post_type_select',
  'value' => get_option('sgb_post_type_select', ''),
  'title' => '記事一覧のカスタム投稿タイプ',
  'type' => 'text',
  'default' => '',
  'description' => '記事一覧ブロックや関連記事ブロックで選択できるカスタム投稿タイプをカンマ区切りで入力します。<br/>例：news,product'
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sgb_custom_format',
  'value' => get_option('sgb_custom_format', ''),
  'title' => 'カスタム書式',
  'type' => 'format',
  'description' => 'エディター内で使う文字装飾の設定をします。詳しい説明は<a href="https://saruwakakun.com/sango/sango-gutenberg-custom-cs" target="_blank" rel="noopener noreferrer">こちら</a>'
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sgb_custom_color',
  'value' => get_option('sgb_custom_color', ''),
  'title' => 'カスタムカラー',
  'type' => 'custom-color',
  'description' => 'エディター内のカラーパレットで使う色を設定します。詳しい説明は<a href="https://saruwakakun.com/sango/custom-color-palette" target="_blank" rel="noopener noreferrer">こちら</a>'
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sgb_custom_variation',
  'value' => get_option('sgb_custom_variation', ''),
  'title' => 'カスタムバリエーション',
  'type' => 'custom-variation',
  'description' => '自分好みにカスタマイズしたブロックをブロック一覧に登録するための機能です。詳しい説明は<a href="https://saruwakakun.com/sango/custom-variation" target="_blank" rel="noopener noreferrer">こちら</a>'
]);

App::get('builder')->addConfig('customize', [
  'name' => 'customize_title2',
  'value' => '',
  'title' => 'おすすめプラグイン',
  'type' => 'title',
  'description' => ''
]);

// App::get('builder')->addConfig('customize', [
//   'title' => 'One User Avatar',
//   'name' => 'one-user-avatar',
//   'description' => 'プロフィールにユーザー画像を設定するために必要です。',
//   'installed' => App::get('plugin')->is_plugin_installed('one-user-avatar'),
//   'active' => App::get('plugin')->is_plugin_active('one-user-avatar'),
//   'type' => 'plugin'
// ]);
App::get('builder')->addConfig('customize', [
  'title' => 'WP Multibyte Patch',
  'name' => 'wp-multibyte-patch',
  'description' => '日本語表示のバグを無くすために必要なプラグインです。有効化するだけで良いので入れておきましょう。',
  'installed' => App::get('plugin')->is_plugin_installed('wp-multibyte-patch'),
  'active' => App::get('plugin')->is_plugin_active('wp-multibyte-patch'),
  'type' => 'plugin'
]);
App::get('builder')->addConfig('customize', [
  'title' => 'Safe SVG',
  'name' => 'safe-svg',
  'description' => 'SVG画像をセキュアにアップロードできるようにするプラグインです。',
  'installed' => App::get('plugin')->is_plugin_installed('safe-svg'),
  'active' => App::get('plugin')->is_plugin_active('safe-svg'),
  'type' => 'plugin'
]);
App::get('builder')->addConfig('customize', [
  'title' => 'EWWW Image Optimizer',
  'name' => 'ewww-image-optimizer',
  'description' => '画像を最適化してアップロードできるようにするプラグインです。画像周りで処理が重いと感じたら導入しておきましょう。',
  'installed' => App::get('plugin')->is_plugin_installed('ewww-image-optimizer'),
  'active' => App::get('plugin')->is_plugin_active('ewww-image-optimizer'),
  'type' => 'plugin'
]);
App::get('builder')->addConfig('customize', [
  'title' => 'XML Sitemap & Google News',
  'name' => 'xml-sitemap-feed',
  'description' => 'Googleへのサイトマップを送信するために利用することをおすすめします。シンプルで使いやすいのが特徴です。',
  'installed' => App::get('plugin')->is_plugin_installed('xml-sitemap-feed'),
  'active' => App::get('plugin')->is_plugin_active('xml-sitemap-feed'),
  'type' => 'plugin'
]);

App::get('builder')->addConfig('customize', [
  'name' => 'customize_title1',
  'value' => '',
  'title' => 'カスタマイズ参考リンク',
  'type' => 'title',
  'description' => ''
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sanko_sidemenu',
  'value' => '',
  'type' => 'sanko',
  'title' => 'サイドバーをブロックエディターだけで作る方法',
  'url' => 'https://saruwakakun.com/sango/block-only-sidemenu',
  'description' => ''
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sanko_toc',
  'value' => '',
  'type' => 'sanko',
  'title' => '【SANGO 目次ブロック】を使って目次を設定しよう',
  'url' => 'https://saruwakakun.com/sango/sango-block-toc',
  'description' => ''
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sanko_toc',
  'value' => '',
  'type' => 'sanko',
  'title' => 'ヘッダーやフッターをブロックエディターでカスタマイズする方法',
  'url' => 'https://saruwakakun.com/sango/header-footer-block',
  'description' => ''
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sanko_toc',
  'value' => '',
  'type' => 'sanko',
  'title' => 'ブロックを自由にコピーできるサービス SANGO Land について',
  'url' => 'https://saruwakakun.com/sango/sango-land',
  'description' => ''
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sanko_top',
  'value' => '',
  'type' => 'sanko',
  'title' => 'HTML/CSS不要！固定ページを使って1カラムのサイト型トップページを作る方法',
  'url' => 'https://saruwakakun.com/sango/sango-gutenberg-lp',
  'description' => ''
]);

App::get('builder')->addConfig('customize', [
  'name' => 'sanko_top',
  'value' => '',
  'title' => 'カテゴリートップページに固定ページの内容を表示する方法',
  'url' => 'https://saruwakakun.com/sango/category-top-customize',
  'type' => 'sanko',
  'description' => ''
]);
