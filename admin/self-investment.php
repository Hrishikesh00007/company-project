<?php include('header.php'); 
$left=3;
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
<h4 class="card-title">Self Investment Statement</h4>
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
<form action="self-investment.php?act=search" method="post">
<div class="col-md-1"><div style="padding:5px;">From_Date</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="fromdate" id="fromdate" value="<?=$_POST['fromdate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-1"><div style="padding:5px;">To_Date</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="todate" id="todate" value="<?=$_POST['todate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="submit" name="submit" value="Search" class="btn" style="background:#009900;color:#FFFFFF;" /></div></div>
</form>

<div class="col-md-2">
<div style="padding:5px;">
<form action="self-investment.php?act=search" method="post">
<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" />
</form>
</div>
</div>
<div class="col-md-2">
<div style="padding:5px;">
<div align="left" style="margin-left:10px;"><a href="self-investment-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped" align="center" width="100%">
<thead class="bg-teal bg-lighten-4" align="center">
<tr align="center">
<th width="6%">Sl_No.</th>
<th width="6%">User_ID</th>	
<th width="6%">Name</th>											
<th width="12%">Package</th>						
<th width="8%">Amount</th>
<th width="8%">Daily(%)</th>
<th width="8%">No_Of_Days</th>
<th width="8%">Remarks</th>
<th width="8%">Date</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_member_investment_self';
$lim=100;
$tpage='self-investment.php';

if($_REQUEST['act']=='search')
{
if($_POST['fromdate']!='' && $_POST['todate']!='')
{
$where="WHERE `date` BETWEEN '".trim($_POST['fromdate'])."' AND '".trim($_POST['todate'])."' ORDER BY `id` DESC";
}else{
$where="WHERE `userid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' ORDER BY `id` DESC";
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
<tr align="center">
<td style="text-align:center;padding:2px;"><?=$i?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['userid']?></td>
<td style="text-align:center;padding:2px;"><?=getMemberName($conn,$fetch['userid'],'name')?></td>
<td style="text-align:center;padding:2px;"><?=ucwords(getSettingsPackage($conn,$fetch['package'],'package'))?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['amount']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['dailyper']?></td>
<td style="text-align:center;padding:2px;"><?=$fetch['nodays']?></td>
<td style="text-align:center;padding:2px;"><?=stripslashes($fetch['remarks'])?></td>
<td style="text-align:center;padding:2px;"><?=getDateConvert($fetch['date'])?></td>
</tr>              
<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>