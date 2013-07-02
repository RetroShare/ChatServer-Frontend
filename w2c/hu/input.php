<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type"></meta>
	<title>Csetszerver - Új kulcs</title>
</head>

<body>

	<?php
		//echo sqlite_libversion();
		//echo "<br>";
		//echo phpversion();
		//include 'manage_db_auto_clean.php';
	?>

	<h1 style="text-align: center;">RetroShare Csetszerver</h1>

		<p>Ez az eszköz arra szolgál, hogy segítsen neked kulcsot cserélni másokkal. Hozzáférést ad a csetszobákhoz, hogy új barátokat tudj szerezni.</p>

	<h2>Rövid útmutató</h2>

		<ol>
			<li> Add meg a RetroShare kulcsodat.</li>
			<li> A következő lapon, hozzáférést kapsz a csetszerver kulcsához, ami hozzáférést biztosít a csetszobákhoz, ahol megtalálható a közösség többi tagja, akik csetelnek éppen.</li>
			<li> Beszélgess másokkal és cseréljetek kulcsot!</li>
		</ol>

	<hr style="width: 60%; height: 2px;"></hr>

	<h2>Regisztráld a kulcsod</h2>

		<form method="post" action="process.php" name="process">
			<fieldset>
				<table border='0'>
				<tr><td valign="top">RetroShare kulcs:</td><td><textarea name="key" rows="10" cols="85"></textarea></td></tr>
				<tr><td>Kapcsa:<br/><img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA kép"></img></td><td><input name="captcha_code" size="10" maxlength="6" type="text"></input><a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false">[ Másik kép ]</a></td></tr>
				</table>
				<input value="Érvényesít" type="submit"></input>
			</fieldset>
		</form>
</body>

</html>
