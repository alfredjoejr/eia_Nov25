<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION["user_id"])) {
    header("Location: profile.php");
    exit;
}

$is_invalid = false;

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    // Check account is activated and password is correct
    if ($user && $user["account_activation_hash"] === null) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_regenerate_id(true);
            $_SESSION["user_id"] = $user["id"];
            header("Location: profile.php");
            exit;
        }
    }

    $is_invalid = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home / Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Welcome</h1>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && $is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>

    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button>Log in</button>
    </form>

    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    <p><a href="forgot-password.php">Forgot password?</a></p>

</body>
</html>
