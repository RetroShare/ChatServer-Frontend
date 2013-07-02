<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Chat Server - New Key</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
 
	<body>
		<?php //ini_set('display_errors', 'on'); error_reporting(E_ALL);
			//THIS version is DEVOID of SQLITE and IP CHECKING. --Jenster 01/16/12
			// Open config file
			$file_config = parse_ini_file("../config.ini") or die("Can't open config file");
			$nogui_path = $file_config['nogui_path'];
			$error = 0 ;
			// Get the key
			$key = trim(preg_replace('/--LOCAL--.*/','', $_POST['key']));
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
				echo "Ihr Retroshare-Schl&uuml;ssel wurde nicht richtig erkannt. Bitte f&uuml;gen sie den vollst&aauml;ndigen Schl&uuml;ssel im alten Schl&uuml;ssel-Format ein, also einschließlich -----BEGIN PGP PUBLIC KEY BLOCK-----, -----END PGP PUBLIC KEY BLOCK-----, --SSLID-- and --LOCATION--.<br /><br />" ;
				echo "Bitte gehen sie <a href='javascript:history.go(-1)'>zurück</a> und versuchen Sie es erneut.";
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
				echo "Der Captcha-Code ist falsch!<br /><br />";
				echo "Bitte gehen Sie <a href='javascript:history.go(-1)'> zurück</a> und versuchen sie es erneut.";
				exit();
			}
			
			// -------------------------
			// Check IP
			// -------------------------
			
			
			

			// -------------------------
			// Now we can process
			// -------------------------
			if($chk_securimage and $chk_key) {

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
				echo "auf den folgenden Link, um hinzuzufügen, um den Chat-Server hinzu Klicken Sie auf: ";
				echo "<a href=\"".$server_url."\">Add chat server</a><br/>\n";

				//Print key
				echo "Im Falle von Problemen, manuell den folgenden Schlüssel hinzu:";				
				echo "<form name=\"select_all\">";
				echo "<p><textarea name=\"key_area\" rows=\"25\" cols=\"80\" readonly=\"readonly\">".$server_key."</textarea></p>";

				echo "<p><input type=\"button\" value=\"Select key\" onClick=\"javascript:this.form.key_area.focus();this.form.key_area.select();\"></p>";
				echo "</form>";
				
				echo "In ein paar Minuten, sollte der CHAT-SERVER als ihr neuer Freund online sein. Danach sind die neuen Chat-Lobbies unter Freunde --> Chat-Lobbys als &ouml;ffentliche Lobbies sichtbar. Mit einem Doppelklick joint ihr diese ;-) <br />
				Die aktuelle Chat-Lobby ist <strong>".$server_num."</strong>.";			
				// Store IP				
			}
			
		?>
	</body>
</html>
