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
<script src="js/ajax.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background:#FFFFFF;">
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

<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title" style="color:#000033">Current To Fund Transfer</div>
</div>

<div align="center">&nbsp;</div>
<?php if($_REQUEST['e']==6){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Minimum transfer amount Rs. <?=getSettingsTransfer($conn,'minimum')?></p><?php }?>
<?php if($_REQUEST['e']==2){?><div align="center" style="margin:0;padding:0;color:#FF0000; font-size:16px;"><strong>Insufficient balance!</strong></div><?php }?>
<?php if($_REQUEST['e']==3){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Amount must be greater than 0!</p><?php }?>
<?php if($_REQUEST['e']==5){?><p align="center" style="color:#FF0000; padding-bottom:8px;">You Can't Tranfer money to this account!!</p><?php }?>
<?php if($_REQUEST['m']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;color:#00FF00;">Transfer is Successfull</p><?php }?>

<h3 class="form-section" style="color:#000000;" align="center"><i class="icon-wallet"></i>Current Wallet:&nbsp;<?=$currency?> <?=getAvailableWallet($conn,getMember($conn,$_SESSION['mid'],'userid'))?> &nbsp;&nbsp;Fund Wallet:&nbsp; <?=$currency?> <?=getFundWallet($conn,getMember($conn,$_SESSION['mid'],'userid'))?> </h3>

<?php 
$fundstatus=getSettingsOnOff($conn,'current_to_fund');
if($fundstatus=='A')
{
?>
<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');

if($paystatus=='A')
{

?>

<form class="form" action="current-process.php" method="post" enctype="multipart/form-data">
<div class="col-md-12">
<div class="form-group form-group-default">
<label>Amount<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="amount" placeholder="Amount" value="" required />
</div>
</div>

 
<div class="col-md-12">
<div class="form-group form-group-default">
<label>Remarks<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="remarks" placeholder="Remarks" value="" required /></div>
</div>


<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-success">Send Now</button>
</div>
</div>
</div>
</form>
<?php }else{?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;"><br />Click here <a href="activation.php">Activation</a> to Activate your account!</h3>
<?php }?>
<?php }else{?>
<div style="text-align:center;color:#ff0000; background:#fff; font-size:18px; border-radius:10px;padding:10px;">System is under upgradation!<br>Check after some time!</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<?php }?>
</div>


</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

</div>

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