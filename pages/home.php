<!DOCTYPE HTML>
<?php
	include("../cms/modules/blog.php");
	$blogPost = new BlogPost(NULL);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Heirloom Earth</title>
	<meta charset="UTF-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="google-site-verification" content="qg5eV80UdswQZ2s2lbXuPPFI0W70Z3PdSwPjz__VRn4"/>
	<?php include("../templates/resources.php") ?>
</head>
<body>
	<?php include("../templates/tracking.php") ?>
	<?php include("../templates/header.php") ?>
	<?php include("../templates/blog-post.php") ?>
	<?php include("../templates/footer.php") ?>
</body>
</html>