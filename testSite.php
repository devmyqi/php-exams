<?php
	session_start();
	unset($_SESSION);

	require_once('inc/site.php');

/*
	require_once('config.php');
	require_once('inc/data2.php');
	$config = new Config();
	$config->logtarget = 'console';
	$_SESSION['config'] = $config;
	$_SESSION['data'] = new Data();
	$prefix = $_SERVER['CONTEXT_PREFIX'];
*/

?>
<!DOCTYPE html>
<html lang="de"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exams - site test</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head><body>
	<header>
		<h1>exams?</h1>
		<ul id="navmain">
			<li><a title="Startseite" href=".">Startseite</a></li>
		</ul>
	</header>
	<main>
		<h2>site test</h2>
		<pre><?php echo Site::getHtml(Null,'test'); ?></pre><hr/>
		<pre><?php print_r($_SESSION); ?></pre><hr/>
	</main>
	<footer>Fusszeile</footer>
</body></html>
