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
		resolution: "low_resolution",
		limit: 11,
		template: "<div class=\"grid-item\"><img class=\"grid-image\" src=\"{{image}}\" alt=\"\"/><div class=\"grid-overlay\"><p class=\"image-caption\">{{caption}}</p><div class=\"image-stats\"><span class=\"image-likes\" data-count=\"{{likes}}\">{{likes}}</span> <span class=\"image-comments\" data-count=\"{{comments}}\">{{comments}}</span></div></div></div>"
	});
	feed.run();
</script>
