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
	<main>
		<?php include(THEME_DIR_PHP . "_header.php") ?>
		<article>
			<div class="post-header">
				<h1 class="page-title"><?= $Page->title() ?></h1>
				<?php if ($Page->status() != "static" and !$Url->notFound()): ?>
					<div class="post-info"><?= $Page->date() ?>
					<a class="post-tag" href="<?= $Site->uriFilters("category") . $page->category() ?>"><?= $Page->category() ?></a></div>
				<?php endif ?>
			</div>
			<?= $Page->content() ?>
			<?php if ($Page->tags()): ?>
				<hr/>
				<div class="post-tags">
					<?php foreach (explode(", ", $Page->tags()) as $tag): ?>
						<a href="<?= $Site->uriFilters("tag") . $tag ?>">#<?= $tag ?></a>
					<?php endforeach ?>
				</div>
			<?php endif ?>
		</article>
		<?php if ($Page->status() == "published"): ?>
			<section class="post-preview">
				<?php
					foreach ($pages as $listItem) {
						include(THEME_DIR_PHP . "_preview.php");
					}
				?>
			</section>
		<?php endif ?>
		<?php include(THEME_DIR_PHP . "_footer.php") ?>
	</main>
	<?php if ($Page->coverImage()): ?>
		<style>
			header {
				background-image: url("<?= $page->coverImage() ?>");
			}
		</style>
	<?php endif ?>
</body>
</html>
