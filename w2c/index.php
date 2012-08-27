<?php
	$lang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

	if (strtolower($lang[0]) == 'fr') {
		header('Location: fr/');
	}

	else {
		header('Location: en/');
	}
?>
