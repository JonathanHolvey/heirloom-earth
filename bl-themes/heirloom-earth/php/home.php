<!DOCTYPE html>
<html>
<head>
	<title><?= $Site->title() ?></title>
	<?php include(THEME_DIR_PHP . "_head.php") ?>
</head>
<body>
	<main>
		<?php include(THEME_DIR_PHP . "_header.php") ?>
		<section class="about">
			<div>
				<h1><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.<div></h1>
				<img class="avatar" src="<?= HTML_PATH_THEME_IMG ?>avatar.jpg" alt=""/>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				<a class="button light" href="">Find me on<br/> Facebook</a>
			</div>
		</section>
		<section class="post-preview">
			<?php
				foreach (array_slice($pages, 0, 3) as $listItem)
					include(THEME_DIR_PHP . "_preview.php");
			?>
		</section>
		<?php include(THEME_DIR_PHP . "_footer.php") ?>
	</main>
</body>
</html>