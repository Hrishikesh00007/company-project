<?php
$sqlc="SELECT * FROM `ee_member` WHERE `renewalstatus`='A'";
$resc=query($conn,$sqlc);
$numc=numrows($resc);
if($numc>0)
{
while($fetchc=fetcharray($resc))
{
$userid1=$fetchc['userid'];
$expire=$fetchc['expire'];
$date=date('Y-m-d');
if($date>=$expire){
$sqld="UPDATE `ee_member` SET `renewalstatus`='I' WHERE `userid`='".$userid1."' AND `renewalstatus`='A'";
$resd=query($conn,$sqld);
}
}
}
?>