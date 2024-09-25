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
$sql2="SELECT * FROM `ee_settings_cashback_level` WHERE `level`='".mysqli_real_escape_string($conn,$_POST['level'])."' ";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2<1)
{
$sql="INSERT INTO `ee_settings_cashback_level` (`level`,`bonusper`,`nodirect`) VALUES('".trim($_POST['level'])."','".trim($_POST['bonusper'])."','".trim($_POST['nodirect'])."')";
$res=query($conn,$sql);

redirect('settings-cashback-level.php?case=add&m=1');
}else{
redirect('settings-cashback-level.php?case=add&e=1');
}
}

if($_REQUEST['case']=='edit')
{
$sql2="SELECT * FROM `ee_settings_cashback_level` WHERE `level`='".$_REQUEST['level']."' AND  `id`!='".$_REQUEST['id']."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
redirect('settings-cashback-level.php?case=edit&m=1&id='.$_REQUEST['id']);
}else{
$sql1="UPDATE `ee_settings_cashback_level` SET `level`='".mysqli_real_escape_string($conn,$_POST['level'])."',`bonusper`='".mysqli_real_escape_string($conn,$_POST['bonusper'])."',`nodirect`='".mysqli_real_escape_string($conn,$_POST['nodirect'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

}
redirect('settings-cashback-level.php');
}





if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_settings_cashback_level` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-cashback-level.php');
}
}

?> 