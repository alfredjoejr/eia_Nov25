<?php
// ==========================================
// 1. INCLUDE EXISTING DATABASE CONNECTION
// ==========================================
// We require the file. Since your database.php ends with 'return $mysqli;',
// this variable $conn will hold that connection object.
$conn = require 'Mentor/includes/database.php';

// Verify connection (Safety check)
if (!$conn || $conn->connect_error) {
    die("Connection failed: " . ($conn->connect_error ?? "Unknown error"));
}

// ==========================================
// 2. FETCH IMAGES
// ==========================================
// We fetch all images and store them in an associative array 
// using 'image_key' as the index for easy access in HTML.
$sql = "SELECT * FROM site_images";
$result = $conn->query($sql);

$site_images = []; // Array to hold our images

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $site_images[$row['image_key']] = $row;
    }
}

// Helper function to get image source safely
function getImg($key, $field = 'image_src') {
    global $site_images;
    if (isset($site_images[$key]) && !empty($site_images[$key][$field])) {
        return $site_images[$key][$field];
    }
    return '#'; // Return hash or default path if image not found
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Education Incentive Association</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="<?php echo getImg('site_favicon'); ?>" rel="icon">
  <link href="<?php echo getImg('site_apple_icon'); ?>" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    
  </style>
</head>

<body>

  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html">EIA</a></h1>
        </div>
    </div>
  </header><section class="hero-section" id="hero">

    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-8 text-center text-lg-start">
              <h1 data-aos="fade-right" class="mb-2">Education Incentive Association</h1>
              <p class="mb-3" data-aos="fade-right" data-aos-delay="100">Since 1993<br/></p>
              <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="Mentor/index.php" class="btn btn-outline-white">Get started</a></p>
            </div>
            <div class="col-lg-4 iphone-wrap">
              <a href="https://www.youtube.com/@EIASciencePark">
                <img src="<?php echo getImg('hero_iphone_1'); ?>" alt="App Interface 1" class="phone-1" data-aos="fade-right">
                <img src="<?php echo getImg('hero_iphone_2'); ?>" alt="App Interface 2" class="phone-2" data-aos="fade-right" data-aos-delay="200">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  
  <script src="assets/js/main.js"></script>

</body>

</html>