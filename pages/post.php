<!DOCTYPE HTML>
<?php
	include("../script/common.php");
	include("../cms/modules/blog.php");
	$blogPost = new blogPost($_GET["p"]);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?= $blogPost->title ?> - Heirloom Earth</title>
	<meta charset="UTF-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<base href="<?= findBase() ?>"/>
	<?php include("../templates/resources.php") ?>
	<script type="text/javascript">$(document).ready(function() {$("#blog-link").addClass("active"); });</script>
</head>
<body>
	<?php
		include("../templates/tracking.php");
		include("../templates/header.php");
		include("../templates/blog-post.php");
		include("../templates/footer.php");
	?>
</body>
</html>