<?php
	if ($Url->whereAmI() == "category")
		$title = $Page->category();
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
			<div class="page-header">
				<h1 class="page-title"><?= $title ?></h1>
				<div class="page-info">
					<span class="post-count">
						<?= ucfirst($Url->whereAmI()) ?> &ndash;
						<?= count($pages) ?> post<?= count($pages) > 1 ? "s" : "" ?>
					</span>
				</div>
			</div>
			<?php if ($Url->whereAmI() == "category"): ?>
				<div class="content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
			<?php endif ?>
		</article>
		<section class="post-preview">
			<?php
				foreach ($pages as $listItem)
					include(THEME_DIR_PHP . "_preview.php");
			?>
		</section>
	</main>
	<?php include(THEME_DIR_PHP . "_footer.php") ?>
</body>
</html>
