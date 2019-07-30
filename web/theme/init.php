<?php
include(THEME_DIR_PHP . "_functions.php");

$homepage = buildPage("home");

$themeInfo = json_decode(file_get_contents(THEME_DIR . "metadata.json"), true);
define("THEME_VERSION", $themeInfo["version"]);

$canonical = rtrim($Site->url() . $Url->uri(), "/");
