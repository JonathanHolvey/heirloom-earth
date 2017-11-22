<?php
	include(THEME_DIR_PHP . "_functions.php");

	if ($Url->whereAmI() == "home")
		include_once(THEME_DIR_PHP . "home.php");
	elseif ($Url->whereAmI() == "page") {
		if ($Url->uri() == "/category")
			include_once(THEME_DIR_PHP . "category-list.php");
		else
			include_once(THEME_DIR_PHP . "page.php");
	}
	elseif ($Url->whereamI() == "category" or $Url->whereamI() == "tag")
		include_once(THEME_DIR_PHP . "post-list.php");
