<?php
	$pages = [];
	// Get previous and next page objects to display as previews
	if ($Page->status() == "published") {
		$pageIndex = 1;
		while (array_values($dbPages->getList($pageIndex, 1))[0] != $Page->key())
			$pageIndex ++;
		$previous = $next = null;
		if ($pageIndex > 1 and count($dbPages->getList($pageIndex - 1, 1)) > 0)
			$pages[] = buildPage(array_values($dbPages->getList($pageIndex - 1, 1))[0]);
		if (count($dbPages->getList($pageIndex + 1, 1)) > 0)
			$pages[] = buildPage(array_values($dbPages->getList($pageIndex + 1, 1))[0]);
	}

	$user = $dbUsers->getUser($page->username());
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $Page->title() ?> - <?= $Site->title() ?></title>
	<meta name="keywords" content="<?= $Page->category() ?> ,<?= $Page->tags() ?>"/>
	<meta name="description" content="<?= previewText($page) ?>"/>
	<meta property="og:title" content="<?= $Page->title() ?>"/>
	<meta property="og:url" content="<?= $Site->url() . $Url->uri() ?>"/>
	<meta property="og:descripiton" content="<?= previewText($Page) ?>"/>
	<meta property="og:image" content="<?= previewImage($Page, true) ?>"/>
	<meta name="twitter:card" content="summary_large_image"/>
	<?php include(THEME_DIR_PHP . "_head.php") ?>
</head>
<body>
	<?php include(THEME_DIR_PHP . "_header.php") ?>
	<main>
		<article itemscope itemtype="http://schema.org/BlogPosting">
			<?php if (previewImage($Page)): ?>
				<meta itemprop="thumbnailUrl" content="<?= previewImage($Page, true) ?>"/>
				<meta itemprop="image" content="<?= previewImage($Page, false) ?>"/>
			<?php endif ?>
			<?php if (!$Url->notFound()): ?>
				<meta itemprop="dateModified" content="<?= $page->dateModified() ?>"/>
				<meta itemprop="mainEntityOfPage" content="<?= $canonical ?>"/>
				<div itemprop="author" itemscope itemtype="http://schema.org/Person">
					<meta itemprop="name" content="<?= $user->firstName() . " " . $user->lastName() ?>"/>
				</div>
				<div itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
					<meta itemprop="name" content="<?= $Site->title() ?>"/>
					<meta itemprop="url" content="<?= $Site->url() ?>"/>
					<meta itemprop="sameAs" content="<?= $Site->facebook() ?>"/>
				</div>
			<?php endif ?>
			<header class="page-header">
				<h1 class="page-title" itemprop="headline"><?= $Page->title() ?></h1>
				<?php if ($Page->status() != "static" and !$Url->notFound()): ?>
					<div class="page-info">
						<time class="post-date" itemprop="datePublished" datetime="<?= $Page->dateRaw() ?>"><?= $Page->date() ?></time>
						<?php if ($Page->category()): ?>
							<a class="post-category" href="<?= $Site->uriFilters("category") . $page->categoryKey() ?>"><?= $Page->category() ?></a>
						<?php endif ?>
					</div>
				<?php endif ?>
			</header>
			<div class="content" itemprop="text"><?= formatContent($Page) ?></div>
			<?php if ($Page->tags()): ?>
				<hr/>
				<footer class="post-tags" itemprop="keywords" content="<?= $Page->tags() ?>">
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
