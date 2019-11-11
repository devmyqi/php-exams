# Exams Tutorial

In diesem Tutorial erfährst Du mehr über das Prüfungs-System _exams?_, welches sich derzeit
noch ganz am Anfang seiner Entwicklung steht.

Klicke unten rechts auf die _Fragen_, dann kannst Du Dich durch dieses Tutorial hangeln. __Viel Spass!__

## Die Idee

Die Idee kam während eine Weiterbildung im Oktober 2019 und wurde auch durch das vorgechlagene
Projekt von Olli angeregt. Kern-Idee war es `Markdown`-Dateien zu parsen und als Daten-Objekte
zur Verfügung zu stellen. Um eine praxisnahe Anwendung zu programmieren nahm ich somit die
Projekt-Idee von Olli auf und fing Ende Oktober mit der Umsetzung an.

Das Daten-Modell spaltet `Markdown`-Dateien in `Kurse`, `Fragen` und `Antworten` auf. In der ersten
Version (der derzeit vorliegenden) werden lediglich die Kurse mit den Fragen und Antworten
angezeigt und es ist noch keine Interaktion des Benutzers oder Besuchers möglich.

## Die Technik

Eindeutiges Allesinstellungsmerkmal dieser Anwendung ist dass die Daten in Markdown-Dateien
abgelegt werden können. So mit sind die Kurse, Fragen und Antworten sehr einfach zu verwalten, zu
ergänzen oder zu ändern. Man braucht lediglich einen Text-Editor und Zugriff auf das Verzeichnis
(falls dieses sich auf einem Webserver befindet).

Da Markdown-Dateien mit Überschriften unterschliedlicher Ordnung hierarschisch gegliedert werden
können, verwendet die Anwendung diese Hierarchie um Kurse, Fragen und Antworten zu generieren.

Übeschriften der Ordnung 1 (`# h1`) werden zu einem Kurs, Die 2. Ordnung (`## h2`) verwandelt sich
in eine Frage und die 3. Ordnung (`### h3`) erzeugt eine Antwort. Die darunter liegenden Texte
werden dem entsprechenden Kurs, der Frage oder der Antwort zugeordnet.

## Funktionen

#### Aktuelle Version (v0.0.1, alpha1)

* Kurse, Fragen und Antworten aus Markdown-Dateien lesen
* Anzeigen der Liste vorhandener Kurse
* Detail-Ansicht eines Kurses mit Informationen
* Durchblättern der einzelnen Fragen eines Kurses

#### Geplante Versionen

* Auswählen der Antworten einer gegebenen Frage
* Übersicht der Fragen und dem Status (beantwortet: ja/nein)

#### Zukünftige Versionen

## Entwicklung

## Noch Fragen?


