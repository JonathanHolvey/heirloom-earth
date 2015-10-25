<main class="list">
	<h1>All categories</h1>
	<?php
		$categories = new categoryList;
		foreach ($categories->list as $category):
			$image = "";
			$filter = new blogFilter;
			$filter->matching($category["name"], "category");
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
			<a href="categories/<?= str_replace(" ", "+", $category["name"]) ?>">
				<div class="image"><img src="<?= $image ?>" alt/></div>
				<div class="info">
					<h2><?= $category["name"] ?></h2>
					<div class="meta">
						<div class="property">Post count: <span class="value"><?= $category["post-count"] ?></span></div>
						<div class="property">Last added: <span class="value"><?= date("j M Y", strtotime($category["last-added"])) ?></span></div>
					</div>
					<p><?= $category["description"] ?></p>
				</div>
			</a>
		</article>
	<?php endforeach; ?>
</main>