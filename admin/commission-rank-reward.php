<?php include('header.php');
$left=4;
?>
<!-- main menu-->
<?php include('leftpanel.php'); ?>


<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Rank Reward Bonus Statement</h4>
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

<div class="row">
<form name="frm1" method="post" action="commission-rank-reward.php?act=search">
<div class="col-md-1"><div style="padding:5px;">From</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="fromdate" id="fromdate" value="<?=$_POST['fromdate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-1"><div style="padding:5px;">To</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="todate" id="todate" value="<?=$_POST['todate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="submit" name="submit" value="Search" class="btn" style="background:#009900;color:#FFFFFF;" /></div></div>
</form>

<div class="col-md-2">
<div style="padding:5px;">
<form name="frm1" method="post" action="commission-rank-reward.php?act=search">
<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" />
</form>
</div>
</div>
<div class="col-md-2">
<div style="padding:5px;">
<div align="left" style="margin-left:10px;"><a href="commission-rank-reward-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No.</th>
<th style="text-align:center;">User_ID</th>
<th style="text-align:center;">Name</th>
<th style="text-align:center;">Rank</th>


<th style="text-align:center;">Total_CTO</th>
<th style="text-align:center;">Company_Turn_Over(%)</th>
<th style="text-align:center;">Amount</th>
<th style="text-align:center;">No_Achiever</th>
<th style="text-align:center;">Bonus</th>
<th style="text-align:center;">Date</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_commission_rank_reward';
$lim=100;
$tpage='commission-rank-reward.php';

if($_REQUEST['act']=='search')
{
if($_POST['fromdate']!='' && $_POST['todate']!='')
{
$where="WHERE `date` BETWEEN '".trim($_POST['fromdate'])."' AND '".trim($_POST['todate'])."' AND `date`<='".date('Y-m-d')."' ORDER BY `id` DESC";
}else{
$where="WHERE `userid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' AND `date`<='".date('Y-m-d')."' ORDER BY `id` DESC";
}
}else{
$where="ORDER BY `id` DESC";
}

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center" style="padding:3px;"><?=$i?></td>
<td align="center" style="padding:3px;"><?=$fetch['userid']?></td>
<td align="center" style="padding:3px;"><?=getMemberName($conn,$fetch['userid'],'name')?></td>
<td align="center" style="padding:3px;"><?=getMemRank($conn,$fetch['rankid'],'rank')?></td>

<td align="center" style="padding:3px;"><?=$fetch['totalcto']?></td>
<td align="center" style="padding:3px;"><?=$fetch['ctoper']?></td>
<td align="center" style="padding:3px;"><?=$fetch['amount']?></td>
<td align="center" style="padding:3px;"><?=$fetch['noachiever']?></td>
<td align="center" style="padding:3px;"><?=$fetch['bonus']?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="10" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
<div align="center"><?=$pagination?></div>
</div>
</div>
</div>
</div>
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
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>
