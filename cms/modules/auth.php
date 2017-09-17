<?php

class Auth {
	function __construct() {
		include("config.php");
		$config = new config;
		define("LOGIN_PATH", dirname(__FILE__) . "/" . $config->get("auth", "login-path"));

		session_start();
		if (isset($_POST["email"]) and isset($_POST["password"])) {
			// load user information
			$users = $config->get("auth", "users");
			// find current user
			foreach ($users as $user) {
				if ($user["email"] == $_POST["email"])
					break;
			}
			// verify password and set session cookie
			if (password_verify($_POST["password"], $user["hash"])) {
				$_SESSION["user"] = array("email" => $user["email"], "name" => $user["name"]);
			}
			else
				$this->login();
		}
		elseif (!isset($_SESSION["user"]))
			$this->login();
	}

	public function logout() {
		unset($_SESSION["user"]);
		session_destroy();
	}

	private function login() {
		include(LOGIN_PATH);
		exit();
	}
}