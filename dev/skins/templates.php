<?php

/*	meta information
	filename: dev/skins/template.php
	description: templates of default skin for exams
	version: v0.0.2 (dev)
	author: Michael Wronna, Konstanz
	created: 2019-11-13
	modified: 2019-11-17
*/

$templates = [];

// site templates

$templates['siteMissing'] = <<<'EOS'
	<h2>Es ist leider ein Fehler aufgetreten</h2>
	<p>Die von Dir angeforderte Seite konnte leider nicht gefunden werden.
		Du kannst aber ga
	</p>
EOS;

$templates['siteAuthMenu'] = <<<'EOS'
	<ul>
		<li><a title="Registration" href="?register">Registration</a></li>
		<li><a title="Anmelden" href="?login">Anmelden</a></li>
	</ul>
EOS;

$templates['siteUserMenu'] = <<<'EOS'
	<ul>
		<li><a title="Profil" href="?profile">$username</a></li>
		<li><a title="Abmelden" href="?logout">Abmelden</a></li>
	</ul>
EOS;

$templates['siteMainMenu'] = <<<'EOS'
	<ul>
		<li><a title="Startseite" href=".">Startseite</a></li>
		<li><a title="Kurs-Übersicht" href="?courses">Kurs-Übersicht</a></li>
		<li><a title="Kurs-Auswahl" href="?select">Kurs-Auswahl</a></li>
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
	<p class="message $status">$message</p>
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
	<p class="message $status">$message</p>
EOS;

$templates['userProfile'] = <<<'EOS'
	<h2>Dein Profil ($email)</h2>
	<form action="?profile" method="post">
		<label for="username">Benutzername</label>
		<input type="text" id="username" name="username" value="$username"/><br/>
		<label for="current">altes Passwort</label>
		<input type="password" id="current" name="current" value="$current"/><br/>
		<label for="password">neues Passwort</label>
		<input type="password" id="password" name="password" value="$password"/><br/>
		<label for="confirm">Wiederholen</label>
		<input type="password" id="confirm" name="confirm" value="$confirm"/><br/>
		<input type="submit" value="aktualisieren"/>
	</form>
	<p>debug: e=$email, u=$username, p=$password</p>
	<p class="message $status">$message</p>
EOS;

$templates['userLogout'] = <<<'EOS'
	<h2>Du bist nun wieder abgemeldet</h2>
	<p>Du hast Dich erfolgreich abgemeldet</p>
	<hr/><p class="message $status">$message</p>
EOS;

// courses templates

$templates['coursesPreview'] = <<<'EOT'
	<h2>Die Übersicht unserer $count Kurse</h3>
EOT;

$templates['coursesForm'] = <<<'EOS'
	<h2>Wähle die Kurse für die Prüfung</h3>
	<form action="?select" method="post">
EOS;

$templates['coursesSubmit'] = <<<'EOS'
	<br/>
	<input type="submit" value="Prüfung starten"/>
	</form>
EOS;

// course templates

$templates['courseMissing'] = <<<'EOS'
	<h2>Es ist leider ein Fehler aufgetreten</h2>
	<p>Der von Dir angeforderte Kurs konnte leider nicht gefunden werden.
	</p>
EOS;

$templates['coursePreview'] = <<<'EOT'
	<li><a title="Zum Kurs" href="?c=$cid">$title</a></li>
	$preview
EOT;

$templates['courseDetails'] = <<<'EOT'
	<h2>$title</h2>
	$content
EOT;

$templates['courseSelect'] = <<<'EOS'
	<label class="course-select">
		<input type="checkbox" name="courses[]" value="$sid"/>
		$title
	</label><br/>
EOS;

// question templates

$templates['questionListItem'] = <<<'EOS'
	<li><a title="Zur Frage" href="?c=$cid&q=$qid">$title</a></li>
EOS;

$templates['questionForm'] = <<<'EOS'
	<h2>$title</h2>
	$content
	<form action="." method="post">
EOS;

$templates['questionSubmit'] = <<<'EOS'
		<input type="submit" value="weiter"/>
	</form>
EOS;

// answer templates

$templates['answerSelect'] = <<<'EOS'
		<label>
			<input type="checkbox" name="answer"/>
			$title
		</label>
		$content
EOS;

// test templates

$templates['test'] = <<<'EOS'
	<p>this is a paragraph</p>
EOS;

?>
