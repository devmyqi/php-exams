<?php

/*	meta information
	filename: skins/templates.php
	description: default skins template file
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-10
*/

$templates = [];

// error pages

// site templates

$templates['siteMenuMain'] = <<<'EOS'
	<li><a class="link_home" href="." title="Startseite">Startseite</a></li>
	<li><a class="link_courses" href="?courses"
		title="Kurs-Übersicht">Kurs-Übersicht</a></li>
EOS;

$templates['siteHomepage'] = <<<'EOS'
	<h2>Willkommen auf der Website von <code>exams?</code></h2>
	<p>Hier kannst Du Dich mit Fragen und Antworten eines Kurses auf eine
		Prüfung vorbereiten oder auch einfach nur üben!</p>
	<p>Wenn Du Dich als Benutzer registrierst und dann anmeldest, hast Du
		die Möglichkeit Deine Ergebisse einer Prüfung abzuspeicher und dann
		später einzusehen!</p>
	<p>Diese Webseite und das dahinter liegende System befindet sich noch
		in der Entwicklung und es stehen noch nicht alle Funktionen zur
		Verfügung. Die Weiterentwicklung läuft stetig und Du kannst unten
		in der Fusszeile die derzeitige Version des Systems erkennen.</p>
EOS;

$templates['errorPage'] = <<<'EOS'
	<h2>Es ist leider ein Fehler aufgetreten</h2>
	<p>Die von Dir aufgerufene Seite konnte hier leider nicht gefunden
		werden. Du kannst aber ganz entspannt wieder zur
		<a title="Startseite" href=".">Startseite</a> hüpfen ;-)</p>
EOS;

// user templates

$templates['userMenuAuth'] = <<<'EOS'
	<li><a class="link_register" href="?register" title="Registrieren">Registrieren</a></li>
	<li><a class="link_login" href="?login" title="Anmelden">Anmelden</a></li>
EOS;

$templates['userMenuActive'] = <<<'EOS'
	<li><a class="link_profile" href="?profile" title="Profil">Profil</a></li>
	<li><a class="link_logout" href="?logout" title="Abmelden">Abmelden</a></li>
EOS;

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
	<h2>Melde Dich hier mit Deinen Zugangs-Daten an</h2>
	<form action="?login" method="post">
		<input name="email" type="email" value="$email" placeholder="email@adresse.de"/>
		<input name="password" type="password" value="$password"/>
		<input type="submit" value="anmelden"/>
	</form>
	<p class="message $status">$message</p>
EOS;

$templates['userWelcome'] = <<<'EOS'
	<h2>Willkommen, $username</h2>
	<p>Du hast Dich erfolgreich angemeldet und kannst nun hier loslegen!</p>
EOS;

// course templates

$templates['courseMissing'] = <<<'EOS'
	<h2>Der angeforderte Kurs konnte nicht gefunden werden</h2>
	<p>Der von Dir angeforderte Kurs konnte leider nicht gefunden werden.
		Du kannst Dir die Liste der Kurse nochmal auf der
		<a title="Zur Statseite" href=".">Startseite</a> anschauen.</p>
EOS;

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

$templates['questionMissing'] = <<<'EOS'
	<h2>Die angeforderte Frage konnte nicht gefunden werden</h2>
	<p>Die von Dir angeforderte Frage konnte leider nicht gefunden werden.
		Du kannst Dir die Liste der Kurse nochmal auf der
		<a title="Zur Statseite" href=".">Startseite</a> anschauen.</p>
EOS;

$templates['questionDisplay'] = <<<'EOS'
	<h2>$title</h2>
	$content
EOS;

$templates['questionListItem'] = <<<'EOS'
	<li><a title="Zur Frage" href="?q=$cid.$qid">$title</a></li>
EOS;

// answer templates

$templates['answerDisplay'] = <<<'EOS'
	<h3>$title</h3>
	$content
EOS;

// page templates

// test templates

?>
