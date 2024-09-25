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
$sql="SELECT * FROM `ee_admin` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_SESSION['sid']))."' AND `password`='".trim(base64_encode(mysqli_real_escape_string($conn,$_POST['current'])))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
if(trim($_POST['newpass'])==trim($_POST['conpass']))
{
$sql="UPDATE `ee_admin` SET `password`='".trim(base64_encode(mysqli_real_escape_string($conn,$_POST['conpass'])))."' WHERE `id`='".trim(mysqli_real_escape_string($conn,$_SESSION['sid']))."'";
$res=query($conn,$sql);

redirect('change-password.php?n=2');
}else{
redirect('change-password.php?p=3');
}
}else{
redirect('change-password.php?m=1');
}
}
}
?>