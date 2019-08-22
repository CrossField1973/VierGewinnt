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
-Bild hinzufügen bzw. ändern Funktion hinzufügen <b>(Dorian)</b> <br>

Game <br>
	-Sieg Erkennung bei Diagonalen Siegen <b>(MMIT kewe)</b> <br>

Registrierung
- „Passwort wiederholen“-Feld hinzufügen und prüfen, ob die Passwörter übereinstimmen, bevor das Dokument abgeschickt wird <b>(Jannik)</b> <br>
-Securitytoken unique machen <b>(Jannik)</b> <br>
