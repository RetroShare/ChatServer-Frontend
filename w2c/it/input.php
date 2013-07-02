<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" >

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type"></meta>
	<title>Chat Server - Nuova Chiave</title>
</head>

<body>

	<?php
		//echo sqlite_libversion();
		//echo "<br>";
		//echo phpversion();
		//include 'manage_db_auto_clean.php';
	?>

	<h1 style="text-align: center;">RetroShare Chat Server</h1>

		<p>Questo tool ti aiuter&agrave; a condividere la tua chiave RetroShare. Ti dar&agrave; anche accesso ad alcune chat lobbies permettendoti di fare nuovi amici.</p>

	<h2>Piccola introduzione</h2>

		<ol>
			<li> Inserisci la tu chiave RetroShare.</li>
			<li> Nella pagina successiva riceverai la chiave del chat server, che ti permetter&agrave; l'accesso alle varie chat lobbies dove gli altri membri della comunity stanno gi&agrave; chattando.</li>
			<li> Chatta con gli altri, e scambia la tua chiave!</li>
		</ol>

	<hr style="width: 60%; height: 2px;"></hr>

	<h2>Registra una nuova chiave</h2>

		<form method="post" action="process.php" name="process">
			<fieldset>
				<table border='0'>
				<tr><td valign="top">RetroShare key:</td><td><textarea name="key" rows="10" cols="85"></textarea></td></tr>
				<tr><td>Captcha code:<br/><img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image"></img></td><td><input name="captcha_code" size="10" maxlength="6" type="text"></input><a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false">[ Rigenera captcha ]</a></td></tr>
				</table>
				<input value="Validate" type="submit"></input>
			</fieldset>
		</form>
</body>

</html>
