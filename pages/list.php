<!DOCTYPE HTML>
<?php
	include("../script/common.php");
	include("../cms/modules/blog.php");
	$filter = new blogFilter;
	if (isset($_GET["m"]))
		$filter->matching($_GET["m"], $_GET["f"], true);
	$blogList = new blogList($filter);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?= isset($_GET["m"]) ? ucfirst($_GET["m"]) : "All posts" ?> - Heirloom Earth</title>
	<meta charset="UTF-8"/>
	<base href="<?= findBase() ?>"/>
	<?php include("../templates/resources.php") ?>
	<script type="text/javascript">$(document).ready(function() {$("#blog-link").addClass("active"); });</script>
</head>
<body>
	<?php
		include("../templates/tracking.php");
		include("../templates/header.php");
		include("../templates/blog-list.php");
		include("../templates/footer.php");
	?>
</body>
</html>