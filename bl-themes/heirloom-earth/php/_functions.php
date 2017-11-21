<?php
function previewText($page, $min=200, $max=500) {
	preg_match("/<p>(.{" . $min . "," . $max . "})<\/p>/s", $page->content(), $matches);
	if (count($matches >= 1))
		return $matches[1];
	else
		return null;
}

function previewImage($page, $coverOnly=false) {
	if ($page->coverImage())
		return $page->coverImage();
	elseif (!$coverOnly and preg_match("/<img.+?src=\"(.+?)\".*?\/>/", $page->content(), $matches))
		return $matches[1];
	else
		return null;
}
