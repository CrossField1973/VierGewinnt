# VierGewinnt

Projekt der Gruppe "Webengineering 1,0 Rasur" für Web Engineering.










Ziel 1.0



## Changes

- Die Datenbank heißt nun überall "viergewinnt"
- Zur Tabelle user_table wurden zwei Spalten hinzugefügt

## Bugs

Beim Versuch einen Benutzer mit einer vorhandenen E-Mail zu erstellen, wird man nach der Fehlermeldung nicht wieder zur Registrierungsseite zurückgeleitet<br><br>

<em>Fixed</em><br>
Wenn auf eine Popup-Message das mit dem header folgt (siehe unten), wird man direkt weitergeleitet ohne Fehlermeldung. Beispiel: Wenn man beim login ein falsches Passwort eingibt, sollte ein Popup erscheinen: <br><br>
	$message = "Wrong Email or Password"; <br>
     	echo "<script type='text/javascript'>alert('$message');</script>"; <br>
      	header("Location: ../HTML/login.html"); <br><br>
Man wird allerdings direkt wieder auf die Login-Seite weitergeleitet. <br>

## Zu Erledigen
Alle Seiten <br>
-In der Navigationsleiste Settings und Logout als ein Dropdown-Menü, wenn man auf den Avatar drückt anzeigen <b>(MMIT-kewe)</b> <br>

Settings <br>
-Im Alter Feld nichts anzeigen, wenn das Alter nicht angegeben wurde bzw. auf 0 steht <b>(Dorian)</b> <br>
	-Passwort-Feld entfernen <b>(Dorian)</b> <br>
	-Bild hinzufügen bzw. ändern Funktion hinzufügen <b>(Dorian)</b> <br>
	-evtl. Farbe von spieler1 und spieler2 in Settings wählbar machen <br>
	-evtl. Spielhistorie (z.B. Siege: 5 Niederlagen: 3) <br>

Game <br>
	-Sieg Erkennung bei Diagonalen Siegen <b>(MMIT kewe)</b> <br>

Lobby <br>
-Fehlermeldung beim Versuch ein neues Spiel zu erstellen, wenn noch ein Spiel offen ist verschönern <b>(Jannik)</b> <br>

Registrierung
- „Passwort wiederholen“-Feld hinzufügen und prüfen, ob die Passwörter übereinstimmen, bevor das Dokument abgeschickt wird <b>(janm1)</b> <br>
-Bei unvollständig ausgefüllten Dokument (z.B. Passwort vergessen) passende Fehlermeldung ausgeben [am besten mit …/login?error= z.B. 5 damit man Fehlermeldungen angeben kann, wenn man zur Login Seite weiterleitet] <b>(janm1)</b> <br>
	4 Sollten genügen <br>
		- „Bitte füllen sie das Nickname feld aus“ <br>
		- „Bitte füllen sie das email feld aus“ <br>
		- „Die Passwörter stimmen nicht überein“ <br>
		- „Um auf diese Seite zugreifen zu können, müssen sie eingeloggt sein“ <br>
-Securitytoken unique machen <b>(janm1)</b> <br>
-Im Bild-Feld der user_table standartmäßig ein Beispielbild reinmachen, z.B. ein Anonymus-User Bild <b>(Jannik)</b> <br>
