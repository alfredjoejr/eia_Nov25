<?php
// [Previous PHP code remains the same until the email sending part]
$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE user
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);


if ($stmt->execute()) {
    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("noreply@example.com", "Education Incentive Association");
    $mail->addAddress($_POST["email"]);
    $mail->Subject = "Activate Your Account | EIA";
    
    // HTML Email with Tailwind CSS and ShadCN-inspired styling
    $mail->isHTML(true);
    $mail->Body = <<<END
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .card { max-width: 480px; border-radius: 12px; }
        .btn-primary { background-color: #3b82f6; }
        .btn-primary:hover { background-color: #2563eb; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="max-w-2xl mx-auto p-4">
        <div class="bg-white card shadow-sm border border-gray-200 p-6 sm:p-8">
            <div class="flex justify-center mb-6">
                <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                </div>
            </div>
            
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-2">Activate Your Account</h2>
            <p class="text-gray-600 text-center mb-6">Welcome to our platform! Please verify your email address to get started.</p>
            
            <div class="bg-blue-50 rounded-lg p-4 mb-6">
                <p class="text-blue-800 text-center">Click the button below to activate your account</p>
            </div>
            
            <div class="text-center mb-6">
                <a href="https://eia.lk/activate-account.php?token=$activation_token" class="btn-primary inline-flex items-center justify-center rounded-md px-6 py-3 text-white font-medium transition-colors hover:shadow-md">
                    Activate Account
                </a>
            </div>
            
            <p class="text-gray-500 text-sm text-center mb-0">If you didn't request this, please ignore this email.</p>
            
            <div class="border-t border-gray-200 mt-6 pt-6 text-center">
                <p class="text-gray-500 text-sm">Need help? <a href="mailto:support@eia.lk" class="text-blue-600 hover:underline">Contact our support team</a></p>
            </div>
        </div>
        
        <div class="mt-4 text-center text-gray-500 text-xs">
            <p>© 2023 EIA. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
END;

    // Plain text fallback
    $mail->AltBody = "Click this link to activate your account: https://eia.lk/activate-account.php?token=$activation_token";

    try {
        $mail->send();
        header("Location: signup-success.php");
        exit;
    } catch (Exception $e) {
        showErrorAlert("Message could not be sent. Please try again later.");
    }
} else {
    if ($mysqli->errno === 1062) {
        showErrorAlert("Email already taken");
    } else {
        showErrorAlert("Database error: " . $mysqli->error);
    }
}
?>