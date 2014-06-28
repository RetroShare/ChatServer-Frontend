<?php
	exec('ps ax | grep "retroshare" | grep -v "grep" | wc -l', $ps_out);
	
	if ($ps_out[0] == '0'){
			echo "<br /><br /><small>Server-ul de discuții este momentan indisponibil; va fi disponibil cât de repede posibil. Între timp, puteți să vă introduceți cheia, va fi luată în considerare. Mulțumim pentru înțelegere.</small>";
	}
	
	else{
		$file_config = parse_ini_file("../config.ini") or die("Imposibil de a deschide fișierul de configurare");
		$nogui_path = $file_config['nogui_path'];
		$server_num = file_get_contents($nogui_path."/STORAGE/lobbyname.txt");
		echo "<br /><br /><small>Pentru informarea dumneavoastră, server-ul real de discuții este <strong>".$server_num."</strong>.</small>";
	}
?>
