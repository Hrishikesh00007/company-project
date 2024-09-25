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
$sql1="UPDATE `ee_settings_joining` SET `joining`='".trim($_POST['joining'])."',`directper`='".trim($_POST['directper'])."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('settings-joining.php');
}
}
?>