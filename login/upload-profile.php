<?php
session_start();
// 1. Load the Composer autoloader
require __DIR__ . '/vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

// Helper function to send a JSON response and stop the script
function send_json_response($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// 2. Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    send_json_response(['success' => false, 'message' => 'User not authenticated.']);
}

$mysqli = require __DIR__ . "/database.php";

// 3. Configure your Cloudinary credentials
Configuration::instance([
    'cloud' => [
        'cloud_name' => 'dzzqliyfa', // <-- YOUR CLOUD NAME
        'api_key'    => '375935719999451',    // <-- YOUR API KEY
        'api_secret' => 'ypzJ2xw7B5-7QWGDQabVo00Pc_k'  // <-- YOUR API SECRET
    ],
    'url' => [
        'secure' => true
    ]
]);

// 4. Check if a file was successfully uploaded
if (isset($_FILES["profile_pic"]) && $_FILES["profile_pic"]["error"] == 0) {

    $user_id = $_SESSION["user_id"];
    $file_tmp_path = $_FILES["profile_pic"]["tmp_name"]; // Path to the temporary file

    try {
        // 5. Upload the image to Cloudinary
        $uploadResult = (new UploadApi())->upload($file_tmp_path, [
            'public_id' => 'user_' . $user_id, // Sets the filename in Cloudinary
            'overwrite' => true,             // Replaces the old image
            'folder'    => 'eia_profiles'    // Puts it in a "eia_profiles" folder
        ]);

        // 6. Get the secure URL from Cloudinary
        $secure_url = $uploadResult['secure_url'];

        // 7. Save this new URL to your database
        $sql_update = "UPDATE user SET profile_image_path = ? WHERE id = ?";
        $stmt_update = $mysqli->prepare($sql_update);
        
        if ($stmt_update === false) {
             send_json_response(['success' => false, 'message' => 'Database prepare failed.']);
        }

        $stmt_update->bind_param("si", $secure_url, $user_id);

        if ($stmt_update->execute()) {
            // 8. Success! Send the JSON response.
            send_json_response(['success' => true]);
        } else {
            send_json_response(['success' => false, 'message' => 'Could not update database.']);
        }

    } catch (Exception $e) {
        send_json_response(['success' => false, 'message' => 'Error uploading to Cloudinary: ' . $e->getMessage()]);
    }

} else {
    $error_message = 'File upload failed.';
    if(isset($_FILES["profile_pic"])) {
        $error_message .= ' Code: ' . $_FILES["profile_pic"]["error"];
    }
    send_json_response(['success' => false, 'message' => $error_message]);
}
?>