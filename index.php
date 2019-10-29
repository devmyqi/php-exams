<?php
	require_once('inc/meta.php');
	require_once('inc/page.php');
	$config = new Config();
	$config->loglevel = 63 - 4;
	$config->logtarget = 'console';
	$config->files = 'data/exams.md';
	$page = new Page($config);
?>
<!DOCTYPE html>
<html lang="de"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page->name, " - ", $page->title; ?></title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head><body>
	<header>
		<h1><?php echo $page->name, " - ", $page->title; ?></h1>
		<ul id="navmain">
			<li><a title="Startseite" href=".">Startseite</a></li>
		</ul>
	</header>
	<main>
		<?php echo $page->content; ?>
	</main>
	<footer><?php echo $page->getFooter(); ?></footer>
</body></html>
