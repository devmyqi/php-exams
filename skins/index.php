<!DOCTYPE html>
<html lang="de"><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo "$site->name - $site->title"; ?></title>
	<!-- web fonts -->
	<link rel="stylesheet" type="text/css" href="fonts/montserrat.css"/>
	<!-- icon fonts -->
	<link rel="stylesheet" type="text/css" href="fonts/awesome/css/all.css"/>
	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css"
		href="<?php echo $config->skindir; ?>/css/styles.css"/>
</head><body class="<?php echo $site->sid; ?>">
	<header>
		<h1><a title="Startseite" href="."><?php echo $site->name; ?></a>
			<?php echo $site->title; ?></h1>
	</header>
	<nav>
		<?php echo $site->getUserMenu(); ?>
		<?php echo Site::_format($site,'siteMainMenu'); ?>
		<?php echo $site->getExamMenu(); ?>
	</nav>
	<main>
		<?php echo $site->content; ?>
	</main>
	<footer>
		exams? version v0.0.2 (alpha2) November 2019 <?php echo "(sid=$site->sid)"; ?>
	</footer>
	<div>
		<?php echo $site->debug; ?>
	</div>
	<!--
	<pre><?php print_r($site); ?></pre>
	-->
</body></html>

