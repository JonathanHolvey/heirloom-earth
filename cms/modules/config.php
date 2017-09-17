<?php

class Config {
	public function get($module, $property) {
		$config = json_decode(file_get_contents(dirname(__FILE__) . "/../config.json"), true);
		return $config[$module][$property];
	}
}