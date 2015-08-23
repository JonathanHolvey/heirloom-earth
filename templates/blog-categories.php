<main class="list">
	<h1>All categories</h1>
	<?php
		sort($categories);
		foreach ($categories as $category):
			$image = "";
			$filter = new blogFilter;
			$filter->matching($category, "category");
			$filter->grouping(2);
			$blogList = new blogList($filter);
			foreach ($blogList->list as $post) {
				if ($post->image != "") {
					$image = $post->image;
					break;
				}
			}
			if ($image == "")
				$image = "images/default-thumb.svg";
	?>

		<article>
			<div class="image"><img src="<?= $image ?>" alt/></div>
			<div class="info">
				<h2><a href="categories/<?= $category ?>"><?= $category ?></a></h2>
				<?php foreach ($blogList->list as $post): ?>
					<h3><a href="posts/<?= $post->permalink ?>"><?= $post->title ?></a></h3>
				<?php 
					endforeach;
					if (!$blogList->atEnd):
				?>
					<a class="more" href="categories/<?= $category ?>">More <?= $category ?></a>
				<?php endif; ?>
			</div>
		</article>
	<?php endforeach; ?>
</main>