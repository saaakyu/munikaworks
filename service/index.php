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
						<p class="tmp_txt">創作活動に関するロゴ制作・同人誌表紙デザイン・Web制作などを承っております。<br>
							その他ノベルティデザインなどもご対応可能ですので、お気軽にお問い合わせくださいませ。</p>
					</div>
					<ul class="box_link">
						<li><a href="#link01">ご依頼の流れ</a></li>
						<li><a href="#link02">ロゴデザイン</a></li>
						<li><a href="#link03">同人誌デザイン</a></li>
						<!-- <li><a href="#link04">サイト制作</a></li> -->
					</ul>
				</div>
			</div><!-- /.wrp_intro -->

			<div class="wrp_info" id="link01">
				<div class="ttl">
					<span class="ttl__en">Flow</span>
					<h3 class="ttl__jp">ご依頼の<span class="pink">流れ</span></h3>
				</div>
				<div class="wrp_flow">
					<div class="con_flow">
						<div class="box_flow">
							<div class="box_flow__num"><span class="num">1</span></div>

							<div class="box_flow__desc">
								<h4 class="box_flow__ttl">お問い合わせ<!-- <span class="small"> ダミーテキスト</span> --></h4>
								<p class="box_flow__copy">お問い合わせフォームよりお問い合わせをお送りください。<br>3日以内にメールにて折り返しご連絡させていただきます。</p>
							</div>
						</div>

						<div class="box_flow">
							<div class="box_flow__num"><span class="num">2</span></div>

							<div class="box_flow__desc">
								<h4 class="box_flow__ttl">ヒアリング/お見積もり</h4>
								<p class="box_flow__copy">メールにてご依頼の内容のヒアリングを行います。<br>制作物、大まかな方向性やスケジュールなどがすべて確定した後、お見積書をお送りいたします。<br><span class="small">※納期マストのご依頼は修正対応やクオリティの保証が難しくなるため、期限に余裕を持ってのご相談をお願いいたします。</span></p>
							</div>
						</div>

						<div class="box_flow">
							<div class="box_flow__num"><span class="num">3</span></div>

							<div class="box_flow__desc">
								<h4 class="box_flow__ttl">お支払い</h4>
								<p class="box_flow__copy">お見積もりの金額にご承諾いただけましたら請求書をお送りいたします。<br>お支払いを確認後、作業着手となります。</p>
							</div>
						</div>

						<div class="box_flow">
							<div class="box_flow__num"><span class="num">4</span></div>

							<div class="box_flow__desc">
								<h4 class="box_flow__ttl">制作</h4>
								<p class="box_flow__copy">ヒアリングの内容を元に制作を行います。</p>
							</div>
						</div>

						<div class="box_flow">
							<div class="box_flow__num"><span class="num">5</span></div>

							<div class="box_flow__desc">
								<h4 class="box_flow__ttl">完成・納品</h4>
								<p class="box_flow__copy">ファイル転送サービスなどでデータを納品し、完了となります。<br>お取引完了後、SNSや制作実績に掲載させていただきます。<span class="small">（任意）</span></p>
							</div>
						</div>
					</div><!--/.con_flow-->
				</div><!--/.wrp_flow-->
			</div><!--/.wrp_info-->

			<div class="wrp_service" id="link02">
				<h3 class="ttl__jp blue center">ロゴデザイン</h3>
				<div class="con_service">
					<div class="box_service">
						<div class="box_service__img"><img src="<?php echo LOCATION; ?>service/images/img_logo.png" alt=""></div>
						<p class="box_service__txt">タイトルロゴ、イベントロゴ、TRPGロゴなど各種ロゴ制作を承っております。<br>一度だけの使い切りではない、シンボルマークを含んだデザインやサークル等、<br class="view_pc-tab">グループの顔となるロゴもご対応が可能です。</p>
					</div>
				</div><!-- /.con_service -->

				<div class="wrp_list">
					<div class="con_list">
						<div class="tit_list"><i class="fa-regular fa-circle-check"></i> 主な確認事項</div>
						<div class="box_list">
							<ul class="list col1">
								<li>ロゴの使用用途</li>
								<li>メイン・サブで入れたい文字</li>
								<li>そのタイトル、文字にした理由</li>
								<li>ご希望の納品日</li>
								<li>納品サイズ</li>
								<li>カラーモード</li>
								<li>イラストや素材の準備有無<span class="small">（カラーラフ以上）</span></li>
								<li>デザインの方向性が分かる資料</li>
								<li>制作物の公開の可否</li>
								<li>その他、やりたいことや伝えたい事項</li>
							</ul>
						</div><!-- /.box_list -->
					</div><!-- /.con_list -->

					<div class="con_list_col2">
						<div class="box_list">
							<div class="tit_list"><i class="fa-regular fa-file-zipper"></i> 納品データ</div>
							<p class="tmp_txt">透過PNG、もしくはPSD</p>
						</div>

						<div class="box_list">
							<div class="tit_list"><i class="fa-regular fa-pen-to-square"></i> 修正回数</div>
							<p class="tmp_txt">ラフ・カラー案共に、<span class="pink">大幅修正2回</span>まで</p>
						</div>
					</div><!-- /.con_list -->
				</div><!-- /.wrp_list -->

				<div class="wrp_step">
					<div class="con_ttl">
						<h3 class="ttl__jp center"><i class="fa-solid fa-wrench blue"></i> 作業工程の例</h3>
						<div class="time"><span class="small">制作期間：</span>2週間</div>
					</div>
					<ul class="con_step">
						<li>
							<dl>
								<dt>1.ご要望の確認</dt>
								<dd>使用用途、ロゴの方向性などを詳しくヒアリングします。</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>2.ラフ案提出</dt>
								<dd>形や方向性が問題ないかご確認いただきます。この段階は<span class="pink">白黒でのご提出</span>となります。</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>3.チェック・修正</dt>
								<dd>ラフ案を受け、方向性に齟齬がある場合はデザインの修正を行います。</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>4.カラー案提出</dt>
								<dd>方向性のすり合わせが完了次第カラー案を提出します。</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>5.チェック・修正</dt>
								<dd>カラー案を受け、修正があれば調整します。</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>6.納品</dt>
								<dd>修正案にご納得いただけたらデータを納品し、お取引完了となります。</dd>
							</dl>
						</li>
					</ul>
				</div><!-- /.wrp_step -->
			</div><!-- /.wrp_service -->

			<div class="wrp_service" id="link03">
				<h3 class="ttl__jp blue center">同人誌デザイン</h3>
				<div class="con_service">
					<div class="box_service">
						<div class="box_service__img"><img src="<?php echo LOCATION; ?>service/images/img_cover.png" alt=""></div>
						<p class="box_service__txt">漫画や小説など、同人誌の表紙デザインを承っております。<br>作品の内容を知らない人にも気に留めていただけるようなデザインを心掛けています。</p>
					</div>
				</div><!-- /.con_service -->

				<div class="wrp_list">
					<div class="con_list">
						<div class="tit_list"><i class="fa-regular fa-circle-check"></i> 主な確認事項</div>
						<div class="box_list">
							<ul class="list col2">
								<li>表紙、裏表紙に入れたい文字</li>
								<li>タイトルにした理由、意味</li>
								<li>ご希望の納品日</li>
								<li>印刷所への入稿予定日</li>
								<li>ご利用予定の印刷所</li>
								<li>本の概要<span class="small">（本の種類/仕上がりサイズ/綴じ方向/綴じ方/ページ数/背幅/本文用紙の種類/カラーモード）</span></li>
								<li>元作品名<span class="small">（二次創作のみ）</span></li>
								<li>成人指定の有無</li>
							</ul>
							<ul class="list">
								
								<li>発行する本のジャンル</li>
								<li>お話の雰囲気<span class="small">（5段階）</span></li>
								<li>主な登場人物とキャラクターの関係性</li>
								<li>発行する本の内容<span class="small">（あらすじ）</span></li>
								<li>イラストや素材の準備有無<span class="small">（カラーラフ以上）</span></li>
								<li>ご利用予定の印刷テンプレートや資料</li>
								<li>制作物の公開の可否</li>
								<li>その他、やりたいことや伝えたい事項</li>
							</ul>
						</div>
					</div><!-- /.con_list -->

					<div class="con_list_col2">
						<div class="box_list">
							<div class="tit_list"><i class="fa-regular fa-file-zipper"></i> 納品データ</div>
							<p class="tmp_txt">PSD、SNS投稿用画像一式</p>
						</div>

						<div class="box_list">
							<div class="tit_list"><i class="fa-regular fa-pen-to-square"></i>修正について</div>
							<p class="tmp_txt">デザイン案を1案決定後、デザインに大幅な修正が入った場合は追加料金をいただきます。</p>
						</div>
					</div><!-- /.con_list -->
				</div><!-- /.wrp_list -->

				<div class="wrp_step">
					<div class="con_ttl">
						<h3 class="ttl__jp center"><i class="fa-solid fa-wrench blue"></i> 作業工程の例</h3>
						<div class="time"><span class="small">制作期間：</span>2週間</div>
					</div>
					<ul class="con_step">
						<li>
							<dl>
								<dt>1.ご要望の確認</dt>
								<dd>発行する本の概要、スケジュール、やりたいことなどを詳しくヒアリングします。</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>2.初校提出</dt>
								<dd>ヒアリングの内容を元に制作を行い、提出します。</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>3.チェック・修正</dt>
								<dd>ご依頼者様のやりたいこと・伝えたいこととデザインの方向性が合っているかをご確認いただきます。</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>4.再校提出</dt>
								<dd>内容に齟齬があれば修正し、提出します。</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>5.チェック・修正</dt>
								<dd>再校を受け、修正があれば最終調整します。</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>6.納品</dt>
								<dd>修正案にご納得いただけたらデータを納品し、お取引完了となります。</dd>
							</dl>
						</li>
					</ul>
				</div><!-- /.wrp_step -->
			</div><!-- /.wrp_service -->

			<?php include LOCATION_ROOT_DIR . "/templates/contact.php"; ?>
		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>