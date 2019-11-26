# Import von Olli's Fragen

## q001: SQL ORDER

Wie wird nach dem Feld `name` aufsteigend sortiert?

### ORDER BY name UP

### ORDER BY name DESC

### ORDER BY name ASC!

### ORDER BY name!

## q002: SQL SELECT

Welches SQL-Kommando löst folgende Aufgabenstellung:

"Zeige alle Personalnummern aus der Tabelle `Personal`,
die zu den Kategorien `M`, `B` oder `P` gehören"?

### SELECT Kategorie FROM Personal WHERE Kategorie IN ('M', 'B', 'P')

### SELECT Kategorie FROM Personal WHERE Pers_Nr IN ('M', 'B', 'P')

### SELECT Pers_Nr FROM Personal WHERE Kategorie IN ('M', 'B', 'P')!

### SELECT * FROM Personal WHERE Kategorie IN ('M', 'B', 'P')

## q003: SQL Datensätze

Zum Einfügen neuer Datensätze in eine Tabelle wird folgender Befehl benutzt.

### ALTER TABLE ...

### CREATE ...

### INSERT INTO ...!

### ADD TO ...

### UPDATE ...

## q004: SQL Auswahl

Der SQL-Befehl, um alle Zeilen und Spalten einer Tabelle (Name: Personal) auszugeben lautet:

### SELECT FROM Personal, *

### SELECT * FROM Personal WHERE ALL

### SELECT * FROM Personal!

### SELECT ALL FROM Personal

## q005: SQL Relationen

Gegeben ist die Tabelle `Handy` mit der Attributmenge `{RufNr, Modell, Hersteller}`
und die Tabelle `Kunde` mit der Attributmenge `{KundenNr, Name, Vorname, MobilNr, FestnetzNr}`.

Geben Sie die Namen aller Kunden aus, die ein Nokia-Handy besitzen.

### Antwort 1

`SELECT Kunde.Name FROM Kunde, Handy WHERE Handy.Hersteller='Nokia' AND 'Foreign Key'='true'`

### Antwort 2

`SELECT Kunde.Name FROM Handy, Kunde WHERE Kunde=Handy(FK) AND Kunde.Hersteller='Nokia'`

### Antwort 3

`SELECT Kunde.Name FROM Handy, Kunde WHERE Kunde.FestnetzNr=Handy.RufNr AND Handy.Hersteller='Nokia'`

### Antwort 4!

`SELECT Kunde.Name FROM Handy, Kunde WHERE Kunde.MobilNr=Handy.RufNr AND Handy.Hersteller='Nokia'`

### Antwort 5

`SELECT Kunde.Name FROM Handy AND Kunde WHERE Handy.RufNr=Kunde.MobilNr, Handy.Hersteller='Nokia'`

## q006: Entity-Relationship

Welche Typen von Beziehungen werden beim Entity-Relationship-Model unterschieden?

### 1:n!

### 0:1

### 1:1!

### 0:0

### n:m!

# Fragen überarbeiten

## Der SQL-Befehl zum Erstellen der Tabelle Personal lautet?

Der SQL-Befehl zum Erstellen der Tabelle Personal lautet?

### ADD TABLE Personal

### CREATE TABLE Personal!

### CREATE Personal

### MAKE TABLE Personal

## Mit welchem Schlüsselwort werden in einer SQL-Abfrage Zeilen ausgewählt?

Mit welchem Schlüsselwort werden in einer SQL-Abfrage Zeilen ausgewählt?

### HAVING

### IN

### WHERE!

### JOIN

## Welcher der folgenden Funktionen liefern die Anzahl der Array-Elemente?

Welcher der folgenden Funktionen liefern die Anzahl der Array-Elemente?

### number();

### range();

### max();

### count();!

## Aggregatfiunktionen wie z.B. COUNT, SUM und MAX ...

Aggregatfiunktionen wie z.B. COUNT, SUM und MAX ...

### liefern immer genau zwei Tabellen zurück.

### dürfen nur in der SELECT-Klausel verwendet werden.!

### liefern lediglich einen einzigen Wert zurück.!

### können sowohl in der SELECT- als auch in der WHERE-Klausel stehen.

## Mit welchem Schlüsselwort werden in einer SQL-Abfrage Spalten ausgewählt?

Mit welchem Schlüsselwort werden in einer SQL-Abfrage Spalten ausgewählt?

### SELECT!

### ORDER BY

### WHERE

### ALTER

## Unter einem Attribut (Datenfeld) im Zusammenhang mit einer Datenbank versteht man...

Unter einem Attribut (Datenfeld) im Zusammenhang mit einer Datenbank versteht man...

### eine Tabelle

### eine Zeile einer Tabelle.

### eine Relation.

### eine Spalte einer Tabelle.!

## Datenbankdesign nur genau 1 richtige Lösung für Liste von Anforderungen (Pflichtenheft)?

Datenbankdesign nur genau 1 richtige Lösung für Liste von Anforderungen (Pflichtenheft)?

### richtig

### falsch!

## Was bewirkt das Schlüsselwort DISTINCT bei einer SQL SELECT-Abfrage?

Was bewirkt das Schlüsselwort DISTINCT bei einer SQL SELECT-Abfrage?

### Verhindert, dass Duplikate ausgegeben werden!

### Fasst mehrere Felder zusammen

### Nichts, da DISTINCT in SELECT-Statements nicht verwendet werden darf

### Doppelte Datensätze werden gruppiert

## SQL-Abfrage: zeige alle Titel aus der Tabelle Buecher, die zu den Kategorien 'Humor', 'Hor ...

SQL-Abfrage: zeige alle Titel aus der Tabelle Buecher, die zu den Kategorien 'Humor', 'Horror' oder 'Heimat' gehören.

### SELECT Titel FROM Buecher HAVING Kategorie ('Humor', 'Horror', 'Heimat')

### SELECT Titel FROM Kategorie ('Humor', 'Horror', 'Heimat') IN Buecher)

### SELECT Titel FROM Buecher WHERE Kategorie IN ('Humor', 'Horror', 'Heimat')!

### SELECT * FROM Buecher WHERE Kategorie IN ('Humor', 'Horror', 'Heimat')

## Die SQL-Zeichenfolgerfunktion UPPER bewirkt, dass ...

Die SQL-Zeichenfolgerfunktion UPPER bewirkt, dass ...

### mehrere Strings aneinandergehängt werden können.

### alle Großbuchstaben in Kleinbuchstaben umgewandelt werden.

### alle Kleinbuchstaben in Großbuchstaben umgewandelt werden.!

### führende Leerzeichen entfernt werden.

## Welches Schlüsselwort wird verwendet, damit Datensätze nach einem Kriterium aufsteigend  ...

Welches Schlüsselwort wird verwendet, damit Datensätze nach einem Kriterium aufsteigend sortiert werden?

### LOWER

### ASC!

### DESC

### UPPER

## Der SQL-Befehl, um alle Titel der Tabelle Buecher mit Erscheinungsjahr nach 1999 auszugebe ...

Der SQL-Befehl, um alle Titel der Tabelle Buecher mit Erscheinungsjahr nach 1999 auszugeben lautet:

### SELECT Titel FROM Buecher IN Erscheinungsjahr > 1999

### SELECT Titel FROM Buecher WHERE Erscheinungsjahr > 1999!

### SELECT Titel FROM Buecher FOR Erscheinungsjahr > 1999

### SELECT * FROM Buecher WHERE Erscheinungsjahr > 1999

## Mit welchem Schlüsselwort werden in einer SQL-Abfrage Ergebnisse sortiert?

Mit welchem Schlüsselwort werden in einer SQL-Abfrage Ergebnisse sortiert?

### INTERSECT

### AVG

### ORDER BY!

### COUNT

## Welche der folgenden Mengen sind gleich?

Welche der folgenden Mengen sind gleich?

### film = { titel, spieldauer }

### film = { titel, erscheinungsdatum, spieldauer }!

### film = { spieldauer, erscheinungsdatum, titel }!

### film = { titel, erscheinungsdatum }

## Womit ändern Sie Datensätze einer Datenbank?

Womit ändern Sie Datensätze einer Datenbank?

### EDIT

### UPDATE!

### MODIFY

### INSERT INTO

## Welches Model beschreibt die Anforderungen einer Anwendung aus Kundensicht und zeigt zum B ...

Welches Model beschreibt die Anforderungen einer Anwendung aus Kundensicht und zeigt zum Beispiel noch keine SQL Datentypen?

### Netzwerkmodell

### Chemische Modell

### Domain Modell!

### Relationale Modell

### Physische Modell

## Welcher MySQL Datentyp eignet sich am besten zum speichern von Hausnummern?

Welcher MySQL Datentyp eignet sich am besten zum speichern von Hausnummern?

### DATE

### VARCHAR!

### CHAR

### DECIMAL

### FLOAT

### TEXT

### INTEGER

## Welche der folgenden Modelle sind Datenbankmodelle?

Welche der folgenden Modelle sind Datenbankmodelle?

### Atommodell

### Hierarisches Modell!

### Chemisches Modell

### Netzwerkmodell

### Relationales Modell!

### Physikalisches Modell

### Agiles Modell

## Womit lassen sich Domänenmodelle erstellen?

Womit lassen sich Domänenmodelle erstellen?

### SVIV

### ERD!

### UML!

### MVC

## Mit welchem Schlüsselwort kennzeichnen Sie in MySQL eine Spalte als Alternativschlüssel?

Mit welchem Schlüsselwort kennzeichnen Sie in MySQL eine Spalte als Alternativschlüssel?

### UNIQUE KEY!

### FOREIGN KEY

### KEY

### PRIMARAY KEY

### ALTERNATE KEY

## Welche der folgenden SQL Anweisung ist nicht Teil der DDL?

Welche der folgenden SQL Anweisung ist nicht Teil der DDL?

### DROP TABLE

### INSERT INTO!

### CREATE DATABASE

### CREATE TABLE

## Welche der folgenden Relationen (in Mengenschreibweise) sind ungültig?

Welche der folgenden Relationen (in Mengenschreibweise) sind ungültig?

### kunde = {kunden_nr, telefon, name, telefon}!

### person = {vorname, name, geburtsdatum, telefon, handy}

### seminar = {id, title}

### benutzer = {name, vorname, email, email}!

## Zum Entwickeln einer Datenbank benötigen Sie zumindest ...

Zum Entwickeln einer Datenbank benötigen Sie zumindest ...

### einen Datenbank Client!

### eine komfortable IDE

### einen Browser

### ein DBMS!

## Welcher Datentyp ist am besten zum speichern von Telefonnummern (z. B. 07585555) geeignet?

Welcher Datentyp ist am besten zum speichern von Telefonnummern (z. B. 07585555) geeignet?

### Integer

### Decimal

### Text

### Number

### Varchar!

## Aus welchen 3 Aspekten besteht das relationale Modell?

Aus welchen 3 Aspekten besteht das relationale Modell?

### Manipulation!

### SQL

### Integrität!

### Struktur!

## Was bedeutet BDUF?

Was bedeutet BDUF?

### Bad Designed User Front

### Bald Designers Use Fades

### Bad Design Uppon Front

### Big Design Up Front!

## Zum ändern von Datensätzen wird folgender SQL Befehl benutzt ...

Zum ändern von Datensätzen wird folgender SQL Befehl benutzt ...

### MODIFY

### INSERT INTO

### EDIT

### UPDATE!

## Welche der folgenden Aussagen ist richtig?

Welche der folgenden Aussagen ist richtig?

### Die Reihenfolge der Attribute in einer Relation spielt keine Rolle.!

### Es darf in einer Relation keine 2 verschiedene Attribute mit gleichem Namen geben.!

### Die Reihenfolge der Tupel in einer Relation spielt keine Rolle.!

### Die Tupel in einer Relation werden anhand ihres Primärschlüssels geordnet.

### Relationen enthalten oft doppelte Zeilen.

## Welches Modell beschreibt die Anforderung einer Anwendung aus Kundensicht und zeigt z. B.  ...

Welches Modell beschreibt die Anforderung einer Anwendung aus Kundensicht und zeigt z. B. noch keine SQL Datentypen?

### das physische Modell.

### das relationale Modell.

### das Netzwerkmodell.

### das chemische Modell.

### das Domänenmodell.!

## Was ist der korrekte Datentyp in MySQL zur Speicherung eines korrekten Zeitpunktes?

Was ist der korrekte Datentyp in MySQL zur Speicherung eines korrekten Zeitpunktes?

### date

### datetime!

### int

### double

### string

## Korrekter BNF-Ausdruck für A[B|C]D?

Korrekter BNF-Ausdruck für A[B|C]D?

### ABCD

### ACDD

### ACCD

### ADB

### ACBD

### ACD!

### AAD

### ABD!

## Korrekte Ausprägung des BNF-Ausdrucks zahl + zahl = summe?

Korrekte Ausprägung des BNF-Ausdrucks zahl + zahl = summe?

### 9 + 4 = 8!

### 5 + 6 = 11!

### 1105 + 6

### + 56 = 11

### 5 + 6 = 12!

## Wie lösche ich in der Tabelle user die Spalte email

Wie lösche ich in der Tabelle user die Spalte email

### ALTER TABLE user DELETE email

### ALTER TABLE user DROP email!

### DELETE email FROM user

### DROP email FROM user

### MODIFY TABLE user DELETE email

## Welche 3 Teile der Klasse gehören zum Klassendiagramm?

Welche 3 Teile der Klasse gehören zum Klassendiagramm?

### Name der Klasse!

### Datensatz

### Attribute!

### SQL

### Methode!

### Beziehungen

## Wie definiert man im SQL einen Alternativschlüssel?

Wie definiert man im SQL einen Alternativschlüssel?

### PRIMARY KEY

### FOREIGN KEY

### KEY

### UNIQUE KEY!

### ALTERNATE KEY

## Wählen Sie für die folgenden Werte einen geigneten Datentyp: 5, 6.3, 7, 8

Wählen Sie für die folgenden Werte einen geigneten Datentyp: 5, 6.3, 7, 8

### VARCHAR

### DATE

### DECIMAL!

### INTEGER

### TEXT

## Gegeben ist die Tabelle handies mit der Atributmenge {ruf_nr, modell, hersteller} und die  ...

Gegeben ist die Tabelle handies mit der Atributmenge {ruf_nr, modell, hersteller} und die Tabelle kunden mit der Attributmenge {kunden_nr, name, vorname, mobil_nr, festnetz_nr}.\nGeben Sie die Namen aller Kunden aus, die ein Nokia-Handy besitzen.

### SELECT kunden.name FROM handies JOIN kunden ON kunden.mobil_nr=handies.ruf_nr WHERE handie ...!

SELECT kunden.name FROM handies JOIN kunden ON kunden.mobil_nr=handies.ruf_nr WHERE handies.hersteller='Nokia

### SELECT kunden.nameWHERE handies JOIN kunden ON kunden.festnetz_nr=handies.ruf_nr AND handi ...

SELECT kunden.nameWHERE handies JOIN kunden ON kunden.festnetz_nr=handies.ruf_nr AND handies.hersteller='Nokia

### SELECT kunden.name FROM handies JOIN kunden ON kunden.festnetz_nr=handies.ruf_nr WHERE han ...

SELECT kunden.name FROM handies JOIN kunden ON kunden.festnetz_nr=handies.ruf_nr WHERE handies.hersteller='Nokia

### SELECT kunden.name WHERE handies JOIN kunden ON kunden.mobil_nr=handies.ruf_nr FROM handie ...

SELECT kunden.name WHERE handies JOIN kunden ON kunden.mobil_nr=handies.ruf_nr FROM handies.hersteller='Nokia

## Fügen Sie die Spalte preis mit dem Datentyp DECIMAL(6, 2) zur Tabelle products hinzu.

Fügen Sie die Spalte preis mit dem Datentyp DECIMAL(6, 2) zur Tabelle products hinzu.

### ALTER products ADD preis DECIMAL(6,2);

### ADD preis DECIMAL(6,2) TO TABLE products;

### ALTER TABLE products ADD preis DECIMAL(6,2);!

### CANGE products ADD preis DECIMAL(6,2);

### ADD DECIMAL(6,2) preis TO products;

### CHANGE TABLE products ADD preis DECIMAL(6,2);

## Gegeben ist folgender BNF-Ausdruck:\n<pre>X[Y|Z][X]</pre>

Gegeben ist folgender BNF-Ausdruck:\n<pre>X[Y|Z][X]</pre>

### YXY

### XXX

### XY!

### XZX!

### X!

### ZX

### XX!

## Eine Relation besteht aus

Eine Relation besteht aus

### einem Heading und einem Body!

### einem Datenbankschema

### UML-Klassen

### SQL-Anweisung

## Wählen Sie für die folgenden Werte einem geeigneten MySQL-Datentyp: 'Java', 'Ruby', 'PHP ...

Wählen Sie für die folgenden Werte einem geeigneten MySQL-Datentyp: 'Java', 'Ruby', 'PHP'.

### PROGRAMMING_LANGUAGE

### TEXT

### DECIMAL

### VARCHAR!

## Sie möchten in einer SELECT-Anweisung nach dem Preis (Attribut: 'preis') sortieren. Dabei ...

Sie möchten in einer SELECT-Anweisung nach dem Preis (Attribut: 'preis') sortieren. Dabei soll der niedrigste Preis zuerst angezeigt werden und der höchste zuletzt.\nWelches der folgenden Fragmente können Sie in Ihrer SQL-Anweisung verwenden, um die gewünschte Ergebnistabelle zu erhalten?

### ORDER BY preis UPPER

### ORDER BY preis DESC

### ORDER BY preis ASC!

### ORDER BY preis LOWER

## Gegeben ist folgende Datenbanktabelle (durch SHOW COLUMNS FROM grafikkarte):\n('Tabelle ei ...

Gegeben ist folgende Datenbanktabelle (durch SHOW COLUMNS FROM grafikkarte):\n('Tabelle einfügen')\nMit welcher SQL-Anweisung wird sie angelegt?

### CREATE TABLE grafikkarten (id INTEGER UNIQUE KEY AUTO_INCREMENT, modell VARCHAR(30) NOT NU ...

CREATE TABLE grafikkarten (id INTEGER UNIQUE KEY AUTO_INCREMENT, modell VARCHAR(30) NOT NULL UNIQUE, hersteller VARCHAR(30) NOT NULL, artikel_nummer INTEGER UNIQUE KEY, preis DECIMAL(5,2));

### CREATE TABLE grafikkarten (id INTEGER PRIMARY KEY AUTO_INCREMENT, modell VARCHAR(30) NOT N ...!

CREATE TABLE grafikkarten (id INTEGER PRIMARY KEY AUTO_INCREMENT, modell VARCHAR(30) NOT NULL, hersteller VARCHAR(30) NOT NULL, artikel_nummer INTEGER UNIQUE KEY, preis DECIMAL(5,2));

### CREATE TABLE grafikkarten (id INTEGER UNIQUE KEY AUTO_INCREMENT, modell VARCHAR(30) NOT NU ...

CREATE TABLE grafikkarten (id INTEGER UNIQUE KEY AUTO_INCREMENT, modell VARCHAR(30) NOT NULL, hersteller VARCHAR(30) NOT NULL, artikel_nummer INTEGER PRIMARY KEY, preis DECIMAL(5,2));

### CREATE TABLE grafikkarten (id INTEGER PRIMARY KEY AUTO_INCREMENT, modell VARCHAR(30) NOT N ...

CREATE TABLE grafikkarten (id INTEGER PRIMARY KEY AUTO_INCREMENT, modell VARCHAR(30) NOT NULL, hersteller TEXT NOT NULL, artikel_nummer INTEGER UNIQUE KEY, preis DECIMAL (5,2));

### CREATE TABLE grafikkarten (id INTEGER UNIQUE KEY AUTO_INCREMENT, modell VARCHAR(30) NULL,  ...

CREATE TABLE grafikkarten (id INTEGER UNIQUE KEY AUTO_INCREMENT, modell VARCHAR(30) NULL, hersteller VARCHAR (30) NOT NULL, artikel_nummer INTEGER UNIQUE KEY, preis DECIMAL(5,2));

### CREATE TABLE grafikkarten (id INTEGER UNIQUE KEY AUTO_INCREMENT, modell VARCHAR(30) NOT NU ...

CREATE TABLE grafikkarten (id INTEGER UNIQUE KEY AUTO_INCREMENT, modell VARCHAR(30) NOT NULL, hersteller VARCHAR(30) NOT NULL, artikel_nummer INTEGER UNIQUE KEY, preis DECIMAL(5,2));

### CREATE TABLE grafikkarten (id INTEGER PRIMARY KEY AUTO_INCREMENT, modell VARCHAR(30) NOT N ...

CREATE TABLE grafikkarten (id INTEGER PRIMARY KEY AUTO_INCREMENT, modell VARCHAR(30) NOT NULL, hersteller TEXT NOT NULL, artikel_nummer INTEGER UNIQUE KEY, preis DECIMAL (5,2));

### CREATE TABLE grafikkarten (id INTEGER AUTO_INCREMENT, modell VARCHAR(30) NOT NULL, herstel ...

CREATE TABLE grafikkarten (id INTEGER AUTO_INCREMENT, modell VARCHAR(30) NOT NULL, hersteller VARCHAR(30) NOT NULL, artikel_nummer INTEGER UNIQUE KEY, preis DECIMAL(5,2));

## Welche der folgenden Begriffe eignen sich als Entities?

Welche der folgenden Begriffe eignen sich als Entities?

### Buch!

### Warenkorb!

### Auto!

### Ausbilden

### Lesen

## Welche der folgenden Aussagen gelten für das Relationale DB-Modell?

Welche der folgenden Aussagen gelten für das Relationale DB-Modell?

### Ein Attribut entspricht in etwa einer Spalte.\n  Ein Tupel entspricht in etwa einer Tabell ...

Ein Attribut entspricht in etwa einer Spalte.\n  Ein Tupel entspricht in etwa einer Tabelle.\n  Eine Relation entspricht in etwa einer Zeile.

### Ein Attribut entspricht in etwa einer Tabelle.\n  Ein Tupel entspricht in etwa einer Spalt ...

Ein Attribut entspricht in etwa einer Tabelle.\n  Ein Tupel entspricht in etwa einer Spalte.\n  Eine Relation entspricht in etwa einer Zeile.

### Ein Attribut entspricht in etwa einer Zeile.\n  Ein Tupel entspricht in etwa einer Tabelle ...

Ein Attribut entspricht in etwa einer Zeile.\n  Ein Tupel entspricht in etwa einer Tabelle.\n  Eine Relation entspricht in etwa einer Spalte.

### Ein Attribut entspricht in etwa einer Zeile.\n  Ein Tupel entspricht in etwa einer Spalte. ...

Ein Attribut entspricht in etwa einer Zeile.\n  Ein Tupel entspricht in etwa einer Spalte.\n  Eine Relation entspricht in etwa einer Tabelle.

### Ein Attribut entspricht in etwa einer Tabelle.\n  Ein Tupel entspricht in etwa einer Zeile ...

Ein Attribut entspricht in etwa einer Tabelle.\n  Ein Tupel entspricht in etwa einer Zeile.\n  Eine Relation entspricht in etwa einer Spalte.

### Ein Attribut entspricht in etwa einer Spalte.\n  Ein Tupel entspricht in etwa einer Zeile. ...!

Ein Attribut entspricht in etwa einer Spalte.\n  Ein Tupel entspricht in etwa einer Zeile.\n  Eine Relation entspricht in etwa einer Tabelle.

## Welche der folgenden SQL-Anweisungen ist nicht Teil der DDL?

Welche der folgenden SQL-Anweisungen ist nicht Teil der DDL?

### DROP TABLE

### CREATE DATABASE

### INSERT INTO!

### CREATE TABLE

## Zum Einfügen neuer Datensätze in eine Tabelle wird folgnder SQL-Befehl benutzt:

Zum Einfügen neuer Datensätze in eine Tabelle wird folgnder SQL-Befehl benutzt:

### UPDATE

### INSERT INTO!

### CREATE

### EDIT

## Zum Ändern von Datensätzen wird folgender SQL-Befehl benutzt:

Zum Ändern von Datensätzen wird folgender SQL-Befehl benutzt:

### EDIT

### MODIFY

### INSERT INTO

### UPDATE!

## Was ist MySQL?

Was ist MySQL?

### eine Datenbank

### eine schwedische Firma

### Datenbankmanagementsystem(DBMS)!

### eine Datenbank-Abfragesprache

## Entfernen Sie per SQL die Spalte email aus der Tabelle user.

Entfernen Sie per SQL die Spalte email aus der Tabelle user.

### ALTER TABLE user DELETE email;

### ALTER email DROP user;

### DROP email FROM user;

### ALTER TABLE user REMOVE email;

### ALTER email REMOVE user;

### ALTER TABLE user DROP email;!

### DELETE email FROM user;

### ALTER email DELETE user;

### REMOVE email FROM user;

## Welcher Datentyp ist am besten zum Speichern von Telefonnummern (z.B. 01791234567) geeigne ...

Welcher Datentyp ist am besten zum Speichern von Telefonnummern (z.B. 01791234567) geeignet?

### VARCHAR!

### INTEGER

### NUMBER

### TEXT

### DECIMAL

## Gegeben ist die Tabelle blog_entries durch folgende Anweisung:\n<pre>CREATE TABLE blog_ent ...

Gegeben ist die Tabelle blog_entries durch folgende Anweisung:\n<pre>CREATE TABLE blog_entries (id INTEGER PRIMARY KEY, titel VARCHAR (20), inhalte TEXT, datum DATE);</pre>\nFügen Sie einen neuen Eintrag mit aktuellem Datum hinzu.

### INSERT INTO blog_entries (id, titel, inhalt, datum) VALUES ('Ein schöner Tag', 'Lorem Ips ...

INSERT INTO blog_entries (id, titel, inhalt, datum) VALUES ('Ein schöner Tag', 'Lorem Ipsum', '1978-09-03');

### INSERT INTO blog_entries (titel, inhalt, datum) VALUES ('Ein sch öner Tag', 'Lorem Ipsum' ...!

INSERT INTO blog_entries (titel, inhalt, datum) VALUES ('Ein sch öner Tag', 'Lorem Ipsum', NOW());

### INSERT INTO blog_entries (titel, datrum, inhalt) VALUES ('Ein sch öner Tag', 'Lorem Ipsum ...

INSERT INTO blog_entries (titel, datrum, inhalt) VALUES ('Ein sch öner Tag', 'Lorem Ipsum', '1978-09-03');

### INSERT INTO blog_entries (id, titel, inhalt, datum) VALUES ('Ein schöner Tag', 'Lorem Ips ...

INSERT INTO blog_entries (id, titel, inhalt, datum) VALUES ('Ein schöner Tag', 'Lorem Ipsum', NOW());

### INSERT INTO blog_entries (titel, datrum, inhalt) VALUES ('Ein sch öner Tag', 'Lorem Ipsum ...

INSERT INTO blog_entries (titel, datrum, inhalt) VALUES ('Ein sch öner Tag', 'Lorem Ipsum', NOW());

## Welcher MySQL-Datentyp eignet sich am besten zum Speichern folgender Hausnummern:\n<pre>11 ...

Welcher MySQL-Datentyp eignet sich am besten zum Speichern folgender Hausnummern:\n<pre>11, 97, 3, 117b, 65</pre>

### CHAR

### DECIMAL

### INTEGER

### TEXT

### DATE

### FLOAT

### VARCHAR!

## Welche der folgenden Aussagen zum relationalen DB-Model sind richtig?

Welche der folgenden Aussagen zum relationalen DB-Model sind richtig?

### Die Reihenfolge der Attribute in einer Relation spielt keine Rolle.!

### Relationen enthalten oft doppelte Zeilen.

### Es darf in einer Relation keine zwei verschiedenen Attribute mit gleichem Namen geben.!

### Die Tupel in einer Relation werden anhand ihres Primärschlüssels geordnet.!

### Die Reihenfolge der Tupel in einer Relation spielt keine Rolle.!

## Welche der folgenden Mengen sind gleich?\n<pre>1. film = {titel, spieldauer}\n2. film = {t ...

Welche der folgenden Mengen sind gleich?\n<pre>1. film = {titel, spieldauer}\n2. film = {titel, erscheinungsdatum, spieldauer}\n3. film = {spieldauer, erscheinungsdatum, titel}\n4. film = {titel, erscheinungsdatum}</pre>

### Die Mengen 2 und 3 sind gleich.!

### Die Mengen 1 und 4 sind gleich.

### Die Mengen sind alle voneinander verschieden.

### Alle Mengen sind gleich, da nur der Name der Menge zählt

### Die Mengen 2 und 4 sind gleich.

## Welche der folgenden Begriffe bezeichnen Datenbank-Modelle?

Welche der folgenden Begriffe bezeichnen Datenbank-Modelle?

### physkalisches Modell

### relationales Modell!

### hierarchisches Modell!

### Netzwerkmodell!

### chemisches Modell

### Atommodell

### Agiles Modell

## Gegeben ist die Tabelle handies mit der Attributmenge {ruf_nr, modell, hersteller} und die ...

Gegeben ist die Tabelle handies mit der Attributmenge {ruf_nr, modell, hersteller} und die Tabelle kunden mit der Attributmenge {kunden_nr, name, vorname, mobil_nr, festnetz_nr}. \nGeben Sie die Namen aller Kunden aus, die ein Nokia-Handy besitzen

### SELECT kunden.name WHERE handies JOIN kunden ON kunden.mobil_nr=handies.ruf_nr FROM handie ...

SELECT kunden.name WHERE handies JOIN kunden ON kunden.mobil_nr=handies.ruf_nr FROM handies.hersteller='Nokia'

### SELECT kunden.name FROM handies JOIN kunden ON kunden.mobil_nr=handies.ruf_nr WHERE handie ...!

SELECT kunden.name FROM handies JOIN kunden ON kunden.mobil_nr=handies.ruf_nr WHERE handies.hersteller='Nokia'

### SELECT kunden.name FROM handies JOIN kunden ON kunden.festnetz_nr=handies.ruf_nr WHERE han ...

SELECT kunden.name FROM handies JOIN kunden ON kunden.festnetz_nr=handies.ruf_nr WHERE handies.hersteller='Nokia'

### SELECT kunden.name WHERE handies JOIN kunden ON kunden.festnetz_nr=handies.ruf_nr AND hand ...

SELECT kunden.name WHERE handies JOIN kunden ON kunden.festnetz_nr=handies.ruf_nr AND handies.hersteller='Nokia'

## Der SQL-Befehl, um alle Zeilen und Spalten einer Tabelle personal auszugeben lautet:

Der SQL-Befehl, um alle Zeilen und Spalten einer Tabelle personal auszugeben lautet:

### SELECT FROM personal, *

### SELECT ALL FROM personal

### SELECT * FROM personal WHERE ALL

### SELECT * FROM personal!

## Der SQL-Befehl, um alle Zeilen und Spalten einer Tabelle  personal auszugeben lautet:

Der SQL-Befehl, um alle Zeilen und Spalten einer Tabelle  personal auszugeben lautet:

### SELECT * FROM personal!

### SELECT ALL FROM personal

### SELECT FROM personal, *

### SELECT * FROM personal WHERE ALL

## Was gibt "print" nach dem folgenden Programm aus?\n<pre>$w = 15;\n$x = 32;\n$y = 20;\n$z = ...

Was gibt "print" nach dem folgenden Programm aus?\n<pre>$w = 15;\n$x = 32;\n$y = 20;\n$z = 5:\n$x %= $w;\n$y += $x - 6;\n$z = ++$y - ++$w;\nprint "$w : $x : $y : $z";</pre>

### 15 : 2 : 17 : 2

### 15 : 3 : 16 : 2

### 16 : 3 : 16 : 1

### 16 : 2 : 17 : 1!

## Mit welcher Anweisung wird der Text "PHP" ausgegeben?\n<pre>$sprache = array('Java', 'Ruby ...

Mit welcher Anweisung wird der Text "PHP" ausgegeben?\n<pre>$sprache = array('Java', 'Ruby', 'Python', 'PHP', 'Perl', 'Javascript');</pre>

### print $sprache["3"];

### print $sprache[3];!

### print $sprache['3'];

### print $sprache[i = 3];

## Wie können Sie gezielt den in der Session abgelegten Wert mit dem Index "hallo" löschen?

Wie können Sie gezielt den in der Session abgelegten Wert mit dem Index "hallo" löschen?

### $_SESSION = array( );

### $_SESSION = 'hallo';

### unset_session(hallo);

### unset($_SESSION ['hallo']);!

## Was wird ausgegeben?\n<pre>$text = ' ';\nfor ($i = 1; $i <= 5; $i +=2) {\n  $text .= '$i'; ...

Was wird ausgegeben?\n<pre>$text = ' ';\nfor ($i = 1; $i <= 5; $i +=2) {\n  $text .= '$i';\n}\nprint $text;</pre>

### 135

### 12345

### $i$i$i!

### $i$i$i$i$i

## Welche Ausgabe erzeugt folgender Code?\n<pre>$x = "10.5";\nprint gettype($x);</pre>

Welche Ausgabe erzeugt folgender Code?\n<pre>$x = "10.5";\nprint gettype($x);</pre>

### integer

### string!

### float

### double

## Welche Ausgabe erzeugt folgende Funktion?\n<pre>$x = 27;\nprint gettype($x);</pre>

Welche Ausgabe erzeugt folgende Funktion?\n<pre>$x = 27;\nprint gettype($x);</pre>

### string

### double

### Dieser Code erzeugt keine Ausgabe

### integer!

## Was wird ausgegeben?\n<pre>$w = "das ist ein test";\n$w = ltrim(substr($w, 3, 5));\nprint  ...

Was wird ausgegeben?\n<pre>$w = "das ist ein test";\n$w = ltrim(substr($w, 3, 5));\nprint strlen($w);</pre>

### 3

### 5

### 4!

### 6

## Was wird ausgegeben?\n<pre>$w = "das ist eine test";\n$w = trim(substr($w, 3, 2));\nprint  ...

Was wird ausgegeben?\n<pre>$w = "das ist eine test";\n$w = trim(substr($w, 3, 2));\nprint $w;</pre>

### "is"

### "i"!

### "s "

### "s"

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 23;\n$zahl += 5;\nprint 'Sie haben di ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 23;\n$zahl += 5;\nprint 'Sie haben die Seite $zahl mal besucht!';\n$zahl = 45;</pre>

### Sie haben die Seite 28 mal besucht!

### Sie haben die Seite $zahl mal besucht!!

### Sie haben die Seite 45 mal besucht!

### Sie haben die Seite 5 mal besucht!

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahlen = array(1, 2, 3);\n$test = 0;\nfuncti ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahlen = array(1, 2, 3);\n$test = 0;\nfunction tuewas($x) {\n  $test += $x;\n}\nforeach ($zahlen as $z) {\n  tuewas($z);\n}\nprint $test;</pre>

### 0!

### 3

### 7

### 12

## Was wird ausgegeben?\n<pre>$a = 3;\n$b = 5;\n$c = 6;\nif (($a > $b) or ($b != $c)) {\n  pr ...

Was wird ausgegeben?\n<pre>$a = 3;\n$b = 5;\n$c = 6;\nif (($a > $b) or ($b != $c)) {\n  print "hallo";\n} else {\n  print "ollah";\n}</pre>

### ollah

### hallo!

## Welche Ausgabe erzeugt folgender Code?\n<pre>$x = 2;\n$y = 5;\nif (($x > $y) and ($x == $y ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$x = 2;\n$y = 5;\nif (($x > $y) and ($x == $y)) {\n  $z = '$x';\n} else {\n  $z = '$y';\n}\nprint $z;</pre>

### 5

### $y!

### 2

### $x

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuewas($x) {\n  return  ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuewas($x) {\n  return $x * 30;\n}\n$zahl = tuewas($zahl);\nprint $zahl;</pre>

### 60

### 30

### 900!

### Es wird nicht ausgegeben

## Wie muss die URL aussehen damit der folgen Code-Block die\n<pre>Ausgabe "Hallo Anton Meier ...

Wie muss die URL aussehen damit der folgen Code-Block die\n<pre>Ausgabe "Hallo Anton Meier" ausgibt?\n$vorname = $_GET['vorname'];\n$nachname = $_GET['nachname'];\nprint 'Hallo ' . $vorname . ' ' . $nachname;</pre>

### http://example.com/test.php?vorname=Anton&nachname=Meier!

### http://example.com/test.php?nachname=Meier&vorname=Anton!

### http://example.com/test.php?vorname=Anton+nachname=Meier

### http://example.com/test.php&nachname=Meier?vorname=Anton

## Sie haben die URL "http://example.com/test.php?vorname=Anton&nachname=Meier" aufgerufen. \ ...

Sie haben die URL "http://example.com/test.php?vorname=Anton&nachname=Meier" aufgerufen. \nWie muss der PHP-Code der Seite aussehen, um die Ausgabe "Hallo Anton" zu erzeugen?

### print "Hallo " .$vorname;

### print "Hallo " . "$Anton";

### print "Hallo " . "Anton";!

### print "Hallo " . $_GET['vorname'];!

### print "Hallo " . $_POST['vorname'];

## Welche Ausgabe erzeugt folgender Code?\n<pre>function tuewas($x) {\n  if ($x = 10) {\n     ...

Welche Ausgabe erzeugt folgender Code?\n<pre>function tuewas($x) {\n  if ($x = 10) {\n    $ergebnis = 'gleich 10';\n  } else {\n    $ergebnis = 'ungleich 10';\n  }\n  return $ergebnis;\n}\nprint tuewas(10);\nprint ' und ';\nprint tuewas(5);</pre>

### ungleich 10 und gleich 10

### gleich 10 und ungleich 10

### ungleich 10 und ungleich 10

### gleich 10 und gleich 10!

## Mit welchem Code wird "zehn" ausgegeben?\n<pre>$test = array(2 => 'zwei', 4 => 'vier', 6 = ...

Mit welchem Code wird "zehn" ausgegeben?\n<pre>$test = array(2 => 'zwei', 4 => 'vier', 6 => 'sechs', 'acht');\n$test[] = 'zehn';</pre>

### print $test[10];

### print $test[8];!

### print $test[9];

### print $test[4];

## Was gibt das "print" nach dem folgenden Programm aus?\n<pre>$x = 4;\n$y = 3;\n$z = 7;\n$x  ...

Was gibt das "print" nach dem folgenden Programm aus?\n<pre>$x = 4;\n$y = 3;\n$z = 7;\n$x *= $y;\n$y = ++$x - 6;\n$z += $y / $z;\nprint "$x : $y : $z";</pre>

### 4 : -2 : 7

### 3 : 7 : 1

### 13 : 7 : 8!

### 12 : 6 : 7

## Wie können Sie gezielt den in der Session abgelegten Wert mit dem Index hallo löschen?

Wie können Sie gezielt den in der Session abgelegten Wert mit dem Index hallo löschen?

### $_SESSION = array();

### unset_session(hallo);

### unset($_SESSION['hallo']);!

### $_SESSION = 'hallo';

## Was wird von der print-Anweisung ausgegeben?\n<pre>$w = 0;\n$x = 2;\nwhile ($x < 5) {\n  + ...

Was wird von der print-Anweisung ausgegeben?\n<pre>$w = 0;\n$x = 2;\nwhile ($x < 5) {\n  ++$x;\n  $w += $x;\n}\nprint $w;</pre>

### 18

### 5

### 12!

### 7

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuewas($x) {\n  $zahl = ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuewas($x) {\n  $zahl = $x * 30;\n}\n$zahl = tuewas($zahl);\nprint $zahl;</pre>

### 900

### 60

### 30

### Es wird nichts ausgegeben!

## Was erzeugt der folgende Code als Ausgabe?\n<pre>$daten = array('eins', 'zwei', 'drei', 'v ...

Was erzeugt der folgende Code als Ausgabe?\n<pre>$daten = array('eins', 'zwei', 'drei', 'vier', 'fünf');\n$test = serialize($daten);\nprint gettype($test);</pre>

### string!

### double

### object

### array

## Identifizieren Sie die korrekte Syntax für PHP-Komentare.

Identifizieren Sie die korrekte Syntax für PHP-Komentare.

### // Komentar!

### 

### / Komentar

### /* Komentar */!

## Welchen Datentyp liefert die Function time()?

Welchen Datentyp liefert die Function time()?

### integer!

### double

### boolean

### string

## Wie definiert man in PHP eine Konstante?

Wie definiert man in PHP eine Konstante?

### const "NAME" = "Wert";

### const  ("NAME", "Wert");

### define_const  ("NAME", "Wert");

### define ("NAME", "Wert");!

## Was müssen Sie beim Aufruf der Funktion session_start() beachten?

Was müssen Sie beim Aufruf der Funktion session_start() beachten?

### Der Aufruf muss stehen, bevor das PHP-Script die erste Ausgabe erzeugt.!

### Gar nichts.

### Vor dem ersten Aufruf muss erst ein Cookie mit dem Namen  user_session erzeugt werden.

### Der Aufruf muss direkt nach dem ersten PHP-Tag (

## Welche der folgenden For-Schleifen hat eine korrekte Syntax?

Welche der folgenden For-Schleifen hat eine korrekte Syntax?

### for ($i>0; $i--) {\n  print "Countdown: $i ";\n  }

### for ($i==10; $i-- ; $i

### for ($i

### for ($i=10; $i>=0 ; $i--) {\n  print "Countdown: $i ";\n  }!

## Was wird durch die print-Anweisung ausgegeben?\n<pre>$test = '3.14';\nprint gettype($test) ...

Was wird durch die print-Anweisung ausgegeben?\n<pre>$test = '3.14';\nprint gettype($test);</pre>

### string!

### int

### double

### 3.14

## Welchen Wert hat folgender Ausdruck?\n<pre>(((true || true) && false) && (true || true))</ ...

Welchen Wert hat folgender Ausdruck?\n<pre>(((true || true) && false) && (true || true))</pre>

### (!(false))

### false!

### (!(true))!

### true

## Der SELECT-Befehl um alle Zeilen und Spalten einer Tabelle (Name: Products) auszugeben lau ...

Der SELECT-Befehl um alle Zeilen und Spalten einer Tabelle (Name: Products) auszugeben lautet?

### SELECT ANY FROM Products.

### SELECT * FROM Products.!

### SELECT FROM Products,*

### SELECT ALL FORM Products.

## Wie oft wird die folgende Schleife durchlaufen?\n<pre>$i = 1;\nwhile ($i < 5) {\n  $i++;\n ...

Wie oft wird die folgende Schleife durchlaufen?\n<pre>$i = 1;\nwhile ($i < 5) {\n  $i++;\n}</pre>

### 6 mal

### 3 mal

### 4 mal!

### 5 mal

## Was gibt die echo-Anweisung nach den folgenden Zuweisungen aus?\n<pre>$x = 42;\n$y = $x;\n ...

Was gibt die echo-Anweisung nach den folgenden Zuweisungen aus?\n<pre>$x = 42;\n$y = $x;\n$y = 88;\necho $y . "--" . $x;</pre>

### 42--88

### 88--42!

### 42--42

### 88--88

## Welche HTTP-Request-Methoden können zur Übertragung von HTML-Formulardaten genutzt werde ...

Welche HTTP-Request-Methoden können zur Übertragung von HTML-Formulardaten genutzt werden?

### PUT

### HEAD

### POST!

### GET!

## Identifizeieren Sie Datentypen, die in PHP verwendet werden.

Identifizeieren Sie Datentypen, die in PHP verwendet werden.

### boolean!

### array!

### varchar

### tinyblob

## Welche Datentypen dürfen serialisiert werden?

Welche Datentypen dürfen serialisiert werden?

### string!

### integer!

### object!

### array!

## Was bedeutet das Schlüsselwort  global  vor einer Variablendeklaration in einer Funktion?

Was bedeutet das Schlüsselwort  global  vor einer Variablendeklaration in einer Funktion?

### Variable verbleibt nach der Ausführung der Funktion im Speicher und merkt sich ihren Wert ...

Variable verbleibt nach der Ausführung der Funktion im Speicher und merkt sich ihren Wert.

### Die Variable wird für alle Funktionen sichtbar.

### Die Variable wird dadurch auch in anderen PHP-Seiten gültig.

### Eine Variable, die außerhalb der Funktion definiert wurde, wird für die Funktion sichtba ...!

Eine Variable, die außerhalb der Funktion definiert wurde, wird für die Funktion sichtbar.

## Was gibt die print()-Funktion nach dem folgenden Programm aus?\n<pre>$w = 15;\n$x = 10;\n$ ...

Was gibt die print()-Funktion nach dem folgenden Programm aus?\n<pre>$w = 15;\n$x = 10;\n$y = 20;\n$z = 5;\n$x %= $w;    Anm.: $x=$x%$w  10%15=10 da 10=0*15+10\n$y += ++$x – 6;    \n$z = $y / $z++;\nprint "$w : $x : $y : $z";</pre>

### 15 : 11 : 25 : 5!

### 5 : 12 : 20 : 10

### 10 : 9 : 30 : 4

### 20 : 10 : 15 : 6

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuewas(&$x) {\n  $x = $ ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuewas(&$x) {\n  $x = $x * 30;\n}\ntuewas($zahl);\necho $zahl;</pre>

### 30

### 900!

### 90

### 60

## Was wird ausgegeben?\n<pre>$w = "das ist ein test";\n$w = trim(substr($w,3,5));\nprint str ...

Was wird ausgegeben?\n<pre>$w = "das ist ein test";\n$w = trim(substr($w,3,5));\nprint strlen($w);</pre>

### 3!

### 4

### 5

### 6

## Was bedeutet das Schlüsselwort  static  vor einer Variablendeklaration in einer Funktion?

Was bedeutet das Schlüsselwort  static  vor einer Variablendeklaration in einer Funktion?

### Die Variable verbleibt nach der Ausführung der Funktion im Speicher und merkt sich ihren  ...!

Die Variable verbleibt nach der Ausführung der Funktion im Speicher und merkt sich ihren Wert.

### Die Variable wird für alle Funktionen sichtbar.

### Die Variable wird dadurch auch in anderen PHP-Seiten gültig.

### Eine Variable, die außerhalb der Funktion definiert wurde, wird für die Funktion sichtba ...

Eine Variable, die außerhalb der Funktion definiert wurde, wird für die Funktion sichtbar.

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 30;\n$zahl2 = 30;\nfunction tuewas(& ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 30;\n$zahl2 = 30;\nfunction tuewas(&$x) {\n  $x = $x * 30;\n  $zahl2 = 33;\n}\ntuewas($x);\necho $zahl1 . " - " . $zahl2;</pre>

### 30 - 33

### 33 - 33

### 30 - 30!

### 33 - 30

### 33 -900

### 900 - 33

### 30 - 900

### 900 - 30

## Was gibt die print()-Funktion nach dem folgenden Programm aus?\n<pre>$w = 5;\n$x = 4;\n$y  ...

Was gibt die print()-Funktion nach dem folgenden Programm aus?\n<pre>$w = 5;\n$x = 4;\n$y = 3;\n$z = 7;\n$x -= $y;\n$y += ++$x - 6;\n$z = $y * $z;\nprint "$w : $x : $y : $z";</pre>

### 5 : 1 : -3 : -8

### 5 : 2 : -1 : -7!

### 5 : 2 : -3 : -7

### 5 : 1: -1 : -8

## Welche Ausgaben sind korrekt?

Welche Ausgaben sind korrekt?

### print $a . " hallo";!

### print $a , $b;

### echo $a, $b, $c, "hallo";!

### echo "hallo ", "ich" . $c;!

## Welche Ausgaben sind korrekt?\n<pre>$text = “Herzlich willkommen”;</pre>

Welche Ausgaben sind korrekt?\n<pre>$text = “Herzlich willkommen”;</pre>

### print text;

### echo $text;!

### echo ($text);!

### print ($text);!

## Was gibt die print()-Funktion nach dem folgenden Programm aus?\n<pre>$w = 15;\n$x = 10;\n$ ...

Was gibt die print()-Funktion nach dem folgenden Programm aus?\n<pre>$w = 15;\n$x = 10;\n$y = 20;\n$z = 5;\n$x %= $w;    \n$y += ++$x – 6;    \n$z = $y / $z++;\nprint "$w : $x : $y : $z";</pre>

### 15 : 11 : 25 : 5!

### 5 : 12 : 20 : 10

### 10 : 9 : 30 : 4

### 20 : 10 : 15 : 6

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 30;\n$zahl2 = 30;\nfunction tuewas(& ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 30;\n$zahl2 = 30;\nfunction tuewas(&$x) {\n  $x = $x * 30;\n  $zahl2 = 33;\n}\ntuewas($zahl2);\necho $zahl1 . " - " . $zahl2;</pre>

### 30 - 33

### 33 - 33

### 30 - 30

### 33 - 30

### 33 -900

### 900 - 33

### 30 - 900!

### 900 - 30

## Was gibt die print-Funktion nach dem folgenden Programm aus?\n<pre>$w = 5;\n$x = 4;\n$z =  ...

Was gibt die print-Funktion nach dem folgenden Programm aus?\n<pre>$w = 5;\n$x = 4;\n$z = 3;\n$z = &$x;\n$x = 5;\n$w = $x;\n$w = 4;\n$y = 7;\nprint "$w : $x : $y : $z";</pre>

### 5 : 5 : 7 : 5

### 4 : 5 : 7 : 3

### 4 : 5 : 4 : 5

### 4 : 5 : 7 : 5!

## Welche Ausgabe erzeugt folgender Code?\n<pre>$x = 27;\nprint gettype($x);</pre>

Welche Ausgabe erzeugt folgender Code?\n<pre>$x = 27;\nprint gettype($x);</pre>

### string

### double

### integer!

### dieser Code erzeugt keine Ausgabe

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 30;\n$zahl2 = 30;\nfunction tuewas($ ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 30;\n$zahl2 = 30;\nfunction tuewas($x) {\n  global $zahl2;\n  $x = $x * 30;\n  $zahl2 = 33;\n}\necho $zahl1 . " - " . $zahl2;</pre>

### 30 - 33

### 33 - 33

### 30 - 30!

### 33 - 30

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuewas($x) {\n  $zahl = ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuewas($x) {\n  $zahl = $x * 30;\n}\n$zahl = tuewas($zahl);\necho $zahl;</pre>

### 30

### 900

### Es wird nichts ausgegeben.!

### 60

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 23;\n$zahl2 = 55;\nfunction tuewas($ ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 23;\n$zahl2 = 55;\nfunction tuewas($x) {\n  static $zahl2 = 0;\n  $x = $x * 30;\n  $zahl2 += 33;\n  print $zahl2 . " : ";\n}\ntuewas($zahl2);\ntuewas($zahl2);\nprint $zahl1;</pre>

### 33 : 66 : 23!

### 33 : 66 : 33

### 33 : 33 : 23

### 66 : 33 : 23

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 23;\n$zahl2 = 55;\nfunction tuewas($ ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl1 = 23;\n$zahl2 = 55;\nfunction tuewas($x) {\n  global $zahl2;\n  $x = $x * 30;\n  $zahl2 = 33;\n}\ntuewas($zahl2);\necho $zahl1 . " - " . $zahl2;</pre>

### 23 - 23

### 23 - 55

### 55 - 23

### 23 - 33!

## Was gibt das print nach dem folgenden Programm aus? \n<pre>$w = 15;\n$x = 32;\n$y = 20;\n$ ...

Was gibt das print nach dem folgenden Programm aus? \n<pre>$w = 15;\n$x = 32;\n$y = 20;\n$z = 5;\n$x %= $w;\n$y += $x - 6;\n$z = ++$y - ++$w;\nprint "$w : $x : $y : $z";</pre>

### 15 : 2 : 17 : 2

### 16 : 3 : 16 : 1

### 16 : 2 : 17 : 1!

### 15 : 3 : 16 : 2

## Was wird von der print-Anweisung ausgegeben? \n<pre>$w = 0;\n$x = 2;\nwhile ($x < 5) {\n   ...

Was wird von der print-Anweisung ausgegeben? \n<pre>$w = 0;\n$x = 2;\nwhile ($x < 5) {\n  ++$x;\n  $w += $x;\n}\nprint $w;</pre>

### 7

### 18

### 5

### 12!

## Wie oft wird die Schleife durchlaufen?\n<pre>for ($i = 0; $i <=12; $i += 3) {\n  echo $i ' ...

Wie oft wird die Schleife durchlaufen?\n<pre>for ($i = 0; $i <=12; $i += 3) {\n  echo $i '<br />';\n}</pre>

### 8

### 4

### 3

### 5!

### 7

### 6

## Welche Aussagen sind für Variable $_SESSION korrekt?

Welche Aussagen sind für Variable $_SESSION korrekt?

### $_SESSION ist automatisch in jeder Funktion sichtbar, da es sich um eine superglobale Vari ...!

$_SESSION ist automatisch in jeder Funktion sichtbar, da es sich um eine superglobale Variable handelt.

### Es handelt sich um ein assoziatives Array.!

### Es muss erst die Funktion session_start( ) aufgerufen werden, bevor $_SESSION verfügbar i ...!

Es muss erst die Funktion session_start( ) aufgerufen werden, bevor $_SESSION verfügbar ist.

### Der Code $_SESSION= array( ); leert die Session.!

## Was wird nach folgendem Code-Block ausgegeben?\n<pre>$zahl = 2;\nswitch ($zahl) {\ncase 2: ...

Was wird nach folgendem Code-Block ausgegeben?\n<pre>$zahl = 2;\nswitch ($zahl) {\ncase 2:\n  print "Hallo";\ncase 9:\n  print "Hey";\n  break;\ncase17:\n  print "Tach";\n  break;\n}</pre>

### HeyTach

### HalloTach

### Tach

### HalloHey!

## In welchem Abschnitt der HTTP-Kommunikation werden die Daten eines umfangreichen HTML-Form ...

In welchem Abschnitt der HTTP-Kommunikation werden die Daten eines umfangreichen HTML-Formulars typischerweise an den Server übertragen?

### Client Request Header

### Entity Body der HTTP-Response

### Entity Body des HTTP-Requets!

### Server Response Headers

## Was liefert der folgende Code-Block?\n<pre>$x = 'Hallo Echo';\necho strlen($x);</pre>

Was liefert der folgende Code-Block?\n<pre>$x = 'Hallo Echo';\necho strlen($x);</pre>

### 10!

### 8

### HalloEcho

### 9

## Was wird nach folgendem Code-Block ausgegeben?\n<pre>$zahl = 9;\nswitch ($zahl) {\ncase 2: ...

Was wird nach folgendem Code-Block ausgegeben?\n<pre>$zahl = 9;\nswitch ($zahl) {\ncase 2:\n  print "Hallo";\n  break;\ncase 9:\n  print "Hey";\n  break;\ncase17:\n  print "Tach";\n  break;\n}</pre>

### Es wird gar nichts ausgegeben.

### Hallo

### Hey!

### Tach

## Welchen Wert hat der folgende Ausdruck?\n<pre>(((true && false) || false) || (true && true ...

Welchen Wert hat der folgende Ausdruck?\n<pre>(((true && false) || false) || (true && true))</pre>

### false

### true!

### (!(true))

### (!(false))!

## Wie können Sie Daten von einer zur nächsten Seite weiterreichen?

Wie können Sie Daten von einer zur nächsten Seite weiterreichen?

### Domain Name System

### URL!

### Versteckte Formularfelder!

### Manipulation des HTTP-Server-Response

## Welche Variablendefinitionen in PHP sind korrekt?

Welche Variablendefinitionen in PHP sind korrekt?

### $_35B = "Hallo";!

### $2x6 = "test";

### $x = 3;!

### $a = false;!

## Was wird durch die echo-Anweisung ausgegeben?\n<pre>$test = 3.14;\necho gettype($test);</p ...

Was wird durch die echo-Anweisung ausgegeben?\n<pre>$test = 3.14;\necho gettype($test);</pre>

### int

### string

### 3.14

### double!

## Welche Möglichkeiten hat ein Programmierer Daten von einer zur nächsten Seite einer dyna ...

Welche Möglichkeiten hat ein Programmierer Daten von einer zur nächsten Seite einer dynamischen Web-Anwendung weiterzuleiten?

### Weitergabe über versteckte Formularfelder.!

### Weitergabe über das Domain Name System.

### Weitergabe durch Manipulation der HTTP-Server-Response.

### Weitergabe über die URL.!

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 10;\nfunction tuwas($x) {\n  $x = $x  ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 10;\nfunction tuwas($x) {\n  $x = $x * 30;\n}\ntuwas($zahl);\necho $zahl;</pre>

### 30

### 10!

### 100

### 300

## Wie gebe ich den Inhalt von $text in den Session Speicher

Wie gebe ich den Inhalt von $text in den Session Speicher

### session_start();\n  $text = 'hallo welt';

### session_start();\n  $_SESSION['text'] = $text;!

### session_start();\n  session_inst($text);

### session_start();\n  session_insert($text);

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 10;\nfunction tuwas($x) {\n  $x = $x  ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 10;\nfunction tuwas($x) {\n  $x = $x * 30;\n  return $x;\n}\ntuwas($zahl);\necho $zahl;</pre>

### 10!

### 30

### 100

### 300

## Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuwas($x) {\n  return $ ...

Welche Ausgabe erzeugt folgender Code?\n<pre>$zahl = 30;\nfunction tuwas($x) {\n  return $x * 30;\n}\n$zahl = tuwas($zahl);\necho $zahl;</pre>

### Es wird nichts ausgegeben.

### 30

### 60

### 900!

## Welche der folgenden for-Schleifen hat eine korrekte Syntax?

Welche der folgenden for-Schleifen hat eine korrekte Syntax?

### for ($i>0; $i=10; $i--) {\n  echo "Countdown: $i ";\n  }

### for ($i=10; $i>=10; $i--) {\n  echo "Countdown: $i ";\n  }!

### for ($i==10; $i--; $i

### for ($i>0; $i--) {\n  echo "Countdown: $i ";\n  }

## Welchen Index besitzt das Feld mit dem Wert "Karo"?\n<pre>$farbe = array(1=>"Kreuz", "Pik" ...

Welchen Index besitzt das Feld mit dem Wert "Karo"?\n<pre>$farbe = array(1=>"Kreuz", "Pik", 5=>"Herz", "Karo");</pre>

### 6!

### 3

### 2

### 7

## Was liefert der folgende PHP-Code-Biock'?\n<pre>$x = "Hallo Echo" ;\necho strlen ( $x) ;</ ...

Was liefert der folgende PHP-Code-Biock'?\n<pre>$x = "Hallo Echo" ;\necho strlen ( $x) ;</pre>

### HalloEcho

### 10!

### 8

### 9

## Wie oft wird folgende Schleife in PHP durchlaufen?\n<pre>for ( $i=0; $i <= 12; $i += 3 )   ...

Wie oft wird folgende Schleife in PHP durchlaufen?\n<pre>for ( $i=0; $i <= 12; $i += 3 )  {\necho $i .  ' <br / > ' ;\n}</pre>

### 3 mal

### 4 mal

### 7 mal

### 5 mal!

### 6 mal

### 8 mal

## Identifizieren Sie die korrekte Syntax für PHP-Kommentare:

Identifizieren Sie die korrekte Syntax für PHP-Kommentare:

### /* Kommentar */!

### 

### /kommentar

### //Kommentar!

## Welche Variablendefinitionen sind in PHP korrekt?

Welche Variablendefinitionen sind in PHP korrekt?

### $x = 3;!

### $_35B = "hallo";!

### $2xb = "test";

### $a = false;!

## Welche der folgenden PHP-Funktionen liefert die Anzahl der ARRAY-Elemente?

Welche der folgenden PHP-Funktionen liefert die Anzahl der ARRAY-Elemente?

### range();

### max();

### count();!

### number();

## Was wird durch die folgende echo-Anweisung in PHP ausgegeben?\n<pre> $test = '3.14';\n ech ...

Was wird durch die folgende echo-Anweisung in PHP ausgegeben?\n<pre> $test = '3.14';\n echo gettype($test);</pre>

### int

### double

### 3.14

### string!

## Ist in eigenem Code der Namespace PHP\Entities erlaubt?

Ist in eigenem Code der Namespace PHP\Entities erlaubt?

### Nein!

### Ja

### Ja, aber nur in der Schreibweise php\entities

### Nein, aber PHP\Models ist erlaubt

## Identifizieren Sie die Datentypen, die in PHP verwendet werden:

Identifizieren Sie die Datentypen, die in PHP verwendet werden:

### varchar!

### boolean!

### tinyblob

### array!

## Was wird nach dem Durchlaufen folgender PHP-Anweisungen ausgegeben?\n<pre>  $zahl = 9;\n   ...

Was wird nach dem Durchlaufen folgender PHP-Anweisungen ausgegeben?\n<pre>  $zahl = 9;\n  switch($zahl) {\n     case 2:\n        echo "Hallo";\n        break;\n     case 9:\n        echo "Hey";\n        break;\n     case 17:\n        echo "Tach";\n        break;\n}</pre>

### Tach

### Hey!

### Es wird gar nichtsausgegeben.

### Hallo

## Welche PHP-Funktion kann verwendet werden, um eine formatierte Zeichenkette an den Browser ...

Welche PHP-Funktion kann verwendet werden, um eine formatierte Zeichenkette an den Browser zu senden?

### echo

### var_dump

### vprintf!

### vsprintf

## Welche Möglichkeiten hat ein Programmierer, Daten von einer zur nächsten Seite einer dyn ...

Welche Möglichkeiten hat ein Programmierer, Daten von einer zur nächsten Seite einer dynamischen Web-Anwendung weiterzuleiten?

### Weitergabe über das Domain Name System.

### Weitergabe über versteckte Formularfelder.!

### Weitergabe durch Manipulation der HTTP-Server-Response.!

### Weitergabe über die URL.!

## Was wird ausgegeben?\n<pre>$text = "das ist ein test";\n$ausschnitt = trim(substr($text, 3 ...

Was wird ausgegeben?\n<pre>$text = "das ist ein test";\n$ausschnitt = trim(substr($text, 3, 2));\necho $ausschnitt;</pre>

### "is"

### "i"!

### "s "

### "s"

## Was gibt das echo nach folgendem Programm aus?\n<pre>$x = 4;\n$y = 3;\n$z = 7;\n$x *= $y;\ ...

Was gibt das echo nach folgendem Programm aus?\n<pre>$x = 4;\n$y = 3;\n$z = 7;\n$x *= $y;\n$x++;\n$y = $x - 6;\n$z += $y / $z;\necho "$x : $y : $z";</pre>

### 4 : -2 : 7

### 3 : 7 : 1

### 13 : 7 : 8!

### 12 : 6 : 7

## Welche Ausgabe erzeugt folgender Code?\n<pre>$x = 27;\necho gettype($x);</pre>

Welche Ausgabe erzeugt folgender Code?\n<pre>$x = 27;\necho gettype($x);</pre>

### string

### double

### Dieser Code erzeugt keine Ausgabe.

### integer!

## Was wird ausgegeben?\n<pre>$text = "das ist ein test";\n$ausschnitt = trim(substr($text, 3 ...

Was wird ausgegeben?\n<pre>$text = "das ist ein test";\n$ausschnitt = trim(substr($text, 3, 2));\necho $ausschnitt ;</pre>

### "is"

### "s "

### "i"!

### "s"

## Wie muss die URL aussehen, damit der folgende Code-Block die\nAusgabe Hallo Anton Meier au ...

Wie muss die URL aussehen, damit der folgende Code-Block die\nAusgabe Hallo Anton Meier ausgibt?\n<pre>$vorname = $_GET['vorname'];\n$nachname = $_GET['nachname'];\necho 'Hallo ' . $vorname . ' ' . $nachname;</pre>

### http://example.com/test.php?nachname=Meier&vorname=Anton!

### http://example.com/test.php&nachname=Meier?vorname=Anton

### http://example.com/test.php?vorname=Anton&nachname=Meier!

### http://example.com/test.php?vorname=Anton+nachname=Meier

## Was wird ausgegeben?\n<pre>$text = ' ';\nfor ($i=1; $i<=5; $i+=2) {\n  $text .= '$i';\n}\n ...

Was wird ausgegeben?\n<pre>$text = ' ';\nfor ($i=1; $i<=5; $i+=2) {\n  $text .= '$i';\n}\necho $text;</pre>

### 12345

### $i$i$i$i$i

### $i$i$i!

### 135

## Welche der folgenden Aussagen sind syntaktisch korrekte "prepared statements"?

Welche der folgenden Aussagen sind syntaktisch korrekte "prepared statements"?

### $db->prepare('SELECT * FROM teilnehmer WHERE vorname="Marco"');!

### $db->prepare('SELECT * FROM teilnehmer WHERE vorname=:vorname');!

### $db->prepare('SELECT * FROM teilnehmer WHERE vorname=vorname');

### $db->prepare('SELECT * FROM teilnehmer WHERE vorname=?');!

## Mit welcher Methode eines "PDOStatement"-Objekts erhalten Sie alle enthaltenen Datensätze ...

Mit welcher Methode eines "PDOStatement"-Objekts erhalten Sie alle enthaltenen Datensätze als array?

### $abfrage->execute();

### $abfrage->fetchAll();!

### $abfrage->fetch();

### $abfrage->errorInfo();

## Welche der folgenden Anweisungen führt korrekt eine Datenbankabfrage aus? In $db ist ein  ...

Welche der folgenden Anweisungen führt korrekt eine Datenbankabfrage aus? In $db ist ein PDO-Objekt gespeichert.

### $db->execute('SELECT * FROM teilnehmer WHERE laune="gut"');

### $db->fetchAll('SELECT * FROM teilnehmer WHERE laune="gut"');

### $db->prepare('SELECT * FROM teilnehmer WHERE laune="gut"');

### $db->query('SELECT * FROM teilnehmer WHERE laune="gut"');!

## Welche Aussagen über den DSN bei PDO sind korrekt?

Welche Aussagen über den DSN bei PDO sind korrekt?

### DSN steht für Data Source Name!

### Der DSN wird verwendet, um PDO die Verbindungs-Daten zur Datenbank mitzuteilen.!

### Der DSN ist ein Pflicht-Argument beim Erzeugen eines PDO-Objekts.!

### Der DSN wird in Form eines URI angegeben.!

## Welche der folgenden PHP-Anweisungen sind korrekt? In $db ist ein PDO-Objekt gespeichert.

Welche der folgenden PHP-Anweisungen sind korrekt? In $db ist ein PDO-Objekt gespeichert.

### $abfrage = $db->query('INSERT INTO personen (vorname, nachname) VALUES ( ?, ? )');\n  $abf ...

$abfrage = $db->query('INSERT INTO personen (vorname, nachname) VALUES ( ?, ? )');\n  $abfrage->execute('Thorsten', 'Schneider');

### $abfrage = $db->query('INSERT INTO personen (vorname, nachname) VALUES ( ?, ? )');\n  $abf ...

$abfrage = $db->query('INSERT INTO personen (vorname, nachname) VALUES ( ?, ? )');\n  $abfrage->execute(array('Thorsten', 'Schneider'));

### $abfrage = $db->prepare('INSERT INTO personen (vorname, nachname) VALUES ( ?, ? )');\n  $a ...!

$abfrage = $db->prepare('INSERT INTO personen (vorname, nachname) VALUES ( ?, ? )');\n  $abfrage->execute(array('Thorsten', 'Schneider'));

### $abfrage = $db->prepare('INSERT INTO personen (vorname, nachname) VALUES ( ?, ? )');\n  $a ...

$abfrage = $db->prepare('INSERT INTO personen (vorname, nachname) VALUES ( ?, ? )');\n  $abfrage->execute('Thorsten', 'Schneider');

## Was ist in PHP eine korrekte Klassen-Definition?

Was ist in PHP eine korrekte Klassen-Definition?

### class Pizza\n  ( )

### class Pizza( )\n  {}

### class Pizza\n  {}!

### class Pizza

## Wie können Sie in einer Methode eine andere Methode namens "dieMethode" des selben Objekt ...

Wie können Sie in einer Methode eine andere Methode namens "dieMethode" des selben Objekts aufrufen?

### $this->dieMethode

### dieMethode

### $obj->dieMethode()

### $this->dieMethode()!

### dieMethode()

### $obj->dieMethode

## Betrachten Sie folgenden Code. Welche Aussage ist korrekt, wenn das Programm die Ausgabe " ...

Betrachten Sie folgenden Code. Welche Aussage ist korrekt, wenn das Programm die Ausgabe "ich bin eine Person" erzeugt?\n<pre>$pl = new person();\nprint $pl;</pre>

### In der Klasse Person gibt es eine Methode toString().

### In der Klasse Person gibt es eine Methode print().

### In der Klasse Person gibt es eine Methode __toString().!

### In der Klasse Person gibt es eine Methode __print().

## Auf welche Arten können Sie testen, ob ein Objekt zu einer bestimmten Klasse gehört?

Auf welche Arten können Sie testen, ob ein Objekt zu einer bestimmten Klasse gehört?

### Mit dem Operator isclass

### Indem Sie beim Methoden-Aufruf vor dem Parameter die gewünschte Klasse angeben

### Mit dem Operator instanceof!

### Indem Sie in der Methoden-Definition vor dem Parameter die gewünschte Klasse angeben!

## Was bewirkt das Schlüsselwort public bei der Definition eines Objekt-Attributs?

Was bewirkt das Schlüsselwort public bei der Definition eines Objekt-Attributs?

### Dieses Attribut kann als globale Variable verwendet werden.

### Auf dieses Attribut darf von außerhalb des Objekts zugegriffen werden.!

### Auf dieses Attribut darf von innerhalb der Klasse zugegriffen werden.!

### Dieses Attribut wird automatisch in $_ATTRIBUTES abgelegt.

## Wie wird in PHP ein neues Objekt der Klasse Pizza erstellt?

Wie wird in PHP ein neues Objekt der Klasse Pizza erstellt?

### $pizza = instanceof Pizza();

### $pizza = instanceof Pizza;

### $pizza = new Pizza();!

### $pizza = new Pizza;

## Sie möchten die SQL-Abfrage "SELECT * FROM tbl_name WHERE preis > 100" mit dem QueryBuild ...

Sie möchten die SQL-Abfrage "SELECT * FROM tbl_name WHERE preis > 100" mit dem QueryBuilder von Doctrine 2 ausführen. \nAls Ergebnis benötigen Sie eine Instanz von Doctrine\ORM\Query. Welche Methoden müssen Sie verketten (Chaining)?

### QueryBuilder#orderBy()

### QueryBuilder#from()!

### QueryBuilder#getQuery()!

### QueryBuilder#select()!

### QueryBuilder#where()!

### QueryBuilder#andWhere()

### QueryBuilder#setFirstResult()

## Sie möchten eine Klasse Datum anlegen, die von der in PHP eingebauten Klasse DateTime erb ...

Sie möchten eine Klasse Datum anlegen, die von der in PHP eingebauten Klasse DateTime erben soll. Folgender Code ist fehlerhaft:\n<pre>namespace webmasters;\nclass Datum implements DateTime\n{\n}</pre>\nWelche Maßnahmen sind zur Korrektur nötig?

### Anstatt namespace webmasters; wäre ein use webmasters; korrekt.

### Vor DateTime muss ein Backslash (\) eingefügt werden, da sich die Klasse DateTime nicht i ...!

Vor DateTime muss ein Backslash (\) eingefügt werden, da sich die Klasse DateTime nicht im aktuellen Namespace webmasters befindet.

### Anstatt implements wäre extends korrekt.!

### Anstatt implements wäre inherits korrekt.

## Welche Annotation wird benötigt, um eine PHP-Klasse als Doctrine\n2-Entity zu markieren?

Welche Annotation wird benötigt, um eine PHP-Klasse als Doctrine\n2-Entity zu markieren?

### GeneratedValue

### Entity!

### Table

### Timestampable

## Eine Instanz der Klasse Doctrine\ORM\EntityRepository bietet uns welche Methoden?

Eine Instanz der Klasse Doctrine\ORM\EntityRepository bietet uns welche Methoden?

### EntityRepository#findOne()

### EntityRepository#findComplete()

### EntityRepository#find()!

### EntityRepository#findAll()!

## Welche Annotation wird benötigt, um eine PHP-Klasse als Doctrine-Entity zu markieren?

Welche Annotation wird benötigt, um eine PHP-Klasse als Doctrine-Entity zu markieren?

### Table

### GeneratedValue

### Entity!

### Timestampable

## Wo bzw. wie kann man in Doctrine 2 Datenbank-Joins durchfu.hren?

Wo bzw. wie kann man in Doctrine 2 Datenbank-Joins durchfu.hren?

### per QueryBuilder#leftJoin()!

### per QueryBuilder#sqlJoin()

### in einer Instanz von Doctrine\ORM\EntityRepository

### per DQL!

## In $datetime liegt eine Instanz der DateTime-Klasse vor. \nWie gibt man das Datum in ISO 8 ...

In $datetime liegt eine Instanz der DateTime-Klasse vor. \nWie gibt man das Datum in ISO 8601-Schreibweise aus?

### echo $datetime->format('d.m.Y')

### echo $datetime->format('Y-m-d')!

### echo $datetime->format('ISO 8601')

### echo $datetime

## Sie möchten die SQL-Abfrage "SELECT * FROM tbl_name WHERE preis > 100" mit dem QueryBuild ...

Sie möchten die SQL-Abfrage "SELECT * FROM tbl_name WHERE preis > 100" mit dem QueryBuilder ausführen. SQL-Injections sollen vermieden werden und als Ergebnis benötigen Sie eine Instanz von Doctrine\ORM\Query. Welche Methoden müssen Sie verketten (Chaining)?

### QueryBuilder#setFirstResult()

### QueryBuilder#getQuery()!

### QueryBuilder#select()!

### QueryBuilder#where()!

### QueryBuilder#from()!

### QueryBuilder#orderBy()

### QueryBuilder#andWhere()

## Was sind die wichtigsten Konsolenbefehle bei der Installation von Doctrine?

Was sind die wichtigsten Konsolenbefehle bei der Installation von Doctrine?

### php composer.phar -V!

### php composer.phar self-update!

### php composer.phar install!

### php composer.phar update

### php composer.phar self-upgrade

### php composer.phar -v

### php composer.phar execute

## Was erspart einem die __autoload()-Funktion (Doctrine)?

Was erspart einem die __autoload()-Funktion (Doctrine)?

### Schreibarbeit.!

### Die vorherige Festlegung der benötigten Klassen von Drittanbietern.!

### Das Erstellen der Datei composer.json.

### Die Benutzung von Packagist als Datei-Quelle.

## Welcher Konsolenbefehl muss man nach jeder Änderung der Datei composer.json absetzen (Doc ...

Welcher Konsolenbefehl muss man nach jeder Änderung der Datei composer.json absetzen (Doctrine)?

### php composer.phar -V

### php composer.phar self-update

### php composer.phar install

### php composer.phar update!

### php composer.phar self-upgrade

### php composer.phar -v

### php composer.phar execute

## Was sind Beispiele für Namespaces abseits der Programmierung?

Was sind Beispiele für Namespaces abseits der Programmierung?

### Autokennzeichen!

### Dateiverzeichnisse!

### Telefonvorwahlen!

### Augenfarbe

## Was muss (wenn man nicht mit YAML, XML oder direkt mit PHP arbeitet) jede Entity enthalten ...

Was muss (wenn man nicht mit YAML, XML oder direkt mit PHP arbeitet) jede Entity enthalten, damit sie von Doctrine als solche erkannt wird?

### Deklarationen

### Annotationen!

### Entities

### Expansionen

## Welche Attribute benötigen in Doctrine keine Annotationen (z.B. @ORM\Column)?

Welche Attribute benötigen in Doctrine keine Annotationen (z.B. @ORM\Column)?

### Attribute, die automatisch von MySQL erhöht werden (AUTO_INCREMENT).

### Attribute, die Primärschlüssel sind.

### Attribute, welche nicht von Doctrine in der Datenbank gespeichert werden sollen.!

### Atribute, die keine Setter haben.

## Wie nennt man die Schnittstelle zu Doctrine, die man zum Auslesen, Speichern und Löschen  ...

Wie nennt man die Schnittstelle zu Doctrine, die man zum Auslesen, Speichern und Löschen von Datensätzen nutzt?

### ManagerEntity

### EntitiesManager

### EntityManager!

### ManagerEntities

## Wie sollte man (laut Namenskonvention) die Variable benennen, in der das Objekt der Schnit ...

Wie sollte man (laut Namenskonvention) die Variable benennen, in der das Objekt der Schnittstelle zu Doctrine liegt?

### $en

### $em!

### $emty

### &enty

## Wann werden Objekte von Doctrine gespeichert?

Wann werden Objekte von Doctrine gespeichert?

### Durch die Methode flush().!

### Durch die Methode persist().

### Am Ende eines Requests.!

### Alle 30 Sekunden.

## Was repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Datensätzen und dient  ...

Was repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Datensätzen und dient gleichzeitig dazu, Datensätze nach bestimmten Kriterien auszulesen und wie erhält man es?

### Das EntityRepository repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Datens ...!

Das EntityRepository repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Datensätzen und dient gleichzeitig dazu, Datensätze nach bestimmten Kriterien auszulesen. Man erhält es als Rückgabewert der Methode getRepository des EntityManager.

### Der EntityManager repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Datensät ...

Der EntityManager repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Datensätzen und dient gleichzeitig dazu, Datensätze nach bestimmten Kriterien auszulesen. Man erhält ihn als Rückgabewert der Methode getManager des EntityRepository.

### Die EntityPresentation repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Date ...

Die EntityPresentation repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Datensätzen und dient gleichzeitig dazu, Datensätze nach bestimmten Kriterien auszulesen. Man erhält es als Rückgabewert der Methode getPrasentation des EntityManager.

### Der EntityManager repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Datensät ...

Der EntityManager repräsentiert bei Doctrine eine Tabelle mit allen enthaltenen Datensätzen und dient gleichzeitig dazu, Datensätze nach bestimmten Kriterien auszulesen. Man erhält ihn als Rückgabewert der Methode getManager des EntityPrasentation.

## Wie lautet in PHP die Klasse, die für Datum und Uhrzeit zuständig ist?

Wie lautet in PHP die Klasse, die für Datum und Uhrzeit zuständig ist?

### StampTime

### TimeDate

### TimeStamp

### DateTime!

## Womit kann man in Doctrine automatisiert ein Erstellungs-oder Aktualisierungsdatum in eine ...

Womit kann man in Doctrine automatisiert ein Erstellungs-oder Aktualisierungsdatum in einem Attribut pflegen?

### @Vendor\Timestampable

### @Gedmo\Timestamp

### @Gedmo\Timestampable!

### @Vendor\Timestamp

## Wie definiert man Beziehungen zwischen Doctrine-Entities?

Wie definiert man Beziehungen zwischen Doctrine-Entities?

### Annotationen!

### Kommentare

## Was benutzt man, um eine 1:n-Beziehung zwischen Doctrine-Entities abzubilden?

Was benutzt man, um eine 1:n-Beziehung zwischen Doctrine-Entities abzubilden?

### @ORM\OneToMany!

### @ORM\ManyToAll

### @ORM\AllToMany

### @ORM\ManyToOne!

## Was benutzt man, um eine n:m-Beziehung zwischen Doctrine-Entities abzubilden?

Was benutzt man, um eine n:m-Beziehung zwischen Doctrine-Entities abzubilden?

### @ORM\AllToMany

### @ORM\AllToAll

### @ORM\ManyToMany!

### @ORM\ManyToAll

## Wofür steht BREAD?

Wofür steht BREAD?

### ADD!

### ADVISE

### EDIT!

### DROP

### DELETE!

### REOPEN

### BROWSE!

### READ!

### BEGIN

### EMPTY

## Welche Aktionen brauchen bei BREAD zur Ausführung die ID eines Datensatzes?

Welche Aktionen brauchen bei BREAD zur Ausführung die ID eines Datensatzes?

### ADD

### ADVISE

### EDIT!

### DROP

### DELETE!

### REOPEN

### BROWSE

### READ!

### BEGIN

### EMPTY

## Kann ich den Namespace PHP\ENTITY verwenden?

Kann ich den Namespace PHP\ENTITY verwenden?

### ja

### nein!

### nein, aber ich kann den Namespace PHP\models nutzen

### ja, wenn ich php/entity klein schreibe

## Welche Methoden hat die Klasse Doctrine\Common\Collections \ArrayCollection?

Welche Methoden hat die Klasse Doctrine\Common\Collections \ArrayCollection?

### contains!

### add!

### clear!

### create

### drop

## Welche Entwurfsmuster eignen sich nach Martin Fowler fürs Objekt-Relationale-Mapping (ORM ...

Welche Entwurfsmuster eignen sich nach Martin Fowler fürs Objekt-Relationale-Mapping (ORM)?

### Active Mapper

### Active Record!

### Data Mapper!

### Data Record

## Mit welcher Methode speichert man in Doctrine ein Objekt in der Datenbank?

Mit welcher Methode speichert man in Doctrine ein Objekt in der Datenbank?

### $em->persist()

### persist()

### flush()!

### data.flush()

## Welche der folgenden Begriffe bezeichnen Objekt-Relationale-Entwurfsmuster nach Martin Fow ...

Welche der folgenden Begriffe bezeichnen Objekt-Relationale-Entwurfsmuster nach Martin Fowler?

### Passiv Record

### Active Record!

### Data Mapper!

### Data Wrangler

## Über die Gedmo Doctrine Extensions kann man die Timestampable- Annotation zu Doctrine 2 e ...

Über die Gedmo Doctrine Extensions kann man die Timestampable- Annotation zu Doctrine 2 ergänzen.\nWelche Werte benötigt man für den on-Parameter?

### update!

### delete

### insert

### change

### create!

## Welcher Methodenaufruf ist nötig, um mit Doctrine 2 die aktualisierten Daten eines Objekt ...

Welcher Methodenaufruf ist nötig, um mit Doctrine 2 die aktualisierten Daten eines Objekts $person in den dazugehörigen Datensatz zu übertragen?

### $em->persist($person)!

### $person->persist()

### $em->update($person)

### $person->update()

## Wie können Sie ein Datenbank-Schema in Doctrine 2 hinterlegen?

Wie können Sie ein Datenbank-Schema in Doctrine 2 hinterlegen?

### Mit Hilfe von Annotationen!

### Mit Hilfe von YAML!

### Mit Hilfe von XML!

### Mit Hilfe von DQL

### Mit Hilfe der Datenbank-Konfiguration $connectionOptions

## Welche Vorteile hat Vererbung?

Welche Vorteile hat Vererbung?

### Die Vermeidung von Ultra_Langen_Klassen_Namen.

### Die Verwendung von Attributen der Elternklasse.!

### Code muss nur an einer Stelle verändert werden.!

### Die Verwendung von Methoden der Elternklasse.!

### Die Vermeidung von Namenskollisionen.

## Welche Aussagen zu Composer sind korrekt (im Zusammenhang mit Doctrine)?

Welche Aussagen zu Composer sind korrekt (im Zusammenhang mit Doctrine)?

### Composer ist ein Dependency-Manager für PHP.!

### Composer ist als Phar-Datei verfügbar.!

### In der projektspezifischen Datei composer.json werden Projektabhängigkeiten definiert.!

### Composer ist die Standard-Quelle für Doctrine-Pakete.

### In der projektspezifischen Datei composer.phar werden Projektabhängigkeiten definiert.

## Welche der folgenden Methoden sind Methoden der Klasse Doctrine \Common\Collections\ArrayC ...

Welche der folgenden Methoden sind Methoden der Klasse Doctrine \Common\Collections\ArrayCollection?

### ArrayCollection#add()!

### ArrayCollection#count()!

### ArrayCollection#removeElement()!

### ArrayCollection#contains()!

### ArrayCollection#clear()!

## Die Methode EntityManager#getRepository() liefert eine Instanz welcher Klasse?

Die Methode EntityManager#getRepository() liefert eine Instanz welcher Klasse?

### Doctrine\ORM\Repository

### Doctrine\DBAL\Repository

### Doctrine\DBAL\EntityRepository

### Doctrine\ORM\EntityRepository!

### Doctrine\Common\EntityRepository

### Doctrine\Common\Repository

## Welche Aussagen im Bezug auf sichere Kennwörter sind korrekt?

Welche Aussagen im Bezug auf sichere Kennwörter sind korrekt?

### Erster Buchstabe groß, dann klein weiter und die Verwendung von Sonderzeichen sind keine  ...!

Erster Buchstabe groß, dann klein weiter und die Verwendung von Sonderzeichen sind keine Garantie für ein sicheres Kennwort.

### Die Zeichenanzahl darf maximal 50 betragen.

### Die Verwendung der Großbuchstaben eines ausgedachten Satzes sorgt für ein sicheres Kennw ...

Die Verwendung der Großbuchstaben eines ausgedachten Satzes sorgt für ein sicheres Kennwort.

### Mit steigender Zeichenanzahl erhöht sich die Sicherheit.!

## Welche Aussagen im Bezug auf Passwort-Hashing sind korrekt?

Welche Aussagen im Bezug auf Passwort-Hashing sind korrekt?

### Der erzeugte Hash kann nicht in den ursprünglichen Wert wieder zurück verwandelt werden.!

### Der entstandene Hash ist eine eindeutige Signatur des ursprünglichen Wertes.!

### Der Klartext wird in eine chiffrierte Form umgewandelt.

### Der Klartextwert selbst dient als Schlu.ssel.!

## Was bewirkt das Konsolen-Kommando composer install?

Was bewirkt das Konsolen-Kommando composer install?

### Es installiert alle Abhängigkeiten, die in der .json-Datei hinterlegt sind.!

### Es installiert alle Bibliotheken, die in der .json-Datei hinterlegt sind.!

### Es erzeugt die Datei autoload_namespaces.php, wo die unterschiedlichen Pakete abgelegt sin ...!

Es erzeugt die Datei autoload_namespaces.php, wo die unterschiedlichen Pakete abgelegt sind, und ermöglicht damit die Funktionsfähigkeit des Autoloaders.

### Es erzeugt die Datei composer.lock, in der die genauen Versionen aller installierten Paket ...!

Es erzeugt die Datei composer.lock, in der die genauen Versionen aller installierten Pakete gespeichert werden.

## Doctrine nutzt das Entwurfsmuster Unit of Work.\nMit welcher Methode werden die gesammelte ...

Doctrine nutzt das Entwurfsmuster Unit of Work.\nMit welcher Methode werden die gesammelten SQL-Anweisungen ausgeführt?

### EntityManager#flush()!

### EntityManager#unit()

### EntityManager#purge()

### EntityManager#work()

### EntityManager#persist()

## Welche Aussagen zum Thema Hashing sind korrekt?

Welche Aussagen zum Thema Hashing sind korrekt?

### MD5 ist ein Hashing-Algorithmus, der speziell für Kennwörter entwickelt wurde.!

### Der ursprüngliche Klartext ist über seine Signatur eindeutig identifizierbar.

### Der Hash-Vorgang selbst ist nicht erkennbar.!

### Der Klartext wird in eine chiffrierte Form umgewandelt, aus welcher der ursprüngliche Wer ...

Der Klartext wird in eine chiffrierte Form umgewandelt, aus welcher der ursprüngliche Wert wieder ermittelt werden kann.

## Welche Arten von Cross-Site-Scripting gibt es?

Welche Arten von Cross-Site-Scripting gibt es?

### Reflektiertes XSS!

### Defacement XSS

### Drive-By-Download XSS

### Persistens XSS!

## Welche Aussagen zum Namespace PHP\Entities sind korrekt?

Welche Aussagen zum Namespace PHP\Entities sind korrekt?

### Namespaces die mit PHP beginnen, können verwendet werden.

### Namespaces die mit PHP beginnen, sollten nicht verwendet werden.!

### Namespaces die Entities beinhalten, sollten nicht verwendet werden.

## Wie wird in Doctrine 2 eine native SQL-Anweisung ausgeführt?

Wie wird in Doctrine 2 eine native SQL-Anweisung ausgeführt?

### $em->getConnection(...)

### $em->getRepository(...)!

### $em->getConfiguration(...)

## In $datum ist ein Objekt der Klasse DateTime.\nWie können Sie das Datum ausgeben?

In $datum ist ein Objekt der Klasse DateTime.\nWie können Sie das Datum ausgeben?

### $datum->format('%Y-%m-%d');

### $datum->format('Y-m-d');!

### $datum->format('d-m-Y');!

### $datum->format('%d-%m-%Y');

## Aus einer Tabelle mit den Spalten id, title, description soll gelesen werden.\nEine Instan ...

Aus einer Tabelle mit den Spalten id, title, description soll gelesen werden.\nEine Instanz der Klasse Doctrine/ORM/Entity/Repository bietet hierfür welche der folgenden Methoden?

### EntityRepository#findAll()!

### EntityRepository#FindOneById()!

### EntityRepository#find()!

### EntityRepository#findByTitle()!

## Welche Aussage zum Data Mapper trifft zu?

Welche Aussage zum Data Mapper trifft zu?

### Doctrine ist keine Implementierung von diesem Entwurfsmuster.

### Datenverwaltung und Datenhaltung wird getrennt.!

### Es ist ein sehr unflexibles Entwurfsmuster.

