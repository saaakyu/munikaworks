<?php
$page = 'service';
include realpath(__DIR__ . '/../config/include.php');
?>
<!-- *** stylesheet *** -->
<link href="<?php echo echo_version(LOCATION_FILE . 'css/' . $page . '.css', LOCATION_FILE_DIR); ?>" rel="stylesheet" media="all">
<script>
	document.addEventListener("DOMContentLoaded", function(e) {
		/* load & resize & scroll & firstLoad
		------------------------------------------------------------------------*/
		$w.on({
			// load
			'load': function() {},
			//scroll	
			'scroll': function() {}
		}).superResize({
			//resize
			loadAction: false,
			resizeAfter: function() {}
		}).firstLoad({
			//firstLoad
			pc_tab: function() {},
			sp: function() {}
		});
	});
</script>
</head>

<body id="<?php echo $page; ?>">
	<?php include LOCATION_ROOT_DIR . "/templates/gtm.php"; ?>
	<div id="munika_page">
		<?php include LOCATION_ROOT_DIR . "/templates/header.php"; ?>
		<main id="contents">

			<!-- パンくず -->
			<!-- <ul class="topicpath" vocab="https://schema.org/" typeof="BreadcrumbList">
		<li property="itemListElement" typeof="ListItem">
			<a property="item" href="<?php echo LOCATION; ?>" typeof="WebPage">
				<span property="name">Home</span>
			</a>
			<meta property="position" content="1">
		</li>
		<li property="itemListElement" typeof="ListItem">
			<span property="name">コピー</span>
			<meta property="position" content="2">
		</li>
	</ul> -->

			<div class="wrp_title">
				<div class="con_title">
					<span class="ttl__en">Service</span>
					<h2 class="ttl__jp">サービス内容</h2>
				</div>
			</div><!--.wrp_title-->

			<div class="wrp_intro">
				<div class="con_intro">
					<div class="box_intro">
						<p class="txt center">創作活動に関するロゴ制作・同人誌表紙デザイン・Web制作などを承っております。<br>
							その他ノベルティデザインなどもご対応可能ですので、お気軽にお問い合わせくださいませ。<br><br>
							※料金表の価格は個人様向けとなります。<br>企業様の場合は異なりますので、まずはお問い合わせください。</p>
					</div>
				</div>
			</div><!-- /.wrp_intro -->

			<div class="wrp_lay_right">
				<div class="con_lay">
					<div class="box_lay__img">
						<p class="img_intro1"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_intro1.jpg" alt="" class="corner"></p>
					</div>
					<div class="box_lay__txt">
						<h3 class="ttl__jp pink">世界観引き出すデザインを。</h3>
						<p class="tmp_txt">もともと、アニメや漫画・小説などの物語が好きだったことから創作物の世界観や魅力を伝えるお手伝いをしたいと思い活動を始めました。</p>
						<p class="tmp_txt">「デザインの依頼を受けてくれる人」ではなく、「デザインで困った時の相談相手」として作品を一緒に作り上げることを意識しています。</p>
					</div>
				</div>
			</div><!-- /.wrp_lay_right -->

			<div class="wrp_compo">
				<div class="con_compo">
					<h4 class="ttl__jp">&mdash; 個人情報の定義</h4>
					<p class="tmp_txt">本ポリシーにおいて、個人情報とは生存する個人に関する情報であって、氏名、生年月日、住所、電話番号、メールアドレス等、特定の個人を識別することができるものをいいます。
					</p>
				</div>
				<div class="con_compo">
					<h4 class="ttl__jp">&mdash; 個人情報の管理</h4>
					<p class="tmp_txt">お客様からお預かりした個人情報は、不正アクセス、紛失、漏えい等が起こらないよう慎重かつ適切に管理します。</p>
				</div>
			</div>



		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>