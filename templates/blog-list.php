<main class="list">
	<h1><?= isset($_GET["f"]) ? preg_replace("/s$/", "", $_GET["f"]) . ": " . $_GET["m"] : "All posts" ?></h1>
	<?php foreach ($blogList->list as $post): ?>
		<article>
			<div class="image"><a href="posts/<?= $post->permalink ?>"><img alt src="<?= $post->image == "" ? "images/default-thumb.svg" : $post->image ?>"/></a></div>
			<div class="info"><h2><a href="posts/<?= $post->permalink ?>"><?= $post->title ?></a></h2>
			<?= $post->intro ?></div>
		</article>
	<?php endforeach ?>
</main>