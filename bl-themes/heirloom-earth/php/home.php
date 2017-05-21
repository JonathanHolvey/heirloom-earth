<!DOCTYPE html>
<html>
<head>
	<title><?= $Site->title() ?></title>
	<?php include(PATH_THEME_PHP . "_head.php") ?>
</head>
<body>
	<main>
	<?php include(PATH_THEME_PHP . "_header.php") ?>
		<section class="about">
			<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</h1>
			<img class="avatar" src="<?= HTML_PATH_THEME_IMG ?>avatar.jpg" alt=""/>
			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			<a class="button light" href="">Find me on<br/> Facebook</a>
		</section>
		<section class="post-preview">
			<article>
				<img src="/bl-content/uploads/thumbnails/1267073610666065667332426572790772264796452n.jpg" alt=""/>
				<h1>The hierarchy of consumption</h1>
				<div class="post-info">
					<span class="post-date">5 May 2017</span>
					<span class="post-tag">sustainable development</span>
				</div>
				<p>Since starting my sustainability journey, the biggest challenge for me has been pairing my love for the planet with my love for beautiful interior decorating. I've had this passion since a very young age; as a child I would spend weekends dragging my furniture around my bedroom.</p>
				<a class="button dark" href="">Read more</a>
			</article>
			<article>
				<img src="/bl-content/uploads/thumbnails/1267073610666065667332426572790772264796452n.jpg" alt=""/>
				<h1>The hierarchy of consumption</h1>
				<div class="post-info">
					<span class="post-date">5 May 2017</span>
					<span class="post-tag">sustainable development</span>
				</div>
				<p>Since starting my sustainability journey, the biggest challenge for me has been pairing my love for the planet with my love for beautiful interior decorating. I've had this passion since a very young age; as a child I would spend weekends dragging my furniture around my bedroom.</p>
				<a class="button dark" href="">Read more</a>
			</article>
		</section>
		<section class="instagram block-grid">
			<div class="block">
			<div class="block">
			<div class="block">
			<div class="block">
			<div class="block">
			<div class="block">
		</section>
		<?php include(PATH_THEME_PHP . "_footer.php") ?>
	</main>
</body>
</html>