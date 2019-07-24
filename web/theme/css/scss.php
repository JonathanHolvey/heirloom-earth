<?php
	require_once("../vendor/scssphp-0.6.7/scss.inc.php");
	use Leafo\ScssPhp\Compiler;
	use Leafo\ScssPhp\Server;

	$scss = new Compiler();
	$scss->setFormatter("Leafo\ScssPhp\Formatter\Crunched");

	$directory = ".";
	$server = new Server($directory, null, $scss);
	$server->serve();
?>