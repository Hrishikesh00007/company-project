<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$amount=$_REQUEST['amount'];
$serviceid=$_REQUEST['serviceid'];
$cashback=$_REQUEST['cashback'];

$fund=getFundWallet($conn,$userid);

if($fund>=$amount)
{
$sql="INSERT INTO `ee_member_service`(`userid`,`amount`,`serviceid`,`status`,`date`) values('".$userid."','".$amount."','".$serviceid."','P','".date('Y-m-d')."')";
$res=query($conn,$sql);
redirect('dashboard.php?w=4');

}else{
redirect('dashboard.php?q=2');

}




}
?> 