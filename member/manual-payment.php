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
<!--
Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
-->
<?php include('header.php')?>

<!-- Sidebar -->
<?php include('leftmenu.php')?>
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-12">

<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title" style="color:#000033">New Manual Payment</div>
</div>


<div align="center">&nbsp;</div>
<?php if($_REQUEST['s']==8){?><p align="center" style="color:#FF0000; padding-bottom:8px;">You cant transfer in your account!</p><?php }?>
<?php if($_REQUEST['s']==7){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Amount must be greater than 0!</p><?php }?>
<?php if($_REQUEST['s']==3){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Invalid User ID!</p><?php }?>
<?php if($_REQUEST['s']==2){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Minimum transfer amount <?=getSettingsWithdrwal($conn,'minimum')?></p><?php }?>
<?php if($_REQUEST['s']==5){?><div align="center" style="margin:0;padding:0;color:#FF0000; font-size:16px;"><strong>Some Technical Error!!1</strong></div><?php }?>
<?php if($_REQUEST['s']==6){?><div align="center" style="margin:0;padding:0;color:#FF0000; font-size:16px;"><strong>Insufficient balance!</strong></div><?php }?>
<?php if($_REQUEST['s']==1){?><div align="center" style="margin:0;padding:0;color:#00CC00; font-size:16px;"><strong>Your payment succesfully sent to member!</strong></div><?php }?>

<!--<h4 class="form-section" style="color:#000000;" align="center"><i class="icon-wallet"></i>Fund Wallet:&nbsp;<?=getFundWallet($conn,getMember($conn,$_SESSION['mid'],'userid'))?></h4>-->

<form class="form" action="manual-payment-process.php" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-1">&nbsp;</div>
<div class="col-md-10">
<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>Gateway Name<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="gatewayname" placeholder="Gateway Name" value="" required />
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Currency<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="currency" placeholder="Currency" value="" required />
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Rate<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="rate" placeholder="Rate" value="" required />
</div>
</div>

</div>
</div>
</div>


<div>&nbsp;</div>
<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title" style="color:#FFFFFF; background-color:#0099FF;">Range</div>
</div>
<div>&nbsp;</div>
<div class="row">

<div class="col-md-6">
<div class="form-group">
<label>Minimum Amount<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="minamount" placeholder="Minimum Amount" value="" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Maximum Amount<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="maxamount" placeholder="Maximum Amount" value="" required />
</div>
</div>

</div>
</div>

<div>&nbsp;</div>
<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title" style="color:#FFFFFF; background-color:#0099FF">Charge</div>
</div>
<div>&nbsp;</div>
<div class="row">

<div class="col-md-6">
<div class="form-group">
<label>Fixed Charge</label>
<input type="text" class="form-control" name="fixedcharge" placeholder="Fixed Charge" value=""  />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Percentage Charge</label>
<input type="text" class="form-control" name="percharge" placeholder="Percenatge Charge" value=""  />
</div>
</div>

</div>
</div>

<div>&nbsp;</div>

<div class="col-md-12">
<div class="form-group">
<table width="100%">
<tr style="background-color:#0099FF">
<td style="color:#FFFFFF">Deposit Instruction</td>
</tr>
<tr>
<td>
<textarea type="text" class="form-control" name="remarks" placeholder="" value="" id="description" required ></textarea>
</td>
</tr>
</table>
</div>
</div>

<div>&nbsp;</div>



<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-primary">Save Method</button>
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