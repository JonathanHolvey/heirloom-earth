<?php 
	$cover = ($Url->whereAmI() == "page" and $Page->coverImage());
	// Set variable to control active nav menu link
	if ($Url->whereAmI() == "home")
		$menu = "home";
	elseif ($Url->whereAmI() == "page" and $Page->slug() == "about")
		$menu = "about";
	elseif ($Url->whereAmI() == "page" and $Page->slug() == "contact")
		$menu = "contact";
	elseif ($Page->title() != "Page not found")
		$menu = "blog";
?>
<header class="<?= $cover ? "has-cover" : "" ?>">
	<img class="logo" src="<?= HTML_PATH_THEME_IMG ?>header-logo.svg" alt="Heirloom Earth"/>
	<nav>
		<a class="<?= $menu == "home" ? "is-active" : "" ?>" href="">Home</a>
		<a class="<?= $menu == "blog" ? "is-active" : "" ?>" href="<?= $pages[0]->slug() ?>">Blog</a>
		<a class="<?= $menu == "category" ? "is-active" : "" ?>" href="category">Categories</a>
		<a class="<?= $menu == "about" ? "is-active" : "" ?>" href="about">About</a>
		<a class="<?= $menu == "contact" ? "is-active" : "" ?>" href="contact">Contact</a>
	</nav>
</header>
