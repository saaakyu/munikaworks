<?php
$page = 'contact_lower';
$title = 'cover_form';
include realpath(__DIR__ . '/../../config/include.php');
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
						<h3 class="txt center"><em><span class="sky_blue">同人誌デザイン</span>の<br class="view_sp">ご依頼フォーム</em></h3>
						<p class="tmp_txt center">同人誌デザインのご依頼・お見積もりは本フォームから。<br><br>
							事情がある場合を除き、基本前払いとさせていただいております。<br>
							金銭のやり取りが不安な方は<a href="<?php echo LOCATION_SKIMA; ?>222458"  target="_blank">SKIMA</a>からご依頼をお願いいたします。</p>
					</div>
				</div>
			</div><!-- /.wrp_intro -->

			<div class="wrp_form">
				<div class="con_form">
					<div class="box_form">

						<iframe data-tally-src="https://tally.so/embed/nG6DZZ?alignLeft=1&hideTitle=1&transparentBackground=1&dynamicHeight=1" loading="lazy" width="100%" height="3144" frameborder="0" marginheight="0" marginwidth="0" title="同人誌デザインのご依頼"></iframe>
						<script>
							var d = document,
								w = "https://tally.so/widgets/embed.js",
								v = function() {
									"undefined" != typeof Tally ? Tally.loadEmbeds() : d.querySelectorAll("iframe[data-tally-src]:not([src])").forEach((function(e) {
										e.src = e.dataset.tallySrc
									}))
								};
							if ("undefined" != typeof Tally) v();
							else if (d.querySelector('script[src="' + w + '"]') == null) {
								var s = d.createElement("script");
								s.src = w, s.onload = v, s.onerror = v, d.body.appendChild(s);
							}
						</script>


					</div><!-- .box_form -->
				</div><!-- .con_form -->
			</div><!-- .wrp_form -->


		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>