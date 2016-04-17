<!DOCTYPE HTML>
<?php
	include("../cms/modules/blog.php");
	$blogPost = new BlogPost(NULL);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Message sent - Heirloom Earth</title>
	<meta charset="UTF-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<?php include("../templates/resources.php") ?>
</head>
<body>
	<?php include("../templates/tracking.php") ?>
	<?php include("../templates/header.php") ?>
	<main class="centred">
		<h1>Message sent</h1>
		<p>Your message was sent successfully. I'll be in touch as soon as possible.</p>
		<hr/>
	</main>
	<?php include("../templates/footer.php") ?>
</body>
</html>