<?php
$page = 'trade_law';
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

			<div class="wrp_title">
				<div class="con_title">
					<span class="ttl__en">Trade law</span>
					<h2 class="ttl__jp">特定商取引法に基づく表記</h2>
				</div>
			</div><!-- .wrp_title -->

			<div class="wrp_intro">
				<div class="con_intro">
					<div class="box_intro">
						<p class="txt center">下記以外の項目につきましては、お取引の際に請求があれば遅滞なく提供いたします。</p>
					</div>
				</div>
			</div><!-- .wrp_intro -->

			<div class="wrp_law">
				<div class="con_law">
				<table class="tmp_table_respon thin">
						<tbody>
							<tr>
								<th>URL</th>
								<td>https://munika-works.com</td>
							</tr>
							<tr>
								<th>販売価格</th>
								<td>当サイト内の料金ページをご覧ください。</td>
							</tr>
							<tr>
								<th>メールアドレス</th>
								<td>contact@munika-works.com</td>
							</tr>
							<tr>
								<th>販売価格以外に必要な費用</th>
								<td>振込手数料はお客様負担となります。</td>
							</tr>
							<tr>
								<th>代金の支払い方法</th>
								<td>銀行振込<!--、クレジットカード決済--></td>
							</tr>
							<tr>
								<th>代金の支払い時期</th>
								<td>請求書お送り時点から支払い可能です。<br class="view_sp">1週間以内にお支払いください。</td>
							</tr>
							<tr>
								<th>注文方法</th>
								<td>当サイト内のお問い合わせフォームによる注文、及び、メール・SNSによる直接注文</td>
							</tr>
							<tr>
								<th>商品の引き渡し方法</th>
								<td>メールにてデータ納品</td>
							</tr>
							<tr>
								<th>申込有効期限</th>
								<td>納品希望日の1週間以上前にお申し込みください。</td>
							</tr>
							<tr>
								<th>サービスの納品時期</th>
								<td>各サービスのお申込時に相談して決定した納品日時</td>
							</tr>
							<tr>
								<th>キャンセル</th>
								<td>作業着手後のキャンセルの場合、制作時点までの費用をいただきます。</td>
							</tr>
							<tr>
								<th>返品</th>
								<td>サービスの特性上、返品は承っておりません。</td>
							</tr>
							<tr>
								<th>その他</th>
								<td>当サイトはいかなる営利団体・非営利団体とも無関係です。</td>
							</tr>
						</tbody>
					</table>
				</div>


			</div><!-- .wrp_policy -->



		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>