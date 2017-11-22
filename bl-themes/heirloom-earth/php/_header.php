<?php 
	$cover = ($Url->whereAmI() == "page" and $Page->coverImage());
	$latest = buildPage(array_keys($dbPages->getList(1, 1, true))[0]);
	// Set variable to control active nav menu link
	if ($Url->whereAmI() == "home")
		$menu = "home";
	elseif ($Url->whereAmI() == "page" and $Page->slug() == "about")
		$menu = "about";
	elseif ($Url->whereAmI() == "page" and $Page->slug() == "contact")
		$menu = "contact";
	elseif ($Url->whereAmI() == "category" or $Url->whereAmI() == "tag" or $Url->uri() == "/category")
		$menu = "category";
	elseif (!$Url->notFound())
		$menu = "blog";
?>
<header class="site-header<?= $cover ? " has-cover" : "" ?>"
		style="<?= $cover ? "background-image: url('" . $Page->coverImage() . "')" : "" ?>">
	<img class="logo" src="<?= HTML_PATH_THEME_IMG ?>header-logo.svg" alt="Heirloom Earth"/>
	<nav>
		<a class="<?= $menu == "home" ? "is-active" : "" ?>" href="">Home</a>
		<a class="<?= $menu == "blog" ? "is-active" : "" ?>" href="<?= $Site->uriFilters("page") . $latest->slug() ?>">Blog</a>
		<a class="<?= $menu == "category" ? "is-active" : "" ?>" href="category">Categories</a>
		<a class="<?= $menu == "about" ? "is-active" : "" ?>" href="about">About</a>
		<a class="<?= $menu == "contact" ? "is-active" : "" ?>" href="mailto:<?= contactEmail() ?>">Contact</a>
	</nav>
</header>
