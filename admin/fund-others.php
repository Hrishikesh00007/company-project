<?php include('header.php');
$left=20;
?>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Fund Transfer To Others Member statement</h4>
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
<form name="frm1" method="post" action="fund-others.php?act=search">
<div class="col-md-1"><div style="padding:5px;">From</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="fromdate" id="fromdate" value="<?=$_POST['fromdate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-1"><div style="padding:5px;">To</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="todate" id="todate" value="<?=$_POST['todate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="submit" name="submit" value="Search" class="btn" style="background:#009900;color:#FFFFFF;" /></div></div>
</form>

<div class="col-md-2">
<div style="padding:5px;">
<form name="frm1" method="post" action="fund-others.php?act=search">
<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" />
</form>
</div>
</div>
<div class="col-md-2">
<div style="padding:5px;">
<div align="left" style="margin-left:10px;"><a href="fund-others-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</div>
</div>
</div>


<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th width="10%" align="center">Sl_No</th>
<th width="10%" align="center">User_ID</th>
<th width="10%" align="center">Name</th>
<th width="15%" align="center">To_ID</th>
<th width="10%" align="center">Name</th>
<th width="10%" align="center">Fund</th>
<th width="10%" align="center">Remarks</th>
<th width="10%" align="center">Date</th>
</tr>
</thead>
<tbody>
<?php
$tname='ee_transfer_fund_others';
$lim=100;
$tpage='fund-others.php';

if($_REQUEST['act']=='search')
{
if($_POST['fromdate']!='' && $_POST['todate']!='')
{
$where="WHERE `date` BETWEEN '".trim($_POST['fromdate'])."' AND '".trim($_POST['todate'])."' ORDER BY `id` DESC";
}else{
$where="WHERE `userid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' OR `toid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' ORDER BY `id` DESC";
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
<td align="center" style="padding:5px;"><?=$i?></td>
<td align="center" style="padding:5px;"><?=$fetch['userid']?></td>
<td align="center" style="padding:5px;"><?=ucwords(getMemberUserid($conn,$fetch['userid'],'name'))?></td>
<td align="center" style="padding:5px;"><?=$fetch['toid']?></td>
<td align="center" style="padding:5px;"><?=ucwords(getMemberUserid($conn,$fetch['toid'],'name'))?></td>
<td align="center" style="padding:5px;"><?=$fetch['fund']?></td>
<td align="center" style="padding:5px;"><?=$fetch['remarks']?></td>
<td align="center" style="padding:5px;"><?=getDateConvert($fetch['date'])?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="8" align="center" style="color:#FF0000;" >No Record Found!</td></tr>
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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>