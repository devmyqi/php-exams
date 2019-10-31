<?php session_start();
	require_once('config.php');
	require_once('inc/data2.php');
	$config = new Config();
	$config->logtarget = 'console';
	$_SESSION['config'] = $config;
	$_SESSION['data'] = new Data();
	$prefix = $_SERVER['CONTEXT_PREFIX'];
?>
<!DOCTYPE html>
<html lang="de"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exams - Startseite</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head><body>
	<header>
		<h1>exams?</h1>
		<ul id="navmain">
			<li><a title="Startseite" href=".">Startseite</a></li>
		</ul>
	</header>
	<main><h2>Liste der Kurse</h2><ul>
	<?php
		$url = $_SERVER['PHP_SELF'];
		foreach ( $_SESSION['data']->courses as $course): ; ?>
		<li><h3><?php echo $course->topic; ?></h3>
			<?php echo $course->preview(); ?>
			<p class="courselink">
				<a title="Kurs-Details" href="<?php
					echo "$prefix/courseDetails.php?c=$course->cid"; ?>">Details</a>
				des Kurses (<a title="Kurs starten" href="<?php
					echo "$prefix/questio.php?c=$course->cid"; ?>"><?php
					echo count($course->questions); ?> Fragen</a>)
			</p>
		</li>
	<?php endforeach; ?></ul></main>
	<footer>Fusszeile</footer>
</body></html>

