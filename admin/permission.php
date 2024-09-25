<?php include('header.php');
$left=15;
?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Permission</h4>
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

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already Exists !!</p><?php }?>

<?php if(isset($_REQUEST['m'])==2){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Added Successfully !!</p><?php }?>

<form  action="permission-process.php?case=add" method="post">

<div class="form-body">
<div class="form-group">
<label for="userinput5">Username<span style="color:#CC0000;">*</span></label>
<select name="username" id="username" class="form-control input-line input-medium" required>
<option value="">Select Username</option>
<?php
$sql="SELECT * FROM `ee_admin` WHERE `role`='S' AND `status`='A' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{ ?>
<option value="<?=$fetch['id']?>"><?=base64_decode($fetch['username'])?></option>
<?php 
}
}
?>
</select>

</div>

<div class="form-group">
<label for="userinput5">Module<span style="color:#CC0000;">*</span></label><br>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Dashboard" /> Dashboard<br>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Change Password" /> Change Password<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Logout" /> Logout<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Package" /> Settings Package<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Level" /> Settings Level<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Fixed Deposit" /> Settings Fixed Deposit<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings SIP Invest" /> Settings SIP Invest<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Transfer" /> Settings Transfer<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Withdrawal" /> Settings Withdrawal<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Bank Details" /> Settings Bank Details<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Social" /> Settings Social<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings On Off" /> Settings On Off<br/>


<input type="checkbox" name="emp_name[]" id="emp_name" value="View Member" /> View Member<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Wallet Statement" /> Wallet Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Income Statement" /> Income Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Self Invest Statement" /> Self Invest Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Others Invest Statement" /> Others Invest Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Fixed Deposit Statement" /> Fixed Deposit Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="SIP Invest Statement" /> SIP Invest Statement<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="ROI Bonus">ROI Bonus<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Direct Bonus">Direct Bonus<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Level Bonus"> Level Bonus<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Fixed Deposit Bonus"> Fixed Deposit Bonus<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="SIP Invest Bonus"> SIP Invest Bonus<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Deposit" /> New Deposit<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Deposit" /> View Deposit<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Deduct" /> New Deduct<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Deduct" /> View Deduct<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Fund Request Statement" /> Fund Request Statement<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Current To Fund" />Current To Fund<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Fund To Others" />Fund To Others<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Pending Withdrawal" /> Pending Withdrawal<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Approved Withdrawal" /> Approved Withdrawal<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Fixed Pending Withdrawal" /> Fixed Pending Withdrawal<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Fixed Approved Withdrawal" /> Fixed Approved Withdrawal<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="SIP Pending Withdrawal" /> SIP Pending Withdrawal<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="SIP Approved Withdrawal" /> SIP Approved Withdrawal<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Grid View" /> Grid View<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Message" /> New Message<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Message" /> View Message<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Banner" /> New Banner<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Banner" />View Banner<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="New Contact" /> New Contact<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Contact" /> View Contact<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Feedback" /> View Feedback<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Subadmin" /> New Subadmin<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Subadmin" /> View Subadmin<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="New Permission" />   New Permission<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Permission" />   View Permission<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="View Support" /> View Support<br/>
 
</div>

</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit
</button>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Permission</h4>
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

<?php if(isset($_REQUEST['p'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already Exists !!</p><?php }?>

<?php if(isset($_REQUEST['m'])==2){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Update Successfully !!</p><?php }?>

<?php
 $sqle="SELECT * FROM `ee_permission` WHERE `username`='".trim($_REQUEST['id'])."'";
$rese=query($conn,$sqle);
$nume=numrows($rese);
if($nume>0)
{

$fetche=fetcharray($rese);
}
?>
<form  action="permission-process.php?case=edit&id=<?=$fetche['id']?>" method="post">

<div class="form-body">
<div class="form-group">
<label for="userinput5">Username<span style="color:#CC0000;">*</span></label>
<select name="username" id="username" class="form-control input-line input-medium" required>
<option value="">Select Username</option>
<?php
$sql="SELECT * FROM `ee_admin` WHERE `id`>1 ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))

{ ?>
<option value="<?=$fetch['id']?>"<?php if($fetche['username']==$fetch['id']){ echo 'selected';}?>><?=base64_decode($fetch['username'])?></option>
<?php 
}
}
?>
</select>

 </div>

<div class="form-group">
<label for="userinput5">Module<span style="color:#CC0000;">*</span></label>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Dashboard" <?php if(getPermissionCheck($conn,$fetche['username'],'Dashboard')>0){?>checked="checked"<?php }?> /> Dashboard<br />
<input type="checkbox" name="emp_name[]" id="emp_name" value="Change Password"<?php if(getPermissionCheck($conn,$fetche['username'],'Change Password')>0){?>checked="checked"<?php }?> /> Change Password<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Logout"<?php if(getPermissionCheck($conn,$fetche['username'],'Logout')>0){?>checked="checked"<?php }?> />Logout<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Package"<?php if(getPermissionCheck($conn,$fetche['username'],'Settings Package')>0){?>checked="checked"<?php }?> /> Settings Package<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Level"<?php if(getPermissionCheck($conn,$fetche['username'],'Settings Level')>0){?>checked="checked"<?php }?> /> Settings Level<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Fixed Deposit"<?php if(getPermissionCheck($conn,$fetche['username'],'Settings Fixed Deposit')>0){?>checked="checked"<?php }?> /> Settings Fixed Deposit<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings SIP Invest"<?php if(getPermissionCheck($conn,$fetche['username'],'Settings SIP Invest')>0){?>checked="checked"<?php }?> /> Settings SIP Invest<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Transfer"<?php if(getPermissionCheck($conn,$fetche['username'],'Settings Transfer')>0){?>checked="checked"<?php }?> /> Settings Transfer<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Withdrawal"<?php if(getPermissionCheck($conn,$fetche['username'],'Settings Withdrawal')>0){?>checked="checked"<?php }?> /> Settings Withdrawal<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Bank Details"<?php if(getPermissionCheck($conn,$fetche['username'],'Settings Bank Details')>0){?>checked="checked"<?php }?> /> Settings Bank Details<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings Social"<?php if(getPermissionCheck($conn,$fetche['username'],'Settings Social')>0){?>checked="checked"<?php }?> /> Settings Social<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Settings On Off"<?php if(getPermissionCheck($conn,$fetche['username'],'Settings On Off')>0){?>checked="checked"<?php }?> /> Settings On Off<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="View Member"<?php if(getPermissionCheck($conn,$fetche['username'],'View Member')>0){?>checked="checked"<?php }?> /> View Member<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Wallet Statement"<?php if(getPermissionCheck($conn,$fetche['username'],'Wallet Statement')>0){?>checked="checked"<?php }?> /> Wallet Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Income Statement"<?php if(getPermissionCheck($conn,$fetche['username'],'Income Statement')>0){?>checked="checked"<?php }?> /> Income Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Self Invest Statement"<?php if(getPermissionCheck($conn,$fetche['username'],'Self Invest Statement')>0){?>checked="checked"<?php }?> /> Self Invest Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Others Invest Statement"<?php if(getPermissionCheck($conn,$fetche['username'],'Others Invest Statement')>0){?>checked="checked"<?php }?> /> Others Invest Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Fixed Deposit Statement"<?php if(getPermissionCheck($conn,$fetche['username'],'Fixed Deposit Statement')>0){?>checked="checked"<?php }?> /> Fixed Deposit Statement<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="SIP Invest Statement"<?php if(getPermissionCheck($conn,$fetche['username'],'SIP Invest Statement')>0){?>checked="checked"<?php }?> /> SIP Invest Statement<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="ROI Bonus"<?php if(getPermissionCheck($conn,$fetche['username'],'ROI Bonus')>0){?>checked="checked"<?php }?> /> ROI Bonus<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Direct Bonus"<?php if(getPermissionCheck($conn,$fetche['username'],'Direct Bonus')>0){?>checked="checked"<?php }?> /> Direct Bonus<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Level Bonus"<?php if(getPermissionCheck($conn,$fetche['username'],'Level Bonus')>0){?>checked="checked"<?php }?> /> Level Bonus<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Fixed Deposit Bonus"<?php if(getPermissionCheck($conn,$fetche['username'],'Fixed Deposit Bonus')>0){?>checked="checked"<?php }?> /> Fixed Deposit Bonus<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="SIP Invest Bonus"<?php if(getPermissionCheck($conn,$fetche['username'],'SIP Invest Bonus')>0){?>checked="checked"<?php }?> /> SIP Invest Bonus<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Deposit"<?php if(getPermissionCheck($conn,$fetche['username'],'New Deposit')>0){?>checked="checked"<?php }?> /> New Deposit<br>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Deposit"<?php if(getPermissionCheck($conn,$fetche['username'],'View Deposit')>0){?>checked="checked"<?php }?> />View Deposit<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Deduct"<?php if(getPermissionCheck($conn,$fetche['username'],'New Deduct')>0){?>checked="checked"<?php }?> />New New Deduct<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Deduct"<?php if(getPermissionCheck($conn,$fetche['username'],'View Deduct')>0){?>checked="checked"<?php }?> /> View Deduct<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Fund Request Statement"<?php if(getPermissionCheck($conn,$fetche['username'],'Fund Request Statement')>0){?>checked="checked"<?php }?> /> Fund Request Statement<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Current To Fund"<?php if(getPermissionCheck($conn,$fetche['username'],'Current To Fund')>0){?>checked="checked"<?php }?> /> Current To Fund<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Fund To Others"<?php if(getPermissionCheck($conn,$fetche['username'],'Fund To Others')>0){?>checked="checked"<?php }?> /> Fund To Others<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Pending Withdrawal"<?php if(getPermissionCheck($conn,$fetche['username'],'Pending Withdrawal')>0){?>checked="checked"<?php }?> /> Pending Withdrawal<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Approved Withdrawal"<?php if(getPermissionCheck($conn,$fetche['username'],'Approved Withdrawal')>0){?>checked="checked"<?php }?> /> Approved Withdrawal<br>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Fixed Pending Withdrawal"<?php if(getPermissionCheck($conn,$fetche['username'],'Fixed Pending Withdrawal')>0){?>checked="checked"<?php }?> /> Fixed Pending Withdrawal<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="Fixed Approved Withdrawal"<?php if(getPermissionCheck($conn,$fetche['username'],'Fixed Approved Withdrawal')>0){?>checked="checked"<?php }?> /> Fixed Approved Withdrawal<br>

<input type="checkbox" name="emp_name[]" id="emp_name" value="SIP Pending Withdrawal"<?php if(getPermissionCheck($conn,$fetche['username'],'SIP Pending Withdrawal')>0){?>checked="checked"<?php }?> /> SIP Pending Withdrawal<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="SIP Approved Withdrawal"<?php if(getPermissionCheck($conn,$fetche['username'],'SIP Approved Withdrawal')>0){?>checked="checked"<?php }?> /> SIP Approved Withdrawal<br>

<input type="checkbox" name="emp_name[]" id="emp_name" value="Grid View"<?php if(getPermissionCheck($conn,$fetche['username'],'Grid View')>0){?>checked="checked"<?php }?> /> Grid View<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Message"<?php if(getPermissionCheck($conn,$fetche['username'],'New Message')>0){?>checked="checked"<?php }?> /> New Message<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Message"<?php if(getPermissionCheck($conn,$fetche['username'],'View Message')>0){?>checked="checked"<?php }?> /> View Message<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Banner"<?php if(getPermissionCheck($conn,$fetche['username'],'New Banner')>0){?>checked="checked"<?php }?> /> New Banner<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Banner"<?php if(getPermissionCheck($conn,$fetche['username'],'View Banner')>0){?>checked="checked"<?php }?> /> View Banner<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="New Contact" <?php if(getPermissionCheck($conn,$fetche['username'],'New Contact')>0){?>checked="checked"<?php }?>/> New Contact<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Contact"<?php if(getPermissionCheck($conn,$fetche['username'],'View Contact')>0){?>checked="checked"<?php }?> /> View Contact<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Feedback"<?php if(getPermissionCheck($conn,$fetche['username'],'View Feedback')>0){?>checked="checked"<?php }?> /> View Feedback<br>

<input type="checkbox" name="emp_name[]" id="emp_name" value="New Subadmin" <?php if(getPermissionCheck($conn,$fetche['username'],'New Subadmin')>0){?>checked="checked"<?php }?>/> New Subadmin<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Subadmin"<?php if(getPermissionCheck($conn,$fetche['username'],'View Subadmin')>0){?>checked="checked"<?php }?> /> View Subadmin<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="New Permission" <?php if(getPermissionCheck($conn,$fetche['username'],'New Permission')>0){?>checked="checked"<?php }?>/> New Permission<br/>
<input type="checkbox" name="emp_name[]" id="emp_name" value="View Permission"<?php if(getPermissionCheck($conn,$fetche['username'],'View Permission')>0){?>checked="checked"<?php }?> /> View Permission<br/>

<input type="checkbox" name="emp_name[]" id="emp_name" value="View Support"<?php if(getPermissionCheck($conn,$fetche['username'],'View Support')>0){?>checked="checked"<?php }?> /> View Support<br />


</div>



</div>
<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Update
</button>
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

<?php }else{ ?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">




<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Permission</h4>
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

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>

<td align="center"><strong>Sl_No</strong></td>
<td align="center"><strong>Username</strong></td>
<td align="center"><strong>Modules</strong></td>
<td align="center"><strong>Action</strong></td>

 
</tr>
</thead>
<tbody>
<?php
$tname='ee_admin';
$lim=100;
$sql="SELECT DISTINCT(`username`) FROM `ee_permission`   ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$i=1;
while($fetch=fetcharray($res))
{
?>
<tr height="40">
<td align="center"><?=$i?></td>
<td align="center"><?=base64_decode(getUser($conn,$fetch['username'],'username'))?></td>
<td align="center">
<?php $sql1="SELECT * FROM `ee_permission` WHERE `username`='".$fetch['username']."' ";
$res1=query($conn,$sql1);
 $num1=numrows($res1);
if($num1>0)
{
while($fetch1=fetcharray($res1))
{?><?=$fetch1['modules']?>, <?php }}?></td>

<td align="center"><a href="permission.php?case=edit&id=<?=$fetch['username']?>" onclick="return confirm('Are you want to sure to edit this?')"><img src="images/edit.png" /></a>&nbsp;<a href="permission-process.php?case=delete&id=<?=$fetch['username']?>" onclick="return confirm('Are you want to sure to delete this?')"><img src="images/delete.png" /></a></td>



</tr>
<?php $i++;}}else{?>
<tr height="40"><td colspan="5" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
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
