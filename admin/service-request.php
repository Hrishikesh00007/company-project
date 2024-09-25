<?php include('header.php');
$left=3;
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
<h4 class="card-title">Service Request Statement</h4>
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
<form name="frm1" method="post" action="service-request.php?act=search">
<div class="col-md-1"><div style="padding:5px;">From</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="fromdate" id="fromdate" value="<?=$_POST['fromdate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-1"><div style="padding:5px;">To</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="todate" id="todate" value="<?=$_POST['todate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="submit" name="submit" value="Search" class="btn" style="background:#009900;color:#FFFFFF;" /></div></div>
</form>

<div class="col-md-2">
<div style="padding:5px;">
<form name="frm1" method="post" action="service-request.php?act=search">
<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" />
</form>
</div>
</div>
<div class="col-md-2">
<div style="padding:5px;">
<div align="left" style="margin-left:10px;"><a href="service-request-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
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

<th width="10%" align="center">Amount</th>

<th width="10%" align="center">Status</th>
<th width="10%" align="center">Request_Date</th>
<th width="10%" align="center">Approved_Date</th>

<th width="10%" align="center">Action</th>
</tr>
</thead>
<tbody>
<?php
$tname='ee_member_service';
$lim=100;
$tpage='service-request.php';

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
<tr>
<td align="center" style="padding:5px;"><?=$i?></td>
<td align="center" style="padding:5px;"><?=$fetch['userid']?></td>
<td align="center" style="padding:5px;"><?=ucwords(getMemberUserid($conn,$fetch['userid'],'name'))?></td>

<td align="center" style="padding:5px;"><?=$fetch['amount']?></td>

<td align="center" style="padding:5px;"><?php if($fetch['status']=='P'){?><a href="service-request-process.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>&amount=<?=$fetch['amount']?>&tranid=<?=$fetch['tranid']?>&page=<?=$_REQUEST['page']?>&userid=<?=$fetch['userid']?>&serviceid=<?=$fetch['serviceid']?>" style="text-decoration:none;"><span style="color:#FFFFFF;background:#FF0000;padding:2px 10px;border-radius:5px;" onClick="return confirm('Are you sure want to change status of payment request?');">Pending</span></a><?php }else{?><span style="color:#FFFFFF;background:#009900;padding:2px 10px;border-radius:5px;">Approved</span><?php }?></td>


<td align="center" style="padding:5px;"><?=getDateConvert($fetch['date'])?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch['approved'])?></td>



<td align="center" style="padding:5px;"><?php if($fetch['status']=='P'){?><a href="service-request-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" class="btn btn-danger" onClick="return confirm('Are you sure want to delete this record?');"><i class="fa fa-times icon-only"></i></a><?php }else{?>---<?php }?></td>


</tr>
<?php $i++;}}else{?>
<tr><td colspan="10" align="center" style="color:#FF0000;" >No Record Found!</td></tr>
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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>