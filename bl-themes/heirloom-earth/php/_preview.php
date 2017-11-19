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
	<div class="page-header">
		<?php if ($image): ?>
			<a class="post-image" href="<?= $Site->uriFilters("page") . $listItem->slug() ?>" style="background-image: url('<?= $image ?>')"/></a href>
		<?php endif ?>
		<h1><a href="<?= $Site->uriFilters("page") . $listItem->slug() ?>"><?= $listItem->title() ?></a></h1>
		<div class="page-info">
			<time class="post-date"><?= $listItem->date() ?></time>
			<a class="post-category" href="<?= $Site->uriFilters("category") . $listItem->categoryKey() ?>"><?= $listItem->category() ?></a>
		</div>
	</div>
	<div class="content"><p><?= $text ?></p></div>
	<a class="button dark" href="<?= $Site->uriFilters("page") . $listItem->slug() ?>">Read more</a>
</article>
