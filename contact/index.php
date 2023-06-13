<?php
$page = 'contact';
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
					<span class="ttl__en">Contact</span>
					<h2 class="ttl__jp">各種お問い合わせ</h2>
				</div>
			</div><!--.wrp_title-->

			<div class="wrp_intro">
				<div class="con_intro">
					<div class="box_intro">
						<div class="txt center"><em>ご希望の内容をお選びください。</em></div>
						<p class="txt center">現在の受付状況については<a href="<?php echo LOCATION; ?>status/">こちら</a>。</p>
					</div>
				</div>
			</div><!-- /.wrp_intro -->

			<div class="wrp_contact">
				<div class="con_contact">
					<div class="box_contact">

						<div class="request_btn">
							<a href="<?php echo LOCATION; ?>contact/logo_form/">
								<p class="category"><span class="pink">ロゴデザイン</span>のご依頼</p>
								<p class="en">More</p>
							</a>
						</div>

						<div class="request_btn">
							<a href="<?php echo LOCATION; ?>contact/cover_form/">
								<p class="category"><span class="sky_blue">同人誌表紙デザイン</span>の<br class="view_sp">ご依頼</p>
								<p class="en">More</p>
							</a>
						</div>

						<!-- <div class="request_btn">
							<a href="#">
								<p class="category"><span class="green">サイト制作</span>のご依頼</p>
								<p class="en">More</p>
							</a>
						</div> -->

						<div class="request_btn">
							<a href="<?php echo LOCATION; ?>contact/others_form/">
								<p class="category"><span class="bright_yellow">その他</span>の<br class="view_sp">ご依頼・お問い合わせ</p>
								<p class="en">More</p>
							</a>
						</div>



					</div><!-- .box_contact -->
				</div><!-- .con_contact -->
			</div><!-- .wrp_contact -->


		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>