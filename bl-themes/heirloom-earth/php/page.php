<?php
	$pages = [];
	if ($Page->status() == "published") {
		// Get previous and next page objects
		$pageIndex = 1;
		while (array_keys($dbPages->getList($pageIndex, 1, true))[0] != $Page->key())
			$pageIndex ++;
		$previous = $next = null;
		if ($pageIndex > 1 and count($dbPages->getList($pageIndex - 1, 1, true)) > 0)
			$pages[] = buildPage(array_keys($dbPages->getList($pageIndex - 1, 1, true))[0]);
		if (count($dbPages->getList($pageIndex + 1, 1, true)) > 0)
			$pages[] = buildPage(array_keys($dbPages->getList($pageIndex + 1, 1, true))[0]);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $Page->title() ?> - <?= $Site->title() ?></title>
	<?php include(THEME_DIR_PHP . "_head.php") ?>
</head>
<body>
	<?php include(THEME_DIR_PHP . "_header.php") ?>
	<main>
		<article>
			<header class="page-header">
				<h1 class="page-title"><?= $Page->title() ?></h1>
				<?php if ($Page->status() != "static" and !$Url->notFound()): ?>
					<div class="page-info">
						<date class="post-date"><?= $Page->date() ?></date>
						<a class="post-category" href="<?= $Site->uriFilters("category") . $page->categoryKey() ?>"><?= $Page->category() ?></a>
					</div>
				<?php endif ?>
			</header>
			<div class="content"><?= $Page->content() ?></div>
			<?php if ($Page->tags()): ?>
				<hr/>
				<footer class="post-tags">
					<?php foreach ($Page->tags(true) as $tag): ?>
						<a href="<?= $Site->uriFilters("tag") . $tag ?>">#<?= $tag ?></a>
					<?php endforeach ?>
				</footer>
			<?php endif ?>
		</article>
		<?php if ($Page->status() == "published"): ?>
			<section class="post-preview inset-content">
				<?php
					foreach ($pages as $listItem)
						include(THEME_DIR_PHP . "_preview.php");
				?>
			</section>
		<?php endif ?>
	</main>
	<?php include(THEME_DIR_PHP . "_footer.php") ?>
</body>
</html>
