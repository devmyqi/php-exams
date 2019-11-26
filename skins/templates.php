<?php

/*	meta information
	filename: dev/skins/template.php
	description: templates of default skin for exams
	version: v0.0.2 (dev)
	author: Michael Wronna, Konstanz
	created: 2019-11-13
	modified: 2019-11-21
*/

$templates = [];

// internal templates

$templates['internalError'] = <<<'EOS'
	<h2>Es ist leider ein Fehler aufgetreten</h2>
	<p>Das hat jetzt nichts mit Dir zu tun, irgendwie ist ein interner
		Fehler aufgetreten. tut uns echt sehr leid. Das System befindet
		sich noch in der Entwicklung und wir werden natürlich dafür
		sorgen, dass keine interne Fehler mehr auftreten.</p>
EOS;

// site templates

$templates['siteMissing'] = <<<'EOS'
	<h2>Es ist leider ein Fehler aufgetreten</h2>
	<p>Die von Dir angeforderte Seite konnte leider nicht gefunden werden.
		Du kannst aber ga
	</p>
EOS;

$templates['siteAuthMenu'] = <<<'EOS'
	<ul>
		<li><a class="link_register" title="Registration"
			href="?register">Registration</a></li>
		<li><a class="link_login" title="Anmelden" href="?login">Anmelden</a></li>
	</ul>
EOS;

$templates['siteUserMenu'] = <<<'EOS'
	<ul>
		<li><a class="link_profile" title="Profil" href="?profile">$username</a></li>
		<li><a class="link_logout" title="Abmelden" href="?logout">Abmelden</a></li>
	</ul>
EOS;

$templates['siteMainMenu'] = <<<'EOS'
	<ul>
		<li><a class="link_home" title="Startseite" href=".">Startseite</a></li>
		<li><a class="link_courses" title="Kurs-Übersicht" href="?courses">Kurs-Übersicht</a></li>
	</ul>
EOS;

$templates['siteExamMenu'] = <<<'EOS'
	<ul>
		<li><a class="link_exam" title="Zur Prüfung" href="?exam">Zur Prüfung</a></li>
		<li>$status</li>
		<li><a class="link_reset" title="Zurücksetzen" href="?reset">Zurücksetzen</a></li>
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
	<section class="course-preview">
		<header>
			<ul class="course_actions">
				<li><a class="link_details" title="Kurs-Details" href="?c=$cid">Details</a></li>
				<li><a class="link_start" title="Prüfung starten" href="?start&c=$cid">Start</a></li>
			</ul>
			<h3>$title</h3>
		</header>
		$preview
	</section>
EOT;

$templates['courseDetails'] = <<<'EOT'
	<h2>$title</h2>
	$content
	<p><a title="Prüfung starten" href="?start&c=$cid">Prüfung starten</a></p>
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
	<form action="index.php?cq=$next" method="post">
		<input type="hidden" name="question" value="$cqid"/>
EOS;

$templates['questionSubmit'] = <<<'EOS'
	</form>
EOS;

$templates['questionOverview'] = <<<'EOS'
	<li>
		<a title="Zur Frage" href="?cq=$cqid">
			<input type="checkbox" $id="$cqid" $answered/>
			<label for="$cqid">$title</label>
		</a>
	</li>
EOS;

// answer templates

$templates['answerSelect'] = <<<'EOS'
		<input id="$aid" name="selected[]" type="checkbox" value="$aid" $selected/>
		<label for="$aid" class="answer">$title</label>
		$content
EOS;

// exam templates

$templates['examMenuBegin'] = <<<'EOS'
	<ul class="exam-menu">
		<li><a class="link_next" title="Erste Frage" href="?cq=$next">Erste Frage</a></li>
		<li><a class="link_overview" title="Übersicht" href="?overview">Übersicht</a></li>
		<li><a class="link_reset" title="Zurücksetzen" href="?reset">Zurücksetzen</a></li>
	</ul>
EOS;

$templates['examMenuStart'] = <<<'EOS'
	<ul class="exam-menu">
		<li><a class="link_reset" title="Zurücksetzen" href="?reset">Zurücksetzen</a></li>
	</ul>
EOS;

$templates['examMenuFirst'] = <<<'EOS'
	<ul class="exam-menu">
		<li><a class="link_overview" title="Übersicht" href="?overview">Frage $index von $total</a></li>
		<li><a class="link_next" title="Weiter" href="?cq=$next">Weiter</a></li>
		<li><a class="link_reset" title="Zurücksetzen" href="?reset">Zurücksetzen</a></li>
	</ul>
EOS;

$templates['examMenuNext'] = <<<'EOS'
	<ul class="exam-menu">
		<li><a class="link_prev" title="Zurück" href="?cq=$previous">Zurück</a></li>
		<li><a class="link_overview" title="Übersicht" href="?overview">Frage $index von $total</a></li>
		<li><a class="link_next" title="Weiter" href="?cq=$next">Weiter</a></li>
		<li><a class="link_reset" title="Zurücksetzen" href="?reset">Zurücksetzen</a></li>
	</ul>
EOS;

$templates['examMenuLast'] = <<<'EOS'
	<ul class="exam-menu">
		<li><a class="link_prev" title="Zurück" href="?cq=$previous">Zurück</a></li>
		<li><a class="link_overview" title="Übersicht" href="?overview">Frage $index von $total</a></li>
		<li><a class="link_reset" title="Zurücksetzen" href="?reset">Zurücksetzen</a></li>
	</ul>
EOS;

$templates['examNavigFirst'] = <<<'EOS'
		<button type="submit" formaction="?overview">Frage $index von $total</button>
		<button type="submit" formaction="?cq=$next">Weiter</button>
EOS;

$templates['examNavigNext'] = <<<'EOS'
		<button type="submit" formaction="?cq=$previous">Zurück</button>
		<button type="submit" formaction="?overview">Frage $index von $total</button>
		<button type="submit" formaction="?cq=$next">Weiter</button>
EOS;

$templates['examNavigLast'] = <<<'EOS'
		<button type="submit" formaction="?cq=$previous">Zurück</button>
		<button type="submit" formaction="?overview">Frage $index von $total</button>
		<button type="submit" formaction="?overview">Zur Übersicht</button>
EOS;

$templates['examSplash'] = <<<'EOS'
	<h2>Start der Prüfung mit $total Fragen</h2>
	<p>Kurse: $courseCount</p>
	<p>Fragen: $total</p>
EOS;

$templates['examReset'] = <<<'EOS'
	<h2>Deine Prüfung wurde zurückgesetzt</h2>
	<p>Du kannst ja wieder eine neue Prüfung starten</p>
EOS;

$templates['examResultLink'] = <<<'EOS'
	<p><a title="zum Ergebnis" href="?result">Ergebnis</a></p>
	<button type="submit" formaction="?result">Ergebnis</button>
EOS;

$templates['examResultSummary'] = <<<'EOS'
	<h2>Ergebnis</h2>
	<table>
		<tr><th>Anzahl Fragen gesamt</th><td>$total</td></tr>
		<tr><th>Anzahl beantworterter Fragen</th><td>$answered</td></tr>
		<tr><th>Anzahl unbeantworterter Fragen</th><td>$open</td></tr>
		<tr><th>Anzahl richtig beantworteter Fragen</th><td>$correct</td</tr>
		<tr><th>Anzahl falsch beantworteter Fragen</th><td>$wrong</td></tr>
		<tr><th>Quote richtig beantworteter Fragen</th><td>$quote</td></tr>
	</table>
EOS;

// test templates

$templates['test'] = <<<'EOS'
	<p>this is a paragraph</p>
EOS;

?>
