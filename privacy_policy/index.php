<?php
$page = 'privacy_policy';
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
					<span class="ttl__en">Privacy policy</span>
					<h2 class="ttl__jp">プライバシーポリシー</h2>
				</div>
			</div><!-- .wrp_title -->

			<div class="wrp_intro">
				<div class="con_intro">
					<div class="box_intro">
						<p class="txt center">ムニカワークス（以下「当サービス」と言います。）では、みなさまに安心してご利用いただけるよう<br class="view_pc-tab">個人情報の取り扱いについて、以下のとおりプライバシーポリシー（以下、「本ポリシー」といいます。）を定めます。</p>
					</div>
				</div>
			</div><!-- .wrp_intro -->

			<div class="wrp_policy">
				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; 個人情報の定義</h4>
					<p class="tmp_txt">本ポリシーにおいて、個人情報とは生存する個人に関する情報であって、氏名、生年月日、住所、電話番号、メールアドレス等、特定の個人を識別することができるものをいいます。
					</p>
				</div>

				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; 個人情報の管理</h4>
					<p class="tmp_txt">お客様からお預かりした個人情報は、不正アクセス、紛失、漏えい等が起こらないよう慎重かつ適切に管理します。</p>
				</div><!-- .con_policy -->

				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; 個人情報の利用目的</h4>
					<p class="tmp_txt">当サービスでは、お客様からのお問い合わせやお申し込み等を通じて、メールアドレス等の個人情報をご提供いただく場合があります。<br>その場合は、以下に示す利用目的のために適正に利用するものとします。</p>

					<ul class="box_list">
						<li>・お客様からのお問い合わせに回答するため</li>
						<li>・当サイトを通じたサービスの提供及び紹介のため</li>
						<!-- <li>・サービスの新機能、更新情報、キャンペーン等及び当サービスが提供する他のサービスの案内のメールを送付するため。</li> -->
						<!-- <li>・当サービスが実施するアンケートへのご協力のお願いのため。</li> -->
						<li>・当サービスのサービス向上・改善、新サービスを検討するための分析等を行うため。</li>
						<li>・不正・不当な目的でサービスを利用しようとするユーザーの特定をし、ご利用をお断りするため。</li>
					</ul>
				</div><!-- .con_policy -->

				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; 個人情報の第三者提供</h4>
					<p class="tmp_txt">当サービスは、次に掲げる場合を除いて第三者に個人情報を提供することはありません。<br>ただし、個人情報保護法その他の法令で認められる場合を除きます。</p>
					<ul class="box_list">
						<li>・ご本人の同意がある場合</li>
						<li>・裁判所、検察庁、警察、弁護士会またはこれらに準じた権限を有する機関から法律に基づく正式な照会を受けた場合</li>
					</ul>

					<p class="tmp_txt">前項の定めにかかわらず、次に掲げる場合には当該情報の提供先は第三者に該当しないものとします。</p>
					<ul class="box_list">
						<li>・当サービスに必要な範囲内において個人情報の取り扱いの全部または一部を委託する場合</li>
					</ul>

				</div><!-- .con_policy -->

				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; 著作権について</h4>
					<p class="tmp_txt">当サイトで掲載している文章や画像などにつきましては、無断転載することを禁止します。<br>当サイトは著作権や肖像権の侵害を目的としたものではありません。著作権や肖像権に関して問題がございましたら、お問い合わせフォームよりご連絡ください。</p>
				</div><!-- .con_policy -->

				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; リンクについて</h4>
					<p class="tmp_txt">当サイトは基本的にリンクフリーですので、リンクを行う場合の許可や連絡は不要です。<br>ただし、インラインフレームの使用や画像の直リンクはご遠慮ください。</p>
				</div><!-- .con_policy -->


				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; Cookie（クッキー）について</h4>
					<p class="tmp_txt">Cookie（クッキー）とは、お客様のサイト閲覧履歴を、お客様のコンピュータにデータとして保存しておく仕組みです。</p>
				</div><!-- .con_policy -->

				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; アクセス解析ツールについて</h4>
					<p class="tmp_txt">当サービスでは、ご利用者さまの訪問状況を把握するためGoogleによるアクセス解析ツール「Google Analytics」を利用しています。<br>
						Google Analyticsから提供されるCookieを使用し、収集、記録、分析されたお客様の情報には、個人を特定する情報は一切含まれません。<br>
						また、Google Analyticsの利用により収集されたデータ情報は、Google社のプライバシーポリシーに基づいて管理されています。</p>
					<p class="tmp_txt">Google Analyticsの利用規約・プライバシーポリシーについてはGoogle社のホームページでご確認ください。</p>

					<div class="box_policy">
						<p class="tmp_txt">【Google アナリティクス サービス利用規約】<br>
							<a class="pink" href="https://www.google.com/analytics/terms/jp.html" target="_blank" rel="noopener">https://www.google.com/analytics/terms/jp.html</a>
						</p>

						<p class="tmp_txt">【Google ポリシーと規約】<br>
							<a class="pink" href="https://www.google.com/analytics/terms/jp.html" target="_blank" rel="noopener">https://policies.google.com/privacy</a><br>
							なお、Google Analyticsのサービス利用による損害については、当サービスは責任を負わないものとします。
						</p>
					</div>
				</div><!-- .con_policy -->

				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; 本ポリシーの変更</h4>
					<ul>
						<li>・本ポリシーの内容は、法令その他本ポリシーに別段の定めのある事項を除いて、ユーザーに通知することなく変更することができるものとします。</li>
						<li>・本ポリシーの変更は、変更後の本ポリシーが当サイトに掲載された時点、またはその他の方法により変更後の本ポリシーが閲覧可能となった時点で有効となります。</li>
					</ul>
				</div><!-- .con_policy -->

				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; 個人情報の免責事項</h4>
					<p class="tmp_txt">以下の場合、第三者による個人情報の取得に関し、当サービスは一切の責任を負いません。</p>
					<ul class="box_list">
						<li>・ご本人自らが、第三者が閲覧可能な場で個人情報を明らかにする場合</li>
						<li>・ご本人またはその他の方が入力した情報により本人が特定できてしまった場合</li>
						<li>・当サイトにリンクされている他のWebサイトにおいて、ご本人より個人情報が提供された場合</li>
					</ul>
				</div><!-- .con_policy -->

				<div class="con_policy">
					<h4 class="ttl__jp">&mdash; 個人情報の開示・訂正・削除</h4>
					<p class="tmp_txt">個人情報をお知らせいただきましたお客様は、いつでも当サービスに対して当サービスが有している個人情報をご本人のみに開示、または削除をするように求めることができます。<br>
					開示の結果、個人情報に誤りがある場合は当サービスに対して個人情報の訂正、または削除を要求することができます。<br><br>個人情報の取り扱いに関するお問い合わせは、下記までご連絡ください。<br>
					Mail：<a class="pink" href="mailto:contact@munika-works.com">contact&#64;munika-works.com</a><br><br>
					以上</p>
				</div><!-- .con_policy -->
			</div><!-- .wrp_policy -->



		</main><!-- /#contents -->
		<?php include LOCATION_ROOT_DIR . "/templates/footer.php"; ?>
	</div>
	<!-- #munika_page -->
</body>

</html>