<?php
$sponsor=getMemberUserid($conn,$userid,'sponsor');

if($sponsor)
{
$left=getSales($conn,$sponsor,'left');
$right=getSales($conn,$sponsor,'right');

$sql="SELECT * FROM `ee_settings_matching_reward` WHERE `leftsales`<='".$left."' AND `rightsales`<='".$right."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
$leftsales=$fetch['leftsales'];
$rightsales=$fetch['rightsales'];
$bonus=$fetch['bonus'];
$gift=$fetch['gift'];

$sql2="SELECT * FROM `ee_member_matching_reward` WHERE `userid`='".$sponsor."' AND `rewardid`='".$fetch['id']."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2<1)
{
$sql3="INSERT INTO `ee_member_matching_reward` (`userid`,`rewardid`,`leftsales`,`rightsales`,`bonus`,`gift`,`date`) VALUES('".$sponsor."','".$fetch['id']."','".$fetch['leftsales']."','".$fetch['rightsales']."','".$bonus."','".$gift."','".date('Y-m-d')."')";
$res3=query($conn,$sql3);

$sql1="INSERT INTO `ee_commission_matching_reward` (`userid`,`rewardid`,`bonus`,`date`) VALUES('".$sponsor."','".$fetch['id']."','".$bonus."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);
}
}
}
}
?>