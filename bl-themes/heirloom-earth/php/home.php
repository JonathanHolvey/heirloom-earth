<?php
	$Page = buildPage("home");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $Site->title() ?></title>
	<?php include(THEME_DIR_PHP . "_head.php") ?>
	<meta name="description" content="<?= $Site->description() ?>"/>
</head>
<body>
	<?php include(THEME_DIR_PHP . "_header.php") ?>
	<main>
		<section class="home-about">
			<?= $Page->content() ?>
			<a class="button light" href="">Find me on<br/> Facebook</a>
		</section>
 		<section class="post-preview inset-content">
			<?php
				foreach (array_slice($pages, 0, 3) as $listItem)
					include(THEME_DIR_PHP . "_preview.php");
			?>
		</section>
	</main>
	<?php include(THEME_DIR_PHP . "_footer.php") ?>
</body>
</html>
