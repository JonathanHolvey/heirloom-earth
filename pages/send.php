<?php
	$name = stripslashes($_POST["name"]);
	$email = $_POST["email"];
	$subject = "Message from heirloom-earth.com";
	$message = stripslashes($_POST["message"]);
	
	$to = "contact@heirloom-earth.com";
	$headers = "From: " . $name . " <" . $email . ">";
	
	mail($to, $subject, $message, $headers);

	header("location: /");
?>