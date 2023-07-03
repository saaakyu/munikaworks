<footer id="footer">
	<div class="footer__wrap">
		<div class="contact">
			<div class="f_logo"><a href="<?php echo LOCATION; ?>"><span>世界観引き出すデザインを。</span><br>
					<img src="<?php echo LOCATION_FILE; ?>images/common/logo.svg" alt="munika works"></a></div>
			<div class="mail"><a href="mailto:contact@munika-works.com">contact&#64;munika-works.com</a></div>
			<div class="sns">
				<ul class="sns__icon">
					<li><a href="<?php echo LOCATION_TWITTER; ?>" target="_blank" rel="noopener"><i class="fa-brands fa-twitter"></i></a></li>
					<!-- <li><a href="<?php echo LOCATION_INSTAGRAM; ?>" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a></li> -->
				</ul>
			</div>
		</div>
		<div class="footer__nav">
			<ul class="nav">
				<li><a href="<?php echo LOCATION; ?>">TOP</a></li>
				<li><a href="<?php echo LOCATION; ?>about/">ムニカワークス<br class="view_tab">について</a></li>
				<li><a href="<?php echo LOCATION; ?>service/">サービス内容</a></li>
				<li><a href="<?php echo LOCATION; ?>price/">料金について</a></li>
			</ul>
			<ul class="nav">
				<li><a href="<?php echo LOCATION; ?>works/">制作実績</a></li>
				<!-- <li><a href="<?php echo LOCATION; ?>case_study/">実例のご紹介</a></li> -->
				<li><a href="<?php echo LOCATION; ?>status/">現在の受付状況</a></li>
				<li><a href="<?php echo LOCATION; ?>news/">お知らせ</a></li>
				<!-- <li><a href="<?php echo LOCATION; ?>blog/">ブログ</a></li> -->
				<li><a href="<?php echo LOCATION; ?>privacy_policy/">プライバシーポリシー</a></li>
			</ul>
			<ul class="nav">
				<!-- <li><a href="<?php echo LOCATION; ?>faq/">よくあるご質問</a></li> -->
				<div class="contact_btn"><a href="<?php echo LOCATION_CONTACT; ?>">お問い合わせ</a></div>
			</ul>
		</div><!--footer__nav-->
	</div>
	<p id="copyright">&copy; <?php //echo get_copyright_date(2022);>
								?>munika-works</p>
</footer>
<?php
// コピーライトの年を返す
function get_copyright_date($then)
{
	$now = date('Y');
	if ($then < $now) {
		return $then . '–' . $now;
	} else {
		return $then;
	}
}
?>

<!-- *** javascript *** -->
<?php include LOCATION_ROOT_DIR . "/templates/common_js.php"; ?>
<!-- *** slickのjs *** -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- *** スクロールヒントのjs *** -->
<link rel="stylesheet" href="https://unpkg.com/scroll-hint@1.1.10/css/scroll-hint.css">
<script src="https://unpkg.com/scroll-hint@1.1.10/js/scroll-hint.js"></script>