<main class="list">
	<h1><?= isset($_GET["f"]) ? preg_replace("/s$/", "", $_GET["f"]) . ": " . $_GET["m"] : "All posts" ?></h1>
	<?php foreach ($blogList->list as $post): ?>
		<article>
			<a href="posts/<?= $post->permalink ?>">
				<div class="image"><img alt src="<?= $post->image == "" ? "images/default-thumb.svg" : $post->image ?>"/></div>
				<div class="info">
					<h2><?= $post->title ?></h2>
					<div class="meta">
						<div class="property">Published: <span class="value"><?= date("j M Y", strtotime($post->created)) ?></span></div>
						<div class="property">Category: <span class="value"><?= $post->category ?></span></div>
						<div class="property">Tags: <span class="value">#<?= implode(" #", $post->tags) ?></span></div>
					</div>
					<?= $post->intro ?>
				</div>
			</a>
		</article>
	<?php endforeach ?>
</main>