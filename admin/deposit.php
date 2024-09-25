<?php include('header.php');
$left=6;
?>
<script src="js/ajax.js" type="text/javascript"></script>
<script>
function getSponcheck(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getSponRequest;
xmlhttp.send();
}
function getSponRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('sponDiv').innerHTML=response;
}
}
}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<?php if($_REQUEST['case']=='add'){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">New Deposit</h4>
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
<div class="card-block">

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Invalid User ID !!</p><?php }?>
<?php if(isset($_REQUEST['f'])==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Amount should be greater than zero !!</p><?php }?>
<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Deposit  Successfully!!</p><?php }?>

<form class="form" action="deposit-process.php?case=add" method="post">
<div class="form-body">
<div class="form-group"><label for="userinput5">User ID<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control border-primary"  placeholder="Enter User ID" name="userid" id="userid" onChange="getSponcheck(this.value);" onBlur="getSponcheck(this.value);"  onKeyUp="getSponcheck(this.value);"  required>
<div id="sponDiv" style="color:#FF0000; font-size:14px;"></div>
</div>

<div class="form-group">
<label for="userinput5">Wallet<span style="color:#CC0000;">*</span></label>
<select class="form-control border-primary" id="wallet" name="wallet">
<option value="">Select Wallet</option>
<option value="Current Wallet">Current Wallet</option>
<option value="Fund Wallet">Fund Wallet</option>

</select>
</div>

<div class="form-group">
<label for="userinput5">Amount<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Amount" required id="amount" name="amount" value="" />
</div>

<div class="form-group">
<label for="userinput5">Remarks<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Remarks" id="remarks" name="remarks" value="" required />
</div>
</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
</div>
</form>

</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

<?php }else if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Deposit</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div>&nbsp;</div>
<div class="row">
<div class="col-xs-12 col-sm-2">
<a href="deposit-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF; width:100%; margin-top:10px;" /></a>
</div>
<div class="col-xs-12 col-sm-2">
<form name="frm1" method="post" action="deposit.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" style="width:100%; margin-top:10px; padding:10px;" />
</form>
</div>

<form name="frm1" method="post" action="deposit.php?act=search">
<div class="col-md-1"><div style="padding:5px;">From</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="fromdate" id="fromdate" value="<?=$_POST['fromdate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-1"><div style="padding:5px;">To</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="todate" id="todate" value="<?=$_POST['todate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="submit" name="submit" value="Search" class="btn" style="background:#009900;color:#FFFFFF;" /></div></div>
</form>

</div>
<div>&nbsp;</div>

<div class="card-body collapse in">

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;" width="10%">Sl_No.</th>
<th style="text-align:center;" width="15%">User_ID</th>
<th style="text-align:center;" width="15%">Name</th>
<th style="text-align:center;" width="15%">Wallet</th>
<th style="text-align:center;" width="15%">Amount</th>
<th style="text-align:center;" width="15%">Remarks</th>
<th style="text-align:center;" width="15%">Date</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_deposit';
$lim=100;
$tpage='deposit.php';
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
<td align="center" style="padding:5px;"><?php if ($fetch['userid']){?><?=$fetch['userid']?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:5px;"><?=getMemberUserid($conn,trim($fetch['userid']),'name')?></td>
<td align="center" style="padding:5px;"><?=$fetch['wallet']?></td>
<td align="center" style="padding:5px;"><?=$fetch['amount']?></td>
<td align="center" style="padding:5px;"><?=stripslashes($fetch['remarks'])?></td>
<td align="center" style="padding:5px;"><?=getDateConvert($fetch['date'])?></td>

</tr>
<?php $i++;}}else{?>
<tr><td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>

</tbody>
</table>
</div>
<div align="center"><?=$pagination?></div>

</div>
</div>
</div>
</div>


</div>
</div>
</div>
<?php }?>

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
