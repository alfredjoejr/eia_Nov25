<?php
// 1. DATABASE CONNECTION
require_once 'includes/database.php'; 

// Ensure connection object exists (fallback)
if (!isset($mysqli) && isset($conn)) { $mysqli = $conn; }
if (!isset($mysqli)) { die("Database connection failed."); }

// 2. FETCH IMAGES
$images = [];
$sql = "SELECT image_key, image_src, alt_text FROM site_images";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $images[$row['image_key']] = $row;
    }
}

// Helper function
function getImg($key, $imagesArr) {
    if (isset($imagesArr[$key]) && !empty($imagesArr[$key]['image_src'])) {
        return htmlspecialchars($imagesArr[$key]['image_src']);
    }
    return ''; // Return empty string if not found
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Youtube Project - 2023 | Education Incentive Association</title>
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

  <?php require_once 'includes/header.php'; ?><main id="main">

    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Youtube Project - 2023</h2>
      </div>
    </div><section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <a data-flickr-embed="true" href="https://www.flickr.com/photos/202640968@N07/albums/72177720325266096/" title="Arduino 2023">
              <img src="<?php echo getImg('project_youtube_2023_cover', $images); ?>" class="project_img_mob" alt="Youtube Project Cover">
            </a>
            <h3 class="mobile_head">Project Overview</h3>
            <p class="mobile_para">We create and share video explanations of G.C.E. Advanced Level science stream past papers on YouTube. The aim is to provide accessible and clear guidance to students, especially those who lack access to quality tuition and academic support.
            </p>
          </div>

          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Demonstrators</h5>
              <p><a href="#">EIA 2023</a></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Date</h5>
              <p>2023</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Time</h5>
              <p>1 Hour</p>
            </div>

          </div>
        </div>

      </div>
    </section><div class="container my-5">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link rounded-pill px-4 py-2 text-white bg-primary border-0 mx-3" href="https://www.flickr.com/photos/202640968@N07/albums/72177720325266096/" style="transition: 0.3s;">View Gallery</a>
          </li>
        </ul>
      </nav>
    </div>

    <section id="cource-details-tabs" class="cource-details-tabs">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Benefits of Youtube Project</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Impact Among Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Feedback</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Budget Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Conclusion</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Benefits of Youtube Project</h3>
                    <p class="fst-italic">The YouTube project is an effective learning tool that helps students prepare for exams with greater clarity and confidence.</p>
                    <p>By providing detailed explanations in a simple and student-friendly manner, these videos make complex concepts easier to understand. The platform also allows students to learn at their own pace, revisit topics as needed, and gain exposure to smart techniques for solving questions efficiently.
</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="<?php echo getImg('project_youtube_tab_1', $images); ?>" alt="Benefits" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impact Among Students</h3>
                    <p class="fst-italic">This initiative has significantly helped students—especially those in rural and under-resourced areas—by offering free, accessible educational content. Many students have reported improved understanding of difficult subjects and increased confidence in tackling exam questions. </p>
                    <p>The interactive and visual approach boosts engagement and motivates self-study, making it a valuable academic support system.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="<?php echo getImg('project_youtube_tab_2', $images); ?>" alt="Impact" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Feedback</h3>
                    <p class="fst-italic">Included in the annex are the valuable feedbacks from students. The 
                      overwhelmingly positive responses highlight the success of this project</p>
                      <a href="#">Youtube Project Feedback 2023</a>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="<?php echo getImg('project_youtube_tab_3', $images); ?>" alt="Feedback" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Budget Overview</h3>
                    <p class="fst-italic">A detailed breakdown of the budget is also annexed.</p>
                    <a href="https://drive.google.com/file/d/1oogawQ0EGCAfNQe1vh8g6JCGXeW93xaw/view?usp=drive_link">Youtube Project Report 2023</a>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="<?php echo getImg('project_youtube_tab_4', $images); ?>" alt="Budget" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Conclusion</h3>
                    <p class="fst-italic">The YouTube project is a meaningful step towards making quality education more accessible and effective. It not only supports exam preparation but also promotes independent learning, benefiting a wide range of students across different regions.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="<?php echo getImg('project_youtube_tab_5', $images); ?>" alt="Conclusion" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section></main><div class="container my-5">
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link rounded-pill px-4 py-2 text-white bg-primary border-0 mx-3" href="2024/ytProject.php" style="transition: 0.3s;">2024</a>
        </li>
        <li class="page-item active">
          <a class="page-link rounded-pill px-4 py-2 text-white bg-primary border-0 mx-3" href="#" style="transition: 0.3s;">2022</a>
        </li>
        <li class="page-item">
          <a class="page-link rounded-pill px-4 py-2 text-white bg-primary border-0 mx-3" href="#" style="transition: 0.3s;">2021</a>
        </li>
      </ul>
    </nav>
  </div>

  
<?php
    // This one line loads the entire footer, scripts, and closes the page
    require_once 'includes/footer.php'; 
  ?>