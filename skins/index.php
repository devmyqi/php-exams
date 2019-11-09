<?php
?>
<!DOCTYPE html>
<html lang="de"><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo "$site->name - $site->title"; ?></title>
	<!-- web fonts -->
	<link rel="stylesheet" type="text/css"
		href="<?php echo $site->skindir; ?>/../fonts/montserrat.css"/>
	<!-- icon fonts -->
	<link rel="stylesheet"
		href="<?php echo $site->skindir; ?>/../fonts/awesome/css/all.css"/>
	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css"
		href="<?php echo $site->skindir; ?>/css/styles.css"/>
</head><body>
	<header>
		<h1><a title="Startseite" href="."><?php echo "$site->name</a> $site->title"; ?></h1>
	</header>
	<nav>
		<ul class="menu-user">
			<?php echo $site->getMenuUsers() . "\n"; ?>
		</ul>
		<ul class)"menu-main">
			<?php echo $site->getMenuMain() . "\n"; ?>
		</ul>
	</nav>
	<main>
		<?php echo $site->content; ?>
	</main>
	<footer>
		footer of the default skin <?php echo "(sid=$site->sid)"; ?>
	</footer>
	<!--
	<pre><?php print_r($site); ?></pre>
	-->
</body></html>

