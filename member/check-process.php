<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$sql="SELECT * FROM `ee_member` WHERE `userid`= '".trim($_POST['userid'])."' AND `paystatus`='I'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('topup.php?case=add&userid='.trim($_POST['userid']));
}
else{
redirect('topup.php?case=check&e=2');
}
}
?>