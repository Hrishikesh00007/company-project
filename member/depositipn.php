<?php
include('../administrator/includes/function.php');
// Get From DataBase
$cp_merchant_id = '5f3c83bc21b1f1c3b7ef4abbdd5e091c'; // Get from database
$cp_ipn_secret  = 'Imran200418';  // Get from database

//-----------------------------------------//

if(isset($_SERVER['HTTP_HMAC']) && !empty($_SERVER['HTTP_HMAC'])) {

$request = file_get_contents('php://input');
if($request !== FALSE && !empty($request)) {
if(isset($_REQUEST['merchant']) && $_REQUEST['merchant'] == trim($cp_merchant_id)) {

$hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret));
if($hmac == $_SERVER['HTTP_HMAC']){
$auth_ok = true;
}else{
$error_msg = 'HMAC signature does not match';
//$this->error_msg_insert($error_msg);
}

}else{
$error_msg = 'No or incorrect Merchant ID passed';
//$this->error_msg_insert($error_msg);
}

}else{
$error_msg = 'Error reading POST data';
//$this->error_msg_insert($error_msg);
}

}else{

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_USER'] == trim($cp_merchant_id) && $_SERVER['PHP_AUTH_PW'] == trim($cp_ipn_secret)){
$auth_ok = true;
}else{
$error_msg = "Invalid merchant id/ipn secret";
//$this->error_msg_insert($error_msg);
}

}


//$auth_ok='ok';

if($auth_ok){
if($_REQUEST['ipn_type'] == "api"){ 
if($_REQUEST['merchant'] == $cp_merchant_id)
{}

}
}


// Get Call back Data
$txn_id = $_POST['txn_id'];
$invoiceid = $_POST['invoice'];
$amount1 = floatval($_POST['amount1']);
$amount2 = floatval($_POST['amount2']);
$received_amount = floatval($_POST['received_amount']);
$currency1 = $_POST['currency1'];
$currency2 = $_POST['currency2'];
$status = intval($_POST['status']);

//Get invoice or order details from database useing $invoiceid variable
//$invoice = ''; // SELECT QUERY

if($status=='100' || $status=='1' || $status=='2' || $status>100)
{
$sql6="INSERT INTO `ee_payment_callback` (`txn_id`,`invoice`,`amount1`,`amount2`,`received_amount`,`currency1`,`currency2`,`status`,`date`) VALUES('".$txn_id."','".$invoiceid."','".$amount1."','".$amount2."','".$received_amount."','".$currency1."','".$currency2."','".$status."','".date('Y-m-d')."')";
$res6=query($conn,$sql6);

$sql1="UPDATE `ee_member_coinpayment` SET `status`='C',`txn_id`='".$txn_id."' WHERE `invoice`='".$invoiceid."'";
$res1=query($conn,$sql1);
}

?>