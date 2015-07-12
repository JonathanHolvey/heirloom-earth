<main class="post" itemscope itemtype="http://schema.org/BlogPosting">
	<header>
		<h1 itemprop="name headline"><?= $blogData->data["title"] ?></h1>
		<div style="display:none" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?= $blogData->data["author"] ?></span></div>
		<time itemprop="datePublished" datetime="<?= $blogData->data["created"] ?>"><?= date("l j M Y", strtotime($blogData->data["created"])) ?></time>
	</header>
	<div itemprop="articleBody">
		<?= $blogData->data["body"] ?>
	</div>
	<hr/>
	<footer>
		<div class="category">
			From category:
			<a class="property"><?= $blogData->data["category"] ?></a>
		</div>
		<div class="tags">
			Tagged as:
			<?php foreach ($blogData->data["tags"] as $tag) : ?>
				<a class="property"><?= $tag ?></a> 
			<?php endforeach ?>
		</div>
	</footer>
</main>