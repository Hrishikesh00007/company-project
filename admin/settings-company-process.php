<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='edit')
{
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="qrcode/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}

$sql1="UPDATE `ee_settings_company` SET  `qrcode`='".$path."',`bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`upiid`='".trim(mysqli_real_escape_string($conn,$_POST['upiid']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);
}else{

$sql1="UPDATE `ee_settings_company` SET  `bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`upiid`='".trim(mysqli_real_escape_string($conn,$_POST['upiid']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);
}




redirect('settings-company.php');
}
}
?>