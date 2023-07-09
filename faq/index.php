<?php
$page = 'faq';
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
					<span class="ttl__en">faq</span>
					<h2 class="ttl__jp">よくあるご質問</h2>
				</div>
			</div><!--.wrp_title-->

			<div class="wrp_intro">
				<div class="con_intro">
					<div class="box_intro">
						<p class="txt center">お客様からお問い合わせの多いご質問をまとめました。<br>お問い合わせいただく前に下記項目にて一度ご確認くださいませ。</p>

						<p class="txt center">サイト上で見つからない場合は、<a href="<?php echo LOCATION; ?>contact/others_form/">その他のお問い合わせ</a>からお問い合せください。</p>
					</div>
					<ul class="box_link">
						<li><a href="#link01">ご依頼の流れ</a></li>
						<li><a href="#link02">ロゴデザイン</a></li>
						<li><a href="#link03">同人誌デザイン</a></li>
					</ul>
				</div>
			</div><!-- /.wrp_intro -->

			<div class="wrp_faq">
				<div class="con_faq">
					<div class="ttl">
						<span class="ttl__en">Flow</span>
						<h3 class="ttl__jp">ご依頼の<span class="pink">流れ</span></h3>
					</div>
					<div class="tmp_acc_box">
						<div class="tmp_acc_tit js-accordion is-active">
							<div class="tmp_st_s">
								<span class="jp">クレジット表記の指定はありますか？</span>
							</div>
							<span class="ic" aria-hidden="true"></span>
						</div>
						<div class="tmp_acc_target">
							<div class="target_inner">
								<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
							</div>
						</div>
					</div><!--.tmp_acc_box-->

					<div class="tmp_acc_box">
						<div class="tmp_acc_tit js-accordion is-active">
							<div class="tmp_st_s">
								<span class="jp">サービス内容以外のデザインもお願いできますか？</span>
							</div>
							<span class="ic" aria-hidden="true"></span>
						</div>
						<div class="tmp_acc_target">
							<div class="target_inner">
								<p>はい、大歓迎です！<br>趣味で紙媒体、仕事でWeb媒体のデータを取り扱ったことがありますので広くご対応できるかと存じます。<br><a href="<?php echo LOCATION; ?>contact/others_form/">その他のお問い合わせ</a>よりご相談ください。</p>
							</div>
						</div>
					</div><!--.tmp_acc_box-->

					<div class="tmp_acc_box">
						<div class="tmp_acc_tit js-accordion is-active">
							<div class="tmp_st_s">
								<span class="jp">素材の用意がありません。</span>
							</div>
							<span class="ic" aria-hidden="true"></span>
						</div>
						<div class="tmp_acc_target">
							<div class="target_inner">
								<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
							</div>
						</div>
					</div><!--.tmp_acc_box-->

					<div class="tmp_acc_box">
						<div class="tmp_acc_tit js-accordion is-active">
							<div class="tmp_st_s">
								<span class="jp">イラストを描いて頂くことは可能ですか？</span>
							</div>
							<span class="ic" aria-hidden="true"></span>
						</div>
						<div class="tmp_acc_target">
							<div class="target_inner">
								<p>可能です。ただ、メインのサービスではないため費用やスケジュール等はその時々でご相談とさせていただけますと幸いです。<br>
									▼中の人の画力・テイスト参考<br>
									<a href="https://www.pixiv.net/users/14501317" target="_blank">https://www.pixiv.net/users/14501317</a></p>
							</div>
						</div>
					</div><!--.tmp_acc_box-->

					<div class="tmp_acc_box">
						<div class="tmp_acc_tit js-accordion is-active">
							<div class="tmp_st_s">
								<span class="jp">支払いは前払い？後払い？</span>
							</div>
							<span class="ic" aria-hidden="true"></span>
						</div>
						<div class="tmp_acc_target">
							<div class="target_inner">
								<p>お支払いは前払いとなります。<br>ご依頼内容確定後、作業着手前にご請求書をお送りいたします。<br>納期によってはお支払いを待たずに作業に入る場合もございますが、データの納品はご入金確認後とさせていただいております。</p>
							</div>
						</div>
					</div><!--.tmp_acc_box-->
				</div>
			</div>


		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>