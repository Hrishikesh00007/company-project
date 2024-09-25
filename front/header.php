<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
crossorigin="anonymous" referrerpolicy="no-referrer"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">	






  <header class="header__area-2" id="header__sticky">
    <div class="menu-2-bg"></div>
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="header__inner-2">
            <div class="header__logo-2">
              <a href="index.php">
                <img src="images/logo.png" alt="Logo" class="logo">
              </a>
            </div>

            <div class="header__right-2">
              <div class="header__info-2">
                <ul class="email">
                  <li><i class="fa-solid fa-envelope"></i> <a href="mailto:Info@example.com"><?=getContact($conn,'email1')?></a></li>
                </ul>
                <div class="address">
                  <p><i class="fa-solid fa-house"></i><?=getContact($conn,'addline1')?></p>
                </div>
                <ul class="header__social-2">
                  <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                </ul>
              </div>

              <div class="header__menu-2">
                <div class="main-menu">
                  <ul>
                 <!-- <li class="has-dropdown"><a href="#">Home</a>
                    <ul class="main-dropdown">
                      <li><a href="index.php">digital Agency</a></li>
                      <li><a href="index-dark.php">digital Agency dark</a></li>
                      <li><a href="index-slider.php">digital Agency Banner Slider</a></li>
                      <li><a href="index-2.php">Creative Agency</a></li>
                      <li><a href="index-2-dark.php">Creative Agency dark</a></li>
                    </ul>
                  </li>-->
                  <li><a href="index.php">Home</a></li>
				   <li><a href="about.php">About</a></li>
				    <li><a href="#">Plan</a></li>
				 <li><a href="contact.php">Contact</a></li>
				  <li><a href="registration.php">Registration</a></li>
				   <li><a href="login.php">Login</a></li>
				 
				 
				 
                </ul>
                </div>
                <div class="header__others">
                  <button class="menu-icon"><i class="fa-solid fa-bars"></i></button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="header__search">
    <form action="#">
      <input type="text" name="s" placeholder="Search...">
    </form>
  </div>


  <!-- Offcanvas area start -->
  <div class="offcanvas__area">
    <div class="offcanvas__inner">
      <div class="offcanvas__top">
       <img src="images/logo.png" alt="Logo" class="logo">
        <button id="offcanvas_close"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="offcanvas__search">
        <form action="#">
          <input type="text" placeholder="Search..." name="s">
        </form>
      </div>
      <div class="offcanvas__menu">
        <div class="offcanvas-menu">
          <ul>
                 <!-- <li class="has-dropdown"><a href="#">Home</a>
                    <ul class="main-dropdown">
                      <li><a href="index.php">digital Agency</a></li>
                      <li><a href="index-dark.php">digital Agency dark</a></li>
                      <li><a href="index-slider.php">digital Agency Banner Slider</a></li>
                      <li><a href="index-2.php">Creative Agency</a></li>
                      <li><a href="index-2-dark.php">Creative Agency dark</a></li>
                    </ul>
                  </li>-->
                  <li><a href="index.php">Home</a></li>
				   <li><a href="about.php">About</a></li>
				    <li><a href="#">Plan</a></li>
				 <li><a href="contact.php">Contact</a></li>
				  <li><a href="registration.php">Registration</a></li>
				   <li><a href="login.php">Login</a></li>
				 
				 
				 
                </ul>
        </div>
      </div>
      <div class="offcanvas__map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58408.97484139959!2d90.33915680783855!3d23.798644768568714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c102e2ece5bb%3A0x446e9dc895326a70!2sBangladesh%20National%20Zoo!5e0!3m2!1sen!2sbd!4v1671466814402!5m2!1sen!2sbd"></iframe>
      </div>
      <div class="offcanvas__btm">
        <ul class="footer__location">
          <li>
            <i class="fa-solid fa-location-dot"></i>
            <span>500 Treat Ave, Suite 200 San Francisco, <br>CA 94110, USA-265</span>
          </li>
          <li>
            <i class="fa-solid fa-phone"></i>
            <a href="tel:025698259145">+025 698 259 145 (Support)</a>
          </li>
          <li>
            <i class="fa-solid fa-envelope"></i>
            <a href="mailto:gurudev@mail.com">Info,gurudev@mail.com</a>
          </li>
        </ul>
        <div class="separator"></div>
        <ul class="social-media">
          <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Offcanvas area end -->