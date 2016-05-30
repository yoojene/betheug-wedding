<?php
error_log('here');
// header("Access-Control-Allow-Origin: *");

 if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

//send email
     mail("betheug@gmail.com", "Wedding Message from ".$name, $message);

 }
?>
