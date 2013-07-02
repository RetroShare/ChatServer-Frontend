<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type"></meta>
	<title>Chat Server - Добавление нового ключа</title>
</head>

<body>

	<?php
		//echo sqlite_libversion();
		//echo $lang[0];
		//echo "<br>";
		//echo phpversion();
		//include 'manage_db_auto_clean.php';
	?>

	<h1 style="text-align: center;">Retroshare чат Сервер</h1>

		<p>Этот инструмент поможет вам обмениваться RetroShare ключами.</p>
		<p>Chatserver - такой же участник сети, то есть ваш друг, только искуственный<p>
		<p>В его чат-комнатах вы сможете завести друзей для существования в сети RetroShare<p>

	<h2>Небольшая инструкция</h2>

		<ol>
			<li> Введите ваш Retroshare ключ (<img src="images/options.png" alt="Options"> => <img src="images/profile.png" alt="Profile"> => <img src="images/certificate.png" alt="Certificate"> => скопируйте и вставьте).</li>
			<li> На следующей странице вы получите доступ к ключу чат серверa, где общаются другие пользователи.</li>
			<li> Добавьте чат-сервер в ваш список друзей (<img src="images/friends.png" alt="Friends"> => <img src="images/add-friends.png" alt="Add Friends">)</li>
			<li> Общайтесь с другими людьми и обменивайтесь ключами, чтобы пополнить список друзей!</li>
		</ol>

 <hr></hr>

	<h2>Введите свой ключ</h2>
	<p>Эта процедура нужна для заведения новых друзей через чат<p>

		<form method="post" action="process.php" name="process">
			<fieldset>
				<table border='0'>
				<tr><td valign="top">RetroShare ключ:</td><td><textarea name="key" rows="10" cols="85"></textarea></td></tr>
				<tr><td>Код капчи:<br/><img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image"></img></td><td><input name="captcha_code" size="10" maxlength="6" type="text"></input><a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false">[ Новое изображение ]</a></td></tr>
				</table>
				<input value="Отправить" type="submit"></input>
			</fieldset>
		</form>
</body>

</html>
