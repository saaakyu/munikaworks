<?php
$page = 'price';
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
					<span class="ttl__en">Price</span>
					<h2 class="ttl__jp">料金について</h2>
				</div>
			</div><!--.wrp_title-->

			<div class="wrp_intro">
				<div class="con_intro">
					<div class="box_intro">
						<p class="tmp_txt">料金は個人の方（同人）向けの価格です。<br>
							企業様の場合は異なりますので、まずはお問い合わせください。</p>
					</div>
					<ul class="box_link">
						<li><a href="#link01">ロゴデザイン</a></li>
						<li><a href="#link02">表紙デザイン他</a></li>
						<!-- <li><a href="#link03">サイト制作</a></li> -->
						<li><a href="#link04">お支払い方法</a></li>
					</ul>
				</div>
			</div><!-- /.wrp_intro -->

			<div class="wrp_price" id="link01">
				<h3 class="ttl__jp blue center">ロゴデザイン</h3>
				<div class="box_price">
					<p class="box_price__txt">タイトルロゴ、イベントロゴ、TRPGロゴなど各種ロゴ制作を承っております。<br>シンボルマークを含んだデザインもご対応可能です。</p>
				</div>
				<ul class="con_price">

					<li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works04.jpg" alt="" class="corner"></div>
						<div class="box_card__name">使い切りのロゴ</div>
						<div class="box_card__price"><span class="small">1点￥</span>7,700</div>
						<div class="box_card__txt">同人誌やTRPGのタイトルロゴ、イベントロゴなど期間限定や一度使い切りを想定したロゴ。</div>
					</li><!--/.box_card-->

					<li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works04.jpg" alt="" class="corner"></div>
						<div class="box_card__name">継続使用・商用ロゴ</div>
						<div class="box_card__price"><span class="small">1点￥</span>11,000</div>
						<div class="box_card__txt">名前など、継続して使用するロゴや商用（営利）利用を目的としたロゴ。</div>
					</li><!--/.box_card-->

				</ul><!-- /.con_price -->

				<div class="wrp_option">
					<div class="tmp_acc_box">
						<div class="tmp_acc_tit js-accordion is-active">
							<h4 class="tmp_st_s">
								<span class="jp">オプションのご案内</span>
							</h4>
							<span class="ic" aria-hidden="true"></span>
						</div>
						<div class="tmp_acc_target">
							<div class="target_inner">
								<table class="tmp_table_respon thin">
									<tbody>
										<tr>
											<th>差分納品</th>
											<td><em>￥2,200</em><br>グレースケール、白/黒ベタ、フチ/影差分などデザインが大幅に変わらない差分データを追加納品します。<br class="view_pc">合計3点まで。</td>
										</tr>
										<tr>
											<th>文字組み変更</th>
											<td><em>￥3,300</em><br>アイコンやヘッダーなど縦横比が制限される場合に、用途に合わせて文字の組み方を変更したデータを追加納品します。<br class="view_sp">※ロゴの形によっては難しい場合もございます。ご了承ください。</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<style>
						/*
					<div class="con_option">
						<div class="box_option">
							<div class="box_option__name">特殊装丁など...<em class="pink"><span class="small">￥</span>1,000～</em></div>
							<div class="box_option__txt">箔押しなどのデータを制作します。</div>
						</div>
					</div> <!--/.con_option-->

					<div class="con_option">
						<div class="box_option">
							<div class="box_option__name">特殊装丁など...<em class="pink"><span class="small">￥</span>1,000～</em></div>
							<div class="box_option__txt">箔押しなどのデータを制作します。</div>
						</div>
					</div><!--/.con_option-->
					*/
					</style>
				</div><!--/.wrp_option-->


			</div><!-- /.wrp_price -->


			<div class="wrp_price" id="link02">
				<h3 class="ttl__jp blue center">表紙デザイン他</h3>
				<div class="box_price">
					<p class="box_price__txt">タイトルロゴ、イベントロゴ、TRPGロゴなど各種ロゴ制作を承っております。<br>シンボルマークを含んだデザインもご対応可能です。</p>
				</div>
				<ul class="con_price">

					<li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works04.jpg" alt="" class="corner"></div>
						<div class="box_card__name">表紙イラストあり</div>
						<div class="box_card__price"><span class="small">1点￥</span>12,200</div>
					</li><!--/.box_card-->

					<li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works04.jpg" alt="" class="corner"></div>
						<div class="box_card__name">表紙イラストなし</div>
						<div class="box_card__price"><span class="small">1点￥</span>15,500</div>
					</li><!--/.box_card-->
				</ul><!-- /.con_price -->
				<div class="wrp_option">
					<div class="tmp_acc_box">
						<div class="tmp_acc_tit js-accordion is-active">
							<h4 class="tmp_st_s">
								<span class="jp">オプションのご案内</span>
							</h4>
							<span class="ic" aria-hidden="true"></span>
						</div>
						<div class="tmp_acc_target">
							<div class="target_inner">
								<table class="tmp_table_respon thin">
									<tbody>
										<tr>
											<th>お品書き</th>
											<td><em>￥3,300～</em><br>スペースナンバーや新刊情報など、サークルの情報がひと目で分かるお品書きを作成します。</td>
										</tr>
										<tr>
											<th>デザイン流用ポスター</th>
											<td><em>￥2,200～</em><br>表紙のデザインを流用してポスターを作成します。<br>ポスターのみの制作の場合は、別途ご相談ください。</td>
										</tr>
										<tr>
											<th>特殊加工データ制作</th>
											<td><em>￥1,100～</em><br>箔押し他、特殊加工用のデータを制作します。</td>
										</tr>
										<tr>
											<th>ロゴのみ追加納品</th>
											<td><em>￥3,300</em><br>ロゴ単体のデータを納品します。表紙以外にもロゴを使用したい場合に。</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.wrp_price -->

			<style>/*
			<div class="wrp_price" id="link03">
				<h3 class="ttl__jp blue center">サイト制作</h3>
				<div class="box_price">
					<p class="box_price__txt">タイトルロゴ、イベントロゴ、TRPGロゴなど各種ロゴ制作を承っております。<br>シンボルマークを含んだデザインもご対応可能です。</p>
				</div>
				<ul class="con_price">

					<li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works04.jpg" alt="" class="corner"></div>
						<div class="box_card__name">テンプレートデザイン</div>
						<div class="box_card__price"><span class="small">￥</span>33,000<span class="small">/3ぺージまで</span></div>
						<div class="box_card__txt">STUDIOで配布されているテンプレートを使用して制作を行います。<br>※有料テンプレートの場合の料金はお客様のご負担となります。</div>
					</li><!--/.box_card-->

					<li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION_FILE; ?>/images/home/img_works04.jpg" alt="" class="corner"></div>
						<div class="box_card__name">オリジナルデザイン</div>
						<div class="box_card__price"><span class="small">￥</span>55,000<span class="small">/3ぺージまで</span></div>
						<div class="box_card__txt">テンプレートを使用せず、STUDIOで完全オリジナルのWebサイトを制作いたします。<br><span class="pink">※納期要相談</span></div>
					</li><!--/.box_card-->
				</ul><!-- /.con_price -->
			</div><!-- /.wrp_price -->
			/*</style>

			<div class="wrp_price" id="link04">
				<h3 class="ttl__jp blue center">お支払い方法</h3>
				<div class="box_info">
					<table class="info_list">
						<tbody>
							<tr>
								<!-- <th>お支払い方法</th> -->
								<td>銀行振り込みのみ<br>
									<span class="small">※内容が確定次第、メールにて振込先をお送りいたします。（原則先払い）</span>
								</td>

							</tr>

						</tbody>
					</table>
				</div><!-- /.box_info -->
			</div><!-- /.wrp_price -->

			<?php include LOCATION_ROOT_DIR . "/templates/contact.php"; ?>

		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>