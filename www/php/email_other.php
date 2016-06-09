<?php
error_log('using phpemailer');
ini_set('include_path', '../lib/PHPMailer');
// header("Access-Control-Allow-Origin: *");

// if($_POST){
    // $name = $_REQUEST['name'];
    // $email = $_REQUEST['email'];
    // $message = $_REQUEST['text'];
		// $response = $_REQUEST['formResp'];

//send email
		//  if( mail("betheug@gmail.com", "Wedding Message from"  .$name, $message) ){
		// 	 	$feedback = 'Email Sent!';
		// 		mail($email, "Reply to wedding invite", $response);
		//  };


// }

require("class.PHPMailer.php");

$mail = new PHPMailer(true);

// set mailer to use SMTP
$mail->IsSMTP();

// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost

$mail->SMTPSecure = 'ssl';
$mail->Port       = 465;
$mail->Host = "smtp.gmail.com";  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication

// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "betheug";  // SMTP username
$mail->Password = "G1p5y!!&"; // SMTP password

// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = $email;

// below we want to set the email address we will be sending our email to.
$mail->AddAddress("eugene.cross@gmail.com", "Eugene Cross");

// set word wrap to 50 characters
$mail->WordWrap = 50;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "You have received feedback from your website!";

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
// $mail->Body    = $message;
// $mail->AltBody = $message;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>
?>
