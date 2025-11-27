<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

function showErrorAlert($message) {
    echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "'.$message.'",
            customClass: {
                popup: "!rounded-xl"
            },
            confirmButtonText: "OK",
            background: "#ffffff",
            confirmButtonColor: "#3b82f6"
        }).then(() => {
            window.history.back();
        });
    </script>';
    die("Stopped at: showErrorAlert");
}

//echo "DEBUG 1<br>";


if (empty($_POST["fullName"])) showErrorAlert("Full name is required");
if (empty($_POST["sex"])) showErrorAlert("Gender is required");
if (empty($_POST["wano"])) showErrorAlert("Whatsapp number is required");
if (empty($_POST["nic"])) showErrorAlert("NIC number is required");
if (empty($_POST["memType"])) showErrorAlert("Member type is required");
if (empty($_POST["university"])) showErrorAlert("University is required");
if (empty($_POST["course"])) showErrorAlert("Course is required");
if (empty($_POST["examYear"])) showErrorAlert("Exam year is required");
if (empty($_POST["shy"])) showErrorAlert("Exam chance is required");
if (empty($_POST["dob"])) showErrorAlert("Date of birth is required");
if (empty($_POST["name"])) showErrorAlert("Name is required");
if (empty($_POST["designation"])) showErrorAlert("Designation is required");

//echo "DEBUG 2<br>";

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    showErrorAlert("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    showErrorAlert("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    showErrorAlert("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    showErrorAlert("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    showErrorAlert("Passwords must match");
}

//echo "DEBUG 3<br>";

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$activation_token = bin2hex(random_bytes(16));
$activation_token_hash = hash("sha256", $activation_token);

//echo "DEBUG 4<br>";

$mysqli = @require __DIR__ . "/database.php";
//if (!$mysqli) die("DEBUG 5 - Database connection failed");

//echo "DEBUG 6<br>";

// Check for existing email or NIC
$sql_check = "SELECT id FROM user WHERE email = ? OR nic = ?";
$stmt_check = $mysqli->prepare($sql_check);
//if (!$stmt_check) die("DEBUG 7 - Prepare failed: " . $mysqli->error);

$stmt_check->bind_param("ss", $_POST["email"], $_POST["nic"]);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    showErrorAlert("Email or NIC already exists");
}

//echo "DEBUG 8<br>";

$sql = "INSERT INTO user (name, fullName, sex, wano, address, designation, nic, memType, university, course, examYear, dob, email, password_hash, account_activation_hash)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
   die("DEBUG 9 - SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssssssssssss",
    $_POST["name"],
    $_POST["fullName"],
    $_POST["sex"],
    $_POST["wano"],
    $_POST["address"],
    $_POST["designation"],
    $_POST["nic"],
    $_POST["memType"],
    $_POST["university"],
    $_POST["course"],
    $_POST["examYear"],
    $_POST["dob"],
    $_POST["email"],
    $password_hash,
    $activation_token_hash
);

//echo "DEBUG 10<br>";

//var_dump($_POST["designation"]);
//exit;


if ($stmt->execute()) {
    echo "DEBUG 11 - Insert successful<br>";
    $mail = @require __DIR__ . "/mailer.php";
    if (!$mail) die("DEBUG 12 - Mailer load failed");

    $mail->setFrom("eiawebpage@gmail.com", "Education Incentive Association");
    $mail->addAddress($_POST["email"]);
    $mail->Subject = "Activate Your Account";

    $activation_url = "http://eia.lk/login/activate-account.php?token=$activation_token";

    $mail->isHTML(true);
$mail->Body = <<<END
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 font-sans">
    <div class="max-w-2xl mx-auto my-8 bg-white rounded-xl shadow-md overflow-hidden">
        <div class="bg-blue-600 p-6 text-white">
            <h1 class="text-2xl font-bold">Welcome to Education Incentive Association</h1>
            <p class="opacity-90">Please activate your account</p>
        </div>
        
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Dear {$_POST['name']},</h2>
            <p class="text-gray-600 mb-6">
                Thank you for registering with Education Incentive Association. 
                Please click the button below to activate your account and complete your registration.
            </p>
            
            <div class="text-center mb-6">
                <a href="$activation_url" class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition duration-200">
                    Activate Your Account
                </a>
            </div>
            
            <p class="text-gray-500 text-sm mb-4">
                If the button above doesn't work, copy and paste this link into your browser:
            </p>
            <p class="text-blue-500 text-sm break-all bg-blue-50 p-3 rounded">
                $activation_url
            </p>
            
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-gray-500 text-sm">
                    If you didn't request this email, you can safely ignore it.
                </p>
                <p class="text-gray-500 text-sm mt-2">
                    This is a server generated email. Please DO NOT reply back for queries here.<br/>
                    For Website queries and bug reports, please contact joashjeshurun9@protonmail.ch<br/>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
END;

    $mail->AltBody = "Please activate your account by visiting this URL: $activation_url";

    try {
        $mail->send();
        echo "DEBUG 13 - Mail sent<br>";
        header("Location: signup-success.php");
        exit;
    } catch (Exception $e) {
        die("DEBUG 14 - Mail failed: " . $mail->ErrorInfo);
    }

} else {
    die("DEBUG 15 - Insert failed: " . $mysqli->error);
}
ob_end_flush();
?>
