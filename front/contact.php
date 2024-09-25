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
            <h1 class="breadcrumb__title wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Contact Us</h1>
            <p class="wow animate__animated animate__fadeInUp" data-wow-delay="0.4s"><a href="index.php">Home</a>
              <span>Contact Us</span>
            </p>
          </div>
        </div>
      </div>
    </div>
    <img src="assets/imgs/hero/overlay.png" alt="overlay" class="overlay">  </section>
  <!-- Hero area end -->


 <section class="contact__area">
    <div class="contact__top pt-130 pb-125">
      <div class="container">
        <div class="row">
          <div class="col-xxl-8 col-x-8 col-lg-9">
            <div class="contact__top-inner">
              <div class="contact__item">
                <div class="icon"><i class="fa-solid fa-phone"></i></div>
                <div class="title">Phone</div>
                <ul>
                  <li><a href="tel:63473547464823"><?=getContact($conn,'phone1')?></a></li>
                  <li><a href="tel:67353428355098"><?=getContact($conn,'phone2')?></a></li>
                </ul>
              </div>
              <div class="contact__item">
                <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                <div class="title">Email</div>
                <ul>
                  <li><a href="mailto:info@yourdomain.com"><?=getContact($conn,'email1')?></a></li>
                  <li><a href="mailto:company@domain.com"><?=getContact($conn,'email2')?></a></li>
                </ul>
              </div>
              <div class="contact__item">
                <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="title">Location</div>
                <ul>
                  <li><?=getContact($conn,'addline1')?><br><?=getContact($conn,'addline2')?></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="contact__form pt-130 pb-130">
      <div class="container">
        <div class="row">
          <div class="col-xxl-8 col-x-8 col-lg-6">
            <h2 class="contact__title">Get in touch</h2>
			
			<?php if($_REQUEST['m']=='1'){?>
<p align="center" style="color:#00CC00; font-size:15px;">Your message has been sent successfully!</p><?php }?>
			<div>&nbsp;</div>
            <form method="post" action="contact-process.php">
              <div class="input-grp">
               <input type="text" name="name" id="name" required="" placeholder="Your Name">
                <input type="email" name="email" id="email" required="" placeholder="Your Email">
              </div>
             <input type="text" name="phone" id="Phone" required="" placeholder="Phone Number">
			  <input type="text" name="subject" id="subject" required="" placeholder="Subject">
              <textarea name="message" id="message" required="" placeholder="Your Message"></textarea>
              <input type="submit" value="comment" class="submit">
            </form>
			
			
			
          </div>
        </div>
      </div>
    </div>

    <img src="assets/imgs/bg/contact.png" alt="Contact image" class="bg">
  </section>


 
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