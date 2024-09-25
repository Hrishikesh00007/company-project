<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
$left=2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!--<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>-->

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script src="../administrator/js/ajax.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>
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
document.getElementById('sponname').innerHTML=response;
}
}
}
</script>
<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background:#2c254a;">
<div class="wrapper">

<?php include('header.php')?>

<!-- Sidebar -->
<?php include('leftmenu.php')?>
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">

<div class="card" style="background:#4b4374;">
<div class="card-header">
<div class="card-title">Topup</div>
</div>
<div class="card-body" style="background:#fff;">
<?php if($_REQUEST['e']==3){?><div align="center" style="color:#FF0000;">Insufficient wallet balance!</div><?php }?>


<?php if($_REQUEST['m']==1){?><p align="center" style="color:#00CC00; padding-bottom:8px; font-size:16px;"><strong>Member Account is successfully activated!</strong></p><?php }?>
<?php if($_REQUEST['e']==4){?><div align="center" style="color:#FF0000;">Invalid User ID!</div><?php }?>
<?php if($_REQUEST['e']==5){?><div align="center" style="color:#FF0000;">Amount must be greater then zero!</div><?php }?>





<form class="form" action="topup-process.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<div  align="center" >
<span style="color: green;font-size: 20px">Fund Wallet : <?=$currency?> <?=getFundWallet($conn,$userid)?> </span><br>
<span style="color: blue;font-size: 16px">Joining Amount : <?=$currency?> <?=getSettingsJoining($conn,'joining')?></span>
</div>
</div>
<div class="col-md-12">
<div class="form-group form-group-default">
<label>User ID<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control input-pill" id="userid" name="userid" placeholder="User ID" onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);" required>
</div>
<span id="sponname" style="color:#FF0000;"></span>
</div>


<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-success">Active Now</button>
</div>
</div>
</div>
</form>

</div>

</div>
</div>

</div>
</div>
</div>

</div>

<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>

</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script><!-- DateTimePicker -->
<script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>
<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script>
$('#datepicker').datetimepicker({
format: 'MM/DD/YYYY',
});
</script>
</body>
</html>