<?php

/*	Constant
--------------------------------------------------------------*/
//ローカル&テスト
if (empty($_SERVER['HTTPS'])) {
	define('LOCATION', 'https://' . $_SERVER['SERVER_NAME'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__) . "/.."))) . '/');
} else {
	define('LOCATION', 'http://' . $_SERVER['SERVER_NAME'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__) . "/.."))) . '/');
}

// 公開の際は絶対パスへ
// if(empty($_SERVER['HTTPS'])){
// 	define('LOCATION','http://www.example.com/');
// } else {
// 	define('LOCATION','https://www.example.com/');
// }

define('LOCATION_FILE', LOCATION . 'files/');

define('LOCATION_ROOT_DIR', realpath(__DIR__ . '/../'));
define('LOCATION_FILE_DIR', realpath(__DIR__ . '/../files/'));
/* normalPages */
$PageList = array(
	'contact',            #お問い合わせ(contact/index.php)
	'copy',                #コピー1　(copy/index.php)
	'copy__copy',        #コピー2 (copy/copy.php)
	'copy_copy',        #コピー3 (copy/copy/index.php)
	'copy_copy__copy'    #コピー4 (copy/copy/copy.php)
);

definitionLink($PageList,false);

/* Reservations */
define('LOCATION_PLAN', '');
define('LOCATION_CHANGE', '');
define('LOCATION_CANCEL', '');
define('LOCATION_LOGIN', '');

/* リンク振り分け */
if (!$phone) {
	//pcSite
	define('LOCATION_XXX', '');
} else {
	//spSite
	define('LOCATION_XXX', '');
}

/* Other */
define('FB_APPID', '');
define('LOCATION_TEL', 'tel:00000000000');
define('PLACEHOLDER_IMAGE', 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==');

/* 外部リンク */
define('LOCATION_TWITTER', 'https://twitter.com/munika_works/');
define('LOCATION_INSTAGRAM', 'https://www.instagram.com/munika_works/');
define('LOCATION_SKIMA', 'https://skima.jp/item/detail?item_id=');

?>
