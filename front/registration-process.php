<?php 
session_start();
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
//-----------------------------------------//
$sql="SELECT * FROM `ee_member` WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_POST['sponsor']))."' AND `status`='A' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$sqlp="SELECT * FROM `ee_member` WHERE `phone`='".trim($_POST['phone'])."' OR `email`='".trim($_POST['email'])."' ";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump<99)
{
$fetch=fetcharray($res);

$userid=$prefix.rand(1111111,9999999);
$sqlu="SELECT * FROM `ee_member` WHERE `userid`='".$userid."'";
$resu=query($conn,$sqlu);
$numu=numrows($resu);
if($numu<1)
{
$sql="INSERT INTO `ee_member` (`userid`,`sponsor`,`password`,`name`,`email`,`phone`,`address`,`bname`,`accname`,`accno`,`ifscode`,`status`,`paystatus`,`profile`,`date`,`approved`,`upiid`) VALUES('".$userid."','".trim($_POST['sponsor'])."','".base64_encode(trim($_POST['password']))."','".trim($_POST['name'])."','".trim($_POST['email'])."','".trim($_POST['phone'])."','".trim($_POST['address'])."','".trim($_POST['bname'])."','".trim($_POST['accname'])."','".trim($_POST['accno'])."','".trim($_POST['ifscode'])."','A','I','','".date('Y-m-d')."','','".trim($_POST['upiid'])."')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);
if($id)
{

/*---------------Downline Count-------------------*/
function getSponsorDownlineCount($conn,$sponsor,$userid)
{
$sqlq2="INSERT INTO `ee_team_downline`(`userid`,`fromid`,`paystatus`,`date`) VALUES('".$sponsor."','".$userid."','I','".date('Y-m-d')."')";
$resq2=query($conn,$sqlq2);

$upspon3=getMemberUserid($conn,$sponsor,'sponsor');
if($upspon3)
{
getSponsorDownlineCount($conn,$upspon3,$userid);
}
}

$sponsor=getMember($conn,$id,'sponsor');
if($sponsor)
{
getSponsorDownlineCount($conn,$sponsor,$userid);
}

/*---------------mail-------------------*/
if($_POST['email'])
{
$headers="From:".$support."\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);
$subject="Welcome to ".$title.". Your registration is successfully completed!";

$message="Dear ".trim($_POST['name'])." ,<br/> Welcome to ".$title.". <br/>User ID: ".$userid." <br/>Password: ".trim($_POST['password'])." <br/>Visit us ".$title.". to login into your account. <br/><br/>Thanks & Regards<br/>".$title.".";

//mail($to,$subject,$message,$headers);
}
/*---------------mail-------------------*/
}
if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&msg=4&id='.$id);
}else{
redirect('registration.php?intr='.trim($_POST['sponsor']).'&msg=4&id='.$id);
}

}else{

if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&f=4');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&f=4');
}
}
}else
{
if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&p=2');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&p=2');
}
}
}else{
if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&q=4');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&q=4');
}
}
}
?>