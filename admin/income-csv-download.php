<?php
include('includes/function.php');

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl_No";
$arr[0][1]="User_ID";
$arr[0][2]="Name";
$arr[0][3]="Sponsor_ID";
$arr[0][4]="Name";
$arr[0][5]="Current_Wallet";
$arr[0][6]="Fund_Wallet";
$arr[0][7]="Withdrawal";

$sqlm="SELECT * FROM `ee_member` WHERE `paystatus`='A' ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['paystatus']=='A')
$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=ucwords(getMemberUserid($conn,$fetchm['userid'],'name'));
$arr[$i][3]=$fetchm['sponsor'];
$arr[$i][4]=ucwords(getMemberUserid($conn,$fetchm['sponsor'],'name'));
$arr[$i][5]=getAvailableWallet($conn,$fetchm['userid']);
$arr[$i][6]=getFundWallet($conn,$fetchm['userid']);
$arr[$i][7]=getMemberWithdrawal($conn,$fetchm['userid']);

$i++;
}}

$name='Income-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');
