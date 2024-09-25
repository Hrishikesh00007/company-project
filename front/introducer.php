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

<script src="administrator/js/ajax.js" type="text/javascript"></script>
<script>
function getUserIDcheck(val)
{
if(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getUserIDRequest;
xmlhttp.send();
}
}
function getUserIDRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('sponname').value=response;
}
}
}
</script>
</head>
<body style="background:url(images/slider-minimal-slide-2-1920x968.png); height:1000px; width:100%; background-size:cover;">


<div >
<!-- RD Google Map-->

<!--Header Start-->

<div style="min-height:600px;">
<div>&nbsp;</div>

<div class="container">
<div class="col-md-12 mx-auto" >
<div class="row">
<div class="col-md-3" > </div>
<div class="col-md-6" >
<div class="block" style="background-image: radial-gradient(circle, #051937, #08152f, #0a1027, #08091f, #030218); padding:5px 20px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28); border-radius: 20px 20px;">

<div>&nbsp;</div>
<div align="center" ><a href="index.php"><img src="images/logo.png" alt="ADM PVT LTD " style="font-size:26px; color:#000; background:; border-radius:10px;"></a>
</div>

<h3 class="text-center" style="color:#fff; padding:10px; font-size:25px;">Introducer</h3>
<div>&nbsp;</div>
<?php if($_REQUEST['msg']==4){?>

<div align="center" style="margin:0;padding:0;background:#FFFFFF;color: #008000 ; font-size:18px;"><strong>Your registration is successfully completed!</strong>

<div align="center" style="color:#008000;font-size:18px; font-family:Arial, Helvetica, sans-serif;font-weight:bold;">User ID: <?=getMember($conn,$_REQUEST['id'],'userid')?></div>

<div align="center" style="color:#008000;font-size:18px; font-family:Arial, Helvetica, sans-serif;font-weight:bold;">Name: <?=getMember($conn,$_REQUEST['id'],'name')?></div>

<span></span>
</div>
<?php }?>

<?php if($_REQUEST['q']==4){?>
<div align="center" style="background:#FFFFFF;color:#ff0000;"><strong>Invalid/Inactive Sponsor ID!</strong></div>
<?php }?>

<?php if($_REQUEST['e']==1){?><div align="center" style="color:#ff0000;background:#FFFFFF;">Phone number or Email ID already used!</div>
<?php }?>


<?php if(getSettingsOnOff($conn,'registration')=='A'){?>


<div>&nbsp;</div>
<form name="form1"  action="registration-process.php?case=introducer" method="post">
<div style="margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Sponsor ID" name="sponsor" readonly="" id="sponsor" required onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);"  value="<?=trim($_REQUEST['intr'])?>" />
</div>
<div style="color:#000000;margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Sponsor Name" name="sponname" id="sponname"  readonly="" style="color:#000000;" required value="<?=getMemberUserID($conn,$_REQUEST['intr'],'name')?>"/>
</div>
<div style="margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Name" name="name" id="name" required />
</div>
<div style="margin-bottom:8px">
<input type="tel" class="form-control"  placeholder="Phone No" name="phone" id="phone" pattern="[6789][0-9]{9}" maxlength="10" required />
</div>
<div style="margin-bottom:8px">
<input type="email" name="email" id="email" class="form-control"  placeholder="Email" required />
</div>
<div style="margin-bottom:8px">
<input type="password" class="form-control"  placeholder="Password" name="password" id="password" required />
</div>

<div style="margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Address" name="address" id="address" required />
</div>

<div>&nbsp;</div>
<input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" style="width:100%; height:50px;  border-radius:10px;" value="Sign Up" />


</form>


<p class="mt-8" style="text-align:center; color:#FFFF00; padding:10px; font-size:18px;">Already have an account ?<a href="login.php" style="color:#fff;"><strong>Login</strong></a></p>


<?php }else{?>
<h2 align="center" style="color: #FFFFFF; font-size:28px; padding-top:30px; padding-bottom:30px">Software is under maintenance!</h2>
<?php }?>
<br>




</div>
</div>



</div>
</div>

</div>

<div>&nbsp;</div>
</div>


</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
   <!-- jQuery Frameworks
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