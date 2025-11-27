<?php
// 1. DATABASE CONNECTION
$conn = require_once 'includes/database.php'; // Check path!
if (!$conn) { die("Connection failed."); }

// 2. FETCH DATA FOR 2019/20
// We select only the categories we just inserted
$sql = "SELECT * FROM team_members WHERE category IN ('Senior_2019', 'Junior_2019') ORDER BY display_order ASC";
$result = $conn->query($sql);

$members = [
    'Senior_2019' => [],
    'Junior_2019' => []
];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if(isset($members[$row['category']])) {
            $members[$row['category']][] = $row;
        }
    }
}

// Helper function to render cards
function renderMemberCard($member) {
    // Handle potentially empty fields
    $roleHtml = !empty($member['role_title']) ? '<span>'.htmlspecialchars($member['role_title']).'</span>' : '<span></span>';
    
    // Basic social links (placeholders as per original HTML)
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

  <title>Past Members | EIA</title>
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

  <?php require_once 'includes/header.php'; ?><main id="main" data-aos="fade-in">

    <div class="breadcrumbs">
      <div class="container">
        <h3>Senior Committee - 2019/20</h3>
        <p>The Senior Committee advises and guides the Junior Committee through organizational objectives. Members who graduated less than three years ago can represent the SC. </p>
      </div>
    </div>

    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php 
            if(!empty($members['Senior_2019'])) {
                foreach($members['Senior_2019'] as $m) {
                    renderMemberCard($m);
                }
            }
            ?>
        </div>
      </div>
    </section>

  </main><main id="main" data-aos="fade-in">

    <div class="breadcrumbs">
      <div class="container">
        <h3>Junior Committee - 2019/20</h3>
        <p>The Junior Committee works to achieve the organizational objectives. All projects will be carried out by them, and only members who are in the student category can represent the JC </p>
      </div>
    </div>

    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
             <?php 
            if(!empty($members['Junior_2019'])) {
                foreach($members['Junior_2019'] as $m) {
                    renderMemberCard($m);
                }
            }
            ?>
        </div>
      </div>
    </section>

  </main><?php
    // This one line loads the entire footer, scripts, and closes the page
    require_once 'includes/footer.php'; 
  ?>

</body>
</html>