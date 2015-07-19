<!DOCTYPE HTML>
<?php
	include("script/common.php");
	include("cms/modules/blog.php");
	$blogData = new blog;
	$blogData->getList();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?= ucfirst($_GET["match"]) ?> - Heirloom Earth</title>
	<meta charset="UTF-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<base href="<?= findBase() ?>"/>
	<?php include("templates/resources.php") ?>
</head>
<body>
	<?php
		include("templates/header.php");
		include("templates/blog-list.php");
		include("templates/footer.php");
	?>
</body>
</html>