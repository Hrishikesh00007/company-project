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
$sql1="UPDATE `ee_settings_transfer` SET `minimum`='".trim($_POST['minimum'])."',`charge`='".trim($_POST['charge'])."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('settings-transfer.php');
}
}
?>