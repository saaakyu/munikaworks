<?php
$page = 'about';
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
			<span property="name">ムニカワークスについて</span>
			<meta property="position" content="2">
		</li>
	</ul> -->

			<div class="wrp_title">
				<div class="con_title">
					<span class="ttl__en">About</span>
					<h2 class="ttl__jp">ムニカワークスについて</h2>
				</div>
			</div><!--.wrp_title-->

			<div class="wrp_about">
				<div class="con_about_left">
					<div class="box_about">
						<div class="box_about__img"><img src="./images/img_about01.png" alt=""></div>
						<div class="box_about__txt">
							<h3 class="ttl__jp">物語を見つけ、引き出し、<br><span class="pink">カタチ</span>にする。</h3>
							<p class="tmp_txt">デザインの役割は情報を伝えること。<br>さまざまな過程を経て生まれた"コンテンツ"はたくさんの物語を持っています。でも、もったいないことに上手く伝えられず埋もれてしまうこともしばしば。<br>
							ムニカワークスではそんな物語たちを見つけ出しカタチにすることで、わくわくが詰まった活動をいろんな人に見てもらうお手伝いをしています。</p>
						</div>
					</div>
				</div><!-- /.con_about -->

				<div class="wrp_point">
					<h3 class="ttl__jp">“大事にしている、<br class="view_sp"><span class="pink"><em>3</em>つ</span>のこと”</h3>
					<div class="con_point">
						<div class="box_point">
							<div class="box_point__img"><img src="./images/img_point01.jpg" alt=""></div>
							<div class="box_point__txt">
								<p class="point_txt">1. <span class="blue">理解する</span>こと</p>
								<p class="tmp_txt">デザインで何を伝えたいか、一番大事な部分はどこか、など気になった部分は質問を重ねることで、自分も相手も理解を深められるやり取りを意識しています。<br>ご依頼時点でご希望やイメージがふわっとしている方もヒアリングを通して作りたいものがより明確になった、と感じていただけると嬉しいです。</p>
							</div>
						</div>
						<div class="box_point">
							<div class="box_point__img"><img src="./images/img_point02.jpg" alt=""></div>
							<div class="box_point__txt">
								<p class="point_txt">2. <span class="blue">寄り添う</span>こと</p>
								<p class="tmp_txt">ご依頼者様のやりたいこと、状況、ご予算に合わせてご提案いたします。<br>「デザインの依頼を受けてくれる人」ではなく、「デザインで困った時の相談相手」として作品を一緒に作り上げることを意識しています。</p>
							</div>
						</div>
						<div class="box_point">
							<div class="box_point__img"><img src="./images/img_point03.jpg" alt=""></div>
							<div class="box_point__txt">
								<p class="point_txt">3. <span class="blue">楽しむ</span>こと</p>
								<p class="tmp_txt">作業は楽しんで、ヒアリングは興味を持って耳を傾けること大事にしています。<br>触れたことのないジャンル・作品のご依頼の場合は必ず一度下調べ・拝見してから制作に入りますので、キャラクターのこのモチーフを取り入れて欲しい！などのご要望もお気軽にご相談ください。</p>
							</div>
						</div>
					</div>
				</div><!-- /.wrp_point -->


				<div class="con_about_right">
					<div class="box_about">
						<div class="box_about__txt">
							<h3 class="ttl__jp"><span class="pink">中の人</span>について</h3>
							<p class="tmp_txt">制作会社勤務のwebデザイナー。言葉を整頓してカタチにするのが好き。<br>現職では、Webサイトのデザイン・構築・更新作業などWeb制作業務に幅広く携わっています。<br class="view_sp">シンプル・かわいい・きれいめなデザインが得意です。</p>
							<!-- <p class="tmp_txt">4年ほどweb制作会社で働いた後、フリーのデザイナーとして活動中。<br>
								前職では、Webサイトのデザイン・構築・更新作業などWeb制作業務に幅広く携わっておりました。</p> -->
						</div>
						<div class="box_about__img"><img src="./images/img_profile.png" alt=""></div>
					</div>
				</div><!-- /.con_about -->

				<div class="con_about_left">
					<div class="box_about">
					<div class="box_about__img"><img src="./images/img_logo_idea.png" alt=""></div>
						<div class="box_about__txt">
							<h3 class="ttl__jp"><span class="pink">なまえ</span>について</h3>
							<p class="tmp_txt">みなさんの作品を、デザインの力で「この世に二つとないものにしたい」という想いを込め”無二化（ムニカ）”と名付けました。<br>
								想いが詰まった作品・コンテンツをいろんな人に見てもらえるよう、「らしさ」を最大限に引き出し、伝えるデザインをめざします。</p>
						</div>
					</div>
				</div><!-- /.con_about -->

			</div><!-- /.wrp_about -->


		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>