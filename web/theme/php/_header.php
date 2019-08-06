<?php
	// Set cover image
	$coverImage = null;
	if ($homepage and $homepage->coverImage())
		$coverImage = $homepage->coverImage();
	if ($Url->whereAmI() == "page" and $Page->coverImage())
		$coverImage = $Page->coverImage();
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
<?php Theme::plugins("siteBodyBegin") ?>
<header class="site-header<?= $coverImage ? " custom-cover" : "" ?>"
		style="<?= $coverImage ? "background-image: url('" . $coverImage . "')" : "" ?>">
	<img class="logo" src="<?= HTML_PATH_THEME_IMG ?>header-logo.svg?v2" alt="Heirloom Earth"/>
	<nav>
		<a class="<?= $menu == "home" ? "is-active" : "" ?>" href="">Home</a>
		<a class="<?= $menu == "blog" ? "is-active" : "" ?>" href="blog">Blog</a>
		<a class="<?= $menu == "category" ? "is-active" : "" ?>" href="category">Categories</a>
		<a class="<?= $menu == "about" ? "is-active" : "" ?>" href="about">About</a>
		<a class="<?= $menu == "contact" ? "is-active" : "" ?>" href="mailto:<?= contactEmail() ?>">Contact</a>
	</nav>
</header>
