<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" >

<head>
	<meta charset="utf-8">
	<title>RetroShare Chat Server - Schl&uuml;sselaustausch</title>
</head>

<body>

	<?php
		//echo sqlite_libversion();
		//echo "<br>";
		//echo phpversion();
		//include 'manage_db_auto_clean.php';
	?>

	<h1 style="text-align: center;">RetroShare Chat Server</h1>
		<p>
			Willkommen beim RetroShare Chat Server Web-Tool. Dieses Web-Tool hilft Ihnen dabei, Ihren Retroshare Schlüssel mit diesem Retroshare Chat-Server auszutauschen.
			Nachdem Schl&uuml;sselaustausch haben Sie Zugriff auf die von diesem Server angebotenen Chat-Lobbies, um mit anderen Retroshare 
			Nutzern in Echtzeit zu kommunizieren.
		</p>
		

	<h2>Kurze Anleitung zum Schl&uuml;sselaustausch:</h2>

		<ol>
			<li>Kopieren Sie Ihren Retroshare-Schl&uuml;ssel in die Zwischenablage <br/> (Optionen --> Sicherheit --> Schl&uuml;ssel kopieren).</li>
			<li>F&uuml;gen Sie Ihren Retroshare-Schl&uuml;ssel in das untere Formular ein (Str+V) <br/> und bestätigen Sie die Sicherheitsabfrage (Capture)</li>
			<li>Nach erfolgreicher Eingabe erhalten Sie auf der n&auml;chsten Seite den Retroshare-Schl&uuml;ssel dieses Chat-Servers als Antwort zur&uuml;ck.</li>
			<li>Kopieren Sie den Schl&uuml;ssel des Chat-Server in die Zwischenablage (Str+C) <br/>und f&uuml;gen Sie anschließend den Chat-Server wie gew&ouml;hnlich als Ihren Freund in Retroshare hinzu <br/>(Einen Neuen Freund hinzuf&uuml;gen --> Gib das Zertifikate manuell ein --> Str+V )
			<li>Nach einigen Minuten sollten sie mit dem Chat-Server verbunden sein. Die neuen Chat-Lobbies sehen Sie dann als &ouml;ffentliche Lobbies  und k&oouml;nnen diese per Doppelklick betreten <br/>(Hauptmenü --> Freunde --> Chat-Lobbys)</li>
			<li>Tipp: Innerhalb einer Chat-Lobby k&ouml;nnen Sie Ihren Retroshare-Schl&uuml;ssel anderen Teilnehmern der Lobby mitteilen. Dazu reicht ein Rechtsklick ins Chat-Fenster --> Eigenen Retroshare Zertifikate Link einf&uuml;gen</li>
			<li>Viel Spass beim Chatten!</li>
		</ol>

	<hr style="width: 60%; height: 2px;"></hr>

	<h2>Registrieren Sie hier Ihren Retroshare-Schl&uuml;ssel:</h2>
		<form method="post" action="process.php" name="process">
			<fieldset>
				<table border='0'>
				<tr><td valign="top">Ihr Retroshare-Schl&uuml;ssel:</td><td><textarea name="key" rows="10" cols="85"></textarea></td></tr>
				<tr><td>Captcha code:<br/><img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image"></img></td><td><input name="captcha_code" size="10" maxlength="6" type="text"></input><a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false">[ Anderes Bild ]</a></td></tr>
				</table>
				<input value="Bestätigen" type="submit"></input>
			</fieldset>
		</form>
		<p>
			<strong>Bemerkungen: Nice to know</strong><br />
			(1) Dieser RetroShare Chat Server aktzeptiert momentan nur das alte Schl&uuml;sselformat (-----BEGIN PGP PUBLIC KEY BLOCK-----
Version: OpenPGP:SDK v0.9) <br/> 
			(2) Aktuell wird dieser Chat-Server jeden Mittwoch, Samstag und Sonntag neu gestartet und dabei werden alle Freundschaften zur&uuml;ckgesetzt.
			Um wieder Zugriff auf die Chat-Lobbies dieses Chat-Servers zu bekommen, müssen sie leider momentan den Schl&uuml;sselaustausch 
			über diese Seite erneut vornehmen.<br/> Eine L&ouml;sung ist in Arbeit ;-)<br/>
		</p>



</body>

</html>
