<?php
	// Get first paragraph to use as text preview
	preg_match("/<p>(.{300,500})<\/p>/s", $Page->content(), $matches);
	$text = $matches[1];
	// Get image preview from cover or inline image
	if ($Page->coverImage())
		$image = $Page->coverImage();
	elseif (preg_match("/<img.+?src=\"(.+?)\".*?\/>/", $Page->content(), $matches))
		$image = $matches[1];
	else
		$image = false;
?>
<article>
	<?php if ($image): ?>
		<div class="post-image" style="background-image: url('<?= $image ?>')"/></div>
	<?php endif ?>
	<h1><a href="<?= $Site->uriFilters("page") . $Page->slug() ?>"><?= $Page->title() ?></a></h1>
	<div class="post-info">
		<span class="post-date"><?= $Page->date() ?></span>
		<span class="post-tag"><?= $Page->category() ?></span>
	</div>
	<p><?= $text ?></p>
	<a class="button dark" href="<?= $Site->uriFilters("page") . $Page->slug() ?>">Read more</a>
</article>
