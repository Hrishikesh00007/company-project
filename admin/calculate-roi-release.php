<?php

$sqla="SELECT * FROM `ee_commission_matching` WHERE `status`='H' AND `date`<='".date('Y-m-d')."'";
$resa=query($conn,$sqla);
$numa=numrows($resa);
if($numa>0)
{
while($fetcha=fetcharray($resa))
{
$sqlb="UPDATE `ee_commission_matching` SET `status`='R' WHERE `id`='".$fetcha['id']."'";
$resb=query($conn,$sqlb);
}
}

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