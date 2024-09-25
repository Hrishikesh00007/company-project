<?php
session_start();
include('../administrator/includes/function.php');

$userid=getMember($conn,$_SESSION['mid'],'userid');
$email=getMember($conn,$_SESSION['mid'],'email');
$name=getMember($conn,$_SESSION['mid'],'name');
$otp=rand(111111,999999);

$sqlc="SELECT * FROM `ee_member_otp` WHERE `userid`='".$userid."' AND `status`='P'";
$resc=query($conn,$sqlc);
$numc=numrows($resc);
if($numc>0)
{
$sql="UPDATE `ee_member_otp` SET `otp`='".$otp."' WHERE `userid`='".$userid."' AND `status`='P'";
$res=query($conn,$sql);
}else{
$sql="INSERT INTO `ee_member_otp`(`userid`,`otp`,`status`,`date`) VALUES('".$userid."','".$otp."','P','".date('Y-m-d')."')";
$res=query($conn,$sql);
}

//-------------------------email Code----------------------------//
if($email)
{
$headers="From: ".$welcome."\r\n";
$heade="MIME-Version: 1.0" . "\r\n";
$heade="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=$email;
$subject="Withdrawal OTP Request";

$message="Dear ".$name.", ".$otp." is OTP for withdrawal request. Do not share to any one. Visit us ".$domain." to login into your account. Thanks ".$title;

mail($to,$subject,$message,$headers);
}

echo 'OTP sent to registered email  '.$email;
?>