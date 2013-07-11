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

	<h1 style="text-align: center;">RetroShare Chat Server</h1>

		<p>This tool will help you to exchange your RetroShare key. It will give you access to chat lobbies in order to make some friends.</p>

	<h2>Brief tutorial</h2>

		<ol>
			<li> You enter your RetroShare key.</li>
			<li> On the following page, you will have access to the chat server key which will give you access to chat lobbies where other members of the community are already chatting.</li>
			<li> Chat with other people and exchange your key!</li>
		</ol>

	<hr style="width: 60%; height: 2px;"></hr>

	<h2>Register a new key</h2>

		<form method="post" action="process.php" name="process">
			<fieldset>
				<table border='0'>
				<tr><td valign="top">RetroShare key:</td><td><textarea name="key" rows="10" cols="85"></textarea></td></tr>
				<tr><td>Captcha code:<br/><img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image"></img></td><td><input name="captcha_code" size="10" maxlength="6" type="text"></input><a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a></td></tr>
				</table>
				<input value="Validate" type="submit"></input>
			</fieldset>
		</form>
</body>

</html>
