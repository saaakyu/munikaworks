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
define('KEYWORDS', 'デザイン,世界観,ロゴ,同人誌,装丁,表紙');
define('DESCRIPTION', 'ムニカワークスは創作活動を応援するデザインサービスです。「世界観引き出すデザインを。」をコンセプトにロゴデザインや同人誌デザインを承っております。');
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

#ムニカワークスについて
if ($page == 'about') {
	$meta['title'] = 'ムニカワークスについて | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',ムニカワークスのこと';
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}

#サービス内容
if ($page == 'service') {
	$meta['title'] = 'サービス内容 | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',サービス内容';
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}

#料金について
if ($page == 'price') {
	$meta['title'] = '料金について | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',料金';
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}

#現在の受付状況
if ($page == 'status') {
	$meta['title'] = '現在の受付状況 | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',受付状況';
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}

#よくあるご質問
if ($page == 'faq') {
	$meta['title'] = 'よくあるご質問 | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',よくあるご質問';
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}

#各種お問い合わせ
if ($page == 'contact') {
	$meta['title'] = '各種お問い合わせ | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',各種お問い合わせ';
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}

#すべてのお問い合わせフォーム
if ($page == 'contact_lower') {
	$meta['title'] = 'お問い合わせフォーム | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',お問い合わせフォーム';
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
