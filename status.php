<?php
	exec('ps ax | grep "retroshare" | grep -v "grep" | wc -l', $ps_out);
	
	if ($ps_out[0] == '0'){
			echo "<br /><br /><small>The chat server seems to face some issues at the moment; it will be fixed as soon as possible. However, do not hesitate to already introduce your key, it will be taken into account. Thanks for your patience.</small>";
	}
	
	else{
		$file_config = parse_ini_file("config.ini") or die("Can't open config file");
		$nogui_path = $file_config['nogui_path'];
		$server_num = file_get_contents($nogui_path."/STORAGE/lobbyname.txt");
		echo "<br /><br /><small>For your information, the actual chat server is <strong>".$server_num."</strong>.</small>";
	}
?>
