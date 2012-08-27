<?php
	exec('ps ax | grep "retroshare" | grep -v "grep" | wc -l', $ps_out);
	
	if ($ps_out[0] == '0'){
			echo "<br /><br /><small>Le serveur de chat semble avoir quelques soucis; la situation sera rétablie dans les plus brefs délais. Cependant, n'hésitez pas à introduire votre clé dès à présent, elle sera prise en compte. Merci de votre patience.</small>";
	}
	
	else{
		$file_config = parse_ini_file("../config.ini") or die("Can't open config file");
		$nogui_path = $file_config['nogui_path'];
		$server_num = file_get_contents($nogui_path."/STORAGE/lobbyname.txt");
		echo "<br /><br /><small>Pour information, le chat d'acceuil actuel est <strong>".$server_num."</strong>.</small>";
	}
?>
