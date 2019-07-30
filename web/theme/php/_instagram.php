<?php
	$accessToken = getenv("INSTAGRAM_TOKEN");
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
		template: "<div class=\"grid-item\" tabindex=\"0\"><img class=\"grid-image\" src=\"{{image}}\" alt=\"\"/><div class=\"grid-overlay\"><a class=\"image-caption\" href=\"{{link}}\">{{caption}}</a><div class=\"image-stats\"><span class=\"image-likes\" data-count=\"{{likes}}\">{{likes}}</span> <span class=\"image-comments\" data-count=\"{{comments}}\">{{comments}}</span></div></div></div>",
		after: clampLines
	});
	feed.run();
</script>
