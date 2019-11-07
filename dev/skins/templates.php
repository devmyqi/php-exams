<?php

/*	meta information
	filename: skins/templates.php
	description: default skins template file
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-07
*/

$templates = [];

// site templates

$templates['errorPage'] = <<<'EOS'
	<h2>Es ist leider ein Fehler aufgetreten</h2>
	<p>Die von Dir aufgerufene Seite konnte hier leider nicht gefunden
		werden. Du kannst aber ganz entspannt wieder zur
		<a title="Startseite" href=".">Startseite</a> hüpfen ;-)</p>
EOS;

// user templates

$templates['userRegister'] = <<<'EOS'
	<h2>Hier kannst Du Dich kostenlos registrieren</h2>
	<form action="?register" method="post">
		<label for="email">E-Mail-Adresse</label><input type="email" id="email"
			name="email" value="$email"/><br/>
		<label for="username">Benutzername</label><input type="text" id="username"
			name="username" value="$username"/><br/>
		<label for="password">Passwort</label><input type="password" id="password"
			name="password" value="$password"/><br/>
		<label for="confirm">Wiederholen</label><input type="password" id="confirm"
			name="confirm" value="$confirm"/><br/>
		<input type="submit" value="registrieren"/>
	</form>
EOS;

$templates['userRegConfirm'] = <<<'EOS'
	<h2>Danke Dir für die Registration</h2>
	<p>Du bist jetzt hier auf der Seite registriert und kannst Dich mit Deiner E-Mail-Adresse
		und dem gewählten Passwort auf dieser Seite <a title="anmelden" href="?login">anmelden</a>
		und eine Prüfung absolvieren! Viel Spass!</p>
EOS;

$templates['userLogin'] = <<<'EOS'
	<form action="?login" method="post">
		<input name="email" type="email" value="$email" placeholder="email@adresse.de"/>
		<input name="password" type="password" value="$password"/>
		<input type="submit" value="anmelden"/>
	</form>
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

?>