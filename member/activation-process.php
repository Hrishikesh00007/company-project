<?php
session_start();
include ('../administrator/includes/function.php');

if (!isset($_SESSION['mid']))
{ 
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
$amount=getSettingsJoining($conn,'joining');
$avawallet=getFundWallet($conn,$userid);

if($avawallet>=$amount)
{
if($amount>0)
{
$sql1 = "UPDATE `ee_member` SET `paystatus`='A',`approved`='".date('Y-m-d')."' WHERE `id`='" . trim(mysqli_real_escape_string($conn, $_SESSION['mid'])) . "'";
$res1 = query($conn, $sql1);

$sql6="UPDATE `ee_team_downline` SET `paystatus`='A' WHERE `fromid`='".trim($userid)."'";
$res6=query($conn,$sql6);


$sqlb="INSERT INTO `ee_member_topup` (`userid`,`topupid`,`amount`,`date`) VALUES ('".$userid."','".$userid."','".$amount."','".date('Y-m-d')."')";
$resb=query($conn,$sqlb);


//------------------Direct Bonus--------------------//

$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
if($sponsor)
{
$directper=getSettingsJoining($conn,'directper');

$bonus1=($amount*$directper)/100;

if($bonus1>0)
{
$sqld="INSERT INTO `ee_commission_direct` (`userid`,`fromid`,`amount`,`directper`,`bonus`,`date`) VALUES ('".$sponsor."','".$userid."','".$amount."','".$directper."','".$bonus1."','".date('Y-m-d')."')";
$res10=query($conn,$sqld);
}
}

$nodirect=getNoSponsorDirect($conn,$sponsor);
$sql="SELECT * FROM `ee_settings_rank_reward` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetcht=fetcharray($res))
{
$norankdirect=$fetcht['nodirect'];
$rank=$fetcht['rank'];

if($nodirect>=$norankdirect)
{
$sqlw="SELECT * FROM `ee_member_rank_reward` WHERE `userid`='".$sponsor."' AND `rankid`='".$fetcht['id']."'";
$resw=query($conn,$sqlw);
$numw=numrows($resw);
if($numw<1)
{
$sqld3="INSERT INTO `ee_member_rank_reward` (`userid`,`rankid`,`rank`,`nodirect`,`ctoper`,`date`) VALUES ('".$sponsor."','".$fetcht['id']."','".$fetcht['rank']."','".$fetcht['nodirect']."','".$fetcht['ctoper']."','".date('Y-m-d')."')";
$res103=query($conn,$sqld3);
}
}
}
}


//------------------Level Bonus-------------------//
include('calculate-level-bonus.php');
//-------------------------------------------//

redirect('dashboard.php?m=1');
}else{
redirect('activation.php?g=1');
}
}else{
redirect('activation.php?e=1');
}
}

?>