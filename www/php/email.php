<?php
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

//send email
 if( mail("betheug@gmail.com", "Wedding Message from "  .$name, $message) ){
		$feedback = 'Email Sent!';
		if ($response === "Y"){
				mail($email, "Thumbs up", "We're so excited you're coming!  See you in October!");

		}else{
				mail($email, "Noooooo", "Sorry you can't make it, see you soon! x");
		}

 };


// }

?>
