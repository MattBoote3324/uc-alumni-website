<?php
// if(!isset($_POST['submit']))
// {
//     //this page can not be accessed directly. submit the form
//     echo "error; you need to submit the form";
// }
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$email_from = "bootematt1@gmail.com";
$email_subject = "Alumni Contact Request";
$email_body = "You have received a message from the user $name.\n".
    "Email Address: $visitor_email\n".
    "Here is the message : \n $message".

$to = "adamtups@gmail.com";
$headers = "From: $email_from \r\n";

//send the mail
//mail($to,$email_subject,$email_body, $headers);

header('Location: about.html');

?>
