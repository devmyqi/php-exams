<?php

/*	meta information
	filename: dev/skins/template.php
	description: templates of default skin for exams
	version: v0.0.2 (dev)
	author: Michael Wronna, Konstanz
	created: 2019-11-13
	modified: 2019-11-13
*/

$templates = [];

// site templates

$templates['siteMissing'] = <<<'EOS'
	<h2>Es ist leider ein Fehler aufgetreten</h2>
	<p>Die von Dir angeforderte Seite konnte leider nicht gefunden werden.
		Du kannst aber ga
	</p>
EOS;

$templates['siteMainMenu'] = <<<'EOS'
	<ul>
		<li><a title="Startseite" href=".">Startseite</a></li>
		<li><a title="Registration" href="?register">Registration</a></li>
		<li><a title="Anmelden" href="?login">Anmelden</a></li>
	</ul>
EOS;

$templates['siteWelcome'] = <<<'EOS'
	<h2>Willkommen</h2>
	<p>... auf der Webseite von <code>exams?</code></p>
EOS;

// user templates

$templates['userRegister'] = <<<'EOS'
	<h2>Hier kannst Du dich kostenlos registrieren</h2>
	<form action="?register" method="post">
		<label for="email">E-Mail-Adresse</label>
		<input type="email" id="email" name="email" value="$email"/><br/>
		<label for="username">Benutzername</label>
		<input type="text" id="username" name="username" value="$username"/><br/>
		<label for="password">Passwort</label>
		<input type="password" id="password" name="password" value="$password"/><br/>
		<label for="confirm">Wiederholen</label>
		<input type="password" id="confirm" name="confirm" value="$confirm"/><br/>
		<input type="submit" value="registrieren"/>
	</form>
EOS;

$templates['userLogin'] = <<<'EOS'
	<h2>Bitte melde Dich an</h2>
	<form action="?login" method="post">
		<label for="email">E-Mail-Adresse</label>
		<input type="email" id="email" name="email" value="$email"/><br/>
		<label for="password">Passwort</label>
		<input type="password" id="password" name="password" value="$password"/><br/>
		<input type="submit" value="anmelden"/>
	</form>
EOS;

// course templates

// question templates

// answer templates

// test templates

$templates['test'] = <<<'EOS'
	<p>this is a paragraph</p>
EOS;
?>
