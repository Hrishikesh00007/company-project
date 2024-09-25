<?php
/*------------------------Matching--------------------------------------*/
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
if($leftmem>0 && $rightmem>0)
{
$nodays=getSettingsMatching($conn,'nodays');
if($nodays>0)
{
$minimum=min($leftc,$rightc);
$matchingper=getSettingsMatching($conn,'matchingper');
$matchingamt=($minimum*$matchingper)/100; 
$dailyper=getSettingsMatching($conn,'dailyper');
$paybonus=($matchingamt*$dailyper)/100;
if($paybonus>0)
{
$remleft=$leftc-$minimum;
$remright=$rightc-$minimum;

$sqlcm="INSERT INTO `ee_member_matching`(`userid`,`leftsales`,`rightsales`,`minimum`,`matchingper`,`leftcarry`,`rightcarry`,`bonus`,`dailybonus`,`nodays`,`date`) VALUES ('".$userc."','".$leftc."','".$rightc."','".$minimum."','".$matchingper."','".$remleft."','".$remright."','".$matchingamt."','".$paybonus."','".$nodays."','".date('Y-m-d')."')";
$rescm=query($conn,$sqlcm);
$matchingid=mysqli_insert_id($conn);

$date=strtotime(date("Y-m-d"));
$stdate=date('Y-m-d',strtotime('+0 days',$date));

for($i=0;$i<$nodays;$i++)
{
$stdate1=date('Y-m-d',strtotime('+'.$i.' days',strtotime($stdate)));

$sqlf="INSERT INTO `ee_commission_matching` (`userid`,`matchingid`,`bonus`,`status`,`date`) VALUES('".$userc."','".$matchingid."','".$paybonus."','H','".$stdate1."')";
$resf=query($conn,$sqlf);
}

$sqls9="UPDATE `ee_member_sales_count` SET `right`='".$remright."',`left`='".$remleft."' WHERE `userid`='".$userc."'";
$ress9=query($conn,$sqls9);
}
}
}
}
}
}


?>


