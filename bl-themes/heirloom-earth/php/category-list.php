<?php
	// Gather category information
	$categories = [];
	foreach ($dbCategories->db as $key => $category) {
		if ($dbCategories->countPagesByCategory($key)) {
			$categories[$key] = $category;
			$categories[$key]["count"] = $dbCategories->countPagesByCategory($key);
			$categories[$key]["image"] = null;
			// Find category image from post cover images
			foreach ($categories[$key]["list"] as $postKey) {
				$post = buildPage($postKey);
				if (!empty($post->coverImage())) {
					$categories[$key]["image"] = $post->coverImage();
					break;
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Categories - <?= $Site->title() ?></title>
	<?php include(THEME_DIR_PHP . "_head.php") ?>
</head>
<body>
	<?php include(THEME_DIR_PHP . "_header.php") ?>
	<main>
		<article>
			<div class="page-header">
				<h1 class="page-title">Blog categories</h1>
				<div class="page-info">
					<span class="category-count">All categories &ndash; Total <?= count($categories) ?></span>
				</div>
			</div>
		</article>
		<section class="category-preview">
			<?php foreach ($categories as $key => $category): ?>
				<article>
					<?php if ($category["image"]): ?>
						<a href="<?= $Site->uriFilters("category") . $key ?>" class="post-image" style="background-image: url('<?= $category["image"] ?>')"></a>
					<?php endif ?>
					<div class="page-header">
						<h1 class="page-title"><a href="<?= $Site->uriFilters("category") . $key ?>"><?= $category["name"] ?></a></h1>
						<div class="page-info">
							<span class="post-count">Category &ndash; <?= $category["count"] ?> post<?= $category["count"] > 1 ? "s" : "" ?></span>
						</div>
					</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</article>
			<?php endforeach ?>
		</section>
	</main>
	<?php include(THEME_DIR_PHP . "_footer.php") ?>
</body>
</html>
