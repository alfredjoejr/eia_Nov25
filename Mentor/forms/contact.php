<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load PHPMailer files
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Check if form data was posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // Get form data from POST
    $from_name = $_POST['name'];
    $from_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Your receiving email address
    $receiving_email_address = 'eialkmail@gmail.com'; // Put your email here

    try {
        // --- SMTP SETTINGS ---
        // This is the most reliable way to send email.
        // Use your web host's SMTP settings or a service like Gmail.
        $mail->isSMTP();
        $mail->Host       = 'srv.lankahost.net';       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                   // Enable SMTP authentication
        $mail->Username   = 'info@eia.lk'; // SMTP username (your full email)
        $mail->Password   = '=d~t@_z9i,C^xnl3';    // SMTP password (NOT your login password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
        $mail->Port       = 465;                    // TCP port to connect to

        // --- RECIPIENTS ---
        $mail->setFrom($from_email, $from_name);           // The "From" address (will be the user's email)
        $mail->addAddress($receiving_email_address);       // The "To" address (this is you)
        $mail->addReplyTo($from_email, $from_name);        // Set the "Reply-To" to be the user

        // --- CONTENT ---
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        
        // Build the email body
        $mail->Body    = "<b>From:</b> " . htmlspecialchars($from_name) . "<br>"
                       . "<b>Email:</b> " . htmlspecialchars($from_email) . "<br><br>"
                       . "<b>Message:</b><br>" . nl2br(htmlspecialchars($message));
                       
        // Build a plain-text version for non-HTML email clients
        $mail->AltBody = "From: " . $from_name . "\r\n"
                       . "Email: " . $from_email . "\r\n\r\n"
                       . "Message:\r\n" . $message;

        $mail->send();
        echo '';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    // Not a POST request
    echo 'Error: Form was not submitted correctly.';
}
?>