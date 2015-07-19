<main class="list">
	<?php foreach ($blogData->data as $post): ?>
		<article>
			<h2><?= $post["title"] ?></h2>
			<p><?= $post["author"] ?></p>
			<p><?= implode($post["tags"], " ") ?></p>
		</article>
	<?php endforeach ?>
</main>