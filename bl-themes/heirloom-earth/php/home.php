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
				foreach (array_slice($pages, 0, 3) as $Page):
					// Get first paragraph to use as text preview
					preg_match("/<p>(.{300,500})<\/p>/s", $Page->content(), $matches);
					$text = $matches[1];
					// Get image preview from cover or inline image
					if ($Page->coverImage())
						$image = $Page->coverImage();
					elseif (preg_match("/<img.+?src=\"(.+?)\".*?\/>/", $Page->content(), $matches))
						$image = $matches[1];
					else
						$image = false;
			?>
			<article>
				<?php if ($image): ?>
					<div class="post-image" style="background-image: url('<?= $image ?>')"/></div>
				<?php endif ?>
				<div class="post-text">
					<h1><?= $Page->title() ?></h1>
					<div class="post-info">
						<span class="post-date"><?= $Page->date() ?></span>
						<span class="post-tag"><?= $Page->category() ?></span>
					</div>
					<p><?= $text ?></p>
					<a class="button dark" href="<?= $Page->slug() ?>">Read more</a>
				</div>
			</article>
			<?php endforeach ?>
		</section>
		<?php include(THEME_DIR_PHP . "_footer.php") ?>
	</main>
</body>
</html>