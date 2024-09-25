<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_member_payment` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('payment-request.php');
}

if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='C'){$st='P';}else{$st='C';}

$sql="UPDATE `ee_member_payment` SET `status`='".$st."',`approved`='".date('Y-m-d')."' WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('payment-request.php');
}
}
?>