
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Education Incentive Association</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/eia.png" rel="icon">
  <link href="assets/img/eia.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @media screen and (max-width:768px){
      .custom_boxing{
          padding-top:24px;
      }
    }
      .slider_custom{
          width: 100%;
          max-width: 100%;
          height: 550px;
          margin: auto;
          position: relative;
          overflow:hidden;
      }
      .list {
          position: absolute;
          top: 0;
          left: 0;
          height: 100%;
          display: flex;
          width: max-content;
          transition: 1s;
      }
      .list img{
          width: 1600px;
          max-width: 100vw;
          height: 550px;
          object-fit: cover;
      }
      .buttons{
          position: absolute;
          top: 45%;
          left: 2.5%;
          width: 96%;
          display: flex;
          justify-content: space-between;
      }
      .buttons button {
          width:50px;
          height: 50px;
          border-radius: 505;
          color: #ffffff;
          border: none;
          font-family: monospace;
          font-weight: bold;
          font-size:60px;
      }
      .dots{
          position: absolute;
          bottom: 10px;
          color: #fff;
          left: 0;
          width: 100%;
          margin: 0;
          padding: 0;
          display: flex;
          justify-content: center;
          transition: 1s;
      }
      .dots li {
          list-style: none;
          width: 10px;
          height: 10px;
          background-color: #fff;
          margin: 20px;
          border-radius: 20px;
      }
      .dots li.active {
          width: 30px;
      }

      @media screen and ( max-width: 768px) { 
        .slider_custom{
            width: 100%;
            max-width: 100%;
            height: 240px;
            margin: auto;
            position: relative;
            overflow:hidden;
        }
        .list {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            display: flex;
            width: max-content;
            transition: 1s;
        }
        .list img{
            width: 1600px;
            max-width: 100vw;
            height: 280px;
            object-fit: cover;
        }
        .buttons{
            position: absolute;
            top: 55%;
            left: 2%;
            width: 95%;
            display: flex;
            justify-content: space-between;
        }
        .buttons button {
            width:30px;
            height: 50px;
            border-radius: 505;
            color: #ffffff;
            border: none;
            font-family: monospace;
            font-weight: bold;
            font-size:33px;
        }
        .dots{
            position: absolute;
            bottom: 1px;
            color: #fff;
            left: 0;
            width: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            transition: 1s;
        }
        .dots li {
            list-style: none;
            width: 5px;
            height: 5px;
            background-color: #fff;
            margin: 20px;
            border-radius: 20px;
        }
        .dots li.active {
            width: 20px;
        }
         
      }
  </style>

</head>

<body>

    <?php
        // This one line loads the entire header file
    require_once 'includes/header.php'; 
    // 1. Connect to your database
    // Include the file that *creates* the connection
    require_once "includes/database.php";
   
    // 2. Assign the connection object to the $db variable
    // (I am assuming your 'database.php' file creates a variable named '$conn')
    // If your file already creates a variable named '$db', you can skip this next line.

    // --- GOOD PRACTICE: Check if connection worked ---
    $db = $mysqli;
    if (!$db) {
        die("Database connection object not found. Please check database.php.");
    }
    // ------------------------------------------------
   
    // 3. Fetch all your images into an associative array
    //   (Your original code here was correct)
    $images_query = $db->query("SELECT image_key, image_src, alt_text FROM site_images");
    $images = [];
    while ($row = $images_query->fetch_assoc()) {
        $images[$row['image_key']] = $row;
    }
   
    // $images['about_section_cover']['image_src'] will now be 'assets/img/cover.JPG'
    // $images['about_section_cover']['alt_text'] will now be 'EIA members group photo'
   
    // This all happens *before* your HTML starts.
    ?>
   
   
   

   
   
   
    <div class="slider_custom">
        <div class="list">
            <div class="item">
                <img src="<?php echo htmlspecialchars($images['home_slider_1']['image_src']); ?>" alt="<?php echo htmlspecialchars($images['home_slider_1']['alt_text']); ?>">
            </div>
            <div class="item">
                <img src="<?php echo htmlspecialchars($images['home_slider_2']['image_src']); ?>" alt="<?php echo htmlspecialchars($images['home_slider_2']['alt_text']); ?>">
            </div>
            <div class="item">
                <img src="<?php echo htmlspecialchars($images['home_slider_3']['image_src']); ?>" alt="<?php echo htmlspecialchars($images['home_slider_3']['alt_text']); ?>">
            </div>
            <div class="item">
                <img src="<?php echo htmlspecialchars($images['home_slider_4']['image_src']); ?>" alt="<?php echo htmlspecialchars($images['home_slider_4']['alt_text']); ?>">
            </div>
            <div class="item">
                <img src="<?php echo htmlspecialchars($images['home_slider_5']['image_src']); ?>" alt="<?php echo htmlspecialchars($images['home_slider_5']['alt_text']); ?>">
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><</button>
        <button id="next">></button>
        </div>
        <ul class="dots">
           <li class="active"></li>
           <li></li>
           <li></li>
           <li></li>
           <li></li> 
        </ul>
    </div>


   
   <script>
        let list = document.querySelector('.slider_custom .list');
        let items = document.querySelectorAll('.slider_custom .list .item');
        let dots = document.querySelectorAll('.slider_custom .dots li');
        let prev = document.getElementById('prev');
        let next = document.getElementById('next');

        let active = 0;
        let lengthitems = items.length - 1;

        next.onclick = function() {
            if (active + 1 > lengthitems) {
                active = 0;
            } else {
                active = active + 1;
            }
            reloadslider_custom();
        }

        prev.onclick = function() {
            if (active - 1 < 0) {
                active = lengthitems;
            } else {
                active = active - 1;
            }
            reloadslider_custom();
        }

        let autoslide = setInterval(() => { next.click(); }, 6000);

        function reloadslider_custom() {
            let checkleft = items[active].offsetLeft;
            list.style.left = -checkleft + 'px';

            let lastactiveDot = document.querySelector('.slider_custom .dots li.active');
            if (lastactiveDot) lastactiveDot.classList.remove('active');
            dots[active].classList.add('active');
        }

        dots.forEach((li, key) => {
            li.addEventListener('click', function() {
                active = key;
                reloadslider_custom();
            })
        })
    </script>

  <main id="main">

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="<?php echo htmlspecialchars($images['about_section_cover']['image_src']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($images['about_section_cover']['alt_text']); ?>">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Volunteering by conducting various projects each calendar year to achieve academic excellence and build future leaders.</h3>
            <p> </p>
            <br>
            <p class="fst-italic">
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i>Provide continuous intellectual and career support to Advanced Level science stream students, with the goal of increasing the number of students achieving “Merit” and higher academic distinctions.</li>
              <li><i class="bi bi-check-circle"></i> Organize seminars, workshops, motivational programs, and social events to broaden the knowledge and ideas of Advanced Level science stream students.</li>
              <li><i class="bi bi-check-circle"></i> Encourage collaboration with university-based student organizations by encouraging active participation in joint projects and mutual support during their implementation.</li>
              <li><i class="bi bi-check-circle"></i> Maintaining strong relationships between schools, universities, and other educational organizations in the Eastern part of Sri Lanka.</li>
            </ul>
            <p> </p>
            <br>
            <p>
              Join us in our mission to create a brighter future for the science stream students of Batticaloa and Ampara. Together, we can make a significant impact on their academic journey and contribute to the development of future leaders.
            </p>

          </div>
        </div>

      </div>
    </section><div class="container text-center my-5">
      <div class="row justify-content-center">
        <div class="col-md-3 col-6 mb-4">
          <div class="d-flex justify-content-center align-items-center stat" data-target="5000" style="font-size: 2.5rem; color: #0d6efd; font-weight: bold;">
            <span class="count">0</span>
            <span>+</span>
          </div>
          <p>Members</p>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="d-flex justify-content-center align-items-center stat" data-target="15" style="font-size: 2.5rem; color: #0d6efd; font-weight: bold;">
            <span class="count">0</span>
            <span>+</span>
          </div>
          <p>Projects</p>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="d-flex justify-content-center align-items-center stat" data-target="5" style="font-size: 2.5rem; color: #0d6efd; font-weight: bold;">
            <span class="count">0</span>
            <span>+</span>
          </div>
          <p>Events</p>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="d-flex justify-content-center align-items-center stat" data-target="30" style="font-size: 2.5rem; color: #0d6efd; font-weight: bold;">
            <span class="count">0</span>
            <span>+</span>
          </div>
          <p>Years of Service</p>
        </div>
      </div>
    </div>


    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.stat');
     
        counters.forEach(counter => {
          const countElem = counter.querySelector('.count');
          const target = +counter.getAttribute('data-target');
          let count = 0;
     
          const updateCount = () => {
            const increment = target / 100;
            if (count < target) {
              count += increment;
              countElem.innerText = Math.ceil(count);
              requestAnimationFrame(updateCount);
            } else {
              countElem.innerText = target;
            }
          };
     
          updateCount();
        });
      });
    </script>
 
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why our EIA is the best?</h3>
              <p>
                The best educational and volunteering association in the Batticaloa and Ampara regions due to its unwavering commitment to enhancing the quality of education in rural communities. Our students volunteer to improve the education level by engaging in various projects in the region.
              </p>
              <div class="text-center">
                <a href="about.php" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Bring all students together</h4>
                    <p class="text-start" style="text-align: justify;">By uniting individuals from diverse backgrounds and experiences, we create an environment where ideas, knowledge, and perspectives can flow freely, enriching the academic journey for every student involved.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Vision</h4>
                    <p class="text-start" style="text-align: justify;">To be a guiding light of knowledge and support, empowering science stream students in the Eastern part of Sri Lanka to achieve academic excellence and create future leaders.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Mission</h4>
                    <p class="text-start" style="text-align: justify;">To provide intellectual support and resources to the science stream students in Batticaloa
                      and Ampara, fostering social connections and organizing academic events to enhance
                      their educational experiences. We strive to promote equality, peace, and sustainable
                      development within our organization and the wider community, while disseminating
                      relevant information and cooperating with other educational bodies to address the
                      economic and social challenges faced by our students.</p>
                  </div>
                </div>
              </div>
            </div></div>
        </div>

      </div>
    </section><section id="features" class="features">
      <div class="container" data-aos="fade-up">

      </div>
    </section><section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Projects</h2>
          <p>Major Projects</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <div class="ratio" style="--bs-aspect-ratio: 66.625%;">
                <img src="<?php echo htmlspecialchars($images['project_teaching_thumbnail']['image_src']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($images['project_teaching_thumbnail']['alt_text']); ?>">
              </div>
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>TEACHING</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="teaching.php">Teaching Project</a></h3>
                <p> </p>
                <br>
                <p class="text-start" style="text-align: justify;">
                  Through this project, our EIA members & volunteers mentor and teach science stream subjects to G.C.E. Advanced Level students, especially those from rural areas. The project aims to uplift the educational standards of students in the Batticaloa and Ampara districts.
                </p>
               
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Schools</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;300
                   
                    <i class="bx bxs-heart" style="color: red;"></i>&nbsp;75
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="custom_boxing col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="<?php echo htmlspecialchars($images['project_arduino_thumbnail']['image_src']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($images['project_arduino_thumbnail']['alt_text']); ?>">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>ARDUINO</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="arduino-details.php">Arduino Teaching Project</a></h3>
                <p> </p>
                <br>
                <p class="text-start" style="text-align: justify;">Through this project, our EIA members introduce Arduino-based programming and electronics to school students, helping them gain hands-on experience in STEM education.The project aims to spark creativity and innovation among students, especially those with limited laboratory access.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>ITDLH</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;120
                   
                    <i class="bx bxs-heart" style="color: red;"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img style="height:240px;" src="<?php echo htmlspecialchars($images['project_physics_thumbnail']['image_src']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($images['project_physics_thumbnail']['alt_text']); ?>">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Exhibition</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="physics.php">Physics Practical Workshop.</a></h3>
                <p> </p>
                <br>
                <p class="text-start" style="text-align: justify;">We guide school students in performing key physics practicals, enhancing their hands-on skills and conceptual understanding. The project aims to bridge the gap between theory and practice for students, especially those with limited laboratory access.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="" class="img-fluid" alt="">
                    <span>Schools</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;750
                   
                    <i class="bx bxs-heart" style="color: red;"></i>&nbsp;82
                  </div>
                </div>
              </div>
            </div>
          </div> <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="<?php echo htmlspecialchars($images['project_youtube_thumbnail']['image_src']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($images['project_youtube_thumbnail']['alt_text']); ?>">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>YOUTUBE</h4>
                  <p class="price"> </p>
                </div>

                <h3><a href="ytProject.php">Youtube Project</a></h3>
                <p> </p>
                <br>
                <p class="text-start" style="text-align: justify;">We create and share video explanations of G.C.E. Advanced Level science stream past papers on YouTube.The aim is to provide accessible and clear guidance to students,especially those who lack access to quality tuition and academic support.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>Online</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;2.7K
                   
                    <i class="bx bxs-heart" style="color: red;"></i>&nbsp;85
                  </div>
                </div>
              </div>
            </div>
          </div> </div>

      </div>
    </section></main><?php
    // This one line loads the entire footer, scripts, and closes the page
    require_once 'includes/footer.php'; 
  ?>
