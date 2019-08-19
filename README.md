# VierGewinnt

Projekt der Gruppe "Webengineering 1,0 Rasur" für Web Engineering.










Ziel 1.0



## Changes

Zur Tabelle user_table wurden zwei Spalten hinzugefügt - bitte updaten

## To Change
Alle Seiten 
-In der Navigationsleiste Settings und Logout als ein Dropdown-Menü, wenn man auf den Avatar drückt anzeigen (Kevin)
-Navigationsleiste evtl. Farbschema ändern (Kevin)

Game, Settings, Lobby
-Bei den Weiterleitungen zu der Error Page die Adresse zu login.html ändern und eine Fehlermeldung anzeigen (Kevin)
-Überprüfen, ob der Cookie nicht älter als 48h ist, ansonsten Weiterleitung zu login.html mit Fehlermeldung (Jannik)

Settings
-Im Alter Feld nichts anzeigen, wenn das Alter nicht angegeben wurde bzw. auf 0 steht (Dorian)
	-Passwort-Feld entfernen (Dorian)
	-Bild hinzufügen bzw. ändern Funktion hinzufügen (Dorian)
	-evtl. Farbe von spieler1 und spieler2 in Settings wählbar machen
	-evtl. Spielhistorie (z.B. Siege: 5 Niederlagen: 3)

Game
	-Sieg Erkennung bei Diagonalen Siegen (Kevin)
	~~-Spielfeld regelmäßig mit AJAX updaten (Update-Button entfernen) (Kevin)
	-relative URIs benutzen (Kevin)
	-Spiel nach Sieg in der Datenbank löschen (Kevin)
	-Securitytoken statt IP nutzen (Kevin)~~

Lobby
	- evtl. Spiel erstellen mit AJAX ersetzen anstatt mit PHP
-Fehlermeldung beim Versuch ein neues Spiel zu erstellen, wenn noch ein Spiel offen ist verschönern (Jan)
-Nickname statt IP bei „Erstellt von“ nutzen (Jannik) [„SELECT nickname FROM user_table WHERE securititoken = $_COOKIE[„token“]“]
-Spiel beitreten Funktionalität hinzufügen (Kevin)
-evtl. offene Spiele anzeigen im Code mit AJAX ersetzen (derzeit PHP)
-evtl. Spielnummerierung überarbeiten

Registrierung
- „Passwort wiederholen“-Feld hinzufügen und prüfen, ob die Passwörter übereinstimmen, bevor das Dokument abgeschickt wird (Jan)
-Bei unvollständig ausgefüllten Dokument (z.B. Passwort vergessen) passende Fehlermeldung ausgeben [am besten mit …/login?error= z.B. 5 damit man Fehlermeldungen angeben kann, wenn man zur Login Seite weiterleitet] (Jan)
	4 Sollten genügen
		- „Bitte füllen sie das Nickname feld aus“
		- „Bitte füllen sie das email feld aus“
		- „Die Passwörter stimmen nicht überein“
		- „Um auf diese Seite zugreifen zu können, müssen sie eingeloggt sein“
-Securitytoken unique machen (Jan)
-Im Bild-Feld der user_table standartmäßig ein Beispielbild reinmachen, z.B. ein Anonymus-User Bild (Jannik)

Login
-Zeitstempel zum Cookie hinzufügen (z.B. „token=random-number; creation-time: 16.08.2019;“) (Jannik)

