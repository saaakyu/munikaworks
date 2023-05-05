<?php
/*

	meta.php
	メタ情報を管理するファイルです

	$meta['title'] →　title
	$meta['keywords'] →　keywords
	$meta['description'] →　description
	$meta['H1'] →　h1


*/


/*--	Settings
--------------------------------------------------*/

//共通文言
define('TITLE', 'ムニカワークス | 創作活動を応援するデザインサービス');
define('KEYWORDS', 'デザイン,世界観,タイトルロゴ,同人誌,装丁,表紙,ムニカワークス');
define('DESCRIPTION', 'ムニカワークスは創作活動を応援するデザインサービスです。「世界観引き出すデザインを。」をコンセプトにロゴデザインや同人誌表紙デザイン等を承っております。');
define('H1', '創作活動に関するデザインはムニカワークス');


//初期文言
$meta = array(
	'title' => TITLE,
	'keywords' => KEYWORDS,
	'description' => DESCRIPTION,
	'h1' => H1
);


/*--	Main page
--------------------------------------------------*/

#トップページ
if ($page == 'homepage') {
	$meta['title'] = TITLE;
	$meta['keywords'] = KEYWORDS;
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}

#コピー
if ($page == 'copy') {
	$meta['title'] = 'コピー | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',コピー';
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}


/*--    Error page
--------------------------------------------------*/

#error - 403
if ($page == 'misc_403') $meta['title'] = 'Error 403 Forbidden アクセスが制限されています | ' . TITLE;

#error - 404
if ($page == 'misc_404') $meta['title'] = 'Error 404 Page Not Found ページが見つかりません | ' . TITLE;

#error - 500
if ($page == 'misc_500') $meta['title'] = 'Error 500 Internal Server Error サーバーエラーが出ています | ' . TITLE;


?>
