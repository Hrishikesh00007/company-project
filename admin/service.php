<?php include('header.php');
$left=54;
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
<h4 class="card-title" id="basic-layout-colored-form-control">Add Service</h4>
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

<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC00; padding-bottom:8px;">Service Added Successfully</p><?php }?>

<form class="form" action="service-process.php?case=add" method="post" enctype="multipart/form-data">
<div class="form-body">


<div class="form-group">
<label for="userinput5">Service<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Service" required id="service" name="service"/>
</div>
<div class="form-group">
<label for="userinput5">Form URL<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter URL" required id="formurl" name="formurl"/>
</div>
<div class="form-group">
<label for="userinput5">Fees<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Fees" required id="fees" name="fees"/>
</div>
<div class="form-group">
<label for="userinput5">Cashback<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Cashback" required id="cashback" name="cashback"/>
</div>

<div class="form-group">
<label for="userinput5">Image<span style="color:#FF0000;">*</span></label>
<input  type="file" placeholder="Upload Image" id="file" name="file" value="" accept=".jpg,.png,.jpeg,.pjp" required />
</div>

<div class="form-group">
<label for="userinput5">Description<span style="color:#CC0000;">*</span></label>
<textarea class="form-control border-primary" placeholder="Enter Description" required id="description" name="description"></textarea>
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
<?php } else if($_REQUEST['case']=='edit'){
$sql="SELECT * FROM `ee_service` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Edit Service</h4>
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


<?php if($_REQUEST['e']=='1'){?><p align="center" style=" color:#FF0000;">Already Exists!</p><?php }?>
<?php if($_REQUEST['m']=='2'){?><p align="center" style=" color:#00CC33;">Updated Successfully !</p><?php }?>


<form class="form" action="service-process.php?case=edit&id=<?=$_REQUEST['id']?>" method="post" enctype="multipart/form-data">
<div class="form-body">


<div class="form-group">
<label for="userinput5">Service<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Service" required id="service" name="service"
value='<?=stripslashes($fetch['service'])?>' />
</div>

<div class="form-group">
<label for="userinput5">Form URL<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter URL" required id="formurl" name="formurl"
value='<?=stripslashes($fetch['formurl'])?>' />
</div>

<div class="form-group">
<label for="userinput5">Fees<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Fees" required id="fees" name="fees"
value='<?=stripslashes($fetch['fees'])?>' />
</div>

<div class="form-group">
<label for="userinput5">Cashback<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Fees" required id="Cashback" name="cashback"
value='<?=stripslashes($fetch['cashback'])?>' />
</div>


<div class="form-group">
<label for="userinput5"></label>
<img src="service/<?=$fetch['image']?>" height="120" width="180">
</div>

<div class="form-group">
<label for="userinput5">Image<span style="color:#FF0000;">*</span></label>
<input type="file" placeholder="Upload image" id="file" name="file" value="" accept=".jpg,.png,.jpeg,.pjp">
</div>


<div class="form-group">
<label for="userinput5">Description<span style="color:#CC0000;">*</span></label>
<textarea class="form-control border-primary" type="text" placeholder="Enter Description" required id="description" name="description"><?=stripslashes($fetch['description'])?></textarea>
</div>

</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>UPDATE</button>
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
<?php }?>
<?php } else{ ?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Service</h4>
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
<th style="text-align:center;">Sl_No.</th>
<th style="text-align:center;">Service</th>

<th style="text-align:center;">Form_URL</th>
<th style="text-align:center;">Fees</th>
<th style="text-align:center;">Cashback</th>
<th style="text-align:center;">Image</th>
<th style="text-align:center;">Description</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_service';
$lim=100;
$tpage='service.php';
$where="ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center"><?=$i?></td>


<td align="center" style="padding:2px;"><?=ucwords(output($fetch['service']))?></td>
<td align="center" style="padding:2px;"><?=ucwords(output($fetch['formurl']))?></td>
<td align="center" style="padding:2px;"><?=ucwords(output($fetch['fees']))?></td>
<td align="center" style="padding:2px;"><?=ucwords(output($fetch['cashback']))?></td>



<td align="center"><img src="service/<?=output($fetch['image'])?>" height="90" width="150" title="Service" /></td>


<td align="center" style="padding:2px;"><?=$fetch['description']?></td>

<td align="center" style="padding:5px;"><?=getDateConvert($fetch['date'])?></td>




<td align="center">
<a href="service.php?case=edit&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to Edit?');"><img src="images/edit.png" /></a>&nbsp;<a href="service-process.php?case=delete&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to delete?');"><img src="images/delete.png" /></a>
</td>


</tr>
<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>