<?php
$page = 'homepage';
include realpath(__DIR__ . '/config/include.php');
?>
<?php if (file_exists(LOCATION_ROOT_DIR . '/mobile_thumbnail.jpg') && $modern) : ?>
	<?php
	// モバイルサムネールの画像サイズ
	$mobile_thumb_width = 100;
	$mobile_thumb_height = 130;
	?>
	<PageMap>
		<DataObject type="thumbnail">
			<Attribute name="src" value="<?php echo LOCATION . 'mobile_thumbnail.jpg'; ?>" />
			<Attribute name="width" value="<?php echo $mobile_thumb_width; ?>" />
			<Attribute name="height" value="<?php echo $mobile_thumb_height; ?>" />
		</DataObject>
	</PageMap>
	<meta name="thumbnail" content="<?php echo LOCATION . 'mobile_thumbnail.jpg'; ?>" />
<?php endif; ?>
<!-- *** stylesheet *** -->
<?php include LOCATION_ROOT_DIR . "/templates/common_css.php"; ?>
<link href="<?php echo echo_version(LOCATION_FILE . 'css/homepage.css', LOCATION_FILE_DIR); ?>" rel="stylesheet" media="all">
</head>

<body id="<?php echo $page; ?>">
	<?php include LOCATION_ROOT_DIR . "/templates/gtm.php"; ?>
	<div id="munika_page">
		<?php include LOCATION_ROOT_DIR . "/templates/header.php"; ?>
		<main id="contents">
			<div class="wrp_fv">
				<div class="con_fv">
					<div class="box_fv">
						<div class="item1"></div>
						<div class="item2"></div>
						<div class="item3"></div>
						<div class="item4"></div>
						<div class="item5"></div>
						<div class="item6"></div>
						<div class="item7"></div>

					</div>
				</div>

				<div class="fv_txt">
					<div class="main_ttl">
						<div class="main_ttl__jp">世界観引き出す<br>デザインを。</div>
						<div class="main_ttl__en">Design that brings out the world building</div>
					</div>
				</div>
				<div class="scroll">
					<p>scroll</p>
				</div>
			</div>

			<div class="wrp_intro">
				<div class="con_intro">
					<div class="box_intro__img">
						<p class="img_intro1"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_intro1.jpg" alt="" class="corner"></p>
						<p class="img_intro2"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_intro2.jpg" alt="" class="corner"></p>
					</div>
					<div class="box_intro__txt">
						<span class="ttl__en">About</span>
						<h3 class="ttl__jp"><span class="pink">創作活動のデザイン</span>、<br class="view_sp">承ります</h3>
						<p class="tmp_txt">ムニカワークスは、創作活動を応援するデザインサービスです。<br>
							物語の魅力をたくさんの方に分かりやすくお伝えするため、ロゴデザインや同人誌表紙デザインのご依頼を承っております。</p>
						<div class="pink_btn"><a href="<?php echo LOCATION; ?>about/">ムニカワークスについて</a></div>
					</div>
				</div>
			</div><!-- /.wrp_intro -->

			<div class="wrp_service">
				<div class="con_service">
					<div class="box_service__txt">
						<span class="ttl__en">Service</span>
						<h3 class="ttl__jp"><span class="pink">お手伝い</span>できること</h3>
						<p class="tmp_txt">ロゴデザイン、同人誌表紙デザイン、<br class="view_pc-tab">その他創作活動に必要なデザイン周りのご相談を受け付けております。</p>
					</div>
					<div class="box_service__explain">
						<div class="service_inner">
							<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service1.png" alt=""></p>
							<p class="service__name">ロゴデザイン</p>
						</div>
						<div class="service_inner">
							<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service2.png" alt=""></p>
							<p class="service__name">同人誌<br class="view_sp">表紙デザイン</p>
						</div>
						<div class="service_inner">
							<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service3.png" alt=""></p>
							<p class="service__name">バナー制作</p>
						</div>
						<div class="service_inner">
							<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service3.png" alt=""></p>
							<p class="service__name">Web制作</p>
						</div>
					</div>
					<div class="pink_btn"><a href="<?php echo LOCATION; ?>about/">サービス内容を見る</a></div>
				</div>
			</div><!-- /.wrp_service -->

			<div class="wrp_works">
				<div class="con_works">
					<div class="box_works__txt">
						<span class="ttl__en">Works</span>
						<h3 class="ttl__jp"><span class="pink">制作実績</span></h3>
						<p class="txt center">掲載許可を頂いたデザインを公開しています。<br><span class="small">※一部成人指定を含む作品がございます。</span></p>
					</div>

					<div class="box_works__img">
						<ul>
							<li><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works01.jpg" alt="" class="corner"></li>
							<li><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works06.jpg" alt="" class="corner"></li>
							<li><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works02.jpg" alt="" class="corner"></li>
							<li><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works07.jpg" alt="" class="corner"></li>
						</ul>
						<ul>
							<li><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works01.jpg" alt="" class="corner"></li>
							<li><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works05.jpg" alt="" class="corner"></li>
							<li><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works03.jpg" alt="" class="corner"></li>
							<li><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works04.jpg" alt="" class="corner"></li>
						</ul>
					</div>
					<div class="pink_btn"><a href="<?php echo LOCATION; ?>works/">もっと見る</a></div>
				</div>
			</div><!-- /.wrp_works -->

			<div class="wrp_service">
				<div class="con_service">
					<div class="box_service__txt">
						<span class="ttl__en">Case study</span>
						<h3 class="ttl__jp"><span class="pink">実例のご紹介</span></h3>
						<p class="tmp_txt">ご依頼を検討されている方へ向けて、<br class="view_pc-tab">デザインができるまでの流れをご紹介しています。</p>
					</div>
					<div class="box_service__explain">
						<div class="service_inner">
							<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service1.png" alt=""></p>
							<p class="service__name">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
						</div>
						<div class="service_inner">
							<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service2.png" alt=""></p>
							<p class="service__name">テキストテキスト</p>
						</div>
						<div class="service_inner">
							<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service3.png" alt=""></p>
							<p class="service__name">テキストテキストテキストテキスト</p>
						</div>
					</div>
					<div class="pink_btn"><a href="<?php echo LOCATION; ?>case-study/">詳しく見る</a></div>
				</div>
			</div><!-- /.wrp_service -->

			<div class="wrp_contact">
				<div class="con_contact">
					<div class="box_contact__txt">
						<span class="ttl__en">Contact</span>
						<h3 class="ttl__jp"><span class="pink">お問い合わせ</span></h3>
						<p class="txt center">ご依頼はフォームより承っております。<br>
							ご相談は無料で承っておりますので、まずはお気軽にお問い合わせください。</p>
					</div>
					<div class="pink_btn"><a href="<?php echo LOCATION; ?>about/">お問い合わせはこちら</a></div>
				</div>
			</div><!-- /.wrp_contact -->

		</main><!-- /#contents -->
	</div> <!-- #munika_page -->
	<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>


	<!-- *** javascript *** -->
	<script src="<?php echo echo_version(LOCATION_FILE . 'js/homepage.min.js', LOCATION_FILE_DIR); ?>"></script>
</body>

</html>