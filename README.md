# VierGewinnt

Projekt der Gruppe "Webengineering 1,0 Rasur" für Web Engineering.










Ziel 1.0



## Changes

- Die Datenbank heißt nun überall "viergewinnt"
- Zur Tabelle user_table wurden zwei Spalten hinzugefügt

## Bugs

Beim Versuch einen Benutzer mit einer vorhandenen E-Mail zu erstellen, wird man nach der Fehlermeldung nicht wieder zur Registrierungsseite zurückgeleitet<br>

<em>Fixed</em><br>
~~Wenn auf eine Popup-Message das mit dem header folgt (siehe unten), wird man direkt weitergeleitet ohne Fehlermeldung. Beispiel: Wenn man beim login ein falsches Passwort eingibt, sollte ein Popup erscheinen: <br><br>
	$message = "Wrong Email or Password"; <br>
     	echo "<script type='text/javascript'>alert('$message');</script>"; <br>
      	header("Location: ../HTML/login.html"); <br><br>
Man wird allerdings direkt wieder auf die Login-Seite weitergeleitet. <br>~~

## To Change
Alle Seiten <br>
-In der Navigationsleiste Settings und Logout als ein Dropdown-Menü, wenn man auf den Avatar drückt anzeigen (MMIT-kewe) <br>
-Navigationsleiste evtl. Farbschema ändern (MMIT-kewe) <br>

Game, Settings, Lobby <br>
~~-Bei den Weiterleitungen zu der Error Page die Adresse zu login.html ändern und eine Fehlermeldung anzeigen (MMIT-kewe) <br>
-Überprüfen, ob der Cookie nicht älter als 48h ist, ansonsten Weiterleitung zu login.html mit Fehlermeldung (Jannik) <br>~~

Settings <br>
-Im Alter Feld nichts anzeigen, wenn das Alter nicht angegeben wurde bzw. auf 0 steht (Dorian) <br>
	-Passwort-Feld entfernen (Dorian) <br>
	-Bild hinzufügen bzw. ändern Funktion hinzufügen (Dorian) <br>
	-evtl. Farbe von spieler1 und spieler2 in Settings wählbar machen <br>
	-evtl. Spielhistorie (z.B. Siege: 5 Niederlagen: 3) <br>

Game <br>
	-Sieg Erkennung bei Diagonalen Siegen (MMIT kewe) <br>
	~~-Spielfeld regelmäßig mit AJAX updaten (Update-Button entfernen) (MMIT-kewe) <br>
	-relative URIs benutzen (MMIT-kewe) <br>
	-Spiel nach Sieg in der Datenbank löschen (MMIT-kewe) <br>
	-Securitytoken statt IP nutzen (MMIT-kewe)~~ <br>

Lobby <br>
	~~- evtl. Spiel erstellen mit AJAX ersetzen anstatt mit PHP <br>~~
-Fehlermeldung beim Versuch ein neues Spiel zu erstellen, wenn noch ein Spiel offen ist verschönern (janm1) <br>
~~-Nickname statt IP bei „Erstellt von“ nutzen (Jannik) [„SELECT nickname FROM user_table WHERE securititoken = $_COOKIE[„token“]“] <br>~~
~~-Spiel beitreten Funktionalität hinzufügen (MMIT-kewe) <br>~~
~~-evtl. offene Spiele anzeigen im Code mit AJAX ersetzen (derzeit PHP) <br>~~
~~-evtl. Spielnummerierung überarbeiten <br>~~

Registrierung
- „Passwort wiederholen“-Feld hinzufügen und prüfen, ob die Passwörter übereinstimmen, bevor das Dokument abgeschickt wird (Jan) <br>
-Bei unvollständig ausgefüllten Dokument (z.B. Passwort vergessen) passende Fehlermeldung ausgeben [am besten mit …/login?error= z.B. 5 damit man Fehlermeldungen angeben kann, wenn man zur Login Seite weiterleitet] (janm1) <br>
	4 Sollten genügen <br>
		- „Bitte füllen sie das Nickname feld aus“ <br>
		- „Bitte füllen sie das email feld aus“ <br>
		- „Die Passwörter stimmen nicht überein“ <br>
		- „Um auf diese Seite zugreifen zu können, müssen sie eingeloggt sein“ <br>
-Securitytoken unique machen (janm1) <br>
-Im Bild-Feld der user_table standartmäßig ein Beispielbild reinmachen, z.B. ein Anonymus-User Bild (Jannik) <br>

Login <br>
~~-Zeitstempel zum Cookie hinzufügen (z.B. „token=random-number; creation-time: 16.08.2019;“) (Jannik)~~ <br>

