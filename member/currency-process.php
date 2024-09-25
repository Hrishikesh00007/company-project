<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if($_REQUEST['case']=='wallet')
{
$bitcoin=getSettingsWallet($conn,'bitcoin');
$etherium=getSettingsWallet($conn,'etherium');
$litecoin=getSettingsWallet($conn,'litecoin');
$usdt=getSettingsWallet($conn,'usdt');
$perfectmoney=getSettingsWallet($conn,'perfectmoney');
$payeer=getSettingsWallet($conn,'payeer');


if ($_POST['type']=='bitcoin')
{
$sql="INSERT INTO `ee_member_payment`(`userid`,`currency`,`wallet`,`tranid`,`amount`,`slip`,`convertamt`,`status`,`date`) values('".getMember($conn,$_SESSION['mid'],'userid')."','".$_POST['type']."','".$bitcoin."','','".mysqli_real_escape_string($conn,trim($_POST['amount']))."','','','P','')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
redirect('payment.php?case=add&e=1&type='.$bitcoin.'&id='.$id);
}

if ($_POST['type']=='etherium')
{
$sql="INSERT INTO `ee_member_payment`(`userid`,`currency`,`wallet`,`tranid`,`amount`,`slip`,`status`,`date`,`convertamt`) values('".getMember($conn,$_SESSION['mid'],'userid')."','".$_POST['type']."','".$etherium."','','".mysqli_real_escape_string($conn,trim($_POST['amount']))."','','P','','')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
redirect('payment.php?case=add&e=2&type='.$etherium.'&id='.$id);

}

if ($_POST['type']=='litecoin')
{
$sql="INSERT INTO `ee_member_payment`(`userid`,`currency`,`wallet`,`tranid`,`amount`,`slip`,`status`,`date`,`convertamt`) values('".getMember($conn,$_SESSION['mid'],'userid')."','".$_POST['type']."','".$litecoin."','','".mysqli_real_escape_string($conn,trim($_POST['amount']))."','','P','','')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
redirect('payment.php?case=add&e=3&type='.$litecoin.'&id='.$id);
}

if ($_POST['type']=='usdt')
{
$sql="INSERT INTO `ee_member_payment`(`userid`,`currency`,`wallet`,`tranid`,`amount`,`slip`,`status`,`date`,`convertamt`) values('".getMember($conn,$_SESSION['mid'],'userid')."','".$_POST['type']."','".$usdt."','','".mysqli_real_escape_string($conn,trim($_POST['amount']))."','','P','','')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
redirect('payment.php?case=add&e=4&type='.$usdt.'&id='.$id);
}

if ($_POST['type']=='perfectmoney')
{
$sql="INSERT INTO `ee_member_payment`(`userid`,`currency`,`wallet`,`tranid`,`amount`,`slip`,`status`,`date`,`convertamt`) values('".getMember($conn,$_SESSION['mid'],'userid')."','".$_POST['type']."','".$perfectmoney."','','".mysqli_real_escape_string($conn,trim($_POST['amount']))."','','P','','')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
redirect('payment.php?case=add&e=5&type='.$perfectmoney.'&id='.$id);
}

if ($_POST['type']=='payeer')
{
$sql="INSERT INTO `ee_member_payment`(`userid`,`currency`,`wallet`,`tranid`,`amount`,`slip`,`status`,`date`,`convertamt`) values('".getMember($conn,$_SESSION['mid'],'userid')."','".$_POST['type']."','".$payeer."','','".mysqli_real_escape_string($conn,trim($_POST['amount']))."','','P','','')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
redirect('payment.php?case=add&e=6&type='.$payeer.'&id='.$id);
}

}
}
?>