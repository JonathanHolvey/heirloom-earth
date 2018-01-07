<?php
class KeyStore {
	function __construct($id, $path) {
		$this->id = $id;
		$this->filename = $path . "/keystore-" . $id . ".json";
		$this->loadKeys();
	}
	private function cacheKeys() {
		if (!is_file($this->filename)) {
			$url = "https://dev.rocketchilli.com/keystore/" . $this->id;
			$data = file_get_contents($url);
			return ($data and file_put_contents($this->filename, $data));
		}
		return true;
	}
	private function loadKeys() {
		if ($this->cacheKeys()) {
			$data = json_decode(file_get_contents($this->filename), true);
			$this->service = $data["service"];
			$this->app = $data["app"];
			$this->keys = array_diff_key($data, array_flip(["id", "service", "app"]));
		}
	}
}
