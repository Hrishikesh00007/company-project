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
if($userid!=trim($_POST['userid']))
{
$avafund=getFundWallet($conn,$userid);

$minimum=getSettingsTransfer($conn,'minimum');
if(trim($_POST['amount'])>=$minimum)
{
$sql1="SELECT * FROM `ee_member` WHERE `userid`='".trim($_POST['userid'])."' AND `status`='A'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{

if($avafund>=trim($_POST['amount']))
{


$sql1="INSERT INTO `ee_transfer_fund_others`(`userid`,`toid`,`fund`,`remarks`,`date`) VALUES('".$userid."','".trim($_POST['userid'])."','".trim($_POST['amount'])."','".trim(addslashes($_POST['remarks']))."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);


redirect('fund.php?s=1&page='.$_REQUEST['page']);

}else{
redirect('fund.php?s=6&page='.$_REQUEST['page']);
}

}else{
redirect('fund.php?s=5&page='.$_REQUEST['page']);
}
}else{
redirect('fund.php?s=2&page='.$_REQUEST['page']);
}

}else{
redirect('fund.php?s=3&page='.$_REQUEST['page']);
}

}else{
redirect('fund.php?s=7&page='.$_REQUEST['page']);
}


}
?> 