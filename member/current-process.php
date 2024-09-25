<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if(trim($_POST['amount'])>0)
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$avawallet=getAvailableWallet($conn,$userid);

if($avawallet>=trim($_POST['amount']))
{
$minimum=getSettingsTransfer($conn,'minimum');
$chper=getSettingsTransfer($conn,'charge');
if(trim($_POST['amount'])>=$minimum)
{
$amount=trim($_POST['amount']);
$charge=($amount*$chper)/100;
$fund=$amount-$charge;

$sql="INSERT INTO `ee_transfer_current_fund`(`userid`,`current`,`charge`,`fund`,`remarks`,`date`) values('".$userid."','".$amount."','".$charge."','".$fund."','".trim(addslashes($_POST['remarks']))."','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('current.php?m=1&page='.$_REQUEST['page']);
}else{
redirect('current.php?e=6&page='.$_REQUEST['page']);
}
}else{
redirect('current.php?e=2&page='.$_REQUEST['page']);
}
}else{
redirect('current.php?e=3&page='.$_REQUEST['page']);
}

}
?> 