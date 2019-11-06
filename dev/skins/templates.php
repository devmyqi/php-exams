<?php

/*	meta information
	filename: skins/templates.php
	description: default skins template file
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-06
*/
$test = 'set';

$templates = [];

// site templates

$templates['errorPage'] = <<<'EOS'
	<h2>Es ist leider ein Fehler aufgetreten</h2>
	<p>Die von Dir aufgerufene Seite konnte hier leider nicht gefunden
		werden. Du kannst aber ganz entspannt wieder zur
		<a title="Startseite" href=".">Startseite</a> hüpfen ;-)</p>
EOS;

// course templates

$templates['coursePreview'] = <<<'EOS'
	<li><h3><a title="zum Kurs" href="?c=$cid">$title</a></h3>
		$preview
	</li>
EOS;

$templates['courseLinks'] = <<<'EOS'
	<p class="courselinks">
		course links
	</p>
EOS;

// question templates

$templates['questionListItem'] = <<<'EOS'
	<li>$title</li>
EOS;

// answer templates

// page templates

// test templates

$templates['one'] = 'template one in templates';

?>
