<?php
/**
 * This
 * ple shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that

// ini_set("log_errors", 1);
// ini_set("error_log", "/tmp/php-error.log");
date_default_timezone_set('Etc/UTC');

// define('PATH', dirname(__FILE__));

require '/home/genoeejt/public_html/bethandeugene/php/phpmailer/PHPMailerAutoload.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$response = $_POST['response'];

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "betheug@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "G1p5y!!&";
//Set who the message is to be sent from
$mail->setFrom('betheug@gmail.com', 'Beth & Eugene');
//Set an alternative reply-to address
$mail->addReplyTo('betheug@gmail.com', 'Beth & Eugene');
//Set who the message is to be sent to
//$mail->addAddress('eugene.cross@gmail.com', 'Eugene Doe');
$mail->addAddress($email, $name);
//Set the subject line
if ($response === 'Y'){

	$mail->Subject = "You're Coming!";
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML(file_get_contents('../response_email_yes.html'), dirname(__FILE__));

}else{
	$mail->Subject = "Oh No!";
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML(file_get_contents('../response_email_no.html'), dirname(__FILE__));


}

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
// $mail->addAttachment('../img/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
		error_log('sent error');
    echo "Mailer Error: " . $mail->ErrorInfo;
		error_log($mail->ErrorInfo);
} else {
	error_log('Sent!!');
  echo "Message sent!";

	$ourMail = new PHPMailer;

	$ourMail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$ourMail->SMTPDebug = 2;
	//Ask for HTML-friendly debug output
	$ourMail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$ourMail->Host = 'smtp.gmail.com';
	// use
	// $ourMail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$ourMail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$ourMail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$ourMail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$ourMail->Username = "betheug@gmail.com";
	//Password to use for SMTP authentication
	$ourMail->Password = "G1p5y!!&";

	$ourMail->setFrom($email, $name);

	$ourMail->addAddress("betheug@gmail.com", "Beth & Eugene");

//	$ourMail->msgHTML(file_get_contents('../response_email.html'), dirname(__FILE__));
	$ourMail->Subject = "Wedding Message from ".$name;

	$ourMail->Body = $message." ******** Website Response is ".$response;

	if (!$ourMail->send()) {
			error_log('sent reply error');
	    echo "Mailer Error: " . $ourMail->ErrorInfo;
			error_log($ourMail->ErrorInfo);
	} else {
		error_log('Sent reply!!');
	  echo "Message Reply sent!";

	}


}
?>
