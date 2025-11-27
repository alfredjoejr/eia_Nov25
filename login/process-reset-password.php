<?php
$token = $_POST["token"];
$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user WHERE reset_token_hash = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Common SweetAlert2 configuration for error messages
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
    die();
}

// Success alert configuration
function showSuccessAlert($message, $redirectUrl = "login.php") {
    echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "'.$message.'",
            customClass: {
                popup: "!rounded-xl"
            },
            confirmButtonText: "OK",
            background: "#ffffff",
            confirmButtonColor: "#3b82f6"
        }).then(() => {
            window.location.href = "'.$redirectUrl.'";
        });
    </script>';
    die();
}

if ($user === null) {
    showErrorAlert("Token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    showErrorAlert("Token has expired");
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

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE user
        SET password_hash = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $password_hash, $user["id"]);
$stmt->execute();

showSuccessAlert("Password has been updated. You can login now.", "login.php");
?>