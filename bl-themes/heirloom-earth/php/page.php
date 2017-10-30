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
			<h1 class="page-title"><?= $Page->title() ?></h1>
			<div class="post-info">
				<span class="post-date"><?= $Page->date() ?></span>
				<a class="post-tag" href="<?= $Site->uriFilters("category") . $page->category() ?>"><?= $Page->category() ?></a>
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