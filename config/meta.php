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
define('TITLE', 'ムニカワークス | 創作・クリエイター活動を応援するデザインサービス');
define('KEYWORDS', '創作,同人,デザイン,ロゴ,同人誌,装丁,同人誌表紙,世界観');
define('DESCRIPTION', 'ムニカワークスは創作・クリエイター活動を応援するデザインサービスです。「世界観引き出すデザインを。」をコンセプトにロゴデザインや同人誌デザインを承っております。');
define('H1', '創作・クリエイター活動のデザインはムニカワークス');


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
	$meta['title'] = 'ムニカワークスについて | 創作・クリエイター活動を応援するデザインサービス';
	$meta['keywords'] = KEYWORDS . ',ムニカワークスのこと';
	$meta['description'] = 'ムニカワークスはデザインで物語をカタチにするお手伝いをしています。同人誌デザインやTRPGロゴ、オンリーイベントロゴなど創作活動のデザインはご相談ください。';
	$meta['h1'] = H1;
}

#サービス内容
if ($page == 'service') {
	$meta['title'] = 'サービス内容 | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',サービス内容';
	$meta['description'] = '創作・クリエイター活動に関するロゴ制作、同人誌デザインなどを承っております。その他、バナーやノベルティデザインなどもご対応が可能ですのでお気軽にお問い合わせください。';
	$meta['h1'] = H1;
}

#料金について
if ($page == 'price') {
	$meta['title'] = '料金について | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',料金';
	$meta['description'] = 'サービスの料金についてご紹介しています。ロゴ制作、同人誌デザインの料金やお支払い方法などを分かりやすくご案内しています。';
	$meta['h1'] = H1;
}

#現在の受付状況
if ($page == 'status') {
	$meta['title'] = '現在の受付状況 | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',受付状況';
	$meta['description'] = '受付状況をリアルタイムで発信しています。ご依頼の際は本ページをご確認の上お問い合わせください。';
	$meta['h1'] = H1;
}

#よくあるご質問
if ($page == 'faq') {
	$meta['title'] = 'よくあるご質問 | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',よくあるご質問';
	$meta['description'] = 'サービスややり取りに関する、お客様からよくあるお問い合わせと回答についてご紹介しています。';
	$meta['h1'] = H1;
}

#各種お問い合わせ
if ($page == 'contact') {
	$meta['title'] = '各種お問い合わせ | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',各種お問い合わせ';
	$meta['description'] = 'デザインのご相談をフォームにて受け付けています。お気軽にご相談ください。';
	$meta['h1'] = H1;
}

#すべてのお問い合わせフォーム
if ($page == 'contact_lower') {
	$meta['title'] = 'お問い合わせフォーム | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',お問い合わせフォーム';
	$meta['description'] = 'デザインのご相談をフォームにて受け付けています。お気軽にご相談ください。';
	$meta['h1'] = H1;
}

#特定商取引法に基づく表記
if ($page == 'contact_lower') {
	$meta['title'] = '特定商取引法に基づく表記 | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',特定商取引法に基づく表記';
	$meta['description'] = 'ムニカワークスの特定商取引に基づく表記ページです。';
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
