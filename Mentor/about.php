<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>About - Eduaction Incentive Association</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php require_once 'includes/header.php'; ?><!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>About Us</h2>
        <p> </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/cover.JPG" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Volunteering by conducting various projects each calendar year to achieve academic excellence and build future leaders.</h3>
            <p class="fst-italic">
            </p>
            <ul class="pt-md-3 mt-3">
              <li><i class="bi bi-check-circle"></i>Assisting science stream students with their career development through intellectual support, aiming to increase the number of students entering the “Merit” category in Advanced Level examinations.</li>
              <li><i class="bi bi-check-circle"></i> Organizing academic and social events to expand the knowledge and ideas of advanced-level science students.</li>
              <li><i class="bi bi-check-circle"></i> Cooperating with other student organizations and participating in their activities within the relevant faculties in the universities.</li>
              <li><i class="bi bi-check-circle"></i> Maintaining strong relationships between schools, universities, and other educational organizations in the Eastern part of Sri Lanka.</li>
            </ul>
            <p class="mt-3">
              Join us in our mission to create a brighter future for the science stream students of Batticaloa and Ampara. Together, we can make a significant impact on their academic journey and contribute to the development of future leaders.
            </p>

          </div>
        </div>

      </div>
      
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <div class="container text-center my-5">
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
    

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What are they saying</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap p-3">
                <div class="testimonial-item d-flex align-items-start">
                  <!-- Left-side square image -->
                  <img src="assets/img/trainers/thushan.jpg" class="testimonial-img rounded me-3" alt="" style="width: 80px; height: 80px; object-fit: cover;">
            
                  <!-- Right-side content -->
                  <div>
                    <h3 class="fw-bold mb-1" id="testimonial_name">Thushan Sivalingam</h3>
                    <h4 class="text-uppercase text-muted mb-3" style="font-size: 0.85rem;">Doctoral Researcher,<br> Center for Wireless Communication,<br> University of Oulu, Finland</h4>
                    <p class="fst-italic text-secondary mb-0" id="testimonial_992">
                      <i class="bx bxs-quote-alt-left quote-icon-left text-primary"></i>
                      As a former Treasurer at EIA, I learned to lead under pressure, embrace new opportunities, and turn challenges into growth. It was more than a role — it was an experience that shaped my leadership journey.
                      <i class="bx bxs-quote-alt-right quote-icon-right text-primary"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap p-3">
                <div class="testimonial-item d-flex align-items-start">
                  <!-- Left-side square image -->
                  <img src="assets/img/trainers/vithuna1.jpg" class="testimonial-img rounded me-3" alt="" style="width: 80px; height: 80px; object-fit: cover;">
            
                  <!-- Right-side content -->
                  <div>
                    <h3 class="fw-bold mb-1" id="testimonial_name">Vithurshan Sayalolibavan</h3>
                    <h4 class="text-uppercase text-muted mb-3" style="font-size: 0.85rem;">Telecommunications Engineer</h4>
                    <p class="fst-italic text-secondary mb-0" id="testimonial_992">                      
                      <i class="bx bxs-quote-alt-left quote-icon-left text-primary"></i>
                      Despite the obstacles, we stayed true to our mission, and today, I’m proud to see EIA progressing steadily on the path we envisioned. This journey has not only strengthened the organization but also shaped me into a more determined and responsible leader.
                      <i class="bx bxs-quote-alt-right quote-icon-right text-primary"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap p-3">
                <div class="testimonial-item d-flex align-items-start">
                  <!-- Left-side square image -->
                  <img src="assets/img/trainers/imy1.jpg" class="testimonial-img rounded me-3" alt="" style="width: 80px; height: 80px; object-fit: cover;">
            
                  <!-- Right-side content -->
                  <div>
                    <h3 class="fw-bold mb-1" id="testimonial_name">Thurairajasingam Imyavan</h3>
                    <h4 class="text-uppercase text-muted mb-3" style="font-size: 0.85rem;">Undergraduate, <br>Faculty of Science, University of Colombo</h4>
                    <p class="fst-italic text-secondary mb-0" id="testimonial_992">                      
                      <i class="bx bxs-quote-alt-left quote-icon-left text-primary"></i>
                      The journey with EIA has enriched my leadership and social skills. Pleasure to have worked alongside so many talented, passionate and experienced individuals.
                      <i class="bx bxs-quote-alt-right quote-icon-right text-primary"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap p-3">
                <div class="testimonial-item d-flex align-items-start">
                  <!-- Left-side square image -->
                  <img src="assets/img/trainers/piriyanthan.jpg" class="testimonial-img rounded me-3" alt="" style="width: 80px; height: 80px; object-fit: cover;">
            
                  <!-- Right-side content -->
                  <div>
                    <h3 class="fw-bold mb-1" id="testimonial_name">Piriyanthan Ruthramoorthy</h3>
                    <h4 class="text-uppercase text-muted mb-3" style="font-size: 0.85rem;">Medical Officer Incharge,<br>Divisional Hospital,<br>Navatkadu.</h4>
                    <p class="fst-italic text-secondary mb-0" id="testimonial_992">                      
                      <i class="bx bxs-quote-alt-left quote-icon-left text-primary"></i>
                      Guiding a team through challenges and witnessing their growth along with the organization has been one of the most fulfilling aspects of my journey. 
                      <i class="bx bxs-quote-alt-right quote-icon-right text-primary"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-wrap p-3">
                <div class="testimonial-item d-flex align-items-start">
                  <!-- Left-side square image -->
                  <img src="assets/img/trainers/yanes.jpg" class="testimonial-img rounded me-3" alt="" style="width: 80px; height: 80px; object-fit: cover;">
            
                  <!-- Right-side content -->
                  <div>
                    <h3 class="fw-bold mb-1" id="testimonial_name">Yanes Mahalingam </h3>
                    <h4 class="text-uppercase text-muted mb-3" style="font-size: 0.85rem;">Engineer,<br>Road Development Authority (RDA),<br> Sri Lanka.</h4>
                    <p class="fst-italic text-secondary mb-0" id="testimonial_992">                      
                      <i class="bx bxs-quote-alt-left quote-icon-left text-primary"></i>
                      EIA offered a unique platform to build leadership and collaboration skills, while contributing meaningfully to society through social initiatives.
                      <i class="bx bxs-quote-alt-right quote-icon-right text-primary"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-wrap p-3">
                <div class="testimonial-item d-flex align-items-start">
                  <!-- Left-side square image -->
                  <img src="assets/img/trainers/nethujan2.jpg" class="testimonial-img rounded me-3" alt="" style="width: 80px; height: 80px; object-fit: cover;">
            
                  <!-- Right-side content -->
                  <div>
                    <h3 class="fw-bold mb-1" id="testimonial_name">Nethujan Nimalarajan</h3>
                    <h4 class="text-uppercase text-muted mb-3" style="font-size: 0.85rem;">Undergraduate,<br>Faculty of Medicine,<br>University of Colombo.</h4>
                    <p class="fst-italic text-secondary mb-0" id="testimonial_992">                      
                      <i class="bx bxs-quote-alt-left quote-icon-left text-primary"></i>
                      I have worked with EIA as a junior president which helped me to improve my leadership qualities and essential skills. It also helped me a lot in organizing projects and making appropriate decisions in tough situations.
                      <i class="bx bxs-quote-alt-right quote-icon-right text-primary"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
            
            
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

  
<?php
    // This one line loads the entire footer, scripts, and closes the page
    require_once 'includes/footer.php'; 
?>
