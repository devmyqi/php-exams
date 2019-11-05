<?php
?>
<!DOCTYPE html>
<html lang="de"><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo "$site->name - $site->title"; ?></title>
	<link rel="stylesheet" type="text/css"
		href="<?php echo $site->skindir; ?>/css/dark.css"/>
</head><body>
	<header>
		<h1><?php echo $site->name; ?></h1>
	</header>
	<main>
		<h2><?php echo $site->title; ?></h2>
		<?php echo $site->content; ?>
	</main>
	<footer>
		footer of the default skin
	</footer>
	<pre><?php print_r($config); ?></pre>
</body></html>

