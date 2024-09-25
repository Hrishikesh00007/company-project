<?php

//------------------------- Level Bonus-----------------------//
function getLevelCalculation($conn,$userid,$k,$amount,$fromid)
{
if($k<=10) 
{
$sponsor1=getMemberUserID($conn,$userid,'sponsor');
if($sponsor1)
{
$level='Level '.$k;
$bonusper=getSettingsLevel($conn,$level,'bonusper');
$bonus=($amount*$bonusper)/100;
if($bonus>0)
{
$nodirect=getSettingsLevel($conn,$level,'nodirect');
$nosponsor=getNoOfSponsor($conn,$sponsor1);

if($nosponsor>=$nodirect)
{

$sqle="INSERT INTO `ee_commission_level`(`userid`,`fromid`,`level`,`amount`,`bonusper`,`bonus`,`date`) VALUES('".$sponsor1."','".$fromid."','".$level."','".$amount."','".$bonusper."','".$bonus."','".date('Y-m-d')."')";
$rese=query($conn,$sqle);
}
}
}

$k=$k+1;
getLevelCalculation($conn,$sponsor1,$k,$amount,$fromid);
}
}

$k=1;
getLevelCalculation($conn,$userid,$k,$amount,$userid);
?>