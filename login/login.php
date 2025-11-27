<?php
// THIS IS THE GLOBAL SESSION FIX
// It MUST come before session_start()
session_set_cookie_params(['path' => '/']);

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    // --- THIS IS THE SECURITY FIX (Prepared Statement) ---
    $sql = "SELECT * FROM user WHERE email = ?";
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_POST["email"]); // "s" for string
    $stmt->execute();
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    // --- END OF SECURITY FIX ---

    if ($user && $user["account_activation_hash"] === null) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            // Start the session *after* verifying,
            // but the cookie path was set at the top.
            session_start(); 
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            // Redirect to the correct index page
            header("Location: index.php"); 
            exit;
        }
    }
    
    $is_invalid = true;
}

?>