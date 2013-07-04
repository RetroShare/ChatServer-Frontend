<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type"></meta>
	<title>Chat Server - New Key</title>
</head>

<body>

	<?php
		//echo sqlite_libversion();
		//echo $lang[0];
		//echo "<br>";
		//echo phpversion();
		//include 'manage_db_auto_clean.php';
	?>

	<h1 style="text-align: center;">Servidor de Chat RetroShare</h1>

		<p>Esta herramienta está propuesta para facilitar el intercambio de certificados RetroShare. Esto le permitirá conectarse a salas de chat para hacer amigos.</p>

	<h2>Modo de funcionamiento</h2>

		<ol>
			<li> Introduzca su certificado de RetroShare</li>
			<li> En la página siguiente, usted tendrá acceso al certificado del servidor de chat, que le dará acceso a los lobbies de chat donde otros miembros de la comunidad ya están charlando.</li>
			<li> Discuta con otros usuarios y comparta su certificado!</li>
		</ol>

	<hr style="width: 60%; height: 2px;"></hr>

	<h2>Registrar UN nuevo Certificado</h2>

		<form method="post" action="process.php" name="process">
			<fieldset>
				<table border='0'>
				<tr><td valign="top">RetroShare certificado:</td><td><textarea name="key" rows="10" cols="85"></textarea></td></tr>
				<tr><td>Captcha code:<br/><img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image"></img></td><td><input name="captcha_code" size="10" maxlength="6" type="text"></input><a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false">[ Imagen Diferente ]</a></td></tr>
				</table>
				<input value="Validar" type="submit"></input>
			</fieldset>
		</form>
</body>

</html>
