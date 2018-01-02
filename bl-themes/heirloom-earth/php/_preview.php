<article>
	<div class="page-header">
		<?php if (previewImage($listItem)): ?>
			<a class="post-image" href="<?= $Site->uriFilters("page") . $listItem->slug() ?>" style="background-image: url('<?= previewImage($listItem) ?>')"/></a href>
		<?php endif ?>
		<h1><a href="<?= $Site->uriFilters("page") . $listItem->slug() ?>"><?= $listItem->title() ?></a></h1>
		<div class="page-info">
			<time class="post-date" datetime="<?= $Page->dateRaw() ?>"><?= $listItem->date() ?></time>
			<a class="post-category" href="<?= $Site->uriFilters("category") . $listItem->categoryKey() ?>"><?= $listItem->category() ?></a>
		</div>
	</div>
	<div class="content"><p><?= previewText($listItem) ?></p></div>
	<a class="button dark" href="<?= $Site->uriFilters("page") . $listItem->slug() ?>">Read more</a>
</article>
