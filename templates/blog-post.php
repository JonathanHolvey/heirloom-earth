<main class="post" itemscope itemtype="http://schema.org/BlogPosting">
	<header>
		<h1 itemprop="name headline"><?= $blogPost->title ?></h1>
		<div style="display:none" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?= $blogPost->author ?></span></div>
		<time itemprop="datePublished" datetime="<?= $blogPost->created ?>"><?= date("l j M Y", strtotime($blogPost->created)) ?></time>
	</header>
	<div itemprop="articleBody">
		<?= $blogPost->body ?>
	</div>
	<hr/>
	<footer>
		<div class="category">
			From category:
			<a class="property" href="categories/<?= $blogPost->category ?>"><?= $blogPost->category ?></a>
		</div>
		<div class="tags">
			Tagged as:
			<?php foreach ($blogPost->tags as $tag) : ?>
				<a class="property" href="tags/<?= $tag ?>"><?= $tag ?></a> 
			<?php endforeach ?>
		</div>
	</footer>
</main>