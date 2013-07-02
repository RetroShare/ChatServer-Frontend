<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Csetszerver - Új kulcs</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
 
	<body>
		<?php //ini_set('display_errors', 'on'); error_reporting(E_ALL);
		
			// Open config file
			$file_config = parse_ini_file("../config.ini") or die("Can't open config file");
			$nogui_path = $file_config['nogui_path'];
			
			// Get the key
			$key = sqlite_escape_string(trim(preg_replace('/--LOCAL--.*/','', $_POST['key'])));
			$key_sha1 = hash('sha1', $key);
			$time = time();
			
			// Secureimage
			//include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
			include_once '../securimage/securimage.php';
			$securimage = new Securimage();
			
			// IP address
			if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$IP = $_SERVER['HTTP_X_FORWARDED_FOR']; 
			elseif(isset($_SERVER['HTTP_CLIENT_IP']))   
				$IP = $_SERVER['HTTP_CLIENT_IP'];   
			else
				$IP = $_SERVER['REMOTE_ADDR'];  

			// -------------------------
			// Check key
			// -------------------------
			$chk_key = false;
			// The "i" make the search case insensitive
			if (preg_match("/^\s*-----BEGIN PGP PUBLIC KEY BLOCK-----[^-]+-----END PGP PUBLIC KEY BLOCK-----\s+--SSLID--[a-f0-9]+;--LOCATION--[^;]+;[\S\s]*$/", $key)) {
				$chk_key = true;
			} 
			
			else {
				echo "Valami probléma akadt a kulcsoddal! A teljes kulcsodat másold ide, ami tartalmazza ezt is:  -----BEGIN PGP PUBLIC KEY BLOCK-----, -----END PGP PUBLIC KEY BLOCK-----, --SSLID-- and --LOCATION--.<br /><br />" ;
				echo "Kérlek lépj egyet <a href='javascript:history.go(-1)'>vissza</a> és próbáld meg újra!";
				exit();
			}

			// -------------------------
			// Check captcha
			// -------------------------
			$chk_securimage = false;
			if ($securimage->check($_POST['captcha_code']) == true) {
				$chk_securimage = true;
			}	
			else {
				// the code was incorrect
				// you should handle the error so that the form processor doesn't continue

				// or you can use the following code if there is no validation or you do not know how
				echo "A kapcsa nem pontos!<br /><br />";
				echo "Kérlek lépj egyet <a href='javascript:history.go(-1)'>vissza</a> és próbáld meg újra.";
				exit();
			}
			
			// -------------------------
			// Check IP
			// -------------------------
			$chk_ip = false;
			
			// Open database
			$dbhandle = sqlite_open('../data/keys.db', 0640, $error);
			if (!$dbhandle) die ($error);
			
			// Delete old enries
			$stm = "DELETE FROM IPs WHERE date + 600 < $time";
			$ok = sqlite_exec($dbhandle, $stm);
			if (!$ok) die("Impossible to remove an entry.\n");
			
			$query = "SELECT date FROM IPs WHERE ip == '$IP'";
			$result = sqlite_query($dbhandle, $query);
			if (!$result) die("Cannot execute query.");
			
			if (sqlite_num_rows($result) == 0) {
				$chk_ip = true;
				sqlite_close($dbhandle);
				
			}
			else {
				$row = sqlite_fetch_array($result, SQLITE_ASSOC);
				echo "Tíz percenként csak egy kulcsot regisztrálhatsz. Kérlek próbáld újra ", ceil((($row['date'] + 600) - $time)/60), " perc múlva!" ;
				sqlite_close($dbhandle);
				exit();
			}

			// -------------------------
			// Now we can process
			// -------------------------
			if($chk_securimage and $chk_ip and $chk_key) {

				// Write key in the NEWCERTS folder
				$file_sha1 = fopen($nogui_path."/NEWCERTS/".$key_sha1.".rsc", 'w') or die("Can't open file");
				fwrite($file_sha1, $key);
				fclose($file_sha1);
				chmod($nogui_path."/NEWCERTS/".$key_sha1.".rsc", 0666);

				// Get server infos
				$server_key = file_get_contents($nogui_path."/STORAGE/serverkey.txt");
				$server_url = file_get_contents($nogui_path."/STORAGE/hyperlink.txt");
				$server_num = file_get_contents($nogui_path."/STORAGE/lobbyname.txt");
				
				//Print URL
				echo "Kattints a következő linkre, hogy hozzáadd a csetszervert: ";
				echo "<a href=\"".$server_url."\">Csetszerver hozzáadása</a><br/>\n";

				//Print key
				echo "Probléma esetén add hozzá kézzel a következő kulcsot:";				
				echo "<form name=\"select_all\">";
				echo "<p><textarea name=\"key_area\" rows=\"25\" cols=\"80\" readonly=\"readonly\">".$server_key."</textarea></p>";
				echo "<p><input type=\"button\" value=\"Select key\" onClick=\"javascript:this.form.key_area.focus();this.form.key_area.select();\"></p>";
				echo "</form>";
				
				echo "Pár perc múlva az új barátod (CHAT SERVER) elérhető lesz. Hozzá fogsz férni a csetszobákhoz, ahol barátokat tudsz szerezni. Az aktuális szoba: <strong>".$server_num."</strong>.";
				
				// Store IP
				$dbhandle = sqlite_open('../data/keys.db', 0640, $error);
				if (!$dbhandle) die ($error);
				$stm = "INSERT INTO IPs VALUES('$IP', $time)";
				$ok = sqlite_exec($dbhandle, $stm);
				if (!$ok) die("Információ: nem lehet hozzáadni az IP címedet az adatbázishoz.<br/>\n");
				sqlite_close($dbhandle);
			}
			
		?>
	</body>
</html>
