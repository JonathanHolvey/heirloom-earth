<?php
// Get the first paragraph of a post's content text
function previewText($page, $strip=false, $min=200, $max=500) {
	if (!preg_match("/<p>(.{{$min},{$max}})<\/p>/s", $page->content(), $matches))
		return null;
	else
		$allow = "<strong><em>";
		$text = strip_tags($matches[1], $strip ? null : $allow);
		return $text;
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

function contactEmail() {
	global $Site;
	return preg_replace("/[^\/]+\/+/", "contact@", $Site->domain());
}
