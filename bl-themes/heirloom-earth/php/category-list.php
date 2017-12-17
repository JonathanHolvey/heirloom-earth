<?php
	// Gather category information
	$categories = [];
	foreach ($dbCategories->db as $key => $category) {
		if ($dbCategories->countPagesByCategory($key)) {
			$categories[$key] = $category;
			$categories[$key]["count"] = $dbCategories->countPagesByCategory($key);
			$categories[$key]["image"] = null;
			// Find category image from post images
			foreach ($categories[$key]["list"] as $postKey) {
				$post = buildPage($postKey);
				if (previewImage($post) !== false) {
					$categories[$key]["image"] = previewImage($post);
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
			<header class="page-header">
				<h1 class="page-title">Blog categories</h1>
				<div class="page-info">
					<span class="category-count">All categories &ndash; Total <?= count($categories) ?></span>
				</div>
			</header>
		</article>
		<section class="category-preview inset-content">
			<?php foreach ($categories as $key => $category): ?>
				<article>
					<div class="page-header">
						<?php if ($category["image"]): ?>
							<a class="post-image" href="<?= $Site->uriFilters("category") . $key ?>" style="background-image: url('<?= $category["image"] ?>')"></a>
						<?php endif ?>
						<h1 class="page-title"><a href="<?= $Site->uriFilters("category") . $key ?>"><?= $category["name"] ?></a></h1>
						<div class="page-info">
							<span class="post-count">Category &ndash; <?= $category["count"] ?> post<?= $category["count"] > 1 ? "s" : "" ?></span>
						</div>
					</div>
					<?php if (array_key_exists("description", $category)): ?>
						<div class="content">
							<p><?= $category["description"] ?></p>
						</div>
					<?php endif ?>
				</article>
			<?php endforeach ?>
		</section>
	</main>
	<?php include(THEME_DIR_PHP . "_footer.php") ?>
</body>
</html>
