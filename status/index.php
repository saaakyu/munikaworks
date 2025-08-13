<?php
$page = 'status';
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
					<span class="ttl__en">Current status</span>
					<h2 class="ttl__jp">現在の受付状況</h2>
				</div>
			</div><!--.wrp_title-->

			<div class="wrp_intro">
				<div class="con_intro">
					<div class="box_intro">
						<p class="txt center">こちらでは最新の受付状況を発信しています。<br>スケジュールが立て込んだ場合は急遽変更になる場合もありますので、
							<br class="view_pc-tab">ご依頼の際は、本ページをご確認の上お問い合わせください。
						</p>
					</div>
				</div>
			</div><!-- /.wrp_intro -->


			<div class="wrp_status">
				<div class="con_status">
					<div class="update">
						<?php
						echo date("Y.m.d"); 
						echo " 現在";
						?>
					</div>
					<div class="box_status js-scrollable">
						<table class="status_list">
							<thead>
								<tr>
									<th scope="col" class="type"></th>
									<th scope="col" class="type">受付状況</th>
									<th scope="col" class="type">コメント</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>ロゴ制作<span class="small_txt">制作期間:約2週間</span></th>
									<!-- <td class="ic_status blue">×</td> -->
									<!-- <td class="ic_status green">△</td> -->
									<td class="ic_status pink">○</td>
									<!-- <td>受付を一時停止しています</td> -->
									<!-- <td>内容をご相談ください</td> -->
									<td>随時受付中です！</td>
								</tr>
								<tr>
									<th>同人誌デザイン<span class="small_txt">制作期間:約3週間</span></th>
									<td class="ic_status pink">○</td>
									<td>随時受付中です！</td>
								</tr>
								<tr>
									<th>その他<span class="small_txt">制作期間:2週間～</span></th>
									<td class="ic_status dark_gray">ー</td>
									<td><a class="pink" href="<?php echo LOCATION; ?>contact/">お問い合わせ</a>よりご相談ください！</td>
								</tr>

							</tbody>
						</table>
					</div><!-- /.box_status -->
					<div class="center txt"><em>長期のお休みについては、<a href="<?php echo LOCATION; ?>news/">お知らせ</a>もしくは<a href="<?php echo LOCATION_TWITTER; ?>" target="_blank" rel="noopener">X</a>をご確認ください。</em></div>

				</div><!-- /.con_status -->

			</div><!-- /.wrp_status -->


		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>