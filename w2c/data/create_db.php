<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Serveur de clés - Création Base de Données</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
 
	<body>
		<?php ini_set('display_errors', 'on'); error_reporting(E_ALL);
		
			$dbhandle = sqlite_open('keys.db', 0640, $error);
			if (!$dbhandle) die ($error);
			
			$stm = "CREATE TABLE IPs(ip TEXT UNIQUE, date INTEGER NOT NULL DEFAULT 0)";
			$ok = sqlite_exec($dbhandle, $stm, $error);

			if (!$ok)
			   die("Cannot execute query. $error");

			echo "Database IPs created successfully!<br/>";

			sqlite_close($dbhandle);
		?>
	</body>
</html>
