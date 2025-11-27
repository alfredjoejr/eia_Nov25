<?php
// 1. DATABASE CONNECTION
require_once 'includes/database.php'; 
// Use $mysqli from database.php, usually it returns the connection object.
// If your database.php does not return the object, ensure $mysqli is available here.
if (!isset($mysqli)) {
    $mysqli = new mysqli("localhost", "username", "password", "eialk_logindb"); // Fallback if include fails
}

// 2. FETCH IMAGES
$images = [];
$sql = "SELECT image_key, image_src, alt_text FROM site_images";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $images[$row['image_key']] = $row;
    }
}

// Helper function to get image source safely
function getImg($key, $imagesArr) {
    if (isset($imagesArr[$key]) && !empty($imagesArr[$key]['image_src'])) {
        return htmlspecialchars($imagesArr[$key]['image_src']);
    }
    return 'assets/img/course-1.jpg'; // Default fallback image
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Projects | Education Incentive Association</title>
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
  <style>
    @media(min-width:1000px){
      img.project{
        height: 200px; 
        width: 350px; 
        background-color: #f8f9fa;
      }
    }
    @media screen and (max-width:768px){
        h2{
                padding-top:7px;
            }
        }
  </style>
<body>

  <?php require_once 'includes/header.php'; ?><main id="main" data-aos="fade-in">

    <div class="breadcrumbs">
      <div class="container">
        <h2>Projects</h2>
        <p> </p>
      </div>
    </div><section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="<?php echo getImg('project_arduino_thumbnail', $images); ?>" class="img-fluid" alt="Arduino">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>ARDUINO</h4>
                  <p class="price"></p>
                </div>

                <h3><a href="arduino-details.php">Arduino Workshop</a></h3>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>ITDLH</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 50
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 65
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_physics_thumbnail', $images); ?>" class="project img-fluid" alt="Physics" >
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Exhibition</h4>
                  <p class="price"></p>
                </div>

                <h3><a href="physics.php">Physics Practical Workshop.</a></h3>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Schools</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 35
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 42
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_youtube_thumbnail', $images); ?>" class="img-fluid" alt="Youtube">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>YOUTUBE</h4>
                  <p class="price"></p>
                </div>

                <h3><a href="ytProject.php">Youtube Project</a></h3>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Online</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 20
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 85
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_teaching_thumbnail', $images); ?>" class="img-fluid project">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Teaching</h4>
                  <p class="price"></p>
                </div>

                <h3><a href="teaching.php">Teaching Project</a></h3>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Schools</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 20
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 85
                  </div>
                </div>
              </div>
            </div>
          </div> </div>

      </div>
    </section><section id="courses" class="courses" style= "padding-top: 0px;">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="<?php echo getImg('project_medical_visit_thumbnail', $images); ?>" class="img-fluid project" alt="Medical Visit">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Medicine</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="medicalvisit.php">Medical Faculty Visit</a></h3>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Eastern</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 50
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 65
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_blood_donation_thumbnail', $images); ?>" class="img-fluid project" alt="Blood Donation">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Blood</h4>
                  <p class="price"></p>
                </div>

                <h3><a href="2024/blooddonation.php">Blood Donation Camp</a></h3>
                 
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>RDHS</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 35
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 42
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_motivational_thumbnail', $images); ?>" class="img-fluid project" alt="Motivational" >
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Seminar </h4>
                  <p class="price"></p>
                </div>

                <h3><a href="motivational.php">Motivational Seminar</a></h3>
               
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Schools</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 20
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 85
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_medical_camp_thumbnail', $images); ?>" class="img-fluid project" alt="Medical Camp" >
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Camp</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="2024/medicalCamp.php">Medical Camp</a></h3>
                 
               
                <p class="text-start" style="text-align: justify;"> </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Village</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 2.7K
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 85
                  </div>
                </div>
              </div>
            </div>
          </div> </div>

      </div>
    </section><section id="courses" class="courses" style= "padding-top: 0px;">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="<?php echo getImg('project_social_thumbnail', $images); ?>" class="img-fluid project" alt="Social">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Social</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="social.php">Social Related Project</a></h3>
               
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Region </span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 50
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 65
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_chess_thumbnail', $images); ?>" class="img-fluid project">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Chess</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="chess.php">Annual Chess Tournament</a></h3>
                 
                <p class="text-start" style="text-align: justify;">  </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Schools</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 2.7K
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 85
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_carwash_thumbnail', $images); ?>" class="img-fluid project">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Carwash</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="carwash.php">Car Wash</a></h3>
               
                <p class="text-start" style="text-align: justify;">  </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Online</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 2.7K
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 85
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_cricket_thumbnail', $images); ?>" class="img-fluid project" >
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Cricket</h4>
                  <p class="price"></p>
                </div>

                <h3><a href="cricket.php">Annual Cricket Tournament</a></h3>
                 
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Region</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 35
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 42
                  </div>
                </div>
              </div>
            </div>
          </div> </div>

      </div>
    </section><section id="courses" class="courses" style= "padding-top: 0px;">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="<?php echo getImg('project_agt_thumbnail', $images); ?>" class="img-fluid project">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>AGT</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="2024/annnualGetTogether.php">Annual Get-together</a></h3>
              
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Region </span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 50
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 65
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_agm_thumbnail', $images); ?>" class="img-fluid project" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>AGM</h4>
                  <p class="price"> </p>
                </div>

                <h3 style="padding-bottom:5px;"><a href="agm.php">Annual General Meeting</a></h3>
                
                <p class="text-start" style="text-align: justify;">  </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Schools</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 2.7K
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 85
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="<?php echo getImg('project_special_thumbnail', $images); ?>" class="img-fluid project" >
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Speical Projects</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="2024/speicalProject.php">Special Projects</a></h3>
                
                <p class="text-start" style="text-align: justify;">  </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Schools</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i> 2.7K
                      
                    <i class="bx bxs-heart" style="color: red;"></i> 85
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section></main><?php
    // This one line loads the entire footer, scripts, and closes the page
    require_once 'includes/footer.php'; 
  ?>