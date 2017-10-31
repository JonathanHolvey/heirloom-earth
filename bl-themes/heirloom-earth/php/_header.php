<?php $cover = ($Url->whereAmI() == "page" and $Page->coverImage()) ?>
<header class="<?= $cover ? "has-cover" : "" ?>">
	<img class="logo" src="<?= HTML_PATH_THEME_IMG ?>header-logo.svg" alt="Heirloom Earth"/>
	<nav>
		<a class="is-active" href="">Blog</a>
		<a href="category">Categories</a>
		<a href="about">About</a>
		<a href="contact">Contact</a>
	</nav>
</header>
