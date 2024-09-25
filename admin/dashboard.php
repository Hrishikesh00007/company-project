<?php
include('header.php');
$left=1;

include('calculate-reward.php');
?>
<!-- main menu-->
<?php include('leftpanel.php');?>
<!-- / main menu-->



<div class="app-content content container-fluid">
<div class="content-wrapper" style="background:#FFFFFF;">

<div class="content-body" style="min-height:518px;">

<div align="center">&nbsp;</div>

<div class="row">
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member.php" style="color:#fff;">
<div class="card-body" style="background:#87A922; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white" style="color:#FFFFFF;"><?=getTotalMember($conn)?></h3>
<span class="white" style="color:#FFFFFF;">Total Member</span>
</div>
<div class="media-right media-middle">
<i class="icon-man-woman white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member-active.php" style="color:#fff;">
<div class="card-body" style="background:#FAA300; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=getActiveMember($conn)?></h3>
<span >Active Member</span>
</div>
<div class="media-right media-middle" >
<i class="icon-man-woman white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member-inactive.php" style="color:#fff;">
<div class="card-body" style="background:#5E1675; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white" style="color:#FFFFFF;"><?=getInactiveMember($conn)?></h3>
<span class="white" style="color:#FFFFFF;">Inactive Member</span>
</div>
<div class="media-right media-middle">
<i class="icon-man-woman white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-level.php" style="color:#fff;">
<div class="card-body" style="background:#61481C; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=$currency?> <?=getTotalLevelBonus($conn)?></h3>
<span>Level Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-money white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>




<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-cashback-bonus.php" style="color:#fff;">
<div class="card-body" style="background:#87A922; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=$currency?> <?=getTotalCashbackBonus($conn)?> </h3>
<span>Cashback Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-money white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>



<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-cashback-level.php" style="color:#fff;">
<div class="card-body" style="background:#FAA300; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=$currency?> <?=getTotalCashbackLevel($conn)?></h3>
<span>Cashback Level Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-money white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-direct-bonus.php" style="color:#fff;">
<div class="card-body" style="background:#5E1675; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=$currency?> <?=getAdminCommissionDirect($conn)?></h3>
<span>Direct Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-money white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-rank-reward.php" style="color:#fff;">
<div class="card-body" style="background:#61481C; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=$currency?> <?=getTotalRankRewardBonus($conn)?></h3>
<span>Rank Reward Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-gift white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>



<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="pending-withdrawal.php" style="color:#fff;">
<div class="card-body" style="background:#87A922; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white" style="color:#FFFFFF;"><?=$currency?> <?=getPendingWithdrawalAdmin($conn)?></h3>
<span style="white">Pending Withdrawal</span>
</div>
<div class="media-right media-middle">
<i class="icon-wallet white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="approved-withdrawal.php" style="color:#fff;">
<div class="card-body" style="background:#FAA300; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white" style="color:#FFFFFF;"><?=$currency?> <?=getApprovedWithdrawalAdmin($conn)?></h3>
<span style="color:#FFFFFF;">Approved Withdrawal</span>
</div>
<div class="media-right media-middle">
<i class="icon-wallet white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="payment-request.php" style="color:#fff;">
<div class="card-body" style="background:#5E1675; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white" style="color:#FFFFFF;"><?=$currency?> <?=getPendingPaymentAdmin($conn)?></h3>
<span style="white; font-size:12px;">Pending Payment Request</span>
</div>
<div class="media-right media-middle">
<i class="icon-wallet white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="payment-request.php" style="color:#fff;">
<div class="card-body" style="background:#61481C; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white" style="color:#FFFFFF;"><?=$currency?> <?=getApprovedPaymentAdmin($conn)?></h3>
<span style="white; font-size:12px;">Approved Payment Request</span>
</div>
<div class="media-right media-middle">
<i class="icon-wallet white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="support.php" style="color:#fff;">
<div class="card-body" style="background:#87A922; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=getTotalSupport($conn)?></h3>
<span>Total Support</span>
</div>
<div class="media-right media-middle">
<i class="icon-phone white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>




<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="feedback.php" style="color:#fff;">
<div class="card-body" style="background:#FAA300; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=getNoOfFeedback($conn)?></h3>
<span>Total Feedback</span>
</div>
<div class="media-right media-middle">
<i class="icon-phone white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
















</div>

</div>
</div>
</div>

</div>
</div>
</div>


<?php include('footer.php');?>

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
