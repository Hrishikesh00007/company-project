<?php include('header.php');
$left=3;
?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">First Member</h4>
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

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already exists!!</p><?php }?>
<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Member added successfully!!</p><?php }?>

<form class="form" action="member-process.php?case=add" method="post">
<div class="form-body">
<h4 class="form-section"><i class="icon-eye6"></i>Personal Information</h4>


<div class="form-group">
<label for="userinput5">Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Name" required id="name" name="name" value="" />
</div>

<div class="form-group">
<label for="userinput5">Password<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="password" placeholder="Enter Password" required id="password" name="password" value="" />
</div>

<div class="form-group">
<label for="userinput5">Email<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Email" required id="email" name="email" value="" />
</div>

<div class="form-group">
<label for="userinput5">Phone<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone" id="phone" name="phone" value="" required />
</div>

<div class="form-group">
<label for="userinput5">Address<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Address" required id="address" name="address" value="" />
</div>

<!--<div class="form-group">
<label for="userinput5">Pancard Number<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Pancard" required id="pancard" name="pancard" value="" pattern="[A-Za-z]{5}\d{4}[A-Za-z]{1}" />
</div>-->



<h4 class="form-section"><i class="icon-mail6"></i>Bank Details</h4>


<div class="form-group">
<label for="userinput5">Bank</label>
<input class="form-control border-primary" type="text" placeholder="Enter Bank" id="bname" name="bname" value="" />
</div>

<div class="form-group">
<label for="userinput5">Account Name</label>
<input class="form-control border-primary" type="text" placeholder="Enter Account Holder Name" id="accname" name="accname" />
</div>

<div class="form-group">
<label for="userinput5">Account No</label>
<input class="form-control border-primary" type="text" placeholder="Enter Account No" id="accno" name="accno" value="" />
</div>

<div class="form-group">
<label for="userinput5">IFSC Code</label>
<input class="form-control border-primary" type="text" placeholder="Enter IFSC Code" id="ifscode" name="ifscode" value="" />
</div>

<div class="form-group">
<label for="userinput5">UPI ID</label>
<input class="form-control border-primary" type="text" placeholder="Enter UPI ID" id="upiid" name="upiid" value="" />
</div>

</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
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

<?php }else if($_REQUEST['case']=='edit'){?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Member List</h4>
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
<?php 
$sql="SELECT * FROM `ee_member` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="member-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post">
<div class="form-body">
<h4 class="form-section"><i class="icon-eye6"></i>Personal Information</h4>

<div class="form-group">
<label for="userinput5">Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Name" required id="name" name="name" value="<?=$fetch['name']?>" />
</div>

<div class="form-group">
<label for="userinput5">Password<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="password" placeholder="Enter Password" required id="password" name="password" value="<?=base64_decode($fetch['password'])?>" />
</div>

<div class="form-group">
<label for="userinput5">Email<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Email" required id="email" name="email" value="<?=$fetch['email']?>" />
</div>

<div class="form-group">
<label for="userinput5">Phone<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone" id="phone" name="phone" value="<?=$fetch['phone']?>" required />
</div>

<div class="form-group">
<label for="userinput5">Address<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Address" required id="address" name="address" value="<?=$fetch['address']?>" />
</div>



<!--<div class="form-group">
<label for="userinput5">Pancard Number<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" placeholder="Pancard Number" name="pancard" id="pancard" pattern="[A-Za-z]{5}\d{4}[A-Za-z]{1}" value="<?=$fetch['pancard']?>" required />
</div>-->

<h4 class="form-section"><i class="icon-mail6"></i>Bank Details</h4>

<div class="form-group">
<label for="userinput5">Bank</label>
<input class="form-control border-primary" type="text" placeholder="Enter Bank" id="bname" name="bname" value="<?=$fetch['bname']?>" />
</div>

<div class="form-group">
<label for="userinput5">Account Holder Name</label>
<input class="form-control border-primary" type="text" placeholder="Enter Account Holder Name" id="accname" name="accname" value="<?=$fetch['accname']?>" />
</div>

<div class="form-group">
<label for="userinput5">Account No</label>
<input class="form-control border-primary" type="text" placeholder="Enter Account No" id="accno" name="accno" value="<?=$fetch['accno']?>" />
</div>

<div class="form-group">
<label for="userinput5">IFSC Code</label>
<input class="form-control border-primary" type="text" placeholder="Enter IFSC Code" id="ifscode" name="ifscode" value="<?=$fetch['ifscode']?>" />
</div>

<div class="form-group">
<label for="userinput5">UPI ID</label>
<input class="form-control border-primary" type="text" placeholder="Enter UPI ID" id="upiid" name="upiid" value="<?=$fetch['upiid']?>" />
</div>

</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
</div>

</form>
<?php }?>
</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
</section>

</div>
</div>
</div>

<?php }else if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div>&nbsp;</div>
<div class="col-xs-12">
<div class="card">
<div class="card-header">

<h4 class="card-title">Member List</h4>
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
<table width="100%">
<tr>
<td>
<div align="left" style="margin-left:10px;"><a href="member-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</td>
<td>
<div align="right" style="padding:5px;"><form name="frm1" method="post" action="member.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID, Name, Phone" style="width:250px;" />
</form></div>
</td>
</tr>
</table>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th width="10%">Sl_No</th>
<th width="10%">User_ID</th>
<th width="10%">Sponsor</th>

<th width="10%">Name</th>
<th width="10%">Password</th>
<th width="10%">Phone</th>
<th width="10%">Email</th>

<th width="10%">Status</th>
<th width="10%">Pay_Status</th>

<th width="10%">Date</th>
<th width="10%">Approved</th>
<th width="10%">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_member';
$lim=100;
$tpage='member.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."'  OR `name` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."'  OR `phone` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' ORDER BY `id` DESC";
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
<td align="center" style="padding:5px;"><a href="../member/admin-login-process.php?userid=<?=$fetch['userid']?>&password=<?=base64_decode($fetch['password'])?>" target="_blank" style="text-decoration:none;"><strong><?=$fetch['userid']?></strong></a></td>
<td align="center" style="padding:5px;"><?php if($fetch['sponsor']){?><?=$fetch['sponsor']?><?php }else{?>---<?php }?></td>





<td align="center" style="padding:5px;"><?=ucwords(strtolower($fetch['name']))?></td>
<td align="center" style="padding:5px;"><?=base64_decode($fetch['password'])?></td>
<td align="center" style="padding:5px;"><?=$fetch['phone']?></td>
<td align="center" style="padding:5px;"><?=$fetch['email']?></td>
<td align="center" style="padding:5px;"><?php if($fetch['status']=='I'){?><a href="member-status.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#FF0000;">Inactive</span></a><?php }else{?><a href="member-status.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#00CC00;">Active</span></a><?php }?></td>
<td align="center" style="padding:5px;"><?php if($fetch['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch['date'])?></td>

<td align="center" style="padding:5px;"><?php if($fetch['paystatus']=='A'){?><?=getDateConvert($fetch['approved'])?><?php }else{?>---<?php }?></td>


<td align="center" style="padding:5px;"><a href="details.php?mid=<?=$fetch['id']?>" title="Member Details" target="_blank"><img src="images/view.png" /></a>&nbsp;<a href="member.php?case=edit&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>"title="Edit" onClick="return confirm('Are you sure want to edit this record?');"><img src="images/edit.png" /></a>&nbsp;<?php if($fetch['status']=='I'){?><a href="member-process.php?case=delete&id=<?=$fetch['id']?>"title="Delete" onClick="return confirm('Are you sure want to Delete this record?');"><img src="images/delete.png" /></a><?php }?>
</td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="18" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>