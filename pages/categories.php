<!DOCTYPE HTML>
<?php
	include("../script/common.php");
	include("../cms/modules/blog.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Blog categories - Heirloom Earth</title>
	<meta charset="UTF-8"/>
	<base href="<?= findBase() ?>"/>
	<?php include("../templates/resources.php") ?>
	<script type="text/javascript">$(document).ready(function() {$("#categories-link").addClass("active"); });</script>
</head>
<body>
	<?php
		include("../templates/header.php");
		include("../templates/blog-categories.php");
		include("../templates/footer.php");
	?>
</body>
</html>