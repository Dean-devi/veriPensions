<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER; // uncomment to debug

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'novesterasdeansivert@gmail.com';       // Replace with your Gmail
$mail->Password = 'itqj gxmp jnyp enmu';          // Use Gmail App Password (see below)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->isHTML(true);
$mail->setFrom('novesterasdeansivert@gmail.com', 'VeriPension');

return $mail;
