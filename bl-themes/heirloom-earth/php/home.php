<!DOCTYPE html>
<html>
<head>
	<title><?= $Site->title() ?></title>
	<meta name="description" content="<?= $Site->description() ?>"/>
	<?php include(THEME_DIR_PHP . "_head.php") ?>
</head>
<body>
	<?php include(THEME_DIR_PHP . "_header.php") ?>
	<main>
		<?php if ($homepage): ?>
			<section class="home-about">
				<?= $homepage->content() ?>
				<a class="button light" href="<?= $Site->facebook() ?>">Find me on<br/> Facebook</a>
			</section>
		<?php endif ?>
 		<section class="post-preview inset-content">
			<?php
				foreach (array_slice($pages, 0, 2) as $listItem)
					include(THEME_DIR_PHP . "_preview.php");
			?>
		</section>
		<section class="instagram-grid">
			<div id="instafeed"></div>
		</section>
	</main>
	<?php include(THEME_DIR_PHP . "_footer.php") ?>
	<?php include(THEME_DIR_PHP . "_instagram.php") ?>
</body>
</html>
