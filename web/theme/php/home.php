<?php $instagram = !!getenv('INSTAGRAM_TOKEN'); ?>
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
		<?php if ($instagram): ?>
			<script>var INSTAGRAM_TOKEN = '<?= getenv('INSTAGRAM_TOKEN') ?>';</script>
			<section class="instagram-grid">
				<div class="grid-item grid-title">
					<div class="title-text">Heirloom Earth on</div>
					<img class="instagram-wordmark" src="<?= HTML_PATH_THEME_IMG . "instagram-wordmark.svg" ?>" alt="Instagram"/>
					<a class="button light" href="<?= $Site->instagram() ?>">Follow me</a>
				</div>
				<div id="instafeed"></div>
			</section>
		<?php endif ?>
	</main>
	<?php include(THEME_DIR_PHP . "_footer.php") ?>
</body>
</html>
