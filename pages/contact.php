<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Contact me - Heirloom Earth</title>
	<meta charset="UTF-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<?php include("../templates/resources.php") ?>
	<script type="text/javascript">$(document).ready(function() {$("#contact-link").addClass("active"); });</script>
</head>
<body>
	<?php include("../templates/tracking.php") ?>
	<?php include("../templates/header.php") ?>
	<main class="post">
		<h1>Contact me</h1>
		<form action="send" method="post">
			<div class="field"	>
				<label for="name">Name</label>
				<input name="name" type="text"/>
			</div>
			<div class="field"	>
				<label for="email">Email</label>
				<input name="email" type="text"/>
			</div>
			<div class="field"	>
				<label for="message">Message</label>
				<textarea name="message" rows="6"></textarea>
			</div>
			<hr/>
			<button name="submit">Send</button>
		</form>
	</main>
	<?php include("../templates/footer.php") ?>
</body>
</html>