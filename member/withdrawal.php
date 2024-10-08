<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
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
<script src="assets/js/ajax.js" type="text/javascript"></script>
</head>
<body style="background:#fff;">
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">
<div class="row">

<div class="col-md-3"></div>

<div class="col-md-6">
<div class="card" style="background:#fff;">
<div class="card-header" style="background:#4b4374;;">
<div class="card-title"> Withdrawal</div>
</div>
<?php if($_REQUEST['case']=='add'){?>
<div class="card-body">

<?php if($_REQUEST['p']==1){?><p align="center" style="color:#009900; padding-bottom:8px;font-size:16px;">Your request has been sent for admin verification!</p><?php }?>
<?php if($_REQUEST['e']==3){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Amount must be greater than 0!</p><?php }?>
<?php if($_REQUEST['e']==2){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Insufficient wallet balance!</p><?php }?>
<?php if($_REQUEST['e']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Minimum withdrawal amount is Rs. <?=getSettingsWithdrawal($conn,'minimum')?></p><?php }?>


<h4 class="form-section" style="color:#000000;" align="center"><i class="icon-wallet"></i>Current Wallet:&nbsp;<?=$currency?> <?=getAvailableWallet($conn,getMember($conn,$_SESSION['mid'],'userid'))?> </h4>
<p>&nbsp;</p>

<?php 
$userid=getMember($conn,$_SESSION['mid'],'userid');
$avabal=getAvailableWallet($conn,$userid);
$min=getSettingsWithdrawal($conn,'minimum');
if($avabal>=$min)
{
if((getMember($conn,$_SESSION['mid'],'bname')!='' && getMember($conn,$_SESSION['mid'],'accname')!='' && getMember($conn,$_SESSION['mid'],'accno')!='' && getMember($conn,$_SESSION['mid'],'ifscode')!='')||(getMember($conn,$_SESSION['mid'],'upiid')!=''))
{
?>
<?php 
$fundstatus=getSettingsOnOff($conn,'withdrawal');
if($fundstatus=='A')
{
?>
<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');

if($paystatus=='A')
{

?>


<form class="form" action="withdrawal-process.php?case=add" method="post">




<div class="form-group">
<label for="pillInput"><strong style="color:#000000;">Amount<span style="color:#FF0000;">*</span></strong></label>
<input type="text" class="form-control input-pill" id="amount" name="amount" placeholder="Enter Amount" required />
</div>

<div class="card-action">
<button class="btn btn-success">Send Now</button>
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

<?php }else{?>
<div align="center" style="padding:10px;"><a href="edit-profile.php" style="text-decoration:none;color:#FF3300;font-size:15px;font-weight:bold;display:inline-block;padding:5px;border:1px solid red;" title="Go to Bank Details">Please click here to fill up bank details</a>
</div>
<?php } ?>
<?php }else{?>
<h5 align="center" style="color:#FF0000;background:#FFFFFF;"><strong>You don't have minimum balance for withdrawal</strong></h5>
<?php } ?>
</div>
<?php } ?>
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
<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>
<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>
<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>
<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
</body>
</html>