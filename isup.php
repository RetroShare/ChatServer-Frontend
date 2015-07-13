<?php
	exec('ps ax | grep "retroshare" | grep -v "grep" | wc -l', $ps_out);
	
	if ($ps_out[0] == '0'){
			echo "offline";
	}
	
	else{
		echo "online";
	}
?>
