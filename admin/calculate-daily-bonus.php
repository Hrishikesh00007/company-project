<?php
$dailyper=getSettingsPackage($conn,$package,'dailyper');
$nodays=getSettingsPackage($conn,$package,'nodays');

$amount=getSettingsPackage($conn,$package,'amount');
if($amount>0)
{
$sql61="INSERT INTO `ee_member_daily` (`userid`,`package`,`amount`,`dailyper`,`nodays`,`status`,`date`) VALUES('".$userid."','".$package."','".$amount."','".$dailyper."','".$nodays."','R','".date('Y-m-d')."')";
$res61=query($conn,$sql61);
$memdailyid=mysqli_insert_id($conn);
}
//----------------------------------------------------------//
if($memdailyid)
{
$date=strtotime(date("Y-m-d"));


$bonus=($amount*$dailyper)/100;

if($nodays>0)
{
for($i=1;$i<=$nodays;$i++)
{
$stdate1=date('Y-m-d',strtotime('+'.$i.' days',$date));

$sql7="INSERT INTO `ee_commission_daily` (`userid`,`memdailyid`,`amount`,`dailyper`,`bonus`,`status`,`date`) VALUES('".$userid."','".$memdailyid."','".$amount."','".$dailyper."','".$bonus."','H','".$stdate1."')";
$res7=query($conn,$sql7);
}
}
}
//----------------------------------------------------------------------------//









?>