<?php session_start();
	// requires
	require_once('config.php');
	require_once('inc/site.php');
	require_once('inc/data.php');
	// config
	$config = new Config();
	$config->logtarget = 'console';
	$_SESSION['config'] = $config;
	// site & data
	$site = new Site(); $data = new Data();
	$_SESSION['courses'] = $data->getCourses();
?>
<!DOCTYPE html>
<html lang="de"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo "$site->name - $site->title"; ?></title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head><body>
	<header>
		<?php echo Site::getHtml($site,'siteHeader'); ?>
	</header>
	<main>
		<?php echo $site->content; ?>
	</main>
	<footer>
		<?php echo Site::getHtml($site,'siteFooter'); ?>
	</footer>
</body></html>

