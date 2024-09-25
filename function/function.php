<?php
/*-----------------Database Connection-----------------------*/
$conn=mysqli_connect('localhost','root','','ezee2earn');
date_default_timezone_set('Asia/Calcutta');
/*-----------------Database Connection-----------------------*/

$title='Ezee 2 Earn';
$domain='www.assoftech.in/develop/ezee2earn';
$welcome='welcome@dreamcometrue.com';
$support='support@dreamcometrue.com';
$recovery='recovery@dreamcometrue.com';
$prefix='EE';
$currency='Rs.';

error_reporting(0);

function redirect($url)
{
header('Location: '.$url);
exit();
}
function query($conn,$sql)
{
$res=mysqli_query($conn,$sql);
return $res;
}
function numrows($exe)
{
$no=mysqli_num_rows($exe);
return $no;
}
function fetcharray($res)
{
$fetch=mysqli_fetch_array($res);
return $fetch;
}
function input($string)
{
$string=addslashes(trim(strip_tags($string)));
return $string;
}

function output($string)
{
$string=stripslashes(trim(strip_tags($string)));
return $string;
}

function getUser($conn,$id,$field)
{
$sql="SELECT * FROM `ee_admin` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getMemberPackage($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_investment` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}
function getTotalMember($conn)
{
$sql="SELECT `id` FROM `ee_member`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}
function getActiveMember($conn)
{
$sql="SELECT `id` FROM `ee_member` WHERE `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getInactiveMember($conn)
{
$sql="SELECT `id` FROM `ee_member` WHERE `paystatus`='I'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getMember($conn,$id,$field)
{
$sql="SELECT * FROM `ee_member` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getMemberWallet($conn,$field)
{
$sql="SELECT * FROM `ee_member` ORDER BY `id` ASC ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}



function getUserID($conn,$id,$field)
{
$sql="SELECT * FROM `ee_member` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getMemberUserid($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}





function getPendingWithdrawalAdmin($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getApprovedWithdrawalAdmin($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalSupport($conn)
{
$sql="SELECT `id` FROM `ee_support`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getNoOfFeedback($conn)
{
$sql="SELECT `id` FROM `ee_feedback`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getCashbackBonus($conn)
{
$sql="SELECT `id` FROM `ee_commission_cashback`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getCashbackLevel($conn)
{
$sql="SELECT `id` FROM `ee_commission_cashback_level`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getDirectBonus($conn)
{
$sql="SELECT `id` FROM `ee_commission_direct`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getRankReward($conn)
{
$sql="SELECT `id` FROM `ee_commission_rank_reward`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getTotalTeambonus($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_team_business` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberTopUp($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_topup` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMmeberPaymentApproved($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_payment` WHERE `userid`='".$userid."' AND `status`='C' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalIncomeMember($conn,$userid)
{
$total=(getCommisionLevelBonus($conn,$userid)+getCommisionCashBackBonus($conn,$userid)+getCommisionCashBackLevel($conn,$userid)+getCommisionDirectBonus($conn,$userid)+getCommisionRankReward($conn,$userid));

return $total;
}


function getAvailableWallet($conn,$userid)
{
$total=(getTotalIncomeMember($conn,$userid)+getDepositMemberCurrent($conn,$userid))-(getMemberWithdrawal($conn,$userid)+getCurrentToFund($conn,$userid)+getDeductMemberCurrent($conn,$userid));

return $total;
}


function getFundWallet($conn,$userid)
{
$total=(getDepositMemberFund($conn,$userid)+getFundFromCurrent($conn,$userid)+getFundReceivedFromOthers($conn,$userid)+getMmeberPaymentApproved($conn,$userid))-(getDeductMemberFund($conn,$userid)+getDeductMemberActivationFund($conn,$userid)+getFundTransfer($conn,$userid)+getDeductMemberService($conn,$userid));

return $total;
}


function getMemberInvestmentOthers($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_investment_others` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberInvestmentSelf($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_investment_self` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberInvestment($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_investment` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getCommissionDirect($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_direct` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getAdminCommissionDirect($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_direct` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getPendingWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `userid`='".$userid."' AND `status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getApprovedWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `userid`='".$userid."' AND `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberWithdrawal($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDepositMemberCurrent($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_deposit` WHERE `userid`='".$userid."' AND `wallet`='Current Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDepositMemberFund($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_deposit` WHERE `userid`='".$userid."' AND `wallet`='Fund Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDeductMemberCurrent($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_deduct` WHERE `userid`='".$userid."' AND `wallet`='Current Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDeductMemberFund($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_deduct` WHERE `userid`='".$userid."' AND `wallet`='Fund Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getDeductMemberActivationFund($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_topup` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getDeductMemberService($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_service` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}




function getSettingsWithdrawal($conn,$field)
{
$sql="SELECT * FROM `ee_settings_withdrawal` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getUplineMember($conn,$userid)
{
$sql="SELECT * FROM `ee_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['sponsor'];
}
}

function dateDiffInDays($conn,$date1,$date2)  
{ 
// Calulating the difference in timestamps 
$diff = strtotime($date2) - strtotime($date1); 

// 1 day = 24 hours 
// 24 * 60 * 60 = 86400 seconds 
return abs(round($diff / 86400)); 
} 


function getSponsorByPosition($conn,$userid,$position)
{
$sql="SELECT `id` FROM `ee_member` WHERE `sponsor`='".$userid."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPlacementByPosition($conn,$userid,$position)
{
$sql="SELECT `id` FROM `ee_member` WHERE `placement`='".$userid."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getFirstDayWithMonth($conn,$mon,$year)
{
$currentMonth = $mon;
$currentYear = $year;
if($currentMonth == 1) {
   $lastMonth = 12;
   $lastYear = $currentYear - 1;
}
else {
   $lastMonth = $currentMonth -1;
   $lastYear = $currentYear;
}
if($lastMonth < 10) {
   $lastMonth = '0' . $lastMonth;
}
$lastDayOfMonth = date('d', $lastMonth);
$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
return $lastDateOfPreviousMonth;
}

function getLastDayWithMonth($conn,$mon,$year)
{
$currentMonth = $mon;
$currentYear = $year;
if($currentMonth == 1) {
   $lastMonth = 12;
   $lastYear = $currentYear - 1;
}
else {
   $lastMonth = $currentMonth -1;
   $lastYear = $currentYear;
}
if($lastMonth < 10) {
   $lastMonth = '0' . $lastMonth;
}
$lastDayOfMonth = date('t', $lastMonth);
$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
return $lastDateOfPreviousMonth;
}

function getTotalSponsor($conn,$userid)
{
$sql="SELECT `id` FROM `ee_member` WHERE `sponsor`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getActiveSponsor($conn,$userid)
{
$sql="SELECT `id` FROM `ee_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPendingTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `ee_withdrawal` WHERE`status`='P' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getApprovedTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `ee_withdrawal` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getPaidTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `ee_withdrawal` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getLatestPackage($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_package` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getContact($conn,$field)
{
$sql="SELECT * FROM `ee_contact` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSponsorDirect($conn,$sponsor,$sppack,$fromdate,$todate)
{
$sql="SELECT * FROM `ee_member` WHERE `sponsor`='".$sponsor."' AND `package`='".$sppack."' AND `approved` BETWEEN '".$fromdate."' AND '".$todate."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getActiveSponsorDirect($conn,$userid,$fromdate,$todate)
{
$sql="SELECT * FROM `ee_member` WHERE `userid`='".$userid."' AND `approved` BETWEEN '".$fromdate."' AND '".$todate."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getNoSponsorDirect($conn,$sponsor)
{
$sql="SELECT * FROM `ee_member` WHERE `sponsor`='".$sponsor."' AND `paystatus`='A' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getSettingsBank($conn,$field)
{
$sql="SELECT * FROM `ee_settings_company` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getNoActiveSponsor($conn,$userid)
{
$sql="SELECT `id` FROM `ee_member` WHERE `sponsor`='".$userid."' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getWithdrawal($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_withdrawal` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getTeamBusiness($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_team_business` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getPackageCheck($conn,$amount)
{
$sql="SELECT * FROM `ee_settings_package` WHERE `minamount`<='".$amount."' AND `maxamount`>='".$amount."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['id'];
}
}

function getSettingsMinPack($conn,$field)
{
$sql="SELECT min(minamount) FROM `ee_settings_package` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getInvest($conn,$userid,$field)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_investment` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getFundTransfer($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `ee_transfer_fund_others` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getCurrentToFund($conn,$userid)
{
$sql="SELECT SUM(`current`) AS total FROM `ee_transfer_current_fund` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getFundFromCurrent($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `ee_transfer_current_fund` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getFundReceivedFromOthers($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `ee_transfer_fund_others` WHERE `toid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getLastDate($conn,$userid)
{
$sql="SELECT * FROM `ee_member_investment` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['date'];
}
}



function getSettingsJoining($conn,$field)
{
$sql="SELECT * FROM `ee_settings_joining` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}



function getJoining($conn,$field)
{
$sql="SELECT * FROM `ee_settings_package` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getInvestmentAmount($conn,$userid)
{
$sql="SELECT * FROM `ee_member_investment` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['amount'];
}
}

function getRInvestmentID($conn,$userid)
{
$sql="SELECT * FROM `ee_member_investment` WHERE `userid`='".$userid."' AND `status`='R' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['id'];
}
}

function getSettingsTransfer($conn,$field)
{
$sql="SELECT * FROM `ee_settings_transfer` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getDirectActive($conn,$userid)
{
$sql="SELECT `id` FROM `ee_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}



function getLastInvest($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_investment` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}



function getExpectedReturn($conn,$amount)
{
$pack=getPackageCheck($conn,$amount);

$totper=getSettingsPackage($conn,$pack,'maxamount');

$total=($amount*$totper)/100;

return $total;
}


function getTotalInvestment($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_investment` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalCommssionByID($conn,$userid,$investid)
{
$total=getCommissionDailyByID($conn,$userid,$investid);

return $total;
}



function getSocialItem($conn,$field)
{
$sql="SELECT * FROM `ee_settings_social` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getMemberInvestmentByDate($conn,$userid,$fromdate,$todate)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_investment_details` WHERE `userid`='".$userid."' AND `date`>='".$fromdate."' AND `date`<='".$todate."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDirectMemberInvestment($conn,$userid,$fromdate,$todate)
{
$total=0;
$sql="SELECT * FROM `ee_member` WHERE `sponsor`='".$userid."' AND `paystatus`='A' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
$total=$total+getMemberInvestmentByDate($conn,$fetch['userid'],$fromdate,$todate);
}

}
return $total;
}

function getMinPackageAmt($conn)
{
$sql="SELECT MIN(minamount) as minimum FROM `ee_settings_package`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['minimum'];
}
}

function getMaxPackageAmt($conn)
{
$sql="SELECT MAX(maxamount) as maximum FROM `ee_settings_package`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['maximum'];
}
}

function getMemberName($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSettingsOnOff($conn,$field)
{
$sql="SELECT * FROM `ee_settings_onoff` ORDER BY `id` LIMIT 1 ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getModulePermission($conn,$id,$field)
{
$sql="SELECT * FROM `ee_permission` WHERE `username`='".$id."' AND `modules`='".$field."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPermissionCheck($conn,$username,$modules)
{
$sql="SELECT * FROM `ee_permission` WHERE `username`='".$username."' AND `modules`='".$modules."' ";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getTotalTeam($conn,$userid)
{
$sql="SELECT * FROM `ee_team_downline` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}

function getInvestmentClosed($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_investment` WHERE `userid`='".$userid."' AND `status`='C' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}





function getCommisionLevelBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_level` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}




function getCommisionCashBackBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_cashback` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getCommisionCashBackLevel($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_cashback_level` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}




function getCommisionDirectBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_direct` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getCommisionRankReward($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_rank_reward` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getCommisionMatchingRewardBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_matching_reward` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getCommissionTradingDailyBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_trading_daily` WHERE `userid`='".$userid."' AND `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getCommissionTradingLevelBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_trading_daily_level` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getDateConvert($date)
{
if($date)
{
$date=date('d/m/Y', strtotime($date));
}
return $date;
}

function getUplineID($conn,$userid)
{
$sql="SELECT * FROM `ee_genealogy` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['placement'];
}
}

function getDownlinePosition($conn,$userid,$placement)
{
$sql1="SELECT * FROM `ee_genealogy` WHERE `userid`='".$userid."' AND `placement`='".$placement."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);

return $fetch1['position'];
}
}

function getDownlineCount($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_count` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getSalesCount($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_sales_count` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getSales($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_sales` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$total=$fetch[$field];
}else{
$total=0;
}
return $total;
}

function getDownlineByPosition($conn,$sponsor,$position)
{
$sql="SELECT * FROM `ee_genealogy` WHERE `placement`='".$sponsor."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['userid'];
}
}

function getSettingsMatching($conn,$field)
{
$sql="SELECT * FROM `ee_settings_matching` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getTotalLevelBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_level`  ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getSettingsLevel($conn,$level,$field)
{
$sql="SELECT * FROM `ee_settings_cashback_level` WHERE `level`='".$level."' ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getNoOfSponsor($conn,$sponsorid)
{
$sql="SELECT `id` FROM `ee_member` WHERE `sponsor`='".$sponsorid."' AND `status`='A'  AND `paystatus`='A' ";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}



function getKycInformation($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_kyc` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}



function getDepositMemberTrading($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_deposit` WHERE `userid`='".$userid."' AND `wallet`='Trading Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getDeductMemberTrading($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_deduct` WHERE `userid`='".$userid."' AND `wallet`='Trading Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}
function getMemberWithdrawalTrading($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `ee_withdrawal` WHERE `userid`='".$userid."' AND `wallet`='Trading Wallet' ORDER BY `id` ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}





function getTradingWallet($conn,$userid)
{
$total=(getDepositMemberTrading($conn,$userid)+getCommissionTradingDailyBonus($conn,$userid))-(getDeductMemberTrading($conn,$userid)+getMemberWithdrawalTrading($conn,$userid));

return $total;
}

function getTotalPairToday($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_matching` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY id";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getServiceFees($conn,$id,$field)
{
$sql="SELECT * FROM `ee_service` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}




function getTotalCashbackBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_cashback`  ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getmemberserviceid($conn,$id,$field)
{
$sql="SELECT * FROM `ee_member_service` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getSettingsRankReward($conn,$field)
{
$sql="SELECT * FROM `ee_settings_rank_reward` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getReward($conn,$field)
{
$sql="SELECT * FROM `ee_settings_rank_reward`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getTotalTopUpByDate($conn,$fromdate,$todate)
{
$sql="SELECT COALESCE(SUM(`amount`),0) AS total FROM `ee_member_topup` WHERE `date` BETWEEN '".$fromdate."' AND '".$todate."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['total'];

}
}
function getTotalRankRewardBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_rank_reward`  ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalCashbackLevel($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `ee_commission_cashback_level`  ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getLatestRank($conn,$userid,$field)
{
$sql="SELECT * FROM `ee_member_rank_reward` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getNoMemberRank($conn,$rank)
{
$sql="SELECT `id` FROM `ee_member_rank_reward` WHERE `rank`='".$rank."'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}


function getPendingPaymentAdmin($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_payment` WHERE `status`='P' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getApprovedPaymentAdmin($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `ee_member_payment` WHERE `status`='C' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}







function getMemRank($conn,$id,$field)
{
$sql="SELECT * FROM `ee_settings_rank_reward` WHERE `id`='".$id."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

?>