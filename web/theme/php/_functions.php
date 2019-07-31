<?php
// Get the first paragraph of a post's content text or the post description
function previewText($page, $strip=false, $min=200, $max=500) {
	if (preg_match("/<p>(.{{$min},{$max}})<\/p>/s", $page->content(), $matches)) {
		$allow = "<strong><em>";
		$text = trim(strip_tags($matches[1], $strip ? null : $allow));
		return $text;
	}
	else
		return $page->description();
}

// Get an image from a post's cover or content images
function previewImage($page, $thumb=false, $coverOnly=false) {
	if ($page->coverImage())
		$image = $page->coverImage();
	elseif (!$coverOnly and preg_match("/<img.+?src=\"(.+?)\".*?\/>/", $page->content(), $matches))
		$image = $matches[1];
	else
		return null;
	if ($thumb)
		return str_replace("bl-content/uploads/", "bl-content/uploads/thumbnails/", $image);
	else
		return $image;
}

// Apply additional formatting to generated HTML
function formatContent($page) {
	$content = $page->content();
	// Group four consecutive images into a div to be styled in a grid
	$content = preg_replace("/(<img.+?>\s*<img.+?>\s*<img.+?>\s*<img.+?>)/",
							"<div class=\"image-grid\">$1</div>", $content);
	return $content;
}

function contactEmail() {
	global $Site;
	return preg_replace("/[^\/]+\/+/", "contact@", $Site->domain());
}
