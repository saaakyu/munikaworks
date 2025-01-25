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
							<div class="main_ttl__en">Give from to ideas.</div>
						</div>
					</div>
					<div class="scroll">
						<p>scroll</p>
					</div>
				</div>

				<div class="wrp_intro fadeInTrigger">
					<div class="con_intro">
						<div class="box_intro__img">
							<p class="img_intro1"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_intro1.jpg" alt="" class="corner"></p>
						</div>
						<div class="box_intro__txt">
							<span class="ttl__en">About</span>
							<h3 class="ttl__jp">一緒に<span class="pink">わくわく</span>するもの、<br>作りませんか？</h3>
							<p class="tmp_txt">ムニカワークスは、創作活動・エンターテイメントを応援するデザインサービスです。<br>
								コンテンツの魅力をたくさんの方にお伝えするため、ロゴデザインや表紙デザイン、Vtuber様のデザイン周りのご依頼を承っております。</p>
							<div class="pink_btn"><a href="<?php echo LOCATION; ?>about/">ムニカワークスについて</a></div>
						</div>
					</div>
				</div><!-- /.wrp_intro -->

				<div class="wrp_pickup fadeInTrigger">
					<div class="box_service__txt">
						<span class="ttl__en">Pickup</span>
						<h3 class="ttl__jp"><span class="pink">ピックアップ情報</span></h3>
						<p class="tmp_txt">作字発信中！、リピーター割引はじめました</p>
					</div>
				</div><!-- /.wrp_pickup -->

				<div class="wrp_service fadeInTrigger">
					<div class="con_service">
						<div class="box_service__txt">
							<span class="ttl__en">Service</span>
							<h3 class="ttl__jp"><span class="pink">お手伝い</span>できること</h3>
							<p class="tmp_txt">ロゴ・同人誌デザインやStudioを使用したWeb制作をはじめ、<br class="view_pc-tab">デザイン周りのご相談を受け付けております。</p>
						</div>
						<div class="box_service__explain">
							<div class="service_inner">
								<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service1.png" alt=""></p>
								<p class="service__name">タイトル他<br>ロゴデザイン</p>
							</div>
							<div class="service_inner">
								<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service2.png" alt=""></p>
								<p class="service__name">同人誌<br>デザイン</p>
							</div>
							<!-- <div class="service_inner">
								<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service3.png" alt=""></p>
								<p class="service__name">バナー等の<br>告知デザイン</p>
							</div> -->
							<div class="service_inner">
								<p class="service__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_service4.png" alt=""></p>
								<p class="service__name">個人/特設サイト等の<br class="view_pc-tab">Web制作</p>
							</div>
						</div>
						<div class="pink_btn"><a href="<?php echo LOCATION; ?>service/">サービス内容を見る</a></div>
					</div>
				</div><!-- /.wrp_service -->

				<div class="wrp_works fadeInTrigger">
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


				<article class="wrp_news fadeInTrigger">
					<div class="con_news">
						<div class="box_news__txt">
							<span class="ttl__en">News</span>
							<h3 class="ttl__jp"><span class="pink">お知らせ</span></h3>
							<div class="more_btn view_pc-tab"><a href="<?php echo LOCATION; ?>news/">一覧へ <i class="fa-solid fa-chevron-right"></i></a></div>
						</div>
						<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/wordpress/wp-load.php"); ?>
						<?php query_posts('cat=4&posts_per_page=3');  ?>
						<ul class="box_news">
							<?php
							if (have_posts()) :
								while (have_posts()) :
									the_post();
							?>
									<li>
										<p class="date"><?php echo get_the_date('Y/m/d'); ?></p>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_title(); ?>
										</a>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
						<div class="more_btn view_sp"><a href="<?php echo LOCATION; ?>news/">一覧へ <i class="fa-solid fa-chevron-right"></i></a></div>
					</div><!-- /.con_news -->
				</article><!-- /.wrp_news -->


				<script>
					/*
				<article class="wrp_case fadeInTrigger">
					<div class="con_case">
						<div class="box_case__txt">
							<span class="ttl__en">Case study</span>
							<h3 class="ttl__jp"><span class="pink">実例のご紹介</span></h3>
							<p class="txt">ご依頼を検討されている方へ向けて、<br class="view_pc-tab">デザインができるまでの流れをご紹介しています。</p>
						</div>

						<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/wordpress/wp-load.php"); ?>
						<?php query_posts('cat=15&posts_per_page=3');  ?>
						<div class="box_case__explain">

							<?php
							if (have_posts()) :
								while (have_posts()) :
									the_post();
							?>
									<div class="case_inner">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<p class="case__img"><?php echo get_the_post_thumbnail();
																	set_post_thumbnail_size(400); ?></p>
											<p class="case__name"><?php the_title(); ?></p>
										</a>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="pink_btn"><a href="<?php echo LOCATION; ?>case-study/">詳しく見る</a></div>
				</article><!-- /.wrp_case -->*/
				</script>
				<?php include LOCATION_ROOT_DIR . "/templates/contact.php"; ?>

			</main><!-- /#contents -->
			<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
		</div> <!-- #munika_page -->



		<!-- *** javascript *** -->
		<script src="<?php echo echo_version(LOCATION_FILE . 'js/homepage.min.js', LOCATION_FILE_DIR); ?>"></script>
	</body>

	</html>