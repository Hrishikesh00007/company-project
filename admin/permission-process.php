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
$sql1="SELECT * FROM `ee_permission` WHERE `username`='".$_POST['username']."' AND `modules`='".trim($_POST['menu'])."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1<1)
{
for($i=0; $i<count($_POST['emp_name']);$i++)
{
$epinid=$_POST['emp_name'][$i];

$sql1="INSERT INTO `ee_permission` (`username`,`modules`,`date`) VALUES('".mysqli_real_escape_string($conn,trim($_POST['username']))."','".$epinid."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);

}
redirect('permission.php');
}
else
{
redirect('permission.php?case=add&e=1');
}
}

if($_REQUEST['case']=='edit')
{
$sql="DELETE FROM `ee_permission` WHERE `username`='".trim($_POST['username'])."'";
$res=query($conn,$sql);

for($i=0; $i<count($_POST['emp_name']);$i++)
{
$epinid=$_POST['emp_name'][$i];
$sql1="INSERT INTO `ee_permission` (`username`,`modules`,`date`) VALUES('".mysqli_real_escape_string($conn,trim($_POST['username']))."','".$epinid."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);
}

redirect('permission.php');
}



if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_permission` WHERE `username`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
redirect('permission.php');
}
}
?>