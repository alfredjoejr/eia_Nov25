<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php'; // or include 'path/to/PHPMailer/src/PHPMailer.php'

require __DIR__ . "/autoload.php";

$mail = new PHPMailer(true);

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;


try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'eiawebpage@gmail.com'; // your Gmail
    $mail->Password   = 'asqpqrpjpckwoilz';    // NOT your Gmail password!
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Fix for localhost SSL issue
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true
        ]
    ];

    // Email settings
    $mail->setFrom('eiawebpage@gmail.com', 'EIA');
    $mail->addReplyTo('eiawebpage@gmail.com', 'EIA Support'); // optional
    $mail->addAddress('jeffydev@proton.me');
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email sent from PHPMailer using Gmail SMTP.';

    $mail->send();
    echo 'Message has been sent!';
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}

?>