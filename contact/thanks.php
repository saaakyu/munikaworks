<?php
$page = 'contact_lower';
include realpath(__DIR__ . '/../config/include.php');
?>
<!--インデックスしない-->
<meta name="robots" content="noindex, nofollow">
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
						<div class="txt center"><em class="blue">お問い合わせの送信が<br class="view_sp">完了しました。</em></div>
						<p class="txt center">この度はムニカワークスにお問い合わせ頂き、誠にありがとうございます。<br>ご登録いただきましたメールアドレスに自動返信メールを送信いたしました。</p>
						<p class="txt center">内容を確認し、3営業日以内にメールにてご連絡させていただきます。<br class="view_pc-tab">しばらく経ってもメールが届かない場合は迷惑メールフォルダをご確認の上、<br class="view_pc-tab">直接contact@munika-works.comまでご連絡ください。</p>
						<!-- <p class="txt center">Twitterも随時更新しておりますので、この機会にぜひフォローをお願いいたします！</p>

						<div class="timeline">
							<a class="twitter-timeline" href="https://twitter.com/munika_works?ref_src=twsrc%5Etfw" data-height = "500"></a>
								<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						</div> -->
					</div>
				</div>
			</div><!-- /.wrp_intro -->


		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>