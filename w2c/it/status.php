<?php
	exec('ps ax | grep "retroshare" | grep -v "grep" | wc -l', $ps_out);
	
	if ($ps_out[0] == '0'){
			echo "<br /><br /><small>Attualmente sembra che il chat server abbia qualche problema; Sar&agrave; riparato il prima possibile. Comunque puoi gi&agrave; inserire la tua chiave, sar&agrave; tenuta in considerazione. Grazie per la comprensione.</small>";
	}
	
	else{
		$file_config = parse_ini_file("../config.ini") or die("Can't open config file");
		$nogui_path = $file_config['nogui_path'];
		$server_num = file_get_contents($nogui_path."/STORAGE/lobbyname.txt");
		echo "<br /><br /><small>Per informazione, attualmente il chat server &egrave; <strong>".$server_num."</strong>.</small>";
	}
?>
