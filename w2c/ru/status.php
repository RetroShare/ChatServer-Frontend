<?php
	exec('ps ax | grep "retroshare" | grep -v "grep" | wc -l', $ps_out);
	
	if ($ps_out[0] == '0'){
			echo "<br /><br /><small>Возможно в данный момент чатсервер недоступен (это бывает редко), просим прощения за доставленные неудобства. В любом случае, не беспокойтесь ваш ключ был добавлен, и как только чатсервер будет онлайн, вы сможете общаться с новыми друзьями.</small>";
	}
	
	else{
		$file_config = parse_ini_file("../config.ini") or die("Can't open config file");
		$nogui_path = $file_config['nogui_path'];
		$server_num = file_get_contents($nogui_path."/STORAGE/lobbyname.txt");
		echo "<br /><br /><small>Напоминаем, текущий чатсервер <strong>".$server_num."</strong>.</small>";
	}
?>
