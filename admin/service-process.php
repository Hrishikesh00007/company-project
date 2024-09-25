<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_REQUEST['case']=='add')
{
/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="service/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}
/*-----------------------END OF file CODE-----------*/


$sql="INSERT INTO `ee_service` (`service`,`formurl`,`fees`,`cashback`,`image`,`description`,`date`) VALUES('".trim($_POST['service'])."','".trim($_POST['formurl'])."','".trim($_POST['fees'])."','".trim($_POST['cashback'])."','".$path."','".trim($_POST['description'])."','".date('Y-m-d')."')";
$res=query($conn,$sql);
redirect('service.php?case=add&m=1');
}

if($_REQUEST['case']=='edit')
{

/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="service/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);

move_uploaded_file($_FILES['file']['tmp_name'], $target);

$sql1="UPDATE `ee_service` SET `service`='".trim($_POST['service'])."',`formurl`='".trim($_POST['formurl'])."',`fees`='".trim($_POST['fees'])."',`cashback`='".trim($_POST['cashback'])."',`image`='".$path."',`description`='".trim($_POST['description'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);
}
}
}else{
$sql2="UPDATE `ee_service` SET `service`='".trim($_POST['service'])."',`formurl`='".trim($_POST['formurl'])."',`fees`='".trim($_POST['fees'])."',`cashback`='".trim($_POST['cashback'])."',`description`='".trim($_POST['description'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2);

}
/*-----------------------END OF file CODE-----------*/
redirect('service.php');
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `ee_service` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
redirect('service.php');
}



?> 