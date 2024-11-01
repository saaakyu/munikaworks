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
						<p class="tmp_txt">料金は個人の方向けの価格です。<br>
							企業様の場合は異なりますので、まずはお問い合わせください。<br>
						※価格はすべて税込です。</p>
					</div>
					<ul class="box_link">
						<li><a href="#link01">ロゴデザイン</a></li>
						<li><a href="#link02">同人誌デザイン</a></li>
						<!-- <li><a href="#link03">サイト制作</a></li> -->
						<li><a href="#link04">お支払い方法</a></li>
					</ul>
				</div>
			</div><!-- /.wrp_intro -->

			<div class="wrp_price" id="link01">
				<h3 class="ttl__jp blue center">ロゴデザイン</h3>
				<!-- <div class="box_price">
					<p class="box_price__txt">タイトルロゴ、イベントロゴ、TRPGロゴなど各種ロゴ制作を承っております。</p>
				</div> -->
				<ul class="con_price">
					<li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION; ?>price/images/img_logo01.jpg" alt="オリジナルロゴ制作" class="corner"></div>
						<div class="box_txt">
						<div class="box_name">
						<div class="box_card__name">オリジナルロゴ制作</div>
						<div class="box_card__price"><span class="small">1点 ￥</span>12,000</div>
						</div>
						<div class="box_card__txt">同人誌、サークルロゴ、Webオンリー、TRPG等にご使用いただけるロゴを制作いたします。<br>
						<span class="small pink">※商用利用の場合は追加料金が発生いたします。</span></div>
						<div class="box_card__txt">【納品物】 カラーデータ / 黒ベタ / 白ベタ / フチ付きデータ（入れ替え可）</div>
						</div>
					</li><!--/.box_card-->

					<!-- <li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION; ?>price/images/img_logo02.jpg" alt="継続使用・商用ロゴ" class="corner"></div>
						<div class="box_card__name">継続使用・商用ロゴ</div>
						<div class="box_card__price"><span class="small">1点￥</span>9,900</div>
						<div class="box_card__txt">名前など、継続して使用するロゴや商用（営利）利用を目的としたロゴです。</div>
					</li> --><!--/.box_card -->
				</ul><!-- /.con_price -->
				<div class="wrp_option">
					<div class="tmp_acc_box">
						<div class="tmp_acc_tit js-accordion">
							<h4 class="tmp_st_s">
								<span class="jp">オプションのご案内</span>
							</h4>
							<span class="ic" aria-hidden="true"></span>
						</div>
						<div class="tmp_acc_target" style="display: block;">
							<div class="target_inner">
								<table class="tmp_table_respon thin">
									<tbody>
										<!-- <tr>
											<th>差分納品</th>
											<td><em>￥2,200</em><br>グレースケール、白/黒ベタ、フチ/影差分などデザインが大幅に変わらない差分データを追加納品します。<br class="view_pc">合計3点まで。</td>
										</tr> -->
										<!-- <tr>
											<th class="bg_pink">期間限定キャンペーン（11/31まで）</th>
											<td>フォロー+作品紹介で￥<em>1,000割引</em><br>詳しくはこちら</td>
										</tr> -->
										<tr>
											<th>商用利用</th>
											<td><em>+￥4,000</em></td>
										</tr>
										<tr>
											<th>文字組み変更</th>
											<td><em>+￥2,000</em><br>アイコンやヘッダーなど縦横比が制限される場合に、用途に合わせて文字の組み方を変更したデータを追加納品します。軽微な差分の場合は料金内で対応可能な場合もございますので一度ご相談くださいませ。<br>※ロゴの形によっては難しい場合がございます。</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div><!--/.wrp_option-->

				<div class="pink_btn"><a href="<?php echo LOCATION; ?>contact/logo_form/">ロゴデザインのご依頼はこちら</a></div>
			</div><!-- /.wrp_price -->


			<div class="wrp_price" id="link02">
				<h3 class="ttl__jp blue center">同人誌デザイン他</h3>
				<!-- <div class="box_price">
					<p class="box_price__txt">漫画や小説など、同人誌の表紙デザインを承っております。</p>
				</div> -->
				<ul class="con_price">

					<li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION; ?>price/images/img_cover01.jpg" alt="表紙イラストあり" class="corner"></div>
						<div class="box_txt">
						<div class="box_card__name">表紙イラストあり</div>
						<div class="box_card__price"><span class="small">1点 <span class="sale">￥12,000</span></span> <br><em class="bg_accent">期間限定</em><span class="pink"><span class="small"> ￥</span>10,000</span></div>
						<div class="box_card__txt">ご提供いただいたイラストに文字やあしらいを入れ、全体のレイアウトをご提案いたします。</div>
						<div class="box_card__txt">【納品物】 入稿用データ/告知用画像</div>
						</div>
					</li><!--/.box_card-->

					<li class="box_card">
						<div class="box_card__img"><img src="<?php echo LOCATION; ?>price/images/img_cover02.jpg" alt="表紙イラストなし" class="corner"></div>
						<div class="box_txt">
						<div class="box_card__name">表紙イラストなし</div>
						<div class="box_card__price"><span class="small">1点 <span class="sale">￥14,000</span></span> <br><em class="bg_accent">期間限定</em><span class="pink"><span class="small"> ￥</span>12,000</span></div>
						<div class="box_card__txt">表紙用イラストのご用意がない場合は、素材から全体のレイアウトをご提案いたします。</div>
						<div class="box_card__txt">【納品物】 入稿用データ/告知用画像</div>
						</div>
						
					</li><!--/.box_card-->
				</ul><!-- /.con_price -->

				<div class="wrp_option">
					<div class="tmp_acc_box">
						<div class="tmp_acc_tit js-accordion">
							<h4 class="tmp_st_s">
								<span class="jp">オプションのご案内</span>
							</h4>
							<span class="ic" aria-hidden="true"></span>
						</div>
						<div class="tmp_acc_target" style="display: block;">
							<div class="target_inner">
								<table class="tmp_table_respon thin">
									<tbody>
										<tr>
											<th>お品書き</th>
											<td><em>+￥3,000～</em><br>スペースナンバー・新刊/既刊など、頒布情報がひと目で分かるお品書きを作成します。</td>
										</tr>
										<tr>
											<th>デザイン流用ポスター</th>
											<td><em>+￥3,000～</em><br>表紙のデザインを流用してポスターを作成します。<br>※ポスターのみの制作の場合は、別途ご相談ください。</td>
										</tr>
										<tr>
											<th>素材イラスト</th>
											<td><em>+￥5,000～</em><br>小物などのイラストでしたらご対応が可能な場合がございます。一度ご相談ください。</td>
										</tr>
										<tr>
											<th>特殊加工データ制作</th>
											<td><em>+￥1,000～</em><br>箔押し他、特殊加工用のデータを制作します。</td>
										</tr>
										<tr>
											<th>ロゴのみ納品</th>
											<td><em>+￥3,000</em><br>ロゴ単体のデータを納品します。表紙以外にもロゴを使用したい場合に。</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="pink_btn"><a href="<?php echo LOCATION; ?>contact/cover_form/">同人誌デザインのご依頼はこちら</a></div>
			</div><!-- /.wrp_price -->

			<script>/*
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
			*/</script>

			<div class="wrp_price" id="link04">
				<h3 class="ttl__jp blue center">お支払い方法</h3>
				<div class="box_price">
					<p class="box_price__txt">お支払い方法は銀行振込となります。<br>
					※振込手数料はお客様のご負担となります。</p>
				</div>
				<!-- <div class="box_info">
					<table class="info_list">
						<tbody>
						<tr>
							<td>キャッシュレス決済/銀行振込<br>
							<p><img src="<?php echo LOCATION; ?>price/images/img_payment01.png" alt="Visa、Mastercard、アメリカンエキスプレス、JCB、ダイナースクラブ、Discover、Google Pay、Apple Pay"></p>
							<p class="small">※振込手数料はお客様のご負担となります。</p></td> 
						</tr>

						</tbody>
					</table>
				</div>--><!-- /.box_info -->
			</div><!-- /.wrp_price -->

			<?php include LOCATION_ROOT_DIR . "/templates/contact.php"; ?>

		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>