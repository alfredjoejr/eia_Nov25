<?php
// 1. DATABASE CONNECTION
$conn = require_once 'includes/database.php'; 
if (!$conn) { die("Connection failed."); }

// 2. FETCH DATA
// We fetch Board, Council, and the specific 2022/23 committees
$target_categories = "'Board', 'Council', 'Senior_2022', 'Junior_2022'";
$sql = "SELECT * FROM team_members WHERE category IN ($target_categories) ORDER BY display_order ASC";
$result = $conn->query($sql);

// Initialize arrays for all 4 groups
$members = [
    'Board' => [],
    'Council' => [],
    'Senior_2022' => [],
    'Junior_2022' => []
];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Check if the category exists in our array before adding (safety check)
        if(array_key_exists($row['category'], $members)) {
            $members[$row['category']][] = $row;
        }
    }
}

// Helper function to render cards
function renderMemberCard($member) {
    $roleHtml = !empty($member['role_title']) ? '<span>'.htmlspecialchars($member['role_title']).'</span>' : '<span></span>';
    
    $socialHtml = '
    <div class="social">
        <a href=""><i class="bi bi-twitter"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
    </div>';

    echo '
    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member">
            <img src="'.htmlspecialchars($member['image_src']).'" class="img-fluid" alt="'.htmlspecialchars($member['name']).'">
            <div class="member-content">
                <h4>'.htmlspecialchars($member['name']).'</h4>
                '.$roleHtml.'
                <p>'.$member['description'].'</p>
                '.$socialHtml.'
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
        <h2>Board of Trustees</h2>
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
        <h2>Council Body</h2>
        <span>The Council Body will supervise the activities of the Senior Committee (SC) and Junior Committee (JC).</span>
      </div>
    </div>

    <section id="trainers" class="trainers">
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

  <main id="main" data-aos="fade-in">

    <div class="breadcrumbs">
      <div class="container">
        <h3>Senior Committee - 2022/23</h3>
        <p>The Senior Committee advises and guides the Junior Committee through organizational objectives. Members who graduated less than three years ago can represent the SC.</p>
      </div>
    </div>

    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php 
            if(!empty($members['Senior_2022'])) {
                foreach($members['Senior_2022'] as $m) { renderMemberCard($m); }
            }
            ?>
        </div>
      </div>
    </section>

    <div class="breadcrumbs">
      <div class="container">
        <h3>Junior Committee - 2022/23</h3>
        <p>The Junior Committee works to achieve the organizational objectives. All projects will be carried out by them, and only members who are in the student category can represent the JC.</p>
      </div>
    </div>

    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
             <?php 
            if(!empty($members['Junior_2022'])) {
                foreach($members['Junior_2022'] as $m) { renderMemberCard($m); }
            }
            ?>
        </div>
      </div>
    </section>

  </main>

  <?php
    require_once 'includes/footer.php'; 
  ?>

</body>
</html>