<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='add')
{
$sql="SELECT * FROM `ee_admin` WHERE `username`='".base64_encode($_POST['username'])."' OR `phone`='".mysqli_real_escape_string($conn,$_POST['phone'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num<1)
{

$sql1="INSERT INTO `ee_admin` (`username`,`password`,`phone`,`role`) VALUES('".base64_encode($_POST['username'])."','".base64_encode($_POST['password'])."','".mysqli_real_escape_string($conn,$_POST['phone'])."','S')";
$res1=query($conn,$sql1);
redirect('subadmin.php?case=add&m=2');
}
else
{
redirect('subadmin.php?case=add&e=1');
}

}


if($_REQUEST['case']=='edit')
{
$sql="SELECT * FROM `ee_admin` WHERE (`username`='".base64_encode($_POST['username'])."' OR `phone`='".mysqli_real_escape_string($conn,$_POST['phone'])."') AND `id`!='".$_REQUEST['id']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num<1)
{

$sql1="UPDATE `ee_admin` SET `username`='".base64_encode($_POST['username'])."',`password`='".base64_encode($_POST['password'])."',`phone`='".mysqli_real_escape_string($conn,$_POST['phone'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);
redirect('subadmin.php??case=edit&m=1');
}
else
{
redirect('subadmin.php?case=edit&p=1');
}

}


if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql="UPDATE `ee_admin` SET `status`='".$st."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('subadmin.php?page='.$_REQUEST['page']);
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_admin` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);
redirect('subadmin.php');
}
}
?>