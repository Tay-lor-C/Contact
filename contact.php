<?php 

if(isset($_POST['g-recaptcha-response'])){
  $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
  echo "<h2>Please check the captcha form.</h2>";
  exit;
}

$secretKey = "6Lc4W0ElAAAAALk2_1qcIhUJu2MAbFx5HUwaZYTk";
$ip = $_SERVER['REMOTE_ADDR'];

// post request to server
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response,true);

//should return JSON with success as true
if ($responseKeys["success"]) {
}

 	$name = $_POST['name'];
 	$visitor_email = $_POST['email_address'];
 	$message = $_POST['message'];

 	$email_from = 'operations@adaptmountain.com';

 	$email_subject = "User Submission";

 	$email_body = "User Name: $name.\n".
 					"User Email: $email_address.\n".
 						"User Message: $message.\n";

 	// $to = 'operations@adaptmountain.com';
  $to = 'taylorclark47@gmail.com'
 	$headers = "From: $email_from \r\n";

 	$headers .= "Reply-To: $visitor_email \r\n";

 	mail($to,$email_subjet,$email_body,$headers);

 	header("Location: contact.html");

	
?> 


