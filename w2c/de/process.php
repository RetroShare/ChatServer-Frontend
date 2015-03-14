<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Chat Server - New Key</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
 
	<body>
<?php
        $translation = file('translation.txt', FILE_IGNORE_NEW_LINES);
        $transcount = count($translation);
        for ($i = 0; $i < $transcount; $i++) {
                $translation[$i] = substr($translation[$i], 3);
                }
?>

		<?php   
			$file_config = parse_ini_file("../config.ini") or die("Can't open config file");
			$nogui_path = $file_config['nogui_path'];
			// Get the key
			$key = $_POST['key'];
			$key_sha1 = hash('sha1', $key);
			
			// Secureimage
			//include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
			include_once '../securimage/securimage.php';
			$securimage = new Securimage();
			


			// -------------------------
			// Check captcha
			// -------------------------
			$chk_securimage = false;
			if ($securimage->check($_POST['captcha_code']) == true) {
				$chk_securimage = true;
			}	
	
			
			//$chk_securimage = true;
			// -------------------------
			// Now we can process
			// -------------------------
			if($chk_securimage) {
				
			/*	echo "<BR>";
				echo $key_sha1;
				echo "<BR>";
				echo $key; 
				echo "<BR>";
				echo "$nogui_path";
				echo "<BR>"; 			*/
				
				// Write key in the NEWCERTS folder
				$file_sha1 = fopen($nogui_path."/NEWCERTS/".$key_sha1.".rsc", 'w') or die("Can't open newcerts file");
				fwrite($file_sha1, $key);
				fclose($file_sha1);
				chmod($nogui_path."/NEWCERTS/".$key_sha1.".rsc", 0666);

				// Get server infos
				$server_key = file_get_contents($nogui_path."/STORAGE/serverkey.txt");
				$server_url = file_get_contents($nogui_path."/STORAGE/hyperlink.txt");
				$server_num = file_get_contents($nogui_path."/STORAGE/lobbyname.txt");
				
				//Print URL
				echo $translation[22] ;
				echo "<a href=\"".$server_url."\">".$translation[23]."</a><br/>\n";

				//Print key
				echo $translation[24] ;				
				echo "<form name=\"select all\">";
				echo "<p><textarea name=\"key_area\" rows=\"25\" cols=\"80\" readonly=\"readonly\">".$server_key."</textarea></p>";
				echo "<p><input type=\"button\" value=\" $translation[27]\" onClick=\"javascript:this.form.key_area.focus();this.form.key_area.select();\"></p>";
				echo "</form>";
				
				echo $translation[25] ." <strong>".$server_num."</strong>.";
		
			}
			
		?>
	</body>
</html>
