<?php

/*	meta information
	filename: _templates.php
	description: html templates for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-10-31
	modified: 2019-10-31
*/

$templates = [];

// site templates

$templates['siteHeader'] = <<<'EOS'
	<h1>$name</h1><ul id="navmain">
		<li><a title="Startseite" href=".">Startseite</a></li>
	</ul>
EOS;

$templates['siteMissing'] = <<<'EOS'
	<h2>Es ist leider ein Fehler aufgetreten!</h2>
	<p class="warning">Die von Dir angeforderte Seite konnte
		hier gar nicht gefunden werden. Am besten gehst Du
		wieder zurück zur <a title="Zur Startseite"
		href=".">Startseite</a>.
	</p>
EOS;

$templates['siteFooter'] = 'exams (v0.0.2) &copy; $modified (M.Wronna)';

// course templates

$templates['coursePreview'] = <<<'EOS'
	<h3>$topic</h3>
	$preview
	<p class='courselink'><a title='Kurs-Details'
		href='index.php?c=$cid&details'>Details</a> zum Kurs (<a
		title='Kurs starten' href='index.php?c=$cid'>$count Fragen</a>)
	</p>
EOS;

$templates['courseDetails'] = <<<'EOS'
	<h2>$topic</h2>
	$content
EOS;

$templates['courseMissing'] = <<<'EOS'
	<h2>Der angeforderte Kurs ist nicht vorhanden!</h2>
	<p>Auf der <a title="Zur Startseite" href=".">Startseite</a> findest
		Du unsere angebotenen Kurse!</p>
EOS;

// question templates

// answer templates

?>
