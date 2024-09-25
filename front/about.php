<?php
include('administrator/includes/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <!-- Site Title -->
   <title><?=$title?></title>

  <!-- Site Favicon -->
  <link rel="shortcut icon" href="assets/imgs/logo/favicon.png" type="image/x-icon">


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,700&display=swap"
    rel="stylesheet">


  <!-- All CSS Files -->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/meanmenu.min.css">
  <link rel="stylesheet" href="assets/css/progressbar.css">
  <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/master.css">
  <link rel="stylesheet" href="style.css">


</head>

<body>

  <!-- Preloader -->
 
  <!-- Scroll to top -->
  <button id="scroll_top" class="scroll-top"><i class="fa-solid fa-arrow-up"></i></button>


  <!-- Header area start -->
  <?php include('header.php')?>
  <!-- Header area end -->




  <!-- Hero area start -->
<section class="breadcrumb__area">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="breadcrumb__content">
            <h1 class="breadcrumb__title wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">About Us</h1>
            <p class="wow animate__animated animate__fadeInUp" data-wow-delay="0.4s"><a href="index.php">Home</a>
              <span>About Us</span>
            </p>
          </div>
        </div>
      </div>
    </div>
    <img src="assets/imgs/hero/overlay.png" alt="overlay" class="overlay">
  </section>
  <!-- Hero area end -->


  <!-- Feature area start -->
  <section class="feature__area pt-130 pb-125">
    <div class="container">
      <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
          <div class="feature__item wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
            <img src="assets/imgs/feature/1.png" alt="Icon" class="feature__icon">
            <h2 class="feature__text">Stock Free <br>Amazing Resources</h2>
          </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
          <div class="feature__item wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
            <img src="assets/imgs/feature/9.png" alt="Icon" class="feature__icon">
            <h2 class="feature__text">Amazing <br>
              Exclusive Designs</h2>
          </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
          <div class="feature__item wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
            <img src="assets/imgs/feature/3.png" alt="Icon" class="feature__icon">
            <h2 class="feature__text">Proper <br>
              Documentations</h2>
          </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
          <div class="feature__item wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
            <img src="assets/imgs/feature/4.png" alt="Icon" class="feature__icon">
            <h2 class="feature__text">Creative <br>
              Services Outlines</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Feature area end -->


  <!-- About area start -->
  <section class="about__area">
    <div class="container">
      <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
          <div class="about__left">
            <img src="assets/imgs/about/1.png" alt="Image" class="image">
            <img src="assets/imgs/about/2.png" alt="Image" class="image-2">
            <img src="assets/imgs/about/3.jpeg" alt="Image" class="image-3">
            <img src="assets/imgs/about/s1.png" alt="shape" class="shape">          </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
          <div class="about__right">
            <div class="about__right-inner">
              <h2 class="sec-sub-title wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">About Company</h2>
              <h3 class="sec-title wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">25+ YEARS WORKING
                <span>EXPERIENCE.</span>
              </h3>
              <p class="wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">There are many variations of
                passages of Lorem Ipsum available, the majority have suffered alteration
                in some form, by injected humour. randomised words which don't look even slightly believable. It uses a
                dictionary of over 200 Latin words, combined with </p>
              <ul class="list-check wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                <li>Business Solutions</li>
                <li>Creative Conceptions</li>
                <li>Corporate Relationship</li>
                <li>Mission & Vission</li>
              </ul>
              <a href="#" class="cxu-btn-primary wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">READ
                MORE</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About area end -->



 
  <!-- Modal -->
  


  <!-- Portfolio area start -->
  <!--<section class="portfolio__area pt-130">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="sec-title-wrap">
            <h2 class="sec-sub-title wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Our Portfolio</h2>
            <h3 class="sec-title wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">Our Recent <br>
              <span>Projects.</span>
            </h3>
          </div>

          <div class="portfolio__items">
            <div class="portfolio__item wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
              <a href="project-2.html">
                <img src="assets/imgs/portfolio/1.png" alt="Portfolio Thumb" class="pf-thumb">
                <div class="portfolio__info">
                  <h4 class="portfolio__title">Mobile UI Designs</h4>
                  <h5 class="portfolio__cat">Social Media Marketing</h5>
                </div>
              </a>
            </div>
            <div class="portfolio__item wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
              <a href="project-2.html">
                <img src="assets/imgs/portfolio/2.png" alt="Portfolio Thumb" class="pf-thumb">
                <div class="portfolio__info">
                  <h4 class="portfolio__title">Product Screen Design</h4>
                  <h5 class="portfolio__cat">Social Media Marketing</h5>
                </div>
              </a>
            </div>
            <div class="portfolio__item wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
              <a href="project-2.html">
                <img src="assets/imgs/portfolio/3.png" alt="Portfolio Thumb" class="pf-thumb">
                <div class="portfolio__info">
                  <h4 class="portfolio__title">WordPress Website</h4>
                  <h5 class="portfolio__cat">Social Media Marketing</h5>
                </div>
              </a>
            </div>

            <div class="portfolio__item all wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
              <img src="assets/imgs/portfolio/4.png" alt="Portfolio Thumb" class="pf-thumb">
              <div class="portfolio__info">
                <h5 class="portfolio__cat">17+ <br> Photoshosts</h5>
                <a href="project.html" class="view-all">VIEW ALL SAMPLES</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>-->
  <!-- Portfolio area end -->





  <!-- Footer area start -->
  <?php include('footer.php')?>
  <!-- Footer area end -->


  <!-- All JS Files -->
  <script src="assets/js/jquery-3.6.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/jquery.meanmenu.min.js"></script>
  <script src="assets/js/progressbar.js"></script>
  <script src="assets/js/swiper-bundle.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/main.js"></script>


</body>

</html>