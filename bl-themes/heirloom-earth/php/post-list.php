<?php
	if ($Url->whereAmI() == "category") {
		$category = $dbCategories->db[$Url->explodeSlug()[0]];
		$title = $category["name"];
	}
	elseif ($Url->whereAmI() == "tag")
		$title = "#" . strtolower($Url->explodeSlug()[0]);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?> - <?= $Site->title() ?></title>
	<?php include(THEME_DIR_PHP . "_head.php") ?>
</head>
<body>
	<?php include(THEME_DIR_PHP . "_header.php") ?>
	<main>
		<article>
			<header class="page-header">
				<h1 class="page-title"><?= $title ?></h1>
				<div class="page-info">
					<span class="post-count">
						<?= ucfirst($Url->whereAmI()) ?> &ndash;
						<?= count($pages) ?> post<?= count($pages) > 1 ? "s" : "" ?>
					</span>
				</div>
			</header>
			<?php if ($Url->whereAmI() == "category" and array_key_exists("description", $category)): ?>
				<div class="content"><p><?= $category["description"] ?></p></div>
			<?php endif ?>
		</article>
		<section class="post-preview inset-content">
			<?php
				foreach ($pages as $listItem)
					include(THEME_DIR_PHP . "_preview.php");
			?>
		</section>
	</main>
	<?php include(THEME_DIR_PHP . "_footer.php") ?>
</body>
</html>
