<?php
$sqlc="SELECT * FROM `ee_commission_daily` WHERE `status`='H' AND `date`<='".date('Y-m-d')."'";
$resc=query($conn,$sqlc);
$numc=numrows($resc);
if($numc>0)
{
while($fetchc=fetcharray($resc))
{
$sqld="UPDATE `ee_commission_daily` SET `status`='R' WHERE `id`='".$fetchc['id']."'";
$resd=query($conn,$sqld);
}
}
?>