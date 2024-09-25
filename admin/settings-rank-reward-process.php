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
$sql2="SELECT * FROM `ee_settings_rank_reward` WHERE `rank`='".mysqli_real_escape_string($conn,$_POST['rank'])."' ";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2<1)
{
$sql="INSERT INTO `ee_settings_rank_reward` (`rank`,`nodirect`,`ctoper`) VALUES('".trim($_POST['rank'])."','".trim($_POST['nodirect'])."','".trim($_POST['ctoper'])."')";
$res=query($conn,$sql);
redirect('settings-rank-reward.php?case=add&m=1');
}else{
redirect('settings-rank-reward.php?case=add&e=1');
}
}




if($_REQUEST['case']=='edit')
{

$sql1="UPDATE `ee_settings_rank_reward` SET `rank`='".mysqli_real_escape_string($conn,$_POST['rank'])."',`nodirect`='".mysqli_real_escape_string($conn,$_POST['nodirect'])."',`ctoper`='".mysqli_real_escape_string($conn,$_POST['ctoper'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('settings-rank-reward.php');
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_settings_rank_reward` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-rank-reward.php');
}
}
?> 