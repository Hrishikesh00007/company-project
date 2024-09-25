<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='add')
{
$userid=$prefix.rand(1111111,9999999);


$sql="INSERT INTO `ee_member` (`userid`,`sponsor`,`password`,`name`,`email`,`phone`,`address`,`bname`,`accname`,`accno`,`ifscode`,`status`,`paystatus`,`profile`,`date`,`approved`,`upiid`) VALUES('".$userid."','','".base64_encode(trim($_POST['password']))."','".trim($_POST['name'])."','".trim($_POST['email'])."','".trim($_POST['phone'])."','".trim($_POST['address'])."','".trim($_POST['bname'])."','".trim($_POST['accname'])."','".trim($_POST['accno'])."','".trim($_POST['ifscode'])."','A','A','','".date('Y-m-d')."','".date('Y-m-d')."','".trim($_POST['upiid'])."')";
$res=query($conn,$sql);


//----------------Daily Bonus------------//


$sqlg="INSERT INTO `ee_genealogy` (`userid`,`placement`,`position`,`date`) VALUES('".$userid."','','','".date('Y-m-d')."')";
$resg=query($conn,$sqlg);

$sqlh="INSERT INTO `ee_member_count`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$resh=query($conn,$sqlh);

$sqli="INSERT INTO `ee_member_sales`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$resi=query($conn,$sqli);

$sqlj="INSERT INTO `ee_member_sales_count`(`userid`,`left`,`right`) VALUES('".$userid."','0','0')";
$resj=query($conn,$sqlj);

redirect('member.php');
}

if($_REQUEST['case']=='edit')
{
$sql3="UPDATE `ee_member` SET `name`='".mysqli_real_escape_string($conn,$_POST['name'])."',`email`='".mysqli_real_escape_string($conn,$_POST['email'])."',`phone`='".mysqli_real_escape_string($conn,$_POST['phone'])."',`password`='".base64_encode(mysqli_real_escape_string($conn,$_POST['password']))."',`address`='".mysqli_real_escape_string($conn,$_POST['address'])."',`bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."',`upiid`='".trim(mysqli_real_escape_string($conn,$_POST['upiid']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res3=query($conn,$sql3);

redirect('member.php');
}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_member` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('member.php');
}
}
?>