<?php
if(isset($_POST['email'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $email_from = $_POST['email_from'];
  $subject = $_POST['subject'];
  $body = $_POST['body'];
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: '.$email_from . "\r\n";
  $headers .= 'Cc: '.$email_from . "\r\n";
  mail($email,$subject,$body,$headers);
}
?>
