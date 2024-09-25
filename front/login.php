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

<body style="background:url(images/slider-minimal-slide-2-1920x968.png); width:100%; min-height:750px; background-size:cover;">
    
    
<div >
<!-- RD Google Map-->
	  
<!--Header Start-->
   
<div style="min-height:300px;">
<div class="container">

<div>&nbsp;</div>

<div class="container">
<div class="col-md-12 mx-auto" >
<div class="row">
<div class="col-md-3" ></div>
<div class="col-md-6" style="padding-top:10px;">

<div class="block" style="padding:5px 20px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28);background-image: radial-gradient(circle, #051937, #08152f, #0a1027, #08091f, #030218); border-radius: 20px 20px; min-height:300px;">
<div>&nbsp;</div>

<div align="center" ><a href="index.php"><img src="images/logo.png" alt="ADM PVT LTD " style="font-size:26px; color:#000; background:; border-radius:10px;"></a>
</div>



<h2 class="text-center" style="color:#fff; padding:10px; font-size:25px;">Sign In</h2>

<?php if($_REQUEST['e']==1){?> <p align="center" style="color:#FF0000; background:#FFFFFF"><strong>Invalid UserID/Password</strong></p> <br><?php }?>


<?php if(getSettingsOnOff($conn,'login')=='A'){?>


<form name="form1"  action="login-process.php" method="post" >

<div>&nbsp;</div>
<input type="hidden" name="security" id="security" value="" />
<div style="margin-bottom:8px">
<input type="text" style="background:#FFFFFF;" class="form-control"  name="userid" id="userid"  placeholder="Enter User ID"  required />
</div>


<div style="margin-bottom:8px">
<input type="password" style="background:#FFFFFF;" class="form-control" name="password" id="password" placeholder="Enter Password"  required />
</div>


<div class="form-group">
<div class="col-md-4 col-xs-12 text-xs-center text-md-left" style="margin-left:0px;">
</div>
</div>
<input type="submit" class="btn btn-primary" style="width:100%; height:50px;  border-radius:10px;" value="Sign In" />

</form>


<p class="mt-1" style="text-align:center; color:#FFFF00; padding:10px; font-size:18px;">Forgot Password? <a href="forgot.php"><span style="color:#fff;"><strong> Click here</strong></span></a></p>
<p class="mt-1" style="text-align:center; color:#FFFF00; padding:0px; font-size:18px;">Create an account? <a href="registration.php"><span style="color:#fff;"><strong> Click here</strong></span></a></p>

<?php }else{ ?>
<h2 align="center" style="color: #FFFFFF; font-size:28px; padding-top:30px; padding-bottom:30px">Software is under maintenance!</h2>
<?php }?>





</div>
</div>


</div>
</div>
</div>


</div>
</div>
    
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
   <!-- jQuery Frameworks
    ============================================= -->
 <!-- JS here -->
   
   <!--====== jquery js ======-->


<!-- JS here -->
<!-- JS============================================ -->
      <!-- JS here -->
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