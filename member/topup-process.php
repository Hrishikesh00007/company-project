<?php
session_start();
include ('../administrator/includes/function.php');
if (!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=trim($_POST['userid']);
$loginuser=getMember($conn,$_SESSION['mid'],'userid');

$sql="SELECT * FROM `ee_member` WHERE `userid`= '".trim($_POST['userid'])."' AND `paystatus`='I'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{

if($loginuser!=$userid)
{

$available=getFundWallet($conn,$loginuser);
$amount=getSettingsJoining($conn,'joining');

if($available>=$amount)

{
if($amount>0)
{
$sql1 = "UPDATE `ee_member` SET `paystatus`='A',`approved`='".date('Y-m-d')."' WHERE `userid`='".$userid."'";
$res1 = query($conn, $sql1);


$sqld1="UPDATE `ee_team_downline` SET `paystatus`='A' WHERE `fromid`='".$userid."'";
$resd1=query($conn,$sqld1);


$sqlb="INSERT INTO `ee_member_topup` (`userid`,`topupid`,`amount`,`date`) VALUES ('".$loginuser."','".$userid."','".$amount."','".date('Y-m-d')."')";
$resb=query($conn,$sqlb);






//-----------------Placement Logic--------------------------//


//-------------------------Count Calculation----------------//

//------------------------END-----------------------//


//------------------Direct Bonus--------------------//

$sponsor=getMemberUserID($conn,$userid,'sponsor');
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


//------------------Matching Bonus-----------//
//include('calculate-matching-bonus.php');
//-------------------------------------------//

//------------------Level Bonus-------------------//
include('calculate-level-bonus.php');
//-------------------------------------------//


redirect('topup.php?case=check&m=1');
}else{
redirect('topup.php?g=1&case=add&check=correct&userid='.trim(($_POST['userid'])));
}
}else{
redirect('topup.php?e=1&case=add&check=correct&userid='.trim(($_POST['userid'])));
}
}else{
redirect('topup.php?case=check&e=2');
}
}else{
redirect('topup.php?case=check&e=4');
}
}
?>
