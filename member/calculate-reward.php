<?php
$date=date("Y-m-d");

if(date("d")=="01")
{
$month=date("m",strtotime($date));
$year=date("Y",strtotime($date));

$fromdate=getFirstDayWithMonth($conn,$month,$year);
$todate=getLastDayWithMonth($conn,$month,$year);


$sqldt="SELECT * FROM `ee_date_rank_reward` WHERE `fromdate`='".$fromdate."' AND `todate`='".$todate."'";
$resdt=query($conn,$sqldt);
$numdt=numrows($resdt);
if($numdt<1)
{

$totalcto=getTotalTopUpByDate($conn,$fromdate,$todate);
if($totalcto>0)
{


$sql24="SELECT * FROM `ee_member_rank_reward`";
$res24=query($conn,$sql24);
$num24=numrows($res24);
if($num24>0)
{

while($fetch24=fetcharray($res24))
{

$ctoper=$fetch24['ctoper'];

$amount=($totalcto*$ctoper)/100;

$rank=$fetch24['rank'];
$userid=$fetch24['userid'];

$nomem=getNoMemberRank($conn,$rank);

$bonus=($amount/$nomem);


if($bonus>0)
{
$sql34="INSERT INTO `ee_commission_rank_reward` (`userid`,`rankid`,`totalcto`,`ctoper`,`amount`,`noachiever`,`bonus`,`date`) VALUES ('".$fetch24['userid']."','".$fetch24['rankid']."','".$totalcto."','".$ctoper."','".$amount."','".$nomem."','".$bonus."','".date('Y-m-d')."')";
$res34=query($conn,$sql34);
}
}
$sql12="INSERT INTO `ee_date_rank_reward` (`fromdate`,`todate`,`date`) VALUES('".$fromdate."','".$todate."','".date('Y-m-d')."')";
$res12=query($conn,$sql12);
}

}
}
}
?>
