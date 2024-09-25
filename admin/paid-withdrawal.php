<?php 
include('header.php'); 
$left=7;
$tds=getPaidTotalWithdrawal($conn,'tds');
$service=getPaidTotalWithdrawal($conn,'service');
$totalcharge=($tds=+$service);
?>
<style>
table,
thead,
tr,
tbody,
th,
td {
text-align: center;
}
</style>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Paid Withdrawal Statement</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in">


<div class="caption">
<div>&nbsp;</div>

<table width="100%">
<tr><td>
<div align="left" style="margin-left:10px;"><a href="withdrawal-paid-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</td>
<td>
<div align="right" style="padding:10px;">
<form name="form3" action="paid-withdrawal.php?act=search" method="post">
<input type="text" name="search" id="search" value="<?=$_REQUEST['search']?>" class="form-control border-primary" style="width:180px;" placeholder="User ID" />
</form>
</div>
</td>
</tr>
</table>

<div>&nbsp;</div>

<div class="table-responsive">

<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr height="30" style="font-size:16px;color:#4378A3;">
<td width="23%" align="right" valign="middle"><strong style="font-size:14px;">&nbsp;Total_Request_Amount&nbsp;:&nbsp;</strong></td>
<td width="9%" align="left" valign="middle" style="font-size:14px;"><?=getPaidTotalWithdrawal($conn,'request')?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="24%" align="right" valign="middle"><strong style="font-size:14px;">Total_Charge&nbsp;:&nbsp;</strong></td>
<td width="10%" align="left" valign="middle" style="font-size:14px;"><?=$totalcharge?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="22%" align="right" valign="middle"><strong style="font-size:14px;">Total_Payout&nbsp;:&nbsp;</strong></td>
<td width="12%" align="left" valign="middle" style="font-size:14px;"><?=getPaidTotalWithdrawal($conn,'payout')?></td>
</tr>
</table>
<div>&nbsp;</div>
<table class="table table-bordered table-striped" align="center" >
<thead class="bg-teal bg-lighten-4" align="center"><tr><tr>
<td width="5%" align="center">Sl_No</td>
<td width="6%" align="center">User_ID</td>
<td width="6%" align="center">Name</td>
<td width="7%" align="center">Request</td>
<td width="9%" align="center">TDS</td>
<td width="9%" align="center">Service</td>
<td width="6%" align="center">Payout</td>
<td width="6%" align="center">Type</td>
<td width="9%" align="center">Banke</td>
<td width="6%" align="center">Branch</td>
<td width="6%" align="center">Account_Name</td>
<td width="9%" align="center">Account_No.</td>
<td width="8%" align="center">IFS_Code</td>
<td width="8%" align="center">Bitcoin</td>
<td width="8%" align="center">Ethereum</td>
<td width="8%" align="center">Tron</td>
<td width="9%" align="center">Status</td>
<td width="5%" align="center">Date</td>
</tr>
</thead>
<tbody>
<?php
$tname='ee_withdrawal';
$lim=100;
$tpage='paid-withdrawal.php';
if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' AND `status`='C' AND `paid`='C' ORDER BY `id` DESC";
}else{
$where="WHERE `status`='C' AND `paid`='C' ORDER BY `id` DESC";
}
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr height="30">
<td align="center" class="tborder" style="padding:3px;"><?=$i?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['userid']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=ucwords(getMemberUserid($conn,$fetch['userid'],'name'))?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['request']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['tds']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['service']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['payout']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['type']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=ucwords($fetch['bname'])?></td>
<td align="center" class="tborder" style="padding:3px;"><?=ucwords($fetch['branch'])?></td>
<td align="center" class="tborder" style="padding:3px;"><?=ucwords($fetch['accname'])?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['accno']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['ifscode']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['bitcoin']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['etherium']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['tron']?></td>
<td align="center" class="tborder" style="padding:3px;"><?php if($fetch['status']=='C'){?><span style="color:#009900;">Approved</span><?php }?></td>
<td align="center" class="tborder" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
</tr>
<?php $i++;}}else{?>
<tr height="14"><td align="center" colspan="18" style="color:#FF0000;"><div class="norecord">No Record Found!</div></td></tr>
<?php }?>
</tbody>
</table>          

</div>
</div>
</div>

</div>
</div>
</div>
<div class="col-md-3">&nbsp;</div>
</div>
</div>
</div>
</div>
<?php include('footer.php') ?>

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
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>