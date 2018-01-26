<?php
include(THEME_DIR_PHP . "_functions.php");

$homepage = buildPage("home");

$themeConfig = [];
if (is_file(THEME_DIR . "config.json"))
	$themeConfig = array_merge($themeConfig, json_decode(file_get_contents(THEME_DIR . "config.json"), true));

$themeInfo = json_decode(file_get_contents(THEME_DIR . "metadata.json"), true);
define("THEME_VERSION", $themeInfo["version"]);

$canonical = rtrim($Site->url() . $Url->uri(), "/");
