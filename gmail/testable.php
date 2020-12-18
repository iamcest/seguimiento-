<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'muthubrindha15@gmail.com';
$mail->Password = 'brindha15032001';
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;
$mail->setFrom('muthubrindha15@gmail.com', 'Brindha');
$mail->addAddress('muthubrindha15@gmail.com');
$mail->Subject = 'ALERT!!';
$mail->Body = 'hello brindha';
if(!$mail->send())
{
$error = "Mailer Error: " .$mail->ErrorInfo;
echo "<div class=display> '.$error.'  </div>";
}
else
{
echo " <div class=display> Message Sent </div>";
}
?>