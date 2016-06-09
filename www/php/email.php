<?php
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
date_default_timezone_set('Etc/UTC');
error_log('here');
// header("Access-Control-Allow-Origin: *");

//  if($_POST){
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $message = $_POST['message'];
//
// //send email
//      mail("betheug@gmail.com", "Wedding Message from ".$name, $message);
//
//  }

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$response = $_POST['response'];

// $headers = "From: betheug@gmail.com " . "\r\n" . "Reply-To: betheug@gmail.com";

//send email
 if( mail("betheug@gmail.com", "Wedding Message from "  .$name, $message) ){
		$feedback = 'Email Sent!';
		error_log('email sent');
		if ($response === "Y"){
			error_log('response Y - sending Yes');
				mail($email, "Thumbs up", "We're so excited you're coming!  See you in October!");

		}else{
			error_log('response N- sending No');
				mail($email, "Noooooo", "Sorry you can't make it, see you soon! x");
		}

 };


// }

?>
