<?php
	// Get first paragraph to use as text preview
	preg_match("/<p>(.{300,500})<\/p>/s", $listItem->content(), $matches);
	$text = $matches[1];
	// Get image preview from cover or inline image
	if ($listItem->coverImage())
		$image = $listItem->coverImage();
	elseif (preg_match("/<img.+?src=\"(.+?)\".*?\/>/", $listItem->content(), $matches))
		$image = $matches[1];
	else
		$image = false;
?>
<article>
	<?php if ($image): ?>
		<div class="post-image" style="background-image: url('<?= $image ?>')"/></div>
	<?php endif ?>
	<div class="page-header">
		<h1><a href="<?= $Site->uriFilters("page") . $listItem->slug() ?>"><?= $listItem->title() ?></a></h1>
		<div class="page-info">
			<span class="post-date"><?= $listItem->date() ?></span>
			<a class="post-category" href="<?= $Site->uriFilters("category") . $listItem->categoryKey() ?>"><?= $listItem->category() ?></a>
		</div>
	</div>
	<div class="content"><p><?= $text ?></p></div>
	<a class="button dark" href="<?= $Site->uriFilters("page") . $listItem->slug() ?>">Read more</a>
</article>
