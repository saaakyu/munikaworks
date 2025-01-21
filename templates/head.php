<?php
//開いているページのURL
$varSelfPageURL = (empty($_SERVER["HTTPS"]) ? "https://" : "http://") . @$_SERVER["HTTP_HOST"] . htmlspecialchars(strip_tags(@$_SERVER["REQUEST_URI"]));
if (!empty(parse_url($varSelfPageURL)['query'])) {
	$varSelfPageURLParam = parse_url($varSelfPageURL)['query'];
	if ($varSelfPageURLParam) {
		$varSelfPageURL = str_replace('?' . $varSelfPageURLParam, '', $varSelfPageURL);
	}
}
?>
<!DOCTYPE html>
<html class="<?php echo $htmlClass; ?>" lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-PWJ5WP9');
	</script>
	<!-- End Google Tag Manager -->
	
	<meta charset="utf-8">
	<title><?php echo $meta['title']; ?></title>
	<meta name="keywords" content="<?php echo $meta['keywords']; ?>">
	<meta name="description" content="<?php echo $meta['description']; ?>">
	<?php //拡大あり縮小無し 
	?>
	<meta name="viewport" content="width=device-width, initial-scale=0.0, minimum-scale=1.0">
	<?php
	//拡大縮小なし※ios10以降は拡大されます
	//<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	//iPhone X safari 全画面に対応する場合は右記追加する※その他別途cssを指定する必要有 viewport-fit=cover
	?>
	<meta name="format-detection" content="telephone=no">
	<link rel="index" href="<?php echo LOCATION; ?>">
	<link rel="canonical" href="<?php echo $varSelfPageURL; ?>">

	<?php if (file_exists(LOCATION_ROOT_DIR . '/favicon.ico')) : ?>
		<!-- favicon -->
		<link rel="shortcut icon" href="<?php echo LOCATION . 'favicon.ico'; ?>">
	<?php endif; ?>

	<?php if (file_exists(LOCATION_ROOT_DIR . '/apple-touch-icon.png')) : ?>
		<!-- apple-touch-icon -->
		<link rel="apple-touch-icon" href="<?php echo LOCATION . 'apple-touch-icon.png'; ?>">
	<?php endif; ?>
	<?php
	/**
	 * 不要なドメインは削除してください
	 * その他事前接続が必要なドメインがあれば追加してください
	 */
	?>
	<!-- <link rel='dns-prefetch' href='//www.googletagmanager.com' />
	<link rel='dns-prefetch' href='//code.jquery.com' /> -->

	<!-- Open graph tags -->
	<?php
	/**
	 * configにFB_APPIDの設定箇所がありますので、
	 * 管理者に確認してIDを取得し、必ず設定するようお願いします。
	 * ※使い回しはNGです。サイトごとに取得し設定してください。
	 *
	 * https://tcd-theme.com/2018/01/facebook_app_id.html
	 */
	?>
	<meta property="fb:app_id" content="<?php echo FB_APPID; ?>">
	<meta property="og:site_name" content="<?php echo TITLE; ?>">
	<meta property="og:title" content="<?php echo $meta['title']; ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo $varSelfPageURL; ?>">
	<meta property="og:description" content="<?php echo $meta['description']; ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo $meta['title']; ?>">
	<meta name="twitter:description" content="<?php echo $meta['description']; ?>">

	<?php if (file_exists(LOCATION_ROOT_DIR . '/ogp.jpg')) : ?>
		<?php
		/**
		 * 各比率の画像サイズを用意してください
		 * http://ogimage.tsmallfield.com
		 * ＜例＞
		 * <meta property="og:image" content="<?php echo LOCATION.'ogp_630x630.jpg'; ?>">
		 * <meta property="og:image" content="<?php echo LOCATION.'ogp_1200x630.jpg'; ?>">
		 * <meta property="og:image" content="<?php echo LOCATION.'ogp_1200x1200.jpg'; ?>">
		 */
		?>
		<meta property="og:image" content="<?php echo LOCATION . 'ogp.jpg'; ?>">
	<?php endif; ?>

<!-- Open graph tags -->

	<script src="<?php echo LOCATION_FILE; ?>js/analytics.js"></script>

	<!-- *** stylesheet *** -->
	<?php include LOCATION_ROOT_DIR . "/templates/common_css.php"; ?>

	<!-- *** Font Awesomeのcss *** -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
	<!-- *** Google Fonts *** -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Noto+Sans+JP:wght@400;700&family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- *** slickのCSS *** -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">

	<!-- *** スクロールヒントのcss *** -->
	<link rel="stylesheet" href="https://unpkg.com/scroll-hint@1.1.10/css/scroll-hint.css">