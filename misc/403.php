<?php 
	$page = 'misc_403';
	include realpath(__DIR__.'/../config/include.php');
?>
<meta name="robots" content="nofollow">
<!-- *** stylesheet *** -->
<?php include LOCATION_ROOT_DIR."/templates/common_css.php"; ?>
<!-- *** stylesheet *** -->
<link href="<?php echo echo_version(LOCATION_FILE.'css/misc.css',LOCATION_FILE_DIR);?>" rel="stylesheet" media="all">
<!-- *** javascript *** -->
<?php include LOCATION_ROOT_DIR."/templates/common_js.php"; ?>
</head>

<body id="<?php echo $page; ?>">
<?php include LOCATION_ROOT_DIR."/templates/gtm.php"; ?>
<div id="munika_page">
<?php include LOCATION_ROOT_DIR."/templates/header.php"; ?>
<main id="contents">

	<section class="con_misc">
		<h3>このページはアクセスが制限されております。</h3>
		<p>
			お探しのページはアクセスが制限されております。<br>
			お手数ではございますが、<a href="<?php echo LOCATION;?>">トップページ</a>にて目的のページをお探しください。
		</p>
	</section>
	<!-- /.con_misc -->

	<!-- パンくず -->
	<ul class="topicpath" vocab="https://schema.org/" typeof="BreadcrumbList">
		<li property="itemListElement" typeof="ListItem">
			<a property="item" href="<?php echo LOCATION; ?>" typeof="WebPage">
				<span property="name">Home</span>
			</a>
			<meta property="position" content="1">
		</li>
		<li property="itemListElement" typeof="ListItem">
			<span property="name">このページはアクセスが制限されております。</span>
			<meta property="position" content="2">
		</li>
	</ul>

</main><!-- /#contents -->
<?php include LOCATION_ROOT_DIR."/templates/footer.php"; ?>
</div>
<!-- #munika_page -->
</body>
</html>
