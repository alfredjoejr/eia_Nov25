<?php
// 1. DB CONNECTION
$conn = require_once 'includes/database.php'; // Adjust path if needed
if (!$conn) { die("Connection failed."); }

// 2. FETCH MEMBERS
// We fetch everyone ordered by category and display_order
$sql = "SELECT * FROM team_members ORDER BY display_order ASC";
$result = $conn->query($sql);

// 3. GROUP DATA
// We organize them into arrays: $members['Board'], $members['Junior'], etc.
$members = [
    'Board' => [],
    'Council' => [],
    'Senior' => [],
    'Junior' => []
];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Add member to their specific category list
        if(isset($members[$row['category']])) {
            $members[$row['category']][] = $row;
        }
    }
}

// Helper function to render a single member card
function renderMemberCard($member) {
    // Handle empty social links
    $tw = !empty($member['twitter']) ? $member['twitter'] : '';
    $fb = !empty($member['facebook']) ? $member['facebook'] : '';
    $ig = !empty($member['instagram']) ? $member['instagram'] : '';
    $in = !empty($member['linkedin']) ? $member['linkedin'] : '';
    
    // Handle role (Only show if it exists)
    $roleHtml = !empty($member['role_title']) ? '<span>'.htmlspecialchars($member['role_title']).'</span>' : '<span></span>';

    echo '
    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
      <div class="member">
        <img src="'.htmlspecialchars($member['image_src']).'" class="img-fluid" alt="'.htmlspecialchars($member['name']).'">
        <div class="member-content">
          <h4>'.htmlspecialchars($member['name']).'</h4>
          '.$roleHtml.'
          <p>
            '.$member['description'].' 
          </p>
          <div class="social">
            '. ($tw ? '<a href="'.$tw.'"><i class="bi bi-twitter"></i></a>' : '<a href=""><i class="bi bi-twitter"></i></a>') .'
            '. ($fb ? '<a href="'.$fb.'"><i class="bi bi-facebook"></i></a>' : '<a href=""><i class="bi bi-facebook"></i></a>') .'
            '. ($ig ? '<a href="'.$ig.'"><i class="bi bi-instagram"></i></a>' : '<a href=""><i class="bi bi-instagram"></i></a>') .'
            '. ($in ? '<a href="'.$in.'"><i class="bi bi-linkedin"></i></a>' : '<a href=""><i class="bi bi-linkedin"></i></a>') .'
          </div>
        </div>
      </div>
    </div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trainers - Mentor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php require_once 'includes/header.php'; ?>
  
  <main id="main" data-aos="fade-in">
    
    <div class="breadcrumbs">
      <div class="container">
        <h2>Board of Trustees </h2>
        <span>Responsible for preserving the culture and tradition of the organization and the sovereignty of EIA members.</span>
      </div>
    </div>
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php 
                if(!empty($members['Board'])) {
                    foreach($members['Board'] as $m) { renderMemberCard($m); }
                }
            ?>
        </div>
      </div>
    </section>

    <div class="breadcrumbs">
      <div class="container">
        <h2>Council Body </h2>
        <span>The Council Body will supervise the activities of the Senior Committee (SC) and Junior Committee (JC) and ensure that the objectives, ethics, and professionalism are upheld to generally accepted standards. Only members who graduated more than eight years ago can be members of the Council Body.</span>
      </div>
    </div>
    <section id="council" class="trainers"> 
        <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php 
                if(!empty($members['Council'])) {
                    foreach($members['Council'] as $m) { renderMemberCard($m); }
                }
            ?>
        </div>
      </div>
    </section>

  </main>

  <div class="breadcrumbs" id="senior-committee">      
    <div class="container">
        <h2>Senior Committee</h2>
        <p>The Senior Committee advises and guides the Junior Committee through organizational objectives. Members who graduated less than three years ago can represent the SC. </p>
      </div>
    </div>

    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php 
                if(!empty($members['Senior'])) {
                    foreach($members['Senior'] as $m) { renderMemberCard($m); }
                }
            ?>
        </div>
      </div>
    </section>

    <div class="breadcrumbs">
      <div class="container">
        <h2>Junior Committee</h2>
        <p>The Junior Committee works to achieve the organizational objectives. All projects will be carried out by them, and only members who are in the student category can represent the JC </p>
      </div>
    </div>

    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php 
                if(!empty($members['Junior'])) {
                    foreach($members['Junior'] as $m) { renderMemberCard($m); }
                }
            ?>
        </div>
      </div>
    </section>

  <?php
    require_once 'includes/footer.php'; 
  ?>

</body>
</html>