<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if($_REQUEST['case']=='add')
{
if($_POST['amount']>0)
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$avabal=getAvailableWallet($conn,$userid);
if($avabal>=trim($_POST['amount']))
{
$min=getSettingsWithdrawal($conn,'minimum');
$amt=trim($_POST['amount']);
if($amt>=$min)
{
$tds=getSettingsWithdrawal($conn,'tds');
$tdsamt=($_POST['amount']*$tds)/100;
$chargeper=getSettingsWithdrawal($conn,'service');
$adminamt=($_POST['amount']*$chargeper)/100;
$payout=($_POST['amount']-($tdsamt+$adminamt));


$sql1="INSERT INTO `ee_withdrawal` (`userid`,`request`,`service`,`payout`,`bname`,`accname`,`accno`,`ifscode`,`date`,`status`,`approved`,`upiid`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,trim($_POST['amount']))."','".$adminamt."','".$payout."','".getMember($conn,$_SESSION['mid'],'bname')."','".getMember($conn,$_SESSION['mid'],'accname')."','".getMember($conn,$_SESSION['mid'],'accno')."','".getMember($conn,$_SESSION['mid'],'ifscode')."','".date('Y-m-d')."','P','','".getMember($conn,$_SESSION['mid'],'upiid')."')";
$res1=query($conn,$sql1);


redirect('withdrawal.php?case=add&p=1');
}else{
redirect('withdrawal.php?case=add&e=1');
}
}else{
redirect('withdrawal.php?case=add&e=2');
}
}else{
redirect('withdrawal.php?case=add&e=3');
}
//--------------------------------------//
}
}
?> 