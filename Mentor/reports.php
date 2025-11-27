<?php
session_set_cookie_params(['path' => '/']);
// 1. START THE SESSION
session_start();


// ADD THIS LINE FOR TESTING




// 2. CHECK AUTHENTICATION (Are they logged in?)
if (!isset($_SESSION["user_id"])) {
    header("Location: index.html"); // Redirect to login
    exit;
}

// 3. CHECK AUTHORIZATION (Do they have permission?)
$mysqli = require __DIR__ . "/database.php";
$sql = "SELECT DocPrivileages FROM user WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// 4. ENFORCE THE RULE
if (!$user || $user["DocPrivileages"] != 1) {
    // Not authorized
    http_response_code(403);
    die("<h1>Access Denied</h1>
         <p>You do not have the required permissions to view this page.</p>
         <a href='profile2.php'>Return to Profile</a>");
}

// 5. SUCCESS: SERVE THE PRIVATE FILE
// If they passed all checks, read the real HTML file and output it.
// 
// IMPORTANT: Update this path to the correct full path on your server.
// You can get this from your hosting control panel.
$filePath = '/home/eialk/private_files/private_reports.html';

if (file_exists($filePath)) {
    // Set the content type so the browser knows it's HTML
    header('Content-Type: text/html');
    // Read the file and print it to the browser
    readfile($filePath);
    exit;
} else {
    // In case your path is wrong
    http_response_code(500);
    die("<h1>Error</h1><p>Internal Server Error: Report file not found.</p>");
}
?>