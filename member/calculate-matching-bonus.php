<?php
$sqlpc="SELECT * FROM `ee_member_sales_count` WHERE `left`>0 AND `right`>0";
$respc=query($conn,$sqlpc);
$numpc=numrows($respc);
if($numpc>0)
{
while($fetchpc=fetcharray($respc))
{
$leftc=$fetchpc['left'];
$rightc=$fetchpc['right'];
$userc=$fetchpc['userid'];


$leftmem=getDownlineCount($conn,$userc,'left');
$rightmem=getDownlineCount($conn,$userc,'right');
if($leftc>0 && $rightc>0)
{
if(($leftmem>1 && $rightmem>0) || ($leftmem>0 && $rightmem>1) )
{
//-----------------------------//
$minimum=min($leftc,$rightc);
$packid=getLatestPackage($conn,$userc,'package');
$matchingper=getSettingsPackage($conn,$packid,'matchingper');
$capping=getSettingsPackage($conn,$packid,'dailycapping');


$bonus=($minimum*$matchingper)/100;

$ptoday=getTotalPairToday($conn,$userc,date('Y-m-d'));

if($ptoday<$capping)
{
$remain=$capping-$ptoday;
if($bonus<=$remain)
{
$paybonus=$bonus;
}else{
if($bonus>$remain)
{
$paybonus=$remain;        
}else{
$paybonus=$bonus;
}
}
}else{
$paybonus=0;
}

if($paybonus>0)
{
$sqlcm="INSERT INTO `ee_commission_matching`(`userid`,`leftsales`,`rightsales`,`minimum`,`matchingper`,`bonus`,`date`) VALUES('".$userc."','".$leftc."','".$rightc."','".$minimum."','".$matchingper."','".$paybonus."','".date('Y-m-d')."')";
$rescm=query($conn,$sqlcm);

$sqlch="SELECT * FROM `ee_commission_matching` WHERE `userid`='".$userc."'";
$resch=query($conn,$sqlch);
$numch=numrows($resch);
if($numch<=1)
{
if($leftc>$rightc)
{
$remleft=$leftc-($minimum*2);
$remright=$rightc-$minimum;
}
else if($leftc<$rightc)
{
$remleft=$leftc-$minimum;
$remright=$rightc-($minimum*2);
}
else{
$remleft=$leftc-$minimum;
$remright=$rightc-$minimum;
}
}else{
$remleft=$leftc-$minimum;
$remright=$rightc-$minimum;
}

$sqls9="UPDATE `ee_member_sales_count` SET `left`='".$remleft."',`right`='".$remright."' WHERE `userid`='".$userc."'";
$ress9=query($conn,$sqls9); 
}

}
}

}
}
?>