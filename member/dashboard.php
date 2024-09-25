<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');

include('calculate-reward.php');
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
sessionStorage.fonts = wx;
}
});
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">

<script type="text/javascript" src="assets/js/ajax.js"></script>

</head>
<body class="dashboard dashboard_1" style="min-height:1100px;">
<div class="black_overlay" id="popup1"></div>

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<!-- End Sidebar -->

<div class="main-panel">
<div class="content">
<div class="page-inner">
<div>&nbsp;</div>
<script>
function fun()
{
var copy=document.getElementById("p1").innerHTML;
navigator.clipboard.writeText(copy);
document.getElementById("cpbutton").innerHTML="COPIED";
}
</script>

<?php if($_REQUEST['e']==3){?><div align="center" style="color:#FF0000;">Insufficient wallet balance!</div><?php }?>
<?php if($_REQUEST['e']==4){?><div align="center" style="color:#FF0000;">Investment amount must be numeric value!</div><?php }?>
<?php if($_REQUEST['e']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Minimum investment amount is <?=getSettingspack($conn,'formamount')?></p><?php }?>
<?php if($_REQUEST['m']==1){?><p align="center" style="color:#00CC00; padding-bottom:8px; font-size:16px;"><strong>Your account is successfully activated!</strong></p><?php }?>
<?php if($_REQUEST['p']==1){?><p align="center" style="color:#00CC00; padding-bottom:8px; font-size:16px;"><strong>Your payment is successfully done!</strong></p><?php }?>
<?php if($_REQUEST['p']==2){?><p align="center" style="color:#ff0000; padding-bottom:8px; font-size:16px;"><strong>Insufficient Wallet Balance!</strong></p><?php }?>
<?php if($_REQUEST['q']==2){?><p align="center" style="color:#ff0000; padding-bottom:8px; font-size:16px;"><strong>Insufficient Wallet Balance!</strong></p><?php }?>

<?php if($_REQUEST['w']==4){?><p align="center" style="color:#00CC00; padding-bottom:8px; font-size:16px;"><strong>Your service request has been sucessfully send to the admin</strong></p><?php }?>

<?php
$sql="SELECT * FROM `ee_announcement` ORDER BY `id` DESC LIMIT 1 ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{?>
<marquee scrollamount="6" align="center" style="text-align:center; height:40px; color:#FF0000;padding:5px 15px;border-radius:10px;" direction="left">
<?php 
while($fetch=fetcharray($res))
{
?>
<h6 style="font-size:18px"><?=ucfirst(strip_tags(stripslashes($fetch['announcement'])))?></h6>
<?php }?>
</marquee>
<?php }?>

<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='I')
{
?>
<h3 align="center" style="font-size:18px;color:#FF0000;"><br /><a href="activation.php?case=add">Click here</a> to activate your account!</h3>
<?php }?>


<?php
$renewalstatus=getMember($conn,$_SESSION['mid'],'renewalstatus');
if($renewalstatus=='I')
{
?>
<h3 align="center" style="font-size:18px;color:#FF0000;"><br /><a href="package-upgrade.php?case=add">Click here</a> to renew your package!</h3>
<?php }?>
<div>&nbsp;</div>


<?php
$sqlb="SELECT * FROM `ee_banner` WHERE `status`='A' ORDER BY `id` DESC LIMIT 1";
$resb=query($conn,$sqlb);
$numb=numrows($resb);
if($numb>0)
{
while($fetchb=fetcharray($resb))
{
?>
<div align="center">
<img src="../administrator/banner/<?=$fetchb['banner']?>" style="border-radius: 15px;"  width="100%">
</div>
<?php }}?>






<div>&nbsp;</div>
<div class="row">

<div class="col-md-6 col-sm-6" style="margin:0;">
<div class="card" style="min-height:320px; background-image: radial-gradient(circle, #4a554b, #3e3f36, #2f2a26, #1c1817, #000000);">
<h5 align="center" style=" background:#35374B; height:25px;color:#fff;font-size:14px; padding-top:5px;font-family:Times New Roman; text-transform:uppercase;"><strong>Welcome to Dream Come True</strong></h5>
<div class="row">
<div class="col-md-12 col-sm-12" >
<div style="padding-left:20px;">
<div align="center">
<?php
if(getMember($conn,$_SESSION['mid'],'profile'))
{

?>
<img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" alt="..." height="100" width="100" style="border-radius:50%;"  />
<?php }else{?>
<div>&nbsp;</div>
<img src="assets/img/profile.png" alt="..."  height="100" width="100" style="border-radius:50%;" />
<div>&nbsp;</div>
<?php }?>
</div>
</div>
</div>

<div class="col-md-12 col-sm-6" >
<p align="center" class="card-category"><span style="font-size:15px; font-weight:600;color:#fff;"> <?=$userid?> </span></p>
<p align="center" class="card-category" style="color:#fff; font-size:15px;"><?=getMember($conn,$_SESSION['mid'],'name')?>&nbsp;&nbsp;<?php if($paystatus=='A'){?><span style="color:#006600;background:#fff;padding:3px 5px;border-radius:5px; font-size:10px;">Active</span><?php }else{?><span style="color:#FF0000;background:#FFFFFF;padding:3px 5px;border-radius:5px; font-size:10px;">Pending</span><?php }?></p>


<?php if(getLatestRank($conn,$userid,'rank')){?>
<div align="center" class="card-category"><span style="font-size:15px; font-weight:600;color:#fff;">Latest Rank: <?=getLatestRank($conn,$userid,'rank')?></span></div>
<?php }?>

<?php if(getMember($conn,$_SESSION['mid'],'approved')){?><div align="center" class="card-category"><span style="font-size:15px; font-weight:600;color:#fff;"> Active Date: <?=getDateConvert(getMember($conn,$_SESSION['mid'],'approved'))?></span></div><?php }?>
<?php if(getMember($conn,$_SESSION['mid'],'date')){?>
<div align="center" class="card-category"><span style="font-size:15px; font-weight:600;color:#fff;"> Joining Date: <?=getDateConvert(getMember($conn,$_SESSION['mid'],'date'))?></span></div>
<?php }?>
<div>&nbsp;</div>

</div>
</div> 
</div>
</div>


<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='A')
{
?>
<div class="col-sm-6">
<div class="card">
<h5 align="center" style="background-image: radial-gradient(circle, #4a554b, #3e3f36, #2f2a26, #1c1817, #000000); height:25px; color:#fff;font-size:18px;margin:0;"><strong>Referral Link</strong></h5>
<div class="card-body" style="  background-image: radial-gradient(circle, #4a554b, #3e3f36, #2f2a26, #1c1817, #000000);margin:0;padding:0;">
<div align="center">
<div>&nbsp;</div>
<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://<?=$domain?>/introducer.php?intr=<?=$userid?>&choe=UTF-8" title="<?=$title?>" width="150" />
</div>



<h5 align="center" id="p1" style="color:#fff;">https://<?=$domain?>/introducer.php?intr=<?=$userid?></h5>

<div align="center" style="padding:10px;"><button style="width:100%;" onClick="fun()" id="cpbutton" class="btn btn-primary">copy link</button></div>
</div>

</div>
</div>
</div>


<?php }?>

<div class="row">




<?php if(getMember($conn,$_SESSION['mid'],'sponsor')){?>
<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body"  style="background:#FAA300; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="images/man.gif" height="50" width="50"/></div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Sponsor ID</p>
<h4 class="card-title" style="font-size:18px; color:#fff;"><?=getMember($conn,$_SESSION['mid'],'sponsor')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<?php }?>

<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body"  style="background:#6420AA; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/referalid.png" height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Level Bonus</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getCommisionLevelBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>





<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body"  style="background:#114232; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/referalid.png" height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Cashback Bonus</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getCommisionCashBackBonus($conn,$userid)?> </h4>
</div>
</div>
</div>
</div>
</div>
</div>




<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body"  style="background:#FAA300; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/referalid.png" height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Cashback Level Bonus</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getCommisionCashBackLevel($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>




<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body"  style="background:#6420AA; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/referalid.png" height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Direct Bonus</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getCommisionDirectBonus($conn,$userid)?> </h4>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body"  style="background:#114232; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/referalid.png" height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Rank Reward</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getCommisionRankReward($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>






<!-- Blue/Green 6 -->
<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body" style="background:#FAA300; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-secondary bubble-shadow-small" style="background:#FFFFFF;">
<img src="assets/img/success.png" height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Pending Withdrawal</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getPendingWithdrawalMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body" style="background:#6420AA; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-primary bubble-shadow-small" style="background:#FFFFFF;">
<img src="assets/img/success.png" height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers"><p class="card-category" style="color:#fff; font-size:16px;">Success Withdrawal</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getApprovedWithdrawalMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Blue 8 -->
<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body" style="background:#114232;  min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-success bubble-shadow-small" style="background:#FFFFFF;">
<img src="assets/img/dollar.png" height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Total Income</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getTotalIncomeMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>





<!-- Blue 10 -->
<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body"  style="background:#FAA300; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-info bubble-shadow-small" style="background:#FFFFFF;">
<img src="assets/img/indianwallet.png" height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Current Wallet</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getAvailableWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Orange 11-->
<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body"  style="background:#6420AA; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-info bubble-shadow-small" style="background:#FFFFFF;">
<img src="assets/img/wallet.png"height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Fund Wallet</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=$currency?> <?=getFundWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-sm-6 col-6 col-md-4">
<div class="card card-stats card-round">
<div class="card-body"  style="background:#114232; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-sm-12  col-md-4">
<div class="icon-big text-center icon-info bubble-shadow-small" style="background:#FFFFFF;">
<img src="assets/img/wallet.png"height="50" width="50"/>
</div>
</div>
<div class="col-sm-12  col-md-8">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:16px;">Total Team</p>
<h4 class="card-title" style="font-size:18px; color:#FFFFFF;"><?=getTotalTeam($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>



</div>


<div class="row">
<?php 
$sql="SELECT * FROM `ee_service` ORDER BY `service`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>

<div class="col-md-4">
<div style="background:#fff; width:100%; min-height:400px; border:solid #666666 1px; border-radius:10px;">

<a href="<?=$fetch['formurl']?>" style="text-decoration:none;" target="_blank">
<p align="center"><img src="../administrator/service/<?=$fetch['image']?>" width="100%" style="border-radius:10px; padding:6px;"/></p></a>
<p align="center" style="font-size:18px; color:#000000; font-weight:600; padding:0; margin:0;"><strong style="color:#000066;"><?=$fetch['service']?> </strong></p>
<p align="center" style="padding:0; margin:0; font-size:16px; color:#000000;"><strong style="color:#000066;"> Rs: </strong> <?=$fetch['fees']?></p>

<p align="center" style="padding:0; margin:0; font-size:16px; color:#000000;"><strong style="color:#000066;">Cashback: </strong> <?=$fetch['cashback']?></p>
<p align="center"  style="padding:0; margin:0; font-size:16px; color:#000000;"><strong style="color:#000066;">Description: </strong> <?=$fetch['description']?></p>

<div>&nbsp;</div>
<div align="center">
<a href="service-process.php?serviceid=<?=$fetch['id']?>&amount=<?=$fetch['fees']?>&cashback=<?=$fetch['cashback']?>" style="display:inline;"><button type="button" style=" background-color: #FF6600; padding: 10px; color:white;border-radius: 15px; cursor:pointer; border:none;">Apply Now</button></a>
</div>
<div>&nbsp;</div>

</div>



</div>




<?php }} ?>
</div>
</div>
</div>


</div>


</div>
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

