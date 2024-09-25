<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}



if($_SESSION['sid'])
{
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_member_service` WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);

redirect('service-request.php');
}

if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='P';}else{$st='A';}

$sql="UPDATE `ee_member_service` SET `status`='".$st."',`approved`='".date('Y-m-d')."' WHERE `id`='".trim(mysqli_real_escape_string($conn,$_REQUEST['id']))."'";
$res=query($conn,$sql);



$userid=$_REQUEST['userid'];
$amount=$_REQUEST['amount'];
$fees=getServiceFees($conn,$_REQUEST['serviceid'],'fees');
$id=$_REQUEST['id'];
$service=$_REQUEST['serviceid'];
$bonus=getServiceFees($conn,$_REQUEST['serviceid'],'cashback');

$sqll2="INSERT INTO `ee_commission_cashback` (`userid`,`memserviceid`,`serviceid`,`amount`,`bonus`,`date`) VALUES('".$userid."','".$id."','".$service."','".$amount."','".$bonus."','".date('Y-m-d')."')";
$resl2=query($conn,$sqll2);



//------------------------- Level Bonus-----------------------//


function getLevelCalculation($conn,$userid,$k,$bonus,$fromid,$id)
{

if($k<=10) 
{
$sponsor1=getMemberUserID($conn,$userid,'sponsor');
if($sponsor1)
{
$level='Level '.$k;
$bonusper1=getSettingsLevel($conn,$level,'bonusper');
$bonus1=($bonus*$bonusper1)/100;
if($bonus1>0)
{
$nodirect=getSettingsLevel($conn,$level,'nodirect');
$nosponsor=getNoOfSponsor($conn,$sponsor1);

if($nosponsor>=$nodirect)
{
$sqle="INSERT INTO `ee_commission_cashback_level`(`userid`,`fromid`,`level`,`memserviceid`,`cashback`,`bonusper`,`bonus`,`date`) VALUES('".$sponsor1."','".$fromid."','".$level."','".$id."','".$bonus."','".$bonusper1."','".$bonus1."','".date('Y-m-d')."')";
$rese=query($conn,$sqle);
}
}
}

$k=$k+1;
getLevelCalculation($conn,$sponsor1,$k,$bonus,$fromid,$id);
}
}

$k=1;
getLevelCalculation($conn,$userid,$k,$bonus,$userid,$id);


//------------------------- Level Bonus-----------------------//


redirect('service-request.php');
}
}
?>