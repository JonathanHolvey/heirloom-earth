<?php
	if ($Url->whereAmI() == "home")
		include_once(THEME_DIR_PHP . "/home.php");
?>