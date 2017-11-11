<?php
	if ($Url->whereAmI() == "home")
		include_once(THEME_DIR_PHP . "home.php");
	elseif ($Url->whereAmI() == "page")
		include_once(THEME_DIR_PHP . "page.php");
	elseif ($Url->whereamI() == "category" or $Url->whereamI() == "tag")
		include_once(THEME_DIR_PHP . "list.php");
?>