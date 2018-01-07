<?php
	include(THEME_DIR_PHP . "_utils.php");
	$keystore = new Keystore("384778f6-f387-4e94-a75a-65dc89ae598d", THEME_DIR . "cache");
	$accessToken = $keystore->keys["access-token"];
	$scriptPath = HTML_PATH_THEME . "vendor/instafeed-1.4.1.min.js"
?>

<script src="<?= $scriptPath ?>"></script>
<script>
	var feed = new Instafeed({
		get: "user",
		userId: "self",
		accessToken: "<?= $accessToken ?>",
		resolution: "low_resolution"
	});
	feed.run();
</script>
