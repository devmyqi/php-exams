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
	<main>
		<h2>Homepage</h2><ul>
		<?php foreach ( $_SESSION['data']->courses as $course): ; ?>
			<li><h3><?php echo $course->topic; ?>
			</li>
		<?php endforeach; ?></ul>
	</main>
	<footer>Fusszeile</footer>
</body></html>

