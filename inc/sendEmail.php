<?php

$siteOwnersEmail = 'akenneweg@uwaterloo.ca';

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if($_POST) {
	$name = $_POST['contactName'];
	$email = $_POST['contactEmail'];
	$subject = trim(stripslashes($_POST['contactSubject']));
	$contact_message = $_POST['contactMessage'];

	// PHP Form Validations
	// Name check 
	if (empty($name)) {
		$error['name'] = "Please enter your name.";
	} else {
		$testname = test_input($name); // check if name only has letters/whitespace
		if (!preg_match("/^[a-zA-Z ]*$/", $testname)) {
			$error['name'] = "Name must contain letters [a-zA-Z] and whitespace only.";
		}
	}
	// Check Email
	if (empty($email)) {
		$error['email'] = "Please enter your return e-mail address."; 
	} else {
		$testemail = test_input($email);
		if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $testemail)) {
			$error['email'] = "Please enter a valid email address. (format: '(someemail)@(domain)')";
		}
	}
	// Check Message
	if (empty($contact_message)) {
		$error['message'] = "Please enter a message. It must not be empty, and should have at least 50 characters.";
	} else {
		$testmessage = test_input($contact_message);
		if (strlen($contact_message) < 50) {
			$error['message'] = "Please enter your message. It should have at minimum 50 characters.";
		}
	}
	// Subject
	if ($subject == '') { $subject = "'Contact Me' Form Submission"; }
	// Message Parameters
	$message .= "Email from: " . $name . "<br />";
	$message .= "Email address: " . $email . "<br />";
	$message .= "Message: <br />";
	$message .= $contact_message;
	$message .= "<br /> ----- <br /> This email was sent from your website's contact form. <br />";

	// "From" Header
	$from =  $name . " <" . $email . ">";

	// Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	if (!$error) {
		ini_set("sendmail_from", $siteOwnersEmail); // for windows server
		$mail = mail($siteOwnersEmail, $subject, $message, $headers);
		if ($mail) {
			echo "OK"; 
		} else {
			echo "Something went wrong. Please correct the errors and try again."; 
		}
	} else {
		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;	
		echo $response;
	}
}
?>
