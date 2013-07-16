<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" >

<head>
	<meta charset="utf-8">
	<title>RetroShare Chat Server - Key Exchange</title>
</head>

<body>

<?php
        $translation = file('translation.txt', FILE_IGNORE_NEW_LINES);
        $transcount = count($translation);
        for ($i = 0; $i < $transcount; $i++) {
                $translation[$i] = substr($translation[$i], 3);
                }
?>
	<h1 style="text-align: center;"><?php echo $translation[0] ; ?> </h1>
		<p><?php echo $translation[1] ?></p>
		

	<h2><?php echo $translation[2] ?></h2>

		<ol>
			<?php 
				if(!($translation[3] == NULL)) { 
				echo "<li>" . $translation[3] . "</li>" ;
				}
                                if(!($translation[4] == NULL)) { 
                                echo "<li>" . $translation[4] . "</li>" ;
                                }
                                if(!($translation[5] == NULL)) { 
                                echo "<li>" . $translation[5] . "</li>" ;
                                }
                                if(!($translation[6] == NULL)) { 
                                echo "<li>" . $translation[6] . "</li>" ;
                                }
                                if(!($translation[7] == NULL)) { 
                                echo "<li>" . $translation[7] . "</li>" ;
                                }
                                if(!($translation[8] == NULL)) { 
                                echo "<li>" . $translation[8] . "</li>" ;
                                }
                                if(!($translation[9] == NULL)) { 
                                echo "<li>" . $translation[9] . "</li>" ;
                                }
				if(!($translation[10] == NULL)) {
                                echo "<li>" . $translation[10] . "</li>" ;
                                }
			?>
		</ol>

	<hr style="width: 60%; height: 2px;"></hr>

	<h2><?php echo $translation[11] ?></h2>
		<form method="post" action="process.php" name="process">
			<fieldset>
				<table border='0'>
				<tr><td valign="top"><?php echo $translation[12] ?></td><td><textarea name="key" rows="10" cols="85"></textarea></td></tr>
				<tr><td><?php echo $translation[13] ?><br/><img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image"></img></td><td><input name="captcha_code" size="10" maxlength="6" type="text"></input><a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false"><?php echo $translation[14] ?></a></td></tr>
				</table>
				<input value="<?php echo $translation[15] ?>" type="submit"></input>
			</fieldset>
		</form>

</body>

</html>
