<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Serveur de clés</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
 
	<body>
		<?php

			$file_config = parse_ini_file("../config.ini") or die("Can't open config file");
			$path_to_s2c = $file_config['url'];
			$passwd_root_chk = $file_config['passwd_root'];
		
			$time = time();
			$view = $_GET['view'];
			$clean_all = $_GET['clean_all'];
			$passwd_root = sqlite_escape_string($_GET['passwd_root']);

			if ($view == 1 and $passwd_root == $passwd_root_chk) {

				//include 'crypt.php';

				// Open database
				$dbhandle = sqlite_open('keys.db', 0640, $error);
				if (!$dbhandle) die ($error);
				
				// Select IPs
				$query = "SELECT ip, date FROM IPs";
				$result = sqlite_query($dbhandle, $query);
				if (!$result) die("Cannot execute query.");
				$n_ip = sqlite_num_rows($result);
				echo "Number of IPs in the database: $n_ip" . "<br/> \n";

				echo "<table border='1'>\n";
				echo "<tr>\n";
				echo "<th>" . "IP" . "</th><th>" . "Time left" . "</th>\n";
				echo "</tr>\n";				
				while ($row = sqlite_fetch_array($result, SQLITE_ASSOC)) {
					//echo $row['ip'] . " " . ceil((($row['date'] + 1800) - $time)/60) . "<br/> \n";
					echo "<tr>\n";
					echo "<td>" . $row['ip'] . "</td><td>" . ceil((($row['date'] + 600) - $time)/60) . "</td> \n";
					echo "</tr>\n";
				}
				echo "</table>\n";

				sqlite_close($dbhandle);
			}
			
		?>
	</body>
</html>
