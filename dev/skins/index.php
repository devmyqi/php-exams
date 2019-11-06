<?php
?>
<!DOCTYPE html>
<html lang="de"><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo "$site->name - $site->title"; ?></title>
	<link rel="stylesheet" type="text/css"
		href="<?php echo $site->skindir; ?>/css/styles.css"/>
</head><body>
	<header>
		<h1><?php echo "$site->name - $site->title"; ?></h1>
		<ul class="mainnav">
			<li><a href="." title="Startseite">Startseite</a></li>
			<li><a href="?login" title="Anmelden">Anmelden</a></li>
			<li><a href="?register" title="Registrieren">Registrieren</a></li>
		</ul>
	</header>
	<main>
		<?php echo $site->content; ?>
	</main>
	<footer>
		footer of the default skin
	</footer>
	<!--
	<pre><?php print_r($site); ?></pre>
	-->
</body></html>

